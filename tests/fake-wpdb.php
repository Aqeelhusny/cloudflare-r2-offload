<?php
/**
 * FakeWpdb — in-memory queue tables for unit/e2e tests.
 *
 * Parses the exact SQL shapes the plugin issues against its two queue tables:
 * claim/recover/revert UPDATEs, COUNT/SELECT reads, TRUNCATE, DELETE,
 * INSERT IGNORE (single-row, UNIQUE-aware), plus wpdb->update()/delete().
 */

if ( class_exists( 'FakeWpdb' ) ) {
    return;
}

class FakeWpdb {
    public string $prefix   = 'wp_';
    public string $posts    = 'wp_posts';
    public string $postmeta = 'wp_postmeta';
    public array $tables    = []; // table => [ id => assoc row ]
    private array $auto     = [];

    public function seed( string $table, array $row ): int {
        $id  = $this->auto[ $table ] = ( $this->auto[ $table ] ?? 0 ) + 1;
        $row = array_merge( [
            'id'            => $id,
            'attachment_id' => 0,
            'job_type'      => null,
            'status'        => 'pending',
            'retry_count'   => 0,
            'claimed_by'    => null,
            'error_message' => null,
            'created_at'    => '2026-01-01 00:00:00',
            'updated_at'    => '2026-01-01 00:00:00',
        ], $row, [ 'id' => $id ] );
        $this->tables[ $table ][ $id ] = $row;
        return $id;
    }

    public function rows( string $table ): array {
        return array_values( $this->tables[ $table ] ?? [] );
    }

    public function prepare( string $query, ...$args ): string {
        if ( isset( $args[0] ) && is_array( $args[0] ) ) {
            $args = $args[0];
        }
        $i = 0;
        return (string) preg_replace_callback(
            '/%[sd]/',
            function ( $m ) use ( &$i, $args ) {
                $v = $args[ $i++ ];
                return $m[0] === '%d' ? (string) (int) $v : "'" . (string) $v . "'";
            },
            $query
        );
    }

    public function query( string $sql ) {
        $sql = trim( (string) preg_replace( '/\s+/', ' ', $sql ) );

        if ( preg_match( '/^TRUNCATE TABLE `?(\w+)`?$/i', $sql, $m ) ) {
            $n = count( $this->tables[ $m[1] ] ?? [] );
            $this->tables[ $m[1] ] = [];
            return $n;
        }

        // Single-row INSERT IGNORE — honours the UNIQUE keys the real tables
        // have: attachment_id (migration queue), (job_type, attachment_id) (bulk).
        if ( preg_match( '/^INSERT IGNORE INTO `?(\w+)`? \(([^)]+)\) VALUES \((.+)\)$/i', $sql, $m ) ) {
            $table = $m[1];
            $cols  = array_map( 'trim', explode( ',', $m[2] ) );
            $vals  = array_map(
                fn( $v ) => preg_match( "/^'(.*)'$/s", trim( $v ), $vm ) ? $vm[1] : (int) trim( $v ),
                explode( ',', $m[3] )
            );
            $row = array_combine( $cols, $vals );

            foreach ( $this->tables[ $table ] ?? [] as $existing ) {
                $same_attachment = (string) $existing['attachment_id'] === (string) ( $row['attachment_id'] ?? '' );
                $same_job        = ! isset( $row['job_type'] ) || (string) $existing['job_type'] === (string) $row['job_type'];
                if ( $same_attachment && $same_job ) {
                    return 0; // duplicate — IGNOREd
                }
            }
            $this->seed( $table, $row );
            return 1;
        }

        if ( preg_match( '/^DELETE FROM `?(\w+)`? WHERE (.+)$/i', $sql, $m ) ) {
            $n = 0;
            foreach ( $this->tables[ $m[1] ] ?? [] as $id => $row ) {
                if ( $this->match( $row, $m[2] ) ) {
                    unset( $this->tables[ $m[1] ][ $id ] );
                    $n++;
                }
            }
            return $n;
        }

        if ( preg_match( '/^UPDATE `?(\w+)`? SET (.+?) WHERE (.+?)(?: ORDER BY id ASC)?(?: LIMIT (\d+))?$/i', $sql, $m ) ) {
            $set   = $this->parse_assignments( $m[2] );
            $limit = isset( $m[4] ) && $m[4] !== '' ? (int) $m[4] : PHP_INT_MAX;
            $n     = 0;
            foreach ( $this->tables[ $m[1] ] ?? [] as $id => $row ) {
                if ( $n >= $limit ) {
                    break;
                }
                if ( $this->match( $row, $m[3] ) ) {
                    $this->tables[ $m[1] ][ $id ] = array_merge( $row, $set );
                    $n++;
                }
            }
            return $n;
        }

        throw new RuntimeException( "FakeWpdb cannot parse query: {$sql}" );
    }

    public function get_var( string $sql ) {
        $sql = trim( (string) preg_replace( '/\s+/', ' ', $sql ) );
        if ( preg_match( '/^SELECT COUNT\(\*\) FROM `?(\w+)`?(?: WHERE (.+))?$/i', $sql, $m ) ) {
            $n = 0;
            foreach ( $this->tables[ $m[1] ] ?? [] as $row ) {
                if ( ! isset( $m[2] ) || $this->match( $row, $m[2] ) ) {
                    $n++;
                }
            }
            return (string) $n;
        }
        throw new RuntimeException( "FakeWpdb cannot parse get_var: {$sql}" );
    }

    public function get_results( string $sql ) {
        $sql = trim( (string) preg_replace( '/\s+/', ' ', $sql ) );
        if ( preg_match( '/^SELECT \* FROM `?(\w+)`? WHERE (.+?)(?: ORDER BY id ASC)?$/i', $sql, $m ) ) {
            $out = [];
            foreach ( $this->tables[ $m[1] ] ?? [] as $row ) {
                if ( $this->match( $row, $m[2] ) ) {
                    $out[] = (object) $row;
                }
            }
            return $out;
        }
        throw new RuntimeException( "FakeWpdb cannot parse get_results: {$sql}" );
    }

    public function update( string $table, array $data, array $where, $format = null, $where_format = null ): int {
        $n = 0;
        foreach ( $this->tables[ $table ] ?? [] as $id => $row ) {
            $ok = true;
            foreach ( $where as $col => $val ) {
                if ( (string) $row[ $col ] !== (string) $val ) {
                    $ok = false;
                    break;
                }
            }
            if ( $ok ) {
                $this->tables[ $table ][ $id ] = array_merge( $row, $data );
                $n++;
            }
        }
        return $n;
    }

    public function delete( string $table, array $where, $format = null ): int {
        $n = 0;
        foreach ( $this->tables[ $table ] ?? [] as $id => $row ) {
            $ok = true;
            foreach ( $where as $col => $val ) {
                if ( (string) $row[ $col ] !== (string) $val ) {
                    $ok = false;
                    break;
                }
            }
            if ( $ok ) {
                unset( $this->tables[ $table ][ $id ] );
                $n++;
            }
        }
        return $n;
    }

    private function parse_assignments( string $set ): array {
        $out = [];
        foreach ( preg_split( '/,\s*(?=\w+\s*=)/', $set ) as $pair ) {
            [ $col, $val ] = array_map( 'trim', explode( '=', $pair, 2 ) );
            if ( strcasecmp( $val, 'NULL' ) === 0 ) {
                $out[ $col ] = null;
            } elseif ( preg_match( "/^'(.*)'$/s", $val, $m ) ) {
                $out[ $col ] = $m[1];
            } else {
                $out[ $col ] = (int) $val;
            }
        }
        return $out;
    }

    private function match( array $row, string $where ): bool {
        foreach ( preg_split( '/ AND /i', $where ) as $cond ) {
            $cond = trim( $cond );
            if ( preg_match( "/^(\w+) = '([^']*)'$/", $cond, $m ) ) {
                if ( (string) $row[ $m[1] ] !== $m[2] ) {
                    return false;
                }
            } elseif ( preg_match( "/^(\w+) < '([^']*)'$/", $cond, $m ) ) {
                if ( ! ( (string) $row[ $m[1] ] < $m[2] ) ) {
                    return false;
                }
            } elseif ( preg_match( '/^(\w+) IN \(([^)]*)\)$/i', $cond, $m ) ) {
                $vals = array_map( fn( $v ) => trim( trim( $v ), "'" ), explode( ',', $m[2] ) );
                if ( ! in_array( (string) $row[ $m[1] ], $vals, true ) ) {
                    return false;
                }
            } else {
                throw new RuntimeException( "FakeWpdb cannot evaluate condition: {$cond}" );
            }
        }
        return true;
    }
}

<?php
/**
 * Minimal test runner with assert helpers and summary reporting.
 */
class TestRunner {
    private int   $passed   = 0;
    private int   $failed   = 0;
    private array $failures = [];

    public function assert( bool $condition, string $name ): void {
        if ( $condition ) {
            $this->passed++;
            echo "  PASS  {$name}\n";
        } else {
            $this->failed++;
            $this->failures[] = $name;
            echo "  FAIL  {$name}\n";
        }
    }

    public function assertEqual( $expected, $actual, string $name ): void {
        if ( $expected === $actual ) {
            $this->passed++;
            echo "  PASS  {$name}\n";
        } else {
            $this->failed++;
            $this->failures[] = $name;
            $e = var_export( $expected, true );
            $a = var_export( $actual, true );
            echo "  FAIL  {$name}\n        expected: {$e}\n        actual:   {$a}\n";
        }
    }

    public function assertNotEmpty( $value, string $name ): void {
        $this->assert( ! empty( $value ), $name );
    }

    public function assertStringContains( string $needle, string $haystack, string $name ): void {
        $this->assert( strpos( $haystack, $needle ) !== false, $name );
    }

    public function assertStringNotContains( string $needle, string $haystack, string $name ): void {
        $this->assert( strpos( $haystack, $needle ) === false, $name );
    }

    public function assertGreaterThan( $expected, $actual, string $name ): void {
        $this->assert( $actual > $expected, $name );
    }

    public function section( string $title ): void {
        echo "\n" . str_repeat( '-', 60 ) . "\n{$title}\n" . str_repeat( '-', 60 ) . "\n";
    }

    public function summary(): int {
        $total = $this->passed + $this->failed;
        echo "\n" . str_repeat( '=', 60 ) . "\n";
        echo "Results: {$this->passed}/{$total} passed, {$this->failed} failed\n";
        if ( $this->failures ) {
            echo "\nFailed tests:\n";
            foreach ( $this->failures as $f ) {
                echo "  - {$f}\n";
            }
        }
        echo str_repeat( '=', 60 ) . "\n";
        return $this->failed > 0 ? 1 : 0;
    }
}

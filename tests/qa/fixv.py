s = open('mutate.php', encoding='utf-8').read()
old = "$verdict = strpos( $res, 'APPLIED' ) === false ? 'NOT APPLIED' : ( $missed ? ( $caught ? 'PARTIAL' : 'SURVIVED' ) : 'KILLED' );"
new = "$verdict = strpos( $res, 'APPLIED' ) === false ? 'NOT APPLIED' : ( ! $expect ? 'EQUIVALENT' : ( $missed ? ( $caught ? 'PARTIAL' : 'SURVIVED' ) : 'KILLED' ) );"
assert old in s; s = s.replace(old, new, 1)
old2 = "echo \"Mutation score: {$k}/\" . count( $rows ) . \" killed\n\";"
new2 = "$eq = count( array_filter( $rows, fn( $x ) => $x['verdict'] === 'EQUIVALENT' ) );\necho \"Mutation score: {$k}/\" . ( count( $rows ) - $eq ) . \" killed\" . ( $eq ? \" ({$eq} equivalent, excluded)\" : '' ) . \"\n\";"
assert old2 in s, 'score line'; s = s.replace(old2, new2, 1)
open('mutate.php', 'w', encoding='utf-8').write(s); print('ok')

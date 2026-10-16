<?php
// Realistic test media: gradient+noise JPEGs (compress like photos), a GIF, a PDF.
$d = '/tmp/qa-img'; @mkdir( $d );
function img( $w, $h, $path, $type = 'jpg' ) {
    $im = imagecreatetruecolor( $w, $h );
    for ( $y = 0; $y < $h; $y += 4 ) {
        $c = imagecolorallocate( $im, ( $y * 255 / $h ) | 0, 120, 255 - ( $y * 255 / $h ) | 0 );
        imagefilledrectangle( $im, 0, $y, $w, $y + 3, $c );
    }
    for ( $i = 0; $i < 400; $i++ ) {
        imagefilledellipse( $im, rand( 0, $w ), rand( 0, $h ), rand( 5, 60 ), rand( 5, 60 ), imagecolorallocate( $im, rand( 0, 255 ), rand( 0, 255 ), rand( 0, 255 ) ) );
    }
    $type === 'gif' ? imagegif( $im, $path ) : imagejpeg( $im, $path, 88 );
}
img( 800, 600, "$d/small.jpg" );
img( 3000, 2000, "$d/big.jpg" );
img( 3000, 2000, "$d/client.jpg" );          // client-side flow original
img( 2560, 1707, "$d/client-scaled.jpg" );   // client-made scaled
img( 150, 150, "$d/client-150x150.jpg" );
img( 300, 200, "$d/client-300x200.jpg" );
img( 1024, 683, "$d/client-1024x683.jpg" );
img( 300, 200, "$d/anim.gif", 'gif' );
img( 1200, 800, "$d/legacy.jpg" );
img( 900, 900, "$d/product.jpg" );
img( 900, 900, "$d/gallery1.jpg" );
img( 900, 900, "$d/gallery2.jpg" );
img( 900, 900, "$d/variation-gallery.jpg" );
img( 1200, 800, "$d/bg.jpg" );
img( 1200, 800, "$d/fail.jpg" );
img( 640, 480, "$d/cli1.jpg" ); img( 640, 480, "$d/cli2.jpg" );
file_put_contents( "$d/doc.pdf", "%PDF-1.4\n1 0 obj<</Type/Catalog/Pages 2 0 R>>endobj 2 0 obj<</Type/Pages/Kids[3 0 R]/Count 1>>endobj 3 0 obj<</Type/Page/Parent 2 0 R/MediaBox[0 0 200 200]>>endobj\ntrailer<</Root 1 0 R>>\n%%EOF\n" );
foreach ( glob( "$d/*" ) as $f ) printf( "%-22s %8d bytes\n", basename( $f ), filesize( $f ) );

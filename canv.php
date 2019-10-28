<?php
// $srcImg = imagecreatefrompng('ballons.png');
// $destImg = imagecreatefrompng('canvas.ping');
// if (imagecopymerge($destImg, $srcImg, 0, 0, 0, 0, 640, 480, 100))
// {
//     header('Content-Type: image/png');
//     imagepng($destImg, 'meg.png');
// }
// imagedestroy($destImg);
// imagedestroy($srcImg);

$im1 = imagecreatefrompng('/goinfre/pmogwere/Desktop/MAP/apache2/htdocs/camagru/canvas.png');
$im2 = imagecreatefrompng('/goinfre/pmogwere/Desktop/MAP/apache2/htdocs/camagru/balloons.png');

imagecopyresampled($im1,$im2,250,150,0,0,100,150,100,150);
unset($im2);
?>
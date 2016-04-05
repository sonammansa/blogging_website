<?php
$i=$_GET['im'];
$im = imagecreatefromjpeg($i);

/* R, G, B, so 0, 255, 0 is green */
if($im && imagefilter($im, IMG_FILTER_COLORIZE, 0,0, 190))
{
    echo 'Image successfully shaded green.';

    imagejpeg($im, 'temp/new1.jpg');
    imagedestroy($im);
}
else
{
    echo 'Green shading failed.';
}
?>
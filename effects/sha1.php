<?php
$im = imagecreatefromjpeg('temp/new.jpg');

/* R, G, B, so 0, 255, 0 is green */
if($im && imagefilter($im, IMG_FILTER_COLORIZE, 110,100, 70))
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
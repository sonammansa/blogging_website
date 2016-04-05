<?php
$i=$_GET['im'];
$im = imagecreatefromjpeg($i);

if($im && imagefilter($im, IMG_FILTER_BRIGHTNESS, 20))
{
    echo 'Image brightness changed.';

    imagejpeg($im, 'temp/new1.jpg');
    imagedestroy($im);
}
else
{
    echo 'Image brightness change failed.';
}
?>
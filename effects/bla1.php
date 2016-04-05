<?php
$im = imagecreatefromjpeg('temp/new.jpg');

if($im && imagefilter($im, IMG_FILTER_GRAYSCALE))
{
    

    imagejpeg($im, 'temp/new1.jpg');
}
else
{
    echo 'Conversion to grayscale failed.';
}


?>
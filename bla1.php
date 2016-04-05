<?php
$i=$_GET['im'];

$im = imagecreatefromjpeg($i);

if($im && imagefilter($im, IMG_FILTER_GRAYSCALE))
{
    

    imagejpeg($im, 'temp/new1.jpg');
}
else
{
    echo 'Conversion to grayscale failed.';
}


?>
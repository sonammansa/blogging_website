
<?php

function negate($im)
{
    if(function_exists('imagefilter'))
    {
        return imagefilter($im, IMG_FILTER_NEGATE);
    }

    for($x = 0; $x < imagesx($im); ++$x)
    {
        for($y = 0; $y < imagesy($im); ++$y)
        {
            $index = imagecolorat($im, $x, $y);
            $rgb = imagecolorsforindex($index);
            $color = imagecolorallocate($im, 255 - $rgb['red'], 255 - $rgb['green'], 255 - $rgb['blue']);

            imagesetpixel($im, $x, $y, $color);
        }
    }

    return(true);
}

$im = imagecreatefromjpeg('temp/new.jpg');

if($im && negate($im))
{
    echo 'Image successfully converted to negative colors.';

    imagejpeg($im, 'temp/new1.jpg', 9);
    imagedestroy($im);
}
else
{
    echo 'Converting to negative colors failed.';
}
?>

<?php
header("Content-type: image/png");
$string = $_GET['text'];
$im     = imagecreatefrompng(__DIR__. "/sert.png");
$orange = imagecolorallocate($im, 220, 210, 60);
$px     = (imagesx($im) - 7.5 * strlen($string)) / 2;
imagestring($im, 3, $px, 9, $string, $orange);
imagepng($im);
imagedestroy($im);

?>
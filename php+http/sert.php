<?php
if (isset($_GET['username'])) {
	$text = $_GET['username'];
} else {
	$text = 'John Doe';
}
$image = imagecreatetruecolor(875, 655);
$backColor = imagecolorallocate($image, 35, 35, 35);
$textColor = imagecolorallocate($image, 0, 875, 655);

$picFile = __DIR__.'/sert.png';
if (!file_exists($picFile)) {
	echo 'Файл с картинкой $picFile не найден';
	exit;
}
$imBox = imagecreatefrompng($picFile);

imagefill($image, 0, 0, $backColor);
imagecopy($image, $imBox, 10, 10, 0, 0, 875, 655);

$fontFile = __DIR__. '/Lora-Italic.ttf';
if (!file_exists($fontFile)) {
	echo 'Файл со шрифтом не найден';
	exit;
}

imagettftext($image, 50, 0, 280, 390, $textColor, $fontFile, $text);
header('Content-type: image/png');

imagepng($image);
imagedestroy($image);
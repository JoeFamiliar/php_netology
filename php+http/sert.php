<?php
if (isset($_GET['text'])) {
	$text = $_GET['text'];
} else {
	$text = 'John Doe';
}
$image = imagecreatetruecolor(875, 655);
$backColor = imagecolorallocate($image, 35, 35, 35);
$textColor = imagecolorallocate($image, 0, 200, 200);

$picFile = 'http://university.netology.ru/u/akhripko/me/php+http/sert.png';
if (!file_exists($picFile)) {
	echo 'Файл с картинкой не найден';
	exit;
}
$imBox = imagecreatefrompng($picFile);

imagefill($image, 0, 0, $backColor);
imagecopy($image, $imBox, 10, 10, 0, 0, 300, 300);

$fontFile = 'http://university.netology.ru/u/akhripko/me/php+http/Lora-Italic.ttf';
if (!file_exists($fontFile)) {
	echo 'Файл со шрифтом не найден';
	exit;
}

imagettftext($image, 50, 30, 50, 200, $textColor, $fontFile, $text);
header('Content-type: image/png');

imagepng($image);
imagedestroy($image);
<?php

session_start() ;

$font = 'LaBelleAurore.ttf' ;

header('Content-Type: image/png');

$im = imagecreatetruecolor(200, 150);

$black  = imagecolorallocate($im, 0, 0, 0);
$greyish = imagecolorallocate($im, 215, 215, 215);
$red = imagecolorallocate($im, 255, 0, 0);
imagefilledrectangle ($im, 6, 6, 194, 144, $greyish);

$length = 6;
$text = substr(str_shuffle(md5(time())), 0, $length); 

$_SESSION["captcha"] = $text;

imagettftext($im, 20, -5, 15, 30, $red, $font, $text);
$text = substr(str_shuffle(md5(time())), 0, 7);

$_SESSION["captcha"] .= $text;
imagettftext($im, 18, 25, 15, 100, $red, $font, $text);

imagepng($im);
imagedestroy($im);
?>

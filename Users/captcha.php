<?php
header("Content-type: image/png");
session_start();

$image = imagecreate(200, 50);

$red = imagecolorallocate($image, 255, 0, 0);
$black = imagecolorallocate($image, 0, 0, 0);

$nbChar = 6;
$authorizedChar = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
$captcha = substr(str_shuffle($authorizedChar), 0, $nbChar);
$_SESSION["captcha"] = $captcha;

imagestring($image, 4, 100, 20, $captcha, $black);

/*

Amélioration:
	-> Couleur de fond aléatoire
	-> Couleur du text aléatoire
	-> taille et font ttf aléatoire (provenant d'un dossier listé en PHP)
	-> X formes géométriques (Rectangle, Elipse, Polygon ou ligne) en fond de la même couleur que le texte (X nombre aléatoire)
	-> Les formes doivent être positionnées aléatoirement
	-> L'angle du texte doit être aléatoire
	-> option : lecture des caractères
*/



imagepng($image);

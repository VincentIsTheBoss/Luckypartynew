<?php
define("DB_DRIVER", "mysql");
define("DB_NAME", "luckyparty");
define("DB_HOST", "localhost");
define("DB_PORT", 3306);
define("DB_USER", "root");
define("DB_PWD", "");

$msgError = [
	1=>"Votre nom doit faire entre 3 et 20 caractères ",
	2=>"Votre prenom doit faire entre 3 et 20 caractères ",
  3=>"Votre pseudo doit faire entre 6 et 16 caractères",
	4=>"Le mail n'est pas correct",
	5=>"La ville est incorrect",
	6=>"Le code postal est incorrect",
	7=>"Le format de la date n'est pas correct",
	8=>"Vous devez avoir entre 18 et 120 ans",
	9=>"le mots de passe dois faire entre 8 et 16 caractere",
	10=>"les mots de passe ne correspondent pas",
	11=>"veuillez confirmer les CGUs",
	12=>"le captcha est incorrect",
  13=>"le pseudo existe deja",
  14=>"l'email existe deja",
	15=>"veuillez selectioner un genre"

];
$listOfGender = [
					"m"=>"Homme",
					"w"=>"Femme"
				];

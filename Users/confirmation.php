<?php
	//formulaire email pwd recup mail haché pour le mail siasi fonction native pour comparer le hashavec le md saisi
session_start();
require "../admin/conf.php";
require "../admin/lib.php";
include "../Users/header.php";
?>

<?php

	if (isset($_GET["pseudo"], $_GET['key']) AND !empty($_GET["pseudo"]) AND !empty($_GET['key'])) {

		$pseudo = htmlspecialchars(urlencode($_GET["pseudo"]));
		$key = $_GET['key'];

		$db = dbConnect();


		$requser = $db -> prepare("SELECT * FROM utilisateur WHERE pseudo = :pseudo AND confirmkey = :key");

		$requser -> execute(array(
			"pseudo"=>$pseudo,
          	"key"=>$key
			));
		$userexist = $requser->rowCount();

		if ($userexist == 1) {
			$user = $requser -> fetch();
			if ($user['is_confirmed'] == 0) {
				$updateuser = $db -> prepare("UPDATE utilisateur SET is_confirmed = 1 WHERE pseudo = :pseudo AND confirmkey = :key");
				$updateuser -> execute(array(
			"pseudo"=>$pseudo,
          	"key"=>$key
			));?>
				<div class="alert alert-success" role="alert">
  					<a href="index.php" class="alert-link"><?php echo "Votre compte vient d'être activé !";?></a>
				</div>
<?php
			} else {
?>
				<div class="alert alert-danger" role="alert">
  					<a href="index.php" class="alert-link"><?php echo "Votre compte a déjà été confirmé !";?></a>
				</div>
<?php
			}
		} else {
			echo "L'utilisateur n'existe pas !";
		}
	} else echo "echec";
?>

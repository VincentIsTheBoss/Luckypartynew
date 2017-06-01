<?php
require_once "conf.php";
function dbconnect(){
		try{
		$db = new PDO(DB_DRIVER.":host=".DB_HOST.";dbname=".DB_NAME.";port=".DB_PORT,DB_USER,DB_PWD,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	}catch(Exeption $e){
		die("Erreur SQL" .$e->getMessage());
	}
	return $db;
	}
//retourne booleen pour dire si connecter
function isConnected(){
	if (!empty($_SESSION["access_token"])) {
		$db=dbconnect();
		$connected=$db->prepare("SELECT id FROM users WHERE email= :email AND access_token=:access_token AND is_deleted=0");
		$connected->execute([
			"access_token"=>$_SESSION["access_token"],
			"email"=>$_SESSION["email"]
			]);

		if(empty($connected->fetch())){
			unset($_SESSION["access_token"]);
			return false;
		}else{
			return true;
		}
	}
	return false;
}

function disconnect(){
	if (!empty($_SESSION["access_token"])) {
		$db=dbconnect();
		$connected=$db->prepare("UPDATE users SET access_token=0 AND is_connected=0	 WHERE id=:id");
		$connected->execute([
			"id"=>$_SESSION["id"]
			]);
		$connected=$db->prepare("UPDATE users SET is_connected=0	 WHERE id=:id");
		$connected->execute(["id"=>$_SESSION["id"]]);
		unset($_SESSION["access_token"]);
	}
}

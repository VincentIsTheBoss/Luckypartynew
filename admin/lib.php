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
		$connected=$db->prepare("SELECT id,pseudo FROM utilisateur WHERE email=:email AND access_token=:access_token AND is_deleted=0");
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
		$connected=$db->prepare("UPDATE utilisateur SET access_token=null Where email=:email");
		$connected->execute([
			"email"=>$_SESSION["email"]
			]);
		unset($_SESSION["access_token"]);
	}
}

function AdminConnected(){
	if (!empty($_SESSION["accessToken"])) {
		$db=dbconnect();
		$connected=$db->prepare("SELECT id_admin FROM administrateur WHERE mail=:mail AND accessToken=:accessToken AND is_deleted=0");
		$connected->execute([
			"accessToken"=>$_SESSION["accessToken"],
			"mail"=>$_SESSION["mail"]
			]);

		if(empty($connected->fetch())){
			unset($_SESSION["accessToken"]);
			return false;
		}else{
			return true;
		}
	}
	return false;
}

function AdminDisconnect(){
	if (!empty($_SESSION["accessToken"])) {
		$db=dbconnect();
		$connected=$db->prepare("UPDATE administrateur SET accessToken=null Where mail=:mail");
		$connected->execute([
			"mail"=>$_SESSION["mail"]
			]);
		unset($_SESSION["accessToken"]);
	}
}

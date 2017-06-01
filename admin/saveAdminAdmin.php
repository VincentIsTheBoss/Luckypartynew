<?php
session_start();
require "conf.php";
require "lib.php";



if (!empty($_POST["mail"]) &&
    !empty($_POST["pwd_admin"]) &&
    !empty($_POST["pwd_admin2"]) &&
     empty($_GET["id_admin"])
) {
  $error = false;
  $list_Errors;

  $_POST["mail"] = trim($_POST["mail"]);
  $_POST["pwd_admin"] = trim($_POST["pwd_admin"]);
  $_POST["pwd_admin2"] = trim($_POST["pwd_admin2"]);




  if( !filter_var($_POST["mail"], FILTER_VALIDATE_EMAIL) ){
    $error = true;
    $listOfErrors[]=4;
  }


  if( strlen($_POST["pwd_admin"])<8 || strlen($_POST["pwd_admin"])>16 ){
    $error = true;
    $list_Errors[]=9;
  }

  //pwd_admin2 : id_admin identique à pwd_admin
  if($_POST["pwd_admin"] != $_POST["pwd_admin2"]){
    $error = true;
    $list_Errors[]=10;
  }

    if (!$error) {
      echo"2";
      $db = dbConnect();
  		//Est ce que l'mail est unique
  		$query = $db->prepare(
  			"SELECT id_admin FROM administrateur WHERE mail=:mail AND id_admin!=:id_admin"
  			);
        $id = (empty($_GET["id-admin"])) ?-1:$_GET["id_admin"];
  		$query->execute(  [ "mail"=> $_POST["mail"], "id_admin"=>$id ] );
  		$resultat = $query->fetch();
  		if( !empty($resultat) ){
  			$list_Errors[]=14;
  			$error = true;
  		}
  	}
    echo "3";

    if(!$error){
      echo"4";
      //Je vais rediriger l'administrateur vers index
      $pwd_admin = password_hash($_POST["pwd_admin"], PASSWORD_DEFAULT);
      echo "5";
      $arrayToExecute = [
          "mail"=>$_POST["mail"],
          "pwd_admin"=>$pwd_admin,

        ];
      //Préparer une requête
      if(empty($_GET["id_admin"])){
        echo "6";
        $query = $db->prepare(
          "INSERT INTO administrateur(mail,pwd_admin)
          VALUES (:mail,:pwd_admin);"
          );

          echo "7";
      }else{
        echo "8";
        $query = $db->prepare(
          "UPDATE administrateur SET
          mail=:mail,
          pwd_admin=:pwd_admin

          WHERE id_admin=:id_admin"
        );
        $arrayToExecute["id_admin"]=$_GET["id_admin"];
      }


      //Executer la requête


        $query->execute($arrayToExecute);

      header("Location: formAdmin.php");

    }else{
        //Sinon je vais rediriger l'administrateur vers createUser
      //Array ( 1,2,3,4,6 )
      $_SESSION['error'] = implode(',', $list_Errors);
      $_SESSION['data'] = $_POST;
      if (empty($_GET["id_admin"])) {
       header("Location: index.php");
      }else {
       header("Location: modifyUsers.php?id_admin=".$_GET["id_admin"]);
      }
}
}else {
  die("You've tried to hack my web site let me get your public ip address and find your location. It's my turn :)");
}

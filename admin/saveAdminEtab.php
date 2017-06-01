<?php
session_start();
require "conf.php";
require "lib.php";

if (!empty($_POST["nom_etablissement"]) &&
    !empty($_POST["type"]) &&
    !empty($_POST["genre"]) &&
    !empty($_POST["CP"])&&
    !empty($_POST["adresse"])&&
    empty($_GET["id_etablissement"])) {
  $error = false;
  $list_Errors;

  $_POST["nom_etablissement"] = trim($_POST["nom_etablissement"]);
  $_POST["type"] = trim($_POST["type"]);
  $_POST["genre"] = trim($_POST["genre"]);
  $_POST["CP"] = trim($_POST["CP"]);
  $_POST["adresse"] = trim($_POST["adresse"]);



  if (strlen($_POST["nom_etablissement"])>30 ) {
    $error = true;
    $list_Errors[]=1;
  }

  if ( strlen($_POST["genre"])<3 || strlen($_POST["genre"])>20 ) {
    $error = true;
    $list_Errors[]=2;
  }


  if( strlen($_POST["CP"])!=5){
		$error = true;
		$listOfErrors[]=15;
	}


  if (!$error) {
    $db = dbConnect();
    //Est ce que le pseudo est unique
    $query = $db->prepare(
      "SELECT id_etablissement FROM etablissement WHERE id_etablissement=:nom_etablissement AND id_etablissement!=:id_etablissement"
    );

    $id = (empty($_GET["id_etablissement"])) ?-1:$_GET["id_etablissement"];

    $query->execute(["nom_etablissement"=> $_POST["nom_etablissement"], "id_etablissement"=>$id]);


    $resultat = $query->fetch();
    if( !empty($resultat) ){
    $list_Errors[]=13;
      $error = true;
    }
  }
    if(!$error){
      echo"4";
      //Je vais rediriger l'utilisateur vers index

      $arrayToExecute = [
          "nom_etablissement"=>$_POST["nom_etablissement"],
          "type"=>$_POST["type"],
          "genre"=>$_POST["genre"],
          "CP"=>$_POST["CP"],
          "adresse"=>$_POST["adresse"],
          "id_etablissement"=>$_POST["id_etablissement"]



        ];
      //Préparer une requête
      if(empty($_GET["id_etablissement"])){
      $query = $db->prepare(
        "INSERT INTO etablissement(nom_etablissement,type,genre,adresse,CP,id_etablissement)
        VALUES (:nom_etablissement,:type,:genre,:adresse,:CP,:id_etablissement);"
        );


    }else{
      echo "8";
      $query = $db->prepare(
        "UPDATE etablissement SET

        nom_etablissement=:nom_etablissement,
        genre=:genre,
        type=:type,
        adresse=:adresse,
        CP=:CP,
        id_etablissement=:id_etablissement



        WHERE id_etablissement=:id_etablissement"
      );
      $arrayToExecute["id_etablissement"]=$_GET["id_etablissement"];
    }


    //Executer la requête


      $query->execute($arrayToExecute);

    header("Location: formAdmin.php");

  }else{
      //Sinon je vais rediriger l'utilisateur vers createUser
    //Array ( 1,2,3,4,6 )
    $_SESSION['error'] = implode(',', $list_Errors);
    $_SESSION['data'] = $_POST;
    if (empty($_GET["id_etablissement"])) {
     header("Location: formAdmin.php");
    }else {
     header("Location: modifyUsers.php?id_etablissement=".$_GET["id_etablissement"]);
    }
}
}else{
die("Nice Try !!!");
}

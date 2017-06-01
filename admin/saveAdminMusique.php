<?php
session_start();
require "conf.php";
require "lib.php";

if (!empty($_POST["genre"]) &&
    !empty($_POST["artiste"]) &&
    !empty($_POST["album"]) &&
    !empty($_POST["nom_piste"])&&
    empty($_GET["id_musique"])) {
  $error = false;
  $list_Errors;

  $_POST["genre"] = trim($_POST["genre"]);
  $_POST["artiste"] = trim($_POST["artiste"]);
  $_POST["album"] = trim($_POST["album"]);
  $_POST["nom_piste"] = trim($_POST["nom_piste"]);



  if (strlen($_POST["genre"])>20 ) {
    $error = true;
    $list_Errors[]=1;
  }

  if ( strlen($_POST["artiste"])<3 || strlen($_POST["artiste"])>20 ) {
    $error = true;
    $list_Errors[]=2;
  }

  if(  strlen($_POST["album"])<6 || strlen($_POST["album"])>16  ){
    $error = true;
    $list_Errors[]=3;
  }
  if( strlen($_POST["nom_piste"])<3 ){
		$error = true;
		$listOfErrors[]=15;
	}


  if (!$error) {
    $db = dbConnect();
    //Est ce que le pseudo est unique
    $query = $db->prepare(
      "SELECT id_musique FROM musique WHERE nom_piste=:nom_piste AND id_musique!=:id_musique"
    );

    $id = (empty($_GET["id_musique"])) ?-1:$_GET["id_musique"];

    $query->execute(["nom_piste"=> $_POST["nom_piste"], "id_musique"=>$id]);


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
          "nom_piste"=>$_POST["nom_piste"],
          "artiste"=>$_POST["artiste"],
          "genre"=>$_POST["genre"],
          "album"=>$_POST["album"]


        ];
      //Préparer une requête
      if(empty($_GET["id_musique"])){
      $query = $db->prepare(
        "INSERT INTO musique(nom_piste,artiste,genre,album)
        VALUES (:nom_piste,:artiste,:genre,:album);"
        );


    }else{
      echo "8";
      $query = $db->prepare(
        "UPDATE musique SET

        nom_piste=:nom_piste,
        genre=:genre,
        artiste=:artiste,
        album=:album


        WHERE id_musique=:id_musique"
      );
      $arrayToExecute["id_musique"]=$_GET["id_musique"];
    }


    //Executer la requête


      $query->execute($arrayToExecute);

    header("Location: formAdmin.php");

  }else{
      //Sinon je vais rediriger l'utilisateur vers createUser
    //Array ( 1,2,3,4,6 )
    $_SESSION['error'] = implode(',', $list_Errors);
    $_SESSION['data'] = $_POST;
    if (empty($_GET["id_musique"])) {
     header("Location: formAdmin.php");
    }else {
     header("Location: modifyUsers.php?id_musique=".$_GET["id_musique"]);
    }
}
}else{
die("Nice Try !!!");
}

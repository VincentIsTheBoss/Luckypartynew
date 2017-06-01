<?php
session_start();
require "conf.php";
require "lib.php";

if (!empty($_POST["nom_event"]) &&
    !empty($_POST["date_event"]) &&
    !empty($_POST["genre"]) &&
    !empty($_POST["CP"])&&
    !empty($_POST["adresse"])&&
    empty($_GET["id_evenement"])) {
  $error = false;
  $list_Errors;

  $_POST["nom_event"] = trim($_POST["nom_event"]);
  $_POST["date_event"] = trim($_POST["date_event"]);
  $_POST["genre"] = trim($_POST["genre"]);
  $_POST["CP"] = trim($_POST["CP"]);
  $_POST["adresse"] = trim($_POST["adresse"]);



  if (strlen($_POST["nom_event"])>30 ) {
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
      "SELECT id_evenement FROM evenement WHERE id_evenement=:nom_event AND id_evenement!=:id_evenement"
    );

    $id = (empty($_GET["id_evenement"])) ?-1:$_GET["id_evenement"];

    $query->execute(["nom_event"=> $_POST["nom_event"], "id_evenement"=>$id]);


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
          "nom_event"=>$_POST["nom_event"],
          "date_event"=>$_POST["date_event"],
          "genre"=>$_POST["genre"],
          "CP"=>$_POST["CP"],
          "adresse"=>$_POST["adresse"],
          "id_etablissement"=>$_POST["id_etablissement"]



        ];
      //Préparer une requête
      if(empty($_GET["id_evenement"])){
      $query = $db->prepare(
        "INSERT INTO evenement(nom_event,date_event,genre,adresse,CP,id_etablissement)
        VALUES (:nom_event,:date_event,:genre,:adresse,:CP,:id_etablissement);"
        );


    }else{
      echo "8";
      $query = $db->prepare(
        "UPDATE evenement SET

        nom_event=:nom_event,
        genre=:genre,
        date_event=:date_event,
        adresse=:adresse,
        CP=:CP,
        id_etablissement=:id_etablissement



        WHERE id_evenement=:id_evenement"
      );
      $arrayToExecute["id_evenement"]=$_GET["id_evenement"];
    }


    //Executer la requête


      $query->execute($arrayToExecute);

    header("Location: formAdmin.php");

  }else{
      //Sinon je vais rediriger l'utilisateur vers createUser
    //Array ( 1,2,3,4,6 )
    $_SESSION['error'] = implode(',', $list_Errors);
    $_SESSION['data'] = $_POST;
    if (empty($_GET["id_evenement"])) {
     header("Location: formAdmin.php");
    }else {
     header("Location: modifyUsers.php?id_evenement=".$_GET["id_evenement"]);
    }
}
}else{
die("Nice Try !!!");
}

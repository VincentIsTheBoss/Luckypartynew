<?php
session_start();
require "../admin/conf.php";
require "../admin/lib.php";



if (!empty($_POST["nom"]) &&
    !empty($_POST["prenom"]) &&
    !empty($_POST["pseudo"]) &&
    !empty($_POST["sexe"]) &&
    !empty($_POST["email"]) &&
    !empty($_POST["ville"]) &&
    !empty($_POST["pays"]) &&
    !empty($_POST["CP"]) &&
    isset($_POST["date_naissance"]) &&
    !empty($_POST["pwd"]) &&
    !empty($_POST["pwd2"]) &&
    (!empty($_POST["captcha"]) || !empty($_GET["id"]) )
) {
  $error = false;
  $list_Errors;

  $_POST["email"] = trim($_POST["email"]);
  $_POST["nom"] = trim($_POST["nom"]);
  $_POST["prenom"] = trim($_POST["prenom"]);
  $_POST["ville"] = trim($_POST["ville"]);
  $_POST["CP"] = trim($_POST["CP"]);
  $_POST["pays"] = trim($_POST["pays"]);
  $_GET["pseudo"] = trim($_POST["pseudo"]);
  $_POST["pwd"] = trim($_POST["pwd"]);
  $_POST["pwd2"] = trim($_POST["pwd2"]);




  if (strlen($_POST["nom"])>20 ) {
    $error = true;
    $list_Errors[]=1;
  }

  if ( strlen($_POST["prenom"])<3 || strlen($_POST["prenom"])>20 ) {
    $error = true;
    $list_Errors[]=2;
  }

  if(  strlen($_GET["pseudo"])<6 || strlen($_GET["pseudo"])>16  ){
    $error = true;
    $list_Errors[]=3;
  }
  if( !array_key_exists($_POST["sexe"], $listOfGender) ){
		$error = true;
		$listOfErrors[]=15;
	}

  if( !filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) ){
    $error = true;
    $listOfErrors[]=4;
  }

  if (strlen($_POST["ville"])<3 || strlen($_POST["ville"])>20) {
    $error = true;
    $list_Errors[]=5;
  }

  if (strlen($_POST["CP"])!=5){
    $error = true;
    $list_Errors[]=6;
  }

  //Birthday : si il n'est pas vide vérifier que la date est correcte
	//est doit avoir entre 10 et 120 ans
	//$_POST["birthday"] = 2016-11-02
	$explodeDate = explode("-", $_POST["date_naissance"]);
	//$explodeDate = [2016, 11, 02 ];

	if(count($explodeDate)!=3 || !checkdate($explodeDate[1], $explodeDate[2], $explodeDate[0])  ){
		$error = true;
		$list_Errors[]=7;
	}else{

		$ilYA120ans = time() - (31536000*120);
		$ilYA10ans = time() - (31536000*10);
		if( strtotime($_POST["date_naissance"])<$ilYA120ans ||
			strtotime($_POST["date_naissance"])>$ilYA10ans) {
			$error = true;
			$listOfErrors[]=8;
		}
  }

  if( strlen($_POST["pwd"])<8 || strlen($_POST["pwd"])>16 || $_POST["pwd"]==$_POST["nom"]  ){
    $error = true;
    $list_Errors[]=9;
  }

  //pwd2 : identique à pwd
  if($_POST["pwd"] != $_POST["pwd2"]){
    $error = true;
    $list_Errors[]=10;
  }

  if(!isset($_GET["id"])){
    //Si il n'y a pas d'id Vérification du captcha

		//cgu : doit exister
		if( !isset($_POST["cgu"]) ){
			$list_Errors[]=11;
			$error = true;
		}


      if( $_POST["captcha"] != $_SESSION["captcha"]){
        $list_Errors[]=12;
        $error = true;
      }
    }
    echo " 1";
    if (!$error) {

      $keylength = 15;
      $key = "";
      for ($i=1; $i < $keylength; $i++) {
        $key .= mt_rand(0,9);
      }

      echo $key;
      $db = dbConnect();
  		//Est ce que le pseudo est unique
  		$query = $db->prepare(
  			"SELECT id FROM utilisateur WHERE pseudo=:pseudo AND id!=:id"
  		);

  		$id = (empty($_GET["id"])) ?-1:$_GET["id"];

  		$query->execute(["pseudo"=> $_GET["pseudo"], "id"=>$id]);


  		$resultat = $query->fetch();
  		if( !empty($resultat) ){
  		$list_Errors[]=13;
  			$error = true;
  		}

  		//Est ce que l'email est unique
  		$query = $db->prepare(
  			"SELECT id FROM utilisateur WHERE email=:email AND id!=:id"
  			);
  		$query->execute(  [ "email"=> $_POST["email"], "id"=>$id ] );
  		$resultat = $query->fetch();
  		if( !empty($resultat) ){
  			$list_Errors[]=14;
  			$error = true;
  		}
  	}

    echo "3";

    if(!$error){
      echo"4";
        $db = dbConnect();
      //Je vais rediriger l'utilisateur vers index
      $pwd = password_hash($_POST["pwd"], PASSWORD_DEFAULT);
      echo "5";
      $arrayToExecute = [
          "email"=>$_POST["email"],
          "pseudo"=>$_GET["pseudo"],
          "prenom"=>$_POST["prenom"],
          "nom"=>$_POST["nom"],
          "sexe"=>$_POST["sexe"],
          "pwd"=>$pwd,
          "date_naissance"=>$_POST["date_naissance"],
          "ville"=>$_POST["ville"],
          "pays"=>$_POST["pays"],
          "CP"=>$_POST["CP"]
        ];
      //Préparer une requête
      if(empty($_GET["id"])){
        echo "6";
        $query = $db->prepare(
          "INSERT INTO utilisateur(email,pseudo,prenom,nom,sexe,pwd,date_naissance,ville,pays,CP,confirmkey)
          VALUES (:email,:pseudo,:prenom,:nom,:sexe,:pwd,:date_naissance,:ville,:pays,:CP,:key)"
          );
          $arrayToExecute["key"]=$key;

          $header = "MIME-Version: 1.0\r\n";
          $header .= 'From :"LuckyParty.com"<support@luckyparty.com>'."\n";
          $header .='Content-Type:text/html; charset="utf-8"'."\n";
          $header .='Content-Transfer-Encoding: 8bit';

          $message='
          <html>
            <body>
              <div align="center">
                <a href="http://localhost/Luckyparty/Users/confirmation.php?pseudo='.urlencode($_GET["pseudo"]).'&key='.$key.'">Confirmez votre compte ! </a>
                <img src="https://scontent-cdg2-1.xx.fbcdn.net/v/t34.0-12/17160714_1507802902566177_1702557678_n.jpg?oh=c40b1a35df3fc3b1e199963f91c0dfb7&oe=59194386" width="150 px" lenght="150 px";
              </div>
            </body>
          </html>
          ';

          mail($_POST["email"], "Confirmation de compte", $message, $header);


          echo "7";
      }else{
        echo "8";
        $query = $db->prepare(
          "UPDATE utilisateur SET
          email=:email,
          pseudo=:pseudo,
          nom=:nom,
          prenom=:prenom,
          sexe=:sexe,
          pwd=:pwd,
          date_naissance=:date_naissance,
          ville=:ville,
          pays=:pays,
          CP=:CP,
          date_updated= now()


          WHERE id=:id"
        );
        $arrayToExecute["id"]=$_GET["id"];
      }


      //Executer la requête
      echo "9";

        $query->execute($arrayToExecute);

     header("Location:../admin/adminUsers.php");



    }else{
        //Sinon je vais rediriger l'utilisateur vers createUser
      //Array ( 1,2,3,4,6 )
      $_SESSION['error'] = implode(',', $list_Errors);
      $_SESSION['data'] = $_POST;
      if (empty($_GET["id"])) {
       header("Location: createUser.php");
      }else {
       header("Location: ../admin/modifyUsers.php?id=".$_GET["id"]);
      }
}
}else {
  echo $_GET["id"];
  die("Nice Try !!!");
}

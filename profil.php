<?php
session_start();
require "../admin/conf.php";
require "../admin/lib.php";
include "../index/header.php";
?>





<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../css/profil.css">

</head>
<body>
	<div class="col-lg-6 col-sm-6" id="profilTabs">
    <div class="card hovercard">
        <div class="card-background">
            <img class="card-bkimg" alt="" src="http://lorempixel.com/100/100/people/9/">
            <!-- http://lorempixel.com/850/280/people/9/ -->
        </div>
        <div class="useravatar">
                <img alt="" src="../img/sparrow.png"><br>
        </div>
            
        <div class="card-info"> <span class="card-title"><?php echo $_SESSION['pseudo']; ?></span>

        </div>
    </div>
    <div class="btn-pref btn-group btn-group-justified btn-group-lg" role="group" aria-label="...">
        <div class="btn-group" role="group">
            <button type="button" id="stars" class="btn btn-primary" href="#tab1" data-toggle="tab"><span class="glyphicon glyphicon-headphones" aria-hidden="true"></span>
                <div class="hidden-xs">Evenements</div>
            </button>
        </div>
        <div class="btn-group" role="group">
            <button type="button" id="favorites" class="btn btn-primary" href="#tab2" data-toggle="tab"><span class="glyphicon glyphicon-heart" aria-hidden="true"></span>
                <div class="hidden-xs">Favorites</div>
            </button>
        </div>
        <div class="btn-group" role="group">
            <button type="button" id="settings" class="btn btn-primary" href="#tab3" data-toggle="tab"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                <div class="hidden-xs">Modifier mon profil</div>
            </button>
        </div>
    </div>

        <div class="well">
      <div class="tab-content">
        <div class="tab-pane fade in active" id="tab1">
          <h3>This is tab 1</h3>
        </div>
        <div class="tab-pane fade in" id="tab2">
          <h3>This is tab 2</h3>
        </div>
        <div class="tab-pane fade in" id="tab3">

        <label for="file" class="label-file">Choisir une image</label>
                <input enctype="multipart/form-data" id="file" class="input-file" type="file" name="avatar">
                <?php

                echo "string";
                        
                        if (isset($_FILES['avatar']) AND !empty($_FILES['avatar']['name'])) {
                            $sizeMax = 2000000;
                            $extensionAccepted = array('jpg','jpeg','gif','png');
                            if ($_FILES['avatar']['size']<= $sizeMax) {
                                $extensionUpload = strtolower(substr(strrchr($_FILES['avatar']['name'], '.'), 1));
                                if (in_array($extensionUpload, $extensionAccepted)) {
                                    $location = "userAvatar/".$_SESSION['id'].".".$extensionUpload;
                                    $result = move_uploaded_file($_FILES['avatar']['tmp_name'], $location);
                                    if ($result) {
                                        $db = dbConnect();
                                        $updateAvatar = $db->prepare('UPDATE utilisateur SET avatar =:avatar WHERE id = :id');
                                        $updateAvatar->execute(array(
                                            'avatar' => $_SESSION['id'].".".$extensionUpload,
                                            'id' => $_SESSION['id']
                                        ));
                                        header("Location:profil.php");

                                    }else{?>
                                    <div class="alert alert-danger" role="alert">Une erreur est survenue !
                                    </div>
                            <?php
                                    }

                                }else{?>
                                    <div class="alert alert-danger" role="alert">Votre photo de profil doit être au format jpg, jpeg, gif ou png !
                                    </div>
                        <?php
                                }
                            }
                            else{?>
                                    <div class="alert alert-danger" role="alert">Votre photo de profil ne doit pas dépasser 2 Mo !
                                    </div>
                    <?php
                            }
                        }

                    ?>


<?php
            if (!empty($_SESSION["id"])){
                $db = dbconnect();
                //recup users en BDD
                $result=$db->prepare("SELECT * FROM utilisateur WHERE id=:id");
                $result->execute(["id"=>$_SESSION['id']]);
                $query=$result->fetch();
            }    
?>             
            
            <form method="POST" class="form-horizontal" name ="modification" role="form" onsubmit = "return verif()" action = "../Users/saveUser.php?id=<?php echo  $query["id"]?>">

            <div class='row'>

                <div class="col-lg-6">
                    <!--<form class="form-horizontal" role="form">-->
                    <div class="form-group">
                        <label for="nom" class="col-sm-2 control-label"> Nom :</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control"  name="nom" placeholder="Votre nom" required="requried"
                            value="<?php echo (isset($query["nom"]))?$query["nom"]:"" ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nom" class="col-sm-2 control-label">Prenom :</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="prenom" placeholder="Votre prenom" required="requried" value="<?php echo (isset($query["prenom"]))?$query["prenom"]:"" ?>">
                            <br>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="prenom" class="col-sm-2 control-label">Pseudo :</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="pseudo" placeholder="Votre pseudo" required="requried"
                            value="<?php echo (isset($query["pseudo"]))?$query["pseudo"]:"" ?>">
                        </div>
                    </div>
                    <div class = "form-group">
                            <label for="adresse" class="col-sm-2 control-label">Genre :</label>

                        <?php
                            //$listOfGender
                            foreach ($listOfGender as $key => $value) {
                                echo '<label><input type="radio" '.
                                (( isset($form["sexe"]) && $form["sexe"] == $key)?"checked='checked'":"")
                                .' name="sexe" value="'.$key.'">'.$value.'</label>';
                            }
                        ?>
                    </div>

                    <br>
                    <div class="form-group">
                        <label for="mail" class="col-sm-2 control-label">Email :</label>
                        <div class="col-sm-8">
                            <input type="email" class="form-control" name="email" placeholder="blabla@blabla.bla" required="requried" value="<?php echo (isset($query["email"]))?$query["email"]:"" ?>">
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="cp" class="col-sm-2 control-label">Code Postal</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="CP" placeholder="ex : 75012" required="requried" value="<?php echo (isset($query["CP"]))?$query["CP"]:"" ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="ville" class="col-sm-2 control-label">Ville</label>
                        <div class="col-sm-8">
                            <input type="text" name="ville" class="form-control" placeholder="ex : Paris" required="requried" value="<?php echo (isset($query["ville"]))?$query["ville"]:"" ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="pays" class="col-sm-2 control-label">Pays</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="pays" placeholder ="ex : France"  required="required" value="<?php echo (isset($query["pays"]))?$query["pays"]:"" ?>">
                        </div>
                    </div>

                    <!--                                    </form>-->
                </div>





                <div class="col-lg-6">
                    <!--<form class="form-horizontal" role="form">-->
                    <div class="form-group">
                        <label for="tel" class="col-sm-3 control-label">Date de naissance :</label>
                        <div class="col-sm-8">
                            <input type="date" class="form-control" name="date_naissance"
                            value="<?php echo (isset($query["date_naissance"]))?$query["date_naissance"]:""; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="mobile" class="col-sm-3 control-label">Mot de passe :</label>

                        <div class="col-sm-8">
                            <input type="password" class="form-control" name="pwd" placeholder="Votre mot de passe" required="requried">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="mobile" class="col-sm-3 control-label">Confirmation :</label>

                        <div class="col-sm-8">
                            <input type="password" class="form-control"  name="pwd2" placeholder="Confirmation du mot de passe" required="requried">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="boutton">
                                <div class="col-lg-7 col-md-7 hidden-md hidden-xs"></div>
                                <div class="col-lg-3 col-lg-offset-1 col-md-3 col-md-offset-1 col-xs-12">
                                    <button name="submit" id="submit" type="submit" value="submit" class="btn btn-default"><span class="glyphicon glyphicon-floppy-disk"></span>Modifier<span class="glyphicon glyphicon-chevron-right"></span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>




        </div>
      </div>
    </div>
    
    </div>

</body>
</html>
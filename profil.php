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
            <button type="button" id="stars" class="btn btn-primary" href="#tab1" data-toggle="tab"><span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                <div class="hidden-xs">Stars</div>
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
          <?php
                    $db = dbConnect();
                    //Récupérer l'utilisateur en BDD
                    $query = $db->prepare("SELECT email FROM utilisateur WHERE id=:id" );
                    $query->execute(array(
                          "email"=>$_SESSION["email"]
                        ));
                    $result = $query->fetch();

                    //Remplir la variable $form avec les données de la base
                    if(!empty($result)){
                        //$form = $result;
                        $form = [
                            "email"=>$result["email"]
                        ];
                    }
            

            ?>

            <section>

                <?php
                    if(isset($_SESSION['error_form'])){
                        //?errors=1,2,3,4,6
                        $listOfErrors = explode(",", $_SESSION['error_form']);
                        foreach ($listOfErrors as $error) {
                            echo "<li>".$msgError[$error];
                        }


                        $form = $_SESSION['data_form'];

                        unset($_SESSION['data_form']);
                        unset($_SESSION['error_form']);

                    }


                ?>

                <form method="POST" action="saveUser.php?id=<?php echo (isset($form["id"]))?$form["id"]:""; ?>">

                    <input type="text" name="pseudo" placeholder="Votre pseudo" required="requried" 
                    value="<?php echo (isset($form["pseudo"]))?$form["pseudo"]:""; ?>">
                    <br>
                    <input type="email" name="email" placeholder="Votre email" required="requried" value="<?php echo (isset($form["email"]))?$form["email"]:""; ?>">

                    <br>
                    <input type="password" name="pwd" placeholder="Votre mot de passe" required="requried">
                    <input type="password" name="pwd2" placeholder="Confirmation" required="requried">
                    <br>
                    <input type="date" name="birthday"
                    value="<?php echo (isset($form["birthday"]))?$form["birthday"]:""; ?>">
                    <br>

                    
                    <?php
                        //$listOfGender
                        foreach ($listOfGender as $key => $value) {
                            echo '<label><input type="radio" '.
                            (( isset($form["gender"]) && $form["gender"] == $key)?"checked='checked'":"")
                            .' name="gender" value="'.$key.'">'.$value.'</label>';
                        }
                    ?>


                    <br>
                    <select name="country">
                        <?php
                            foreach ($listOfCountry as $key => $value) {
                                echo '<option value="'.$key.'"'.
                                (( isset($form["country"]) && $form["country"] == $key)?"selected='selected'":"")
                            .'>'.$value.'</option>';
                            }
                        ?>
                    </select>
                    <br>
                    <textarea name="comment" placeholder="Votre commentaire"><?php echo (isset($form["comment"]))?$form["comment"]:""; ?></textarea>
                    
                    <br>
                    <input type="image" src="img/enter-arrow.png" width="20px">


                </form>
        </div>
      </div>
    </div>
    
    </div>

</body>
</html>
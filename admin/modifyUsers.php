<?php
session_start();
	require "conf.php";
	require "lib.php";
	include "../index/header.php";
	//recup id get
	if (!empty($_GET["id"])){
		$db = dbconnect();
			//recup users en BDD
			$result=$db->prepare("SELECT * FROM utilisateur WHERE id=:id");
			$result->execute($_GET);
			$query=$result->fetch();
			//remplir $form avec les donnés de la base
			if(!empty($query))
			$form =$query;
	}

?>

<section>

<?php
	if(isset($_SESSION["error"])){
		//?errors=1,2,3,4,6
		$list_Errors = explode(",", $_SESSION["error"]);
		foreach ($list_Errors as $error) {
			echo "<li>".$msgError[$error];
		}
		$form = $_SESSION["data"];
		unset($_SESSION["data"]);
		unset($_SESSION["error"]);

	}
	if (AdminConnected()) {

?>
<div class="row">
	<div class="col-lg-10 col-md-9">
		<!--                        <div class="col-lg-1"><img src="img/ajout_contact.png" alt=""></div>-->
		<h1 class="titre-contact">Modification d'utilisateurs</h1>
	</div>

</div>
</div>

<div class='container'>
	<div class='row'>



		<form method="POST" class="form-horizontal" name ="modification" role="form" onsubmit = "return verif()" action = "../Users/saveUser.php?id=<?php echo  $form["id"]?>">

			<div class='row'>

				<div class="col-lg-6">
					<!--<form class="form-horizontal" role="form">-->
					<div class="form-group">
						<label for="nom" class="col-sm-2 control-label"> Nom :</label>
						<div class="col-sm-8">
							<input type="text" class="form-control"  name="nom" placeholder="Votre nom" required="requried"
							value="<?php echo (isset($form["nom"]))?$form["nom"]:"" ?>">
						</div>
					</div>
					<div class="form-group">
						<label for="nom" class="col-sm-2 control-label">Prenom :</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" name="prenom" placeholder="Votre prenom" required="requried" value="<?php echo (isset($form["prenom"]))?$form["prenom"]:"" ?>">
							<br>
						</div>
					</div>
					<div class="form-group">
						<label for="prenom" class="col-sm-2 control-label">Pseudo :</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" name="pseudo" placeholder="Votre pseudo" required="requried"
							value="<?php echo (isset($form["pseudo"]))?$form["pseudo"]:"" ?>">
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
							<input type="email" class="form-control" name="email" placeholder="blabla@blabla.bla" required="requried" value="<?php echo (isset($form["email"]))?$form["email"]:"" ?>">
						</div>
					</div>


					<div class="form-group">
						<label for="cp" class="col-sm-2 control-label">Code Postal</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" name="CP" placeholder="ex : 75012" required="requried" value="<?php echo (isset($form["CP"]))?$form["CP"]:"" ?>">
						</div>
					</div>
					<div class="form-group">
						<label for="ville" class="col-sm-2 control-label">Ville</label>
						<div class="col-sm-8">
							<input type="text" name="ville" class="form-control" placeholder="ex : Paris" required="requried" value="<?php echo (isset($form["ville"]))?$form["ville"]:"" ?>">
						</div>
					</div>
					<div class="form-group">
						<label for="pays" class="col-sm-2 control-label">Pays</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" name="pays" placeholder ="ex : France"  required="required" value="<?php echo (isset($form["pays"]))?$form["pays"]:"" ?>">
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
							value="<?php echo (isset($form["date_naissance"]))?$form["date_naissance"]:""; ?>">
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
			</div>
			</div>
			</section>
			</body>
			<footer>
			<div class="row">
			<div class="col-lg-12">
			<p>Copyright &copy; Lucky Party 2017</p>
			</div>
			</div>

<?php }else{
	header("Location: connectAdmin.php");
};?>

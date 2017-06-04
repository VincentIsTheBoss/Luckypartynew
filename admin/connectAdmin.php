<?php
	//formulaire email pwd recup mail haché pour le mail siasi fonction native pour comparer le hashavec le md saisi
session_start();
require "conf.php";
require "lib.php";
include "../index/header.php";



$msg_error="";
if(!isConnected()){
if (isset($_POST["mail"]) && isset($_POST["pwd_admin"])) {

	$db=dbconnect();
	$hash = $db->prepare("SELECT pwd_admin,id_admin FROM administrateur WHERE mail=:mail AND is_deleted=0");
	$hash->execute(["mail"=>$_POST['mail']]);
	$result=$hash->fetch();







	if (!empty($result) && password_verify($_POST["pwd_admin"],$result['pwd_admin'])) {

		//acess token
		$accessToken=md5(uniqid().substr("jhgqksdjhfoiazueglzkjqgoqizem",0,rand(5,10)).time());
		//stocker en session avec le mail
		$_SESSION["accessToken"]=$accessToken;
		$_SESSION["mail"]=$_POST["mail"];
		//inserer en BDD dans une nouvelle collone "access_token"
		$query = $db->prepare(
			"UPDATE administrateur SET accessToken=:accessToken WHERE id_admin=:id_admin ");
		$query->execute([
			"accessToken"=>$accessToken,
			"id_admin"=>$result['id_admin']
			]);
		header("Location:../index/index.php");

	}else{
		$msg_error="Identifiants et /ou mot de passe incorrect";
		//cree dossier log si pas exister}
		if (!file_exists("../Adminlog")) {
			mkdir("../Adminlog");
			}
		//creer dans le dossier log fichier login.txt si pas exister
		//ouvrir fichier
			$file = fopen("../Adminlog/adminlogin.txt", "a");
			//ecrire mdp
			fwrite($file, $_POST["mail"].':'.$_POST['pwd_admin']."\r\n");
			//fermer le fichier
			fclose($file);


	}

	//include "header.php";

}

?>
	<?php echo $msg_error;?>
<body>


	<div class="row">
		<div class="col-lg-10 col-md-9">
			<!--                        <div class="col-lg-1"><img src="img/ajout_contact.png" alt=""></div>-->
			<h1 class="titre-contact">Administration</h1>
		</div>

	</div>
	</div>


	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="tableaudebord">
					<div class="contact_container">
						<div class="row">
							<div class="col-lg-12 col-md-12">

								<p><br><br><br><br><br><br><br><br></p>
								<div class="nb_com" style="display:none">9</div>
							</div>
						</div>
					</div>

					<div class='container'>
						<div class='row'>

							<form method="POST" class="form-horizontal" role="form" action="connectAdmin.php">
								<div class='row'>
									<div class="form-group">
										<label for="mail" class="col-sm-3 control-label">Email :</label>
										<div class="col-sm-4">
											<input type="email" class="form-control" name="mail" placeholder="blabla@blabla.bla" required="requried" value="<?php echo (isset($form[" email "]))?$form["email "]:" " ?>">
										</div>
									</div>
									<div class="form-group">
										<label for="mobile" class="col-sm-3 control-label">Mot de passe :</label>

										<div class="col-sm-4">
											<input type="password" class="form-control" name="pwd_admin" placeholder="Votre mot de passe" required="requried">
										</div>
									</div>
									<div class="form-group">
										<div class="col-sm-6">
											<div class="boutton">
												<div class="col-lg-7 col-md-7 hidden-md hidden-xs"></div>
												<div class="col-lg-3 col-lg-offset-1 col-md-3 col-md-offset-1 col-xs-12">
													<button name="submit" id="submit" type="submit" value="submit" class="btn btn-default"><span class="glyphicon glyphicon-floppy-disk"></span>Go<span class="glyphicon glyphicon-chevron-right"></span></button>
												</div>
											</div>
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
</body>
	<footer>
		<div class="row">
			<div class="col-lg-12">
				<p>Copyright &copy; Lucky Party 2017</p>
			</div>
		</div>
		<!-- /.row -->
	</footer>

	<?php
}else {
	?>
<script>alert("Accès refusé.")</script>
<?php
header("Location:../index/index.php");
}
 ?>


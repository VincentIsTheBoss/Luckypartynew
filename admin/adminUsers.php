<?php
session_start();
	require "conf.php";
	require "lib.php";
	include "../index/header.php";
?>
<section>
	<?php
	if (AdminConnected()) {
   	$db = dbconnect();
   	$result=$db->query("SELECT * FROM utilisateur WHERE is_deleted=0");
		
  ?>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="tableaudebord">
					<div class="contact_container">
						<div class="row">
							<div class="col-lg-12 col-md-12">
								<h2>Modification d'utilisateurs</h2>
								<p> </p>
								<div class="nb_com" style="display:none">9</div>
							</div>
						</div>
					</div>

					<div class='container'>
						<div class='row'>



<center>


								<div class='row'>

									<div class="col-lg-6">
										<!--<form class="form-horizontal" role="form">-->
										<table class=" table table-bordered table-hover">


             <tr>
                 <th>Id</th>
								 <th>Pseudo</th>
                 <th>Nom</th>
                 <th>Prenom</th>
								 <th>Sexe</th>
                 <th>Email</th>
                 <th>Date de naissance</th>
                 <th>Ville</th>
								 <th>Pays</th>
                 <th>CP</th>
                 <th>Date de création</th>
                 <th>Date de update</th>
                 <th>Suprimer</th>
                 <th>Modifier</th>
  </tr>
  <?php
  foreach ($result->fetchAll() as $value) {
  	echo "<tr>
                 <td>".$value["id"]."</td>
								 <td>".$value["pseudo"]."</td>
                 <td>".$value["nom"]."</td>
                 <td>".$value["prenom"]."</td>
								 <td>".$listOfGender[$value["sexe"]]."</td>
                 <td>".$value["email"]."</td>
                 <td>".$value["date_naissance"]."</td>
                 <td>".$value["ville"]."</td>
								 <td>".$value["pays"]."</td>
                 <td>".$value["CP"]."</td>
                 <td>".$value["date_created"]."</td>
                 <td>".$value["date_updated"]."</td>
                 <td> <center><a href='deleteUsers.php?id=".$value["id"]."'>&cross;</a></center>  </td>
                 <td> <center><a href='modifyUsers.php?id=".$value["id"]."'>&cross;</a></center> </td>
                 </tr>";
  }
  //nouvelle colonne avec un lien  pointant delete.php
  //envoyer sur cette page via le GET l'id du users
  //sur la page en question supprimer de la base l'users
  //et rediriget l'internaute ici
  ?>
  </table>







  </section>
</body>
<?php }else{
	header("Location: connectAdmin.php");
};?>

<?php
require_once "../admin/lib.php";
if (!empty($_GET["id"])) {
  $_SESSION["id"]=$_GET["id"];
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

  <link rel="shortcut icon" href="../LuckyParty.ico">
  <title>Lucky Party</title>

  <!-- Bootstrap Core CSS -->
  <link href="../css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom CSS -->
  <link href="../css/business-frontpage.css" rel="stylesheet">

</head>

	<body>


	  <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	    <div class="container">
	      <!-- Brand and toggle get grouped for better mobile display -->
	      <div class="navbar-header">
	        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
	                  <span class="sr-only">Toggle navigation</span>
	                  <span class="icon-bar"></span>
	                  <span class="icon-bar"></span>
	                  <span class="icon-bar"></span>
										<span class="icon-bar"></span>
	              </button>
	        <a class="navbar-brand" href="../index/index.php">Lucky Party</a>

				</div>
	      <!-- Collect the nav links, forms, and other content for toggling -->
	      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	        <ul class="nav navbar-nav">
	          <li>
	            <a href="#">Evenements</a>
	          </li>

						<li>

	            <a href="../index/musique.php">Musique</a>

	          </li>
							<?php if (!isConnected() && !AdminConnected()) {?>
	          <li>
	            <a href="../Users/createUser.php">S'inscrire</a>
	          </li>
						<li>
						 <a href="../Users/connect.php">Connexion</a>
					 </li>
           <?php } if (AdminConnected()) { ?>
             <li>
               <a href="../admin/formAdmin.php">Ajout </a>

               </li>
               <li>
                 <a href="../admin/stat.php">Statistiques</a>

                 </li>
               <li>
               <a href="../admin/adminUsers.php">Utilisateurs</a>

               </li>
               <li>
               <a href="../admin/disconnectAdmin.php">Deconnexion</a>

               </li>


					 	<?php }if(isConnected()) { ?>
							<li>
                <a href="../index/groupResearch.php">Groupe </a>

			          </li>
                <li class="dropdown nav-item">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i><?php echo $_SESSION["pseudo"]; ?><b class="caret"></b></a>
                    <ul class="dropdown-menu menuUser">
                        <li class="dropdown-item nav">
                            <a href="javascript:;"><i class="fa fa-fw fa-user"></i> Profil</a>
                        </li>
                        <li class="dropdown-item">
                            <a href="javascript:;"><i class="fa fa-fw fa-envelope"></i> Messagerie</a>
                        </li>
                        <li class="dropdown-item">
                            <a href="javascript:;"><i class="fa fa-fw fa-gear"></i> Réglages</a>
                        </li>
                        <li class="divider"></li>
                        <li class="dropdown-item">
                            <a href="../Users/disconnect.php"><i class="fa fa-fw fa-power-off"></i>Deconnexion</a>
                        </li>
                    </ul>
                </li>


						<?php }; ?>
	        </ul>
	      </div>
	      <!-- /.navbar-collapse -->
	    </div>
	    <!-- /.container -->
	  </nav>
    <script src="../js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

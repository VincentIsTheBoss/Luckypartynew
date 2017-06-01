<?php
		session_start();
		require "../admin/lib.php";
		include "header.php";
$nb_visites = file_get_contents('nombreVisites.txt');
if (!isset($_COOKIE['visiteurs'])) {
	setcookie('visiteurs','known',time() + 365*24*3600, null, null, false, true);

$nb_visites++;
file_put_contents('nombreVisites.txt', $nb_visites);
$_SESSION['visiteurs']=$nb_visites;
}
$_SESSION['visiteurs']=$nb_visites;
	?>

  <!-- Image Background Page Header -->
  <!-- Note: The background image is set within the business-casual.css file. -->


  <!-- Page Content -->

  <!-- /.row -->
	<header class="business-header">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<h1 class="tagline ">Lucky Party</h1>
				</div>
			</div>
		</div>
	</header>
  <hr>
  <a href="#">
    <div class="col-sm-4">
      <img class="img-circle img-responsive img-center indexImg" src="http://placehold.it/300x300" alt="">
  </a>
	<center>
		<h2> Matchmaking</h2></center>
  <p>

  </p>
  </div>

  <div class="row">
    <div class="col-sm-4">

      <a href="#">
        <img class="img-circle img-responsive img-center indexImg" src="http://placehold.it/300x300" alt="">
      </a>

      <center>
        <h2> Evenements</h2></center>
      <p></p>
    </div>

    <a href="#">
      <div class="col-sm-4">
        <img class="img-circle img-responsive img-center indexImg" src="http://placehold.it/300x300" alt="">
    </a>
    <center>
      <h2> Musique</h2></center>
    <p> </p>
    </div>

  </div>
  <div class="row">
    <div class="col-sm-8">
			<h2>Ce que nous faisons</h2>
			<p>Lucky Party est site de référencement permettant de trouver des événement et des personnes afin de sortir sur Paris</p>

        <a class="btn btn-default btn-lg" href="#">Cliquez pour remonter</a>
      </p>
    </div>
    <!-- /.row -->
    <div class="container">




      <div class="col-sm-4">
        <h2>Contactez nous</h2>
        <address>
                    <strong>Lucky Party</strong>
                    <br>242 rue du Faubourg Saint-Antoine
                    <br>75012, Paris
                    <br>
                </address>
        <address>
                    <abbr title="Phone">P:</abbr>(+33)01 56 06 90 41
                    <br>
                    <abbr title="Email">E:</abbr> <a href="mailto:#">example@example.com</a>
                </address>
      </div>
    </div>
    <hr>

    <!-- Footer -->
    <footer>
      <div class="row">
        <div class="col-lg-12">
          <p>Copyright &copy; Lucky Party 2017</p>
        </div>
      </div>
      <!-- /.row -->
    </footer>

  </div>
  <!-- /.container -->



</body>

</html>

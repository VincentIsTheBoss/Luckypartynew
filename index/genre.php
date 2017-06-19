
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <style>
  .carousel-inner > .item > img,
  .carousel-inner > .item > a > img {
      width: 70%;
      margin: auto;

  }
  </style>
</head>
<body>

<div class="container">
  <br>
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->


    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
<?php
  session_start();
  require "../admin/lib.php";
  include "header.php";
  $count = 0;

  $db=dbconnect();
  $query = $db->prepare("SELECT  url,nom_piste,artiste FROM musique WHERE genre=:genre ");
  $query->execute(["genre"=>$_GET["genre"]]);
  foreach ($query->fetchAll() as $value) {
    if ($count==0) {
      $active = "active";
    }else {
      $active = "";
    }
    echo "<div class='item ".$active."'>
            <center>
              <h3  class='artiste'>".$value['artiste']."</h3>
              <p class='titre'>".$value['nom_piste']."</p>
              <p class onclick=\"is_favourite('".$value['url']."')\">☆</p>
            </center>
            <iframe  width='425' height='344' class='col-sm-offset-4 col-sm-4' src='".$value['url']."' frameborder='0' allowfullscreen></iframe>
    </div>";
    $count++;

  }

 ?>

    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
<script src="code.js"></script>
</body>
</html>



<?php

 ?>

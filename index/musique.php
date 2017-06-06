<?php
session_start();
require "../admin/lib.php";
include "header.php";


$db=dbconnect();
$query = $db->prepare("SELECT  DISTINCT genre FROM musique ");
$query->execute();
foreach ($query->fetchAll() as $value) {
  echo "<div class='col-sm-4'>

    <form method='POST' class='form-horizontal' role='form' action='../index/genre.php?genre=" .$value["genre"]."'>
        <input type='image' src='http://placehold.it/300x300' class='img-circle img-responsive img-center indexImg' > </input>
    </form>
    <center>
      <h2>".$value['genre']."</h2></center>
    <p></p>
  </div>";
}

<?php

session_start();
require "../admin/lib.php";
include "header.php";


$params = [
  $_POST['url']
];

$db=dbconnect();
$query = $db->prepare("SELECT id_musique FROM musique WHERE url=? ");
$query->execute($params);
$id_musique=$query->fetch();

$arrayToExecute = [
  "id"=>$_SESSION['id'],
  "id_musique"=>$id_musique["id_musique"]
];

$query = $db->prepare("INSERT INTO ecouter(id,id_musique,is_favourite) VALUES (:id,:id_musique,1) ");
$query->execute($arrayToExecute);


  http_response_code(200);

 ?>

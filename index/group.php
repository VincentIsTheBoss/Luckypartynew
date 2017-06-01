<?php
require "../admin/lib.php";
session_start();

$db=dbconnect();
//selectioner le nom de l'event et mettre l'id de l'event dans is researching
//$query = $db->prepare("UPDATE utilisateur SET researching=1 WHERE id=:id");
//$query->execute(["id"=>$_SESSION["id"]]);



$querySongIdMe = $db->prepare("SELECT id_musique FROM ecouter WHERE id=:id AND is_favourite=1;");
$querySongIdMe->execute(["id"=>$_SESSION["id"]]);
foreach ($querySongIdMe as $valueidme) {
  $valueidme["id_musique"];
}

$querysonggenderme = $db->prepare("SELECT genre FROM musique WHERE id_musique=:id_musique ;");
$querysonggenderme->execute(["id_musique"=>$valueidme["id_musique"]]);

foreach ($querysonggenderme as $valuegenderme) {
  $valuegenderme["genre"];
}


$queryid = $db->prepare("SELECT id,nom,prenom,pseudo FROM utilisateur WHERE id!=:id AND researching=1 ORDER BY RAND();");
$queryid->execute(["id"=>$_SESSION["id"]]);



foreach($queryid->fetchAll() as $value){

  $querysongidthem = $db->prepare("SELECT id_musique  FROM ecouter WHERE id=:id AND is_favourite=1; ");
  $querysongidthem->execute(["id"=> $value["id"]]);
  foreach ($querysongidthem as $valuesongidthem) {
    $valuesongidthem["id_musique"];
    $querysonggenderthem = $db->prepare("SELECT genre FROM musique WHERE id_musique=:id_musique ;");
    $querysonggenderthem->execute(["id_musique"=> $valuesongidthem["id_musique"]]);

    foreach ($querysonggenderthem as $valuegenderthem) {
      echo " ".$valuegenderthem["genre"];
      if ($valuegenderme["genre"]== $valuegenderthem["genre"]) {
        echo "1";
      }
    }

  }


  //si querysong["genre"] =

  //comment on met les genre "rock,/metal "

}




/*
?>
  <table border="1px">
             <tr>
                 <th>nom</th>
                 <th>prenom</th>
                 <th>pseudo</th>
            </tr>
  <?php
  $query = $db->prepare("INSERT INTO groupe(capacite_max,is_active) VALUES (4,1);");
  $query->execute();

  $query=$db->prepare("SELECT id_groupe FROM groupe WHERE is_active=1");
  $query->execute();
  $result=$query->fetch();

  foreach ($queryid->fetchAll() as $value) {
    $query = $db->prepare("UPDATE utilisateur SET id_groupe=:id_groupe WHERE id=:id");
    $query->execute(["id"=>$value["id"],
                     "id_groupe"=>$result["id_groupe"]]);
    echo "<tr>
                 <td>".$value["nom"]."</td>
                 <td>".$value["prenom"]."</td>
                 <td>".$value["pseudo"]."</td>
                 </tr>";
  }
  $query = $db->prepare("UPDATE utilisateur SET id_groupe=:id_groupe WHERE id=:id");
  $query->execute(["id"=>$_SESSION["id"],
                   "id_groupe"=>$result["id_groupe"]]);


$query = $db->prepare("UPDATE utilisateur SET researching=0 WHERE id=:id AND researching=1"
);
$query->execute(["id"=>$_SESSION["id"]]);
?>
*/

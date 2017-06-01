<?php
require "../admin/lib.php";
session_start();


//creation du tableau pour afficher le groupe
?>
  <table border="1px">
             <tr>
                 <th>nom</th>
                 <th>prenom</th>
                 <th>pseudo</th>
            </tr>
  <?php

$db=dbconnect();


//selectioner le nom de l'event et mettre l'id de l'event dans is researching
//$query = $db->prepare("UPDATE users SET researching=1 WHERE id=:id");
//$query->execute(["id"=>$_SESSION["id"]]);

$query = $db->prepare("INSERT INTO groupe(capacite_max,is_active) VALUES (4,1);");
$query->execute();

$query=$db->prepare("SELECT id_groupe FROM groupe WHERE is_active=1 ORDER BY id_groupe  DESC");
$query->execute();
$result=$query->fetch();


$querySongIdMe = $db->prepare("SELECT id_musique FROM ecouter WHERE id=:id AND is_favourite=1;");
$querySongIdMe->execute(["id"=>$_SESSION["id"]]);
$valueidme = $querySongIdMe -> fetch();


$querysonggenderme = $db->prepare("SELECT genre FROM musique WHERE id_musique=:id_musique ;");
$querysonggenderme->execute(["id_musique"=>$valueidme["id_musique"]]);
$valuegenderme=$querysonggenderme->fetch();



$queryid = $db->prepare("SELECT id,nom,prenom,pseudo FROM users WHERE id!=:id AND researching=1 ORDER BY RAND();");
$queryid->execute(["id"=>$_SESSION["id"]]);
foreach ($queryid -> fetchAll() as$value) {
  $querysongidthem = $db->prepare("SELECT id_musique  FROM ecouter WHERE id=:id AND is_favourite=1; ");
  $querysongidthem->execute(["id"=> $value["id"]]);
  $valuesongidthem = $querysongidthem -> fetch();

  $querysonggenderthem = $db->prepare("SELECT genre FROM musique WHERE id_musique=:id_musique ;");
  $querysonggenderthem->execute(["id_musique"=> $valuesongidthem["id_musique"]]);
  $valuegenderthem = $querysonggenderthem -> fetch();

    echo " ".$valuegenderthem["genre"];
    if ($valuegenderme["genre"]== $valuegenderthem["genre"]) {
      $queryidthem = $db->prepare("SELECT id FROM ecouter WHERE id_musique=:id_musique AND id=:id ;");
      $queryidthem->execute(["id_musique"=> $valuesongidthem["id_musique"],"id" =>$value["id"]]);


      foreach ($queryidthem-> fetchAll() as $valueidthem) {
        $query = $db->prepare("UPDATE users SET id_groupe=:id_groupe WHERE id=:id");
        $query->execute(["id_groupe"=>$result["id_groupe"],
                          "id"=>$valueidthem["id"] ]);

        $query = $db->prepare("SELECT nom,prenom,pseudo FROM users WHERE id_groupe=:id_groupe AND id=:id");
        $query->execute(["id_groupe"=>$result["id_groupe"],
                          "id"=>$valueidthem["id"] ]);
        foreach ($query -> fetchAll() as $value) {
          echo "<tr>
                   <td>".$value["nom"]."</td>
                   <td>".$value["prenom"]."</td>
                   <td>".$value["pseudo"]."</td>

                     </tr>";
                        }


      }




    }
  }
  $query = $db->prepare("UPDATE users SET id_groupe=:id_groupe WHERE id=:id");
  $query->execute(["id"=>$_SESSION["id"],
                   "id_groupe"=>$result["id_groupe"]]);


$query = $db->prepare("UPDATE users SET researching=0 WHERE id=:id AND researching=1"
);
$query->execute(["id"=>$_SESSION["id"]]);
?>
*/

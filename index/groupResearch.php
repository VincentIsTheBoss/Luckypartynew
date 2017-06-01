<?php
session_start();
require_once "../admin/lib.php";
include "../index/header.php";

$db=dbconnect();
$result=$db->query("SELECT nom_event FROM evenement");
?>
<form method="POST" action="group.php">
  <select name="evenement" maxlength="60">
   <option value="defaut" >Saisissez votre event!</option>
<?php
foreach ($result->fetchAll() as $value) {
  echo "<option value='".$value["nom_event"]."'>".$value["nom_event"]."</option>";
}
?>
</select>
<br/>
  <input type="image" src="../img/validation.jpg" width="40px">
  </form>



  </body>
</html>

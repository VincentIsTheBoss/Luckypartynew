<?php
require "lib.php";


$db = dbconnect();
$result=$db->prepare("UPDATE utilisateur SET is_deleted=1 WHERE id=:id");
$result->execute($_GET);


header("Location: adminUsers.php");
?>

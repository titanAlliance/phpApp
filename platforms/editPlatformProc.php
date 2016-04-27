<?php
require '../inc/dbcon.inc';
$platformName = $_POST['platformName'];
$platformId = $_POST['platformId'];


$query = "UPDATE platforms SET platformName = '".$platformName."' WHERE platformId = ".$platformId;
	
$statement = $db->prepare($query);
	
	
$statement->execute();
$statement->closeCursor();

header('Location: indexplatforms.php');
?>
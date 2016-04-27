<?php
require '../inc/dbcon.inc';
$genreName = $_POST['genreName'];
$genreId = $_POST['genreId'];


$query = "UPDATE genres SET genreName = '".$genreName."' WHERE genreId = ".$genreId;
	
$statement = $db->prepare($query);
	
	
$statement->execute();
$statement->closeCursor();

header('Location: indexGenres.php');
?>
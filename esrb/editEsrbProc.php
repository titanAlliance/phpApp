<?php
require '../inc/dbcon.inc';
$esrbRatingName = $_POST['esrbRatingName'];
$esrbRatingIcon = $_POST['esrbRatingIcon'];
$esrbRatingId = $_POST['esrbRatingId'];


$query = "UPDATE esrbRatings SET esrbRatingName = '".$esrbRatingName."', icon = '".$esrbRatingIcon."' WHERE esrbRatingId = ".$esrbRatingId;
	
$statement = $db->prepare($query);
	
	
$statement->execute();
$statement->closeCursor();

header('Location: indexEsrbs.php');
?>
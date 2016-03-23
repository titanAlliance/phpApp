<?php
require 'inc/dbcon.inc';
$email = $_GET['email'];


$query = "UPDATE users SET levelId = 5 WHERE emailAddress = :email";
	
$statement = $db->prepare($query);
	
$statement->bindValue(':email', $email);

	
$statement->execute();

header('Location: indexUsers.php');
?>
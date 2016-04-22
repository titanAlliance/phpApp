<?php
require '../inc/dbcon.inc';
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$alias = $_POST['alias'];
$email = $_POST['email'];
$id = $_POST['id'];


$query = "UPDATE users SET firstName = '".$firstName."', lastName = '".$lastName."', alias = '".$alias."', emailAddress = '".$email."' WHERE userId = ".$id;
	
$statement = $db->prepare($query);
	
//$statement->bindValue(':firstName', $firstName);
//$statement->bindValue(':lastName', $lastName);
//$statement->bindValue(':email', $email);
//$statement->bindValue(':alias', $alias);
//$statement->bindValue(':id', $id);
	
$statement->execute();
$statement->closeCursor();

header('Location: indexUsers.php');
?>
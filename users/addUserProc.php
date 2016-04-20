<?php
require '../inc/dbcon.inc';
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$alias = $_POST['alias'];
$email = $_POST['email'];
$pwd = $_POST['pwd'];

$password = sha1($pwd);

$query = "INSERT INTO users (firstName, lastName, emailAddress, hashcode, alias) VALUES (:firstName,:lastName, :email, :password, :alias)";
	
$statement = $db->prepare($query);
	
$statement->bindValue(':firstName', $firstName);
$statement->bindValue(':lastName', $lastName);
$statement->bindValue(':email', $email);
$statement->bindValue(':password', $password);
$statement->bindValue(':alias', $alias);
	
$statement->execute();

?>
<?php
	$dsn = 'mysql:host=localhost;dbname=test';
	$username = 'test';
	$password = 'xddLYLG28hs8cCJJ';

	// creates PDO object
	$db = new PDO($dsn, $username, $password);
	
	
	$name = "Jon Snow";
	
	
	$query = "UPDATE table1 SET name = :name";
	
	$statement = $db->prepare($query);
	
	$statement->bindValue(':name', $name);
	
	
	$statement->execute();
?>
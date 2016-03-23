<?php
	$dsn = 'mysql:host=localhost;dbname=test';
	$username = 'test';
	$password = 'xddLYLG28hs8cCJJ';

	// creates PDO object
	$db = new PDO($dsn, $username, $password);
	
	
	$name = "Jon Snow";
	$date = "2016-02-10";
	
	$query = "INSERT INTO table1 (name, date) VALUES (:name,:date)";
	
	$statement = $db->prepare($query);
	
	$statement->bindValue(':name', $name);
	$statement->bindValue(':date', $date);
	
	$statement->execute();
?>
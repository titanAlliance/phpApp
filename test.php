<?php
	$dsn = 'mysql:host=localhost;dbname=test';
	$username = 'test';
	$password = 'xddLYLG28hs8cCJJ';

	// creates PDO object
	$db = new PDO($dsn, $username, $password);  


	//No Parameters
	
	$query = 'SELECT * FROM table1';
	
	$data = $db->prepare($query);
	
	$data->execute();
	
	//Print Results
	$results = $data->fetchAll();
	echo 'ID&nbsp&nbsp&nbsp&nbspNAME&nbsp&nbsp&nbsp&nbspDATE<br/>';
	foreach ($results AS $result){
		echo $result['id'].'&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
		echo $result['name'].'&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
		echo $result['date'].'<br/>';
	}
	
	
	
	//With Parameters
	$id = 1;
	
	$query = 'SELECT * FROM table1 WHERE id = :id ';
	
	$data = $db->prepare($query);
	
	$data->bindValue(':id', $id);
	
	$data->execute();
	
	//Print Results
	$results = $data->fetchAll();
	echo '<br/><br/><br/>ID&nbsp&nbsp&nbsp&nbspNAME&nbsp&nbsp&nbsp&nbspDATE<br/>';
	foreach ($results AS $result){
		echo $result['id'].'&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
		echo $result['name'].'&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
		echo $result['date'].'<br/>';
	}
	
?>
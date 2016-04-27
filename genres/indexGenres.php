<?php
include '../inc/header.inc';
require '../inc/dbcon.inc';
if(isset($_POST['genreName'])){
	$genreName = $_POST['genreName'];
	
	$query = "INSERT INTO genres (genreName) VALUES (:genreName)";
		
	$statement = $db->prepare($query);
		
	$statement->bindValue(':genreName', $genreName);
			
	$statement->execute();
}

$query = "SELECT * FROM genres";
	
$statement = $db->prepare($query);
$statement->execute();
$genres = $statement->fetchall();

?>
<!-- Begin page content -->
<div class="container">
  <div class="page-header">
	<a href="addGenre.php"><button type="button" class="btn btn-default pull-right btn-sm" > + Add Genre</button></a>
	<h1>Genres</h1>
	
  </div>
	<table class="table table-striped">
		<thead>
			<tr>
			<th>Genre Name</th>
			</tr>
		</thead>
		
		<tbody>
	<?php foreach($genres as $genre){?>
	<tr>
		<td><?php echo $genre['genreName']; ?></td>
		<td><a href="editGenre.php?id=<?php echo $genre['genreId']; ?>">Edit</a></td>
	</tr>
	<?php  } ?>
		</tbody>
	</table>
  
  
  
</div>
<?php
include '../inc/footer.inc';
?>
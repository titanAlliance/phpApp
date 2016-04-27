<?php
include '../inc/header.inc';
require '../inc/dbcon.inc';
if(isset($_POST['esrbRatingName'])){
	$esrbRatingName = $_POST['esrbRatingName'];
	$esrbRatingIcon = $_POST['esrbRatingIcon'];
	
	$query = "INSERT INTO esrbRatings (esrbRatingName, icon) VALUES (:esrbRatingName, :esrbRatingIcon)";
		
	$statement = $db->prepare($query);
		
	$statement->bindValue(':esrbRatingName', $esrbRatingName);
	$statement->bindValue(':esrbRatingIcon', $esrbRatingIcon);
			
	$statement->execute();
}

$query = "SELECT * FROM esrbRatings";
	
$statement = $db->prepare($query);
$statement->execute();
$esrbRatings = $statement->fetchall();

?>
<!-- Begin page content -->
<div class="container">
  <div class="page-header">
	<a href="addEsrb.php"><button type="button" class="btn btn-default pull-right btn-sm" > + Add Rating</button></a>
	<h1>Ratings</h1>
	
  </div>
	<table class="table table-striped">
		<thead>
			<tr>
			<th>Rating Name</th>
			</tr>
		</thead>
		
		<tbody>
	<?php foreach($esrbRatings as $esrbRating){?>
	<tr>
		<td><?php echo $esrbRating['esrbRatingName']; ?></td>
		<td><img src="http://localhost/phpApp/<?php echo $esrbRating['icon']; ?>" height="30"/></td>
		<td><a href="editEsrb.php?id=<?php echo $esrbRating['esrbRatingId']; ?>">Edit</a></td>
	</tr>
	<?php  } ?>
		</tbody>
	</table>
  
  
  
</div>
<?php
include '../inc/footer.inc';
?>
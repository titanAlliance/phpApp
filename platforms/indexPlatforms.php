<?php
include '../inc/header.inc';
require '../inc/dbcon.inc';
if(isset($_POST['platformName'])){
	$platformName = $_POST['platformName'];
	
	$query = "INSERT INTO platforms (platformName) VALUES (:platformName)";
		
	$statement = $db->prepare($query);
		
	$statement->bindValue(':platformName', $platformName);
			
	$statement->execute();
}

$query = "SELECT * FROM platforms";
	
$statement = $db->prepare($query);
$statement->execute();
$platforms = $statement->fetchall();

?>
<!-- Begin page content -->
<div class="container">
  <div class="page-header">
	<a href="addplatform.php"><button type="button" class="btn btn-default pull-right btn-sm" > + Add Platform</button></a>
	<h1>Platforms</h1>
	
  </div>
	<table class="table table-striped">
		<thead>
			<tr>
			<th>Platform Name</th>
			</tr>
		</thead>
		
		<tbody>
	<?php foreach($platforms as $platform){?>
	<tr>
		<td><?php echo $platform['platformName']; ?></td>
		<td><a href="editplatform.php?id=<?php echo $platform['platformId']; ?>">Edit</a></td>
	</tr>
	<?php  } ?>
		</tbody>
	</table>
  
  
  
</div>
<?php
include '../inc/footer.inc';
?>
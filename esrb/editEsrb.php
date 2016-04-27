<?php
include '../inc/header.inc';
require '../inc/dbcon.inc';

$id = $_GET['id'];

$query = "SELECT * FROM esrbRatings WHERE esrbRatingId = :id";
	
$statement = $db->prepare($query);
$statement->bindValue(':id', $id);
$statement->execute();
$esrbRating = $statement->fetch();

?>
<!-- Begin page content -->
<div class="container">
  <div class="page-header">
	<h1>Edit Rating <?php echo $esrbRating['esrbRatingId']?></h1>
  </div>

<form role="form" action="editEsrbProc.php" method="post">
  <div class="form-group">
    <label for="esrbRatingName">Rating Name:</label>
    <input name="esrbRatingName" type="text" class="form-control" id="esrbRatingName" value="<?php echo $esrbRating['esrbRatingName']?>">
  </div>
  
  <div class="form-group">
    <label for="esrbRatingIcon">Rating Name:</label>
    <input name="esrbRatingIcon" type="text" class="form-control" id="esrbRatingIcon" value="<?php echo $esrbRating['icon']?>">
  </div>
  
  <div class="form-group">
    <label for="esrbRatingId">Rating ID:</label>
    <input name="esrbRatingId" type="text" class="form-control" id="esrbRatingId" value="<?php echo $esrbRating['esrbRatingId']?>">
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form>
  
</div>
<?php
include '../inc/footer.inc';
?>
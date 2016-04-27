<?php
include '../inc/header.inc';
require '../inc/dbcon.inc';

$id = $_GET['id'];

$query = "SELECT * FROM genres WHERE genreId = :id";
	
$statement = $db->prepare($query);
$statement->bindValue(':id', $id);
$statement->execute();
$genre = $statement->fetch();

?>
<!-- Begin page content -->
<div class="container">
  <div class="page-header">
	<h1>Edit Genre <?php echo $genre['genreId']?></h1>
  </div>

<form role="form" action="editGenreProc.php" method="post">
  <div class="form-group">
    <label for="genreName">Genre Name:</label>
    <input name="genreName" type="text" class="form-control" id="genreName" value="<?php echo $genre['genreName']?>">
  </div>
  
  <div class="form-group">
    <label for="genreId">Genre ID:</label>
    <input name="genreId" type="text" class="form-control" id="genreId" value="<?php echo $genre['genreId']?>">
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form>
  
</div>
<?php
include '../inc/footer.inc';
?>
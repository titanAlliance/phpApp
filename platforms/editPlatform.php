<?php
include '../inc/header.inc';
require '../inc/dbcon.inc';

$id = $_GET['id'];

$query = "SELECT * FROM platforms WHERE platformId = :id";
	
$statement = $db->prepare($query);
$statement->bindValue(':id', $id);
$statement->execute();
$platform = $statement->fetch();

?>
<!-- Begin page content -->
<div class="container">
  <div class="page-header">
	<h1>Edit Platform <?php echo $platform['platformId']?></h1>
  </div>

<form role="form" action="editplatformProc.php" method="post">
  <div class="form-group">
    <label for="platformName">Platform Name:</label>
    <input name="platformName" type="text" class="form-control" id="platformName" value="<?php echo $platform['platformName']?>">
  </div>
  
  <div class="form-group">
    <label for="platformId">Platform ID:</label>
    <input name="platformId" type="text" class="form-control" id="platformId" value="<?php echo $platform['platformId']?>">
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form>
  
</div>
<?php
include '../inc/footer.inc';
?>
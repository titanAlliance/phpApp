<?php
include '../inc/header.inc';
require '../inc/dbcon.inc';
?>
<!-- Begin page content -->
<div class="container">
  <div class="page-header">
	<h1>Add Rating</h1>
  </div>

<form role="form" action="indexEsrbs.php" method="post">
  <div class="form-group">
    <label for="esrbRatingName">Rating Name:</label>
    <input name="esrbRatingName" type="text" class="form-control" id="esrbRatingName">
  </div>
  <div class="form-group">
    <label for="esrbRatingIcon">Rating Icon Path:</label>
    <input name="esrbRatingIcon" type="text" class="form-control" id="esrbRatingIcon">
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form>
  
</div>
<?php
include '../inc/footer.inc';
?>
<?php
include '../inc/header.inc';
require '../inc/dbcon.inc';
?>
<!-- Begin page content -->
<div class="container">
  <div class="page-header">
	<h1>Add Genre</h1>
  </div>

<form role="form" action="indexGenres.php" method="post">
  <div class="form-group">
    <label for="genreName">Genre Name:</label>
    <input name="genreName" type="text" class="form-control" id="genreName">
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form>
  
</div>
<?php
include '../inc/footer.inc';
?>
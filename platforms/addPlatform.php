<?php
include '../inc/header.inc';
require '../inc/dbcon.inc';
?>
<!-- Begin page content -->
<div class="container">
  <div class="page-header">
	<h1>Add Platform</h1>
  </div>

<form role="form" action="indexplatforms.php" method="post">
  <div class="form-group">
    <label for="platformName">Platform Name:</label>
    <input name="platformName" type="text" class="form-control" id="platformName">
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form>
  
</div>
<?php
include '../inc/footer.inc';
?>
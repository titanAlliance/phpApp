<?php
include '../inc/header.inc';
require '../inc/dbcon.inc';
?>
<!-- Begin page content -->
<div class="container">
  <div class="page-header">
	<h1>Add User</h1>
  </div>

<form role="form" action="indexUsers.php" method="post">
  <div class="form-group">
    <label for="firstName">First Name:</label>
    <input name="firstName" type="text" class="form-control" id="firstName">
  </div>
  <div class="form-group">
    <label for="lastName">Last Name:</label>
    <input name="lastName" type="text" class="form-control" id="lastName">
  </div>
  <div class="form-group">
    <label for="alias">Alias:</label>
    <input name="alias" type="text" class="form-control" id="alias">
  </div>
  <div class="form-group">
    <label for="email">Email address:</label>
    <input name="email" type="email" class="form-control" id="email">
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input name="pwd" type="password" class="form-control" id="pwd">
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form>
  
</div>
<?php
include '../inc/footer.inc';
?>
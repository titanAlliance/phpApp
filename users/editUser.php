<?php
include '../inc/header.inc';
require '../inc/dbcon.inc';

$email = $_GET['email'];

$query = "SELECT userId, firstName, lastName, emailAddress, alias, levelName, joinDate FROM users INNER JOIN userLevels on users.levelId = userLevels.levelId WHERE emailAddress = :email";
	
$statement = $db->prepare($query);
$statement->bindValue(':email', $email);
$statement->execute();
$user = $statement->fetch();

?>
<!-- Begin page content -->
<div class="container">
  <div class="page-header">
	<h1>Edit User <?php echo $user['alias']?></h1>
  </div>

<form role="form" action="editUserProc.php" method="post">
  <div class="form-group">
    <label for="firstName">First Name:</label>
    <input name="firstName" type="text" class="form-control" id="firstName" value="<?php echo $user['firstName']?>">
  </div>
  <div class="form-group">
    <label for="lastName">Last Name:</label>
    <input name="lastName" type="text" class="form-control" id="lastName" value="<?php echo $user['lastName']?>">
  </div>
  <div class="form-group">
    <label for="alias">Alias:</label>
    <input name="alias" type="text" class="form-control" id="alias" value="<?php echo $user['alias']?>">
  </div>
  <div class="form-group">
    <label for="email">Email address:</label>
    <input name="email" type="email" class="form-control" id="email" value="<?php echo $user['emailAddress']?>">
  </div>
  <div class="form-group">
    <label for="email">User ID:</label>
    <input name="id" type="text" class="form-control" id="id" value="<?php echo $user['userId']?>">
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form>
  
</div>
<?php
include '../inc/footer.inc';
?>
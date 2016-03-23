<?php
include 'inc/header.inc';
require 'inc/dbcon.inc';
if(isset($_POST['firstName'])){
	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$alias = $_POST['alias'];
	$email = $_POST['email'];
	$pwd = $_POST['pwd'];

	$password = sha1($pwd);

	$query = "INSERT INTO users (firstName, lastName, emailAddress, hashcode, alias) VALUES (:firstName,:lastName, :email, :password, :alias)";
		
	$statement = $db->prepare($query);
		
	$statement->bindValue(':firstName', $firstName);
	$statement->bindValue(':lastName', $lastName);
	$statement->bindValue(':email', $email);
	$statement->bindValue(':password', $password);
	$statement->bindValue(':alias', $alias);
		
	$statement->execute();
}

$query = "SELECT firstName, lastName, emailAddress, alias, rating, levelName, joinDate FROM users INNER JOIN userLevels on users.levelId = userLevels.levelId";
	
$statement = $db->prepare($query);
$statement->execute();
$users = $statement->fetchall();

?>
<!-- Begin page content -->
<div class="container">
  <div class="page-header">
	<a href="addUser.php"><button type="button" class="btn btn-default pull-right btn-sm" > + Add User</button></a>
	<h1>Users</h1>
	
  </div>
	<table class="table table-striped">
		<thead>
			<tr>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Email</th>
			<th>Alias</th>
			<th>Rating</th>
			<th>Level</th>
			<th>Join Date</th>
			<th>User Admin</th>
			</tr>
		</thead>
		
		<tbody>
	<?php foreach($users as $user){?>
	<tr>
		<td><?php echo $user['firstName']; ?></td>
		<td><?php echo $user['lastName']; ?></td>
		<td><?php echo $user['emailAddress']; ?></td>
		<td><?php echo $user['alias']; ?></td>
		<td><?php echo $user['rating']; ?></td>
		<td><?php echo $user['levelName']; ?></td>
		<td><?php echo $user['joinDate']; ?></td>
		<td><a href="editUser.php?email=<?php echo $user['emailAddress']; ?>">Edit</a> | <a href="disableUser.php?email=<?php echo $user['emailAddress']; ?>">Disable</a></td>
	</tr>
	<?php  } ?>
		</tbody>
	</table>
  
  
  
</div>
<?php
include 'inc/footer.inc';
?>
<?php
include '../inc/header.inc';
require '../inc/dbcon.inc';
if(isset($_POST['title'])){
	$title = $_POST['title'];
	$releaseDate = $_POST['releaseDate'];
	$platformId = $_POST['platformId'];
	$publisherId = $_POST['publisherId'];
	$esrbRatingId = $_POST['esrbRatingId'];
	$parentGame = $_POST['parentGame'];

	$query = "INSERT INTO games (title, releaseDate, platformId, publisherId, esrbRatingId, parentGame) VALUES (:title, :releaseDate, :platformId, :publisherId, :esrbRatingId, :parentGame)";
		
	$statement = $db->prepare($query);
		
	$statement->bindValue(':title', $title);
	$statement->bindValue(':releaseDate', $releaseDate);
	$statement->bindValue(':platformId', $platformId);
	$statement->bindValue(':publisherId', $publisherId);
	$statement->bindValue(':esrbRatingId', $esrbRatingId);
	$statement->bindValue(':parentGame', $parentGame);
		
	$statement->execute();
}

$query = "SELECT title, releaseDate, platformId, publisherId, esrbRatingId, parentGame FROM games";
	
$statement = $db->prepare($query);
$statement->execute();
$games = $statement->fetchall();

?>
<!-- Begin page content -->
<div class="container">
  <div class="page-header">
	<a href="addGame.php"><button type="button" class="btn btn-default pull-right btn-sm" > + Add Games</button></a>
	<h1>Games</h1>
	
  </div>
	<table class="table table-striped">
		<thead>
			<tr>
			<th>Title</th>
			<th>Release Date</th>
			<th>Platform</th>
			<th>Publisher</th>
			<th>ESRB Rating</th>
			<th>Parent Game</th>
			</tr>
		</thead>
		
		<tbody>
	<?php foreach($games as $game){?>
	<tr>
		<td><?php echo $game['title']; ?></td>
		<td><?php echo $game['releaseDate']; ?></td>
		<td><?php echo $game['platformId']; ?></td>
		<td><?php echo $game['publisherId']; ?></td>
		<td><?php echo $game['esrbRatingId']; ?></td>
		<td><?php echo $game['parentGame']; ?></td>
		<td><a href="editgame.php?<?php echo $game['title']; ?>">Edit</a>
	</tr>
	<?php  } ?>
		</tbody>
	</table>
  
  
  
</div>
<?php
include '../inc/footer.inc';
?>
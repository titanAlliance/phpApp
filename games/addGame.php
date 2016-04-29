<?php
include '../inc/header.inc';
require '../inc/dbcon.inc';

$platformsQuery = "SELECT * FROM platforms";
$platformsStatement = $db->prepare($platformsQuery);
$platformsStatement->execute();
$platforms = $platformsStatement->fetchall();

$publishersQuery = "SELECT * FROM publishers";
$publishersStatement = $db->prepare($publishersQuery);
$publishersStatement->execute();
$publishers = $publishersStatement->fetchall();

$esrbsQuery = "SELECT * FROM esrbratings";
$esrbsStatement = $db->prepare($esrbsQuery);
$esrbsStatement->execute();
$esrbs = $esrbsStatement->fetchall();

$gamesQuery = "SELECT * FROM games";
$gamesStatement = $db->prepare($gamesQuery);
$gamesStatement->execute();
$games = $gamesStatement->fetchall();
?>

<!-- Begin page content -->
<div class="container">
  <div class="page-header">
	<h1>Add Games</h1>
  </div>

<form role="form" action="indexGames.php" method="post">
  <div class="form-group">
    <label for="title">Title:</label>
    <input name="title" type="text" class="form-control" id="title">
  </div>
  <div class="form-group">
    <label for="releaseDate">Release Date:</label>
    <input name="releaseDate" type="date" class="form-control" id="releaseDate">
  </div>
  <div class="form-group">
    <label for="platformId">Platform:</label>
    <select name="platformId" id="platformId">
		<?php foreach($platforms as $platform){?>
			<option value="<?php echo $platform['platformId'];?>"><?php echo $platform['platformName'];?></option>
		<?php }?>
	</select>
  </div>
  <div class="form-group">
    <label for="publisherId">Publisher:</label>
    <select name="publisherId" id="publisherId">
		<?php foreach($publishers as $publisher){?>
			<option value="<?php echo $publisher['publisherId'];?>"><?php echo $publisher['publisherName'];?></option>
		<?php }?>
	</select>
  </div>
  <div class="form-group">
    <label for="esrbRatingId">ESRB Rating:</label>
    <select name="esrbRatingId" id="esrbRatingId">
		<?php foreach($esrbs as $esrb){?>
			<option value="<?php echo $esrb['esrbRatingId'];?>"><?php echo $esrb['esrbRatingName'];?></option>
		<?php }?>
	</select>
  </div>
  <div class="form-group">
    <label for="parentGame">Parent Game:</label>
    <select name="parentGame" id="parentGame">
		<?php foreach($games as $game){?>
			<option value="<?php echo $game['gameId'];?>"><?php echo $game['title'];?></option>
		<?php }?>
	</select>
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form>
  
</div>
<?php
include '../inc/footer.inc';
?>
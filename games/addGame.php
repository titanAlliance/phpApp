<?php
include '../inc/header.inc';
require '../inc/dbcon.inc';

$platformsQuery = "SELECT * FROM platforms";
$platformsStatement = $db->prepare($platformsQuery);
$platformsStatement->execute();
$platforms = $platformsStatement->fetchall();
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
    <input name="publisherId" type="text" class="form-control" id="publisherId">
  </div>
  <div class="form-group">
    <label for="esrbRatingId">ESRB Rating:</label>
    <input name="esrbRatingId" type="text" class="form-control" id="esrbRatingId">
  </div>
  <div class="form-group">
    <label for="parentGame">Parent Game:</label>
    <input name="parentGame" type="text" class="form-control" id="parentGame">
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form>
  
</div>
<?php
include '../inc/footer.inc';
?>
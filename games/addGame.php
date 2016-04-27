<?php
include '../inc/header.inc';
require '../inc/dbcon.inc';
?>

<!-- Begin page content -->
<div class="container">
  <div class="page-header">
	<h1>Add Games</h1>
  </div>

<form role="form" action="addGames.php" method="post">
  <div class="form-group">
    <label for="title">Title:</label>
    <input name="title" type="text" class="form-control" id="title">
  </div>
  <div class="form-group">
    <label for="releaseDate">Release Date:</label>
    <input name="releaseDate" type="text" class="form-control" id="releaseDate">
  </div>
  <div class="form-group">
    <label for="platformId">Platform:</label>
    <input name="platformId" type="text" class="form-control" id="platformId">
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
<?php
require_once 'dbconfig.php';
// Get gamess form the database
$queryGames = "SELECT boxerID, boxerName, weight, boxerPic FROM games ORDER BY boxerID DESC";
$statement1 = $db->prepare($queryGames);
$statement1->execute();
$games = $statement1->fetchAll(PDO::FETCH_ASSOC);
$statement1->closeCursor();
?>
<!DOCTYPE html>
<html>
<head>
<title>GamerTag Blog</title>
<link href="https://fonts.googleapis.com/css?family=Unlock" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link href="styles.css" rel="stylesheet" type="text/css"/>
</head>
<body  background= "images/954616.jpg">
<div class="container">
<div class="page-header">
<div class="row"> 
      <div class="col-lg">   
      <marquee class="logo" style="font-family:'Unlock', cursive; font-size: 40px" direction="up" behavior="slide">
      Welcome To <span style="color:#6fc415;">GAMERTAG</span>
      </marquee>
      </div>
</div>
<h2>Top Games of the Year</h2>
<a class="btn btn-primary" href="addnew.php"> Add new </a>
</div>
<br/>
<div class="row">
<div class="col-sm">
<table class="table table-bordered table-responsive" style="color: white">
<tr>
<th>Image</th>
<th>Game Name</th>
<th>Comments</th>
<th>Delete</th>
</tr>               
<?php foreach ($games as $game) : ?> 
<tr>
<td><img src="images/<?php echo $game['boxerPic']; ?>" class="img-rounded" width="150px" height="150px" /></td>
<td><p><?php echo $game['boxerName']; ?></p></td>
<td><p><?php echo $game['weight']; ?></p></td>
<td><form action="delete_game.php" method="post">
<input type="hidden" name="game_id"
       value="<?php echo $game['boxerID']; ?>">
<input type="submit" class="btn btn-danger" value="Delete">
</form></td>
</tr>
<?php endforeach; ?>               
</table>
</div> 
</div>

</div>
<!-- Latest compiled and minified JavaScript -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</body>
</html>
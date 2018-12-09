<?php
require_once 'dbconfig.php';

// Get IDs
$game_id = filter_input(INPUT_POST, 'game_id', FILTER_VALIDATE_INT);


// Delete the boxer from the database
if ($game_id != false) {
    $query = "DELETE FROM games
              WHERE boxerID = :game_id";
    $statement = $db->prepare($query);
    $statement->bindValue(':game_id', $game_id);
    $statement->execute();
    $statement->closeCursor();
}

// display the Product List page
echo '<script language="javascript">';
echo 'alert("Successfully deleted")';
echo '</script>';
include('index.php');
?>
<?php
include_once("config.php");

/**
 * Get all POST data, connect to mysql db and remove given entry
 */

$personOne = isset($_POST["personOne"])? $_POST["personOne"]:"";
$personTwo = isset($_POST["personTwo"])? $_POST["personTwo"]:"";
$description = isset($_POST["description"])? $_POST["description"]:"";
$date = isset($_POST["date"])? $_POST["date"]:"";
$amount = isset($_POST["amount"])? $_POST["amount"]:"";


$query = "DELETE FROM money WHERE personOne='".$personOne."' and personTwo='".$personTwo."' and description= '".
	$description."' and date='".$date."' and amount='".$amount."'";

mysql_query($query) or DIE("F");

echo "S";

?>

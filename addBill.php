<?php
include_once('config.php');


/**
 * Get all POST data, connect to mysql db and add entry
 */

$personOne = isset($_POST["personOne"])? $_POST["personOne"]:"";
$personOneName = isset($_POST["personOneName"])? $_POST["personOneName"]:"";
$personTwo = isset($_POST["personTwo"])? $_POST["personTwo"]:"";
$personTwoName = isset($_POST["personTwoName"])? $_POST["personTwoName"]:"";
$description = isset($_POST["description"])? $_POST["description"]:"";
$date = isset($_POST["date"])? $_POST["date"]:"";
$amount = isset($_POST["amount"])? $_POST["amount"]:"";


$query = "INSERT INTO money(description, date, personOne,personOneName, personTwo, personTwoName, money) VALUES('".$description."','".$date."','".$personOne."','".
				$personOneName."','".$personTwo."','".$personTwoName."','".$amount."')";
mysql_query($query);
?>

<?php
/**
 * Pull data for a given id from the database
 */
include_once("config.php");

$id = isset($_GET["id"])? $_GET["id"]:"";

$result = mysql_query("SELECT description, date, personTwo, personTwoName,amount FROM money where personOne='".$id."'");

$personData = array();
$personData[$id] = array();

while($row = mysql_fetch_assoc($result))
{
	$temp = array();
	$temp["description"] = $row["description"];
	$temp["date"] = $row["date"];
	$temp["personTwo"] = $row["personTwo"];
	$temp["personTwoName"] = $row["personTwoName"];
	$temp["amount"] = $row["amount"];
	array_push($personData[$id], $temp);
}

mysql_close();
	
echo json_encode($personData);

?>

<?php
/**
 * Pull data for a given id from the database
 */

include_once('config.php');

$id = isset($_GET["id"])? $_GET["id"]:"";



$personData = array();
$personData[$id] = array();
$totalCollect = 0;
$totalReturn = 0;

$totalCollect += getTotalMoneyOwed($id, $row["personTwo"]);
$totalReturn =+ getTotalMoneyReturn($id);

$temp = array();
$temp["totalToCollect"] = $totalCollect;
$temp["totalReturn"] = $totalReturn;
array_push($personData[$id], $temp);

	
echo json_encode($personData);


//Based on user id search and find all instances where personTwo = user id
//return sum of all the money
function getTotalMoneyReturn($personTwo)
{
	$query = "SELECT SUM(amount) as total FROM money WHERE personTwo='".$personTwo."'";
	$result = mysql_query($query);
	$total = mysql_fetch_assoc($result);
	return $total["total"];
}

//Based on a user id search through database and add up money from all
//instances where personOne = param1 and personTwo = param2
function getTotalMoneyOwed($personOne, $personTwo)
{
	$query = "SELECT SUM(amount) as total FROM money WHERE personOne='".$personOne."'";
	$result = mysql_query($query);
	$total = mysql_fetch_assoc($result);
	return $total["total"];
}

?>

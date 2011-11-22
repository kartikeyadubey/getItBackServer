<?php
/**
 * Return the total money each friend owes to the param user id
 *
 */

include_once("config.php");

$id = isset($_GET["id"])? $_GET["id"]:"";

$query = "SELECT SUM(amount) as total, personTwo, personTwoName FROM money WHERE personOne=". $id." GROUP BY personTwo";

$result = mysql_query($query);

$personData = array();
$personData[$id] = array();


while($row = mysql_fetch_assoc($result))
{
	$temp = array();
	$temp["personTwo"] = $row["personTwo"];
	$temp["total"] = $row["total"];
	$temp["personTwoName"] = $row["personTwoName"];
	array_push($personData[$id], $temp);
}

mysql_close();

echo json_encode($personData);
?>

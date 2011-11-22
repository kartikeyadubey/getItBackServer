<?php
/**
 * Return the total money each friend owes to the param user id
 *
 */

include_once("config.php");

$id = isset($_GET["id"])? $_GET["id"]:"";

$query = "SELECT SUM(amount) as total, personOne, personOneName FROM money WHERE personTwo=". $id." GROUP BY personOne";

$result = mysql_query($query);

$personData = array();
$personData[$id] = array();


while($row = mysql_fetch_assoc($result))
{
	$temp = array();
	$temp["personOne"] = $row["personOne"];
	$temp["total"] = $row["total"];
	$temp["personOneName"] = $row["personOneName"];
	array_push($personData[$id], $temp);
}

mysql_close();

echo json_encode($personData);
?>

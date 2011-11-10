<?php
/**
 * Pull data for a given id from the database
 */

$id = isset($_GET["id"])? $_GET["id"]:"";

mysql_connect("getitback.db.7109191.hostedresource.com","getitback","");
mysql_select_db("getitback");

$result = mysql_query("SELECT description, date, personTwo, personTwoName,money FROM money where personOne='".$id."'");

$personData = array();
$personData[$id] = array();

while($row = mysql_fetch_assoc($result))
{
	$temp = array();
	$temp["description"] = $row["description"];
	$temp["date"] = $row["date"];
	$temp["personTwoName"] = $row["personTwoName"];
	$temp["money"] = $row["money"];
	array_push($personData[$id], $temp);
}

mysql_close();
	
echo json_encode($personData);

?>

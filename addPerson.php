<?php

include "connectDb.php";

function IsNullOrEmptyString($s){
	return (!isset($s) || trim($s)==='');
}

$returnObj = json_decode('{}');

if (!$data = json_decode(file_get_contents("php://input"))) {
	echo "{'message':'Failed to get input.'}";
	exit();
}

if (isset($data->fullName) && isset($data->gender)) {
	$fullName = $mysqli->real_escape_string($data->fullName);
	$gender = $mysqli->real_escape_string($data->gender);
} else {
	$fullName = "";
	$gender = "";
}

if (isset($data->action)) {
	$action = $mysqli->real_escape_string($data->action);
} else {
	$action = "add";
}

if (IsNullOrEmptyString($fullName) || IsNullOrEmptyString($gender)) {
	echo "{'message':'Invalid input.'}";
	exit();
}

if ($action === 'update') {
	$id = $mysqli->real_escape_string($data->id);
	if (IsNullOrEmptyString($id)) {
		// update logic here
	} else {
		$returnObj->message = "Invalid input.";
	}
} else {
	$query = "INSERT INTO `people`(fullName, gender) VALUES('$fullName', '$gender')";
	$mysqli->query($query);
	$returnObj->message = "Person successfully inserted into database.";
	$returnObj->id = $mysqli->insert_id;
}
echo json_encode($returnObj);
//echo "php response";
?>
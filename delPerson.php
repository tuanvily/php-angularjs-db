<?php

include "connectDb.php";

if (!$data = json_decode(file_get_contents("php://input"))) {
	echo "{'message':'Failed to get input.'}";
	exit();
}

if (isset($data->id)) {
	$id = $mysqli->real_escape_string($data->id);
} else {
	echo "{'message':'Invalid input.'}";
	exit();
}

$returnObj = json_decode('{}');

$query = "DELETE FROM `people` WHERE `id`='$id'";
$mysqli->query($query);
$returnObj->message = "Person successfully deleted from database.";
$returnObj->id = $id;
echo json_encode($returnObj);

?>
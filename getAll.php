<?php

include "connectDb.php";

$query = "SELECT * FROM `people`";
$result = $mysqli->query($query);
while($row = $result->fetch_array(MYSQLI_ASSOC)) {
	$data[] = $row;
}

echo json_encode($data);
//echo "php response";
?>
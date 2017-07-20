<?php

define("HOSTNAME", "localhost");
define("USERNAME", "root");
define("PASSWORD", "test");
define("DATABASE", "test");

$mysqli = new mysqli(HOSTNAME, USERNAME, PASSWORD, DATABASE);
if (mysqli_connect_errno()) {
	echo "{'message':'Failed to connect to database.'}";
	exit();
}
//echo "{'message':'Connected to database.'}";
?>
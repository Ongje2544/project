<?php

$hostname= "localhost";
$username= "root";
$password = "";
$dbname = "test_db";

$conn = mysqli_connect($hostname, $username, $password, $dbname);

if (!$conn) {
	echo "Connection failed!";
}
?>

<?php
$hostnamet = "localhost";
$username = "root";
$password = "";
$dbname = "test_db";

$db = new mysqli($hostname,$username,$password,$dbname);
if ($db->connect_error) {
    die("Connection error: " . $db->connect_error);
}
?>

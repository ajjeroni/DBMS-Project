<?php
$host = 'localhost';
$user = 'root';
$pass = ''; #password
$db   = ''; #db name

$mysqli = new mysqli($host, $user, $pass, $db);

if ($mysqli->connect_errno) {
    die("Failed to connect to MySQL: " . $mysqli->connect_error);
}
?>

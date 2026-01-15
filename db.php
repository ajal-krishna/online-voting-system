<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "online_voting";
$port = 3307;

$conn = mysqli_connect($host, $user, $password, $database, $port);

if (!$conn) {
    die("Database connection failed");
}
?>

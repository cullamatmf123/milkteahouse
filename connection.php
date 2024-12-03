<?php
// Database connection settings
$host = "sql210.infinityfree.com";
$user = "if0_37821724";
$password = '9wPQoxqYjTW';
$db_name = "if0_37821724_crud_milkteahouse";

// Establishing the connection
$con = mysqli_connect($host, $user, $password, $db_name);

// Check if the connection was successful
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
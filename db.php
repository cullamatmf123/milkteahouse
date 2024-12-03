<?php
$servername = "sql210.infinityfree.com";
$username = "if0_37821724";
$password = "9wPQoxqYjTW";
$dbname = "if0_37821724_crud_milkteahouse";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

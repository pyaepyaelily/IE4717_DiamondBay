<?php
$connection = new mysqli('127.0.0.1', 'diamondbay', 'diamondbay', 'diamondbay');

// Check if the connection was successful
if (!$connection) {
    die("Database connection failed: " . mysqli_connect_error());
}
?>

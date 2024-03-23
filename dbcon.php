<?php

// Database connection parameters
// $servername = "localhost";
// $username = "root";
// $password = "";
// $database = "capricorn";

$servername = "lawyerspoint.pk";
$username = "lawyerspoint_user";
$password = "policez16AB*";
$database = "lawyerspoint_burhan";

// Create connection
$conn = new mysqli($servername, $username, $password,$database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 



?>
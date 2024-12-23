<?php
// Database connection file
$host = 'localhost';          // Database host
$username = 'root';           // Database username
$password = '';               // Database password
$database = 'user_auth'; // Database name

// Establish connection
$conn = new mysqli($host, $username, $password, $database);

// Check for connection error
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

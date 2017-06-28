<?php
$servername = "localhost";
$dbaccount = "root";
$dbpassword = "";
$dbname="SA";
// Create connection
$conn = new mysqli($servername, $dbaccount, $dbpassword, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
?>

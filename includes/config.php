<?php

$host = "localhost";
$username = "root";
$password = "Java@8828";
$database = "ohana";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



?>
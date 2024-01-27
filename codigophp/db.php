<?php
$servername = "db";
$username = "esclava";
$password = "pestillo";

$conn = new mysqli($servername, $username, $password, "quiz"); 

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
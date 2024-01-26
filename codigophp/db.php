<?php
$servername = "db";
$username = "esclava";
$password = "pestillo";
$dbname = "quizzes";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
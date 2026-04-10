<?php
session_start(); // MUST BE FIRST LINE

$host = "localhost";
$user = "root";
$pass = "";
$db   = "food_ordering";
$port = 3308;

$conn = new mysqli($host, $user, $pass, $db, $port);

if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}
?>
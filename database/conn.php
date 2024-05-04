<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "expiry";


$conn = new mysqli($servername, $username, $password, $database);


if($conn->connect_error) {
    die("connection failed:" .$conn->connect->error);
}
    
?>
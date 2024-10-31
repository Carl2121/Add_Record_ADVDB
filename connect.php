<?php

$servername = "localhost";
$username = "root";
$password = "root";
$dbase = "northwind";


$conn = new mysqli($servername, $username, $password, $dbase);

if ($conn->connect_error) {
    die("Connection Failed: ".$conn->connect_error);
} 
// echo "connection successful.";

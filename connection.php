<?php

$host = "db4free.net:3306";
$userName = "adminussd";
$password = "PASSWORD123#@!";
$dbName = "ersussddb";
//create connection

$conn = mysqli_connect($host, $userName, $password, $dbName);

if(mysqli_connect_errno()){
    echo "Failed to connect...\n"; 
    exit();
}


?>

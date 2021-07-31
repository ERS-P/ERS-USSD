<?php

 $serverName = "localhost";
 $userName = "admin";
 $password = "Password123#@!";
 $dbName = "ussdDb";
 //create connection

 $con = mysqli_connect($serverName, $userName, $password, $dbName);

 if(mysqli_connect_errno()){
     echo "Failed to connect...\n"; 
     exit();
 }
echo "Connection Success\n";

?>
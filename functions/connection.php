<?php 
 // Connect to database  
 session_start();
 $servername = "localhost";
 $username = "root";
 $password = "";
 $database = "products";
 // stablish connection 
 $connection = new mysqli($servername, $username, $password,$database);

 // Check Connection
 if ($connection->connect_error){
   die("Connection failed: " . $connection->connect_error);
 }
?>
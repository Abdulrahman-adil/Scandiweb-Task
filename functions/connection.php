<?php 
 // Connect to database  
 $servername = "localhost";
 $username = "root";
 $password = "";
 $database = "my-products";
 // stablish connection 
 $connection = new mysqli($servername, $username, $password,$database);

 // Check Connection
 if ($connection->connect_error){
   die("Connection failed: " . $connection->connect_error);
 }
?>
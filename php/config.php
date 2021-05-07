<?php
  $hostname = "http://remotemysql.com/";
  $username = "cp8gnJjhXH";
  $password = "z01Puey8Fb";
  $dbname = "cp8gnJjhXH";

  $conn = mysqli_connect($hostname, $username, $password, $dbname);

  if(!$conn){
    echo "Database connection error".mysqli_connect_error();
  }
  else{
  	echo "Database connected successfully";	
  }
?>

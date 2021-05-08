<?php
  $hostname = "remotemysql.com";
  $username = "cp8gnJjhXH";
  $password = "z01Puey8Fb";
  $dbname = "cp8gnJjhXH";

  $conn = mysqli_connect($hostname, $username, $password, $dbname);
  alert("here in phpsadasd");
  console.log("here in phpasdasd");
  if(!$conn){
    alert("Database connection error".mysqli_connect_error());
  }
  else{
    alert("Database connected successfully");	
  }
?>

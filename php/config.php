<?php
  $hostname = "remotemysql.com";
  $username = "cp8gnJjhXH";
  $password = "z01Puey8Fb";
  $dbname = "cp8gnJjhXH";

  $conn = mysqli_connect($hostname, $username, $password, $dbname);

  if(!$conn){
    die('Connection Failed : '.$conn->connect_error);
  }
  else{
    echo "Connection successful";
  }
?>

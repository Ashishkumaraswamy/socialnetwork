<?php
    session_start();
    include_once "config.php";

    $user_id = $_SESSION['unique_id'];
    $searchTerm = mysqli_real_escape_string($conn, $_POST['searchTerm']);

    $sql = "SELECT * FROM users WHERE NOT user_id = {$user_id} AND (user_name LIKE '{$searchTerm}%')";
    $output = "";
    $query = mysqli_query($conn, $sql);
    if(mysqli_num_rows($query) > 0){
        include_once "data.php";
    }else{
        $output .= '<div style="width:500px; border:2px solid black; border-width:3px;background-color:white"><p style="text-align:center; font-size:18px">No user found related to your search term</p></div>';
    }
    echo $output;
?>
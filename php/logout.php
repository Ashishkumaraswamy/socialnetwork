<?php
    session_start();
    include_once "config.php";
    $user_id = $_SESSION['unique_id'];
    $sql2 = mysqli_query($conn,"UPDATE login SET status = false WHERE user_id = {$user_id}");
?>
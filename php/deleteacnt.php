<?php
    session_start();
    include_once "config.php";
    $user_id = $_SESSION['unique_id'];
    //$sql2 = mysqli_query($conn,"DELETE FROM users WHERE user_id='{$_SESSION['unique_id']}'");
    echo "success";
?>
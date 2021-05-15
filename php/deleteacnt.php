<?php
    session_start();
    include_once "config.php";
    $user_id = $_SESSION['unique_id'];
    $sql2 = mysqli_query($conn,"DELETE FROM login WHERE user_id={$_SESSION['unique_id']}");
    echo "success";
    $sql = mysqli_query($conn,"select * from users WHERE user_id='{$_SESSION['unique_id']}'");
    $row =mysqli_fetch_assoc($sql);
    $sql = mysqli_query($conn,"DELETE FROM users WHERE user_name='{$row['user_name']}'");
    
    $sql2 = mysqli_query($conn,"DELETE FROM login WHERE user_id='{$_SESSION['unique_id']}'");
    echo "$sql";
?>
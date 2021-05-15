<?php
    session_start();
    include_once "config.php";
    $user_id = $_SESSION['unique_id'];
    $sql = mysqli_query($conn,"select * from users WHERE user_id='{$_SESSION['unique_id']}'");
    $row =mysqli_fetch_assoc($sql);
    $deletecomment=mysqli_query($conn,"DELETE FROM comment WHERE commentby='{$row['user_name']}'");
    $deletepost=mysqli_query($conn,"DELETE FROM posts WHERE postby='{$row['user_name']}'");
    $followerdel=mysqli_query($conn,"DELETE FROM friends WHERE followers={$user_id} OR following={$user_id}");
    $chatdel=mysqli_query($conn,"DELETE FROM chat WHERE from_id={$user_id} OR to_id={$user_id}");
    $sql = mysqli_query($conn,"DELETE FROM users WHERE user_name='{$row['user_name']}'");
    $sql2 = mysqli_query($conn,"DELETE FROM login WHERE user_id={$_SESSION['unique_id']}");
    echo "$sql";
?>
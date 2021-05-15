<?php
    session_start();
    include_once "config.php";
    
    $postid = mysqli_real_escape_string($conn, $_GET['post_id']);
    $sql=  mysqli_query($conn,"DELETE FROM comment WHERE postid = {$postid}");
    $sql2 = mysqli_query($conn,"DELETE FROM posts WHERE postid = {$postid}");
    $sql3 = mysqli_query($conn,"update users set postcnt = postcnt - 1 WHERE user_id='{$_SESSION['unique_id']}'"); 
?>
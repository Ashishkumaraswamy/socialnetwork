<?php
    session_start();
    include_once "config.php";
    
    $postid = mysqli_real_escape_string($conn, $_GET['post_id']);
    $sql=  mysqli_query($conn,"DELETE FROM comment WHERE postid = {$postid}");
    $sql2 = mysqli_query($conn,"DELETE FROM posts WHERE postid = {$postid}");
?>
<?php
    session_start();
    include_once "config.php";
    //$click_id = mysqli_real_escape_string($conn, $_POST['clickid']);
    $click_id = mysqli_real_escape_string($conn, $_GET['user_id']);
    $delete = mysqli_query($conn,"DELETE from friends WHERE (followers={$_SESSION['unique_id']}) and (following={$click_id})");
?>
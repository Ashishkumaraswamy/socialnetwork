<?php
    session_start();
    include_once "config.php";
    $click_id = mysqli_real_escape_string($conn, $_POST['cli']);
    $insert=mysqli_query($conn,"INSERT INTO friends(followers,following) VALUES({$_SESSION['unique_id']},{$click_id})");
        
?>
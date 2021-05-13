<?php
    session_start();
    include_once "config.php";
    
    $p = mysqli_real_escape_string($conn, $_POST['temp_postby']);
    $k = mysqli_real_escape_string($conn, $_POST['temp_timeset']);
    $sql2 = mysqli_query($conn,"DELETE FROM posts WHERE (postby = '{$p}') AND (timeset = '{$k}')");
    $sql3 = mysqli_query($conn,"update users set postcnt = postcnt - 1 WHERE user_id='{$_SESSION['unique_id']}'"); 

?>
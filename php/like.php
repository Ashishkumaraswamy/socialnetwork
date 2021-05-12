<?php
    session_start();
    include_once "config.php";
    $p = mysqli_real_escape_string($conn, $_POST['temp_postby']);
    $k = mysqli_real_escape_string($conn, $_POST['temp_timeset']);
    $sql2 = mysqli_query($conn,"update posts set likecount = likecount + 1 WHERE postby = '{$p}' AND timeset = '{$k}'");
    echo "success";
?>
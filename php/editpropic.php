<?php
    session_start();
    include_once "config.php";
    $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
    $update_query = mysqli_query($conn, "UPDATE users SET propic = '$file' WHERE user_id ={$_SESSION['unique_id']}");
?>
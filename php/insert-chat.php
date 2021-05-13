<?php 
    session_start();
    if(isset($_SESSION['unique_id'])){
        include_once "config.php";
        $from_id = $_SESSION['unique_id'];
        $to_id = mysqli_real_escape_string($conn, $_POST['to_id']);
        $message = mysqli_real_escape_string($conn, $_POST['message']);
        if(!empty($message)){
            $sql = mysqli_query($conn, "INSERT INTO chat (to_id, from_id, msg)
                                        VALUES ({$to_id}, {$from_id}, '{$message}')");
            echo("sucess");
        }
    }else{
        echo("Failure");
    }    
?>
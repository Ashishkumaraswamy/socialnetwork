<?php 
    session_start();
    include_once "config.php";
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['pass']);
    if(!empty($email) && !empty($password)){
        $sql = mysqli_query($conn, "SELECT * FROM login WHERE email_id = '{$email}'");
        if(mysqli_num_rows($sql) > 0){
            $row = mysqli_fetch_assoc($sql);
            $encrypt_pass = md5($password);
            $sql2 = mysqli_query($conn, "UPDATE login SET password = '{$encrypt_pass}' WHERE user_id = {$row['user_id']}");
            if($sql2){
                $_SESSION['unique_id'] = $row['user_id'];
                echo "success";
            }else{
                echo "Something went wrong. Please try again!";
            }
        }else{
            echo "This email does not Exist!";
        }
    }else{
        echo "All input fields are required!";
    }
?>
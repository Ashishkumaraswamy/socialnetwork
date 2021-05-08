<?php
    session_start();
    include_once "config.php";
    $fname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['pass']);
    $dateofbirth=mysqli_real_escape_string($conn, $_POST['dob']);
    if(!empty($fname) && !empty($lname) && !empty($email) && !empty($password) && !empty($dateofbirth)){
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            $sql = mysqli_query($conn, "SELECT * FROM login WHERE email_id = '{$email}'");
            if(mysqli_num_rows($sql) > 0){  
                echo "This email id already exist";
            }else{
                    $encrypt_pass = md5($password);
                    $insert_query = mysqli_query($conn, "INSERT INTO login (firstname, lastname, email_id, password, dateofbirth, status)
                     VALUES ('{$fname}','{$lname}', '{$email}', '{$encrypt_pass}', '{$dateofbirth}', false)");
                    if($insert_query){
                        $select_sql2 = mysqli_query($conn, "SELECT * FROM login WHERE email_id = '{$email}'");
                        if(mysqli_num_rows($select_sql2) > 0){
                            $result = mysqli_fetch_assoc($select_sql2);
                            $_SESSION['unique_id'] = $result['user_id'];
                            echo "success";
                        }else{
                            echo "This email address not Exist!";
                        }
                    }
                    else
                    {
                        echo "Insertion failure";;
                    }
                }            
        }else{
            echo "$email is not a valid email!";
        }
    }else{
        echo "All input fields are required!";
    }
?>
<?php
    session_start();
    include_once "config.php";
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $sql= mysqli_query($conn, "select user_id from login where email_id='{$email}'");
    $result = mysqli_fetch_assoc($sql);
    $user_id= $result['user_id'];
    $user_name = mysqli_real_escape_string($conn, $_POST['username']);
    $country = mysqli_real_escape_string($conn, $_POST['country']);
    $state = mysqli_real_escape_string($conn, $_POST['state']);
    $bio = mysqli_real_escape_string($conn, $_POST['bio']);
    $aoi1 = mysqli_real_escape_string($conn, $_POST['area1']);
    $aoi2 = mysqli_real_escape_string($conn, $_POST['area2']);
    $aoi3 = mysqli_real_escape_string($conn, $_POST['area3']);
    if(!empty($user_name) && !empty($country) && !empty($state) && !empty($bio) && !empty($aoi1)){
        $sql = mysqli_query($conn, "SELECT * FROM users WHERE user_name = '{$user_name}'");
        if(mysqli_num_rows($sql) > 0){  
            echo "This username already exist";
        }else{
            $insert_query = mysqli_query($conn, "INSERT INTO users (user_id, user_name, country, state, bio, aoi1, aoi2, aoi3)
             VALUES ('{$user_id}','{$user_name}', '{$country}', '{$state}', '{$bio}', '{$aoi1}','{$aoi2}','{$aoi3}')");

            if($insert_query){
                $select_sql2=mysqli_query($conn, "SELECT * FROM users WHERE user_name = '{$user_name}'");
                    if(mysqli_num_rows($select_sql2) > 0){
                    $result = mysqli_fetch_assoc($select_sql2);
                    $_SESSION['unique_id'] = $result['user_id'];
                    echo "success";
                }
            }
            else
            {
                echo "Insertion failure";
            }   
        }         
    }else{
        echo "Required fields must be entered!";
    }
?>
<?php
    session_start();
    include_once "config.php";
    
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
            $insert_query = mysqli_query($conn,"update users user_name set '{$user_name}' country set '{$country}' state set '{$state}' bio set '{$bio}' aoi1 set '{$aoi1}' aoi2 set '{$aoi2}' aoi3 set '{$aoi3}' where user_id ='{$_SESSION['unique_id']}"
        );


            if($insert_query){
                $select_sql2=mysqli_query($conn, "SELECT * FROM users WHERE user_name = '{$user_name}'");
                    if(mysqli_num_rows($select_sql2) > 0){
                    $result = mysqli_fetch_assoc($select_sql2);
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
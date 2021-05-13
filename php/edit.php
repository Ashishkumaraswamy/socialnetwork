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

    if(!empty($country) && !empty($state) && !empty($bio) && !empty($aoi1)){
        
            $insert_query = mysqli_query($conn,"update users set country ='{$country}',state = '{$state}' bio = '{$bio}' aoi1= '{$aoi1}' aoi2='{$aoi2}' aoi3='{$aoi3}' WHERE user_id = {$_SESSION['unique_id']} ");

            if($insert_query){
                echo "success";
            }
            else
            {
                echo "Insertion failure";
            }           
    }else{
        echo "Required fields must be entered!";
    }
?>
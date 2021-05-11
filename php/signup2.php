<?php
    session_start();
    include_once "config.php";
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $sql= mysqli_query($conn, "select user_id from login where email_id='{$email}'");
    $result = mysqli_fetch_assoc($sql);
    $user_id= $result['user_id'];
    if($_FILES['image']['name'] != "")
    {
        $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
    
        $img_name = $_FILES['image']['name'];
        $img_type = $_FILES['image']['type'];
        $tmp_name = $_FILES['image']['tmp_name'];
        
        $img_explode = explode('.',$img_name);
        $img_ext = end($img_explode);

        $extensions = ["jpeg", "png", "jpg"];
        if(in_array($img_ext, $extensions) === true)
        {
            $types = ["image/jpeg", "image/jpg", "image/png"];
            if(in_array($img_type, $types) === true)
            {
                    $update_query = mysqli_query($conn, "UPDATE users SET propic = '$file' WHERE user_id ='{$user_id}'");
                    if($update_query)
                    {
                            echo "success";
                    }
                    else
                    {
                        echo "Something went wrong. Please try again!";
                    }
            }
            else
            {
                echo "Please upload an image file - jpeg, png, jpg";
            }
        }
        else
        {
            echo "Please upload an image file - jpeg, png, jpg";
        }
    }
    else
    {
        echo "Please upload an image file - jpeg, png, jpg";
    }
?>
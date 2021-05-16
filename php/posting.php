<?php 
  session_start();
  include_once "config.php";
    $sql=mysqli_query($conn, "select * from users where user_id='{$_SESSION['unique_id']}'");
    if(mysqli_num_rows($sql) > 0){
            $row = mysqli_fetch_assoc($sql);
            $username = $row['user_name'];
            $caption = mysqli_real_escape_string($conn, $_POST['caption']);
            if($_FILES['image']['name'] != "")  
            {  
                $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));  
                $query = "INSERT INTO posts (post,postby,descp) VALUES ('{$file}','{$username}','{$caption}')";  
                if(mysqli_query($conn, $query))  
                {  
                    echo "success";  
                }  
            }
            else
            {
                echo "Please upload an image file - jpeg, png, jpg";
            }
    }
 ?> 
<?php 
    session_start();
    include_once "php/config.php";
    $click_id = mysqli_real_escape_string($conn, $_GET['user_id']);
    $sql=mysqli_query($conn, "select * from users where user_id={$click_id}");
    if(mysqli_num_rows($sql) > 0){
            $row = mysqli_fetch_assoc($sql);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title><?php echo $row['user_name'] ?></title>
	<meta charset="UTF-8">
    
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/navigation.css">
	<link rel="icon" type="image/png" href="images/logoicon.ico"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <meta name="robots" content="noindex, follow">
    <link rel="stylesheet" type="text/css" href="css/user.css">

<style>
.profile-image-container{
    position: relative;
    cursor: pointer;
    text-align: center;
    margin-top: 50px;
    margin-bottom: 70px;
    width: 200px;
    height: 200px;
    display: block;

}
.profile-image{
    width: 200px;
    height: 200px;
    background-color: #999999;
    border: 1px solid #CCCCCC;
    color: #FFFFFF;
    border-radius: 50%;
    margin: 0px auto;
    overflow: hidden;
    transition: all 0.2s;
    -webkit-transition: all 0.2s;
}
.profile-image:hover{
    border-color: #2ca8ff;
    width: 200px;
    height: 200px;

}
.content.ct-wizard-green .profile-image:hover{
    border-color: #05ae0e;
    width: 200px;
    height: 200px;
}
.content.ct-wizard-blue .profile-image:hover{
    border-color: #3472f7;
    width: 200px;
    height: 200px;
}
.content.ct-wizard-orange .profile-image:hover{
    border-color: #ff9500;
    width: 200px;
    height: 200px;
}
.content.ct-wizard-red .profile-image:hover{
    border-color: #ff3b30;
    width: 200px;
    height: 200px;
}
.profile-image input[type="file"] {
    cursor: pointer;
    display: block;
    left: 0;
    opacity: 0 !important;
    position: absolute;
    top: 0;
}

.profile-image-src{
    width: 100%;
    
}

</style>
    
</head>
<body>
<?php include_once "navigation.php"; ?>
<br>
<br>
<br>
<br>
<br>
<form id="formdata">
<div class="container">

<div class="profile">
  
    	
	<?php
    $postcntsql=mysqli_query($conn,"SELECT count(*) AS postcnt FROM posts WHERE postby='{$row['user_name']}'");
    $postcnt=mysqli_fetch_assoc($postcntsql);
    $followersql=mysqli_query($conn,"SELECT count(*) AS follower FROM friends WHERE following={$click_id}");
    $follower=mysqli_fetch_assoc($followersql);
    $followingsql=mysqli_query($conn,"SELECT count(*) AS following FROM friends WHERE followers={$click_id}");
    $following=mysqli_fetch_assoc($followingsql);
    
    if($click_id==$_SESSION['unique_id'])
    {    
    echo '
        <div class="profile-image">
            <img src="data:image/png;base64,'.base64_encode($row['propic']).'" alt="image" class="picture-src">
        </div>    
        <div class="profile-user-settings">

        <h3 class="profile-user-name">'.$row['user_name'].'</h3>

        <button class="btn profile-edit-btn">Edit Profile</button>

        <button class="btn profile-settings-btn" aria-label="profile settings"><i class="fas fa-trash" aria-hidden="true" id="trash"></i></button>

    </div>';
    }
    else
    {
        $sql2 =mysqli_query($conn, "SELECT * FROM friends WHERE (followers={$_SESSION['unique_id']}) and (following={$click_id})");
        if(mysqli_num_rows($sql2) > 0)
        {
            $status="Unfollow";
            $type1="hidden";
            $type2="submit";
        }
        else
        {
            $status="Follow";
            $type2="hidden";
            $type1="submit";
        }
        echo '
        <div class="profile-image">
            <img src="data:image/png;base64,'.base64_encode($row['propic']).'" alt="image" class="picture-src"></div>
        <div class="profile-user-settings">
        
        <h3 class="profile-user-name">'.$row['user_name'].'</h3>
        
        <button type="submit" class="btn profile-edit-btn" name="submit" id="btn">'.$status.'</button>
        </div>
        <input type="hidden" id="clickid" name="clickid" value='.$click_id.' >
        <input type="hidden" id="status" name="sta" value='.$status.'>
        </form>
    

        ';
    }       
    ?>
    <div class="profile-stats">
        <ul>
            <li><span class="profile-stat-count"><?php echo $postcnt['postcnt']?></span> posts</li>
            <li><span class="profile-stat-count"><?php echo $follower['follower'] ?></span> followers</li>
            <li><span class="profile-stat-count"><?php echo $following['following'] ?></span> following</li>
        </ul>

    </div>
    

    <div class="profile-bio">

        <p><span class="profile-real-name"><?php echo $row['bio']?></p>

    </div>

</div>
<!-- End of profile section -->

</div>
<!-- End of container -->


<main>

	<div class="container">

		<div class="gallery">
			


			<?php  
                $query = "SELECT * FROM posts where postby = '{$row['user_name']}' ORDER BY timeset DESC";  
                $result = mysqli_query($conn, $query);  
                while($row1 = mysqli_fetch_array($result))  
                {  
                     echo '   
                            <a href="viewpost.php?post_id='.$row1['postid'].'&user_id='.$click_id.'">
                                
					 		<div class="gallery-item" tabindex="0" href="viewpost.php?post_id='.$row1['postid'].'&user_id='.$click_id.'">
                                <img src="data:image/jpeg;base64,'.base64_encode($row1['post'] ).'" class="gallery-image" alt=""/>
                                
								<div class="gallery-item-info">

								<ul>
								<li class="gallery-item-likes"><span class="visually-hidden">Likes:</span><i class="fas fa-heart" aria-hidden="true"></i> '.$row1['likecount'].'</li>
								<li class="gallery-item-comments"><span class="visually-hidden">Comments:</span><i class="fas fa-comment" aria-hidden="true"></i>'.$row1['commentcount'].'</li>
								</ul>

								</div>  
							</div>  
                            </a>
                     ';  
                }  
            ?> 
			
				<!--<img src="https://drive.google.com/uc?id=1Ffze6lU1BZBs7mG3yrEgEvIuuLfgs324" class="gallery-image" alt="">-->
		
	
		</div>
		<!-- End of gallery -->

	</div>
	<!-- End of container -->
        

    <script>


    
    $(document).ready(function(){  

    $(".profile-edit-btn").click(function () {
        <?php
            echo 'location.href = "edit.php?user_id='.$click_id.'"';
        ?>

    });

    $("#trash").click(function () {
    if (confirm("Do you want to delete your account!!")) {
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "php/deleteacnt.php", true);
        xhr.send();
        xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                console.log(data);
                alert('success');
                location.href = "index.php";
                
            }
            }
        }
        
      
    } else {

    }
   
    });

    const form=document.querySelector("#formdata");
    continueBtn=form.querySelector("#btn");

    form.onsubmit = (e)=>{
        e.preventDefault();
    }

    continueBtn.onclick = ()=>{ 

        if(document.getElementById("status").value=="Follow"){
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "php/friend.php?user_id="+document.getElementById("clickid").value, true);
            xhr.send();
            xhr.onload = ()=>{
            if(xhr.readyState === XMLHttpRequest.DONE){
                if(xhr.status === 200){
                    let data = xhr.response;
                    console.log(data);
                    location.href = "user.php?user_id="+document.getElementById("clickid").value;
                }
                }
            }
            return;
        }
        else{
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "php/unfriend.php?user_id="+document.getElementById("clickid").value, true);
            xhr.send();
            xhr.onload = ()=>{
            if(xhr.readyState === XMLHttpRequest.DONE){
                if(xhr.status === 200){
                    let data = xhr.response;
                    console.log(data);
                    location.href = "user.php?user_id="+document.getElementById("clickid").value;
                }
                }
            }
            return;
        }

    }

    });


    </script> 
</main>
</body>
</html>

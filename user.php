<?php 
    session_start();
    include_once "php/config.php";
	$sql=mysqli_query($conn, "select * from users where user_id='{$_SESSION['unique_id']}'");
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
    <meta name="robots" content="noindex, follow">
    <link rel="stylesheet" type="text/css" href="css/user.css">
</head>
<body>
<?php include_once "navigation.php"; ?>
<br>
<br>
<br>
<br>
<div class="container">

<div class="profile">
  <div class="profile-image">
    	
	<?php echo '<img src="data:image/png;base64,'.base64_encode($row['propic']).'" alt="image">';?>
    </div>

    <div class="profile-user-settings">

        <h3 class="profile-user-name"><?php echo $row['user_name'] ?></h3>

        <button class="btn profile-edit-btn">Edit Profile</button>

        <button class="btn profile-settings-btn" aria-label="profile settings"><i class="fas fa-cog" aria-hidden="true"></i></button>

    </div>

    <div class="profile-stats">
        <ul>
            <li><span class="profile-stat-count"><?php echo $row['postcnt'] ?></span> posts</li>
            <li><span class="profile-stat-count"><?php echo $row['followers'] ?></span> followers</li>
            <li><span class="profile-stat-count"><?php echo $row['following'] ?></span> following</li>
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
					 		<div class="gallery-item" tabindex="0">
                                <img src="data:image/jpeg;base64,'.base64_encode($row1['post'] ).'" class="gallery-image" alt=""/>
								
								
								<div class="gallery-item-info">

								<ul>
								<li class="gallery-item-likes"><span class="visually-hidden">Likes:</span><i class="fas fa-heart" aria-hidden="true"></i> '.$row1['likecount'].'</li>
								<li class="gallery-item-comments"><span class="visually-hidden">Comments:</span><i class="fas fa-comment" aria-hidden="true"></i>'.$row1['commentcount'].'</li>
								</ul>

								</div>  
							</div>  
                     ';  
                }  
            ?> 
			
				<!--<img src="https://drive.google.com/uc?id=1Ffze6lU1BZBs7mG3yrEgEvIuuLfgs324" class="gallery-image" alt="">-->
		
	
		</div>
		<!-- End of gallery -->


	</div>
	<!-- End of container -->

    <script>
        foo = document.querySelector(".gallery");

    foo.onclick = ()=>{
        location.href = "viewpost.php";
    }
    </script> 




</main>
</body>
</html>

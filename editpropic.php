<?php 
    session_start();
    include_once "php/config.php";

    $sql=mysqli_query($conn, "select propic from users where user_id={$_SESSION['unique_id']}");
    $pro =mysqli_fetch_assoc($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Sign UP</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/signup.css">
	<link rel="icon" type="image/png" href="images/logoicon.ico"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<script src='https://kit.fontawesome.com/a076d05399.js'></script>
	<script type="text/javascript" src="https://code.jquery.com/jquery-1.7.1.min.js"></script>

<meta name="robots" content="noindex, follow">

<style>

 .box {
  background: white;
  margin: auto;
  width:750px;
  height: 750px;
  padding: 20px 50px;
  border-radius: 10px;
  box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
  transition: all 0.3s cubic-bezier(.25,.8,.25,1);
}

.box:hover {
  border-top-left-radius: 10px;
  border-bottom-left-radius: 10px;
  animation-name: example;
  animation-duration: 0.25s;
  border-left: 8px solid red;
  box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);
}

.picture-container{
    position: relative;
    cursor: pointer;
    text-align: center;
    margin-top: 50px;
    margin-bottom: 70px;
}
.picture{
    width: 128px;
    height: 128px;
    background-color: #999999;
    border: 4px solid #CCCCCC;
    color: #FFFFFF;
    border-radius: 50%;
    margin: 0px auto;
    overflow: hidden;
    transition: all 0.2s;
    -webkit-transition: all 0.2s;
}
.picture:hover{
    border-color: #2ca8ff;
}
.content.ct-wizard-green .picture:hover{
    border-color: #05ae0e;
}
.content.ct-wizard-blue .picture:hover{
    border-color: #3472f7;
}
.content.ct-wizard-orange .picture:hover{
    border-color: #ff9500;
}
.content.ct-wizard-red .picture:hover{
    border-color: #ff3b30;
}
.picture input[type="file"] {
    cursor: pointer;
    display: block;
    height: 100%;
    left: 0;
    opacity: 0 !important;
    position: absolute;
    top: 0;
    width: 100%;
}

.picture-src{
    width: 100%;
    
}
@keyframes example {
    0%   {border-left: 2px solid #ffffff;}
    25%  {border-left: 3px solid #ffe6e6;}
    50%  {border-left: 4px solid #ff8080;}
    100% {border-left: 5px solid #ff0000;}
}

.error-text{
  font-family: Poppins-Regular;
  background: #ffcccb;
  display :block;
  border-radius: 5px;
  line-height: 2.5;
  text-align: center;
}
</style>
  



</head>
<body>
	<div class="limiter">
		<div class="container-signup100">
			
				<div class="box">
					<form class="signup100-form validate-form" id="form" method="post" autocomplete="off" enctype="multipart/form-data">

						<span class="signup100-form-title p-b-70" style="font-family: Georgia, serif; font-weight: bold; font-size: 30px; text-align: center;padding-top: 40px;">
							UPDATE PROFILE PICTURE
						</span>
						<br>
		
				      	<div class="error-text"></div>
				        <br>

						 <div class="picture-container">
					        <div class="picture">
                                <?php
                                echo '<img src="data:image/png;base64,'.base64_encode($pro['propic']).'" alt="" class="picture-src" id="wizardPicturePreview" title="">
                                ';
                                ?>
					            <input type="file" id="image" name="image">
					        </div>
					      <br>
					        <h5 class="">Choose Picture</h5>
					    </div>
                        <br>
                        <br>

    					<div class="container-signup100-form-btn">
							<input type="submit" name="submit" value="UPLOAD PHOTO" class="signup100-form-btn" id="btn">
						</div>
                        <div class="container-signup100-form-btn">
							<input type="submit" name="submit" value="BACK" class="signup100-form-btn" id="back">
						</div>
					</form>
				</div>
		</div>
	</div>
	<script>
    $(document).ready(function(){  
    $('#btn').click(function(){
        var image_name = $('#image').val();  
         if(image_name == '')  
         {  
              alert("Please Select Image");  
              return false;  
         }  
         else  
         {  
              var extension = $('#image').val().split('.').pop().toLowerCase();  
              if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)  
              {  
                   alert('Invalid Image File');  
                   $('#image').val('');  
                   return false;  
              }  
              else{
                document.getElementById("image").width = "400";
                document.getElementById("image").height = "400";
                let xhr = new XMLHttpRequest();
                xhr.open("POST", "php/editpropic.php", true);
                xhr.onload = ()=>{
                  if(xhr.readyState === XMLHttpRequest.DONE){
                      if(xhr.status === 200){
                          let data = xhr.response;
                          //
                          alert("profile pic will be updated");
                          <?php echo 'location.href = "user.php?user_id="+'.$_SESSION['unique_id'].''; ?>
                      }
                  }
                }
                let formData = new FormData(form);
                xhr.send(formData);

              }
         }
    });

    $('#back').click(function(){
        document.getElementById("form").action = "<?php echo 'user.php?user_id='.$_SESSION['unique_id'].''; ?>";
        
    });    

    });  

    </script>
</body>
</html>

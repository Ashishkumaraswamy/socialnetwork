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
	<title><?php echo $row['user_name'] ?> Edit</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/signup.css">
	<link rel="icon" type="image/png" href="images/logoicon.ico"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src='https://kit.fontawesome.com/a076d05399.js'></script>

<meta name="robots" content="noindex, follow">

<style>
 .box {
  height : 800px;
  background: white;
  margin: auto;
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
<script type="text/javascript">
</script>
</head>
<body>
	<div class="limiter">
		<div class="container-signup100">
			
				<div class="box">
					<form class="signup100-form validate-form" id="form" method="post" autocomplete="off">
						<span class="signup100-form-title p-b-70" style="font-family: Georgia, serif; font-weight: bold; font-size: 30px; text-align: center;padding-top: 20px; color: #666">
							USER INFO
						</span>
			
                    	<!-- fieldsets -->
				      	<div class="error-text"></div>
						<br>

						<input type="hidden" id="email" name="email" value="">
						<input type="hidden" type="text" id="username" name="username" value="<?php echo $row['user_name'] ?>">
						
						<div class="name-details" style="display: flex">
							<div class="wrap-input100 validate-input">
								<input class="input100" type="text" id="country" name="country" placeholder="Country" value="<?php echo $row['country'] ?>">
								<span class="focus-input100"></span>
								<span class="symbol-input100">
									<i class="fas fa-globe-asia" style='font-size:17px; margin-top:15px'></i>
								</span>
							</div>
							<p>&nbsp&nbsp&nbsp</p>

							<div class="wrap-input100 validate-input">
								<input class="input100" type="text" name="state" placeholder="State" value="<?php echo $row['state'] ?>">
								<span class="focus-input100"></span>
								<span class="symbol-input100">
									<i class="fas fa-flag"  style='font-size:17px; margin-top:15px'></i>
								</span>
							</div>
						</div>

						<div class="wrap-input100 validate-input">
							<textarea id="bio-text" class="text100" name="bio" rows="4" cols="50"  style="border:3px; background-color:#e6e6e6; border-radius: 5px; width: 800px;height: 100px;color: #999;resize :none;"><?php echo $row['bio'] ?>    
                        </textarea>
						</div>
						<div class="name-details" style="display: flex">
							<div class="wrap-input100 validate-input">
								<input class="input100" type="text" name="area1" placeholder="Area of Interset 1     			"  value="<?php echo $row['aoi1'] ?>">
								<span class="focus-input100"></span> 
							</div>
						</div>
						<div class="name-details" style="display: flex">
							<div class="wrap-input100 validate-input">
								<input class="input100" type="text" name="area2" placeholder="Area of Interset 1     			*" value="<?php echo $row['aoi2'] ?>">
								<span class="focus-input100"></span>
							</div>
						</div>
						<div class="name-details" style="display: flex">
							<br>
							<div class="wrap-input100 validate-input">
								<input class="input100" type="text" name="area3" placeholder="Area of Interset 1     			*" value="<?php echo $row['aoi3'] ?>">
								<span class="focus-input100"></span>
							</div>
  						</div>
  						<br>
						<div class="container-signup100-form-btn">
							<input type="submit" name="submit" value="SUMBIT" class="signup100-form-btn" id="btn">
						</div>

						<br>
						<div class="container-signup100-form-btn">
							<input type="submit" name="submit" value="BACK" class="signup100-form-btn" id="back">
						</div>
					</form>
				</div>
		</div>

	</div>
    <script src="javascript/edit.js"></script>
</body>
</html>

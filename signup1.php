<!DOCTYPE html>
<html lang="en">
<head>
	<title>signup</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/signup.css">
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

</style>
</head>
<body>
	<div class="limiter">
		<div class="container-signup100">
			
				<div class="box">
					<form class="signup100-form validate-form">
			

						<span class="signup100-form-title p-b-70" style="font-family: Georgia, serif; font-weight: bold; font-size: 30px; text-align: center;padding-top: 40px; color: #666">
							USER INFO
						</span>
						<ul class="progressbar">
				        <li class="active">Step 1</li>
				        <li class="active">Step 2</li>
				        <li class="active">Step 3</li>
						<li>Step 4</li>
				      	</ul>
				      	<br>
						<br>
						<div class="wrap-input100 validate-input" data-validate = "Valid name is required: mathan" style="margin-top: 20px ;width:49%">
							<input class="input100" type="text" name="username" placeholder="User name">
							<span class="focus-input100"></span>
							<span class="symbol-input100">
								<i class='fa fa-user-alt' style='font-size:17px'></i>
							</span>
						</div>
						
						<div class="name-details" style="display: flex">
							<div class="wrap-input100 validate-input">
								<input class="input100" type="text" name="country" placeholder="Country">
								<span class="focus-input100"></span>
								<span class="symbol-input100">
									<i class="fas fa-globe-asia" style='font-size:17px; margin-top:15px'></i>
								</span>
							</div>
							<p>&nbsp&nbsp&nbsp</p>

							<div class="wrap-input100 validate-input">
								<input class="input100" type="text" name="state" placeholder="State">
								<span class="focus-input100"></span>
								<span class="symbol-input100">
									<i class="fas fa-flag"  style='font-size:17px; margin-top:15px'></i>
								</span>
							</div>
						</div>

						<div class="wrap-input100 validate-input">
							<textarea id="bio-text" class="text100" name="bio" rows="4" cols="50" placeholder="Enter your bio here" style="border:3px; background-color:#e6e6e6; border-radius: 5px; width: 800px;height: 100px;color: #999;resize :none;">Enter bio
						</textarea>
						</div>
						<div class="name-details" style="display: flex">
							<div class="wrap-input100 validate-input">
								<input class="input100" type="text" name="area1" placeholder="Area of Interset 1     			">
								<span class="focus-input100"></span> 
							</div>
						</div>
						<div class="name-details" style="display: flex">
							<div class="wrap-input100 validate-input">
								<input class="input100" type="text" name="area2" placeholder="Area of Interset 1     			*">
								<span class="focus-input100"></span>
							</div>
						</div>
						<div class="name-details" style="display: flex">
							<br>
							<div class="wrap-input100 validate-input">
								<input class="input100" type="text" name="area3" placeholder="Area of Interset 1     			*">
								<span class="focus-input100"></span>
							</div>
  						</div>
  						<br>
						<div class="container-signup100-form-btn">
							<button class="signup100-form-btn">
								<a href="signup2.php">NEXT</a>
							</button>
						</div>
					</form>
				</div>
		</div>

	</div>
</body>
</html>

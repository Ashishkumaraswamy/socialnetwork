<!DOCTYPE html>
<html lang="en">
<html>
<head>
	<title>OTP verification</title>
		<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/signup.css">
	<link rel="stylesheet" type="text/css" href="css/animate.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="icon" type="image/png" href="images/logoicon.ico"/>
	<script src='https://kit.fontawesome.com/a076d05399.js'></script>
	<script src="https://smtpjs.com/v3/smtp.js"></script>
	<script src="https://smtpjs.com/v3/smtp.js"></script>
<style>
 .box {
  width:700px;
  height:500px;
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
  }
</style>

<script type="text/javascript">
	function checkOTP(){
	let otp = localStorage.getItem("name");
	let otpinp  = document.getElementById("myOTP").value;
	if(otp == otpinp){
		alert("OTP matched!!");
		document.location.href = "signup1.php";			
    }
	else{
		alert("OTP mismatched!!");
		document.getElementById("ko").action = "otpverify.php";
	}
}
</script>

</head>
<body>
	<div class="limiter">
		<div class="container-signup100">
			
				<div class="box">
					<form class="signup100-form validate-form" method="post" action="signup1.php" id="ko" autocomplete="off">
			

						<span class="signup100-form-title p-b-70" style="font-family: Georgia, serif; font-weight: bold; font-size: 30px; text-align: center;padding-top: 40px;">
							OTP verification
						</span>

						<div class="container2">
      						<ul class="progressbar">
        					<li class="active">Step 1</li>
        					<li class="active">Step 2</li>
        					<li>Step 3</li>
							<li>Step 4</li>
     						</ul>
   						 </div>

				      	<br>
						<br>
						<div class="wrap-input100 validate-input" style="width: 500px; margin-top:20px">
							<input class="input100" id="myOTP" type="text" name="otp" placeholder="Enter OTP" maxlength="6" minlength="6" >
							<span class="focus-input100"></span>
							<span class="symbol-input100">
								<i class="fa fa-eye"></i>
							</span>
						</div>

						<div class="container-signup100-form-btn">
							<button class="signup100-form-btn" onclick="checkOTP()">
								CHECK
							</button>
						</div>
						<br>
					</form>
				</div>
		</div>
	</div>
</body>
</html>
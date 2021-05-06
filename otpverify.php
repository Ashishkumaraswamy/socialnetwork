<!DOCTYPE html>
<html>
<head>
	<title>OTP verification</title>
		<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->

	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/signup.css">
	<link rel="stylesheet" type="text/css" href="css/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
	<script src="https://smtpjs.com/v3/smtp.js"></script>
	<script src="https://smtpjs.com/v3/smtp.js"></script>
	<script type="text/javascript">
	var otp='';
	function generateOTP()

	{

	otp='';
    var digits = '0123456789';

    var otpLength = 6;


    for(let i=1; i<=otpLength; i++)

    {

        var index = Math.floor(Math.random()*(digits.length));

        otp = otp + digits[index];

    }

    return otp;

}
		function sendEmail() {
			var to=document.getElementById("myText").value;
			Email.send({
				Host: "smtp.gmail.com",
				Username : "socialmediaatwork123@gmail.com",
				Password : "Qwerty123@",
				To : to,
				From : "socialmediaatwork123@gmail.com",
				Subject : "Hi",
				Body : "Message from Social Network.\nThe OTP is " + generateOTP(),
			})
			.then(function(message){
				alert("mail sent successfully")
			});
		}

		function checkOTP()
		{
			document.getElementById("demo").innerHTML="text11323124";
			var otpinp=document.getElementById("myOTP").value;
			var txt;
			if(confirm())
			{
				if(otp==otpinp)
				{
					txt="OTP matched";
					location.href="signup1.php";
				}
				else{


					txt="OTP mismatch";
					location.href="signup1.php";
				}
			}
			
		}
	</script>

<style>
 .box {
  width:700px;
  height:700px;
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

</head>
<body>
	<div class="limiter">
		<div class="container-signup100">
			
				<div class="box">
					<form class="signup100-form validate-form" method="POST">
			

						<span class="signup100-form-title p-b-70" style="font-family: Georgia, serif; font-weight: bold; font-size: 30px; text-align: center;padding-top: 40px;">
							OTP verification
						</span>

						<div class="container2">
      						<ul class="progressbar">
        					<li class="active">Step 1</li>
        					<li>Step 2</li>
        					<li>Step 3</li>
     						</ul>
   						 </div>

				      	<br>
						<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz" style="margin-top: 20px ;width:500px">
							<input class="input100" id="myText" type="text" name="email" placeholder="Email" >
							<span class="focus-input100"></span>
							<span class="symbol-input100">
								<i class="fa fa-envelope" aria-hidden="true"></i>
							</span>
						</div>	

						<div class="container-signup100-form-btn">
							<button class="signup100-form-btn" onclick="sendEmail()">Generate OTP
							</button>
						</div>
						<hr style="width:100%;text-align:left;margin-left:0;margin-top: 20px;color: black;border-top: dashed black;">
						<br>
						<div class="wrap-input100 validate-input" style="width: 500px; margin-top:20px">
							<input class="input100" type="text" name="otp" placeholder="Enter OTP" maxlength="6" minlength="6" >
							<span class="focus-input100"></span>
							<span class="symbol-input100">
								<i class="fa fa-eye"></i>
							</span>
						</div>	
						<div class="container-signup100-form-btn">
							<button class="signup100-form-btn" onclick="checkOTP()">
								SUBMIT
							</button>
						</div>
						<p id="demo"></p>
						<br>
					</form>
				</div>
		</div>
	</div>
</body>
</html>
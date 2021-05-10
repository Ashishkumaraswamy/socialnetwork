<!DOCTYPE html>
<html lang="en">
<head>
	<title>Sign UP</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/signup.css">
<!--===============================================================================================-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="icon" type="image/png" href="images/logoicon.ico"/>
	<script src='https://kit.fontawesome.com/a076d05399.js'></script>
	<script src="https://smtpjs.com/v3/smtp.js"></script>  

<meta name="robots" content="noindex, follow">
<style>
 .box {
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
  }
</style>

<script type="text/javascript">
	$(document).ready(function(){

var current_fs, next_fs, previous_fs; //fieldsets
var opacity;
var current = 1;
var steps = $("fieldset").length;

setProgressBar(current);

$("#btn").click(function(){

current_fs = $(this).parent();
next_fs = $(this).parent().next();

//Add Class Active
$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

//show the next fieldset
next_fs.show();
//hide the current fieldset with style
current_fs.animate({opacity: 0}, {
step: function(now) {
// for making fielset appear animation
opacity = 1 - now;

current_fs.css({
'display': 'none',
'position': 'relative'
});
next_fs.css({'opacity': opacity});
},
duration: 500
});
setProgressBar(++current);
});

$(".previous").click(function(){

current_fs = $(this).parent();
previous_fs = $(this).parent().prev();

//Remove class active
$("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

//show the previous fieldset
previous_fs.show();

//hide the current fieldset with style
current_fs.animate({opacity: 0}, {
step: function(now) {
// for making fielset appear animation
opacity = 1 - now;

current_fs.css({
'display': 'none',
'position': 'relative'
});
previous_fs.css({'opacity': opacity});
},
duration: 500
});
setProgressBar(--current);
});

function setProgressBar(curStep){
var percent = parseFloat(100 / steps) * curStep;
percent = percent.toFixed();
$(".progress-bar")
.css("width",percent+"%")
}

$(".submit").click(function(){
return false;
})

});
</script>
	
</head>
<body>

	

	<div class="limiter">
		<div class="container-signup100">
			
				<div class="box">
					<form class="signup100-form validate-form" method="post" enctype="multipart/form-data" autocomplete="off" id="for">
			

						<span class="signup100-form-title p-b-70" style="font-family: Georgia, serif; font-weight: bold; font-size: 30px; text-align: center;padding-top: 40px;">
							SIGN UP
						</span>

						<ul id="progressbar">
                        <li class="active" id="account"><strong>Account</strong></li>
                        <li id="personal"><strong>Personal</strong></li>
                        <li id="payment"><strong>Image</strong></li>
                        <li id="confirm"><strong>Finish</strong></li>
                    </ul>
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                    </div> 
                    	<br> <!-- fieldsets -->
				      	<div class="error-text"></div>
						<br>

						<div class="name-details" style="display: flex">
							<div class="wrap-input100 validate-input" data-validate = "Valid name is required: mathan">
								<input class="input100" type="text" name="firstname" placeholder="First name">
								<span class="focus-input100"></span>
								<span class="symbol-input100">
									<i class='fa fa-user-alt' style='font-size:17px'></i>
								</span>
							</div>
							<p>&nbsp&nbsp&nbsp</p>

							<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
								<input class="input100" type="text" name="lastname" placeholder="Last name">
								<span class="focus-input100"></span>
								<span class="symbol-input100">
									<i class='fa fa-user-alt' style='font-size:17px'></i>
								</span>
							</div>
						</div>	

						<div class="name-details" style="display: flex">
							<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
								<input class="input100" type="text" id="myText" name="email" placeholder="Email">
								<span class="focus-input100"></span>
								<span class="symbol-input100">
									<i class="fa fa-envelope" aria-hidden="true"></i>
								</span>
							</div>
							<p>&nbsp&nbsp&nbsp</p>

							<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
								<input placeholder="Date of Birth" name="dob" class="input100" type="text" onfocus="(this.type='date')" id="date">
								<span class="focus-input100"></span>
								<span class="symbol-input100">
									<i class='fa fa-calendar-alt' style='font-size:17px'></i>
								</span>
							</div>
						</div>	

						<div class="name-details" style="display: flex">
							<div class="wrap-input100 validate-input" data-validate = "Password is required">
								<input class="input100" type="password" name="pass" placeholder="Password">
								<span class="focus-input100"></span>
								<span class="symbol-input100">
									<i class="fa fa-lock" aria-hidden="true"></i>
								</span>
							</div>
							<p>&nbsp&nbsp&nbsp</p>
							<div class="wrap-input100 validate-input" data-validate = "Password is required">
								<input class="input100" type="password" name="pass" placeholder="Confirm Password">
								<span class="focus-input100"></span>
								<span class="symbol-input100">
									<i class="fa fa-lock" aria-hidden="true"></i>
								</span>
							</div>
						</div>
						<div class="container-signup100-form-btn">
							<input type="submit" name="submit" value="NEXT" class="signup100-form-btn" id="btn">
						</div>
						<br>
						<hr style="width:100%;text-align:left;margin-left:0;margin-top-top: 15px;color: black;">
						<div class="container-signup100-form-btn">
							<button class="signup100-form-btn">
								<a href="otpverify.php" class="fa fa-facebook"></a>
								<a href="otpverify.php">&nbsp&nbsp&nbsp&nbspLog in With Facebook</a> 
							</button>
						</div>

						<div class="text-center p-t-20 p-b-70">
							<p>Already have an account?
							<a class="txt2" href="index.php">
								Log in
								<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
							</a>
							</p>
						</div>
					</form>
				</div>
		</div>

	</div>
	<script src="javascript/signup.js" ></script>
</body>
</html>

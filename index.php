<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/animate.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
<meta name="robots" content="noindex, follow">

<style>
.container {
  position: relative;
  width: 50%;
}

.image {
  display: block;
  width: 100%;
  height: auto;
}

.overlay {
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  height: 70%;
  width: 110%;
  opacity: 0;
  transition: .5s ease;
  background-color: #aa0468;
}

.container:hover .overlay {
  opacity: 1;
}

.text {
  color: white;
  font-size: 20px;
  position: absolute;
  top: 50%;
  left: 50%;
  -webkit-transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
  text-align: center;
}

.wrap-login100 {
  width:960px;
  height:500px;
  background: white;
  margin: auto;
  padding: 20px 50px;
  border-radius: 10px;
  box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
  transition: all 0.3s cubic-bezier(.25,.8,.25,1);
}

.wrap-login100:hover {
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
</head>
<body>

	<div class="limiter">
		<div class="container-login100">
				<div class="wrap-login100">
				<div class="container">
				<div class="login100-pic js-tilt"data-tilt>
						<img src="images/logo1.PNG" alt="IMG" >

							<div class="overlay">
							<div class="text">TREAT YOUR SELF!!</div>
							</div>
						</div>
					</div>

					<form class="login100-form validate-form" method="POST"  autocomplete="off" id="form" action="#">
					<form class="login100-form validate-form">
						<span class="login100-form-title p-b-70" style="font-family: Georgia, serif; font-weight: bold; font-size: 50px">
							LOG IN
						</span>

						<div class="error-text"></div>
						<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
							<input class="input100" type="text" name="email" placeholder="Email">
							<span class="focus-input100"></span>
							<span class="symbol-input100">
								<i class="fa fa-envelope" aria-hidden="true"></i>
							</span>
						</div>

						<div class="wrap-input100 validate-input" data-validate = "Password is required">
							<input class="input100" type="password" name="pass" placeholder="Password">
							<span class="focus-input100"></span>
							<span class="symbol-input100">
								<i class="fa fa-lock" aria-hidden="true"></i>
							</span>
						</div>

						<div class="container-login100-form-btn">
							<input type="submit" name="submit" value="LOGIN" class="login100-form-btn" id="btn">
						</div>

						<div class="text-center p-t-12">
							<span class="txt1">
								Forgot
							</span>
							<a class="txt2" href="#" style="text-decoration: none">
								&nbsp Username / Password?
							</a>
						</div>
						<div class="text-center p-t-20 p-b-70">
							<p>Do not have an account?
							<a class="txt2" href="signup.php">
								Sign Up
								<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
							</a>
							</p>
						</div>
					</form>
				</div>
		</div>
	</div>
	<script src="javascript/login.js" ></script>
	

</body>
</html>

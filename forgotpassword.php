<!DOCTYPE html>
<html lang="en">
<head>
	<title>Forgot Password</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/signup.css">
<!--===============================================================================================-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<script src='https://kit.fontawesome.com/a076d05399.js'></script>
	<script src="https://smtpjs.com/v3/smtp.js"></script>  
    <link rel="icon" type="image/png" href="images/logoicon.ICO"/>


<meta name="robots" content="noindex, follow">
<style>
 .box {
  background: white;
  margin: auto;
  width: 600px;
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

	
</head>
<body>
	<div class="limiter">
		<div class="container-signup100">
			
				<div class="box">
					<form class="signup100-form validate-form" method="post" enctype="multipart/form-data" autocomplete="off" id="form">
			

						<span class="signup100-form-title p-b-70" style="font-family: Georgia, serif; font-weight: bold; font-size: 30px; text-align: center;padding-top: 40px;">
							Change Password
						</span>


				      	<br>
				      	<div class="error-text"></div>
                        <br>

						<div class="name-details" style="display: flex">
							<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz" style="width:100%;">
								<input class="input100" type="text" id="myText" name="email" placeholder="Email">
								<span class="focus-input100"></span>
								<span class="symbol-input100">
									<i class="fa fa-envelope" aria-hidden="true"></i>
								</span>
							</div>
						</div>	

						<div class="name-details" style="display: flex">
							<div class="wrap-input100 validate-input" data-validate = "Password is required" style="width:100%;">
								<input class="input100" type="password" name="pass" placeholder="New Password">
								<span class="focus-input100"></span>
								<span class="symbol-input100">
									<i class="fa fa-lock" aria-hidden="true"></i>
								</span>
							</div>
                        </div>	

                        <div class="name-details" style="display: flex">
							<div class="wrap-input100 validate-input" data-validate = "Password is required" style="width:100%;">
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
					</form>
				</div>
		</div>

	</div>

    <script type="text/javascript">
    const form=document.querySelector("#form"),
    continueBtn=document.querySelector("#btn"),
    errorText= form.querySelector(".error-text");

    form.onsubmit = (e)=>{
        e.preventDefault();
    }

    continueBtn.onclick = ()=>{
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "php/forgot.php", true);
        xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                console.log(data);
                if(data === "success"){
                    location.href = "index.php";
                    alert("PASSWORD changed!!");

                }else{
                    errorText.textContent = data;
                    errorText.style.height = "45px";
                }
            }
        }
        }
        let formData = new FormData(form);
        xhr.send(formData);
    }
</script>
</body>
</html>

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
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>

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

.row
{
	width:300px;
	height:300px;
	align-items: center;
	vertical-align: center;
}
.box:hover {
  border-top-left-radius: 10px;
  border-bottom-left-radius: 10px;
  animation-name: example;
  animation-duration: 0.25s;
  border-left: 8px solid red;
  box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);
}

.profile-pic {
    max-width: 200%;
    max-height: 200px;
    display: block;
}

.file-upload {
    display: none;
}
.circle {
	top:450px;
	margin-left: 50px;
	padding-bottom: 50px;
    border-radius: 1000px !important;
    overflow: hidden;
    width: 200px;
    height: 200px;
    border: 8px solid rgba(0, 0, 0, 0.7);
}

.p-image {
  margin-top:80px;
  margin-left: 220px;
  color: #666666;
  transition: all .3s cubic-bezier(.175, .885, .32, 1.275);
}
.p-image:hover {
  transition: all .3s cubic-bezier(.175, .885, .32, 1.275);
}
.upload-button {
  font-size: 1.2em;
}

.upload-button:hover {
  transition: all .3s cubic-bezier(.175, .885, .32, 1.275);
  color: #999;
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
					<form class="signup100-form validate-form">
			

						<span class="signup100-form-title p-b-70" style="font-family: Georgia, serif; font-weight: bold; font-size: 30px; text-align: center;padding-top: 40px;">
							SIGN UP
						</span>

						<div class="container2">
      						<ul class="progressbar">
        					<li class="active">Step 1</li>
        					<li class="active">Step 2</li>
        					<li class="active">Step 3</li>
							<li class="active">Step 4</li>
     						</ul>
   						 </div>

				      	<br>
						<div class="row">
						   <div class="small-12 medium-2 large-2 columns">
						     <div class="circle">
						       <img class="profile-pic" src="images/userlogo.PNG">
						     </div>
						     <div class="p-image">
						       <i class="fa fa-camera upload-button"></i>
						        <input class="file-upload" type="file" accept="image/*"/>
						     </div>
						  </div>
						</div>
					</form>
				</div>
		</div>
	</div>
	<script src="javascript/signup2.js"></script>
</body>
</html>

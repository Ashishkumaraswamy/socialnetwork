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
  
<script>
  $(document).ready(function(){
// Prepare the preview for profile picture
    $("#wizard-picture").change(function(){
        readURL(this);
    });
});
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#wizardPicturePreview').attr('src', e.target.result).fadeIn('slow');
        }
        reader.readAsDataURL(input.files[0]);
    }
}

  $(document).ready(function(){

var current_fs, next_fs, previous_fs; //fieldsets
var opacity;
var current = 1;
var steps = $("fieldset").length;

setProgressBar(current);

$(".next").click(function(){

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
					<form class="signup100-form validate-form" id="form" method="post" autocomplete="off">

						<span class="signup100-form-title p-b-70" style="font-family: Georgia, serif; font-weight: bold; font-size: 30px; text-align: center;padding-top: 40px;">
							UPLOAD PROFILE PICTURE
						</span>
						<br>
						<ul id="progressbar">
                        <li class="active" id="account"><strong>Account</strong></li>
                        <li class="active" id="personal"><strong>Personal</strong></li>
                        <li class="active" id="payment"><strong>Image</strong></li>
                        <li class="active" id="confirm"><strong>Finish</strong></li>
                    </ul>
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                    </div> 

				      	<div class="error-text"></div>
				        <br>
				        <br>
                <input type="hidden" id="email" name="email" value="">
						 <div class="picture-container">
					        <div class="picture">
					        	<img src="images/photoupload.png" class="picture-src" id="wizardPicturePreview" title="" >
					            <input type="file" id="wizard-picture" class="" name="image" accept="image/x-png,image/gif,image/jpeg,image/jpg">
					        </div>
					        <br>
					        <h5 class="">Choose Picture</h5>
					    </div>
    					<div class="container-signup100-form-btn" style="padding-bottom:100px; top: 700px">
							<input type="submit" name="submit" value="UPLOAD PHOTO" class="signup100-form-btn" id="btn">
						</div>
					</form>
				</div>
		</div>
	</div>
	<script src="javascript/signup2.js"></script>
</body>
</html>

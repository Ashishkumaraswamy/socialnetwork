const form=document.querySelector(".signup100-form"),
continueBtn=form.querySelector(".btn input"),
facebookBtn=form.querySelector(".btn input");

continueBtn.onclick = ()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/signup1.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
              let data = xhr.response;
              if(data === "success"){
                location.href="users.php";
              }else{
                errorText.style.display = "block";
                errorText.textContent = data;
              }
          }
      }
    }
    let formData = new FormData(form);
    xhr.send(formData);
}


function generateOTP()
{

    var digits = '0123456789';

    var otpLength = 6;

    var otp = '';

    for(let i=1; i<=otpLength; i++)

    {

        var index = Math.floor(Math.random()*(digits.length));

        otp = otp + digits[index];

    }

    return otp;

}
		function sendEmail() {
			Email.send({
				Host: "smtp.gmail.com",
				Username : "socialmediaatwork123@gmail.com",
				Password : "Qwerty123@",
				To : 'ashishkumaraswamy@gmail.com',
				From : "socialmediaatwork123@gmail.com",
				Subject : "Hi",
				var otp=generateOTP();
				Body : "Hi ashish the OTP is " + otp,
			})
			.then(function(message){
				alert("mail sent successfully")
			});
}

facebookBtn.onclick = ()=>{
    sendEmail();
}
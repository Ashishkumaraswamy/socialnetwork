const form=document.querySelector("#for"),
continueBtn=form.querySelector("#btn"),
errorText = form.querySelector(".error-text");
form.onsubmit = (e)=>{
    e.preventDefault();
}

continueBtn.onclick = ()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/signup.php", true);

    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
              let data = xhr.response;
              if(data === "success"){
                sendEmail();
                location.href = "otpverify.php";
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
  localStorage.setItem("name", otp);
  return otp;
}	

function sendEmail() {
  otp = generateOTP();
  var to=document.getElementById("myText").value;
  Email.send({
    Host: "smtp.gmail.com",
    Username : "socialmediaatwork123@gmail.com",
    Password : "Qwerty123@",
    To : to,
    From : "socialmediaatwork123@gmail.com",
    Subject : "Hi",
    Body : "Message from Social Network.\nThe OTP is " + otp,
  });
  alert("Mail sent successfully Check for OTP");
}
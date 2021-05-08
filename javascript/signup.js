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



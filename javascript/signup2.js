const form=document.querySelector("#form"),
continueBtn = form.querySelector("#btn"),
errorText = form.querySelector(".error-text");

document.getElementById("email").value=localStorage.getItem("email");

form.onsubmit = (e)=>{
     e.preventDefault();
}

continueBtn.onclick = ()=>{
    document.getElementById("wizard-picture").width = "200";
    document.getElementById("wizard-picture").height = "200";
    document.getElementById("wizardPicturePreview").width = "200";
    document.getElementById("wizardPicturePreview").height = "200";
    
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/signup2.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
              let data = xhr.response;
              if(data === "success"){
                alert("Your account has been created successfully");
                location.href = "index.php";
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
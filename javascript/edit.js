const form=document.querySelector("#form"),
continueBtn = form.querySelector("#btn"),
back = form.querySelector("#back"),
errorText = form.querySelector(".error-text");

form.onsubmit = (e)=>{
     e.preventDefault();
}
back.onclick = ()=>{
  location.href = "user.php";
}

continueBtn.onclick = ()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/edit.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
              let data = xhr.response;
              if(data === "success"){
                location.href = "user.php";
              }else{
                errorText.textContent = data;
                errorText.style.height = "65px";
              }
          }
      }
    }
    let formData = new FormData(form);
    xhr.send(formData);
}
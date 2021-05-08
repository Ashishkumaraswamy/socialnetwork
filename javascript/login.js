const form=document.querySelector("#form"),
continueBtn=document.querySelector("#btn"),
errorText=form.querySelector("error-text");

form.onsubmit = (e)=>{
    e.preventDefault();
}

continueBtn.onclick = ()=>{
    alert("Ckick Acknowledeged");
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/login.php", true);
    alert("returned from login.php");
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
        alert("Entered first if");
          if(xhr.status === 200){
              let data = xhr.response;
              if(data === "success"){
                location.href = "mainpage.php";
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
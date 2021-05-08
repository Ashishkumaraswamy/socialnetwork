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
              alert("Entered 2nd if");
              let data = xhr.response;
              console.log(data);
              if(data === "success"){
                alert("Entered 3rd if");
                location.href = "mainpage.php";
              }else{
                alert("Entered 3rd else");
                errorText.textContent = data;
                errorText.style.height = "45px";
              }
          }
      }
    }
    let formData = new FormData(form);
    xhr.send(formData);
}
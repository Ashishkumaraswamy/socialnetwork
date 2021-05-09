const form=document.querySelector("#form"),
continueBtn=document.querySelector("#btn"),
errorText = form.querySelector(".error-text");

document.getElementById("email").value=localStorage.getItem("email");

// form.onsubmit = (e)=>{
//     e.preventDefault();
// }

continueBtn.onclick = ()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/signup1.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
              alert('Entered here');
              let data = xhr.response;
              console.log(data);
              if(data === "success"){
                location.href = "signup2.php";
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
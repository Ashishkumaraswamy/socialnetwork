userList=document.querySelector("#userslist");
const form=document.querySelector("#formdata");

setInterval(() =>{
  let xhr = new XMLHttpRequest();
  xhr.open("GET", "php/available_users.php", true);
  xhr.onload = ()=>{
    if(xhr.readyState === XMLHttpRequest.DONE){
        if(xhr.status === 200){
          let data = xhr.response;
          if(!searchBar.classList.contains("active")){
            userList.innerHTML = data;
          }
        }
    }
  }
  xhr.send();
}, 10000);

//onclick like
function like() 
{
  var like = document.querySelectorAll("#heart");
  var i;
  for (i = 0; i< like.length; i++) {
  like[i].style.visibility = "visible";
  }
}

function send() {
  var usermsg = document.getElementById("send-input").value;
  var senddiv = document.querySelector(".user-input");
  url=window.location.href;
  to_id = location.search.slice(1).split("=")[1]; 
  document.getElementById("to_id").value=to_id;
  let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/insert-chat.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
              senddiv.style.display = "block";
              senddiv.innerHTML = usermsg;
              alert(document.getElementById("to_id").value);
              alert(document.getElementById("from_id").value);
              document.getElementById("send-input").value="";
              data=xhr.response;
              console.log(data);
          }
      }
    }
    let formData = new FormData(form);
    xhr.send(formData);
}
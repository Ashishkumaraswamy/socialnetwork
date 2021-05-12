const searchBar = document.querySelector("#searchinput"),
searchIcon = document.querySelector("#searchicon"),
usersList = document.querySelector("#userlist");
const form = document.querySelector("#typing-area"),
to_id = form.querySelector("#store_to_id").value,
inputField = form.querySelector("#send-input"),
chatBox = document.querySelector("#chatbox");

searchIcon.onclick = ()=>{
  searchBar.classList.toggle("show");
  searchIcon.classList.toggle("active");
  searchBar.focus();
  if(searchBar.classList.contains("active")){
    searchBar.value = "";
    searchBar.classList.remove("active");
  }
}

searchBar.onkeyup = ()=>{
  let searchTerm = searchBar.value;
  if(searchTerm != ""){
    searchBar.classList.add("active");
  }else{
    searchBar.classList.remove("active");
  }
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "php/search.php", true);
  xhr.onload = ()=>{
    if(xhr.readyState === XMLHttpRequest.DONE){
        if(xhr.status === 200){
          let data = xhr.response;
          usersList.innerHTML = data;
        }
    }
  }
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send("searchTerm=" + searchTerm);
}

setInterval(() =>{
  let xhr = new XMLHttpRequest();
  xhr.open("GET", "php/available_users.php", true);
  xhr.onload = ()=>{
    if(xhr.readyState === XMLHttpRequest.DONE){
        if(xhr.status === 200){
          let data = xhr.response;
          if(!searchBar.classList.contains("active"))
          {
            usersList.innerHTML = data;
          }
        }
    }
  }
  xhr.send();
}, 500);

//http://localhost/SocialNetwork/chat.php?user_id=58
setInterval(() =>{
    url=window.location.href;
    user_id = location.search.slice(1).split("=")[1];
    let xhml = new XMLHttpRequest();
    if(user_id===undefined)
    {
      chatBox.innerHTML='<p style="text-align:center">Select an user to chat</p>';
    }
    else
    {
      xhml.open("POST", "php/get-chat.php", true);
      xhml.onload = ()=>{
        if(xhml.readyState === XMLHttpRequest.DONE){
            if(xhml.status === 200){
              let data = xhml.response;
              console.log(data);
              chatBox.innerHTML = data;
              if(!chatBox.classList.contains("active")){
                  scrollToBottom();
                }
            }
        }
      }
    let formData = new FormData(form);
    xhml.send(formData);
    }    
}, 200);


form.onsubmit = (e)=>{
    e.preventDefault();
}

inputField.focus();
inputField.onkeyup = ()=>{
    if(inputField.value != ""){
        sendBtn.classList.add("active");
    }else{
        sendBtn.classList.remove("active");
    }
}

chatBox.onmouseenter = ()=>{
    chatBox.classList.add("active");
}

chatBox.onmouseleave = ()=>{
    chatBox.classList.remove("active");
}


function scrollToBottom(){
    chatBox.scrollTop = chatBox.scrollHeight;
  }

//onclick like
function like() 
{
  var like = document.querySelectorAll("#heart");
  var i;
  for (i = 0; i< like.length; i++) {
  like[i].style.visibility = "visible";
  }
}

//send user input
function send() {
  var usermsg = document.getElementById(".send-input").value;
  var senddiv = document.querySelector(".user-input");
  senddiv.style.display = "block";
  senddiv.innerHTML = usermsg; 
}


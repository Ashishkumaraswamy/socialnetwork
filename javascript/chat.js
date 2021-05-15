userList=document.querySelector("#userslist");
chatlist=document.querySelector('.chats')

setInterval(() =>{
    to_id = location.search.slice(1).split("=")[1];
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/get-chat.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
            let data = xhr.response;
            chatlist.innerHTML = data;
              }
          }
      }
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("to_id="+to_id);
}, 5000);

var cnt=0;
setInterval(() =>{
  let xhr = new XMLHttpRequest();
  xhr.open("GET", "php/available_users.php", true);
  xhr.onload = ()=>{
    if(xhr.readyState === XMLHttpRequest.DONE){
        if(xhr.status === 200){
          let data = xhr.response;
          if(!searchBar.classList.contains("active")){
            userList.innerHTML = data;
            cnt=cnt+1;
            if(cnt==1)
            {
              scrollToBottom();
            }
          }
        }
    }
  }
  xhr.send();
}, 5000);

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
  var from=document.getElementById("from_id").value;
  var to=document.getElementById("to_id").value;
  if(from==to){

  }
  else{
  url=window.location.href;
  to_id = location.search.slice(1).split("=")[1]; 
  let xhr = new XMLHttpRequest();
    xhr.open("GET", "php/insert-chat.php?to_id="+to+"&message="+usermsg,true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
              senddiv.style.display = "block";
              senddiv.innerHTML = usermsg;
              document.getElementById("send-input").value="";
              data=xhr.response;
              console.log(data);
          }
      }
    }
    xhr.send();
  }
  scrollToBottom();
}

function scrollToBottom(){
    chatlist.scrollTop = chatlist.scrollHeight;
  }

const commentSendBtn = document.querySelector("#sendbtn");
const commentInput = document.querySelector("#message");
commentInput.addEventListener("input", function (e) {
  if (e.target.value.length > 0) {
    commentSendBtn.style.backgroundColor="white";
  } else {
    commentSendBtn.style.backgroundColor="grey";
  }
});
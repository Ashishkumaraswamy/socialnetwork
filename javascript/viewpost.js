commentsection=document.querySelector('commentsection')

setInterval(() =>{
    post_id = location.search.slice(1).split("=")[1];
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/get-comments.php", true);
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

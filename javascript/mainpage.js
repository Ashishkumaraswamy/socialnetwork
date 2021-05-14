const imageSection = document.querySelector(".instapost__image");
const likeHeart = document.querySelector(".like-heart");
const likeBtn = document.querySelector(".btn-like");
const commentInput = document.querySelector(".comment-input");
const commentSendBtn = document.querySelector(".btn-send-comment");
const ctrlLeft = document.querySelector(".ctrl-left");
const ctrlRight = document.querySelector(".ctrl-right");

commentInput.addEventListener("input", function (e) {
	if (e.target.value.length > 0) {
		commentSendBtn.setAttribute("disabled", "");
	} else {
		commentSendBtn.setAttribute("disabled", "disabled");
	}
});

function yikes(x,y,z)
  {
    x.style.color = "red";
    document.getElementById("temp_postby").value = y;
    document.getElementById("temp_timeset").value = z;
    const form=document.querySelector("#typing-area");
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/like.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
              let data = xhr.response;
              location.href = "mainpage.php";
              
          }
      }
    }
    let formData = new FormData(form);
    xhr.send(formData);
  }

  function likesoff(x,y,z)
  {
    x.style.color = "black";
  }

imageSection.addEventListener("dblclick", function (e) {
	likeHeart.classList.add("show");
	!likeBtn.classList.contains("dislike") && likeBtn.classList.add("dislike");
	setTimeout(() => likeHeart.classList.remove("show"), 1000);
});

const imgList = imageSection.querySelectorAll('img');


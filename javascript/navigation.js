// double click on the heart icon
// $(".fa-heart").dblclick(function () {
//   $(".notification-bubble").show(400);
// });

$(document).on("scroll", function () {
  if ($(document).scrollTop() > 70) {
         $(".navigation").addClass("shrink");
   } else {
     $(".navigation").removeClass("shrink");
   }
});

$(".fa-sign-out-alt").click(function () {
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "php/logout.php", true);
  xhr.send();
  xhr.onload = ()=>{

    if(xhr.readyState === XMLHttpRequest.DONE){
        if(xhr.status === 200){
            location.href = "index.php";
        }
    }
  }  
});


const searchBar = document.querySelector("#searchinput"),
searchIcon = document.querySelector("#searchicon"),
usersList = document.querySelector("#searchlist");


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
  if(searchTerm == ""){
    searchBar.classList.add("active");
    usersList.innerHTML = "";
  }else{
    searchBar.classList.remove("active");
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
}
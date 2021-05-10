// double click on the heart icon
// $(".fa-heart").dblclick(function () {
//   $(".notification-bubble").show(400);
// });

// $(document).on("scroll", function () {
//   if ($(document).scrollTop() > 50) {
//     $(".navigation").addClass("shrink");
//   } else {
//     $(".navigation").removeClass("shrink");
//   }
// });

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
  alert('Entered here');
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
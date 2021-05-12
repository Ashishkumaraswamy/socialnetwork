<?php
	session_start();
  include_once("php/config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home</title>
    <link rel="icon" type="image/png" href="images/logoicon.ico"/>
    <link rel="stylesheet" type="text/css" href="css/chat.css">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
</head>
<body>
<header>
<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/2a/Instagram_logo.svg/840px-Instagram_logo.svg.png" id="logo">
     <div class="navigation-search-container" style="width: 500px; margin-bottom: 13px">
      <i class="fa fa-search" id="searchicon"></i>
        <input class="search-field" type="text" placeholder="Search" id="searchinput" style="width: 500px">
          <div class="search-container">
            <div class="search-container-box">
              <div id="searchlist">

              </div>
            </div>
        </div>
    </div>       
     <nav>
        <i class='fas fa-home'></i>
        <i class='far fa-paper-plane'></i>
        <i class='far fa-compass'></i>
        <i class='far fa-heart'></i>
        <div id="user">
            <img id="pic" src="https://images.unsplash.com/profile-fb-1535725706-502eab0fee8e.jpg?ixlib=rb-1.2.1&q=80&fm=jpg&crop=faces&cs=tinysrgb&fit=crop&h=128&w=128"/>
        </div>
    </nav>
</header>
  <main>
    <div class="preview" id="userlist">


    </div>
      <div class="user-input" id="chatbox"></div>
        <div class="input-msg">
          <form action="#" id="typing-area" method=post>
            <input type="hidden" name="to_id" value="" id="store_to_id"/>
            <input type="text" id="send-input" name="message" placeholder="type something" onfocus="this.value=''"/>
            <i onclick="send()" class="fab fa-telegram-plane" style="color: black"></i>
          </form>
        </div>
      </div>
  </main>
  <script type="text/javascript" src="javascript/chat.js"></script>
</body>
</html>
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
<body><header>
<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/2a/Instagram_logo.svg/840px-Instagram_logo.svg.png" id="logo">
     <input type="text" placeholder="search" id="searchinput"/>    
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
    <div class="preview">
      <div id="user-name">__fibo_freak <i class='fas fa-angle-down'></i></div>
      <div>
        <span id="pic-div">
          <img id="pic" src="https://i.pinimg.com/564x/af/d1/12/afd1126225d818c7c5058e11b4b260c3.jpg">
        </span>
        <div id="chat-username">
          <span id="name">chloe</span>
          <span id="msg">I picked up some kambucha..</span>
        </div>
      </div>
      <div>
        <span id="pic-div">
          <img id="pic" src="https://i.pinimg.com/474x/77/41/89/7741893db63e83fdc1d2b4437f63c68b.jpg">
        </span>
        <div id="chat-username">
          <span id="name">kenzo</span>
          <span id="msg">call me when your free</span>
        </div>
      </div>
      <div>
        <span id="pic-div">
          <img id="pic" src="https://i.pinimg.com/474x/c3/ea/10/c3ea105f7fb929fe865b37357fab0084.jpg">
        </span>
        <div id="chat-username">
          <span id="name">nikita</span>
          <span id="msg">hey did you message your..</span>
        </div>
      </div>
      <div>
        <span id="pic-div">
          <img id="pic" src="https://i.pinimg.com/474x/6f/0f/92/6f0f921e55c5cfb20e9b6e1c00d88c0e.jpg">
        </span>
        <div id="chat-username">
          <span id="name">betty_spaghetti</span>
          <span id="msg">Let's go out this weekend!</span>
        </div>
      </div>
      <div>
        <span id="pic-div">
          <img id="pic" src="https://i.pinimg.com/474x/fb/46/ef/fb46ef3c690f10321ebe6f85df9ea93f.jpg">
        </span>
        <div id="chat-username">
          <span id="name">nunchuck</span>
          <span id="msg">I just finished watching peak..</span>
        </div>
      </div>
      <div>
        <span id="pic-div">
          <img id="pic" src="https://i.pinimg.com/474x/1b/d5/c1/1bd5c166811f8cfaa1a741589e3890f0.jpg">
        </span>
        <div id="chat-username">
          <span id="name">snow</span>
          <span id="msg">Did you call Ryan?</span>
        </div>
      </div>
    </div>
    <div class="chats">
      <div class="chat-banner">
        <div>
            <span id="chat-pic"> 
          <img id="pic" src="https://i.pinimg.com/564x/10/8b/0a/108b0a398d44292efb2fa4b755fdbf33.jpg"/>
          </span>
            </div>
        <div><i class='fas fa-info'></i></div>
      </div>
      <div class="sender" onclick="like()">hello! how are you?</div><div id="heart">❤️</div>
        <div class="receiver">heyy! much better</div>
      <div class="sender" onclick="like()">Thats great!🥰</div><div id="heart">❤️</div>
        <div class="receiver">How did the interview go? was it good?</div>
      <div class="sender" onclick="like()">Yeah. I think I did good🙈</div><div id="heart">❤️</div>
        <div class="receiver">Wow I'm soo happy for you</div>
      <div class="sender" onclick="like()">Thanks for always supporting me. Means a lot💖</div><div id="heart">❤️</div>
        <div class="receiver">your most welcome</div>
      <div class="user-input"></div>
      <div class="input-msg">
        <input type="text" id="send-input" placeholder="type something" onfocus="this.value=''"/>
        <i onclick="send()" class='far fa-paper-plane'></i>
      </div>
    </div>
  </main>

  <script type="text/javascript" src="javascript/chat.js"></script>
</body>
</html>
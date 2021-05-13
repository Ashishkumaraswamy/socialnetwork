<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="css/navigation.css">
    <link rel="icon" type="image/png" href="images/logoicon.ico"/>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</head>
<body><div class="navigation" style="background-color: #202020;">
  <div class="logo">
    <a class="no-underline" href="mainpage.php">
      <img src="images/name.png" alt="IMG" style="width:120px;height:45px;">
    </a>
  </div>
  <div class="navigation-search-container" style="width: 500px; margin-bottom: 13px">
    <i class="fa fa-search" id="searchicon"></i>
    <input class="search-field" type="text" placeholder="Search" id="searchinput" style="width: 500px">
    <div class="search-container">
      <div class="search-container-box">
        <div class="search-results" id="searchlist" style="margin-top: 20px; margin-bottom: 20px">

        </div>
      </div>
    </div>
  </div>
  <div class="navigation-icons">
    <a href="posting.php" class="navigation-link">
      <i class="fas fa-plus"></i>
    </a>
    <a href="" class="navigation-link">
      <i class="fa fa-compass"></i>
    </a>
    <?php

    echo'<a href="chat.php?user_id='. $_SESSION['unique_id'] .'" class="navigation-link">
      <i class="fa fa-paper-plane"></i>
    </a>'
    ?>
    
    <a class="navigation-link notification">
      <i class="far fa-heart">
        <div class="notification-bubble-wrapper">
          <div class="notification-bubble">
            <span class="notifications-count">99</span>
          </div>
        </div>
      </i>
    </a>
    <a href="user.php" class="navigation-link">
      <i class="fa fa-user-circle"></i>
    </a>
    <a href="" class="navigation-link">
      <i class="fa fa-sign-out-alt"></i>
    </a>
  </div>
</div>
</body>
<script type="text/javascript" src="javascript/navigation.js"></script>

</html>
<?php
	session_start();
  include_once("php/config.php");
?>
<!DOCTYPE html>
<html>
<head>
  <title>Chat Page</title>
  <link rel="icon" type="image/png" href="images/logoicon.ico"/>
  <link rel="stylesheet" type="text/css" href="css/chat.css">
  <script src='https://kit.fontawesome.com/a076d05399.js'></script>
</head>
<body id="pagebody">
    <?php 
      include_once "navigation.php";
      $sql=mysqli_query($conn,"SELECT * FROM users WHERE user_id={$_SESSION['unique_id']}");
      $row=mysqli_fetch_assoc($sql);
      $from_id=$_SESSION['unique_id'];
      $to_id = mysqli_real_escape_string($conn, $_GET['user_id']);
    echo '<div id="user" style="position:absolute;top:25px;left:450px;z-index:1">
      <img id="pic" src="data:image/jpeg;base64,'.base64_encode($row['propic']).'" alt=""/>
    </div>';
      $sql2=mysqli_query($conn,"SELECT * FROM users WHERE user_id={$to_id}");
      $row2=mysqli_fetch_assoc($sql2);
    ?>
  <main>
    <div class="preview" id="userslist">
      <div id="user-name">Messages</div>

    </div>
    <div class="container">
    <div class="chats">
    </div>
    <div class="input-msg">
          <input type="text" class="from_id" id="from_id" name="from_id" value="<?php echo $from_id; ?>" hidden>
          <input type="text" class="to_id" id="to_id" name="to_id" value="<?php echo $to_id; ?>" hidden>
          <input type="text" name="message" id="send-input" placeholder="type something" onfocus="this.value='' "/>
            <i onclick="send()" id="senbtn" class="far fa-paper-plane"></i>
    </div>
  </div>
  </main>
<script type="text/javascript" src="javascript/chat.js"></script>
</body>
</html>
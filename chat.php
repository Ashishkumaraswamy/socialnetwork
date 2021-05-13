<?php
	session_start();
  include_once("php/config.php");
?>
<!DOCTYPE html>
<html>
<head>
  <title>Chat Page</title>
  <link rel="stylesheet" type="text/css" href="css/chat.css">
  <script src='https://kit.fontawesome.com/a076d05399.js'></script>
</head>
<body>
    <?php 
      include_once "navigation.php";
      $sql=mysqli_query($conn,"SELECT * FROM users WHERE user_id={$_SESSION['unique_id']}");
      $row=mysqli_fetch_assoc($sql);
    echo '<div id="user" style="position:absolute;top:25px;left:450px;z-index:1">
      <img id="pic" src="data:image/jpeg;base64,'.base64_encode($row['propic']).'" alt=""/>
    </div>';
    ?>
  <main>
    <div class="preview" id="userslist">
      <div id="user-name">Messages<i class='fas fa-angle-down'></i></div>

    </div>
    <div class="chats">
        <?php
        $to_id = mysqli_real_escape_string($conn, $_GET['user_id']);
        $sql2=mysqli_query($conn,"SELECT * FROM users WHERE user_id={$to_id}");
        $row2=mysqli_fetch_assoc($sql2);
        if($to_id==$_SESSION['unique_id']){
        echo '<div class="chat-banner">
            <div>
            <span id="chat-pic" style="align-items:center;font-size:25px">      Chat Section
          </span>
        </div>
        <div><i class="fas fa-info"></i></div>
      </div><p>Select an user to chat</p>';
        }
        else{
          echo '<div class="chat-banner">
          <div>
            <span id="chat-pic"> 
          <img id="pic" src="data:image/jpeg;base64,'.base64_encode($row2['propic']).'" alt=""/> 
          </span>
          <span>'.$row2['user_name'].'</span>
        </div>
        <div><i class="fas fa-info"></i></div>
      </div>';     
        $from_id = $_SESSION['unique_id'];
        $update=mysqli_query($conn,"UPDATE chat set seen=true WHERE from_id={$to_id}");
        $sql3 = "SELECT * FROM chat LEFT JOIN users ON users.user_id = chat.from_id
                WHERE (from_id = {$from_id} AND to_id = {$to_id})
                OR (from_id = {$to_id} AND to_id = {$from_id}) ORDER BY msg_id";
        $output="";
        $query = mysqli_query($conn, $sql3);
        $sql4=mysqli_query($conn,"SELECT * FROM users WHERE user_id={$to_id}");
        $row=mysqli_fetch_assoc($sql4);
        if(mysqli_num_rows($query) > 0)
        {   
            while($row = mysqli_fetch_assoc($query)){
                if($row['from_id'] === $from_id){
                    $output .= '<div class="receiver">
                                    <p>'. $row['msg'] .'</p>
                                </div>                          
                                <p>'. $row['time'] .'<p>';
                }else{
                    $output .= '<div class="sender" onclick="like()">
                                    '. $row['msg'] .'
                                </div><div id="heart">❤️</div>
                                <span>'. $row['time'] .'</span>';
                }
            }
            $seenquery = mysqli_query($conn,"SELECT * FROM chat LEFT JOIN users ON users.user_id = chat.from_id
                WHERE (from_id = {$from_id} AND to_id = {$to_id})
                OR (from_id = {$to_id} AND to_id = {$from_id}) ORDER BY msg_id DESC LIMIT 1");
            $seen=mysqli_fetch_assoc($seenquery);
            if($seen['from_id']==$from_id and $seen['seen']==true){
            $output.='<i class="fa fa-eye" style="font-size:24px"></i>';
            } 
            $output .= '<div class="user-input"></div>
                        <div class="input-msg">
                        <form action="" method="POST" id="formdata">
                          <input type="text" class="from_id" id="from_id" name="from_id" value="<?php echo $from_id; ?>" hidden>
                          <input type="text" class="to_id" id="to_id" name="to_id" value="<?php echo $to_id; ?>" hidden>
                          <input type="text" name="message" id="send-input" placeholder="type something" onfocus="this.value="""/>
                            <i onclick="send()" class="far fa-paper-plane"></i>
                        </form>
                        </div>';
        }else{
            $output .= '<div class="receiver">No messages are available. Once you send message they will appear here.</div><div class="user-input"></div>
                        <div class="input-msg">
                          <form action="" method="POST" id="formdata">
                          <input type="text" id="from_id" class="from_id" name="from_id" value="<?php echo $from_id; ?>" hidden>
                          <input type="text" id="to_id" class="to_id" name="to_id" value="<?php echo $to_id; ?>" hidden>
                          <input type="text" name="message" id="send-input" placeholder="type something" onfocus="this.value="""/>
                            <i onclick="send()" class="far fa-paper-plane"></i>
                        </form>
                        </div>';
        }
        echo $output;
        }
        ?>

    </div>
  </main>
<script type="text/javascript" src="javascript/chat.js"></script>
</body>
</html>
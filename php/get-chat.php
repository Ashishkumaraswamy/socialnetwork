<?php 
    session_start();
    if(isset($_SESSION['unique_id'])){
        include_once "config.php";
        $sql=mysqli_query($conn,"SELECT * FROM users WHERE user_id={$_SESSION['unique_id']}");
        $row=mysqli_fetch_assoc($sql);
        $to_id = mysqli_real_escape_string($conn, $_POST['to_id']);
        $sql2=mysqli_query($conn,"SELECT * FROM users WHERE user_id={$to_id}");
        $row2=mysqli_fetch_assoc($sql2);
        if($to_id==$_SESSION['unique_id']){
        echo '<div class="chat-banner">
            <div>
            <span id="chat-pic" style="font-size:20px;text-align:center">Chat Section
          </span>
        </div>
      </div><div style="padding-top:30px;"><p style="text-align:center;font-size:18px;">Click on an user to chat</p>';
        }
        else{
          echo '<div class="chat-banner">
          <div>
            <span id="chat-pic"> 
          <img id="pic" src="data:image/jpeg;base64,'.base64_encode($row2['propic']).'" alt=""/> 
          </span>
          <span>'.$row2['user_name'].'</span>
        </div>
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
                                    '. $row['msg'] .'
                                </div>';
                }else{
                    $output .= '<div class="sender" onclick="like()">
                                    '. $row['msg'] .'
                                </div><div id="heart">❤️</div>';
                }
            }
            $seenquery = mysqli_query($conn,"SELECT * FROM chat LEFT JOIN users ON users.user_id = chat.from_id
                WHERE (from_id = {$from_id} AND to_id = {$to_id})
                OR (from_id = {$to_id} AND to_id = {$from_id}) ORDER BY msg_id DESC LIMIT 1");
            $seen=mysqli_fetch_assoc($seenquery);
            if($seen['from_id']==$from_id and $seen['seen']==true){
            $output.='<i class="fa fa-eye" style="font-size:24px;color:white"></i>';
            } 
            $output .= '<div class="user-input"></div>';
        }else{
            $output .= '<div class="receiver">No messages are available. Once you send message they will appear here.</div><div class="user-input"></div>';
        }
        echo $output;
    }
    }else{
        echo 'Hi here';
    }

?>
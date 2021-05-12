<?php
    $output .='<div id="user-name">Messages<i class="fas fa-angle-down"></i>
      </div>';
    while($row = mysqli_fetch_assoc($query)){
        $sql2 = "SELECT * FROM chat WHERE (to_id = {$row['user_id']}
                OR from_id = {$row['user_id']}) AND (from_id = {$user_id} 
                OR to_id = {$user_id}) ORDER BY msg_id DESC LIMIT 1";
        $query2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($query2);
        (mysqli_num_rows($query2) > 0) ? $result = $row2['msg'] : $result ="No message available";
        (strlen($result) > 28) ? $msg =  substr($result, 0, 28) . '...' : $msg = $result;
        if(isset($row2['outgoing_msg_id'])){
            ($user_id == $row2['outgoing_msg_id']) ? $you = "You: " : $you = "";
        }else{
            $you = "";
        }
        ($user_id == $row['user_id']) ? $hid_me = "hide" : $hid_me = "";

        $output .= '<br>   
                    <a href="chat.php?user_id='. $row['user_id'] .'" style="text-decoration:none;color:black"> 
                       <div style="display:flex">
                        <span id="pic-div">
                          <img id="pic" src="data:image/png;base64,'.base64_encode($row['propic']).'" alt="image">
                        </span>
                        <div id="chat-username">
                          <span id="name">'. $row['user_name'] . '</span>
                          <span id="msg">'. $you . $msg .'</span>
                        </div>
                        </div>
                        </a>';
    }
?>
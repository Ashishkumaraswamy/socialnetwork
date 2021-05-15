<?php
    $output .='<div id="user-name">Messages
      </div><div style="padding-top:30px;"><br>';
    while($row = mysqli_fetch_assoc($query)){
        $sql2 = "SELECT * FROM chat WHERE (to_id = {$row['following']}
                OR from_id = {$row['following']}) AND (from_id = {$user_id} 
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
        ($user_id == $row['following']) ? $hid_me = "hide" : $hid_me = "";
        $query3=mysqli_query($conn,"SELECT * from users where user_id={$row['following']}");
        $row3=mysqli_fetch_assoc($query3);
        $query4=mysqli_query($conn,"SELECT * from login where user_id={$row['following']}");
        $row4=mysqli_fetch_assoc($query4);
        $output .= '
                    <br>
                        <span id="pic-div">
                          <img id="pic" src="data:image/png;base64,'.base64_encode($row3['propic']).'" alt="image">
                        </span>';
        if($row4['status']==false)
        {
            $output.= '
                    <div id="chat-username">
                      <span id="name">'. $row3['user_name'] . '<i class="fa fa-circle" style="font-size:10px;color:red;position:relative;left:30px"></i></span>
                      <span id="msg">'. $you . $msg .'</span>
                    </div>
                </div>';
        }
        else{
            $output.= '
                    <div id="chat-username">
                      <span id="name">'. $row3['user_name'] . '<i class="fa fa-circle" style="font-size:10px;color:green;position:relative;left:30px"></i></span>
                      <span id="msg">'. $you . $msg .'</span>
                    </div>
                </div>';
        }
    }
?>
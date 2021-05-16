<?php
    session_start();
    include_once "config.php";
    $user_id = $_SESSION['unique_id'];
    $sql = "SELECT * FROM friends WHERE NOT (following = {$user_id}) AND (followers={$user_id}) ORDER BY following DESC";
    $query = mysqli_query($conn, $sql);
    $output = "";
    if(mysqli_num_rows($query) == 0){
        $output .= '<div id="user-name">Messages
      </div><br><br><br><br><br><div style="padding-top:30px;width:500px;"><p style="font-size:18px;text-align:;center">&nbsp&nbsp&nbspNo users are available to chat.</p></div>
          <br>
          <div style="width:500px"><p style="font-size:18px;text-align:center">&nbsp&nbsp&nbspFollow other users to chat with them</p></div>';
    }elseif(mysqli_num_rows($query) > 0){
        include_once "user_list.php";
    }
    echo $output;
?>
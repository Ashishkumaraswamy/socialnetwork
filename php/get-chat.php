<?php 
    session_start();
    if(isset($_SESSION['unique_id'])){
        include_once "config.php";
        $from_id = $_SESSION['unique_id'];
        $to_id = mysqli_real_escape_string($conn, $_POST['to_id']);

        $sql = "SELECT * FROM chat LEFT JOIN users ON users.user_id = chat.from_id
                WHERE (from_id = {$from_id} AND to_id = {$to_id})
                OR (from_id = {$to_id} AND to_id = {$from_id}) ORDER BY msg_id";
        $output="";
        $query = mysqli_query($conn, $sql);
        $sql2=mysqli_query($conn,"SELECT * FROM users WHERE user_id={$to_id}");

        $row=mysqli_fetch_assoc($sql2);
        if(mysqli_num_rows($query) > 0)
        {   
            echo("Entered here");
            $output .='<div class="chat-banner">
                            <div>
                            <span id="chat-pic"> 
                                <img id="pic" src=data:image/png;base64,'.base64_encode($row['propic']).'" alt="image"/>
                            </span>
                        </div>
                        <div><i class="fas fa-info"></i></div>
                        </div>';
            while($row = mysqli_fetch_assoc($query)){
                if($row['from_id'] === $from_id){
                    $output .= '<div class="receiver">
                                    <p>'. $row['msg'] .'</p>
                                </div>';
                }else{
                    $output .= '<div class="sender" onclick="like()">
                                    '. $row['msg'] .'
                                </div><div id="heart">❤️</div>';
                }
            }
            $output .=  '<div class="input-msg">
            <form action="#" id="typing-area" method=post>
              <input type="hidden" name="to_id" value="" id="store_to_id"/>
              <input type="text" id="send-input" placeholder="type something" onfocus="this.value="""/>
              <i onclick="send()" class="fa fa-paper-plane"></i></button>
            </form>
          </div>';
        }else{
            $output .= '<div class="receiver">No messages are available. Once you send message they will appear here.</div>';
        }
        echo $output;
    }else{
        echo 'Hi here';
    }

?>
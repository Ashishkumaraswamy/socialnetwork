<?php
    while($row = mysqli_fetch_assoc($query)){
        $output .= '<a href="chat.php?user_id='. $row['user_id'] .'">
                    <div class="content">
                    <img src="php/images/'. $row['propic'] .'" alt="">
                    <div class="details">
                        <span>'. $row['user_name'] . '</span>
                    </div>
                    </div>
                </a>';
    }
?>
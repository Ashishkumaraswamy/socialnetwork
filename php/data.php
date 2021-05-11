<?php
    $output .='<div style="width:500px; border:2px solid black; border-width:3px;background-color:white">';
    while($row = mysqli_fetch_assoc($query)){
        $output .= '<a href="chat.php?user_id='. $row['user_id'] .'" style="text-decoration: none;">
                    <div class="content">
                    <img src="" alt="">
                    <div class="details" style="text-align:center; color:black;  font-size:18px">
                        <span>'. $row['user_name'] . '</span>
                    </div>
                    </div>
                </a>';
    }
    $output .='</div>';
?>
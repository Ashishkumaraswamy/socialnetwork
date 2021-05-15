<?php 
    session_start();
    include_once "config.php";
  $click_id = mysqli_real_escape_string($conn, $_GET['user_id']);
  $post_id =  mysqli_real_escape_string($conn, $_GET['post_id']);
	$sql=mysqli_query($conn, "select * from users where user_id={$click_id}");
	if(mysqli_num_rows($sql) > 0){
			$row = mysqli_fetch_assoc($sql);
	}
	$query = "SELECT * FROM posts where postby = '{$row['user_name']}' AND postid={$post_id}";  
                $result = mysqli_query($conn, $query);  
                if($result)
                {
                  $row1=mysqli_fetch_assoc($result);
                      $cmtcount=mysqli_query($conn,"SELECT count(*) as cmtcount from comment WHERE postid={$row1['postid']}");
                      if($cmtcount)
                      {
                          $lastcmt=mysqli_query($conn,"SELECT * from comment WHERE postid={$row1['postid']} ORDER BY time");
                          $result1=mysqli_fetch_assoc($cmtcount);
                          if($result1['cmtcount']>0)
                        	{
                        		echo '<a class="instapost__comment-list" href="#">
                          		'.$result1['cmtcount'].' comments
                        			</a>
                        			<br>';

                        		while ($result2=mysqli_fetch_assoc($lastcmt)) {
                        			$sql=mysqli_query($conn,"SELECT * FROM users WHERE user_name='{$result2['commentby']}'");
                        			$result3=mysqli_fetch_assoc($sql);
                        			echo '
                        			<br>
                        			<section class="instapost__description">
                          		<a class="user instalink" href="user.php?user_id='.$result3['user_id'].'" target="_blank">
                              	'.$result2['commentby'].'
                            		</a> '.$result2['msg'].'
                        			</section>
                        			';
                        		}
                        	}
                    		else
                    		{
      	                    echo'<a class="instapost__comment-list" href="#">
      	                    No comments available
      	                  </a>';
      	                 }
                    }
                    else{
                      
                    }
              }
              else{

              }
                	
?>

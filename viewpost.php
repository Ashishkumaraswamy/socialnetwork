<?php 
    session_start();
    include_once "php/config.php";
  $click_id = mysqli_real_escape_string($conn, $_GET['user_id']);
  $post_id =  mysqli_real_escape_string($conn, $_GET['post_id']);
	$sql=mysqli_query($conn, "select * from users where user_id={$click_id}");
	if(mysqli_num_rows($sql) > 0){
			$row = mysqli_fetch_assoc($sql);
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title><?php echo $row['user_name']?></title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/mainpage.css">
	<link rel="icon" type="image/png" href="images/logoicon.ico"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src='https://kit.fontawesome.com/a076d05399.js'></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <meta name="robots" content="noindex, follow">
    
<style>
body {
  max-width: 420px;
  margin-left: auto;
  margin-right: auto;
  background-color: #262626;
}

</style>

</head>

<body>
<?php include_once "navigation.php"; ?>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<?php   
                $query = "SELECT * FROM posts where postby = '{$row['user_name']}' AND postid={$post_id}";  
                $result = mysqli_query($conn, $query);  
                while($row1 = mysqli_fetch_array($result))  
                {  
                     echo '   
                     <article class="instapost">
                  <header class="instapost__header">
                    <a class="profile-img" href="user.php?user_id='. $click_id .'">
                      <img src="data:image/jpeg;base64,'.base64_encode($row['propic']).'" />
                    </a>
                    <div class="profile-name">
                      <a class="user instalink" href="user.php?user_id='. $click_id .'">
                        '.$row1['postby'].'
                      </a>
                      <a class="location" href="https://www.instagram.com/explore/locations/55389054/debrecen/" target="_blank">'.$row['country'].','.$row['state'].'</a>
                    </div>       
                         <!--Heading Dots Section-->
                    ';
                         if($_SESSION['unique_id']==$click_id)
                          {
                         echo '
                            <button class="btn btn-more">
                            <i class="fas fa-trash" onclick="del(this,`'.$row1['postby'].'`,`'.$row1['timeset'].'`)"></i>
                          </button></header>
                          <!--End Heading Dots Section-->';
                          }
                       echo '
                     <!--Main picture-->
                     <section class="instapost__image">
                    <a href="viewpost.php?post_id='.$row1['postid'].'&user_id='.$click_id.'"><img class="img img-0 show" src="data:image/jpeg;base64,'.base64_encode($row1['post'] ).'" alt="image" /></a>
                    
                  </section>
                  <section class="instapost__action">
                    <button class="btn btn-like">
                      <i class="fa fa-heart" style="font-size:20px" onclick=" likesoff(this,`'.$row1['postby'].'`,`'.$row1['timeset'].'`)" ondblclick="likes(this,`'.$row1['postby'].'`,`'.$row1['timeset'].'`)"></i>
                    </button>
                    <button class="btn btn-comment">
                      <svg>
                        <use xlink:href="#comment" />
                      </svg>
                    </button>
                    <button class="btn btn-send">
                      <a href="chat.php?user_id='. $click_id.'">
                      <svg>
                        <use xlink:href="#send" />
                      </svg>
                      </a>
                    </button>
                  </section>
                  <section class="instapost__likes">
                    Liked by '.$row1['likecount'].'<a class="instalink" href="" target="_blank"> others</a>
                  </section>
                  <section class="instapost__description">
                    <a class="user instalink" href="https://www.instagram.com/gabormolnar92/" target="_blank">
                        '.$row1['postby'].'
                      </a> '.$row1['descp'].'
                  </section>
                  <a class="instapost__comment-list" href="#">
                    View all 817 comments
                  </a>
                  <section class="instapost__timestamp">
                    '.$row1['timeset'].'
                  </section>
                  <section class="instapost__add-comment">
                    <button class="btn btn-smiley">
                      <svg>
                        <use xlink:href="#smiley" />
                      </svg>
                    </button>
                    <textarea class="comment-input" placeholder="Add a comment..." rows="1"></textarea>
                    <button class="btn btn-send-comment" disabled="disabled">
                      Send
                    </button>
                  </section>
                </article>';              
                    }  
            ?> 

            <form action="mainpage.php" id="typing-area" method=post>
            <input type="hidden" name="temp_postby" value="" id="temp_postby"/>
            <input type="hidden" name="temp_timeset" value="" id="temp_timeset"/>
            </form>
  
  
</body>
<script>

  function yikes(x,y,z)
  {
    x.style.color = "red";
    document.getElementById("temp_postby").value = y;
    document.getElementById("temp_timeset").value = z;
    const form=document.querySelector("#typing-area");
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/like.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
              let data = xhr.response;
              <?php
                echo 'location.href = "viewpost.php?post_id='.$post_id.'&user_id='.$click_id.'"';
              ?>
              
          }
      }
    }
    let formData = new FormData(form);
    xhr.send(formData);
  }

  function likesoff(x,y,z)
  {
    x.style.color = "black";
  }

  function del(x,y,z)
  {
   
    if (confirm("Do you want to delete the Post!!")) {
      document.getElementById("temp_postby").value = y;
      document.getElementById("temp_timeset").value = z;
      const form=document.querySelector("#typing-area");
      let xhr = new XMLHttpRequest();
      xhr.open("POST", "php/delete.php", true);
      xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
              let data = xhr.response;
              <?php
                 echo 'location.href = "viewpost.php?post_id='.$post_id.'&user_id='.$click_id.'"';
              ?>
              
          }
          }
      }
      let formData = new FormData(form);
      xhr.send(formData);
    }else{
    
    }
  }

  
  // $(".fa-trash").click(function () {
  //   alert(document.getElementById("temp_postby").value);
  //   // document.getElementById("temp_postby").value = y;
  //   // document.getElementById("temp_timeset").value = z;
  //   if (confirm("Do you want to delete the Post!!")) {
      
  //   } else {

  //   }
  // //let xhr = new XMLHttpRequest();
  // // xhr.open("POST", "php/logout.php", true);
  // // xhr.send();
  // // xhr.onload = ()=>{

  // //   if(xhr.readyState === XMLHttpRequest.DONE){
  // //       if(xhr.status === 200){
  // //           location.href = "index.php";
  // //       }
  // //   }
  // // }  
  // });



</script>
</html>

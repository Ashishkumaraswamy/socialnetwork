<?php 
    session_start();
    include_once "php/config.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home</title>
    <link rel="icon" type="image/png" href="images/logoicon.ico"/>
    <script src="https://fonts.cdnfonts.com/css/billabong"></script>
    <link rel="stylesheet" type="text/css" href="css/navigation.css">
    <link rel="stylesheet" type="text/css" href="css/mainpage.css">
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
  <div class="hidden">
  <svg id="dots" viewBox="0 0 48 48">
    <circle clip-rule="evenodd" cx="8" cy="24" fill-rule="evenodd" r="4.5"></circle>
    <circle clip-rule="evenodd" cx="24" cy="24" fill-rule="evenodd" r="4.5"></circle>
    <circle clip-rule="evenodd" cx="40" cy="24" fill-rule="evenodd" r="4.5"></circle>
  </svg>

  <svg id="like" viewBox="0 0 48 48">
    <path d="M34.6 6.1c5.7 0 10.4 5.2 10.4 11.5 0 6.8-5.9 11-11.5 16S25 41.3 24 41.9c-1.1-.7-4.7-4-9.5-8.3-5.7-5-11.5-9.2-11.5-16C3 11.3 7.7 6.1 13.4 6.1c4.2 0 6.5 2 8.1 4.3 1.9 2.6 2.2 3.9 2.5 3.9.3 0 .6-1.3 2.5-3.9 1.6-2.3 3.9-4.3 8.1-4.3m0-3c-4.5 0-7.9 1.8-10.6 5.6-2.7-3.7-6.1-5.5-10.6-5.5C6 3.1 0 9.6 0 17.6c0 7.3 5.4 12 10.6 16.5.6.5 1.3 1.1 1.9 1.7l2.3 2c4.4 3.9 6.6 5.9 7.6 6.5.5.3 1.1.5 1.6.5.6 0 1.1-.2 1.6-.5 1-.6 2.8-2.2 7.8-6.8l2-1.8c.7-.6 1.3-1.2 2-1.7C42.7 29.6 48 25 48 17.6c0-8-6-14.5-13.4-14.5z"></path>
  </svg>

  <svg id="dislike" viewBox="0 0 48 48">
    <path d="M34.6 3.1c-4.5 0-7.9 1.8-10.6 5.6-2.7-3.7-6.1-5.5-10.6-5.5C6 3.1 0 9.6 0 17.6c0 7.3 5.4 12 10.6 16.5.6.5 1.3 1.1 1.9 1.7l2.3 2c4.4 3.9 6.6 5.9 7.6 6.5.5.3 1.1.5 1.6.5s1.1-.2 1.6-.5c1-.6 2.8-2.2 7.8-6.8l2-1.8c.7-.6 1.3-1.2 2-1.7C42.7 29.6 48 25 48 17.6c0-8-6-14.5-13.4-14.5z"></path>
  </svg>
  <svg id="comment" viewBox="0 0 48 48">
    <path clip-rule="evenodd" d="M47.5 46.1l-2.8-11c1.8-3.3 2.8-7.1 2.8-11.1C47.5 11 37 .5 24 .5S.5 11 .5 24 11 47.5 24 47.5c4 0 7.8-1 11.1-2.8l11 2.8c.8.2 1.6-.6 1.4-1.4zm-3-22.1c0 4-1 7-2.6 10-.2.4-.3.9-.2 1.4l2.1 8.4-8.3-2.1c-.5-.1-1-.1-1.4.2-1.8 1-5.2 2.6-10 2.6-11.4 0-20.6-9.2-20.6-20.5S12.7 3.5 24 3.5 44.5 12.7 44.5 24z" fill-rule="evenodd"></path>
  </svg>

  <svg id="send" viewBox="0 0 48 48">
    <path d="M47.8 3.8c-.3-.5-.8-.8-1.3-.8h-45C.9 3.1.3 3.5.1 4S0 5.2.4 5.7l15.9 15.6 5.5 22.6c.1.6.6 1 1.2 1.1h.2c.5 0 1-.3 1.3-.7l23.2-39c.4-.4.4-1 .1-1.5zM5.2 6.1h35.5L18 18.7 5.2 6.1zm18.7 33.6l-4.4-18.4L42.4 8.6 23.9 39.7z"></path>
  </svg>

  <svg id="save" viewBox="0 0 48 48">
    <path d="M43.5 48c-.4 0-.8-.2-1.1-.4L24 29 5.6 47.6c-.4.4-1.1.6-1.6.3-.6-.2-1-.8-1-1.4v-45C3 .7 3.7 0 4.5 0h39c.8 0 1.5.7 1.5 1.5v45c0 .6-.4 1.2-.9 1.4-.2.1-.4.1-.6.1zM24 26c.8 0 1.6.3 2.2.9l15.8 16V3H6v39.9l15.8-16c.6-.6 1.4-.9 2.2-.9z"></path>
  </svg>

  <svg id="smiley" viewBox="0 0 48 48">
    <path d="M24 48C10.8 48 0 37.2 0 24S10.8 0 24 0s24 10.8 24 24-10.8 24-24 24zm0-45C12.4 3 3 12.4 3 24s9.4 21 21 21 21-9.4 21-21S35.6 3 24 3z"></path>
    <path d="M34.9 24c0-1.4-1.1-2.5-2.5-2.5s-2.5 1.1-2.5 2.5 1.1 2.5 2.5 2.5 2.5-1.1 2.5-2.5zm-21.8 0c0-1.4 1.1-2.5 2.5-2.5s2.5 1.1 2.5 2.5-1.1 2.5-2.5 2.5-2.5-1.1-2.5-2.5zM24 37.3c-5.2 0-8-3.5-8.2-3.7-.5-.6-.4-1.6.2-2.1.6-.5 1.6-.4 2.1.2.1.1 2.1 2.5 5.8 2.5 3.7 0 5.8-2.5 5.8-2.5.5-.6 1.5-.7 2.1-.2.6.5.7 1.5.2 2.1 0 .2-2.8 3.7-8 3.7z"></path>
  </svg>
</div>
          <?php  
                
                $query = "SELECT * FROM users, posts WHERE users.user_name = posts.postby ORDER BY posts.timeset DESC;";  
                $result = mysqli_query($conn, $query);  
                while($row1 = mysqli_fetch_array($result))  
                {  
                    echo'
                  <article class="instapost">
                  <header class="instapost__header">
                    <a class="profile-img" href="user.php?user_id='. $row1['user_id'] .'">
                      <img src="data:image/jpeg;base64,'.base64_encode($row1['propic']).'" />
                    </a>
                    <div class="profile-name">
                      <a class="user instalink" href="user.php?user_id='. $row1['user_id'] .'">
                        '.$row1['postby'].'
                      </a>
                      <a class="location" href="https://www.instagram.com/explore/locations/55389054/debrecen/" target="_blank">'.$row1['country'].','.$row1['state'].'</a>
                    </div>
                  </header>
                  <section class="instapost__image">
                    <img class="img img-0 show" src="data:image/jpeg;base64,'.base64_encode($row1['post'] ).'" alt="image" />
                    
                  </section>
                  <section class="instapost__action">
                    <button class="btn btn-like">
                      <i class="fa fa-heart" style="font-size:20px" onclick=" likesoff(this,`'.$row1['postby'].'`,`'.$row1['timeset'].'`)" ondblclick="yikes(this,`'.$row1['postby'].'`,`'.$row1['timeset'].'`)"></i>
                    </button>
                    <button class="btn btn-comment">
                      <svg>
                        <use xlink:href="#comment" />
                      </svg>
                    </button>
                    <button class="btn btn-send">
                      <a href="chat.php?user_id='. $row1['user_id'].'">
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
              location.href = "mainpage.php";
              
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

</script>
 
</html>
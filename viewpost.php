<?php 
    session_start();
    include_once "php/config.php";
	$sql=mysqli_query($conn, "select * from users where user_id='{$_SESSION['unique_id']}'");
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
	<link rel="stylesheet" type="text/css" href="css/navigation.css">
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
<?php  
                $query = "SELECT * FROM posts where postby = '{$row['user_name']}' ORDER BY timeset DESC";  
                $result = mysqli_query($conn, $query);  
                while($row1 = mysqli_fetch_array($result))  
                {  
                     echo '   
                     <blockquote style=" background:#696969; border:0; border-radius:3px; box-shadow:0 0 1px 0 rgba(0,0,0,0.5),0 1px 10px 0 rgba(0,0,0,0.15); margin: 1px; max-width:400px; min-width:300px; padding:0; width:99.375%; width:-webkit-calc(100% - 2px); width:calc(100% - 2px);margin-bottom: 20px;">

                     <div style="padding:16px;">
                       <div style=" display: flex; flex-direction: row; align-items: center;">
                     
                         <!--Heading: Profile Pic with Handle and Location Sub-->
                         <div style="margin-left:-5px">
                           <a href="user.php"><img src="data:image/jpeg;base64,'.base64_encode($row['propic']).'" alt="" style="border-radius: 50%; flex-grow: 0; height: 20px; width:20px;"></a>
                         </div>
                     
                         <div style="display: flex; flex-direction: column; flex-grow: 1; justify-content: center;margin-left: 8px;">
                           <p style="font-family: Proxima Nova, Helvetica, Arial;font-size: 12px;color: black;font-weight: bold;">'.$row1['postby'].'</p>
                           <!-- Subtitle <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; width: 60px;"></div>-->
                         </div>
                     
                         <!--Heading Dots Section-->
                         <div style="text-align: right;">
                         <i class="fas fa-trash" onclick="del(this,`'.$row1['postby'].'`,`'.$row1['timeset'].'`)"></i>
                          </div>
                         <!--End Heading Dots Section-->
                     
                       </div>
                       <!--End Heading-->
                     </div>
                     
                     <!--Main picture-->
                     <div style="padding: 0px;"><a href="" target="_blank"><img src="data:image/jpeg;base64,'.base64_encode($row1['post'] ).'" style="text-align: center;max-width: 100%;margin: auto;background-size: cover;"></a></div>
                     <!--End main picture-->
                     
                     <div style="padding: 16px;padding-bottom: 5px;">
                     
                       <!--Start Interactions Section-->
                       <div style="display: flex; flex-direction: row; margin-bottom: 0px; align-items: center;">
                         <!--Heart (Like)-->
                     
                           <div>
                             <i class="fas fa-heart" onclick=" likesoff(this,`'.$row1['postby'].'`,`'.$row1['timeset'].'`)" ondblclick="yikes(this,`'.$row1['postby'].'`,`'.$row1['timeset'].'`)"></i>
                           </div>

                         <input type="hidden" name="'.$row1['postby'].''.$row1['timeset'].'" id="'.$row1['postby'].''.$row1['timeset'].'" value="'.$row1['postby'].''.$row1['timeset'].'"/>
                         <!--End Heart (Like)-->
                     
                         <!--Comment Section-->
                         <div style="margin-left: 8px;">
                             <i class="far fa-comment"></i>
                         </div>
                         <!--End Comment Section-->
                  
                       </div>
                       <!--End Interactions Section-->
                       <div style="display: flex; flex-direction: column; flex-grow: 1; justify-content: center; margin-bottom: 0px;">

                       <!--Stats Section-->
                        <!--End Stats Section-->
                        <div style="overflow: auto;">
                        <p style="font-family: Proxima Nova, Helvetica, Arial;font-size: 12px;text-overflow: ellipsis;"><span style="font-weight:bold;">'.$row1['likecount'].' likes</span>
                  
                          </p>
                        </div>
                     
                         <!--Text Section-->
                         <div style="overflow: auto;">
                           <p style="font-family: Proxima Nova, Helvetica, Arial;font-size: 12px;text-overflow: ellipsis;"><span style="font-weight:bold;">'.$row1['descp'].'</span>
                     
                             </p>
                         </div>
                       </div>
                       <!--End Text Section-->
                        <br>
                       <div style="margin-top: -17px;">
                         <p style="font-family: Proxima Nova, Helvetica, Arial;font-size: 12px;color: lightgray;">'.$row1['timeset'].'</p>
                       </div>
                     
                      
                     </div>
                     </blockquote>
                     <br>
                     <br>
                     <br>
                     <br>
                     ';                
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
              location.href = "viewpost.php";
              
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
              location.href = "viewpost.php";
              
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

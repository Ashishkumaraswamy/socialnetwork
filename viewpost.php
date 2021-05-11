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
    <meta name="robots" content="noindex, follow">
    
<style>
body {
  max-width: 420px;
  margin-left: auto;
  margin-right: auto;
  background-color: lightgray;
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
                     <blockquote style=" background:#FFF; border:0; border-radius:3px; box-shadow:0 0 1px 0 rgba(0,0,0,0.5),0 1px 10px 0 rgba(0,0,0,0.15); margin: 1px; max-width:400px; min-width:300px; padding:0; width:99.375%; width:-webkit-calc(100% - 2px); width:calc(100% - 2px);margin-bottom: 20px;">

                     <div style="padding:16px;">
                       <div style=" display: flex; flex-direction: row; align-items: center;">
                     
                         <!--Heading: Profile Pic with Handle and Location Sub-->
                         <div style="margin-left:-5px">
                           <a href=""><img src="data:image/jpeg;base64,'.base64_encode($row['propic']).'" alt="" style="border-radius: 50%; flex-grow: 0; height: 20px; width:20px;"></a>
                         </div>
                     
                         <div style="display: flex; flex-direction: column; flex-grow: 1; justify-content: center;margin-left: 8px;">
                           <p style="font-family: Proxima Nova, Helvetica, Arial;font-size: 12px;color: black;font-weight: bold;">'.$row1['postby'].'</p>
                           <!-- Subtitle <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; width: 60px;"></div>-->
                         </div>
                     
                         <!--Heading Dots Section-->
                         <div style="text-align: right;">
                           <div style="height: 4px;width: 4px;background-color: black;border-radius: 50%;display: inline-block;"></div>
                           <div style="height: 4px;width: 4px;background-color: black;border-radius: 50%;display: inline-block;"></div>
                           <div style="height: 4px;width: 4px;background-color: black;border-radius: 50%;display: inline-block;"></div>
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
                         <a href="" target="_blank">
                           <div>
                             <div style="background-color: #ee4956; border-radius: 50%; height: 12.5px; width: 12.5px; transform: translateX(0px) translateY(7px);"></div>
                             <div style="background-color: #ee4956; height: 12.5px; transform: rotate(-45deg) translateX(3px) translateY(1px); width: 12.5px; flex-grow: 0; margin-right: 14px; margin-left: 2px;"></div>
                             <div style="background-color: #ee4956; border-radius: 50%; height: 12.5px; width: 12.5px; transform: translateX(9px) translateY(-18px);border-color: black;"></div>
                           </div>
                         </a>
                         <!--End Heart (Like)-->
                     
                         <!--Comment Section-->
                         <div style="margin-left: 8px;">
                           <div style=" background-color: black; border-radius: 50%; flex-grow: 0; height: 20px; width: 20px;"></div>
                           <div style=" width: 0; height: 0; border-top: 2px solid transparent; border-left: 6px solid black; border-bottom: 2px solid transparent; transform: translateX(16px) translateY(-4px) rotate(30deg)"></div>
                         </div>
                         <!--End Comment Section-->
                     
                         <!--Picture Dots Section-->
                         <div style="text-align: center;margin-left: 30%;">
                           <div style="height: 5px;width: 5px;background-color: lightblue;border-radius: 50%;display: inline-block;"></div>
                           <div style="height: 5px;width: 5px;background-color: #bbb;border-radius: 50%;display: inline-block;"></div>
                           <div style="height: 5px;width: 5px;background-color: #bbb;border-radius: 50%;display: inline-block;"></div>
                           <div style="height: 5px;width: 5px;background-color: #bbb;border-radius: 50%;display: inline-block;"></div>
                         </div>
                         <!--End Picture Dots Section-->
                     
                         <!--Bookmark Section-->
                         <div style="margin-left: auto;">
                           <div style=" width: 0px; border-top: 8px solid black; border-right: 8px solid transparent; transform: translateY(16px);"></div>
                           <div style=" background-color: black; flex-grow: 0; height: 12px; width: 16px; transform: translateY(-4px);"></div>
                           <div style=" width: 0; height: 0; border-top: 8px solid black; border-left: 8px solid transparent; transform: translateY(-4px) translateX(8px);"></div>
                         </div>
                         <!--End Bookmark Section-->
                       </div>
                       <!--End Interactions Section-->
                     
                       <!--Stats Section-->
                       <div style="display: flex; flex-direction: column; flex-grow: 1; justify-content: center; margin-bottom: 0px;">
                         <div>
                           <p style="font-family: Proxima Nova, Helvetica, Arial;font-size: 12px;"><img src="https://images.squarespace-cdn.com/content/v1/53ed0e3ce4b0c296acaeae80/1488348396080-727EIWBGP1MJN3FSXVWS/ke17ZwdGBToddI8pDm48kD8Xroq_AX5Zgi3HGn2a5gd7gQa3H78H3Y0txjaiv_0fDoOvxcdMmMKkDsyUqMSsMWxHk725yiiHCCLfrh8O1z5QPOohDIaIeljMHgDF5CVlOqpeNLcJ80NK65_fV7S1UQQ0iLpUJJ55dW55w_oZ6JvHnXlmx4oSoNzVwlPskgpsLIXfY3DEqu8fc08UsQJ-4w/SNAPTEMBER-1904-Edit+Headshot+Photography+by+Tommy+Collier+Productions+Denver+Colorado+Headshots+Photographer.jpg" style="background-color: #F4F4F4; border-radius: 50%; flex-grow: 0; height: 20px; margin-right: 2px; width: 20px;">
                             <span style="font-weight: bold;">doc_john</span> and <span style="font-weight: bold;">other 224 people</span> like it</p>
                         </div>
                         <!--End Stats Section-->
                     
                         <!--Text Section-->
                         <div style="overflow: auto;">
                           <p style="font-family: Proxima Nova, Helvetica, Arial;font-size: 12px;text-overflow: ellipsis;"><span style="font-weight:bold;">'.$row1['descp'].'</span>
                     
                             </p>
                         </div>
                       </div>
                       <!--End Text Section-->
                     
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
  
</body>
</html>

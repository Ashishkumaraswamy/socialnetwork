<?php 
    session_start();
    include_once "php/config.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>News </title>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="images/logoicon.ico"/>
    <script src="https://fonts.cdnfonts.com/css/billabong"></script>
    <link rel="stylesheet" type="text/css" href="css/navigation.css">
    <link rel="stylesheet" type="text/css" href="css/news.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/skeleton/2.0.4/skeleton.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
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

		
			<!--
				<div class="box">
					<form id="form" method="post" autocomplete="off">
						
							      	
						<input type="hidden" id="email" name="email" value="">
						<div style="margin-top: 20px ;width:49%">
							<input class="input100" type="text" id="name" name="username">
						</div>
						
						
  						<br>
						<div class="container-signup100-form-btn">
							<input type="submit" name="submit" value="NEXT" class="signup100-form-btn" id="btn">
						</div>
					</form>
				</div>
    <div class="container">
        <ul class="news-list" id="main">
        </ul>-->

    </div>


    <form id="form" method="post" autocomplete="off">
    <div class='container' ng-app="root">
	<div ng-controller="index">
    <div class="thin">
        <h1>Search</h1>
        <span id="hashtag">#</span>
      	<input type="text"  id="name" name="username" class="clearable" style="width: 97%;">
          <br>
          <br>
      	<button ng-click="searchTag()" ng-enter="search" id="btn" value="Submit">Search</button>
    </div>
    </form>
    
        <div class="container">
        <ul class="news-list" id="main">
        </ul>
    </div>
    </div>
    </div>


    <script type="text/javascript">
        const form=document.querySelector("#form"),
        continueBtn = form.querySelector("#btn");
        //const newslist = document.querySelector('news-list');
        
        form.onsubmit = (e)=>{
            e.preventDefault();
        }

        continueBtn.onclick = ()=>{

            if(document.getElementById("name").value == '')
            {
                alert('Input is Empty!');
                return;
            }

            document.getElementById("main").innerHTML='';
            
            const apikey = 'f9a31fee2b844b599adb8890c6de19ac';
            let topic = document.getElementById("name").value;
            //let url = `https://newsapi.org/v2/everything?q=${topic}&apiKey=${apikey}`;
            let url = `https://cors-anywhere.herokuapp.com/https://newsapi.org/v2/everything?q=${topic}&apiKey=${apikey}`;
            //{headers:new Headers({"X-Requested-With":"asdadasdadadsqasda"})} 
            fetch(url).then((res)=>{
                return res.json()
            }).then((data)=>{
                console.log(data);
                data.articles.forEach(article => {
                    let li = document.createElement('li');
                    let a = document.createElement('a');
                    a.setAttribute('href',article.url);
                    a.setAttribute('target','_blank');
                    a.textContent = article.title;
                    li.append(a);
                    document.getElementById("main").appendChild(li);
                });
            }).catch((error)=>{
                console.log(error);
            })

        }   
    </script>
</body>
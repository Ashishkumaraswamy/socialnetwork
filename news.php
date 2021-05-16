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
    </div>
    <form id="form" method="post" autocomplete="off">
    <div class='container' ng-app="root">
	<div ng-controller="index">
    <div class="thin">
        <h1>Search News</h1>
        <span id="hashtag">#</span>
      	<!-- <input type="text"  id="name" name="username" class="clearable" style="width: 97%;"> -->
          <select id="name" name="username" class="clearable" style="width: 97%;">
                <option value="national">Indian National News</option>
                <option value="business">Business</option>
                <option value="sports">Sports</option>
                <option value="world">World News</option>
                <option value="politics">Politics</option>
                <option value="national">Indian National News</option>
                <option value="technology">Technology</option>
                <option value="startup">Startup</option>
                <option value="entertainment">Entertainment</option>
                <option value="politics">Politics</option>
                <option value="miscellaneous">Miscellaneous</option>
                <option value="hatke">Hatke</option>
                <option value="science">Science</option>
                <option value="Automobile">Automobile</option>
            </select>
      	<button ng-click="searchTag()" ng-enter="search" id="btn" value="Submit">Search</button>
    </div>
    </form>
          <br>
          <br>
        <div class="container">
            <br>
                <ul class="news-list" id="main" style="color: white;"></ul>
        </div>
    </div>
    </div>


    <script type="text/javascript">
        const form=document.querySelector("#form"),
        continueBtn = form.querySelector("#btn");
        const newslist = document.querySelector('news-list');
        
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
            
            // const apikey = 'f9a31fee2b844b599adb8890c6de19ac';
            const apikey = 'c42746d3e769c778ea2ececd7a47a9b8';
            let topic = document.getElementById("name").value;
            // let url = `https://newsapi.org/v2/everything?q=${topic}&apiKey=${apikey}`;
            //let url = `https://api.mediastack.com/v1/news?access_key=${apikey}`;
            let url = `https://inshortsapi.vercel.app/news?category=${topic}`;
            //let url = `http://cors-anywhere.herokuapp.com/https://newsapi.org/v2/everything?q=${topic}&apiKey=${apikey}`;
            //{headers:new Headers({"X-Requested-With":"asdadasdadadsqasda"})}

            //let url = `https://inshortsapi.vercel.app/news?category=${topic}`; 
            //let url = `https://opensourcepyapi.herokuapp.com:443/news`;
            fetch(url).then((res)=>{
                return res.json()
            }).then((data)=>{
                console.log(data);
                data.data.forEach(article => {
                    let li = document.createElement('li');
                    let a = document.createElement('a');
                    a.setAttribute('href',article.url);
                    a.setAttribute('target','_blank');
                    a.textContent = article.title;
                    a.style.color = "white";
                    li.append(a);
                    li.style.color = "white";
                    document.getElementById("main").appendChild(li);
                });
            }).catch((error)=>{
                console.log(error);
            })

        }   
            
    </script>
    <!-- Footer -->
    <footer class="page-footer font-small blue">

    <!-- Copyright -->
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="footer-copyright text-center py-3" style="color:white ;text-align:center">

    <a href="https://inshorts.com/"><h6>Powered by Inshorts News</h6></a>
    </div>
    <!-- Copyright -->

    </footer>
    <!-- Footer -->

    
</body
></html>

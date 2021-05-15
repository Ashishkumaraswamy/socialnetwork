<!DOCTYPE html>
<html lang="en">
<head>

<title>Social Media</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="robots" content="noindex, follow">
<link rel="icon" type="image/png" href="images/logoicon.ico"/>

<style>
    
.load-wrapp {
  float: left;
  margin: 20px;
  padding-left: 9px;
  padding-right: 10px;
  padding-top: 225px;
  padding-bottom: 225px;
  border-radius: 5px;
  display: flex;
  width: 95%;
  background-color: #262626;
  box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);

}

.letter-holder {
  align-items: center;
}

.letter {
  display: flex;
  text-align: center;
  float: left;
  font-size: 40px;
  color: black;
  position: relative;
  margin-top: 21%;
  left:35%;
  padding-right:24px;
  padding-top :20px;
  

}



.load-6 .letter {
  animation-name: loadingF;
  animation-duration: 1.6s;
  animation-iteration-count: infinite;
  animation-direction: linear;
}

.l-1 {
  animation-delay: 0.48s;
}
.l-2 {
  animation-delay: 0.6s;
}
.l-3 {
  animation-delay: 0.72s;
}
.l-4 {
  animation-delay: 0.84s;
}
.l-5 {
  animation-delay: 0.96s;
}
.l-6 {
  animation-delay: 1.08s;
}
.l-7 {
  animation-delay: 1.2s;
}
.l-8 {
  animation-delay: 1.32s;
}
.l-9 {
  animation-delay: 1.44s;
}
.l-10 {
  animation-delay: 1.56s;
}

@keyframes loadingF {
  0% {
    opacity: 0;
  }
  100% {
    opacity: 1;
  }
}

@keyframes loadingG {
  0% {
    transform: translate(0, 0) rotate(0deg);
  }
  50% {
    transform: translate(70px, 0) rotate(360deg);
  }
  100% {
    transform: translate(0, 0) rotate(0deg);
  }
}

@keyframes loadingH {
  0% {
    width: 15px;
  }
  50% {
    width: 35px;
    padding: 4px;
  }
  100% {
    width: 15px;
  }
}

@keyframes loadingI {
  100% {
    transform: rotate(360deg);
  }
}

@keyframes bounce {
  0%,
  100% {
    transform: scale(0);
  }
  50% {
    transform: scale(1);
  }
}

@keyframes loadingJ {
  0%,
  100% {
    transform: translate(0, 0);
  }

  50% {
    transform: translate(80px, 0);
    background-color: #f5634a;
    width: 25px;
  }
}

</style>
</head>

<body style="background-color: #808080;">
                
                <div class="load-6">
                    <div class="letter-holder">
                    <div class="l-1 letter">L</div>
                    <div class="l-2 letter">o</div>
                    <div class="l-3 letter">a</div>
                    <div class="l-4 letter">d</div>
                    <div class="l-5 letter">i</div>
                    <div class="l-6 letter">n</div>
                    <div class="l-7 letter">g</div>
                    <div class="l-8 letter">.</div>
                    <div class="l-9 letter">.</div>
                    <div class="l-10 letter">.</div>
                    </div>
              
                </div>
</body>
<script>
     setTimeout(function(){
        location.href = "mainpage.php";
         }, 3500);
</script>
</html>

    
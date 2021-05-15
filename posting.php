<!DOCTYPE html>
<html lang="en">
<head>
    <title>Post your photo </title>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="images/logoicon.ico"/>
	  <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  

    <link href='https://fonts.googleapis.com/css?family=Lato:100,200,300,400,500,600,700' rel='stylesheet' type='text/css'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>


<style>
/* ===================== FILE INPUT ===================== */
.error-text{
  font-family: Poppins-Regular;
  background: #ffcccb;
  display :block;
  border-radius: 5px;
  line-height: 2.5;
  text-align: center;
}
.file-area {
  width: 100%;
  position: relative;
}
.file-area input[type="file"] {
  position: absolute;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  opacity: 0;
  cursor: pointer;
}
.file-area .file-dummy {
  width: 100%;
  padding: 30px;
  background: rgba(255, 255, 255, 0.2);
  border: 2px dashed rgba(255, 255, 255, 0.2);
  text-align: center;
  transition: background 0.3s ease-in-out;
}
.file-area .file-dummy .success {
  display: none;
}
.file-area:hover .file-dummy {
  background: rgba(255, 255, 255, 0.1);
}
.file-area input[type="file"]:focus + .file-dummy {
  outline: 2px solid rgba(255, 255, 255, 0.5);
  outline: -webkit-focus-ring-color auto 5px;
}
.file-area input[type="file"]:valid + .file-dummy {
  border-color: rgba(0, 255, 0, 0.4);
  background-color: rgba(0, 255, 0, 0.3);
}
.file-area input[type="file"]:valid + .file-dummy .success {
  display: inline-block;
}
.file-area input[type="file"]:valid + .file-dummy .default {
  display: none;
}

/* ===================== BASIC STYLING ===================== */
* {
  box-sizing: border-box;
  font-family: "Lato", sans-serif;
}

html,
body {
  margin: 0;
  padding: 0;
  font-weight: 300;
  height: 100%;
  background: #053777;
  color: #fff;
  font-size: 16px;
  overflow: hidden;
  background-color: #262626;
}

h1 {
  text-align: center;
  margin: 50px auto;
  font-weight: 100;
}

label {
  font-weight: 500;
  display: block;
  margin: 4px 0;
  text-transform: uppercase;
  font-size: 13px;
  overflow: hidden;
}
label span {
  float: right;
  text-transform: none;
  font-weight: 200;
  line-height: 1em;
  font-style: italic;
  opacity: 0.8;
}

.form-controll {
  display: block;
  padding: 8px 16px;
  width: 100%;
  font-size: 16px;
  background-color: rgba(255, 255, 255, 0.2);
  border: 1px solid rgba(255, 255, 255, 0.3);
  color: #fff;
  font-weight: 200;
}
.form-controll:focus {
  outline: 2px solid rgba(255, 255, 255, 0.5);
  outline: -webkit-focus-ring-color auto 5px;
}

.button {
  padding: 8px 30px;
  background: rgba(255, 255, 255, 0.8);
  color: #053777;
  text-transform: uppercase;
  font-weight: 600;
  font-size: 11px;
  border: 0;
  text-shadow: 0 1px 2px #fff;
  cursor: pointer;
}

.form-group {
  max-width: 500px;
  margin: auto;
  margin-bottom: 30px;
}

.back-to-article {
  color: #fff;
  text-transform: uppercase;
  font-size: 12px;
  position: absolute;
  right: 20px;
  top: 20px;
  text-decoration: none;
  display: inline-block;
  background: rgba(0, 0, 0, 0.6);
  padding: 10px 18px;
  transition: all 0.3s ease-in-out;
  opacity: 0.6;
}
.back-to-article:hover {
  opacity: 1;
  background: rgba(0, 0, 0, 0.8);
}


</style>



<body>
        <form method="post" name="form" id="form" enctype="multipart/form-data" autocomplete="off" action="user.php?user_id=<?php echo''.$_SESSION['unique_id'].''; ?>">
        <br>
        <br>
        <br>
        <br>        
        <br>
        <br>
        <br>
        <br> 
        <br>
        <div class="form-group file-area">
                <label for="images">Images <span>Your images should be at least 400x300 wide</span></label>
            <input type="file" name="image" id="image" required="required" multiple="multiple"/>
            <div class="file-dummy">
            <div class="success">Great, your files are selected. Keep on.</div>
            <div class="default">Please select some files</div>
            </div>
        </div>
        <br>
        <br>        
        <div class="form-group">
            <label for="caption">Caption <span>This caption should be descriptiv</span></label>
            <input type="text" name="caption" id="caption" class="form-controll"/>
        </div>
        <br>
        <br>        
        <div class="form-group">
            <input type="submit" class="button" name="insert" id="insert" value = "POST"></input>
        </div>
        <div class="error-text"></div>
        
        </form>

    <a href="mainpage.php" class="back-to-article">back to Home</a>
    <script src="javascript/posting.js"></script> 
  </body>
</html>
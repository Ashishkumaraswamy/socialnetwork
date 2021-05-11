//208078296584-nqh94ti82n7gkga84viajvm61laec6el.apps.googleusercontent.com 
//W6PoOiGjt7MRoopRi-vB5PiC

$(document).ready(function(){
    const urlParams = new URLSearchParams(window.location.search);
    const code = urlParams.get('code');
    const redirectURI = "http://localhost/socialmedia/socialnetwork/posting.php"; // replace with your redirect_uri;
    const clientSecret = "W6PoOiGjt7MRoopRi-vB5PiC"; // replace with your client secret
    const scope = "https://www.googleapis.com/auth/drive";
    var access_token= "";
    var clientId = "208078296584-nqh94ti82n7gkga84viajvm61laec6el.apps.googleusercontent.com";// replace it with your client id;
    console.log(code);
    $.ajax({
        type: 'POST',
        url: "https://www.googleapis.com/oauth2/v4/token",
        data: {
            code:code,
            redirect_uri:redirectURI,
            client_secret:clientSecret,
            client_id:clientId,
            scope:scope,
            grant_type:"authorization_code"
        },
        dataType: "json",
        success: function(resultData) {
           
           localStorage.setItem("accessToken",resultData.access_token);
           localStorage.setItem("refreshToken",resultData.refreshToken);
           localStorage.setItem("expires_in",resultData.expires_in);
           window.history.pushState({}, document.title, "/socialmedia/socialnetwork/" + "posting.php"); 
           
        },
        error: function(resultData) {
            console.log("Sorry...");
            console.log(resultData);
            console.log(resultData.responseText);
          }
    });

    function stripQueryStringAndHashFromPath(url) {
        return url.split("?")[0].split("#")[0];
    }   

    var Upload = function (file) {
        this.file = file;
    };
    
    Upload.prototype.getType = function() {
        localStorage.setItem("type",this.file.type);
        return this.file.type;
    };
    Upload.prototype.getSize = function() {
        localStorage.setItem("size",this.file.size);
        return this.file.size;
    };
    Upload.prototype.getName = function() {
        return this.file.name;
    };
    Upload.prototype.doUpload = function () {
        alert('Entered Do upload');
        var that = this;
        var formData = new FormData();
    
        // add assoc key values, this will be posts values
        formData.append("file", this.file, this.getName());
        formData.append("upload_file", true);
    
        $.ajax({
            type: "POST",
            beforeSend: function(request) {
                request.setRequestHeader("Authorization", "Bearer" + " " + localStorage.getItem("accessToken"));
                
            },
            url: "https://www.googleapis.com/upload/drive/v2/files",
            data:{
                uploadType:"media"
            },
            xhr: function () {
                var myXhr = $.ajaxSettings.xhr();
                if (myXhr.upload) {

                }
                return myXhr;
            },
            success: function (data) {
                alert("SUCESS");
                console.log(data);
            },
            error: function (error) {
                alert('failure');
                console.log(error);
            },
            async: true,
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            timeout: 60000
        });
    };
    

    $("#upload").on("click", function (e) {
        alert('Clicked button');
        var file = $("#files")[0].files[0];
        var upload = new Upload(file);
    
        // maby check size or type here with upload.getSize() and upload.getType()
    
        // execute upload
        upload.doUpload();
    }); 
});
 
const form=document.querySelector("#form");

$(document).ready(function(){  
    $('#insert').click(function(){  
         var image_name = $('#image').val();  
         if(image_name == '')  
         {  
              alert("Please Select Image");  
              return false;  
         }  
         else  
         {  
              var extension = $('#image').val().split('.').pop().toLowerCase();  
              if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)  
              {  
                   alert('Invalid Image File');  
                   $('#image').val('');  
                   return false;  
              }  
              else{
                document.getElementById("image").width = "400";
                document.getElementById("image").height = "400";
                let xhr = new XMLHttpRequest();
                xhr.open("POST", "php/posting.php", true);
                xhr.onload = ()=>{
                  if(xhr.readyState === XMLHttpRequest.DONE){
                      if(xhr.status === 200){
                          let data = xhr.response;
                          
                          document.getElementById("form").action = "user.php";
                      }
                  }
                }
                let formData = new FormData(form);
                xhr.send(formData);

              }
         }  
    });

});  


/*
const form=document.querySelector("#form"),
continueBtn = form.querySelector("#insert"),
errorText = form.querySelector(".error-text"),


form.onsubmit = (e)=>{
    e.preventDefault();
}

continueBtn.onclick = ()=>{
   
}

foo.ondblclick = ()=>{
    alert('Invalid Image File'); 
}  */
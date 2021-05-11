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
         }  
    });  
});  



const form=document.querySelector("#form"),
continueBtn = form.querySelector("#insert"),
errorText = form.querySelector(".error-text");

form.onsubmit = (e)=>{
    e.preventDefault();
}

continueBtn.onclick = ()=>{
   let xhr = new XMLHttpRequest();
   xhr.open("POST", "php/posting.php", true);
   xhr.onload = ()=>{
     if(xhr.readyState === XMLHttpRequest.DONE){
         if(xhr.status === 200){
             let data = xhr.response;
            if(data === "success"){
               location.href = "user.php";
             }
            else{
               errorText.textContent = data;
               errorText.style.height = "45px";
               document.getElementById("form").action = "posting.php";

             }
         }
     }
   }
   let formData = new FormData(form);
   xhr.send(formData);
}

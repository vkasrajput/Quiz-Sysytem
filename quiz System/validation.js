console.log("hello");
function validateForm() {
   var u1=document.getElementById("user").value;
   var p1=document.getElementById('pswd').value;
   if(u1=="")
   {
    
       console.log('bolo');
       document.getElementById('u').innerHTML="Invalid";
       return false;   
   }
   else
   {
       document.getElementById('u').innerHTML=u1;
       return true;
   }
   


 }  
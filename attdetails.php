<html>
<head>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>


<script>
@import "node_modules/bootstrap/scss/bootstrap";</script>
<?php
session_start();
if(isset($_SESSION['usn'])){
     
    }
    else{
      header("location: studentlogin.php");
    } 
?>
<link rel="stylesheet" type="text/css" href="CSS/student.css">
  
<script>
function getData() {          
if (window.XMLHttpRequest) {
              
xmlhttp = new XMLHttpRequest();}else
{     
               xmlhttp = new ActiveXObject("Microsoft.XMLHTTP")
}
          
xmlhttp.onreadystatechange = function() {
if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
document.getElementById("target").innerHTML = xmlhttp.responseText;
}
}
xmlhttp.open("GET","showattdetails.php",true);
xmlhttp.send();
         }

function goback()
{
	location.replace('attdisplay.php');
}
</script>
 </head>
 
 <body style=" background-image: url(images/bgadminmain1.jpg); background-repeat:no-repeat; background-size:cover;" onload="getData()">
	<nav class="navbar navbar-expand-lg navbar-light bg-danger">
  <a class="navbar-brand" href="#">CSIS</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="studentmainpage.php">Home</a>
      </li>
    </ul>
   
  </div>
</nav>

<center>
 <h4 class="my-2" align="center"style=" font-family:Arial ;width:400px;color :white;background-color:rgb(196, 25, 25 ,0.7) ;border-radius: 15px;"><b style="text-shadow: 3px 2px black;">Attendence Details</b></h4>

<div class="divb" id="target">


 </div><br><br>
<input type="button" style="margin-top:50px;" class="button1"  onclick="goback()" value="Go back">

</center>
  </body>
  </html>
  

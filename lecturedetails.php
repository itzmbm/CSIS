<html>
<head>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

<!-- jQuery and JS bundle w/ Popper.js -->	
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<script>
@import "node_modules/bootstrap/scss/bootstrap";</script>
</script>
<link rel="stylesheet" type="text/css" href="CSS/admin.css">
  
<script>
function getData() {
	str=document.getElementById("idname").value;           
if (window.XMLHttpRequest) {
              
xmlhttp = new XMLHttpRequest();}else
{     
               xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
}
          
xmlhttp.onreadystatechange = function() {
if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
document.getElementById("target").innerHTML = xmlhttp.responseText;
}
}
xmlhttp.open("GET","lectdetails.php?q="+str,true);
xmlhttp.send();
         }
function disp(){
           
if (window.XMLHttpRequest) {
              
xmlhttp = new XMLHttpRequest();}else
{     
               xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
}
          
xmlhttp.onreadystatechange = function() {
if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
document.getElementById("target").innerHTML = xmlhttp.responseText;
}
}
xmlhttp.open("GET","lectdetailsonload.php",true);
xmlhttp.send();
}
</script>
		
 </head>
 
 <body onload="disp()" style=" background-image: url(images/bgadmin2.jpg); background-repeat:no-repeat; background-size:cover;  font-size:16px;font-family:Arial;color:white;">
				<?php
		session_start();
		if(isset($_SESSION['email'])){
		 
		}
		else{
			header("location: login1.php");
		}
		?>
	<nav class="navbar navbar-expand-lg navbar-light bg-danger">
  <a class="navbar-brand" href="#">CSIS</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="adminmainpage.php">Home</a>
      </li>

    </ul>
   
  </div>
</nav>
  <center>
  
  <form class="formm">
  <input type="text" class="textbox" name="idname" style="margin-bottom:10px;margin-top:5;" id="idname" placeholder="Enter ID" >
  <input type="button" class="button1" name="search" id="search" value="Search" onclick="getData()">
   </form>
   <br>
   <div id="target" class="divm" > </div>
   </center>

  </body>
  </html>
  

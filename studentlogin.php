<html>
<head>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

<!-- jQuery and JS bundle w/ Popper.js -->	
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<script>
@import "node_modules/bootstrap/scss/bootstrap";</script>
<link rel="stylesheet" type="text/css" href="CSS/login.css">
				<script>
		function cancel(){
			location.replace('homeblog.html');
		}
		</script>
 </head>
 <body style=" background-image: url(images/bgadmin2.jpg); background-repeat:no-repeat; background-size:cover;  font-size:16px;font-family:Arial;color:white;">
  <?php
  $usn="";
  $pass="";
	$ve="";
	$vp="";
	$eerr="";
	$perr="";
  if(isset($_POST['sub']))
  {
	   if(empty($_POST["usn"]))
	  {
         $eerr = "USN is required";
	  }     
	  else	  
	  {
		  $usn=$_POST["usn"];
		  $res=true;
	  }
	    if(empty($_POST["password"]))
	  {
         $perr = "Password is required";
		 $res=false;
	  }
  else{
			  $perr="";
			  $pass=$_POST["password"];
			  $res=true;
	 }    $conn=mysqli_connect("localhost","root","","project1");  
	  if($res)
	  {
		 	
			$ins="select * from studentdetails where usn='$usn' AND password='$pass'";
			if($res=mysqli_query($conn,$ins)){
			if(mysqli_num_rows($res)==1)
			{
				session_start();
				$_SESSION['usn']=$usn;
				header('location:studentmainpage.php');
			}
			else{
				echo "<script>window.alert('login unsucessfull')</script>";
			}
			}
	  }
	  else{
					
		}
		mysqli_close($conn);			
      }     
	  
  ?>

	<nav class="navbar navbar-expand-lg navbar-light bg-danger">
  <a class="navbar-brand" href="#">CSIS</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

</nav>
  <center>
  <form method='post'  class="t1"  action='#'>
  <table cellspacing="3px" cellpadding="10px" style="margin-top: 10px;">
  <tr align="center"><th colspan="3"  style="font-size:17px; color :white;background-color:rgb(196, 25, 25 ,0.7) ;border-radius: 15px;">Student Login</th></tr>
  	<tr>
  		<td>USN:<br></td><td><input type="text" class="textbox"  style="text-transform:uppercase" name="usn"><br><span class="c1">*<?php echo $eerr;?></span></td></tr>
    <tr><td>Password:<br></td><td><input type="password" class="textbox" name="password"><br><span class="c1">*<?php echo $perr;?></span></td></tr>
  <tr><td colspan='3' align="center">
  <input type="submit" name="sub" value="Login"  class="button1" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <input type="button" name="cancle" value="Cancel"  class="button1" onclick="cancel()" ></td></tr>
  </td></tr>
  </table>
   </form>
   </center>

  </body>
  </html>
  

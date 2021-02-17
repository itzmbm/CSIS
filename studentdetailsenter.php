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

		
 </head>
 		<?php
		session_start();
		if(!(isset($_SESSION['email']))){
			header("location:homeblog.html");
		}
		?>
 <body style=" background-image: url(images/studententryimage1.jpg); background-repeat:no-repeat; background-size:cover;  font-size:16px;font-family:Arial;color:white;">
  <?php
  $name="";
  $email="";
  $usn="";
  $phone="";
  $dept="";
  $sem="";
  $pass="";
  $gar="";
  $mark10=0.0;
  $marks12=0.0;
	$eerr="";
	$m10err="";
	$m12err="";
	$perr="";
	$nerr="";
	$pherr="";
	$gerr="";
	$derr="";
	$serr="";
	$nerr="";
	$usnerr="";
	$res=1;
  if(isset($_POST['sub']))
  {
		if(empty($_POST["name"]))
	  {
         $nerr = "Name is required";
		 $res=0;
	  }     
	  else	  
	  {
		  $nerr = "";
		  $name=$_POST["name"];
		  $res=1;
	  }
	   if(empty($_POST["email"]))
	  {
         $eerr = "Email is required";
		 $res=$res*0;
	  }
  elseif(!filter_var($_POST["email"],FILTER_VALIDATE_EMAIL )) {
			  $eerr="<b>Email is invalid !</b>";
			  $res=$res*0;	 
	 }      
	  else	  
	  {
		  $eerr = "";
		  $email=$_POST["email"];
		  $res=$res*1;
	  }
		if(empty($_POST["usn"]))
	  {
         $iderr = "USN is required";
		 $res=$res*0;
	  }     
	  else	  
	  {
		  $iderr = "";
		  $id=$_POST["usn"];
		  $res=$res*1;
	  }	  
	  	if(empty($_POST["phone"]))
	  {
         $pherr = "Phone number is required";
		 $res=$res*0;
	  }     
	  else	  
	  {
		  $pherr = "";
		  $phone=$_POST["phone"];
		  $res=$res*1;
	  }
	  if(empty($_POST["dept"]))
	  {
         $derr = "Department is required";
		 $res=$res*0;
	  }     
	  else	  
	  {
		  $derr = "";
		  $dept=$_POST["dept"];
		  $res=$res*1;
	  }
	  	if(empty($_POST["sem"]))
	  {
         $serr = "Semester is required";
		 $res=$res*0;
	  }     
	  else	  
	  {
		  $serr = "";
		  $sem=$_POST["sem"];
		  $res=$res*1;
	  }
	  if(empty($_POST["gar"]))
	  {
         $gerr = "Gardian is required";
		 $res=$res*0;
	  }     
	  else	  
	  {
		  $gerr = "";
		  $gar=$_POST["gar"];
		  $res=$res*1;
	  }
	   if(empty($_POST["mark10"]))
	  {
         $mark10 = "10th marks is required";
		 $res=$res*0;
	  }     
	  else	  
	  {
		  $m10err = "";
		  $mark10=$_POST["mark10"];
		  $res=$res*1;
	  }
	 if(empty($_POST["mark12"]))
	  {
         $mark12 = "12th marks is required";
		 $res=$res*0;
	  }     
	  else	  
	  {
		  $m10err = "";
		  $mark12=$_POST["mark12"];
		  $res=$res*1;
	  }
	  if(empty($_POST["pass"]))
	  {
         $perr = "Password is required";
		 $res=$res*0;
	  }     
	  else	  
	  {
		  $perr = "";
		  $pass=$_POST["pass"];
		  $res=$res*1;
	  }
	  if($res==1)
	  {
		$conn=mysqli_connect("localhost","root","","project1");
       $ins="INSERT INTO studentdetails(name,email,usn,phone,department,sem,gardian,mark10,mark12,password)VALUES('$name','$email','$id','$phone','$dept','$sem','$gar','$mark10','$mark12','$pass')";
        if(mysqli_query($conn,$ins)){
		 echo "<script>window.alert('New entry updated')</script>";
				$to_email = $email;
		$subject = "CSIS Login Credentials";
		$body = "Greetings,
		Id:".$id."
		Password:".$pass." ";
			if (mail($to_email, $subject, $body)) {
				echo "<script>window.alert('Credentials sent.....')</script>";
			} else {
				echo "<script>window.alert('Credentials not sent.....')</script>";
			}
		}
		else{
		echo "<script>window.alert('Error in Entry! Please Retry')</script>";
		}
	mysqli_close($conn);
  
	  }
	  
		  
  }
if(isset($_POST['upd'])){
			if(empty($_POST["usn"]))
	  {
         $iderr = "USN is required";
	  }     
	  else	  
	 {	
         $usn=$_POST["usn"];
       $conn=mysqli_connect("localhost","root","","project1");
       $ins="SELECT * FROM studentdetails WHERE usn='$usn'";
        if($res=mysqli_query($conn,$ins)){
		if(mysqli_num_rows($res)==0){
			echo "<script>window.alert('Entry Not found')</script>";
		}
		elseif(mysqli_num_rows($res)==1){
					if(empty($_POST["name"]))
	  {
         $nerr = "Name is required";
		 $res=0;
	  }     
	  else	  
	  {
		  $nerr = "";
		  $name=$_POST["name"];
		  $res=1;
	  }
	   if(empty($_POST["email"]))
	  {
         $eerr = "Email is required";
		 $res=$res*0;
	  }
  elseif(!filter_var($_POST["email"],FILTER_VALIDATE_EMAIL )) {
			  $eerr="<b>Email is invalid !</b>";
			  $res=$res*0;	 
	 }      
	  else	  
	  {
		  $eerr = "";
		  $email=$_POST["email"];
		  $res=$res*1;
	  }	  
	  	if(empty($_POST["phone"]))
	  {
         $pherr = "Phone number is required";
		 $res=$res*0;
	  }     
	  else	  
	  {
		  $pherr = "";
		  $phone=$_POST["phone"];
		  $res=$res*1;
	  }
	  if(empty($_POST["dept"]))
	  {
         $derr = "Department is required";
		 $res=$res*0;
	  }     
	  else	  
	  {
		  $derr = "";
		  $dept=$_POST["dept"];
		  $res=$res*1;
	  }
	  	if(empty($_POST["sem"]))
	  {
         $serr = "Semester is required";
		 $res=$res*0;
	  }     
	  else	  
	  {
		  $serr = "";
		  $sem=$_POST["sem"];
		  $res=$res*1;
	  }
	  if(empty($_POST["gar"]))
	  {
         $gerr = "Gardian is required";
		 $res=$res*0;
	  }     
	  else	  
	  {
		  $gerr = "";
		  $gar=$_POST["gar"];
		  $res=$res*1;
	  }
	   if(empty($_POST["mark10"]))
	  {
         $mark10 = "10th marks is required";
		 $res=$res*0;
	  }     
	  else	  
	  {
		  $m10err = "";
		  $mark10=$_POST["mark10"];
		  $res=$res*1;
	  }
	 if(empty($_POST["mark12"]))
	  {
         $mark12 = "12th marks is required";
		 $res=$res*0;
	  }     
	  else	  
	  {
		  $m10err = "";
		  $mark12=$_POST["mark12"];
		  $res=$res*1;
	  }
	  if(empty($_POST["pass"]))
	  {
         $perr = "Password is required";
		 $res=$res*0;
	  }     
	  else	  
	  {
		  $perr = "";
		  $pass=$_POST["pass"];
		  $res=$res*1;
	  }
		
	  if($res==1){
		   $ins=$up="UPDATE studentdetails SET name='$name',email='$email',phone='$phone',department='$dept',sem='$sem',gardian='$gar',mark10='$mark10',mark12='$mark12',password='$pass' WHERE usn='$usn'";
        if(mysqli_query($conn,$ins)){
		echo "<script>window.alert('New entry updated')</script>";
		}
		else{
		echo "<script>window.alert('Error in Entry! Please Retry 1')</script>";
		}
	  }
		}
		else{
		echo "<script>window.alert('Error in Entry! Please Retry 2')</script>";
		}
	mysqli_close($conn);	
}
	 }
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
    <form method='post'  class="t1"  action='#'>
  <table cellspacing="3px" cellpadding="10px" style="margin-top: 10px;">
  <tr align="center"><th colspan="3"  style="font-size:17px; color :white;background-color:rgb(196, 25, 25 ,0.7) ;border-radius: 15px;">Student Registration</th></tr>
  	<tr><td>Name:<br><input type="textbox" class="textbox"  name="name"><br><span class="c1">*<?php echo $nerr;?></span></td>
	<td>Email:<br><input type="email" class="textbox" name="email"><br><span class="c1">*<?php echo $eerr;?></span></td></tr>
    <tr><td>USN<br><input type="textbox" class="textbox" name="usn"><br><span class="c1">*<?php echo $usnerr;?></span></td>
	<td>Phone number<br><input type="textbox" class="textbox" name="phone"><br><span class="c1">*<?php echo $pherr;?></span></td></tr>
	<tr><td>Department<br><input type="textbox" class="textbox" name="dept"><br><span class="c1">*<?php echo $derr;?></span></td>
	<td>Sem:<br>
		<select name="sem" class="textbox" >
		<option value="1">I</option>
		<option value="2">II</option>
		<option value="3">III</option>
		<option value="4">IV</option>
		<option value="5">V</option>
		<option value="6">VI</option>
		<option value="7">VII</option>
		<option value="8">VIII</option>
	</select><br><span class="c1">*<?php echo $serr;?></span></td></tr>
	<tr><td>Gardian<br><input type="textbox" class="textbox" name="gar"><br><span class="c1">*<?php echo $gerr;?></span></td>
	<td>10th Marks<br><input type="number" class="textbox" name="mark10"><br><span class="c1">*<?php echo $m10err;?></span></td></tr>
	<tr><td>12th Marks<br><input type="number" class="textbox" name="mark12"><br><span class="c1">*<?php echo $m12err;?></span></td>
	<td>Password<br><input type="textbox" class="textbox" name="pass"><br><span class="c1">*<?php echo $perr;?></span></td></tr>
  <tr><td colspan='3' align="center">
  <input type="submit" name="sub" value="Submit"  class="button1" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <input type="submit" name="upd" value="Update"  class="button1" ></td></tr>
  </table>
   </form>
   </center>
  </body>
  </html>
  

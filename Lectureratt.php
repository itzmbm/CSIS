<!-- CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

<!-- jQuery and JS bundle w/ Popper.js -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<script>
@import "node_modules/bootstrap/scss/bootstrap";</script>
<link rel="stylesheet" type="text/css" href="CSS/lecturer.css">
<?php
session_start();
if(isset($_SESSION['id'])){
     
    }
    else{
      header("location: lectlogin.php");
    }
  
$sub=$_SESSION['subj'];

?>

<link rel="stylesheet" type="text/css" href="lecturer.css">

<script >
  function dispname(str)
{
if (str == '') 
{
document.getElementById("name").value = "";
return;
} 
else
{ 
if (window.XMLHttpRequest) 
{       
xmlhttp = new XMLHttpRequest();
} else 
{
xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
}

xmlhttp.onreadystatechange = function() {
if (this.readyState == 4 && this.status == 200) {
             
document.getElementById("name").value = this.responseText;
}
};
xmlhttp.open("GET", "searchstud.php?q="+str, true);
xmlhttp.send();
}
}
  function showUser(str)
{
if (str == '') 
{
document.getElementById("id1").innerHTML = "";
return;
} 
else
{ 
if (window.XMLHttpRequest) 
{       
xmlhttp = new XMLHttpRequest();
} else 
{
xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
}

xmlhttp.onreadystatechange = function() {
if (this.readyState == 4 && this.status == 200) {
             
document.getElementById("id1").innerHTML = this.responseText;
}
};
xmlhttp.open("GET", "searchatt.php?q="+str, true);
xmlhttp.send();
}
}

</script>
<script type="text/javascript">
  var ia=function(){
    document.location.href="Lectureria.php";
  }
  var att=function(){
    document.location.href="Lectureratt.php";
  }

</script>


<?php
$count=0;
$err1="";
$err2="";
$err3="";
$usn1=0;
$usn="";
$name="";
$subject="";
$date1="";
$timef="";
$timet="";
$stat="";
if(isset($_POST['add']))
{
  $usn=$_POST["usn"];
  $usnl=strlen($_POST["usn"]);
  if($usnl!=10)
  {
    $err1="valid usn is of 10 characters";
    $count=1;
  }
  elseif(!preg_match("/1MS[0-9][0-9]MCA[0-9][1-9]/",$usn))
  {
    $err1="enter valid usn ex:1MS19MCA**";
    $count=1;
 }
 $name = $_POST["name"];
 if (!preg_match("/^[a-zA-Z-' ]*$/",$name))
   {
      $err2 = "Only letters and white spaces allowed";
      $count=1;
    }
    if($count==0)
    {
      $conn= mysqli_connect("localhost", "root", "", "project1"); 
// Prepare an insert statement
    $usn = $_REQUEST['usn'];
    $subject = $sub;
    $date1=$_REQUEST['date1'];
$query = "SELECT * FROM studentatt WHERE usn = '$usn' and subject='$subject' and date1='$date1' ";
$results = mysqli_query($conn, $query);
$rows = mysqli_num_rows($results);
if($rows===0)
{
$sql = "INSERT INTO studentatt (usn, name, subject, date1, timef, timet, stat) VALUES (?, ?, ?, ?, ?, ?, ?)"; 
if($stmt = mysqli_prepare($conn, $sql)){
mysqli_stmt_bind_param($stmt, "sssssss", $usn, $name, $subject, $date1, $timef, $timet, $stat);    
    $usn = $_REQUEST['usn'];
    $name = $_REQUEST['name'];
    $subject = $sub;
    $date1=$_REQUEST['date1'];
    $timef = $_REQUEST['timef'];
    $timet = $_REQUEST['timet'];
    $stat = $_REQUEST['stat'];
   

if(mysqli_stmt_execute($stmt)){ echo '<script> alert("Records inserted successfully.")</script>';

   
    $stat= '';
   
}
else{ echo '<script>alert("USN does not exists")</script>'; 

//echo "Error".mysqli_error($conn)
}
} 
mysqli_stmt_close($stmt); 
mysqli_close($conn);
    
}
else
{echo '<script>alert("Attendance already exists for this USN click on Update to change status")</script>';}
    }
  }




if(isset($_POST['update']))
{
  $conn= mysqli_connect("localhost", "root", "", "project1"); 
$usn1 = $_REQUEST['usn'];
    $subject1 = $sub;
$query1 = "SELECT * FROM studentia WHERE usn = '$usn1' and subject='$subject1'";
$results1 = mysqli_query($conn, $query1);
$rows1 = mysqli_num_rows($results1);
if($rows1!==0)
{
   $usn = $_REQUEST['usn'];
    $name = $_REQUEST['name'];
    $subject = $sub;
    $date1=$_REQUEST['date1'];
    $timef = $_REQUEST['timef'];
    $timet = $_REQUEST['timet'];
    $stat = $_REQUEST['stat'];
  
  $sql = "UPDATE studentatt SET 

         timef='$timef',
         timet='$timet',
         stat='$stat'
         where usn='$usn' and subject='$subject' and date1='$date1' "; 
if ($conn->query($sql) === TRUE) {
  echo "<script>alert('Record updated successfully')</script>";
  $stat='';
   
} else {
  echo "Error updating record: " . $conn->error;
}
}
else
{
  echo "<script>alert('USN does not exists ')</script>";
} 
mysqli_close($conn);
  }
   ?> 
<html>
<head>
	<title>Lecturer Home page</title>
</head>
<body style=" background-image: url(images/home1.jpg); background-repeat:no-repeat; background-size:cover;  font-size:16px;font-family:Arial;color:white;">
	<nav class="navbar navbar-expand-lg navbar-light bg-danger">
  <a class="navbar-brand" href="#">CSIS</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">

      <li class="nav-item">
        <a onclick="att()"class="nav-link" href="lectmainpage.php">Home</a>
      </li>
   
    </ul>
   
  </div>
</nav>

    <div class="atti" style="margin-left: 70px;margin-top:25px;">
		<form  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" style="margin-left: 10px;margin-top:5px;" method="post" >
		<table align="center">
		<tr align="center"><th colspan="2"  style="font-size:17px; color :white;background-color:rgb(196, 25, 25 ,0.7) ;border-radius: 15px;">Student Details</th></tr>
		<tr>
			<td><label>USN :</label></td><td><input type="text" id="usn" onchange="dispname(this.value)"  name="usn" class="textbox" style="text-transform:uppercase" value="<?php print $usn; ?>" required=""><br><span class="col"><?php echo $err1; ?></span></td></tr>
		<tr>
			<td><label>Name :</label></td><td><input type="text" id="name" name="name"  class="textbox" value="<?php print $name; ?>" required=""><br><span class="col"><?php echo $err2; ?></span></td></tr>
		<tr>
			<td><label>Subject :</label></td><td><input type="text" id="subject" name="subject"class="textbox" value="<?php echo $sub; ?>" disabled><br><span class="col"><?php echo $err3; ?></span></td></tr>
			<tr>
		<td><label>Date :</label></td><td><input type="date" id="date1" name="date1" class="textbox" value="<?php echo date('Y-m-d'); ?>"  required=""></td></tr>
		<tr><td><label>Time From:</label></td><td><input type="time" id="timef" name="timef" class="textbox" value="<?php print $timef; ?>" required=""></td></tr>
		<tr><td><label>Time Till:</label></td><td><input type="time" id="timet" name="timet" class="textbox" value="<?php print $timet; ?>" required=""></td></tr>
		<tr><td><label>Status:</label></td><td><input type="radio" name="stat" id="stat" value="Present" required="">Present<input type="radio" name="stat" id="stat" value="Absent" required="">Absent</td></tr>
    <tr><td colspan=2 >
      <input type="submit" name="add" id="add" value="Add" class="btn btn-success">&nbsp;&nbsp;<input type="submit" name="update" id="update" value="Update"  class="btn btn-warning">&nbsp;&nbsp;<input type="reset" class="btn btn-danger" value="clear" 
       onclick="document.getElementById('usn').value='',
                document.getElementById('name').value='',
                document.getElementById('subject').value='',
                document.getElementById('date1').value='',
                document.getElementById('timef').value='',
                document.getElementById('timet').value='',
                document.getElementById('stat').value=''">
     </td></tr>
</table>
</form>
	</div>
  <div class="satt"
    style="margin-left: 500px;
    margin-top:-450px;"><center>
    <div><label>Search :</label><input type="text" id="usns" name="usns" class="textbox" onchange="showUser(this.value)" style="text-transform:uppercase">&nbsp;&nbsp;<input type="submit"  name="search" id="search"  class="btn btn-success" ><br />
     </div></center>
    <div id="id1">

  
 </div>
</div>
</div>

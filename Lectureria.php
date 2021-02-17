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

<script type="text/javascript">
  var ia=function(){
    document.location.href="Lectureria.php";
  }
  var att=function(){
    document.location.href="Lectureratt.php";
  }

</script>
<script >
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
xmlhttp.open("GET", "searchia.php?q="+str, true);
xmlhttp.send();
}
}

function showDet(str)
{
if (str == '') 
{
document.getElementById("ia").innerHTML = "";
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
             
document.getElementById("ia").innerHTML = this.responseText;
}
};
xmlhttp.open("POST", "Lectureria.php?a="+str, true);
xmlhttp.send();
}
}
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
$sem="";
$ia1="";
$ia2="";
$ia3="";
$aq1="";
$aq2="";
// if(isset($_POST['usn']))
// {
// $a = $_POST['a'];
//     $conn = mysqli_connect('localhost','root','','csis');
//     if (!$conn) {
//       die('Could not connect: ' . mysqli_error($con));
//     }

//     mysqli_select_db($conn, "ajax_");
//     $sql = "SELECT * FROM Studentia WHERE usn = '".$a."'";
//     $result = mysqli_query($conn,$sql);

//     while($row = mysqli_fetch_array($result)) {
      
//       $usn=$row['usn'] ;
//       $name=$row['name'] ;
//       $subject=$row['subject']; 
//       $sem=$row['sem'] ;
//       $ia1=$row['ia1'] ;
//       $ia2=$row['ia2'] ;
//       $ia3=$row['ia3'];
//       $aq1=$row['aq1'] ;
//       $aq2=$row['aq2'] ;
//       $total=$row['total'];
      
//     }
    
//     mysqli_close($conn);
// }

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
    $sem=$_POST['sem'];
    if($sem==0)
    {
      $err3="Select a Semester";
      $count=1;
    }
    
    
  if($count==0)
    {
      $conn= mysqli_connect("localhost", "root", "", "project1"); 
// Prepare an insert statement
    $usn = $_REQUEST['usn'];
    $subject = $sub;
$query = "SELECT * FROM studentia WHERE usn = '$usn' and subject='$subject'";
$results = mysqli_query($conn, $query);
$rows = mysqli_num_rows($results);
if($rows===0)
{
$sql = "INSERT INTO Studentia (usn, name, subject, sem, ia1, ia2, ia3, aq1, aq2,total) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"; 
if($stmt = mysqli_prepare($conn, $sql)){
mysqli_stmt_bind_param($stmt, "sssiiiiiii", $usn, $name, $subject, $sem, $ia1, $ia2, $ia3, $aq1, $aq2, $total);    
    $usn = $_REQUEST['usn'];
    $name = $_REQUEST['name'];
    $subject = $sub;
    $sem=$_REQUEST['sem'];
    $ia=$_REQUEST['ia'];
    $aq=$_REQUEST['aq'];
    $sql = "SELECT * FROM Studentia WHERE usn = '".$usn."'";
    $result = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_array($result)) {
      $ia1=$row['ia1'];
      $ia2=$row['ia2'];
      $ia3=$row['ia3'];
      $aq1=$row['aq1'];
      $aq2=$row['aq2'];
    }
    if($ia=='ia1')
    {
      $ia1=$_REQUEST['ian'];
    }
    elseif($ia=='ia2')
    {
      $ia2=$_REQUEST['ian'];
    }
    elseif($ia=='ia3')
    {
      $ia3=$_REQUEST['ian'];
    }
     if($aq=='aq1')
    {
      $aq1=$_REQUEST['aqn'];
    }
   else if($aq=='aq2')
    {
      $aq2=$_REQUEST['aqn'];
    }


    $first=0;
    $second=0;
    if($ia1>=$ia2 && $ia1>=$ia3)
    {
        $first=$ia1;
        if($ia2>=$ia3)
        {
            $second=$ia2;
        }
        else{
            $second=$ia3;
        }
    }
    if($ia2>=$ia1 && $ia2>=$ia3)
    {
        $first=$ia2;
        if($ia1>=$ia3)
        {
            $second=$ia1;
        }
        else{
            $second=$ia3;
        }
    }
    if($ia3>=$ia1 && $ia3>=$ia2)
    {
        $first=$ia3;
        if($ia1>=$ia2)
        {
            $second=$ia1;
        }
        else
        {
            $second=$ia2;
        }
    }

$total=0;
$total=(((int)$first+(int)$second)/2)+(int)$aq1+(int)$aq2;
if(mysqli_stmt_execute($stmt)){ echo '<script> alert("Records inserted successfully.")</script>';

    $subject ='';
    
    $ia='';
    $ian='';
    $aq='';
    $aqn='';
    $ia1 = '';
    $ia2 = '';
    $ia3 = '';
   $aq1 = '';
   $aq2 = '';
$total='';
 }
else{ echo '<script>alert("USN does not exists")</script>'; 

//echo "Error".mysqli_error($conn)
}
} 
mysqli_stmt_close($stmt); 
mysqli_close($conn);
    
}
else
{
  echo '<script>alert("USN already exists click on Update")</script>';}
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
    $sem=$_REQUEST['sem'];
    $ia=$_REQUEST['ia'];
    $aq=$_REQUEST['aq'];
    $sql = "SELECT * FROM Studentia WHERE usn = '".$usn."'";
    $result = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_array($result)) {
      $ia1=$row['ia1'];
      $ia2=$row['ia2'];
      $ia3=$row['ia3'];
      $aq1=$row['aq1'];
      $aq2=$row['aq2'];
    }
    if($ia=='ia1')
    {
      $ia1=$_REQUEST['ian'];
    }
    elseif($ia=='ia2')
    {
      $ia2=$_REQUEST['ian'];
    }
    elseif($ia=='ia3')
    {
      $ia3=$_REQUEST['ian'];
    }
     if($aq=='aq1')
    {
      $aq1=$_REQUEST['aqn'];
    }
   else if($aq=='aq2')
    {
      $aq2=$_REQUEST['aqn'];
    }
  
   $first=0;
    $second=0;
    if($ia1>=$ia2 && $ia1>=$ia3)
    {
        $first=$ia1;
        if($ia2>=$ia3)
        {
            $second=$ia2;
        }
        else{
            $second=$ia3;
        }
    }
    if($ia2>=$ia1 && $ia2>=$ia3)
    {
        $first=$ia2;
        if($ia1>=$ia3)
        {
            $second=$ia1;
        }
        else{
            $second=$ia3;
        }
    }
    if($ia3>=$ia1 && $ia3>=$ia2)
    {
        $first=$ia3;
        if($ia1>=$ia2)
        {
            $second=$ia1;
        }
        else
        {
            $second=$ia2;
        }
    }
    $total=0;
$total=(((int)$first+(int)$second)/2)+(int)$aq1+(int)$aq2;

  $sql = "UPDATE Studentia SET 
         ia1='$ia1',
         ia2='$ia2',
         ia3='$ia3',
         aq1='$aq1',
         aq2='$aq2',
         total='$total'
         where usn='$usn' and subject='$subject'"; 
if ($conn->query($sql) === TRUE) {
  echo "<script>alert('Record updated successfully')</script>";
  
    $subject ='';
   
    $ia='';
    $ian='';
    $aq='';
    $aqn='';
    $ia1 = '';
    $ia2 = '';
    $ia3 = '';
   $aq1 = '';
   $aq2 = '';
   $total='';
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
  <title></title>
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


<div id="ia" >
  <div class="iai" style="margin-left: 50px;margin-top:25px;">
  <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" style="margin-left: 10px;margin-top:5px;" method="post">
    <table >
			<tr align="center"><th colspan="2"  style="font-size:17px; color :white;background-color:rgb(196, 25, 25 ,0.7) ;border-radius: 15px;">Student Details</th></tr>

    <tr>
      <td><label>USN :</label></td><td><input type="textbox" class="textbox" onchange="dispname(this.value)" name="usn" id="usn"  value="<?php print $usn; ?>"  maxlength=10 required="" style="text-transform:uppercase"><br><span class="col"><?php echo $err1; ?></span></td></tr>
    <tr>
      <td><label>Name :</label></td><td><input type="textbox" name="name" id="name" class="textbox" value="<?php print $name; ?>" maxlength=30 required=""><br><span class="col"><?php echo $err2; ?></span></td></tr>
    <tr>
      <td><label>Subject :</label></td><td><input type="textbox" name="subject" id="subject" class="textbox" value="<?php echo @$sub;?>"
         maxlength=50  disabled></td></tr>
      <tr>
        <td><label>Semester :</label></td>
        <td>
          <select name="sem" id="sem"class="textbox" required="">
            <option value="0">Select a sem</option>
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
          <option value="6">6</option>
        </select>
        <br><span class="col"><?php echo $err3; ?></span>
        </td>
      </tr>
<tr style="height:100px">
        <td><label>IA :</label></td>
        <td>
          <select name="ia" id="ia" class="textbox">
            <option value="0">Select a IA</option>
          <option value="ia1">IA1</option>
          <option value="ia2">IA2</option>
          <option value="ia3">IA3</option>
        
        </select>
        <br/><br />
        <input type="number" name="ian"  id="ian" class="textbox" min="00" max="30" >
      </td>
    </tr>
        <tr style="height:100px">
        <td ><label>Assignment/Quiz :</label></td>
        <td>
          <select  width="10" name="aq" id="aq"  class="textbox">
            <option value="0" >Select a Assignment/Quiz</option>
          <option value="aq1">AQ1</option>
          <option value="aq2">AQ2</option>
    
        </select>
        <br /><br />
        <input type="number" name="aqn" id="aqn"  class="textbox"  min="00" max="10" >
      </td></tr>
        <tr><td colspan=2>&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="add" id="add" value="Add" class="btn btn-success">&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="update" id="update" value="Update"  class="btn btn-warning">&nbsp;&nbsp;<input type="reset" class="btn btn-danger" value="clear" 
          onclick="document.getElementById('usn').value='',
          document.getElementById('name').value='',
          document.getElementById('subject').value='',
          document.getElementById('sem').value='',
          document.getElementById('ia').value='',
          document.getElementById('ian').value='',
          document.getElementById('aq').value='',
          document.getElementById('aqn').value=''" 
   ></td></tr>
</table>
</form>
</div>
<div class="sia" style="
    margin-left: 525px;
    margin-top:-550px;"><center>
    <label>Search :</label><input type="text" id="usns" name="usns" class="textbox" onchange="showUser(this.value)" style="text-transform:uppercase">&nbsp;&nbsp;<input type="submit"  name="search" id="search"  class="btn btn-success" ><br />
</center>
    <div id="id1">

  
 </div>
</div>
</div>
</body>
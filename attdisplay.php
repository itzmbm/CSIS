
<html>
<head>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

<script>
@import "node_modules/bootstrap/scss/bootstrap";</script>
  <link rel="stylesheet" type="text/css" href="CSS/student.css">
		<script>
		function details()
		{
			location.replace('attdetails.php');
		}
		</script>
 </head>
 
 <body style=" background-image: url(images/bgadminmain1.jpg); background-repeat:no-repeat; background-size:cover;">
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

<?php
$conn=mysqli_connect("localhost","root","","project1");
session_start();
if(isset($_SESSION['usn'])){
		 
		}
		else{
			header("location: studentlogin.php");
		}
$usn=$_SESSION['usn'];
?>
<center>
 <h4 class="my-2" align="center" style="height:35px; font-family:Arial ;width:400px;box-shadow: 3px 2px 3px 2px black;color :white;background-color:rgb(196, 25, 25 ,0.7) ;border-radius: 15px;"><b style="text-shadow: 3px 2px black;">Attendance<b></h4>
</center>
  <div class="col-md-10">
    	
				<div class="divn" style="height:130px;margin-left:200px; background-color:rgb(224, 101, 101 ,0.9) ;">
    				<div class="col-md-12">

                                <?php
								    $sql = "SELECT * FROM studentatt WHERE usn = '$usn'";
									$sql1="SELECT count(stat) from studentatt where usn='$usn' and subject='PHP'";
									$sql2="SELECT count(stat) from studentatt where usn='$usn' and subject='PHP' and stat='Present'";
									$result = mysqli_query($conn,$sql);
									if(mysqli_num_rows($result)>0){
									$result1=mysqli_query($conn,$sql1);
									$result2=mysqli_query($conn,$sql2);
									$row1=mysqli_fetch_array($result1);
									$row2=mysqli_fetch_array($result2);
									$total=$row1['count(stat)'];
									$present=$row2['count(stat)'];
								    $per=round(($present/$total)*100);}
									else{
										$per=0;
									}
								
                                ?>
								<h5 class="text-white text-center" style="margin-top:5px;box-shadow: 3px 2px 3px 2px black;color :white;background-color:rgb(196, 25, 25 ,0.9) ;border-radius: 15px;">Attendance (%)</h5>
    							<h5 class="my-2  text-center" style="font-size: 40px;color:white;" id="t1"><?php echo $per;?>%</h5>
    							<?php								    
								if($per<75.0){
								        echo "<script language='javascript'>document.getElementById('t1').style.color='red';</script>";
								  }		                    
								?>
								<h5 class="text-white text-center"style="font-size:22px;">PHP and Ajax</h5>
    							
								
    						</div>

    			</div>
				<div class="divn" style="height:130px;margin-top:-130px;margin-left:900px; background-color:rgb(226, 248, 153 ,0.9) ;">
    				
    						<div class="col-md-12" >

                                <?php
								    $sql = "SELECT * FROM studentatt WHERE usn = '$usn'";
									$sql1="SELECT count(stat) from studentatt where usn='$usn' and subject='C++'";
									$sql2="SELECT count(stat) from studentatt where usn='$usn' and subject='C++' and stat='Present'";
									if(mysqli_num_rows($result)>0){
									$result1=mysqli_query($conn,$sql1);
									$result2=mysqli_query($conn,$sql2);
									$row1=mysqli_fetch_array($result1);
									$row2=mysqli_fetch_array($result2);
									$total=$row1['count(stat)'];
									$present=$row2['count(stat)'];
								    $per=round(($present/$total)*100);}
									else{
										$per=0;
									}
		
                                ?>
								<h5 class="text-white text-center" style="margin-top:5px;box-shadow: 3px 2px 3px 2px black;color :white;background-color:rgb(132, 171, 99 ,0.9) ;border-radius: 15px;">Attendance (%)</h5>
    							<h5 class="my-2  text-center" style="font-size: 40px;color:white;" id="t2"><?php echo $per;?>%</h5>
      							<?php								    
								if($per<75.0){
								        echo "<script language='javascript'>document.getElementById('t2').style.color='red';</script>";
								  }		                    
								?>
								<h5 class="text-white text-center"style="font-size:22px;">C++</h5>
    							
								
    						</div>
	

    			</div>
         <div class="divn" style="height:130px;margin-top:-130px;margin-left:550px;background-color:rgb(166, 242, 211 ,0.9) ;">
                 <div class="col-md-12" >
                                <?php
								    $sql = "SELECT * FROM studentatt WHERE usn = '$usn'";
									$sql1="SELECT count(stat) from studentatt where usn='$usn' and subject='Java'";
									$sql2="SELECT count(stat) from studentatt where usn='$usn' and subject='Java' and stat='Present'";
									$result = mysqli_query($conn,$sql);
									if(mysqli_num_rows($result)>0){
									$result1=mysqli_query($conn,$sql1);
									$result2=mysqli_query($conn,$sql2);
									$row1=mysqli_fetch_array($result1);
									$row2=mysqli_fetch_array($result2);
									$total=$row1['count(stat)'];
									$present=$row2['count(stat)'];
								    $per=round(($present/$total)*100);}
									else{
										$per=0;
									}
		
                                ?>
								<h5 class="text-white text-center" style="margin-top:5px;box-shadow: 3px 2px 3px 2px black;color :white;background-color:rgb(54, 120, 93 ,0.9) ;border-radius: 15px;">Attendance (%)</h5>
    							<h5 class="my-2  text-center" style="font-size: 40px; color:white;" id="t3"><?php echo $per;?>%</h5>
    							<?php								    
								if($per<75.0){
								        echo "<script language='javascript'>document.getElementById('t3').style.color='red';</script>";
								  }		                    
								?>
								<h5 class="text-white text-center"style="font-size:22px;">Java</h5>
		</div>

</div>
</div>
<br>

<input type="button"  class="button1" style="margin-left:43%;margin-top:20px;"  onclick="details()" value="View in detail">
</center>
</center><?php
mysqli_close($conn);
?>
  </body>
  </html>
  

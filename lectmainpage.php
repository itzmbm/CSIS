<html>
<head>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<script>
@import "node_modules/bootstrap/scss/bootstrap";</script>
<link rel="stylesheet" type="text/css" href="CSS/lecturer.css">
  
 </head>

 <body style=" background-image: url(images/bgadminmain1.jpg); background-repeat:no-repeat; background-size:cover;">
		<?php
		session_start();
		if(isset($_SESSION['id'])){
		 
		}
		else{
			header("location: lectlogin.php");
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
        <a class="nav-link" href="Lectureria.php">Internal Assessment</a>
      </li>
        <li class="nav-item">
        <a class="nav-link" href="Lectureratt.php">Attendance</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          More
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="logout.php">Log Out</a>
        </div>
      </li>
    </ul>
   
  </div>
</nav>
<?php
$conn=mysqli_connect("localhost","root","","project1");
?>
<center>
 <h4 class="my-2" align="center"style=" font-family:Arial ;width:400px;box-shadow: 3px 2px 3px 2px black;color :white;background-color:rgb(196, 25, 25 ,0.7) ;border-radius: 15px;"><b style="text-shadow: 3px 2px black;">Lecturer Dashboard<b></h4>
</center>
  <div class="col-md-10">
    	
				
				<div class="divt" style="height:130px;margin-top:80px;margin-left:400px;">
    				<div class="col-md-12">
    					<div class="row">
    						<div class="col-md-8">
                                <?php
                                $re = mysqli_query($conn,"SELECT * FROM studentdetails");
                                $rep = mysqli_num_rows($re);
                                ?>
    							<h5 class="my-2 text-white text-center" style="font-size: 30px;"><?php echo $rep;?></h5>
    							<h5 class="text-white ">Total</h5>
    							<h5 class="text-white ">Students</h5>
    						</div>
							<div class="col-md-4">
    							<a href="studentdetailsl.php" ><img src="images/studenticon.png" style="border-color: rgb(224, 37, 54 ,0.0);margin-top:-20px;width:100px;opacity: 0.9;height:100px;box-shadow: -2px 2px 2px -2px black;border-radius:55px 55px;" alt="Click here"> </a>
    						</div>
	
    					</div>
    				</div>
    			</div>
		</div>
    </div>
</div>
</div>

<?php
mysqli_close($conn);
?>
  </body>
  </html>
  

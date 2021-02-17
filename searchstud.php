<?php

    $usn = $_GET['q'];
    $conn = mysqli_connect('localhost','root','','project1');
    if (!$conn) {
      die('Could not connect: ' . mysqli_error($con));
    } 
    $str="Select name from studentdetails where usn='$usn'";
    $res=mysqli_query($conn,$str);
    $row1=mysqli_fetch_array($res);
    if(isset($res))
    {
    	echo $row1['name'];
    }
    
?>
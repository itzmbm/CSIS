<?php
  session_start();
  $s=$_SESSION['subj'];
    $q = $_GET['q'];
    $conn = mysqli_connect('localhost','root','','project1');
    if (!$conn) {
      die('Could not connect: ' . mysqli_error($con));
    }

    mysqli_select_db($conn, "ajax_");
    $sql = "SELECT * FROM studentatt WHERE usn = '$q' and subject='$s'";
    $sql1="SELECT count(stat) from studentatt where usn='".$q."' and subject='".$s."'";
    $sql2="SELECT count(stat) from studentatt where usn='".$q."' and subject='".$s."' and stat='Present'";
    $result = mysqli_query($conn,$sql);
	if(mysqli_num_rows($result)==0){
		echo "<table class='table' style='color:white;'>
      <tr>
        <th>USN</th>
        <th>Name</th>
        <th>Subject</th>
        <th>Date</th>
        <th>Time From</th>
        <th>Time Till</th>
        <th>Status</th>
      
       </tr></table>";
	}
	else{
    $result1=mysqli_query($conn,$sql1);
    $result2=mysqli_query($conn,$sql2);
    $row1=mysqli_fetch_array($result1);
    $row2=mysqli_fetch_array($result2);
    $total=$row1['count(stat)'];
    $present=$row2['count(stat)'];
    $per=round(($present/$total)*100);
    echo "<table class='table' style='color:white;'>
      <tr>
        <th>USN</th>
        <th>Name</th>
        <th>Subject</th>
        <th>Date</th>
        <th>Time From</th>
        <th>Time Till</th>
        <th>Status</th>
      
       </tr>";
    
    while($row = mysqli_fetch_array($result)) {
      echo "<tr>";
      echo "<td>" . $row['usn'] . "</td>";
      echo "<td>" . $row['name'] . "</td>";
      echo "<td>" . $row['subject'] . "</td>";
      echo "<td>" . $row['date1'] . "</td>";
      echo "<td>" . $row['timef'] . "</td>";
      echo "<td>" . $row['timet'] . "</td>";
      echo "<td>" . $row['stat'] . "</td>";
       
      echo "</tr>";
    }
   echo "Percentage : ".$per."%";

    echo "</table>";
	}
	    mysqli_close($conn);
  ?>
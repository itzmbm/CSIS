<?php

$conn=mysqli_connect("localhost","root","","project1");
$ins="select * from studentdetails";
if($res=mysqli_query($conn,$ins)){
	if(mysqli_num_rows($res)>0){
	echo "<table id='target' class='table' >";
	echo "<tr>"; 
  echo "<th>USN</th>";
   echo "<th>Name</th>";
   echo "<th>Email</th>";
   echo "<th>Phone</th>";
   echo "<th>Department</th>";
   echo "<th>Gardian Name</th>";
   echo "<th>Semester</th>";
   echo "<th>10th Marks</th>";
   echo "<th>12th Marks</th>";
   echo "</tr>";
while($dbs=mysqli_fetch_assoc($res)){
echo "<tr>";
echo "<td>".$dbs['usn']."</td>";
echo "<td>".$dbs['name']."</td>";
echo "<td>".$dbs['email']."</td>";
echo "<td>".$dbs['phone']."</td>";
echo "<td>".$dbs['department']."</td>";
echo "<td>".$dbs['gardian']."</td>";
echo "<td>".$dbs['sem']."</td>";
echo "<td>".$dbs['mark10']."</td>";
echo "<td>".$dbs['mark12']."</td>";
echo "</tr>";
}
echo "</table>";
mysqli_free_result($res);  
}
else{
	echo "<table id='target' class='table' >";
	echo "<tr>"; 
    echo "<th>USN</th>";
   echo "<th>Name</th>";
   echo "<th>Email</th>";
   echo "<th>Phone</th>";
   echo "<th>Department</th>";
   echo "<th>Semester</th>";
   echo "<th>Gardian Name</th>";
   echo "<th>10th Marks</th>";
   echo "<th>12th Marks</th>";
   echo "</tr>";
	echo "</table>";
	echo "<script>window.alert('NO data found found')</script>";
}
}else{
	echo "Error :".mysqli_error($conn);
}
mysqli_close($conn);
?>
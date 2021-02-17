<?php
$conn=mysqli_connect("localhost","root","","project1");
$ins="select * from lectdetails";
if($res=mysqli_query($conn,$ins)){
	if(mysqli_num_rows($res)>0){
	echo "<table id='target' class='table' >";
	echo "<tr>"; 
   echo "<th>ID</th>";
   echo "<th>Name</th>";
   echo "<th>Email</th>";
   echo "<th>Phone</th>";
   echo "<th>Department</th>";
   echo "<th>Designation</th>";
   echo "<th>Semester</th>";
   echo "<th>Subject</th>";
   echo "</tr>";
while($dbs=mysqli_fetch_assoc($res)){
echo "<tr>";
echo "<td>".$dbs['id']."</td>";
echo "<td>".$dbs['name']."</td>";
echo "<td>".$dbs['email']."</td>";
echo "<td>".$dbs['phone']."</td>";
echo "<td>".$dbs['department']."</td>";
echo "<td>".$dbs['designation']."</td>";
echo "<td>".$dbs['sem']."</td>";
echo "<td>".$dbs['subject']."</td>";
echo "</tr>";
}
echo "</table>";
mysqli_free_result($res);  
}
else{
	echo "<table id='target' class='table' >";
	echo "<tr>"; 
   echo "<th>ID</th>";
   echo "<th>Name</th>";
   echo "<th>Email</th>";
   echo "<th>Phone</th>";
   echo "<th>Department</th>";
   echo "<th>Designation</th>";
   echo "<th>Semester</th>";
   echo "<th>Subject</th>";
   echo "</tr>";
	echo "</table>";
	echo "<script>window.alert('NO data found found')</script>";
}
}else{
	echo "Error :".mysqli_error($conn);
}
mysqli_close($conn);
?>
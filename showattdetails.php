 <?php
	  $conn=mysqli_connect("localhost","root","","project1");
      session_start();
      $usn=$_SESSION['usn'];
      $re = mysqli_query($conn,"SELECT * FROM studentatt where usn='$usn' ");
	  if(mysqli_num_rows($re)>0){
		  					        echo "<table  class='table'>";
							        echo "<tr><th>Subject</th><th>Total Present</th><th>Total Absent</th><th>Percentage</th></tr>";
		                            $sql = "SELECT * FROM studentatt WHERE usn = '$usn'";
									$sql1="SELECT count(stat) from studentatt where usn='$usn' and subject='PHP'";
									$sql2="SELECT count(stat) from studentatt where usn='$usn' and subject='PHP' and stat='Present'";
									$result = mysqli_query($conn,$sql);
									$result1=mysqli_query($conn,$sql1);
									$result2=mysqli_query($conn,$sql2);
									$row1=mysqli_fetch_array($result1);
									$row2=mysqli_fetch_array($result2);
									$total=$row1['count(stat)'];
									$present=$row2['count(stat)'];
								    $ab=$total-$present;
								    $per=round(($present/$total)*100);
									echo "<tr><td>PHP</td><td>".$present."</td><td>".$ab."</td><td>".$per."</td></tr>";
									$sql1="SELECT count(stat) from studentatt where usn='$usn' and subject='Java'";
									$sql2="SELECT count(stat) from studentatt where usn='$usn' and subject='Java' and stat='Present'";
									$result = mysqli_query($conn,$sql);
									$result1=mysqli_query($conn,$sql1);
									$result2=mysqli_query($conn,$sql2);
									$row1=mysqli_fetch_array($result1);
									$row2=mysqli_fetch_array($result2);
									$total=$row1['count(stat)'];
									$present=$row2['count(stat)'];
									$ab=$total-$present;
								    $per=round(($present/$total)*100);
									echo "<tr><td>Java</td><td>".$present."</td><td>".$ab."</td><td>".$per."</td></tr>";
									$sql1="SELECT count(stat) from studentatt where usn='$usn' and subject='C++'";
									$sql2="SELECT count(stat) from studentatt where usn='$usn' and subject='C++' and stat='Present'";
									$result = mysqli_query($conn,$sql);
									$result1=mysqli_query($conn,$sql1);
									$result2=mysqli_query($conn,$sql2);
									$row1=mysqli_fetch_array($result1);
									$row2=mysqli_fetch_array($result2);
									$total=$row1['count(stat)'];
									$present=$row2['count(stat)'];
								    $ab=$total-$present;
									$per=round(($present/$total)*100);
									echo "<tr><td>C++</td><td>".$present."</td><td>".$ab."</td><td>".$per."</td></tr>";									
			}
 mysqli_close($conn);
?>
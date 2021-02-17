                              <?php
							  $conn=mysqli_connect("localhost","root","","project1");
                              session_start();
                               $usn=$_SESSION['usn'];
                                $re = mysqli_query($conn,"SELECT * FROM studentia where usn='$usn' ");
	                              if(mysqli_num_rows($re)>0){
										echo "<table  class='table'>";
												echo "<tr><th>Subject</th><th>Internal Assessment-1</th><th>Internal Assessment-2</th><th>Internal Assessment-3</th><th>Assignment/Quiz-1</th><th>Assignment/Quiz-2</th></tr>";
													while($dbs=mysqli_fetch_assoc($re)){
														echo "<tr>";
														echo "<td>".$dbs['subject']."</td>";
														echo "<td>".$dbs['ia1']."</td>";
														echo "<td>".$dbs['ia2']."</td>";
														echo "<td>".$dbs['ia3']."</td>";
														echo "<td>".$dbs['aq1']."</td>";
														echo "<td>".$dbs['aq2']."</td>";
														echo "</tr>";
										           }
								  }
								  mysqli_close($conn);
								  ?>
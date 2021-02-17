<?php
    $q = $_GET['q'];

    $conn = mysqli_connect('localhost','root','','project1');
    if (!$conn) {
      die('Could not connect: ' . mysqli_error($con));
    }
      session_start();
	  $sub=$_SESSION['subj'];
    mysqli_select_db($conn, "ajax_");
    $sql = "SELECT * FROM studentia WHERE usn = '$q' and subject='$sub'";
    $result = mysqli_query($conn,$sql);

    echo "<table class='table' style='color:white;'>
      <tr>
        <th>USN</th>
        <th>Name</th>
        <th>Subject</th>
        <th>Sem</th>
        <th>IA1</th>
        <th>IA2</th>
        <th>IA3</th>
        <th>AQ1</th>
        <th>AQ2</th>
        <th>Total</th>
       </tr>";
    while($row = mysqli_fetch_array($result)) {
      echo "<tr>";
      echo "<td>" . $row['usn'] . "</td>";
      echo "<td>" . $row['name'] . "</td>";
      echo "<td>" . $row['subject'] . "</td>";
      echo "<td>" . $row['sem'] . "</td>";
      echo "<td>" . $row['ia1'] . "</td>";
      echo "<td>" . $row['ia2'] . "</td>";
      echo "<td>" . $row['ia3'] . "</td>";
      echo "<td>" . $row['aq1'] . "</td>";
      echo "<td>" . $row['aq2'] . "</td>";
      echo "<td>" . $row['total'] . "</td>";
      echo "</tr>";
    }
    echo "</table>";
    mysqli_close($conn);
  ?>
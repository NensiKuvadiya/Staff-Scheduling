<?php include'sheader.html'?>
<?php
require_once('connection.php');
session_start();
// if (isset($_POST['submit'])) {
//     $sem=$_POST['sem'];
$sem=$_SESSION['sem'];
    $query1="SELECT  `facultyname`, `subject`, `sem`, `submitdate`, `pdf` FROM `assignment` WHERE sem='$sem' ";
    $result=$conn->query($query1);

	
    if ($result) {
        // Output data of each row
      echo"<div class='con'>";
		echo "<table >";
		echo "<tr>";
   echo" <th>Faculty Name</th>";
    echo "<th>Subject</th>";
    echo "<th>Semester</th>";
    echo "<th>Submission date</th>";
    echo "<th>Assignment</th>";
  echo "</tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["facultyname"]. "</td><td>" . $row["subject"] . "</td><td>"
            . $row["sem"] . "</td><td>" . $row["submitdate"] . "</td><td><button onclick='fun()'>" . $row["pdf"] . "</button></td></tr>";
			$pdf=$row["pdf"];
			$_SESSION["pdf"]=$pdf;
		}
		echo"</table>";
		echo"</div>";
		
    } else {
        echo "0 results";
    }
	
//}

?>


<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/timetable.css">
	<style>
    .con{
      height:100%;
    }
		table {
			width: 100%;
			border-collapse: collapse;
      border: 2px solid white;
      
		}
		th, td {
			padding: 8px;
			text-align: left;
			border-bottom: 1px solid  rgb(75, 7, 147);
		}
		th {
			background-color:  rgb(75, 7, 147);
			color: white;
		}
 
	</style>
</head>
<body>
<!-- <div class="centerform">
    <form action="<?php echo  $_SERVER['PHP_SELF']; ?>" method="POST">
        <label class="elements">Semester:</label>
        <input type="text" name="sem" class="elements"/><br>
        <input type="submit" class="signinbutton" value="submit" name="submit"/>
    </form>
</form>
</div>
<div> -->
<!-- <table>
  <tr>
    <th>Faculty Name</th>
    <th>Subject</th>
    <th>Semester</th>
    <th>Submission date</th>
    <th>Assignment</th>
  </tr>
</table> -->



<script>
 function fun(){
    window.open("displaypdf.php");
 }
</script>

</body>
</html>
 <?php include'footer.html'?> 
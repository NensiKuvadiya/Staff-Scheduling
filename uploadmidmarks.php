<?php include'fheader.html'?>
<?php
include 'connection.php';
session_start();

$query5="SELECT  `sem`, `class`, `dept`, `pdf` FROM `midmarks` WHERE 1";
$result = $conn->query($query5);
if ($result) {
        // Output data of each row
		echo "<table>";
		echo "<tr>";
   echo" <th>Semester</th>";
    echo "<th>Class</th>";
    echo "<th>Department</th>";
    echo "<th>Mid-marks</th>";
  echo "</tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>". $row["sem"] . "</td><td>" . $row["class"] . "</td><td>" . $row["dept"] . "</td><td><button onclick='fun()'>" . $row["pdf"] . "</button></td></tr>";
			$pdf=$row["pdf"];
			$_SESSION["pdf"]=$pdf;
		}
		echo"</table>";
		
		
    } else {
        echo "0 results";
    }
if (isset($_POST['submit'])) {

    $sem=$_POST['sem'];
    $dept=$_POST['dept'];
    $class=$_POST['class'];

  $pdf=$_FILES['pdf']['name'];
  $pdf_type=$_FILES['pdf']['type'];
  $pdf_size=$_FILES['pdf']['size'];
  $pdf_tem_loc=$_FILES['pdf']['tmp_name'];
  $pdf_store="pdf/".$pdf;
  move_uploaded_file($pdf_tem_loc,$pdf_store);
  $stmt=$conn->prepare("INSERT INTO `midmarks`(  `sem`, `class`, `dept`, `pdf`) VALUES (?,?,?,?)");
  $stmt->bind_param("ssss" ,$sem,$class,$dept,$pdf_store);
        $stmt->execute();
        $stmt->close();
}
?>


<html>
    <head> <link rel="stylesheet" type="text/css" href="css/timetable.css">
    <style>
      .t{
        width: 60px;
      }
		table {
			width: 100%;
			border-collapse: collapse;
      border: 2px solid white;
		}
		th, td {
			padding: 8px;
			text-align: left;
			border-bottom: 1px solid white;
		}
		th {
			background-color:  rgb(75, 7, 147);
			color: white;
		}
    form{
      margin:10px 10px;
    }
    .centerform1{
      padding: 40px 220px 0px 20px;
    font-family: 'Oswald', sans-serif;
    font-size: 25px;
    margin: 50px 50px;
    height: 100%;
    }
 
	</style></head>
    <body>
    <div class="centerform1">
    <form action="<?php echo  $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data" >
    <div class='t'>
  <table>
    <tr>
      <td class="elements">
        <label for="sem">Semester:</label>
      </td>
      <td class="elements">
        <input type="text" name="sem" id="sem" class="elements"/>
      </td>
    </tr>
    <tr>
      <td class="elements">
        <label for="dept">Department:</label>
      </td>
      <td class="elements">
        <input type="text" name="dept" id="dept" class="elements"/>
      </td>
    </tr>
    <tr>
      <td class="elements">
        <label for="class">Class:</label>
      </td>
      <td class="elements">
        <input type="text" name="class" id="class" class="elements"/>
      </td>
    </tr>
    <tr>
      <td class="elements">
        <label for="pdf">Choose  PDF File:</label><br>
      </td>
      <td class="elements">
        <input id="pdf" type="file" name="pdf" value="" ><br>
      </td>
    </tr>
    <tr>
      <td colspan="2">
        <input type="submit" class="signinbutton" value="submit" name="submit"/>
      </td>
    </tr>
  </table>
  </div>
  <script>
 function fun(){
    window.open("displaypdf.php");
 }
</script>
</form>
      
      <!-- <form action="<?php echo  $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data" >
        <label class="elements">Semester:</label>
        <input type="text" name="sem" class="elements"/><br>
        <label class="elements">Department:</label>
        <input type="text" name="dept" class="elements"/><br>
        <label class="elements">class:</label>
        <input type="text" name="class" class="elements"/><br>
        <label class="elements">Choose  PDF File:</label><br>
        <input id="pdf" type="file" name="pdf" value="" ><br>
        
        <input type="submit" class="signinbutton" value="submit" name="submit"/>
    </form> -->
    </div>  
    </body>
</html>
<?php include'footer.html'?>
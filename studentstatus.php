
<?php include'fheader.html'?>
<?php
//DISPLAY TABLE
require_once('connection.php');
session_start();
$query3="SELECT * FROM `studentstatus`";
$result1=$conn->query($query3);


if ($result1) {
    // Output data of each row
echo "<table>";
echo "<tr>";
    echo "<th>Enrollment no.</th>";
    echo "<th>Subject</th>";
// echo" <th>Name</th>";
// echo "<th>email</th>";
// echo "<th>Contact no.</th>";
echo "<th>Semester</th>";
echo "<th>Class</th>";
//echo "<th>Department</th>";

echo "</tr>";

    while($row1= $result1->fetch_assoc()) {
        echo "<tr><td>" . $row1["enroll"]. "</td><td>" . $row1['subject']. "</td><td>"
        // . $row1["name"] . "</td><td>"
        // . $row1["email"] . "</td><td>" 
        // . $row1["mobile"] . "</td><td>" 
        . $row1['sem'] ."</td><td>" . $row1['class']. "</td><td>" ;
        // . $row1["dept"] ;
        //. "</td><td><button onclick='fun()'>Pass</button></td></tr>";
      
}
echo"</table>";
} 
?>
<?php
require_once('connection.php');

if (isset($_POST['submit'])) {
    $sem=$_POST['sem'];
    $enroll=$_POST['enroll'];
    $sub=$_POST['sub'];
    $class=$_POST['class'];

    // $query1="SELECT `name`, `email`, `mobile`, `dept`, `enroll` FROM `registration` WHERE enroll='$enroll";
    // $result=$conn->query($query1);
 
    // $row = $result->fetch_assoc();
	// 		$name=$row['name'];
    //         $email=$row['email'];
    //         $dept=$row['dept'];
    //         $mobile=$row['mobile'];

	//Insert to table

$query2=$conn->prepare("INSERT INTO `studentstatus`(`enroll`, `subject`, `name`, `email`, `mobile`, `sem`, `class`, `dept`)  VALUES (?,?,?,?,?,?,?,?)");
$query2->bind_param("ssssssss", $enroll,$sub,$name,$email,$mobile,$sem,$class,$dept);
      $query2->execute();
}


?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/timetable.css">
<style>
    
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

height: 100%;
}
.t table{
  width: 60px;
}
</style>
</head>
<body>
<div class="centerform1">
    <form action="<?php echo  $_SERVER['PHP_SELF']; ?>" method="POST">
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
      <label for="enroll">Enrollment no:</label>
    </td>
    <td class="elements">
      <input type="text" name="enroll" id="enroll" class="elements"/>
    </td>
  </tr>
  <tr>
    <td class="elements">
      <label for="sub">Subject:</label>
    </td>
    <td class="elements">
      <input type="text" name="sub" id="sub" class="elements"/>
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
    <td colspan="2">
      <input type="submit" class="signinbutton" value="submit" name="submit"/>
    </td>
  </tr>
</table>
</div>
</form>
</div>



<!-- <script>
 function fun(){
  
    window.location.href="deletentry.php";
 }
</script> -->

</body>
</html>

<?php include'footer.html'?>

<?php include'sheader.html'?>
<?php
require_once('connection.php');
session_start();


// if (isset($_POST['submit'])) {
    // $sem = $conn->real_escape_string($_POST['sem']);
    // $class = $conn->real_escape_string($_POST['class']);
    // $dept = $conn->real_escape_string($_POST['dept']);
    $dept=$_SESSION['dept'];
    $class=$_SESSION['class'];
    $sem=$_SESSION['sem'];

    $query1 = "SELECT `pdf` FROM `midmarks` WHERE sem='$sem' AND dept='$dept' AND class='$class'";
    $result = $conn->query($query1);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo"<div class='con'>";
        echo "<button onclick='fun()' class='signinbutton'>" . $row["pdf"] . "</button>";
		echo"</div>";

        $pdf = $row["pdf"];
        $_SESSION["pdf"] = $pdf;
    } else {
        echo"<div class='con'>";
        echo " RESULT NOT DECLARED.";
        echo"</div>";
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
    .signinbutton{
    font-size: 15px;
    border: 2px solid rgb(75, 7, 147);
    border-radius: 20px;
    margin: 214px 600px;;
    padding: 10px;
}

    .signinbutton:hover{
    color: white;
    background-color: rgb(75, 7, 147);

}
    </style>
</head>
<body>
<!-- <div class="centerform">
    <form action="<?php echo  $_SERVER['PHP_SELF']; ?>" method="POST">
    <label class="elements">Semester:</label>
        <input type="text" name="sem" class="elements"/><br>
        <label class="elements">Department:</label>
        <input type="text" name="dept" class="elements"/><br>
        <label class="elements">class:</label>
        <input type="text" name="class" class="elements"/><br>
        <input type="submit" class="signinbutton" value="submit" name="submit"/>
    </form>
</form>
</div>
<div> -->


<script>
 function fun(){
    window.open("displaypdf.php");
 }
</script>

</body>
</html>
<?php include'footer.html'?>

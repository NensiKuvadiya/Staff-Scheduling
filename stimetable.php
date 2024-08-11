<?php include 'sheader.html' ?>
<?php
require_once('connection.php');
session_start();

// if (isset($_POST['submit'])) {

    $dept=$_SESSION['dept'];
    $class=$_SESSION['class'];
    $sem=$_SESSION['sem'];



    $query6 = "SELECT `pdf` FROM `timetable1` WHERE sem='$sem' AND dept='$dept' AND class='$class'";
    $result = $conn->query($query6);

    if ($result) {
        $row = $result->fetch_assoc();

        if ($row) {
            // $_SESSION['pdf']=$row['pdf'];
            echo"<div class='co'>";
        echo "<button onclick='fun()' class='signinbutton'>" . $row["pdf"] . "</button>";
		echo"</div>";
        } else {
            echo"<div class='co'>";
            echo "Not Uploaded.";
            echo"</div>";
        }
    } 

//}
?>


<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet"href="css/timetable.css">
    <style>
    .co{
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
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
        <label class="elements">Semester:</label>
        <input type="text" name="sem" class="elements"/><br>
        <label class="elements">Class:</label>
        <input type="text" name="class" class="elements"/><br>
        <label class="elements">Department:</label>
        <input type="text" name="dept" class="elements"/><br>
        <input type="submit" class="signinbutton" value="submit" name="submit"/>
    </form>
</div> -->

<script>
    function fun(){
        window.open("displaypdf.php");
    }
</script>

</body>
</html>
<?php include'footer.html' ?>

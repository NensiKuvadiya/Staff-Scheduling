<?php
require_once('connection.php');
session_start();

if (isset($_POST['submit'])) {
    $sem = $_POST['sem'];
    $class = $_POST['class'];
    $dept = $_POST['dept'];

    $query6 = "SELECT `pdf` FROM `timetable1` WHERE sem='$sem' AND dept='$dept' AND class='$class'";
    $result = $conn->query($query6);

    if ($result) {
        $row = $result->fetch_assoc();

        if ($row) {
            // $_SESSION['pdf']=$row['pdf'];
        } else {
            echo "No results found.";
        }
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<?php include 'fheader.html' ?>

<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/timetable.css">
</head>
<body>
<div class="centerform">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
        <label class="elements">Semester:</label>
        <input type="text" name="sem" class="elements"/><br>
        <label class="elements">Class:</label>
        <input type="text" name="class" class="elements"/><br>
        <label class="elements">Department:</label>
        <input type="text" name="dept" class="elements"/><br>
        <input type="submit" class="signinbutton" value="submit" name="submit"/>
    </form>
</div>
<button onclick='fun()' class='signinbutton'><?php
echo $row['pdf'];
?></button>
<?php include 'footer.html' ?>

<script>
    function fun(){
        window.open("displaypdf.php");
    }
</script>

</body>
</html>

<!-- <?php include 'footer.html' ?> -->
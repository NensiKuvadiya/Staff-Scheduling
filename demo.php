<?php
include 'connection.php';

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
  $stmt=$conn->prepare("INSERT INTO `timetable1`( `sem`, `dept`, `class`, `pdf`) VALUES (?,?,?,?)");
  $stmt->bind_param("ssss", $sem,$dept, $class,$pdf_store);
        $stmt->execute();
        $stmt->close();
}
?>
<html>
    <head> <link rel="stylesheet" type="text/css" href="css/timetable.css"></head>
    <body>
    <div class="centerform">
      
      <form action="<?php echo  $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data" >
     
        <label class="elements">Semester:</label>
        <input type="text" name="sem" class="elements"/><br>
        <label class="elements">Class:</label>
        <input type="text" name="class" class="elements"/><br>
        <label class="elements">Department:</label>
        <input type="text" name="dept" class="elements"/><br>
        <label class="elements">Choose  PDF File:</label><br>
        <input id="pdf" type="file" name="pdf" value="" ><br>
        <input type="submit" class="signinbutton" value="submit" name="submit"/>
    </form>
 
   
    </div>
 
       
    </body>
</html>
<?php include'footer.html'?>
<?php include'fheader.html'?>
<?php
include 'connection.php';


if (isset($_POST['submit'])) {
  $subject=$_POST['subject'];
    $fname=$_POST['fname'];
    $subject=$_POST['subject'];
    $sem=$_POST['sem'];
    $dept=$_POST['dept'];
    $sdate=$_POST['sdate'];
    $role=1;
  $pdf=$_FILES['pdf']['name'];
  $pdf_type=$_FILES['pdf']['type'];
  $pdf_size=$_FILES['pdf']['size'];
  $pdf_tem_loc=$_FILES['pdf']['tmp_name'];
  $pdf_store="pdf/".$pdf;
  move_uploaded_file($pdf_tem_loc,$pdf_store);
  $stmt=$conn->prepare("INSERT INTO `assignment`( `role`, `facultyname`, `subject`, `sem`, `department`, `submitdate`, `pdf`) VALUES (?,?,?,?,?,?,?)");
  $stmt->bind_param("sssssss", $role,$fname,$subject ,$sem,$dept, $sdate,$pdf_store);
        $stmt->execute();
        $stmt->close();
}
?>


<html>
    <head> <link rel="stylesheet" type="text/css" href="css/timetable.css"></head>
    <body>
    <div class="centerform">
    <form action="<?php echo  $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data" >
  <table>
    <tr>
      <td class="elements">
        <label for="fname">Faculty name:</label>
      </td>
      <td class="elements">
        <input type="text" name="fname" id="fname" class="elements"/>
      </td>
    </tr>
    <tr>
      <td class="elements">
        <label for="subject">Subject:</label>
      </td>
      <td class="elements">
        <input type="text" name="subject" id="subject" class="elements"/>
      </td>
    </tr>
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
        <label for="sdate">Submission date:</label>
      </td>
      <td class="elements">
        <input type="date" name="sdate" id="sdate" class="elements"/>
      </td>
    </tr>
    <tr>
      <td class="elements">
        <label for="pdf">Choose  PDF File:</label>
      </td>
      <td class="elements">
        <input id="pdf" type="file" name="pdf" value="" >
      </td>
    </tr>
    <tr>
      <td class="elements">
        <input type="submit" class="signinbutton" value="submit" name="submit"/>
      </td>
    </tr>
  </table>
</form>
      
      <!-- <form action="<?php echo  $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data" >
      <table>
        <label class="elements">Faculty name:</label>
        <input type="text" name="fname" class="elements"/><br>
        <label class="elements">Subject:</label>
        <input type="text" name="subject" class="elements"/><br>
        <label class="elements">Semester:</label>
        <input type="text" name="sem" class="elements"/><br>
        <label class="elements">Department:</label>
        <input type="text" name="dept" class="elements"/><br>
        <label class="elements">Submission date:</label>
        <input type="date" name="sdate" class="elements"/><br>
        <label class="elements">Choose  PDF File:</label><br>
        <input id="pdf" type="file" name="pdf" value="" ><br>
        
        <input type="submit" class="signinbutton" value="submit" name="submit"/>
</table>
    </form>
  -->
   
    </div>
 
       
    </body>
</html>
<?php include'footer.html'?>
<?php

require_once('connection.php');
session_start();
   $mail=$_SESSION["mail"];
  
    $query1="SELECT  `name`,`dept`, `dob`, `gender`, `enroll`, `class`, `sem`,`profileimage` FROM `registration` WHERE email='$mail'";
    $result=$conn->query($query1);
    if($result->num_rows > 0 || $result->num_rows > 0  ){
    $row=$result ->fetch_assoc();
    $name=$row['name'];
    $gender=$row['gender'];
    $dept=$row['dept'];
    $enroll=$row['enroll'];
    $class=$row['class'];
    $sem=$row['sem'];
    $dob=$row['dob'];
    $profileimage=$row['profileimage'];
    $_SESSION['sem']=$sem;
    $_SESSION['class']=$class;
    $_SESSION['dept']=$dept;
   
        }

?>
<?php include'sheader.html'?>
<html>
<head>
    <link rel="stylesheet" href="css/profile1.css">

</head>
<body>
<div class="container1">
        <div class="info1">
            <label class="info">Name:</label>
            <label class="info"><?php echo $name ?> </label><br>
            <label class="info">E-mail:</label>
            <label class="info"><?php echo $mail ?> </label><br>
            <label class="info">Gender:</label>
            <label class="info"><?php echo $gender ?> </label><br>
            <label class="info">Date of Birth:</label>
            <label class="info"><?php echo $dob ?> </label><br>
            <label class="info">Department:</label>
            <label class="info"><?php echo $dept ?> </label><br>
            <label class="info">Enrollment no.:</label>
            <label class="info"><?php echo $enroll ?> </label><br>
            <label class="info">Semester:</label>
            <label class="info"><?php echo $sem ?> </label><br>
            <label class="info">Class:</label>
            <label class="info"><?php echo $class ?> </label><br>
        </div>
            <div class="info1">
            <img src="<?php echo $profileimage; ?>" class="img1"/>
            </div>
    </div>
  
  
</body>
</html>
<?php include'footer.html'?>
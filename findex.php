<?php

require_once('connection.php');
session_start();
   $mail=$_SESSION["mail"];
  
    $query1="SELECT `name`, `mobile`, `dept`,`profileimage` FROM `registration` WHERE email='$mail'";
    $result=$conn->query($query1);
    if($result->num_rows > 0 || $result->num_rows > 0  ){
    $row=$result ->fetch_assoc();
    $name=$row['name'];
    $mobile=$row['mobile'];
    $dept=$row['dept'];
    $profileimage=$row['profileimage'];
   $_SESSION['fname']=$name;
        }

?>
<?php include'fheader.html'?>
<html>
    <head></head>
    <link rel="stylesheet"  href="css/profile1.css">
<body>
    <div class="container1">
        <div class="info1">
            <label class="info">Name:</label>
            <label class="info"><?php echo $name ?> </label><br>
            <label class="info">E-mail:</label>
            <label class="info"><?php echo $mail ?> </label><br>
            <label class="info">Phone no.:</label>
            <label class="info"><?php echo $mobile ?> </label><br>
            <label class="info">Department:</label>
            <label class="info"><?php echo $dept ?> </label><br>
        </div>
            <div class="info1">
                <img src="<?php echo $profileimage; ?>" class="img1"/>
            </div>
    </div>
  
</body>
</html>
<?php include'footer.html'?>
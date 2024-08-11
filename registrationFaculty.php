<?php
    require_once('connection.php');

    if(isset($_POST['submit'])) {
        // Retrieve form data
        $name = $_POST['name'];
        $email = $_POST['email'];
        $mobile=$_POST['mobileno'];
        $dept=$_POST['dept'];
      
        $role=1;
        $pass = $_POST['pass'];
        $cpass = $_POST['cpass']; 
        if($pass !== $cpass) {
            echo "Passwords do not match";
            exit(); 
        }
        $target_dir = "css/image";
	$target_file = $target_dir . basename($_FILES["profileimage"]["name"]);
	move_uploaded_file($_FILES["profileimage"]["tmp_name"], $target_file);
    $profileimage = $target_file;
        
        $stmt = $conn->prepare("INSERT INTO `registration`(`role`,`name`, `email`, `mobile`, `dept`,`profileimage`, `password`)  VALUES (?,?,?,?,?,?,?)");
        $stmt->bind_param("sssssss", $role,$name, $email,$mobile,$dept, $profileimage,$pass);
        $stmt->execute();
        $stmt->close();
    }
?>
<html>
<head>
<title>Registration Faculty</title>
<link rel="stylesheet" href="css/registrationFacuty.css"> 
</head>
<body>
<h2 align="center" class="heading">Registration form for Faculty</h2>
<form action="<?php echo  $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">

<label>Enter Full Name</label>
         <input type="text" name="name"  ><br>

        <label>Enter E-mail Address</label>
         <input type="text" name="email" ><br>

       <label>Phone NO.:</label>
       <input type="text" name="mobileno"/>
         
        <label>Select Filled:</label>
            <select name="dept">
                <option value="comp">Computer Science</option>
                <option value="IT">IT</option>
                <option value="EC">EC</option>
                <option value="mech">Mechanical</option>
                <option value="Civil">Civil</option><br>
                </select><br>
        <label>Upload profile Image:</label>
        <input type="file" name="profileimage" id="profileimage" accept="image/*" /><br>
        <label>Enter Password</label>
         <input type="password" name="pass"><br>
         <label>Confirm Password</label>
         <input type="password" name="cpass"><br>

        <input type="submit" value="Submit" name="submit">
        <input type="submit" value="Reset">
     </form>

</body>
</html>

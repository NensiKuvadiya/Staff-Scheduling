<?php
require_once("connection.php");
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $dateofbirth = $_POST['dob'];
    $dept = $_POST['dept'];
    $enroll = $_POST['enroll'];
    $class = $_POST['class'];
    $sem = $_POST['sem'];
    $profileimage1=$_POST['profileimage'];
    $pwd = $_POST['password'];
    $conpwd = $_POST['confirmpassword'];
    $role=0;
    if($pwd !== $conpwd) {
        echo "Passwords do not match";
        exit(); 
    }
     
    $query = $conn->prepare("INSERT INTO `registration`(`role`,`name`, `email`, `gender`, `dob`, `dept`, `enroll`,`class`,`sem`,`profileimage`,  `password`) VALUES (?,?,?,?,?,?,?,?,?,?,?)");
   
    if(!$query){  b
        .$conn->error;
        exit();
    }

    $query->bind_param("sssssssssss",$role,$name,$email,$gender,$dateofbirth,$dept,$enroll,$class,$sem,$profileimage1,$pwd);

    if(!$query->execute()){
        echo "Execute error."
        .$query->error;
        exit();
    }
    $query->close();
}


$conn->close();
?>

<html>
<head>
<title>Registration Student</title>
<link rel="stylesheet" href="css/registrationStudent.css">
</head>
<body>
<h2 align="center" class="heading">Registration form for student</h2>
<form action="<?php echo  $_SERVER['PHP_SELF']; ?>" method="POST" >

<label>Enter Full Name</label>
         <input type="text" name="name"><br>

        <label>Enter E-mail Address</label>
         <input type="text" name="email" ><br>

         <label>Enter Gender</label>
            <input type="radio" id="gender" name="gender" value="male"/>Male  <br>
            <input type="radio" id="gender" name="gender" value="female"/>Female <br><br>


        <label class="l" for="dob">Date of Birth:</label>
        <input type="date" id="dob" name="dob"><br><br>

        <label>Select Department:</label>
            <select name="dept">
                <option value="comp">Computer Science</option>
                <option value="IT">IT</option>
                <option value="EC">EC</option>
                <option value="mech">Mechanical</option>
                <option value="Civil">Civil</option><br>
                </select><br>
        <label>Enrollment No.:</label>
        <input type="text" name="enroll"/>
        <label>Class:</label>
        <input type="text" name="class"/>
        <label>Semester.:</label>
        <input type="text" name="sem"/>
        <label>Upload profile Image:</label>
        <input type="file" name="profileimage"/><br>
        <label>Enter Password</label>
         <input type="password" name="password"><br>
         <label>Confirm Password</label>
         <input type="password" name="confirmpassword"><br>

        <input type="submit" value="Submit" name="submit">
        <input type="reset" value="Reset">
     </form>

</body>
</html>

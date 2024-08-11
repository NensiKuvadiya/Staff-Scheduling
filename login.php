<?php
    require_once('connection.php');
session_start();
$message="Email Or Password Does Not Match";

if(isset($_POST["btnlogin"])){
    $email=$_POST["email"];
    $password=$_POST["password"];
    $role=$_POST["role"];
    
    $_SESSION["mail"]=$email;

    $query="SELECT * FROM `registration` WHERE email='$email' AND password='$password' AND role='$role' ";
 
    $result=$conn->query($query);
   
    if($result->num_rows > 0 || $result->num_rows > 0  ){
    $row=$result ->fetch_assoc();
   
   
   

   print_r($row);
   
    if($row['role'] == 1){
   
        header("Location: findex.php");
    }else{
       
            header("Location: sindex.php");
        }
    }

}


?>

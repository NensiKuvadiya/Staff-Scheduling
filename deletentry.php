<?php
require_once('connection.php');
 session_start();
 $passenroll=$_SESSION['passenroll'];
 $query4="DELETE FROM `studentstatus` WHERE enroll='$passenroll'";





?>
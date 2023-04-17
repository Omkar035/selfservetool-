<?php 

include "conn.php";
              
                
session_start();
  date_default_timezone_set('Asia/Kolkata');
$time = date('Y-m-d H:i:s');

$email=$_SESSION['email'];
$client=$_SESSION['client_name'];
$fcat=$_SESSION['fcat'];
                $log="INSERT INTO `log_file`(`client_name`, `email`, `fcat`, `date_time`, `event`) VALUES ('$client','$email','$fcat','$time','logged out')";
                $result_log=mysqli_query($connectDB,$log);
session_unset();

session_destroy();

header("location: login.php")


?>

<?php 

    include "../conn.php";
    
    session_start();
$email=$_SESSION['email'];
$client=$_SESSION['client_name'];
$fcat=$_POST['fcat'];
$type=$_POST['adtag_type'];
$message = $_POST['message'];
     date_default_timezone_set('Asia/Kolkata');
$time = date('Y-m-d H:i:s');
                $log="INSERT INTO `log_file`(`client_name`, `email`, `date_time`, `event`,`fcat`,`adtag`) VALUES ('$client','$email','$time','$message','$fcat','$type')";
                $result_log=mysqli_query($connectDB,$log);
    header("location: index.php");  
?>
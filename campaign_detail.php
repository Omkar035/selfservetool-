<?php
$servername = "localhost";
$username = "publishe_self";
$password = "hcselfserve22";
$dbname = "publishe_selfserve"; 
$connectDB = mysqli_connect($servername,$username,$password,$dbname);
if (!$connectDB){
    die("Sorry we failed to connect: ". mysqli_connect_error());
}

?>




<?php 
header("Access-Control-Allow-Origin: *");
// $id = parse_url($url);
// $id = $_GET['id']; 
$id= $_GET['id']; 

$sql="SELECT campaign_start,campaign_end,publisher_name,adtag_type,dimension,template,campaign_email,campaign_title FROM campaign_info where id=$id";
$result=mysqli_query($connectDB,$sql);
$row=mysqli_fetch_assoc($result);

echo json_encode($row);

?>


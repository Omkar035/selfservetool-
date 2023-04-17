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
$sql="SELECT id,client_name,campaign_name FROM campaign_info";
$result=mysqli_query($connectDB,$sql);
// $row=mysqli_fetch_assoc($result);


//create an array
$techarray = array();
while($row =mysqli_fetch_assoc($result)){
    $techarray[] = $row;
}

echo json_encode($techarray);

?>




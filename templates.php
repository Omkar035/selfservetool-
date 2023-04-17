
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
header("Content-type: application/json");
$sql="SELECT id,template_name,dim,master_code,assets_req,css_style,script_tags FROM templates";
$result=mysqli_query($connectDB,$sql);


//create an array
$techarray = array();
while($row =mysqli_fetch_assoc($result)){
    $techarray[] = $row;
}

echo json_encode($techarray);

?>






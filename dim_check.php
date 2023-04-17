<?php

include "./conn.php";

$dim = $_POST['dim'];
$template = $_POST['template'];
$sql = "SELECT * FROM templates WHERE template_name = '$template' AND dim='$dim'";
$result = mysqli_query($connectDB, $sql) or die("SQL Query Failed.");
$abc="";
if(mysqli_num_rows($result) > 0){
    $data = array("status"=>true);
    echo json_encode($data);
}else{
    $data = array("status"=>false,"dim"=>$dim);
    echo json_encode($data);
}

?>




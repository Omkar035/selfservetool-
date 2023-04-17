<?php
include "conn.php";
    $template=$_POST['template'];
    $client=$_POST['client_name'];
    
    $sql="SELECT * FROM `campaign_info` WHERE client_name='$client' AND template='$template'";
    $result = mysqli_query($connectDB,$sql);
    
    if(mysqli_num_rows($result) > 0){
        $data = array("status"=>true);
        echo json_encode($data);
    }else{
        $data = array("status"=>false);
        echo json_encode($data);
    }
    
    

?>
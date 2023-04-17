<?php

    include "../conn.php";
    session_start();
    $id = $_POST['id'];
    $fcat = $_POST['fcat'];
    $type = $_SESSION['creative_type'];
    $sql="SELECT * FROM `campaign_info` WHERE id='$id'";
    $data=mysqli_query($connectDB,$sql);
    if(mysqli_num_rows($data)>0){
        while($row=mysqli_fetch_assoc($data)){
            $camp =  $row['campaign_name'];
            $template = $row['template'];
            $dimension = $row['dimension']; 
            $client =  $row['client_name'];
            $adtagtype = $row['adtag_type'];
            $dim = array();
            $ep_dim = explode(",",$dimension);

            $sql_creatcode = "SELECT * FROM `creativecode` WHERE client='$client' AND campaign='$camp'";
            $data_creatcode=mysqli_query($connectDB,$sql_creatcode);

            if(mysqli_num_rows($data_creatcode)>0){
                while($row_creatcode=mysqli_fetch_assoc($data_creatcode)){
                    foreach ($ep_dim as $value) {
                        if($row_creatcode['dimension'] == $value){
                            array_push($dim,$row_creatcode['dimension']);
                        }
                    }
                }
                $resp = array("status"=>true,"dim"=>$dim,"dim2"=>$ep_dim);
                echo json_encode($resp);
            }else{
                $resp = array("status"=>false,"dim"=>$ep_dim);
                echo json_encode($resp);
            }
        }
        
    }else{
        echo "hello";
    }

?>
<?php 

    include "../conn.php";
    session_start();
    // error_reporting(E_ERROR | E_PARSE);

    // $id = $_POST['id'];
    // $camp = $_POST['camp'];
    // $dim = $_POST['dim'];
    
    $id=$_GET['id'];
    if(isset($_POST['id'])) {
        $id=$_GET['id'];
    }
    $camp = "shopworld";
    $dim = "300x250";
    $client = $_POST['client'];
    $sql="SELECT * FROM `campaign_info` WHERE id='$id'";
    $data=mysqli_query($connectDB,$sql);
    if(mysqli_num_rows($data)>0){
        while($row=mysqli_fetch_assoc($data)){
            $template = $row['template'];
            echo $template;
            $sql_creatcode = "SELECT * FROM `creativecode` WHERE client='$client' AND campaign='$camp' AND dimension='$dim'";
            $data_creatcode=mysqli_query($connectDB,$sql_creatcode);

            if(mysqli_num_rows($data_creatcode)>0){
                
                while($row_creatcode=mysqli_fetch_assoc($data_creatcode)){
                    $content_cre = $row_creatcode['content'];
            }
            $resp = array("status"=>true,"content"=>$content_cre);
            echo json_encode("resp");
            }
            else{
                $sql_temp="SELECT * FROM `templates` WHERE template_name='$template' AND dim='$dim'";
                $data_temp=mysqli_query($connectDB,$sql_temp);
                if(mysqli_num_rows($data_temp)>0){
                    while($row_temp=mysqli_fetch_assoc($data_temp)){
                        $content = $row_temp['master_code'];
                    }
                    $resp = array("status"=>true,"content"=>`$content`);
                    echo json_encode("resp");
                }else{
                    echo "<span>Error</span>";
                }
            }
        }
    }else{
        echo "<span>Error2</span>";
    }
    
?>
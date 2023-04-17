<?php 

    include "../conn.php";
    session_start();
    error_reporting(E_ERROR | E_PARSE);

    $id = $_POST['id'];
    $count = $_POST['count'];
    $content = $_POST['content'];
    $fcat = $_POST['fcat'];
    $asset_r = $_POST['asset_r'];
    $geo= $_POST['geo'];
    $type = $_SESSION['creative_type'];
    $sql="SELECT * FROM `campaign_info` WHERE id='$id'";
    $data=mysqli_query($connectDB,$sql);
    if(mysqli_num_rows($data)>0){
        while($row=mysqli_fetch_assoc($data)){
                if("$type" == "replica"){
                    $camp =  $fcat;
                }else{
                    $camp =  $row['campaign_name'];
                }
                $client =  $row['client_name'];
                $temp = $row['template'];
                $exp_dim = explode(",",$row['dimension']);
                $single_dim = $exp_dim[$count];
                
                $sql_creatcode = "SELECT * FROM `creativecode` WHERE client='$client' AND campaign='$camp' AND dimension='$single_dim' AND filter='$fcat'";
                $data_creatcode=mysqli_query($connectDB,$sql_creatcode);
                if(mysqli_num_rows($data_creatcode)>0){
                    while($row_creatcode=mysqli_fetch_assoc($data_creatcode)){
                        $id_creatcode=$row_creatcode['id'];
                        if($row_creatcode['finalcode']!=""){
                            $finalcode=$content."<script>".$row_creatcode['animation']."</script>".$geo;
                            $sql_update = "UPDATE creativecode SET content='$content',finalcode='$finalcode',asset_used='$asset_r' WHERE id='$id_creatcode'";
                        }
                        else{
                            $sql_update = "UPDATE creativecode SET content='$content',finalcode='$content',asset_used='$asset_r' WHERE id='$id_creatcode'";
                        }
                        
                        $data_update=mysqli_query($connectDB,$sql_update);                        
                    }
                    if($data_update){
                        $resp = array("status"=>true);
                        echo json_encode($resp);
                    }else{
                        $resp = array("status"=>false,"message"=>$data_update);
                        echo json_encode($resp);
                    }
                    
                     
                }else{
                    // $defaultanimation='function bg'.$single_dim.'_ZoomInAndOut() { var tl =new TimelineMax({repeat:0,repeatDelay:0,delay:0});tl.to(`#bg'.$single_dim.'`,(  5/2),{opacity:1,scale:1.1,ease:Power1.easeNone});tl.to(`#bg'.$single_dim.'`,(5/2),{opacity:1,scale:1,ease:Power1.easeNone});}bg'.$single_dim.'_ZoomInAndOut();function logo'.$single_dim.'_Right() {var gsap =new TimelineMax({repeat:4,repeatDelay:2.5,delay:0});gsap.from(`#logo'.$single_dim.'`,(  1/1),{x:300,opacity:0,ease:Power1.easeOut});}logo'.$single_dim.'_Right();function cta'.$single_dim.'_Left() {var gsap =new TimelineMax({repeat:4,repeatDelay:2.5,delay:-0.6});gsap.from(`#cta'.$single_dim.'`,(  1/1),{x:-50,opacity:0,ease:Power1.easeOut});}cta'.$single_dim.'_Left();function copy'.$single_dim.'_Left() {var gsap =new TimelineMax({repeat:4,repeatDelay:2.5,delay:0.7});gsap.from(`#copy'.$single_dim.'`,(  1.1/1),{x:-50,opacity:0,ease:Power1.easeOut});}copy'.$single_dim.'_Left();function title'.$single_dim.'_SelectAnimation(){var gsap = new TimelineMax({repeat:0,repeatDelay:0,delay:0});gsap.from(`#title'.$single_dim.'`,(  1/1),{y:0,opacity:1,ease: Power1.easeOut});}title'.$single_dim.'_SelectAnimation();';
                    // Inserting Creative in DB
                    $sql_insert = "INSERT INTO creativecode (name,campaign,type,cdata,client,dimension,filter,status,content,finalcode,asset_used,test_anim,animation) VALUES ('$temp','$camp','static','popular','$client','$single_dim','$fcat','active','$content','$content','$asset_r','$defaultanimation','$defaultanimation')";
                    $data_insert=mysqli_query($connectDB,$sql_insert);

                    if($data_update){
                        $resp = array("status"=>true,"message"=>"Inserted Code","asset"=>$asset_r);
                        echo json_encode($resp);
                    }else{
                        $resp = array("status"=>false,"message"=>$data_update);
                        echo json_encode($resp);
                    }
                }
    }}
?>
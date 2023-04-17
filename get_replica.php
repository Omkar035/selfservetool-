<?php 
    
    include "./conn.php";
    $client = $_POST['client'];
    $outout;
    $sql = "SELECT * FROM `campaign_info` WHERE client_name='$client'";
    $result = mysqli_query($connectDB,$sql);
    if(mysqli_num_rows($result)>0){
        $output.= "<script>
      $(document).ready(function () {
      $('select').selectize({
          sortField: 'text'
      });
  });
  </script><form method='post'><div style='text-align:center'><select name='camp_nm'><option value='none'>Select campaign title</option>";
        while($row=mysqli_fetch_assoc($result)){
            $campaign_name=$row['campaign_title'];
            if($campaign_name!=""){
                $output.="<option value='".$campaign_name."'>".$campaign_name."</option>";
            }
        }
        $output.="</select><button name='submit2' style='background:#228B22;border:none;width:100px;height:40px;border-radius:5px;'>Create replica</button> <button onclick='window.location.reload()' style='background:#0096FF;border:none;width:100px;height:40px;margin-left:20px;border-radius:5px;'>Back</button> </div> </form>";
        $data = array("status"=>true,"content"=>$output,"client"=>$client);
        echo json_encode($data);
    }else{
        $data = array("status"=>false,"content"=>"No Record Found");
        echo json_encode($data);
    }
    
?>
     
<?php
include "conn.php";
error_reporting(E_ERROR | E_PARSE);
session_start();
$client_names = $_SESSION['client_nm'];
if(isset($_POST["submit"])){
        $camp_name = $_POST['camp_nm'];
        $sql = "SELECT * FROM `campaign_info` WHERE campaign_title='$camp_name'";
    $result = mysqli_query($connectDB,$sql);
    if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_assoc($result)){
             $_SESSION['id'] = $row['id'];
            $dimension = $row['dimension']; 
            $camp =  $row['campaign_name'];
            $client =  $row['client_name'];
            $ep_dim = explode(",",$dimension);
            $single_dim = $ep_dim[0];
            $_SESSION['creative_type'] = "update";

            $sql_creatcode = "SELECT * FROM `creativecode` WHERE client='$client' AND campaign='$camp' AND dimension='$single_dim'";
            $result_creatcode = mysqli_query($connectDB,$sql_creatcode);
            if(mysqli_num_rows($result_creatcode)>0){
                while($row_creatcode=mysqli_fetch_assoc($result_creatcode)){
                    $_SESSION['fcat'] = $row_creatcode['filter'];
                }
            }
        }
        header("location: index.php");
    }
}

if(isset($_POST["submit2"])){
    $autofcats2 = "";
    $characters2 = 'abcdefghijklmnopqrstuvwxyz0123456789';
  $charCount2 = strlen($characters2);
  for($i=0;$i<6;$i++){
    $autofcats2.= substr($characters2,rand(1,$charCount2),1);
  }
    $_SESSION['fcat'] = $autofcats2;
    $camp_name = $_POST['camp_nm'];
        $sql = "SELECT * FROM `campaign_info` WHERE campaign_title='$camp_name'";
    $result = mysqli_query($connectDB,$sql);
    if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_assoc($result)){
            
            $dimension = $row['dimension']; 
            $camp =  $row['campaign_name'];
            $templaterep=$row['template'];
            $client =  $row['client_name'];
            $campaignstartreplica=$row['campaign_start'];
            $campaignendreplica=$row['campaign_end'];
            $publishernamereplica=$row['publisher_name'];
            $adtagreplica=$row['adtag_type'];
            $lptypereplica=$row['lp_type'];
            $citydatareplica=$row['city_data'];
            $defaultcityreplica=$row['default_city'];
            $tempreplica=$row['temp'];
            $aqireplica=$row['aqi'];
            $weatherreplica=$row['weather'];
            $crtdatereplica=$row['crt_date'];
            $countdownreplica=$row['countdown'];
            $countdownendreplica=$row['countdown_endtime'];
            $sql_insert1="INSERT INTO `campaign_info`(`campaign_name`, `campaign_start`, `campaign_end`, `publisher_name`, `adtag_type`, `client_name`, `dimension`, `template`, `campaign_title`, `lp_type`, `city_data`, `default_city`, `temp`, `aqi`, `weather`, `crt_date`, `countdown`, `countdown_endtime`) VALUES 
                                                       ('$autofcats2','$campaignstartreplica','$campaignendreplica','$publishernamereplica','$adtagreplica','$client','$dimension','$templaterep','$camp_name-replica','$lptypereplica','$citydatareplica','$defaultcityreplica','$tempreplica','$aqireplica','$weatherreplica','$crtdatereplica','$countdownreplica','$countdownendreplica')";
            $result_insert1 = mysqli_query($connectDB,$sql_insert1);
            
            $sqlpass = "SELECT * FROM `campaign_info` WHERE campaign_title='$camp_name.-replica'";
    $resultpass = mysqli_query($connectDB,$sqlpass);
    if(mysqli_num_rows($resultpass)>0){
        while($rowpass=mysqli_fetch_assoc($resultpass)){
            $_SESSION['id'] = $rowpass['id'];
        }}
            
            
            $_SESSION['creative_type'] = "update";
            
            $ep_dim = explode(",",$dimension);
            for($dimcount=0;$dimcount<count($ep_dim);$dimcount++){
                $single_dim = $ep_dim[$dimcount];
                $sql_creatcode = "SELECT * FROM `creativecode` WHERE client='$client' AND campaign='$camp' AND dimension='$single_dim'";
            $result_creatcode = mysqli_query($connectDB,$sql_creatcode);
            if(mysqli_num_rows($result_creatcode)>0){
                while($row_creatcode=mysqli_fetch_assoc($result_creatcode)){
                    $finalcodereplica=$row_creatcode['finalcode'];
                    $contentreplica=$row_creatcode['content'];
                    $clickreplica=$row_creatcode['clicks'];
                    $impressionreplica=$row_creatcode['impressions'];
                    $animationreplica=$row_creatcode['animation'];
                    $testanimreplica=$row_creatcode['test_anim'];
                    $assetusedreplica=$row_creatcode['asset_used'];
                    $usernamereplica=$_SESSION['username'];
                    $sql_insert="INSERT INTO `creativecode`(`username`,`name`, `campaign`, `type`, `cdata`, `client`, `dimension`, `filter`, `status`, `finalcode`, `content`, `clicks`, `impressions`, `animation`, `test_anim`, `asset_used`) VALUES ('$usernamereplica','$templaterep','$autofcats2','static','replica','$client','$single_dim','$autofcats2','active','$finalcodereplica','$contentreplica','$clickreplica','$impressionreplica','$animationreplica','$testanimreplica','$assetusedreplica')";
                    $result_insert = mysqli_query($connectDB,$sql_insert);
                }
            }
            }
            
            

            
        }
        header("location: index.php");
    }
}

if(isset($_POST["new_creative"])){
    $autofcats = "";
    $characters = 'abcdefghijklmnopqrstuvwxyz0123456789';
  $charCount = strlen($characters);
  for($i=0;$i<6;$i++){
    $autofcats.= substr($characters,rand(1,$charCount),1);
  }
    $_SESSION['fcat'] = $autofcats;
    $_SESSION['id'] = '';
    $_SESSION['creative_type'] = '';
    header("location: index.php");
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />
    <title>Update creative</title>
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <style>
        .container{
            width: 100%;
            height:70vh;
            display:flex;
            flex-direction:column;
            justify-content: center;
            align-items:center;
        }
        .cnt_btn{
            width: 100%;
            height:100%;
            display:flex;
            flex-direction:column;
            justify-content: center;
            align-items:center;
        }
        button{
            width: 200px;
            height:60px;
            margin: 10px 0 20px;
            font-size: 1rem;
            cursor: pointer;
        }
        select{
            width: 300px;
            height: 40px;
            font-size: 1.2rem;
        }
        .items{
            width: 300px;
            height: 40px;
            font-size: 1.2rem;
            text-align:left;
        }
        .single{
            text-align:left;
        }
    </style>
    <div class="main">
          <ul class="list-unstyled multi-steps">
            <li class="is-active">Update Creative</li>
            <li>Campaign information</li>
            <li>select template</li>
            <li>Upload assets</li>
            <li>Update animation</li>
            <?php 
        $sql2="SELECT * FROM `campaign_info` WHERE id='$id'";
        $data2=mysqli_query($connectDB,$sql2);
        if(mysqli_num_rows($data2)>0){
    while($row2=mysqli_fetch_assoc($data2)){
        $adtag_type=$row2['adtag_type'];
            if($adtag_type!="dcm"){
                ?>
                <li>Add Tracker</li>
                <?php
            }
    }}
    ?>
            <li>Click Test</li>
            <li>Previews/Adtags</li>
          </ul>
    <h1 style="text-align:center;position:absolute;top:140px;left:50%;transform:translateX(-50%);">Create new creative/Update creative/Make Replica of Existing creative</h1>
    <a href="logout.php" style="position:absolute;top:5px;right:5px;color: #fff;background-color: #d9534f;border-color: #d43f3a;text-decoration: none;padding: 10px;border-radius: 5px">Logout</a>
    <div class="container">
        <div class="cnt_btn" id="cnt_btn">
            <form method="post">
                <button name="new_creative">Create new creative</button>
            </form>
            <button id="update_creat">Update existing creative</button>
            <button id="replica_creat">Replica of existing creative</button>
        </div>
    </div>
    
   <script>
        localStorage.clear();
        $(document).ready(function(){
            $("#update_creat").on("click",function(e){
                e.preventDefault();
                $.ajax({
              url : "get_creative.php",
              type : "POST",
              dataType : "JSON",
              data:{
                  client: '<?php echo $client_names ?>',
              },
              success : function(data){
                //   console.log(data)
                  $("#cnt_btn").html(data.content)
              }
           })
            })
        })
        $(document).ready(function(){
            $("#replica_creat").on("click",function(e){
                e.preventDefault();
                $.ajax({
              url : "get_replica.php",
              type : "POST",
              dataType : "JSON",
              data:{
                  client: '<?php echo $client_names ?>',
              },
              success : function(data){
                //   console.log(data)
                  $("#cnt_btn").html(data.content)
              }
           })
            })
        })
   </script>
</body>
</html>

<?php
include "./conn.php";
error_reporting(E_ERROR | E_PARSE);
session_start();
$_SESSION['fcat']="";
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
            $adtag_type =  $row['adtag_type'];
            $ep_dim = explode(",",$dimension);
            $single_dim = $ep_dim[0];
            $_SESSION['creative_type'] = "update";
            $_SESSION['title_change'] = "true";
            $sql_creatcode = "SELECT * FROM `creativecode` WHERE client='$client' AND campaign='$camp' AND dimension='$single_dim'";
            $result_creatcode = mysqli_query($connectDB,$sql_creatcode);
            if(mysqli_num_rows($result_creatcode)>0){
                while($row_creatcode=mysqli_fetch_assoc($result_creatcode)){
                    $_SESSION['fcat'] = $row_creatcode['filter'];
                }
            }else{
                $_SESSION['fcat'] = $camp;
            }
        }
        date_default_timezone_set('Asia/Kolkata');
$time = date('Y-m-d H:i:s');

$email=$_SESSION['email'];
$client=$_SESSION['client_name'];
$fcat = $_SESSION['fcat'];

// $to = "bizops@hockeycurve.com" ;
//       $message = "Hello team, <br> \r\n\r\n";
//       $message .= "Email - $email  <br> \r\n\r\n"; 
//       $message .= "Client- $client <br><br> \r\n\r\n";
//       $message .= "fcat - $fcat <br><br> \r\n\r\n";
//       $message .= "campaign title - $camp <br><br> \r\n\r\n";
//       $message .= "The update creative button is Pressed <br><br>";
//       $message .="Thanks & Regards <br>";
//       $message .="Hockey Curve";
//       $subject ="Update creative is pressed";
//       $header = "From:bizops@hockeycurve.com\r\n";
//       $header .= "MIME-Version: 1.0\r\n";
//       $header .= "Content-type: text/html\r\n";
//       $retval = mail ($to,$subject,$message,$header);

                // $log="INSERT INTO `log_file`(`client_name`, `email`, `date_time`, `event`,`fcat`,`adtag`) VALUES ('$client','$email','$time','update creative','$fcat','$adtag_type')";
                // $result_log=mysqli_query($connectDB,$log);
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
            
            $sql_insert1="INSERT INTO `campaign_info`(`campaign_name`, `campaign_start`, `campaign_end`, `publisher_name`, `adtag_type`, `client_name`, `dimension`, `template`, `campaign_title`, `lp_type`, `city_data`, `default_city`, `temp`, `aqi`, `weather`, `crt_date`, `countdown`, `countdown_endtime`,`mailto`,`replica`) VALUES 
                                                       ('$autofcats2','$campaignstartreplica','$campaignendreplica','$publishernamereplica','$adtagreplica','$client','$dimension','$templaterep','$camp_name-replica','$lptypereplica','$citydatareplica','$defaultcityreplica','$tempreplica','$aqireplica','$weatherreplica','$crtdatereplica','$countdownreplica','$countdownendreplica','false','true')";
            $result_insert1 = mysqli_query($connectDB,$sql_insert1);
            
            $sqlpass = "SELECT * FROM `campaign_info` WHERE campaign_title='$camp_name-replica'";
    $resultpass = mysqli_query($connectDB,$sqlpass);
    if(mysqli_num_rows($resultpass)>0){
        while($rowpass=mysqli_fetch_assoc($resultpass)){
            $_SESSION['id'] = $rowpass['id'];
        }}
            
            
            $_SESSION['creative_type'] = "update";
            $_SESSION['title_change'] = "false";
            
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
                    $sql_insert="INSERT INTO `creativecode`(`username`,`name`, `campaign`, `type`, `cdata`, `client`, `dimension`, `filter`, `status`, `finalcode`, `content`, `animation`, `test_anim`, `asset_used`) VALUES ('$usernamereplica','$templaterep','$autofcats2','static','replica','$client','$single_dim','$autofcats2','active','$finalcodereplica','$contentreplica','$animationreplica','$testanimreplica','$assetusedreplica')";
                    $result_insert = mysqli_query($connectDB,$sql_insert);
                }
            }
            }
            
            

            
        }
                            

        
        header("location: index.php");
    }
      date_default_timezone_set('Asia/Kolkata');
$time = date('Y-m-d H:i:s');

$email=$_SESSION['email'];
$client=$_SESSION['client_name'];
$fcat = $_SESSION['fcat'];
// $to = "bizops@hockeycurve.com" ;
//       $message = "Hello team, <br> \r\n\r\n";
//       $message .= "Email - $email  <br> \r\n\r\n"; 
//       $message .= "Client- $client <br><br> \r\n\r\n";
//       $message .= "fcat - $fcat <br><br> \r\n\r\n";
//       $message .= "campaign title - $camp <br><br> \r\n\r\n";
//       $message .= "The Replica of the creative button is Pressed <br><br>";
//       $message .="Thanks & Regards <br>";
//       $message .="Hockey Curve";
//       $subject ="Replica creative is pressed";
//       $header = "From:bizops@hockeycurve.com\r\n";
//       $header .= "MIME-Version: 1.0\r\n";
//       $header .= "Content-type: text/html\r\n";
//       $retval = mail ($to,$subject,$message,$header);
                // $log="INSERT INTO `log_file`(`client_name`, `email`, `date_time`, `event`,`fcat`,`adtag`) VALUES ('$client','$email','$time','replica creative','$fcat','$adtagreplica')";
                // $result_log=mysqli_query($connectDB,$log);
                //     header("location: index.php");
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
            $_SESSION['title_change'] = "false";
     date_default_timezone_set('Asia/Kolkata');
$time = date('Y-m-d H:i:s');

$email=$_SESSION['email'];
$client=$_SESSION['client_name'];
$fcat = $autofcats;

// $to = "bizops@hockeycurve.com" ;
//       $message = "Hello team, <br> \r\n\r\n";
//       $message .= "Email - $email  <br> \r\n\r\n"; 
//       $message .= "Client- $client <br><br> \r\n\r\n";
//       $message .= "fcat - $fcat <br><br> \r\n\r\n";
//       $message .= "Create new creative button is Pressed <br><br>";
//       $message .="Thanks & Regards <br>";
//       $message .="Hockey Curve";
//       $subject ="Create new ad button is pressed";
//       $header = "From:bizops@hockeycurve.com\r\n";
//       $header .= "MIME-Version: 1.0\r\n";
//       $header .= "Content-type: text/html\r\n";
//       $retval = mail ($to,$subject,$message,$header);
                // $log="INSERT INTO `log_file`(`client_name`, `email`, `date_time`, `event`,`fcat`) VALUES ('$client','$email','$time','create new creative','$fcat')";
                // $result_log=mysqli_query($connectDB,$log);
    header("location: index.php");
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update creative</title>
    <link rel="stylesheet" href="style.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />
    
    
    <style>
        .container{
            width: 100%;
            height:70vh;
            display:flex;
            flex-direction:column;
            justify-content: center;
            align-items:center;
        }
        /*.cnt_btn{*/
        /*    width: 100%;*/
        /*    height:100%;*/
        /*    display:flex;*/
        /*    flex-direction:column;*/
        /*    justify-content: center;*/
        /*    align-items:center;*/
        /*}*/
        button{
            width: 200px;
            height:60px;
            margin: 10px 0 20px;
            font-size: -1rem;
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
        
         .sidebar li{
  padding: 33px 8px 6px 16px;
  text-decoration: none;
  font-size: 18px;
  color: #ffffff;
  display: block;
  pointer:cursor;
}

 .sidebar il{
  font-size: 30px;
}
.sidebar .set{
  padding: 100px 8px 6px 14px;
  text-decoration: none;
  font-size: 21px;
  color: #ffffff;
  display: block;
}  

.sidebar a:hover {
  color: #90ee90;
}

.logo{
    position:fixed;
    top: 0;
    left: 0;
    z-index: 10;
    margin-top:9px;
    margin-left:9px;
}

.page_info {
    position: absolute;
    top: 130px;
    right: 20px;
    font-size: 22px;
    font-family: 'bold';
}

.selectize-dropdown{
    height:100px;
    font-family: 'sbold';
}

.selectize-dropdown-content{
    height:90px;
    font-family: 'sbold';
}

.items{font-family: 'sbold';}

@font-face {
        font-family: 'bold';
        src: url('https://s.hcurvecdn.com/fonts/Montserrat_Bol.woff2?v=3') format("truetype");
    }
    @font-face {
        font-family: 'sbold';
        src: url('https://s.hcurvecdn.com/fonts/NunitoSans-Bold.woff2?v=3') format("truetype");
    }
    
    .icon , .probar{vertical-align: middle;}
    
    .btnui{font-family:'bold';background: #1379d6;color:white;border:none;border-radius: 10px;}

    .cnt_btn{width: 59%;position: fixed;top: 72%;left:30%;height: 10%;display: flex;flex-direction: row;justify-content: space-around;align-items: center;}
    </style>
</head>

<body>
    <div class="logo">
<img style="width:282px" src="https://s.hcurvecdn.com/atest/pooja/updateanimation/logo3.png"> 
</div>      

<ul class="list-unstyled multi-steps">    
<div class="sidebar" style="font-family:bold;position:fixed;top: 0;left: 0;background-color: #0b4da1;width:300px;padding-top: 5.5em;height:100%;cursor:pointer;z-index:5">
     <div style="position: absolute;width: 300px;height: 70px;top: 105px;background-color: #84B7E3;z-index: -1;"></div>
  <li class="a"  id="updt_creat" ><img class="icon" src="https://s.hcurvecdn.com/atest/pooja/updateanimation/icons/Create-Icon.png">&nbsp;&nbsp;&nbsp;CREATE / UPDATE</li>
  <li class="a"  id="cam_inf" ><img class="icon" style="width: 45px;" src="https://hcurvecdn.com/atest/pooja/updateanimation/caminfo.png">&nbsp;&nbsp;&nbsp;CAMPAIGN INFO</li>
  <li class="a"  id="cam_inf" ><img class="icon" src="https://s.hcurvecdn.com/atest/pooja/updateanimation/icons/library-icon.png">&nbsp;&nbsp;&nbsp;LIBRARY</li>
  <li class="a"  id="upld_ast"><img class="icon" src="https://s.hcurvecdn.com/atest/pooja/updateanimation/icons/upload-icon.png">&nbsp;&nbsp;&nbsp;UPLOAD ASSETS</li>
  <li class="a" style="cursor: pointer;position: relative;z-index: 1;"><img class="icon" src="https://s.hcurvecdn.com/atest/pooja/updateanimation/icons/animation-icon.png">&nbsp;&nbsp;&nbsp;ANIMATION</li>
  <li class="a" style="cursor:pointer"><img class="icon" src="https://s.hcurvecdn.com/atest/pooja/updateanimation/icons/Ad-tag-testing.png">&nbsp;&nbsp;&nbsp;AD TAG / TESTING</li>
  <a href="logout.php" style="color:white;text-decoration:none"><li style="cursor:pointer;bottom: 80px;position: absolute;"><img style="width:70%;" src="https://hcurvecdn.com/atest/pooja/updateanimation/logoutctanew.png"/></li></a>
</div>
<div style="z-index: 10;position: fixed;top: 130px;left: 265px;"><img style="height: 430px;" class="probar" src="https://s.hcurvecdn.com/atest/mahesh/cam_info/assets/progressbar2.png">
<img style="height: 15px;position: absolute;top: 3px;left: 3px;" class="probardot" src="https://hcurvecdn.com/atest/pooja/updateanimation/progressbarselection.png"></div>

</ul>
    
    <div class="main" style="position:relative">   
   
    <h1 style="text-align:center;position:absolute;top:60px;font-size:30px;left:342px;font-family:'bold';text-transform: uppercase;">Create new creative/Update creative/Make Replica of Existing creative</h1>
    <img id="rocket" style="position:fixed;top:33%;left:50%;width:25%" src="https://s.hcurvecdn.com/atest/mahesh/cam_info/assets/image1.png" />
   <!--<div style="position:fixed;right:4em;white-space: nowrap;top:0.6em;font-size: 1;font-size: 1.5em;font-family: bold;">-->
   <!-- <div style="display: inline-block;margin-top:10%;margin-right: 5%;text-transform: capitalize;"><?php echo $_SESSION['username'] ?></div>-->
   <!-- <img style="position:fixed;width:3%" src="https://s.hcurvecdn.com/atest/pooja/updateanimation/UserProfile-Icon.png" />-->
   <!--</div>-->
   
   <label class="logoutLblPos">
       <div style="position: absolute;right:4em;white-space: nowrap;top:0.6em;font-size: 1;font-size: 1.5em;font-family: bold;"><?php echo $_SESSION['username'] ?></div>
        <div>
        <img style="position: absolute;right:1.3em;width:50px" src="https://s.hcurvecdn.com/atest/pooja/updateanimation/UserProfile-Icon.png">
       </div>
 </label>
 
 <div class="page_info">Click to <a target="_blank" href="https://docs.google.com/document/d/15xXq-J8k5q8teziRA9TvU-MmGxjl0r7TJSKf8vfMjYs">Know More</a></div>
    
    <div class="container">
        <div class="cnt_btn" id="cnt_btn">
            <form method="post">
                <button class="btnui" name="new_creative">Create new creative</button>
            </form>
            <button class="btnui"  id="update_creat">Update existing creative</button>
            <button class="btnui"  id="replica_creat">Replica of existing creative</button>
        </div>
    </div>
</div>
   <script>
function opact(){
    document.querySelector(".outbtn").style.display = "block";
}
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

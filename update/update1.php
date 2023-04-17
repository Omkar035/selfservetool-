<?php
ob_start();
session_start();
$_SESSION['client_name'];
    if(!$_SESSION['email']){
      header("location: ../login.php");
    }
error_reporting(E_ERROR | E_PARSE);
include "../conn.php";
$id=$_GET['id'];
if(isset($_POST['id'])) {
    $id=$_GET['id'];
}
$_SESSION['id']=$id;  
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Update</title>
<style>
table {
  /*border-collapse: collapse;*/
  margin-top:20px;
  /*width: 80%;*/
  font-size:20px;
}
td, th {
  border: 1px solid #dddddd;
  padding: 25px 50px 25px 50px !important;
 
}

.logoutLblPos{
   position:absolute;
   right:1em;
   top:1em;
}

 .sidebar li{
  padding: 33px 8px 6px 16px;
  text-decoration: none;
  font-size: 18px;
  color: #ffffff;
  display: block;
  pointer:cursor;
}

/* .sidebar il{*/
/*  font-size: 30px;*/
/*}*/
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


</style>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.19.1/TweenMax.min.js"></script>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.js"></script>
  <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
   <link rel="stylesheet" href="../style.css" />
<style>
     #arrow3{
    animation:copy forwards 3s 3;
    animation-delay: 0.5s;
    opacity: 0;
}
    #arrow2{
    animation:copy forwards 3s 3;
    animation-delay: 0.5s;
    opacity: 0;
}
@keyframes copy {
  0%   {top:-20px;left: -40px;opacity: 1;}
  50%  {top:-20px;left: -70px;opacity: 1;}
  100% {top:-20px;left: -40px;opacity: 1;}
  
}     
     #btn1{
    /*margin-left: 314px !important;*/
    /*top: 359px !important;*/
    position:absolute;
    left:0px;
     width: 233px !important;
    font-size: 17px !important;
    padding: 9px !important;
    background-color: #1379d6;
    color: white;
    border-radius: 10px;
    border: none;
    height: 45px !important;
   transform: translate(-50%, 0);
   font-weight:bold;
 }  
   .btn--shimmer {
      
    animation: shimmer 3s linear 10;
    animation-iteration-count: infinite;
    animation-delay: 1.2s;
    background-image: linear-gradient(-65deg, rgba(255, 255, 255, 0) 46%, rgba(255, 255, 255, .8) 50%, rgba(255, 255, 255, .8) 42%, rgba(255, 255, 255, 0) 56%);
    background-size: 400% 110%;
  }
 
  @keyframes shimmer {
    0% {
      background-position: 100% 50%;
    }

    30% {
      background-position: 0% 50%;
    }
  }
  
 .saps 
  {
    margin-left: 270px !important;
    position:absolute;
    top: 1px !important;
    left:750px;
    width: 155px !important;
    font-size: 13px !important;
    padding: 9px !important;
    background-color: #1379d6;
    color: white;
    border-radius: 10px;
    border: none;
    height: 40px !important;
    transform: translate(-50%, 0);
}

.saps2
  {
   margin-left: 270px !important;
    position: absolute;
    top: 1px !important;
    left: 940px;
    width: 140px !important;
    font-size: 18px !important;
    padding: 9px !important;
    background-color: #1379d6;
    color: white;
    border-radius: 10px;
    border: none;
    height: 40px !important;
    transform: translate(-50%, 0);
}

@font-face {
        font-family: 'bold';
        src: url('https://s.hcurvecdn.com/fonts/Montserrat_Bol.woff2?v=3') format("truetype");
    }
    @font-face {
        font-family: 'sbold';
        src: url('https://s.hcurvecdn.com/fonts/NunitoSans-Bold.woff2?v=3') format("truetype");
    }

.uicon{
    width: 30px;
    position: relative;
    left: 10px;
}

.ua{
    padding-top: 10px;
    padding-bottom: 10px;
    border-bottom: 1px solid #959595;
}

.us{
    position: relative;
    top: 3px;
    left: 10px;
}

.ua:hover{
    background:#84B7E3
}


</style>
</head>

<body style="font-family:bold">
<div class="logo">
<img style="width:282px" src="https://s.hcurvecdn.com/atest/pooja/updateanimation/logo3.png"> 
</div>      

<ul class="list-unstyled multi-steps">    
<div class="sidebar" style="font-family:bold;position:fixed;top: 0;left: 0;background-color: #0b4da1;width:300px;padding-top: 5.5em;height:100%;cursor:pointer;z-index:5">
    <div style="position: absolute;width: 300px;height: 70px;top: 345px;background-color: #84B7E3;"></div>
  <li class="a"  id="updt_creat" ><img class="icon" src="https://s.hcurvecdn.com/atest/pooja/updateanimation/icons/Create-Icon.png">&nbsp;&nbsp;&nbsp;CREATE / UPDATE</li>
  <li class="a"  id="cam_inf" ><img class="icon" src="https://s.hcurvecdn.com/atest/pooja/updateanimation/icons/library-icon.png">&nbsp;&nbsp;&nbsp;LIBRARY</li>
  <li class="a"  id="upld_ast"><img class="icon" src="https://s.hcurvecdn.com/atest/pooja/updateanimation/icons/upload-icon.png">&nbsp;&nbsp;&nbsp;UPLOAD ASSETS</li>
  <li class="a" style="cursor:pointer;cursor: pointer;position: relative;z-index: 1;"><img class="icon" src="https://s.hcurvecdn.com/atest/pooja/updateanimation/icons/animation-icon.png">&nbsp;&nbsp;&nbsp;ANIMATION</li>
  <?php 
        $sql2="SELECT * FROM `campaign_info` WHERE id='$id'";
        $data2=mysqli_query($connectDB,$sql2);
        if(mysqli_num_rows($data2)>0){
    while($row2=mysqli_fetch_assoc($data2)){
        $tdims=$row2['dimension'];
        $adtag_type=$row2['adtag_type'];
            if($adtag_type!="dcm"){  
                ?>
               <li class="a" style="cursor:pointer;"><img class="icon" style="width: 45px;" src="https://s.hcurvecdn.com/atest/mahesh/cam_info/assets/addtracker.png">&nbsp;&nbsp;&nbsp;ADD TRACKER</li>
 
                <?php
             }
    }}
    ?>
  
  <li class="a" style="cursor:pointer"><img class="icon" style="width: 45px;" src="https://s.hcurvecdn.com/atest/pooja/icn/Ad-tag-testing.png">&nbsp;&nbsp;&nbsp;AD TAG / TESTING</li>
  <!--<li class="a bot" style="cursor:pointer;bottom: 10px;position: absolute;"><img class="icon"src="https://s.hcurvecdn.com/atest/pooja/updateanimation/icons/Setting.png">&nbsp;&nbsp;&nbsp;SETTING</li>-->
<!--<a href="../logout.php" style="color:white;text-decoration:none"><li class="a bot" style="cursor:pointer;bottom: 10px;position: absolute;"><img style="width:70%;" src="https://s.hcurvecdn.com/atest/mahesh/cam_info/assets/logout-cta.png"/></li></a>-->
</div>
 <?php 
        $sql2="SELECT * FROM `campaign_info` WHERE id='$id'";
        $data2=mysqli_query($connectDB,$sql2);
        if(mysqli_num_rows($data2)>0){
    while($row2=mysqli_fetch_assoc($data2)){
        $tdims=$row2['dimension'];
        $adtag_type=$row2['adtag_type'];
            if($adtag_type!="dcm"){  
                ?>
               <div style="z-index: 10;position: fixed;top: 119px;left: 265px;"><img style="height: 425px;" class="probar" src="https://s.hcurvecdn.com/atest/mahesh/cam_info/assets/progressbar2.png">
<img style="height: 15px;position: absolute;top: 252px;left: 3px;" class="probardot" src="https://hcurvecdn.com/atest/pooja/updateanimation/progressbarselection.png"></div>
 
                <?php
             }else{
             ?>
                 <div style="z-index: 10;position: fixed;top: 119px;left: 265px;"><img style="height: 346px;" class="probar" src="https://hcurvecdn.com/atest/pooja/updateanimation/progressbar.png">
<img style="height: 15px;position: absolute;top: 252px;left: 3px;" class="probardot" src="https://hcurvecdn.com/atest/pooja/updateanimation/progressbarselection.png"></div>
             <?php
                 
             }
    }}
    ?>


    
  </ul>


    <h1 style="margin-left:20px;color:black;font-weight:bolder;font-size:3em;font-family:bold;margin-left:340px;position:absolute;top:93px;">Update <span style="color:#1c82e3;font-weight:bolder">Animations</span></h1>
    <div style="width:100%;text-align:center;position:absolute;top:208px;left:-4%"><button name="animchange" onclick="animchange()" class="saps"><span style="position:relative;top:-2px;font-size:18px;font-weight:bold">Same for all</span></button><form method="POST" id="inputadd"></form></div>
    <div style="color:black;font-weight:bolder;font-size:1.5em;padding-top:10px;padding-bottom:15px;font-family:bold;margin-left:340px;margin-top:-20px;position:absolute;top:175px">Ad Size - <?php echo $tdims ?></div>
  <table style="margin-left:20px;border:none">
 <thead>
    
    
    <th style="text-align:center;border:none"></th>
    <th style="text-align:center;border:none"></th>
    <th style="text-align:center;border:none"></th>
 </thead>
<?php 
$sql1="SELECT * FROM `campaign_info` WHERE id='$id'";
$data1=mysqli_query($connectDB,$sql1);

if(mysqli_num_rows($data1)>0){
    while($row1=mysqli_fetch_assoc($data1)){
        
    $camp = $row1['campaign_name'];
    $client =  $row1['client_name'];   
    $template = $row1['template'];
    $dimension = $row1['dimension']; 
    $adtag_type=$row1['adtag_type']; 
    $content2 = [];
    $abc=explode(",",$dimension);
    
     for($f=0; $f<count($abc); $f++){
      $abc2=explode("x",$abc[$f]);
      $abc3=explode("x",$abc[$f-1]);
         $sql2="SELECT * FROM `creativecode` WHERE name='$template' AND campaign='$camp' AND client='$client' AND dimension='$abc[$f]'";
         $data2=mysqli_query($connectDB,$sql2);
         if(mysqli_num_rows($data2)>0){
             while($rowa=mysqli_fetch_assoc($data2)){
                 $id2=$rowa['id'];
                 $uname=$rowa['username'];
                 $fcat2=$rowa['filter'];
                 $client2=$rowa['client'];
                 array_push($content2,$rowa['content']);
 ?>     
 <tr>
     <?php if($rowa['finalcode']==""){
     $code=$rowa['content'];
     }else{
      $code=$rowa['finalcode'];} ?>
      <div style="position:relative;left:325px;top:250px;margin-bottom:50px;width:<?php echo $abc2[0]+300 ?>px;height:<?php echo $abc2[1] ?>px">
 <div id="main<?php echo $rowa['dimension']; ?>"  style="position:absolute;left:0px;top: 0px;margin-bottom:50px;display:flex;flex-wrap:wrap;width:<?php echo $abc2[0] ?>px; height:<?php echo $abc2[1] ?>px"><?php echo $code ?></div>
 <!--<div id="dim<?php echo $f; ?>" style="text-align:center;display:block"><?php echo $rowa['dimension']; ?></div>-->
 <!--<td style="text-align:center;"><a href="./testanim.php?id=<?php echo $id2 ?>">Update Animation</a></td></tr>-->
  <div style="border:none;position:absolute;top:0px;left:<?php echo $abc2[0]+160 ?>px;">  <button id="btn1" class="cta btn--shimmer"  onclick="location.href = './testanim.php?id=<?php echo $id2 ?>';">Update Animation</button></div>
  </div>

  <?php              
             }
     }
}
  

}}
 ?>
  <tr>
    
  </tr>


 
</table>



<script>
    var first_dim = document.getElementById("dim0").innerHTML;
    var ok='script'+first_dim;
    var scripttocopy = document.getElementById(ok).innerHTML
    console.log(scripttocopy);
    var numberOfDimensions=<?php echo count($abc); ?>

    console.log(numberOfDimensions)

    function animchange(){
        document.getElementById("inputadd").innerHTML="";
    for(dimensionNumber=1;dimensionNumber<numberOfDimensions;dimensionNumber++){
        alldimensions=document.getElementById("dim"+dimensionNumber).innerHTML;
        var changedscript=scripttocopy.replaceAll(first_dim,alldimensions);


            var input = document.createElement("input");

input.setAttribute("type", "hidden");

input.setAttribute("name", "inputadded"+dimensionNumber);

input.setAttribute("value", changedscript);

//append to form element that you want .
document.getElementById("inputadd").appendChild(input);



        }
        var pushbutton = document.createElement("button");

        pushbutton.setAttribute("type", "submit");

        pushbutton.setAttribute("name", "pushbutton");
        pushbutton.innerText="Push to DB";
        pushbutton.setAttribute("class", "saps2");



//append to form element that you want .
document.getElementById("inputadd").appendChild(pushbutton);



}
    
</script>
<div id="saps22"   style="position:absolute;top: 163px;left:280px;">
<?php
if(isset($_POST['pushbutton'])){
    
    

$sqlreq="SELECT * FROM `campaign_info` WHERE id='$id'";
$datareq=mysqli_query($connectDB,$sqlreq);

while($rowreq=mysqli_fetch_assoc($datareq)){
        
    $camp = $rowreq['campaign_name'];
    $client =  $rowreq['client_name'];   
    $template = $rowreq['template'];
    $dimension = $rowreq['dimension']; 
    $adtag_type=$rowreq['adtag_type']; 
    }
    
    for($countdim=1;$countdim<count($abc);$countdim++){
        $kyabolu='inputadded'.$countdim;
        $dim0=$_POST[$kyabolu];
        $sqlreq2="SELECT * FROM `creativecode` WHERE name='$template' AND campaign='$camp' AND client='$client' AND dimension='$abc[$countdim]'";
$datareq2=mysqli_query($connectDB,$sqlreq2);
while($rowreq2=mysqli_fetch_assoc($datareq2)){
        
    $content = $rowreq2['content'];
    $endcode=$content.'<script id="script'.$abc[$countdim].'">'.$dim0.'</script>';

    $sqlfinal="UPDATE `creativecode` SET `finalcode`= '$endcode',`animation`='$dim0',`test_anim`='$dim0' WHERE name='$template' AND campaign='$camp' AND client='$client' AND dimension='$abc[$countdim]'";
    $datafinal=mysqli_query($connectDB,$sqlfinal);
    
    }




    

    }

 header("Refresh:0");
 
    
}

        if($adtag_type=="dcm"){
            ?>

            <form method="POST">
                <button type="submit" class="btn btn-success" name="create" style="position: absolute;top:46px;right: -544px;font-size: 19px;font-weight: bold;background: #1379d6;border: none;width: 155px;height: 40px;border-radius:10px">Click Test</button>
                <!--<div style="position:absolute;top:9px;left:120px;width:300px;color:#063970;font-size:14px;display:none" id="checking"><span style="position:absolute;font-size:39px;" id="arrow3">&larr;</span><b> Press click test button to complete the test </b></div>-->

            </form>
            <?php 
        }
        else{
            ?>
                <a href="../trackers.php?id=<?php echo $id; ?>" class="btn btn-success" style="position: absolute;top:46px;right: -544px;font-size: 19px;font-weight: bold;background: #1379d6;border: none;width: 155px;height: 40px;border-radius:10px">Add Trackers</a>
                <!--<div style="position:relative;top:-35px;left:160px;width:300px;color:#063970;font-size:14px"><span style="position:absolute;font-size:39px;" id="arrow2">&larr;</span><b>Press Add Trackers button to add your LP/Trackers. </b></div>-->

            <?php
        }
    ?>
</div>   


    <!--<a href="../logout.php" class="btn btn-danger" style="position:absolute;top:5px;right:5px">Logout</a>-->
<label class="logoutLblPos">
       <div style="position: absolute;right:4em;white-space: nowrap;top:0.6em;font-size: 1;font-size: 1.5em;font-family: bold;"><?php echo $_SESSION['username'] ?></div>
        <div>
        <img id="uclk" style="position: absolute;right:1.3em;width:50px" src="https://s.hcurvecdn.com/atest/pooja/updateanimation/UserProfile-Icon.png">
       </div>
 </label>
<div id="userpop" style="position:absolute;top: 80px;right: 35px;width: 225px;height: 250px;border-radius: 10px;box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;font-family: bold;font-size: 15px;color:black;overflow:hidden;display:none;">
    <ul class="list-unstyled">
        <li class="ua" style="cursor:pointer" id="" ><img class="uicon" src="https://hcurvecdn.com/atest/pooja/icn/up.png"><span class="us">&nbsp;&nbsp;&nbsp;MY PROFILE</span></li>
  <li class="ua" style="cursor:pointer" id="" ><img class="uicon" src="https://hcurvecdn.com/atest/pooja/icn/ep.png"><span class="us">&nbsp;&nbsp;&nbsp;EDIT PROFILE</span></li>
  <li class="ua" style="cursor:pointer" id=""><img class="uicon" src="https://hcurvecdn.com/atest/pooja/icn/st.png"><span class="us">&nbsp;&nbsp;&nbsp;SETTING</span></li>
  <li class="ua" style="cursor:pointer" ><img class="uicon" src="https://hcurvecdn.com/atest/pooja/icn/hp.png"><span class="us">&nbsp;&nbsp;&nbsp;HELP</span></li>
  <a href="../logout.php" style="text-decoration: none;color: black;"><li class="ua" style="padding-top:10px;padding-bottom:10px" ><img class="uicon" src="https://hcurvecdn.com/atest/pooja/icn/lg.png"><span class="us">&nbsp;&nbsp;&nbsp;LOGOUT</span></li></a>
  
    </ul>
    
</div>


 </body>
 <script>
     document.getElementById("updt_creat").addEventListener("click",()=>{
        window.location = "../update_creative.php";
    })
     document.getElementById("cam_inf").addEventListener("click",()=>{
        window.location = "../index.php";
    })
  
    document.getElementById("upld_ast").addEventListener("click",()=>{
        window.location = "../uploadasset/creative.php?id=<?php echo $id; ?>";
    })
    
 </script>
</html>

<?php
$sql = "SELECT * FROM `campaign_info` WHERE id=$id LIMIT 1";
      $result = mysqli_query($connectDB, $sql);
      $row = mysqli_fetch_assoc($result);
      $camp = $row['campaign_name'];
      $dims = $row['dimension'];
$adtagid= ($id+10000);

date_default_timezone_set('Asia/Kolkata');
$adtagdate = date('Y-m-d');

$adtagcreate_time=date('H:i:s');

$adtagdeveloper_name=$_SESSION['email'];

$adtag2=$row["adtag_type"];
if($adtag2=="dcm"){
    $adtag2="DCM";
}else if($adtag2=="dv360"){
    $adtag2="Dv360";
}else if($adtag2=="dv360_dbmc"){
    $adtag2="Dv360Dbmc";
}else if($adtag2=="dfp"){
    $adtag2="DFP";
}else if($adtag2=="criteo"){
    $adtag2="CRITEO";
}else if($adtag2=="sports"){
    $adtag2="Sports";
}

$geo2=$row["city_data"];
if($geo2=="geo"){
    $geo2="true";
}

$campai=$row["campaign_title"];

$cli=$row["client_name"];

$adtagdimensions=$row["dimension"];


$str_arr = explode(",", $dims);

 $sql1718 = "SELECT * FROM `creativecode` WHERE `campaign` = '$camp' AND `dimension` = '$str_arr[0]' AND `client`='$cli'";
                $result1718 = mysqli_query($connectDB, $sql1718);
                $row1718 = mysqli_fetch_assoc($result1718);
                $fcat1718 =  $row1718['filter']; 


$publisher_name=$row["publisher_name"];


$data_arr = array();
    
      
if(isset($_POST['create'])){
    
    $adtagservername = "localhost";
$adtagusername = "publishe_cadmin";
$adtagpassword = "hc@admin";
$adtagdbname = 'publishe_hccampaign';
    
    
    $adtagconnectDB = mysqli_connect($adtagservername,$adtagusername,$adtagpassword,$adtagdbname);
if (!$adtagconnectDB){
    die("Sorry we failed to connect: ". mysqli_connect_error());
}

 $sql17181 = "SELECT * FROM `adtagdata` WHERE `fcat`='$fcat1718'";
                $result17181 = mysqli_query($connectDB, $sql17181);
                $row17181 = mysqli_fetch_assoc($result17181);
                if (in_array($fcat1718,$row17181)) {
                   
    $adtagsql="UPDATE `adtagdata` SET `date`='$adtagdate',`create_time`='$adtagcreate_time',`developer_name`='$adtagdeveloper_name',`adtag_type`='$adtag2',`geo`='$geo2',`campaign_name`='$campai',`master_client`='$cli',`client`='$cli',`fcat`='$fcat1718',`publisher`='$publisher_name',`dims`='$adtagdimensions',`status`='staging',`status_v`='staging' WHERE `tool` = 's' AND `fcat`='$fcat1718'";
    $adtagresult=mysqli_query($adtagconnectDB,$adtagsql);

}else{
    
      $adtagsql="INSERT INTO `adtagdata`(`tool`,`date`,`create_time`,`developer_name`,`adtag_type`, `geo`, `campaign_name`, `master_client` ,`client`, `fcat`, `publisher`, `dims`, `status`,`status_v`) VALUES ('s','$adtagdate','$adtagcreate_time','$adtagdeveloper_name','$adtag2','$geo2','$campai', '$cli' ,'$cli','$fcat1718','$publisher_name','$adtagdimensions','staging','staging')";

    $adtagresult=mysqli_query($adtagconnectDB,$adtagsql);

}

for($ij=0;$ij<count($str_arr);$ij++){
    
    for ($p = 0; $p < count($str_arr); $p++){
        
        if ($row["lp_type"] == "imp") {
        $impressions = $_POST['impp'.$p];
        $clicks = $_POST['clik'.$p];
        $sql3 = "UPDATE creativecode SET clicks = '$clicks'  WHERE `campaign` = '$camp' AND `dimension` = '$str_arr[$p]'";
        $executeQuery = mysqli_query($connectDB, $sql3);
        $sql4 = "UPDATE creativecode SET impressions = '$impressions'  WHERE `campaign` = '$camp' AND `dimension` = '$str_arr[$p]'";
        $executeQuery2 = mysqli_query($connectDB, $sql4);
        header("location:trackers.php?id=" . $id);
        } else if ($row["lp_type"] == "utm" || $row["lp_type"] == "lp") {
            $clicks = $_POST['land'.$p];
            $sql7 = "UPDATE creativecode SET clicks = '$clicks'  WHERE `campaign` = '$camp' AND `dimension` = '$str_arr[$p]'";
        $executeQuery3 = mysqli_query($connectDB, $sql7);
        header("location:trackers.php?id=" . $id);

        }
        
    };
    
    $url = 'https://dynamique.hockeycurve.com/publish-creativedata?key=Kth7NS3ACWX2';
    $sql_arr = "SELECT * FROM `creativecode` WHERE `campaign` = '$camp' AND `dimension` = '$str_arr[$ij]'";
        $result_arr = mysqli_query($connectDB, $sql_arr);
        $row_arr = mysqli_fetch_assoc($result_arr);
        $client_dt = $row_arr['client'];
        $fcat_dt = $row_arr['filter'];
        $dim_dt = $row_arr['dimension'];
        if($row_arr['clicks']!=""&&$row_arr['impressions']!=""){
            $impressiontracker='<script>
imp1="'.$row_arr["impressions"].'".split("[timestamp]")[0]
imp2="'.$row_arr["impressions"].'".split("[timestamp]")[1]

var time = (new Date())/1000
    var frame = document.getElementById("imptag");
    function trigIframe(){
        var frame = document.createElement("iframe")
        frame.style["display"] = "none"
        frame.src = imp1+time+imp2
        document.body.appendChild(frame)
    }
    setTimeout(trigIframe, 5000)
    </script>
    
';
            $clicktracker='<script>
if(document.querySelector("#city_name") != null){
            var city=json["city"] || "'.$row['default_city'].'";
            document.getElementById("city_name").innerText=city;}
document.getElementById("clickurl").href = "'.$row_arr['clicks'].'";var elem = document.getElementsByTagName("a")[0];if(json["click_macro"]){elem.href = elem.href;var target = json["click_macro"];var url = elem.href;elem.href = "https://ad.hockeycurve.com/clk.php?redirect="+encodeURIComponent(url)+"&tracking="+encodeURIComponent(target)+"&stats="+encodeURIComponent(json[`stats`])+"&token_id="+encodeURIComponent(json[`token_id`])}

function my1(thisurl) {
 event.preventDefault();event.stopPropagation();
    var target = json[`click_macro`];
    url=thisurl
    if(target){
        url = "https://ad.hockeycurve.com/clk.php?redirect="+encodeURIComponent(url)+"&tracking="+encodeURIComponent(target)+"&stats="+encodeURIComponent(json[`stats`])+"&token_id="+encodeURIComponent(json[`token_id`]);
    }
 window.open(url,"_blank")
}
</script>
';
        $content_dt = $row_arr['finalcode'].$impressiontracker.$clicktracker;
        }
        else if($row_arr['clicks']!=""){
            $clicktracker='<script>

document.getElementById("clickurl").href = "'.$row_arr['clicks'].'";var elem = document.getElementsByTagName("a")[0];if(json["click_macro"]){elem.href = elem.href;var target = json["click_macro"];var url = elem.href;elem.href = "https://ad.hockeycurve.com/clk.php?redirect="+encodeURIComponent(url)+"&tracking="+encodeURIComponent(target)+"&stats="+encodeURIComponent(json[`stats`])+"&token_id="+encodeURIComponent(json[`token_id`])}

function my1(thisurl) {
 event.preventDefault();event.stopPropagation();
    var target = json[`click_macro`];
    url=thisurl
    if(target){
        url = "https://ad.hockeycurve.com/clk.php?redirect="+encodeURIComponent(url)+"&tracking="+encodeURIComponent(target)+"&stats="+encodeURIComponent(json[`stats`])+"&token_id="+encodeURIComponent(json[`token_id`]);
    }
 window.open(url,"_blank")
}

</script>

';
        $content_dt = $row_arr['finalcode'].$clicktracker;
        }
        else{
            $clicktracker='<script>
            if(document.querySelector("#city_name") != null){
            var city=json["city"] || "'.$row['default_city'].'";
            document.getElementById("city_name").innerText=city;}
                var landing_page = "https://www.primevideo.com/";if(window.location.href.indexOf("lp0")!=-1){landing_page = window.location.href.split("lp0=")[1].split("&")[0];}
    
    var elem = document.getElementsByTagName("a")[0];
    if(json[`click_macro`]){
        elem.href = elem.href
        var target = json[`click_macro`];
        var url = landing_page;
        elem.href = "https://ad.hockeycurve.com/clk.php?redirect="+encodeURIComponent(url)+"&tracking="+encodeURIComponent(target)+"&stats="+encodeURIComponent(json[`stats`])+"&token_id="+encodeURIComponent(json[`token_id`]);}
            
            function my1(thisurl) {
            event.preventDefault();event.stopPropagation();
    var target = json[`click_macro`];
    url=thisurl
    if(target){
        url = "https://ad.hockeycurve.com/clk.php?redirect="+encodeURIComponent(url)+"&tracking="+encodeURIComponent(target)+"&stats="+encodeURIComponent(json[`stats`])+"&token_id="+encodeURIComponent(json[`token_id`]);
    }
 window.open(url,"_blank")
}
            
            </script>';
            $content_dt = $row_arr['finalcode'].$clicktracker;
        }
        
        $data_arr[$dim_dt] = $content_dt;
    }
        
    $postData = array(
        'client' => $client_dt,
        'category' => $fcat_dt,
        'concept' => 'popular',
        'data' => $data_arr
    );
    
    $abc = json_encode($postData);
    // Setup cURL
    $ch = curl_init($url);
    curl_setopt_array($ch, array(
        CURLOPT_POST => TRUE,
        CURLOPT_RETURNTRANSFER => TRUE,
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json'
        ),
        CURLOPT_POSTFIELDS => $abc
    ));

// Send the request
$response = curl_exec($ch);
header("location:../clicktest.php?id=" . $id);
}
?>

<script>
    var tll = new TimelineMax({ paused: true });
    tll
    .from('#userpop',0.4,{height:0,opacity:1,ease:Power3.easeNone})
    .addPause()



        
    
    
document.getElementById("uclk").addEventListener("click", function() {
    if(document.getElementById("userpop").style.display == "none"){
    document.getElementById("userpop").style.display = "block";
    tll.play(0);
    asa();
    }else if(document.getElementById("userpop").style.display == "block"){
    tll.reverse();
    setTimeout(function(){
    document.getElementById("userpop").style.display = "none";
}, 500);
    
    }
  
});


// function asa(){
//     setTimeout(function(){
// if(document.getElementById("userpop").style.display == "block"){
//     tll.reverse();
//     setTimeout(function(){
//     document.getElementById("userpop").style.display = "none";
// }, 500);
    
//     }
// }, 5000);
// }


 
</script>
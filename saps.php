<?php 

include "conn.php";
session_start();
if(!$_SESSION['email']){
  header("location: login.php");
}

$id=$_SESSION['id'];
$client_names = $_SESSION['client_nm'];
$username=$_SESSION['username'];
$fcat = $_SESSION['fcat'];

$sql_id = "SELECT * FROM `campaign_info` WHERE id='$id'";
$data_id=mysqli_query($connectDB,$sql_id);
if (mysqli_num_rows($data_id) > 0) {
    while($row_id=mysqli_fetch_assoc($data_id)){
        $update_camp_name = "updated";
    }
}
if(isset($_POST['submit'])){

$campaign_title=$_POST['campaign_title']; 
$campaign_name=$_POST['campaign_name'];
$client_name=$_SESSION['client_name'];
$campaign_start=$_POST['campaign_start'];
$campaign_end=$_POST['campaign_end'];
$adtag_type=$_POST['adtag_type'];
$publisher_name=$_POST['publisher_name'];
$dimsssss=$_POST['dim_value'];
$lp_type=$_POST['lp'];
$city_data=$_POST['city_data'];
$default_city=$_POST['default_city'];
$temp=$_POST['temp'];
$weather=$_POST['weather'];
$aqi=$_POST['aqi'];
$date=$_POST['date'];
$countdown = $_POST['count'];
$count_time = $_POST['count_time'];
$feed = $_POST['feed'];
$feed_url = $_POST['feed_url'];
// $dimns=$_POST['dimns'];
// $templates=$_POST['templates'];

        

$sql_creatcode = "SELECT * FROM `campaign_info` WHERE campaign_name='$campaign_name'";
            $data_creatcode=mysqli_query($connectDB,$sql_creatcode);




// Check if the campaign title already exists in the db
$sql_check_title = "SELECT * FROM `campaign_info` WHERE campaign_title='$campaign_title'";
$data_check_title = mysqli_query($connectDB,$sql_check_title);
if(mysqli_num_rows($data_check_title) > 0 && $_SESSION['title_change']!="true" && empty($id)){
// if(mysqli_num_rows($data_check_title) > 0){
    // $error_message = "Campaign title already exists. Please choose a different title.";
  echo "<span id='testbm' style='position:absolute;top:5vw;width:100%;text-align:center;color:red'>Campaign title already exists. Please choose a different title</span>";
}
else{
    if (mysqli_num_rows($data_creatcode) > 0 || $update_camp_name == "updated") {
    if(empty($id) ){
        
  	    echo "<span style='color:red;font-size:15px;position:absolute;top:208px;left:652px;'>Sorry... Folder name already taken</span>"; 	
    }
    else {
        if($_SESSION['creative_type'] == "update" || !empty($id)){
            if($adtag_type == "dcm"){
                $sql="UPDATE `campaign_info` SET campaign_start='$campaign_start',campaign_title='$campaign_title',campaign_end='$campaign_end',adtag_type='$adtag_type',publisher_name='$publisher_name',lp_type='',city_data='$city_data',default_city='$default_city',temp='$temp',weather='$weather',aqi='$aqi',crt_date='$date',countdown='$countdown',countdown_endtime='$count_time',feed='$feed',feed_url='$feed_url' WHERE id='$id'";
            }else{
                 $sql="UPDATE `campaign_info` SET campaign_start='$campaign_start',campaign_title='$campaign_title',campaign_end='$campaign_end',adtag_type='$adtag_type',publisher_name='$publisher_name',lp_type='$lp_type',city_data='$city_data',default_city='$default_city',temp='$temp',weather='$weather',aqi='$aqi',crt_date='$date',countdown='$countdown',countdown_endtime='$count_time',feed='$feed',feed_url='$feed_url' WHERE id='$id'";
            }
        $result=mysqli_query($connectDB,$sql);
            
        header("location:./template/index.php?id=$id");
        }
    }
  	}else {
  	    
  	    if ((strtotime($campaign_start)) > (strtotime($campaign_end)))
        {
            // echo "<h1 id='demo1' style='color:red;font-size:18px;position:absolute;top:237px;left:700px;'>Your end date should be greater than your start date.</h1>";
            
        }
        else if(strtotime($campaign_start)<strtotime("1 January 2023")){
  	        echo "<h1 id='demo' style='color:red;font-size:18px;position:absolute;top:237px;left:700px;'>Please check start date.</h1>";
  	    }
  	    
  	  
  	    
        else {
          $sql="INSERT INTO `campaign_info`(`campaign_title`,`campaign_start`,`campaign_end`,`campaign_name`,`adtag_type`,`publisher_name`,`client_name`,`lp_type`,`template`,`dimension`,`city_data`,`default_city`,`temp`,`weather`,`aqi`,`crt_date`,`countdown`,`countdown_endtime`,`feed`,`feed_url`) VALUES ('$campaign_title','$campaign_start','$campaign_end','$campaign_name','$adtag_type','$publisher_name','$client_name','$lp_type','$templates','$dimns','$city_data','$default_city','$temp','$weather','$aqi','$date','$countdown','$count_time','$feed','$feed_url')";
          $result=mysqli_query($connectDB,$sql);
          $sql17 = "SELECT MAX(id) as max_id FROM `campaign_info`";  
          $result17=mysqli_query($connectDB,$sql17);
          $row = $result17->fetch_assoc();
          $idd=$row['max_id'];
          if($dimns != ""){
              header("location:./uploadasset/creative.php?id=$idd");
          }else{
              
            header("location:./template/index.php?id=$idd");
          }
        }
          	}
    // $_SESSION['title_change']="false";    	
}
}













$sql_reverse="SELECT * FROM `campaign_info` WHERE id='$id'";
$data_reverse = mysqli_query($connectDB,$sql_reverse);
if (mysqli_num_rows($data_reverse) > 0){
    while($row_reverse=mysqli_fetch_assoc($data_reverse)){
        $camp_tl =  $row_reverse['campaign_title'];
        $camp_nm =  $row_reverse['campaign_name'];
        $pub_nm = $row_reverse['publisher_name'];
        $ad_ty = $row_reverse['adtag_type'];
        $cl_nm = $row_reverse['client_name'];
        $cmp_start = $row_reverse['campaign_start'];
        $cmp_end = $row_reverse['campaign_end'];
        $tmpll = $row_reverse['template'];
        $dimss = $row_reverse['dimension'];
        $cmp_email = $row_reverse['campaign_email'];
        $lp_type = $row_reverse['lp_type'];
        $citys= $row_reverse['city_data'];
        $default_citys= $row_reverse['default_city'];
        $temps= $row_reverse['temp'];
        $weather= $row_reverse['weather'];
        $aqi= $row_reverse['aqi'];
        $date_r= $row_reverse['crt_date'];
        $count_tf = $row_reverse['countdown'];
        $count_ed = $row_reverse['countdown_endtime'];        
        $feed = $row_reverse['feed'];
        $feed_ed = $row_reverse['feed_url'];
    }
}
  
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
  <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css">
 <link rel="stylesheet" href="style.css" />
    <style>
    
    @font-face {
        font-family: 'monB';
        src: url('https://hcurvecdn.com/fonts/Montserrat_Bol.woff2?v=3') format("truetype");
    }
    
    @font-face {
        font-family: 'monR';
        src: url('https://hcurvecdn.com/fonts/Montserrat_Reg.woff2?v=3') format("truetype");
    }
        .dropdown-menu{ max-height:250px; overflow:auto;margin-bottom:30px; }
        form{
            margin-left:50px;
            line-height:1;
        }
        
        .heading{
          text-align:center;
          margin-bottom:30px;
        }

        label{
  padding:20px;
        }
        
          .lpss{
  padding:11px;
        }

        .container{
          text-align:left;
          width:560px;
          position: absolute;
          top: 80px;
          font-family: 'monB';
          left: 40%;
        }
        
        #cemail{
          margin-left:110px;
        }
        
        .img {
        height: 15px;
        width: 15px;
        /* padding: 0px 10px 0px 10px; */
        margin: 4px 5px 5px 5px;
        cursor: pointer;
        vertical-align: middle;
    }
    
    .btn-danger{
    color: #fff;
    background-color: #d9534f;
    border-color: #d43f3a;
    position: absolute;
    top:10px;
    left:93%;
    text-align: center;
}

#track{
    padding:0;
    display:none;
    line-height:0.1;
    width:70%;
    margin-left:170px;
}

#submit_id{background: transparent;}
    
      
     .text01{
         display:none;
     }
      
     
     .outer { 
      position: relative;
    }

    .master{
        position:relative;
    }
    
    .heads{
       position:absolute; 
       top:0px;
       width: 100%;
       text-align: center;
    }
    
    .txt01{
      color:black;
      font-family: 'monB';
      font-size: 35px;
      position: relative;
      top: 10px;
      left: 5%;
    }
    
    /* .bg1 {*/
    /*  height: 170vh;*/
    /*  background-attachment: fixed;*/
    /*  background-repeat: no-repeat;*/
    /*  background-size: cover;*/
    /*  background-image: url("https://s.hcurvecdn.com/atest/mahesh/cam_info/assets/console-bg.png");*/
    /*}*/
     
    .logo1{
    width: 175px;
    position: absolute;
    top: 14px;
    left: 10px;
    }
    
    input{
        background-color:#e8e8e8;
        border-radius: 5px;
        border: none;
        padding:10px;
    }
    
    select{
       background-color:#e8e8e8;
        border-radius: 5px;
        border: none; 
        padding:10px;
    }
    
    
    .lists{
        list-style-type:none;
        font-family: 'monB';
        color:white;
        font-size:115%;
        padding: 0 0 56px;
        cursor: pointer;
    }
    
    .subbtn{
        width:150px;
    }
    
    .iconss{
        width:15%;
    }
    
#jstar:hover + .infotxt {
  display: inline-block;
}
.infotxt {
  display: none;
  position: fixed;
    background-color: black;
    color: white;
    padding: 5px;
    font-size: 11px;
    top: 106px;
}

#mstar:hover + .infotxt2 {
  display: inline-block;
}
.infotxt2 {
  display: none;
  position: fixed;
    background-color: black;
    color: white;
    padding: 5px;
    font-size: 11px;
    top: 315px;
}

             .sidebar li{
  padding: 33px 8px 6px 16px;
  text-decoration: none;
  font-size: 18px;
  color: #ffffff;
  display: block;
  pointer:cursor;
  font-family: 'monB';
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

    </style>
  <title>Campaign Info</title>
</head>
<body>
    
      <div class="logo">
<img style="width:282px" src="https://s.hcurvecdn.com/atest/pooja/updateanimation/logo3.png"> 
</div>      


<ul class="list-unstyled multi-steps">    
<div class="sidebar" style="font-family:bold;position:fixed;top: 0;left: 0;background-color: #0b4da1;width:300px;padding-top: 5.5em;height:100%;cursor:pointer;z-index:5">
    <div style="position: absolute;width: 300px;height: 70px;top: 97px;background-color: #84B7E3;z-index: -1;"></div>
  <li class="a"  id="updt_creat" ><img class="icon" src="https://s.hcurvecdn.com/atest/pooja/updateanimation/icons/Create-Icon.png">&nbsp;&nbsp;&nbsp;CREATE / UPDATE</li>
  <li class="a"  id="cam_inf" ><img class="icon" src="https://s.hcurvecdn.com/atest/pooja/updateanimation/icons/library-icon.png">&nbsp;&nbsp;&nbsp;LIBRARY</li>
  <li class="a"  id="upld_ast"><img class="icon" src="https://s.hcurvecdn.com/atest/pooja/updateanimation/icons/upload-icon.png">&nbsp;&nbsp;&nbsp;UPLOAD ASSETS</li>
  <li class="a" style="cursor:pointer;cursor: pointer;position: relative;z-index: 1;"><img class="icon" src="https://s.hcurvecdn.com/atest/pooja/updateanimation/icons/animation-icon.png">&nbsp;&nbsp;&nbsp;ANIMATION</li>

  
  <li class="a" style="cursor:pointer"><img class="icon" src="https://s.hcurvecdn.com/atest/pooja/updateanimation/icons/Ad-tag-testing.png">&nbsp;&nbsp;&nbsp;AD TAG / TESTING</li>
 <a href="logout.php" style="color:white;text-decoration:none"><li><img style="width:70%;" src="https://s.hcurvecdn.com/atest/mahesh/cam_info/assets/logout-cta.png"/></li></a>
</div>
  <div style="z-index: 10;position: fixed;top: 119px;left: 265px;"><img style="height: 346px;" class="probar" src="https://hcurvecdn.com/atest/pooja/updateanimation/progressbar.png">
<img style="height: 15px;position: absolute;top: 3px;left: 3px;" class="probardot" src="https://hcurvecdn.com/atest/pooja/updateanimation/progressbarselection.png"></div>
  </ul>


 <div style="position:fixed;right:6em;white-space: nowrap;font-size: 1.5em;font-family: bold;z-index:99;top:5%;">
    <div style="display: inline-block;margin-top:10%;margin-right: 19%;font-family: 'monB';text-transform: capitalize;"><?php echo $_SESSION['username'] ?></div>
    <img style="position:fixed;width:3%" src="https://s.hcurvecdn.com/atest/pooja/updateanimation/UserProfile-Icon.png" />
   </div>
    
   <div class="master">
       <div class="bg1"></div>
       <span id="warn1" style="display:none;position:absolute;color:red;top:22%;left:45%;">Your end date should be greater than your start date.</span>
       <div class="heads">
           <span class="txt01">Campaign Information Form</span>
          
           </div>
           
           <form action="" method="post">
      <div class="container">
          <label for="campaign_title">Enter Campaign title: </label> <input id="input3" class="campaign_title" name="campaign_title" placeholder="enter title" type="text" id="input4" required onkeyup="specialcharectername();"><span style="width:300px;"><img src="https://publisherplex.io/selfserve/info.png" class="img" id="jstar"/><span class="infotxt">Please Enter the title you want to use for your campaign.</span><br>
      
        <label style="display:none;padding:0;" for="campaign_name">Enter Campaign name: </label> <input style="display:none;padding:0;" id="input1" readonly class="campaign_name" name="campaign_name" placeholder="enter movie/show name" type="text" required>
        <label for="campaign_start">Enter Campaign start date: </label> <input class="campaign_start" id="dte" onchange="check()" name="campaign_start" type="date" required onkeydown="return false"><br><br>
         
        <label for="campaign_end">Enter Campaign end date: </label> <input class="campaign_end" id="dte1" onchange="check1()" name="campaign_end" type="date" required onkeydown="return false"><br><br>
        
        <script>
        
            document.getElementById("updt_creat").addEventListener("click",()=>{
        window.location = "../update_creative.php";
    })
  
    document.getElementById("upld_ast").addEventListener("click",()=>{
        window.location = "../uploadasset/creative.php?id=<?php echo $id; ?>";
    })
    
        function check(){
           var date=document.getElementById("dte").value;
           var year = date.split("-")[0];
           if(year==2023){
          
           }
        }
        
        function check1(){
       var strdate=document.getElementById("dte").value;
       var endate=document.getElementById("dte1").value;
       if(endate < strdate){
       console.log("end date is max")
       document.getElementById("warn1").style.display = "block";
       }else{
           document.getElementById("warn1").style.display = "none";
       }
      }
        
        </script>
        
        
        
        <label for="adtag_type" required>Choose adtag type: </label>
        <select onchange="tests()" id="adtag_type" class="adtag_type" name="adtag_type">
    <option value="dcm">DCM</option>
    <option value="dv360">DV360</option>
    <option value="dv360_dbmc">DV360+Dbmc</option>
    <option value="dfp">DFP</option>
    <option value="criteo">CRITEO</option>
    <option value="sports">Sports</option>
  </select><img src="https://publisherplex.io/selfserve/info.png"  id="mstar" class="img"/><span class="infotxt2">Where you want to put you AD-Tag ?</span>
  
  <div id="track">
    <label>What will be the tracker</label><br>
    <input type="radio" class="try" id="lp" name="lp" value="lp"><label class="lpss" for="lp">Landing Page URL</label><br>
    <input type="radio" class="try" id="utm" name="lp" value="utm"><label class="lpss" for="utm">Landing Page URL + UTM parameter</label><br>
    <input type="radio" class="try" id="imp" name="lp" value="imp"><label class="lpss" for="imp">Impression & clicks</label>
  </div>
    
    <div id="city_data">
    <label>City Data : </label>
    <input type="radio" class="geo testgeo" id="geo" name="city_data" value="geo"><label for="geo">geo</label>
    <input type="radio" class="geo testgeo" id="bcamp" name="city_data" value="bcamp"><label for="bcamp">bcamp</label>
    <input type="radio" class="geo" id="none" name="city_data" value="" checked><label for="none">none</label>
    <div id="def_city"></div>
  </div>
  
  <div id="temp_data" style="display:none">
    <label>Temperature : </label>
    <input type="radio" class="tmp" id="temp_yes" name="temp" value="true"><label for="temp_yes">Yes</label>
    <input type="radio" class="tmp" id="temp_no" name="temp" value="false" checked><label for="temp_no">No</label>
  </div>
  <div id="weather_data" style="display:none">
    <label>Weather : </label>
    <input type="radio" class="weather" id="weather_yes" name="weather" value="true"><label for="weather_yes">Yes</label>
    <input type="radio" class="weather" id="weather_no" name="weather" value="false" checked><label for="weather_no">No</label>
  </div>
  <div id="aqi_data" style="display:none">
    <label>AQI : </label>
    <input type="radio" class="aqi" id="aqi_yes" name="aqi" value="true"><label for="aqi_yes">Yes</label>
    <input type="radio" class="aqi" id="aqi_no" name="aqi" value="false" checked><label for="aqi_no">No</label>
  </div>
  <div id="date_data">
     <label>Time/Day/Date: </label>
    <input type="radio" class="crt_date" id="date_yes" name="date" value="true"><label for="date_yes">Yes</label>
    <input type="radio" class="crt_date" id="date_no" name="date" value="false" checked><label for="date_no">No</label>
  </div>
  
  <div id="count_data">
      <label>Countdown: </label>
    <input type="radio" class="count" id="count_yes" name="count" value="true"><label for="count_yes">Yes</label>
    <input type="radio" class="count" id="count_no" name="count" value="false" checked><label for="count_no">No</label>
    <div id="count_time_inp"></div>
  </div>
   <div id="feed_data">
      <label>Do you want create it with feed ?: </label>
    <input type="radio" class="feed" id="feed_yes" name="feed" value="true"><label for="feed_yes">Yes</label>
    <input type="radio" class="feed" id="feed_no" name="feed" value="false" checked><label for="feed_no">No</label>
    <div id="feed_url_inp"></div>
  </div>
    <label for="publisher_name">Enter publisher name: </label> <input id="input2"  class="publisher_name" onkeyup="specialcharecter();" name="publisher_name" placeholder="enter publisher name" type="text"><br><br>

<div id="table-data"></div>
<input type="hidden" id="dim_value" name="dim_value">
<div style="text-align:center;">
<button class="btn" id="submit_id" type="submit" name="submit"><img class="subbtn" src="https://s.hcurvecdn.com/atest/mahesh/cam_info/assets/cta.png"/></button>

</div>
</div> 
    </form>
        </div>
       
      </div>     
           
    <div class="main" style="text-align:center;">
        
   
    
    <!--<div style="position:absolute;">For page information please <a href="https://publisherplex.io/hcproduct/wiki/cam_info.html" target="_blank">click here</a></div>-->
    <span id="err" style="text-align:center;color:red;"></span>
    
    
    <!--<a href="update_creative.php" class="btn btn-primary" style="position: absolute;top: 1%;left: 20%;color:white;text-decoration:none">Back</a>-->
    </div>
    <script>
    
   
    
    setTimeout(()=>{
        if("<?php echo $$camp_nm ?>" != "" || "<?php echo $$camp_nm ?>" != null){
            document.getElementById("input1").value = "<?php echo $fcat; ?>"
        }
    },500)
    
    document.getElementById("updt_creat").addEventListener("click",()=>{
        window.location = "./update_creative.php";
    })
    
    document.querySelector(".campaign_title").value = "<?php echo $camp_tl;  ?>";
    document.querySelector(".campaign_name").value = "<?php echo $camp_nm;  ?>";
    document.querySelector(".publisher_name").value = "<?php echo $pub_nm;  ?>";
    document.querySelector(".campaign_start").value = "<?php echo $cmp_start;  ?>";
    document.querySelector(".campaign_end").value = "<?php echo $cmp_end;  ?>";
    if("<?php echo $ad_ty; ?>" != ""){
        document.querySelector('option[value='+"<?php echo $ad_ty; ?>"+']').selected = true
    }
    
    if("<?php echo $lp_type; ?>" != ""){
        var trk = document.querySelectorAll('.try');
        for(var tk = 0; tk<trk.length; tk++){
            
            if(trk[tk].value == "<?php echo $lp_type; ?>"){
              trk[tk].checked = true;
              document.getElementById("track").style.display = "block";
            }
        }
    }
    
    
    // City Data
    if("<?php echo $citys; ?>" != ""){
        var trk = document.querySelectorAll('.geo');
        for(var tk = 0; tk<trk.length; tk++){
            
            if(trk[tk].value == "<?php echo $citys; ?>"){
             trk[tk].checked = true;
            document.getElementById("def_city").innerHTML = "<input style='margin-left:100px' name='default_city' type='text' id='default_city' value='<?php echo $default_citys; ?>' placeholder='Enter default city' required />";
            
            document.getElementById("temp_data").style.display = "block";
            document.getElementById("weather_data").style.display = "block";
            document.getElementById("aqi_data").style.display = "block";
            }
        }
    }
    
    if("<?php echo $temps; ?>" == "true"){
        document.getElementById("temp_yes").checked =true;
    }else{
        document.getElementById("temp_no").checked =true;
    }
    if("<?php echo $weather; ?>" == "true"){
        document.getElementById("weather_yes").checked =true;
    }else{
        document.getElementById("weather_no").checked =true;
    }
    if("<?php echo $aqi; ?>" == "true"){
        document.getElementById("aqi_yes").checked =true;
    }else{
        document.getElementById("aqi_no").checked =true;
    }
    if("<?php echo $date_r; ?>" == "true"){
        document.getElementById("date_yes").checked =true;
    }else{
        document.getElementById("date_no").checked =true;
    }
    
var storearr = [];

document.getElementById("geo").addEventListener('click', function() {
    storearr = storearr.filter(item => item !== "geo");
    storearr.push("geo")
    console.log(storearr)
      if(storearr.length > 3){
    alert("warning : cannot select more than 3 elements")
    storearr = storearr.filter(item => item !== "geo");
     console.log(storearr);
    document.getElementById("none").checked = true
    }
})

document.getElementById("bcamp").addEventListener('click', function() {
    storearr = storearr.filter(item => item !== "geo");
    storearr.push("geo")
    console.log(storearr)
      if(storearr.length > 3){
    alert("warning : cannot select more than 3 elements")
    storearr = storearr.filter(item => item !== "geo");
     console.log(storearr);
    document.getElementById("none").checked = true
    }
})

document.getElementById("none").addEventListener('click', function() {
    storearr = storearr.filter(item =>  item !== "geo" && item !== "temp" && item !== "weat" && item !== "aqi")
     console.log(storearr);
      if(storearr.length > 3){
    alert("warning : cannot select more than 3 elements")
    }
})

document.getElementById("temp_yes").addEventListener('click', function() {
    storearr.push("temp")
    console.log(storearr)
      if(storearr.length > 3){
    alert("warning : cannot select more than 3 elements")
    storearr = storearr.filter(item => item !== "temp");
     console.log(storearr);
    document.getElementById("temp_no").checked = true
    }
})

document.getElementById("temp_no").addEventListener('click', function() {
    storearr = storearr.filter(item => item !== "temp");
     console.log(storearr);
      if(storearr.length > 3){
    alert("warning : cannot select more than 3 elements")
    }
})

document.getElementById("weather_yes").addEventListener('click', function() {
    storearr.push("weat")
    console.log(storearr)
       if(storearr.length > 3){
    alert("warning : cannot select more than 3 elements")
    storearr = storearr.filter(item => item !== "weat");
     console.log(storearr);
    document.getElementById("weather_no").checked = true
    }
})

document.getElementById("weather_no").addEventListener('click', function() {
    storearr = storearr.filter(item => item !== "weat");
     console.log(storearr);
      if(storearr.length > 3){
    alert("warning : cannot select more than 3 elements")
    }
})

document.getElementById("aqi_yes").addEventListener('click', function() {
    storearr.push("aqi")
    console.log(storearr)
      if(storearr.length > 3){
    alert("warning : cannot select more than 3 elements")
    storearr = storearr.filter(item => item !== "aqi");
     console.log(storearr);
    document.getElementById("aqi_no").checked = true
    }
})

document.getElementById("aqi_no").addEventListener('click', function() {
    storearr = storearr.filter(item => item !== "aqi");
     console.log(storearr);
      if(storearr.length > 3){
    alert("warning : cannot select more than 3 elements")
    }
})

document.getElementById("date_yes").addEventListener('click', function() {
    storearr.push("date")
    console.log(storearr)
     if(storearr.length > 3){
    alert("warning : cannot select more than 3 elements")
    storearr = storearr.filter(item => item !== "date");
     console.log(storearr);
    document.getElementById("date_no").checked = true
    }
})

document.getElementById("date_no").addEventListener('click', function() {
    storearr = storearr.filter(item => item !== "date");
     console.log(storearr);
      if(storearr.length > 3){
    alert("warning : cannot select more than 3 elements")
    }
})

document.getElementById("count_yes").addEventListener('click', function() {
    storearr.push("count")
    console.log(storearr)
     if(storearr.length > 3){
    alert("warning : cannot select more than 3 elements")
    storearr = storearr.filter(item => item !== "count");
     console.log(storearr);
    document.getElementById("count_no").checked = true
    }
})

document.getElementById("count_no").addEventListener('click', function() {
    storearr = storearr.filter(item => item !== "count");
     console.log(storearr);
      if(storearr.length > 3){
    alert("warning : cannot select more than 3 elements")
    }
})


  
  
    if("<?php echo $count_tf; ?>" == "true"){
        document.getElementById("count_yes").checked =true;
        document.getElementById("count_time_inp").innerHTML = '<label>Countdown en time: </label><input type="datetime-local" value="<?php echo $count_ed ; ?>" name="count_time" required id="countdown_endtime" />';
    }else{
        document.getElementById("count_no").checked =true;
        document.getElementById("count_time_inp").innerHTML = "";
    }
    
    if("<?php echo $feed; ?>" == "true"){
        document.getElementById("feed_yes").checked =true;
        document.getElementById("feed_url_inp").innerHTML = '<label>Enter feed csv file: </label><input type="text" value="<?php echo $feed_ed ; ?>" name="feed_url" required id="feed_url_sheet" />';
    }else{
        document.getElementById("feed_no").checked =true;
        document.getElementById("feed_url_inp").innerHTML = "";
    }

var city_input_data =  document.querySelectorAll("#city_data input[type='radio']")
city_input_data.forEach(el=>{
   el.addEventListener("click",()=>{
       if(el.checked){
           if(el.value == ""){
               document.getElementById("def_city").innerHTML = "";
                document.getElementById("temp_no").checked =true;
                document.getElementById("weather_no").checked =true;
              document.getElementById("aqi_no").checked =true;
              document.getElementById("temp_data").style.display = "none";
                   document.getElementById("weather_data").style.display = "none";
                   
                   document.getElementById("aqi_data").style.display = "none";
           }else{
               if("<?php echo $default_citys; ?>" != ""){
                   document.getElementById("temp_data").style.display = "block";
                   document.getElementById("weather_data").style.display = "block";
                   document.getElementById("aqi_data").style.display = "block";
                   if("<?php echo $temps ?>" == "true"){
                       document.getElementById("temp_yes").checked =true;
                   }else{
                       document.getElementById("temp_no").checked =true;
                   }
                   if("<?php echo $weather ?>" == "true"){
                       document.getElementById("weather_yes").checked =true;
                   }else{
                       document.getElementById("weather_no").checked =true;
                   }
                   if("<?php echo $aqi; ?>" == "true"){
                        document.getElementById("aqi_yes").checked =true;
                    }else{
                        document.getElementById("aqi_no").checked =true;
                    }
                    document.getElementById("def_city").innerHTML = "<input style='margin-left:100px' name='default_city' type='text' id='default_city' value='<?php echo $default_citys; ?>' placeholder='Enter default city' required />";
               }else{
                   document.getElementById("temp_data").style.display = "block";
                   document.getElementById("weather_data").style.display = "block";
                   document.getElementById("aqi_data").style.display = "block";
                   document.getElementById("def_city").innerHTML = "<input style='margin-left:100px' name='default_city' type='text' id='default_city' placeholder='Enter default city' required />";
               }
           }
        }
   })
})
    
    if("<?php echo $_SESSION['creative_type'] ?>" == "update"){
        document.querySelector(".campaign_name").readOnly = true;
    }
    
    
    var countdown_time =  document.querySelectorAll("#count_data input[type='radio']")
var count_time_inp = document.querySelector("#count_time_inp")
countdown_time.forEach(el => {
    el.addEventListener("click",(e)=>{
        if(e.target.checked == true){
            if(e.target.value == 'true'){
                if("<?php echo $count_ed ; ?>" != ""){
                    count_time_inp.innerHTML = '<label>Countdown en time: </label><input type="datetime-local" value="<?php echo $count_ed ; ?>" name="count_time" required id="countdown_endtime" />';
                }else{
                    count_time_inp.innerHTML = '<label>Countdown en time: </label><input type="datetime-local" name="count_time" required id="countdown_endtime" />';
                }
            }else{
                count_time_inp.innerHTML = "";
            }
        }
    })
})

    var feedData =  document.querySelectorAll("#feed_data input[type='radio']")
var feed_url_inp = document.querySelector("#feed_url_inp")
feedData.forEach(el => {
    el.addEventListener("click",(e)=>{
        if(e.target.checked == true){
            if(e.target.value == 'true'){
                if("<?php echo $feed_ed ; ?>" != ""){
                    feed_url_inp.innerHTML = '<label>Enter feed csv file: </label><input type="text" value="<?php echo $feed_ed ; ?>" name="feed_url" required id="feed_url_sheet" />';
                }else{
                    feed_url_inp.innerHTML = '<label>Enter feed csv file: </label><input type="text" placeholder="Enter CSV file" name="feed_url" required id="feed_url_sheet" />';
                }
            }else{
                feed_url_inp.innerHTML = "";
            }
        }
    })
})

function tests(){
    var alpha = document.getElementById("adtag_type").value;
    if(alpha == "dv360" || alpha == "dv360_dbmc" || alpha == "dfp" || alpha == "criteo" || alpha == "sports"){
        document.getElementById("track").style.display = "block";
    }else if(alpha == "dcm"){
        document.getElementById("track").style.display = "none";
    }
}

document.querySelector(".campaign_name").addEventListener("keyup",(e)=>{
    if('<?php echo $update_camp_name ?>' == "updated"){
                e.target.value = "<?php echo $camp_nm;  ?>";
                document.getElementById("err").innerText = "Sorry cannot update campaign name";
            }else{
                    e.target.value = "<?php echo $fcat;  ?>";
                    document.getElementById("err").innerText = "Sorry cannot update campaign name";
            }
})


function specialcharecterspace() {
    
        var iChars = "!`@#$%^&*()+=[]\\';,./{}|\":<>?~ ";

        var data = document.getElementById("input1").value;
        var data2 = document.getElementById("input2").value;

        for (var i = 0; i < data.length; i++) {
          if (iChars.indexOf(data.charAt(i)) != -1) {
            alert("Your string has special characters.These are not allowed.");

            document.getElementById("input3").value = "";

            return false;
          }
        }
        for (var i = 0; i < data2.length; i++) {
          if (iChars.indexOf(data2.charAt(i)) != -1) {
            alert("Your string has special characters.These are not allowed.");

            document.getElementById("input2").value = "";

            return false;
          }
        }
      }
      
function specialcharecter() {
    
        var iChars = "!`@#$%^&*()+=[]\\';,./{}|\":<>?~";

        var data = document.getElementById("input1").value;
        var data2 = document.getElementById("input2").value;

        for (var i = 0; i < data.length; i++) {
          if (iChars.indexOf(data.charAt(i)) != -1) {
            alert("Your string has special characters.These are not allowed.");

            document.getElementById("input3").value = "";

            return false;
          }
        }
        for (var i = 0; i < data2.length; i++) {
          if (iChars.indexOf(data2.charAt(i)) != -1) {
            alert("Your string has special characters.These are not allowed.");

            document.getElementById("input2").value = "";

            return false;
          }
        }
      }
      
      function specialcharectername() {
    
        var iChars = "!`@#$%^&*()+=[]\\';,/{}|\":<>?~";


        var data4 = document.getElementById("input3").value;

        for (var i = 0; i < data4.length; i++) {
          if (iChars.indexOf(data4.charAt(i)) != -1) {
            alert("Your string has special characters.These are not allowed.");

            document.getElementById("input3").value = "";

            return false;
          }
        }
      }
      
    

    
    </script>
    
    <script>
      var testbm = "<?php echo  $update_camp_name ?>";
       if(testbm == "updated"){
           document.getElementById("testbm").remove();
       }
        
    </script>
    
</body>
</html>
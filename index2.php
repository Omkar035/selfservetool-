
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

$replica = $_SESSION['campaign_name_rep'];

$sql_id = "SELECT * FROM `campaign_info` WHERE id='$id'";
$data_id=mysqli_query($connectDB,$sql_id);
if (mysqli_num_rows($data_id) > 0) {
    while($row_id=mysqli_fetch_assoc($data_id)){
        $update_camp_name = "updated";
    }
}
echo $_SESSION['creative_type']; 
echo $_SESSION['campaign_name_rep'];
echo $fcat;
echo $id;
if($_SESSION['creative_type']=="replica"){
    $repcn=$_SESSION['campaign_name_rep'];
    $sql_reverse="SELECT * FROM `campaign_info` WHERE campaign_name='$repcn'";
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
        $templater=$row_reverse['template'];
        $dimensionr=$row_reverse['dimension'];
        $click_test=explode(",",$dimensionr);
        if(count($click_test)==1){
            $click=0;
        }else{
            $click=0;
            for($nodim=1;$nodim<count($click_test);$nodim++){
            $click.=",0";
        }
        }
        
    }
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
// $dimns=$_POST['dimns'];
// $templates=$_POST['templates'];

        

$sql_creatcode = "SELECT * FROM `campaign_info` WHERE campaign_name='$campaign_name'";
            $data_creatcode=mysqli_query($connectDB,$sql_creatcode);

if($_SESSION['creative_type']=="replica"){
  	      
          $sql="INSERT INTO `campaign_info`(`campaign_title`,`campaign_start`,`campaign_end`,`campaign_name`,`adtag_type`,`publisher_name`,`client_name`,`lp_type`,`template`,`dimension`,`city_data`,`default_city`,`temp`,`weather`,`aqi`,`click_test`,`replica`) VALUES ('$campaign_title','$campaign_start','$campaign_end','$fcat','$adtag_type','$publisher_name','$client_name','$lp_type','$templater','$dimensionr','$city_data','$default_city','$temp','$weather','$aqi','$click','$replica')";
          $result=mysqli_query($connectDB,$sql);
          $sql17 = "SELECT MAX(id) as max_id FROM `campaign_info`";  
          $result17=mysqli_query($connectDB,$sql17);
          $row = $result17->fetch_assoc();
          $idd=$row['max_id'];
          
          
              
            header("location:./template/index.php?id=$idd");
          
        
          	
}
else if (mysqli_num_rows($data_creatcode) > 0 || $update_camp_name == "updated") {
    if(empty($id)){
  	    echo "<span style='color:red;font-size:15px;position:absolute;top:208px;left:652px;'>Sorry... Folder name already taken</span>"; 	
    }else {
        if($_SESSION['creative_type'] == "update" || !empty($id)){
            if($adtag_type == "dcm"){
                $sql="UPDATE `campaign_info` SET campaign_start='$campaign_start',campaign_title='$campaign_title',campaign_end='$campaign_end',adtag_type='$adtag_type',publisher_name='$publisher_name',lp_type='',city_data='$city_data',default_city='$default_city',temp='$temp',weather='$weather',aqi='$aqi' WHERE id='$id'";
            }else{
                 $sql="UPDATE `campaign_info` SET campaign_start='$campaign_start',campaign_title='$campaign_title',campaign_end='$campaign_end',adtag_type='$adtag_type',publisher_name='$publisher_name',lp_type='$lp_type',city_data='$city_data',default_city='$default_city',temp='$temp',weather='$weather',aqi='$aqi' WHERE id='$id'";
            }
        $result=mysqli_query($connectDB,$sql);
            
        header("location:./template/index.php?id=$id");
        }
    }
  	}
  	
  	else {
  	      if ((strtotime($campaign_start)) > (strtotime($campaign_end)))
        {
            Echo "<h1 style='color:red;font-size:18px;position:absolute;top:218px;left:700px;'>Please check end date.</h1>";
        }
        else {
          $sql="INSERT INTO `campaign_info`(`campaign_title`,`campaign_start`,`campaign_end`,`campaign_name`,`adtag_type`,`publisher_name`,`client_name`,`lp_type`,`template`,`dimension`,`city_data`,`default_city`,`temp`,`weather`,`aqi`,`click_test`) VALUES ('$campaign_title','$campaign_start','$campaign_end','$campaign_name','$adtag_type','$publisher_name','$client_name','$lp_type','$templater','$dimensionr','$city_data','$default_city','$temp','$weather','$aqi','$click')";
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




}
if($_SESSION['creative_type']=="update"){
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
    }
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

        .container{
          text-align:left;
          width:460px;
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
[data-title]:hover:after {
        opacity: 1;
        transition: all 0.1s ease 0.5s;
        visibility: visible;
      }
      [data-title]:after {
        content: attr(data-title);
        position: absolute;
        bottom: -1.6em;
        left: 100%;
        padding: 4px 4px 4px 8px;
        color: #666;
        white-space: nowrap;
        -moz-border-radius: 5px;
        -webkit-border-radius: 5px;
        border-radius: 5px;
        -moz-box-shadow: 0px 0px 4px #666;
        -webkit-box-shadow: 0px 0px 4px #666;
        box-shadow: 0px 0px 4px #666;
        background-image: -moz-linear-gradient(top, #f0eded, #bfbdbd);
        background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0, #f0eded), color-stop(1, #bfbdbd));
        background-image: -webkit-linear-gradient(top, #f0eded, #bfbdbd);
        background-image: -moz-linear-gradient(top, #f0eded, #bfbdbd);
        background-image: -ms-linear-gradient(top, #f0eded, #bfbdbd);
        background-image: -o-linear-gradient(top, #f0eded, #bfbdbd);
        opacity: 0;
        z-index: 99999;
        visibility: hidden;
      }
      [data-title] {
        position: relative;
      }
    </style>
  <title>Campaign Info</title>
</head>
<body>
    <div class="main" style="text-align:center;">
   <ul class="list-unstyled multi-steps">
    <li style="cursor:pointer;" id="updt_creat">Update Creative</li>
    <li class="is-active">Campaign information</li>
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
    <li>Previews/Adtags</li>
  </ul>
    <h1 class="heading">Campaign Information</h1>
    <span id="err" style="text-align:center;color:red;"></span>
    <form action="" method="post">
      <div class="container">
          <label for="campaign_title">Enter Campaign title: </label> <input id="input3" class="campaign_title" name="campaign_title" placeholder="enter title" type="text" required onkeyup="specialcharecter();"><span style="width:300px;"><img src="https://publisherplex.io/selfserve/info.png" class="img" id="j" data-title="Please Enter the title you want to use for your campaign."/></span><br>
        <label style="display:none;padding:0;" for="campaign_name">Enter Campaign name: </label> <input style="display:none;padding:0;" id="input1" readonly class="campaign_name" name="campaign_name" placeholder="enter movie/show name" type="text" required>
        <label for="campaign_start">Enter Campaign start date: </label> <input class="campaign_start" name="campaign_start" type="date" required><br><br>
        <label for="campaign_end">Enter Campaign end date: </label> <input class="campaign_end" name="campaign_end" type="date" required><br><br>
        <label for="adtag_type" required>Choose adtag type: </label>
        <select onchange="tests()" id="adtag_type" class="adtag_type" name="adtag_type">
    <option value="dcm">DCM</option>
    <option value="dv360">DV360</option>
    <option value="dv360_dbmc">DV360+Dbmc</option>
    <option value="dfp">DFP</option>
    <option value="criteo">CRITEO</option>
    <option value="sports">Sports</option>
  </select><span><img src="https://publisherplex.io/selfserve/info.png" class="img" title="Where you want to put you AD-Tag ?"/></span>
  
  <div id="track">
    <label>What will be the tracker</label><br>
    <input type="radio" class="try" id="lp" name="lp" value="lp"><label for="lp">Landing Page URL</label><br>
    <input type="radio" class="try" id="utm" name="lp" value="utm"><label for="utm">Landing Page URL + UTM parameter</label><br>
    <input type="radio" class="try" id="imp" name="lp" value="imp"><label for="imp">Impression & clicks</label>
  </div>
    
    <div id="city_data">
    <label>City Data : </label>
    <input type="radio" class="geo" id="geo" name="city_data" value="geo"><label for="geo">geo</label>
    <input type="radio" class="geo" id="bcamp" name="city_data" value="bcamp"><label for="bcamp">bcamp</label>
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
    <label for="publisher_name">Enter publisher name: </label> <input id="input2"  class="publisher_name" onkeyup="specialcharecter();" name="publisher_name" placeholder="enter publisher name" type="text"><br><br>

<div id="table-data"></div>
<input type="hidden" id="dim_value" name="dim_value">
<div style="text-align:center;">
<button class="btn btn-success" id="submit_id" type="submit" name="submit">Submit</button>
</div>
</div> 
    </form>
    <button class="btn btn-danger"><a href="logout.php" style="color:white;text-decoration:none">logout</a></button>
    <a href="update_creative.php" class="btn btn-primary" style="position: absolute;top: 100px;left: 100px;color:white;text-decoration:none">Back</a>
    </div>
    <script>
    
    setTimeout(()=>{
        if("<?php echo $camp_nm ?>" != "" || "<?php echo $camp_nm ?>" != null){
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

            document.getElementById("input1").value = "";

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

            document.getElementById("input1").value = "";

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
      
    </script>
</body>
</html>
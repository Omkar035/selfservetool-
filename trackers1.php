<?php
ob_start();
session_start();
    if(!$_SESSION['email']){
      header("location: ./login.php");
    }
include "conn.php";
error_reporting(E_ERROR | E_PARSE);
$id = $_GET['id'];
if (isset($_POST['id'])) {
  $id = $_GET['id'];
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <title>Previews</title>
  <link rel="stylesheet" href="style.css" />
  <style>
    .container {
      margin-left: 100px;
    }

    .popup {
      height: 200px;
      width: 300px;
      position: fixed;
      top: 45%;
      left: 42%;
      color: black;
      font-weight: bold;
      border: 3px solid black;
      background: #b9ebff;
      text-align: center;
      justify-content: center;
    }

    .popup2 {
      height: 200px;
      width: 300px;
      position: fixed;
      top: 45%;
      left: 42%;
      border: 3px solid black;
      z-index: 10;
      background: #b9ebff;
      text-align: center;
      justify-content: center;
    }

    .btn1 {
      position: absolute;
      top: 68%;
      left: 10%;
      background-color: green;
      color: white;
      width: 110px;
      height: 33px
    }

    .btn2 {
      position: absolute;
      top: 68%;
      background-color: red;
      color: white;
      width: 110px;
      height: 33px
    }

    .btn3 {
      position: absolute;
      top: 50%;
      left: 26%;
      background-color: green;
      color: white;
      width: 140px;
      height: 33px
    }
 #arrow2{
    animation:copy forwards 3s 3;
    animation-delay: 0.5s;
    opacity: 0;
}
@keyframes copy {
  0%   {left: 32rem;opacity: 1;}
  50%  {left: 36rem;opacity: 1;}
  100% {left: 32rem;opacity: 1;}
  
} 

    .box1 {
      position: absolute;
      top: 75px;
      left: 115px;
      border: 2px solid grey;
      width: 1447px;
      height: 40px;
      display: flex;
      align-items: center;
    }
    /* #btn1saps {*/
    /*  position: absolute;*/
    /*  top: 68%;*/
    /*  left: 10%;*/
    /*  background-color:#5cb85c;*/
    /*  color: white;*/
    /*  width: 90px;*/
    /*  height: 33px;*/
    /*   border:none;*/
    /*  border-radius:5px;*/
    /*    font-size:15px;*/
    /*}*/
    
    input{
        border:none;
    }
    #btn1saps{
            border: none;
            outline: none;
            background: #5cb85c;
            color:white;
            padding: 10px 14px;
            cursor: pointer;
            border-radius: 5px;
            box-shadow: 0px 2px 6px rgba(0,0,0,0.4);
            transform: translate(0) scale(1);
            animation: popup 3s 5 ease-in-out;
        }
        td{
            padding:5px;
            font-size:1.5rem;
        }
        @keyframes popup{
            0%{
                transform: translate(0) scale(1);
            }
            25%{
                transform: translate(0) scale(1.2);
            }
            50%{
                transform: translate(0) scale(1);
            }
            100%{
                transform: translate(0) scale(1);
            }
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
.logoutLblPos{
   position:absolute;
   right:1em;
   top:1em;
}
@font-face {
        font-family: 'bold';
        src: url('https://s.hcurvecdn.com/fonts/Montserrat_Bol.woff2?v=3') format("truetype");
    }
    @font-face {
        font-family: 'sbold';
        src: url('https://s.hcurvecdn.com/fonts/NunitoSans-Bold.woff2?v=3') format("truetype");
    }
  </style>
</head>

<body>
<div class="logo">
<img style="width:282px" src="https://s.hcurvecdn.com/atest/pooja/updateanimation/logo3.png"> 
</div>      

<ul class="list-unstyled multi-steps">    
<div class="sidebar" style="font-family:bold;position:fixed;top: 0;left: 0;background-color: #0b4da1;width:300px;padding-top: 5.5em;height:100%;cursor:pointer;z-index:5">
    <div style="position: absolute;width: 300px;height: 70px;top: 420px;background-color: #84B7E3;"></div>
  <li class="a"  id="updt_creat" ><img class="icon" src="https://s.hcurvecdn.com/atest/pooja/updateanimation/icons/Create-Icon.png">&nbsp;&nbsp;&nbsp;CREATE / UPDATE</li>
  <li class="a"  id="cam_inf" ><img class="icon" src="https://s.hcurvecdn.com/atest/pooja/updateanimation/icons/library-icon.png">&nbsp;&nbsp;&nbsp;LIBRARY</li>
  <li class="a"  id="upld_ast"><img class="icon" src="https://s.hcurvecdn.com/atest/pooja/updateanimation/icons/upload-icon.png">&nbsp;&nbsp;&nbsp;UPLOAD ASSETS</li>
  <li class="a" style="cursor:pointer"><img class="icon" src="https://s.hcurvecdn.com/atest/pooja/updateanimation/icons/animation-icon.png">&nbsp;&nbsp;&nbsp;ANIMATION</li>
  <li class="a" style="cursor:pointer;cursor: pointer;position: relative;z-index: 1;"><img class="icon" src="https://s.hcurvecdn.com/atest/pooja/updateanimation/icons/Ad-tag-testing.png">&nbsp;&nbsp;&nbsp;AD TAG / TESTING</li>
  <li class="a bot" style="cursor:pointer;bottom: 10px;position: absolute;"><img class="icon"src="https://s.hcurvecdn.com/atest/pooja/updateanimation/icons/Setting.png">&nbsp;&nbsp;&nbsp;SETTING</li>
</div>
<div style="z-index: 10;position: fixed;top: 119px;left: 265px;"><img style="height: 346px;" class="probar" src="https://hcurvecdn.com/atest/pooja/updateanimation/progressbar.png">
<img style="height: 15px;position: absolute;top: 328px;left: 3px;" class="probardot" src="https://hcurvecdn.com/atest/pooja/updateanimation/progressbarselection.png"></div>
  </ul>
  <?php 
  $sql = "SELECT * FROM `campaign_info` WHERE id=$id LIMIT 1";
      $result = mysqli_query($connectDB, $sql);
      $row = mysqli_fetch_assoc($result);
  if($row["adtag_type"] != "dcm"){ ?>
     
  <div style="display:flex;justify-content: center;">
        
              <!--<button name="create" class="btn btn-success" style="position: absolute;top:235px;">Create Ad</button>-->
     <div style="position:absolute;color:#063970;font-size:1.5rem;width: 33rem;top: 17rem;left: 16rem;"><b>Hit same for all button to apply same landing url/impression tracker to all the dimensions <span style="position:absolute;font-size:3rem;top: 8px;left: 32rem;" id="arrow2">&rarr;</span></b></div> <button class="btn btn-primary" style="position: absolute;top:185px;" onclick="same()">Same for all</button> 
 </div>
  <?php } ?>

  <form method="POST">
    <div>
      <h2 style="text-align:center"><?php echo $row['campaign_title'] ?></h2>
      <h4 style="text-align:center">Adtag Type - <?php echo $row['adtag_type'] ?></h4>
      <?php 
      $camp = $row['campaign_name'];
      $dims = $row['dimension'];

      $str_arr = explode(",", $dims);
        
      ?>
      <?php
    
    // $i = 0;
    //       while ($i < count($str_arr)) {

    //  $i++;}
      ?>

      <button name="create" id="btn1saps" style="position: absolute;top:180px;left:877px">Create Ad</button> 

      
  
    </div>

    <div class="container" style="margin-top:20px;display:flex;margin-left: 40px;justify-content:center;">
      <table id="example" border="1px" style="margin-top:5rem;" >
          <thead>
            <tr>
                <th>Dimension</th>
                <?php 
                if($row["lp_type"]=="imp"){
                    ?> <th><span>Add Impression Tracker</span></th> <?php
                }
                if($row["lp_type"]=="imp"){
                    ?> <th><span>Add Click Tracker</span></th> <?php
                }
                else{
                     ?> <th><span>Add LP/UTM trackers </span></th> <?php
                }
                ?>
                
               
            </tr>
            
            </thead>
            <tbody>
          <?php
          
          $i = 0;
          while ($i < count($str_arr)) {
            $wh_dim = explode("x", $str_arr[$i]) ?>
            
                <tr>
                    <td>
              <div style="display: flex;
    align-items: center;"><?php echo $str_arr[$i] ?></div></td>
              
            
  <?php 
    if ($row["adtag_type"] == "dv360") { 
        if($row["lp_type"]=="lp"){
            ?>
            <td>
    <input name="land<?php echo $i ?>" id="lntk<?php echo $i ?>" type="text" placeholder="Add Landing page" value="" required>
     </td>
    <?php
        } else if($row["lp_type"]=="utm"){
            ?>
            <td>
    <input name="land<?php echo $i ?>" id="lntk<?php echo $i ?>" type="text" placeholder="Add Landing URL & UTM" value="" required>
     </td>
    <?php
        } else if($row["lp_type"]=="imp"){ ?> 

     
            
                <td><input name="impp<?php echo $i ?>" id="imtk<?php echo $i ?>" type="text" placeholder="Add Impression Tracker" value="" required></td>
                <td ><input name="clik<?php echo $i ?>" id="cltk<?php echo $i ?>" type="text" placeholder="Add Click Tracker" value="" required></td>
            </tr>


 

<?php }

     } ?>


  <?php
  if ($row["adtag_type"] == "dv360") {
    if($row["lp_type"]=="imp"){
   $sql5 = "SELECT * FROM `creativecode` WHERE `campaign` = '$camp' AND `dimension` = '$str_arr[$i]'";
                $result5 = mysqli_query($connectDB, $sql5);
                $row5 = mysqli_fetch_assoc($result5);
                $blue =  $row5['impressions']; 
                
                $sql6 = "SELECT * FROM `creativecode` WHERE `campaign` = '$camp' AND `dimension` = '$str_arr[$i]'";
                $result6 = mysqli_query($connectDB, $sql6);
                $row6 = mysqli_fetch_assoc($result6);
                $blue2 =  $row6['clicks']; 
                ?> 
                <script>
                    var asa = "<?php echo $blue ?>";
                document.getElementById('imtk<?php echo $i ?>').value = asa;
                var asa2 = "<?php echo $blue2 ?>";
                document.getElementById('cltk<?php echo $i ?>').value = asa2;
                </script>
                <?php
                }
      else if ($row["lp_type"]=="utm"||$row["lp_type"]=="lp") {
                    $sql6 = "SELECT * FROM `creativecode` WHERE `campaign` = '$camp' AND `dimension` = '$str_arr[$i]'";
                $result6 = mysqli_query($connectDB, $sql6);
                $row6 = mysqli_fetch_assoc($result6);
                $blue2 =  $row6['clicks']; 
                ?> 
                <script>
                var asa2 = "<?php echo $blue2 ?>";
                document.getElementById('lntk<?php echo $i ?>').value = asa2;
                </script>
                <?php
                }
  } 
                ?>
    
  
</div><?php
            $i++;
          }
        ?>
      </tbody></table></div>
        </form>
<script>
        $(document).ready(function () {
            $('td input').bind('paste', null, function (e) {
                $txt = $(this);
                setTimeout(function () {
                    var values = $txt.val().split(/\s+/);
                    var currentRowIndex = $txt.parent().parent().index();
                    var currentColIndex = $txt.parent().index(); 
                    
                    
                    var totalRows = $('#example tbody tr').length;
                    var totalCols = $('#example thead th').length;
                    var count =0;
                    for (var i = currentRowIndex; i < totalRows; i++) {
                        if (i != currentRowIndex)
                            if (i != currentRowIndex)
                                currentColIndex = 1;
                        for (var j = currentColIndex; j < totalCols; j++) {                           
                            var value = values[count];
                            var inp = $('#example tbody tr').eq(i).find('td').eq(j).find('input');
                            inp.val(value);
                            count++;
                           
                        }
                    }


                }, 0);
            });
        });
    </script>

<?php

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



 $sql1718 = "SELECT * FROM `creativecode` WHERE `campaign` = '$camp' AND `dimension` = '$str_arr[0]' AND `client`='$cli'";
                $result1718 = mysqli_query($connectDB, $sql1718);
                $row1718 = mysqli_fetch_assoc($result1718);
                $fcat1718 =  $row1718['filter']; 


$publisher_name=$row["publisher_name"];




    $data_arr = array();
if(isset($_POST['create'])){
    $present="no";
$adtagservername = "localhost";
$adtagusername = "publishe_cadmin";
$adtagpassword = "hc@admin";
$adtagdbname = 'publishe_hccampaign';
    
    
    $adtagconnectDB = mysqli_connect($adtagserrname,$adtagusername,$adtagpassword,$adtagdbname);
if (!$adtagconnectDB){
    die("Sorry we failed to connect: ". mysqli_connect_error());
}
 $sql17181 = "SELECT * FROM `adtagdata` WHERE `tool`='s'";
                $result17181 = mysqli_query($adtagconnectDB, $sql17181);
                while($row17181 = mysqli_fetch_assoc($result17181)){
                if($row17181['fcat']=="$fcat1718"){
                    $present="success";
                }
            }
                if($present=="success"){
                    $adtagsqlupdate="UPDATE `adtagdata` SET `date`='$adtagdate',`create_time`='$adtagcreate_time',`developer_name`='$adtagdeveloper_name',`adtag_type`='$adtag2',`geo`='$geo2',`campaign_name`='$campai',`master_client`='$cli',`client`='$cli',`fcat`='$fcat1718',`publisher`='$publisher_name',`dims`='$adtagdimensions',`status`='staging',`status_v`='staging' WHERE `tool` = 's' AND `fcat`='$fcat1718'";
    $adtagresultupdate=mysqli_query($adtagconnectDB,$adtagsqlupdate);
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
}</script>

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
header("location:clicktest.php?id=" . $id);
}

if ($row["lp_type"] == "imp"){?>
    <script>
        var lstr = <?php echo count($str_arr) ?>;
        for (var j = 0; j < lstr; j++) {
        document.getElementById("imtk"+j).addEventListener("change",(e)=>{
    try{
            
            var ssc = e.target.value.match(/SRC="([^">]+)/g);
            e.target.value = ssc[0].replace('SRC="',"");
    }catch(err){
        console.log(e.target.value)
    }
        
        })
        }
        
         function same(){

var imval = document.getElementById('imtk0').value;
var clval = document.getElementById('cltk0').value;

for (var p = 0; p < lstr; p++) {
    
    document.getElementById('imtk'+p).value = imval;
    document.getElementById('cltk'+p).value = clval;
    
}
}
    </script><?php
} else if ($row["lp_type"] == "utm" || $row["lp_type"] == "lp") {?>
<script>
    var lstr = <?php echo count($str_arr) ?>;
         function same(){
var lnval = document.getElementById('lntk0').value;
for (var p = 0; p < lstr; p++) {
    document.getElementById('lntk'+p).value = lnval;
}
}
</script><?php

}
?>


<script>
document.getElementById("updt_creat").addEventListener("click",()=>{
        window.location = "./update_creative.php";
    })
    document.getElementById("cam_inf").addEventListener("click",()=>{
        window.location = "./index.php";
    })
    document.getElementById("temp").addEventListener("click",()=>{
        window.location = "./template/index.php?id=<?php echo $id; ?>";
    })
    document.getElementById("upld_ast").addEventListener("click",()=>{
        window.location = "./uploadasset/creative.php?id=<?php echo $id; ?>";
    })
    document.getElementById("update_anim").addEventListener("click",()=>{
        window.location = "./update/update.php?id=<?php echo $id; ?>";
    })
</script>

<label class="logoutLblPos">
       <div style="position: absolute;right:4em;white-space: nowrap;top:0.6em;font-size: 1;font-size: 1.5em;font-family: bold;"><?php echo $_SESSION['username'] ?></div>
        <div>
        <a href="../logout.php"><img style="position: absolute;right:1.3em;width:50px" src="https://s.hcurvecdn.com/atest/pooja/updateanimation/UserProfile-Icon.png"></a>
       </div>
 </label>
</body>

</html>
<?php
ob_start();
session_start();

if(!$_SESSION['email']){
  header("location: ../login.php");
}
include "../conn.php";
error_reporting(E_ERROR | E_PARSE);
$id=$_GET['id'];
    if(isset($_POST['id'])) {
        $id=$_GET['id'];
    }
    
    $sqlar="SELECT * FROM `creativecode` WHERE id='$id'";
         $dataar=mysqli_query($connectDB,$sqlar);
         if(mysqli_num_rows($dataar)>0){
                        while($rowar=mysqli_fetch_assoc($dataar)){
                            $assetsar=$rowar['asset_used'];
                            $animation21=$rowar['animation'];
                            $dimension=$rowar['dimension'];
                            $sassetar=explode(",",$assetsar);
                            for ($a=0;$a<count($sassetar);$a++){
                                
                                $animat =$sassetar[$a]."-animation";
                                $dur=$sassetar[$a]."-durn";
                                $del=$sassetar[$a]."-delay";
                                $repd=$sassetar[$a]."-repeatd";
                                $rep=$sassetar[$a]."-repeat";
                                $opacity = $sassetar[$a]."-opc";
                                
                                $idd=$sassetar[$a].$dimension;
                                $erepeat=$_POST[$rep];
                                $durn=$_POST[$dur];
                                $edelay=$_POST[$del];
                                $erdelay=$_POST[$repd];
                                $opc = $_POST[$opacity];
                                
                                $arr=array($idd,$erepeat,$durn,$edelay,$erdelay,$opc,$dimension);
                                $arr2=array("idd","erepeat","durn","edelay","erdelay","opc","dim");
                                
                                $animation .= str_replace($arr2,$arr,$_POST[$animat]);
                                

                                $animationNew = "function dude(){".$animation."} dude()";
                               
if(isset($_POST['preview'])){
   
                                
                                if($rowar['animation']==""){
                                    $sqlms="UPDATE `creativecode` SET `animation`='$animationNew' WHERE id='$id'";
         $datams=mysqli_query($connectDB,$sqlms);
                                }
                                else{
                                    $sqlms="UPDATE `creativecode` SET `test_anim`='$animationNew' WHERE id='$id'";
         $datams=mysqli_query($connectDB,$sqlms);
                                }
                             
                            }
                                

if(isset($_POST['cancel'])){
                               $sqlms2="UPDATE `creativecode` SET `test_anim`='$animation21' WHERE id='$id'";
         $datams2=mysqli_query($connectDB,$sqlms2);
            
}

if(isset($_POST['save'])){
                                    
                                    $ani='<script id="script'.$dimension.'">'.$animationNew.'</script>';
                                    
                                    $final=$rowar['content'].$ani;
                                    $sqlms3="UPDATE `creativecode` SET `finalcode`='$final' WHERE id='$id'";
         $datams3=mysqli_query($connectDB,$sqlms3);
                               $sqlms2="UPDATE `creativecode` SET `test_anim`='$animationNew' WHERE id='$id'";
         $datams2=mysqli_query($connectDB,$sqlms2);
                                    $sqlms1="UPDATE `creativecode` SET `animation`='$animationNew' WHERE id='$id'";
         $datams1=mysqli_query($connectDB,$sqlms1);
                         
}                            }}
                            
}
if(isset($_POST['save'])){
    $sqllog="SELECT * FROM `creativecode` WHERE id='$id'";
         $datalog=mysqli_query($connectDB,$sqllog);
         $rowlog=mysqli_fetch_assoc($datalog);
         $campaign_nlog=$rowlog['campaign'];
     $sql2log="SELECT * FROM `campaign_info` WHERE campaign_name='$campaign_nlog'";
         $data2log=mysqli_query($connectDB,$sql2log);
         $row2log=mysqli_fetch_assoc($data2log);
         $adtag_type=$row2log['adtag_type'];
         
                 date_default_timezone_set('Asia/Kolkata');
$time = date('Y-m-d H:i:s');

$email=$_SESSION['email'];
$client=$_SESSION['client_name'];
$fcat=$_SESSION['fcat'];
                $log="INSERT INTO `log_file`(`client_name`, `email`, `adtag` ,`fcat`, `date_time`, `event`) VALUES ('$client','$email','$adtag_type','$fcat','$time','Save button clicked - Dimension:$dimension')";
                $result_log=mysqli_query($connectDB,$log);
}


if(isset($_POST['savetoanimlib'])){
         $sql18="SELECT * FROM `creativecode` WHERE id='$id'";
         $data18=mysqli_query($connectDB,$sql18);
         $row18=mysqli_fetch_assoc($data18);
         $client_anim=$row18['client'];
         $animation_name=$_POST['animation_name'];
         $animation_code=$_POST['animation_code'];
         $username_animation=$_SESSION['username'];
         
         
$sqlanimation="INSERT INTO `anim_lib`(`client`, `anim_name`, `code`, `username`) VALUES ('$client_anim','$animation_name','$animation_code','$username_animation')";
 $dataanimation=mysqli_query($connectDB,$sqlanimation);
                         
} 
if(isset($_POST['changeanim'])){
    $sql182="SELECT * FROM `creativecode` WHERE id='$id'";
         $data182=mysqli_query($connectDB,$sql182);
         $row182=mysqli_fetch_assoc($data182);
         $dimension1=$row182['dimension'];
         $changeanim=$_POST['animation-lib'];
         $finalpush=str_replace("dim",$dimension1,$changeanim);
         $updateanimlib="UPDATE `creativecode` SET `test_anim`='$finalpush' WHERE `id`='$id'";
         $updateanimlibpush=mysqli_query($connectDB,$updateanimlib);
} 

?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
  <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />
<link rel="stylesheet" href="styles.css">
</head>
<style>

.btn--shimmer{
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
    li {
        font-size: 1.5rem;
    }
    .items{
        width:200px;
    }
html{
    zoom: 70%;
}
    
#selectanimationform{
        position:absolute;
        top:112px;
        left:318px;
        font-size:1rem;
        z-index:100;
       font-family:med;
}
#changeanimbtn{
     position: absolute;
    left: 222px;
    top: 0px;
    width: 100px;
    height: 33px;
    }
    #tableform{
        margin-top:100px;
        display:inline-block;
    }

    #arrow2{
    animation:copy forwards 3s 3;
    animation-delay: 0.5s;
    opacity: 0;
}
@keyframes copy {
  0%   {top:-20px;left: -50px;opacity: 1;}
  50%  {top:-20px;left: -90px;opacity: 1;}
  100% {top:-20px;left: -50px;opacity: 1;}
  
} 
                       /* progress bar */
.multi-steps > li.is-active ~ li:before,
.multi-steps > li.is-active:before {
  content: counter(stepNum);
  font-family: inherit;
  font-weight: 700;
}
.multi-steps > li.is-active ~ li:after,
.multi-steps > li.is-active:after {
  background-color: #ededed;
}

.multi-steps {
  display: table;
  table-layout: fixed;
  width: 85%;
}
.multi-steps > li {
  counter-increment: stepNum;
  text-align: center;
  display: table-cell;
  position: relative;
  color: tomato;
}
.multi-steps > li:before {
  content: "";
  content: "✓;";
  content: "𐀃";
  content: "𐀄";
  content: "✓";
  display: block;
  margin: 0 auto 4px;
  background-color: #fff;
  width: 36px;
  height: 36px;
  line-height: 32px;
  text-align: center;
  font-weight: bold;
  border-width: 2px;
  border-style: solid;
  border-color: tomato;
  border-radius: 50%;
}
.multi-steps > li:after {
  content: "";
  height: 2px;
  width: 100%;
  background-color: tomato;
  position: absolute;
  top: 16px;
  left: 50%;
  z-index: -1;
}
.multi-steps > li:last-child:after {
  display: none;
}
.multi-steps > li.is-active:before {
  background-color: #fff;
  border-color: tomato;
}
.multi-steps > li.is-active ~ li {
  color: #808080;
}
.multi-steps > li.is-active ~ li:before {
  background-color: #ededed;
  border-color: #ededed;
}       
.table1 td a{
    text-decoration: none;
    cursor: pointer;
    color: black;
}

input{
    width:27px;
}

.sidebar li{
  padding: 33px 8px 6px 16px;
  text-decoration: none;
  font-size: 18px;
  color: #ffffff;
  display: block;
  pointer:cursor;
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
.infoimg{
    height: 15px;
    width: 15px;
    margin: 4px 5px 5px 5px;
    cursor: pointer;
    vertical-align: middle;
}
.infoimg:hover + .infotxt {
  display: inline-block;
}
.infotxt {
       display: none; 
    position: absolute;
    z-index: 2;
    background-color: black;
    color: white;
    padding: 4px;
    font-size: 11px;
    width: 145px;
    top: 8px;
}
.forrelative td div{
    position: relative;
}
@font-face {
        font-family: 'bold';
        src: url('https://s.hcurvecdn.com/fonts/Montserrat_Bold.ttf') format("truetype");
    }

   @font-face {
        font-family: 'smed';
        src: url('https://s.hcurvecdn.com/fonts/Montserrat-SemiBold.ttf') format("truetype");
    }
    @font-face {
        font-family: 'reg';
        src: url('https://s.hcurvecdn.com/fonts/Montserrat_Regular.ttf') format("truetype");
    }
    @font-face {
        font-family: 'light';
        src: url('https://s.hcurvecdn.com/fonts/Montserrat-Light.ttf') format("truetype");
    }
    
    @font-face {
        font-family: 'med';
        src: url('https://s.hcurvecdn.com/fonts/Montserrat-Medium.ttf') format("truetype");
}  

#mainalign{
   position: absolute;
    left: 314px;
    top: -19px;
}

.page_info {
    position: absolute;
    top: 100px;
    right: 100px;
    font-size: 22px;
    font-family: 'bold';
}

</style>
<body>
    <script>
        function popupstart(){
            document.getElementById("firstpopup").style.display="block";
            document.getElementById("mainmain").style.filter="blur(5px)";
        }
        
        function popupend(){
            document.getElementById("firstpopup").style.display="none";
            document.getElementById("mainmain").style.filter="blur(0px)";
            document.getElementById("first2popup").style.display="none";
            
        }
        
        function popup2start(){
            document.getElementById("firstpopup").style.display="none";
            document.getElementById("first2popup").style.display="block";
        }
        
    </script>
    
                                  
<div id="mainmain">
<div class="logo" id="logo">
<img style="width:282px" src="https://s.hcurvecdn.com/atest/pooja/updateanimation/logo3.png"> 
</div>   
<div id="text1" style="font-weight: bolder;font-size: 3em;font-family: bold;position: absolute;left:316px;top:51px;">Update<span style="color:#1c82e3;font-weight:bolder"> Animation</span></div>
<div class="logoutLblPos" id="logopos">
       <div style="position: absolute;right:4em;white-space: nowrap;top:0.6em;font-size: 1;font-size: 1.5em;font-family: bold;"><?php echo $_SESSION['username'] ?></div>
        <div>
       <img style="position: absolute;right:1.3em;width:50px" src="https://s.hcurvecdn.com/atest/pooja/icn/userprofile.png">
       </div>
    </div>
    <div class="page_info">Click to <a target="_blank" href="https://docs.google.com/document/d/1vxr_bj1h_IM6l1RsOpp-okwyY7Ssg1yiZLcm3osvDDY/edit">Know More</a></div>
     <form method='POST' id="selectanimationform" style="display: flex;justify-content: space-evenly;align-items: center;width: 560px;padding:8px;box-shadow:5px 5px 16px rgba(0,0,0,0.4);border-radius:12px;margin-top:3px;margin-left:-3px">
       <select id="animation-lib" name="animation-lib" style="width: 200px;font-size: 1.8rem;margin-top: 3px;margin-left: -338px;">
        <option value=''>Select from library</option>

                                <?php  
                                $sql181="SELECT * FROM `creativecode` WHERE id='$id'";
         $data181=mysqli_query($connectDB,$sql181);
         $row181=mysqli_fetch_assoc($data181);
         $client1=$row181['client'];
                                
                                $sql2111="SELECT * FROM `anim_lib` WHERE `client`='$client1'";
         $data2111=mysqli_query($connectDB,$sql2111);
                        while($row2111=mysqli_fetch_assoc($data2111)){
                            ?> <option value='<?php echo $row2111["code"] ?>'><?php echo $row2111['anim_name'] ?></option> <?php
                        }
                                  ?>
                                  </select>
                                  
        <button name="changeanim" class="btn btn-primary" id="changeanimbtn" style='background:#337ab7;margin-top: 7px;'>Apply</button><a onclick="popupstart()" style="position:absolute;left:340px;top:0px;margin-top: 7px;" class="btn btn-primary btn--shimmer" >Save Animation in Library</a><div style="position:absolute;color:#063970;font-size:1.5rem;width:280px;top:0px;left:640px;"><span style="position:absolute;font-size:4rem;" id="arrow2"></div>
                                  </form> <?php
     $sql1="SELECT * FROM `creativecode` WHERE id='$id'";
         $data1=mysqli_query($connectDB,$sql1);
         $row1=mysqli_fetch_assoc($data1);
         $campaign_n=$row1['campaign'];
     $sql2="SELECT * FROM `campaign_info` WHERE campaign_name='$campaign_n'";
         $data2=mysqli_query($connectDB,$sql2);
         $row2=mysqli_fetch_assoc($data2);
         $id2=$row2['id'];
    ?>
    <ul class="list-unstyled multi-steps">    
<div class="sidebar" style="font-family:bold;position:fixed;top: 0;left: 0;background-color: #0b4da1;width:300px;padding-top: 5.5em;height:100%;cursor:pointer;z-index:5">
    <div style="position: absolute;width: 300px;height: 70px;top: 425px;background-color: #84B7E3;"></div>
  <li class="a"  id="updt_creat" ><img class="icon" src="https://s.hcurvecdn.com/atest/pooja/updateanimation/icons/Create-Icon.png">&nbsp;&nbsp;&nbsp;CREATE / UPDATE</li>
  <li class="a"  id="cam_inf" ><img class="icon" style="width: 45px;" src="https://hcurvecdn.com/atest/pooja/updateanimation/caminfo.png">&nbsp;&nbsp;&nbsp;CAMPAIGN INFO</li>
  <li class="a"  id="lib_tem" ><img class="icon" src="https://s.hcurvecdn.com/atest/pooja/updateanimation/icons/library-icon.png">&nbsp;&nbsp;&nbsp;LIBRARY</li>
  <li class="a"  id="upld_ast"><img class="icon" src="https://s.hcurvecdn.com/atest/pooja/updateanimation/icons/upload-icon.png">&nbsp;&nbsp;&nbsp;UPLOAD ASSETS</li>
  <li class="a" style="cursor:pointer;cursor: pointer;position: relative;z-index: 1;"><img class="icon" src="https://s.hcurvecdn.com/atest/pooja/updateanimation/icons/animation-icon.png">&nbsp;&nbsp;&nbsp;ANIMATION</li>
  <?php 
  
        $sql21 = "SELECT * FROM `campaign_info` WHERE campaign_name='$campaign_n'";
        
        $data21 = mysqli_query($connectDB,$sql21);
        if(mysqli_num_rows($data21)>0){
            
    while($row2=mysqli_fetch_assoc($data21)){
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
<a href="../logout.php" style="color:white;text-decoration:none"><li class="a bot" style="cursor:pointer;bottom: 10px;position: absolute;"><img style="width:70%;" src="https://hcurvecdn.com/atest/pooja/updateanimation/logoutctanew.png"/></li></a>
</div>
 <?php 
        $sql23="SELECT * FROM `campaign_info` WHERE campaign_name='$campaign_n'";
        $data23=mysqli_query($connectDB,$sql23);
        if(mysqli_num_rows($data23)>0){
    while($row23=mysqli_fetch_assoc($data23)){
        $tdims=$row23['dimension'];
        $adtag_type=$row23['adtag_type'];
            if($adtag_type!="dcm"){  
                ?>
               <div style="z-index: 10;position: fixed;top: 119px;left: 265px;"><img style="height: 520px;" class="probar" src="https://hcurvecdn.com/atest/pooja/updateanimation/progressbar3.png">
<img style="height: 16px;position: absolute;top: 334px;left: 4px;" class="probardot" src="https://hcurvecdn.com/atest/pooja/updateanimation/progressbarselection.png"></div>
 
                <?php
             }else{
             ?>
                 <div style="z-index: 10;position: fixed;top: 119px;left: 265px;"><img style="height: 430px;" class="probar" src="https://s.hcurvecdn.com/atest/mahesh/cam_info/assets/progressbar2.png">
<img style="height: 15px;position: absolute;top: 332px;left: 3px;" class="probardot" src="https://hcurvecdn.com/atest/pooja/updateanimation/progressbarselection.png"></div>
             <?php
                 
             }
    }}
    ?>


    
  </ul>
  
  <?php 
        $sqlanim="SELECT * FROM `creativecode` WHERE id='$id'";
         $dataanim=mysqli_query($connectDB,$sqlanim);
         $rowanim=mysqli_fetch_assoc($dataanim);
         
         $animation=$rowanim['animation'];
         $final_animation=str_replace($dimension,"dim",$animation);
                          
  ?>
  
  
  
  
  <!--<a class="btn btn-danger" style="position:absolute;top:5px;right:5px;text-decoration:none;" href="../logout.php">logout</a>-->
  <!--<button onclick="window.location.href = '../';" style="position:absolute;top:100px;left:17px;font-size:1.2rem;padding:5px 10px;" class="btn btn-danger">Home</button>-->
<button onclick="window.location.href = './update.php?id=<?php echo $id2 ?>';" style="position: absolute;top: 19px;left: 318px;padding: 5px 10px;font-size: 1.2rem;width: 106px;font-family:med;z-index:1000" class="btn btn-primary btn--shimmer">Next</button>
   
   <div id="mainalign">
    <form method='POST' id="tableform">
        <br><br><br><br><br>
<table class='table1' id='table1' style='font-family:med'>
    <thead>
    <tr class="forrelative">
        <td>Assets</td>
        <td>Select Animation <div><img src="https://s.hcurvecdn.com/selfserve/icons/info.webp" class="infoimg"><span class="infotxt">Select the animation from the select box</span></div></td>
        <td>Opacity <div><img src="https://s.hcurvecdn.com/selfserve/icons/info.webp" class="infoimg"><span class="infotxt">If its set to 0 then it comes from 0 opacity</span></div></td>
        <td class='dn'>Duration <div><img src="https://s.hcurvecdn.com/selfserve/icons/info.webp" class="infoimg"><span class="infotxt">Total run time of animation</span></div></td>
        <td class='dy'>Delay <div><img src="https://s.hcurvecdn.com/selfserve/icons/info.webp" class="infoimg"><span class="infotxt">Animation will start after some delay</span></div></td>
        <!--<td class='ry'>Repeat Delay <div><img src="https://s.hcurvecdn.com/selfserve/icons/info.webp" class="infoimg"><span class="infotxt">Delay time between start and end of animation</span></div></td>-->
        <!--<td class='ar'>Animation Repeat Count <div><img src="https://s.hcurvecdn.com/selfserve/icons/info.webp" class="infoimg"><span class="infotxt">The number of times animation will repeat</span></div></td>-->
    </tr></thead><tbody>
    <?php
        $sql="SELECT * FROM `creativecode` WHERE id='$id'";
         $data=mysqli_query($connectDB,$sql);
         if(mysqli_num_rows($data)>0){
                        while($row=mysqli_fetch_assoc($data)){
                            $assets=$row['asset_used'];
                            $sasset=explode(",",$assets);
                            for ($i=0;$i<count($sasset);$i++){
                              ?> <tr> 
                              <td><?php echo $sasset[$i]; ?></td> 
                              <td>   
                                  <select id="<?php echo $sasset[$i]; ?>-animation" name="<?php echo $sasset[$i]; ?>-animation">

                                <?php  $sql2="SELECT * FROM `anim_repo2`";
         $data2=mysqli_query($connectDB,$sql2);
         if(mysqli_num_rows($data2)>0){
                        while($row2=mysqli_fetch_assoc($data2)){
                            ?> <option value='<?php echo $row2["anim"] ?>'><?php echo $row2['name'] ?></option> <?php
                        }}
                                  ?>
                                  </select>

                                  </td>
        <td><input id="<?php echo $sasset[$i]; ?>opc" type='text' name="<?php echo $sasset[$i]; ?>-opc" value='0' pattern='[0-1]' placeholder='Opacity' class='ropc'></td>
        <td><input id="<?php echo $sasset[$i]; ?>durn" name="<?php echo $sasset[$i]; ?>-durn" type='text' value='1'  placeholder='Duration' class='rdurn'></td>
        <td><input id="<?php echo $sasset[$i]; ?>delay" name="<?php echo $sasset[$i]; ?>-delay" type='text' value='1' placeholder='Delay' class='rdelay'></td>
        
        <?php
                            }}}?>
    
   </tbody>
    </table>
     
      <div id="align" class="align" style="position: relative;left: 0px;top:10px;font-family:med;">
  <button name='preview' id='preview1'  class="btn btn-primary" style='cursor:pointer;width:12rem;background:#337ab7;border:none'><span>Preview</span></button>
<button name='save' id='save1' class="btn btn-primary btn--shimmer" style='cursor:pointer;margin:0 10px;width:12rem;'><span>Save</span></button>
<span id="text1" style="display:none"></span>
<button name='cancel' id='cancel1' class="btn btn-danger" style='cursor:pointer;width:12rem;background:#337ab7;border:none'><span>Cancel</span></button>
</div>

     
    
    <br>
<!--<button name='preview' id='preview1'  class="btn btn-primary" style='cursor:pointer;'>Preview</button>-->
<!--<button name='save' id='save1' class="btn btn-success btn--shimmer" style='cursor:pointer;margin:0 10px;'>Save Animation</button>-->
<!--<span id="text1" style="display:none"></span>-->
<!--<button name='cancel' id='cancel1' class="btn btn-danger" style='cursor:pointer;'>Cancel</button> -->
<span style="display:block" class='txt_val' id='showvalue'></span>
</form>
</div>



<div style="position:relative;margin-top:30px;">
    <!--<script>-->
    <!--var array2=[];-->
    <!--</script>-->
    <?php
    
    $array2 = [];
$sqljs="SELECT * FROM `creativecode` WHERE id='$id'";
         $datajs=mysqli_query($connectDB,$sqljs);
while($rowjs=mysqli_fetch_assoc($datajs)){
    $dimens=$rowjs['dimension'];
    
    $anim='<script id="script'.$dimension.'">'.$rowjs['test_anim'].'</script>';
    $total=$rowjs['content'].$anim;
    
    // echo $rowjs['animation'];
    // echo $rowjs['test_anim'];
    $ram= $rowjs['test_anim'];
    $ram_anim = $rowjs['animation'];
$assetnum = explode('function', $ram);
$assets123=$rowjs['asset_used'];
                            
                            $sasset123=explode(",",$assets123);
                            
                            for ($i123=0;$i123<count($sasset123);$i123++){
                          
                            
                            
                            
                            
    for ($sal = 1; $sal < count($assetnum); $sal++) {

        $thodo = explode($dimens."_", $assetnum[$sal]);
        $assetpv = explode(' ', $thodo[0]);
        // echo $assetpv[$sal]; 

                            
                            
                              if(str_replace(" ","","$thodo[0]")==str_replace(" ","","$sasset123[$i123]")){
                                  
                                
                              
                              
      
        
        
        $thodojyada = explode('()', $thodo[1]);
        $peev = explode('repeat:', $assetnum[$sal]);
        $pv = explode(',', $peev[1]);

        $peev2 = explode('repeatDelay:', $assetnum[$sal]);
        $pv2 = explode(',', $peev2[1]);


        $peev3 = explode('opacity:', $assetnum[$sal]);
        $pv3 = explode(',', $peev3[1]);


        $peev4 = explode('  ', $assetnum[$sal]);
        $pv4 = explode('/', $peev4[1]);
        

        $peev5 = explode('delay:', $assetnum[$sal]);
        $pv5 = explode('}', $peev5[1]);
        
         $rp4 = $pv4[0];
         $rp5 = $pv5[0];
         $rp2 = $pv2[0];
        $rp = $pv[0];
        $rp3 = $pv3[0];
       
       ?> <script> 
       
       var smn = document.querySelector("tbody").children;
            var alltd = smn[<?php echo ($i123) ?>].querySelectorAll("td");

            for (let in2 = 0; in2 < alltd.length; in2++) {
                if (in2 == 1) {
                    alltd[in2].querySelectorAll("option").forEach((el) => {
                        if (el.innerText.toString() == "<?php echo $thodojyada[0]; ?>") {
                            el.setAttribute('selected', 'true');
                        }
                    })
                }
                if (in2 == 2) {
                    var intd = alltd[in2].querySelector("input").value = "<?php echo $rp3; ?>";

                }
                if (in2 == 3) {
                    var intd = alltd[in2].querySelector("input").value = "<?php echo $rp4; ?>";
                }
                if (in2 == 4) {
                    var intd = alltd[in2].querySelector("input").value = "<?php echo $rp5; ?>";
                }
                if (in2 == 5) {
                    var intd = alltd[in2].querySelector("input").value = "<?php echo $rp2; ?>";
                }
                if (in2 == 6) {
                    var intd = alltd[in2].querySelector("input").value = "<?php echo $rp; ?>";
                }
                // if (in2 == 7) {
                //     var intd = alltd[in2].querySelector("input").value = all;
                // }
                var dration = <?php echo $rp4; ?>;
                var dly = <?php echo $rp5; ?>;
                
                var all = dly + dration;
                

            }  
            
            // array2.push(all);
            
                
            
            
            
            
         
            </script> <?php
            $all = $rp5 + $rp4;
 
$pavansss = array_push($array2,$all);

   } } }
  
}
 ?>
 <!--<script>-->
     
 <!--    var equal = (Math.max(...array2) + 3)*1000;-->
 <!--    console.log(equal);-->
 <!--</script>-->
</div>
<div><?php echo ($pavansss); ?></div>
<div id="contentfinaldiv" style="position:absolute;top:18rem;left:96rem;width: 300px;height:300px;"><div id="aspect"><?php echo $total; ?></div></div></div>
   <div id="firstpopup" style="position:absolute;top:50%;left:50%;text-align:center;transform:translate(-50%,-50%);background-color:#fff;box-shadow: 0px 10px 15px -3px rgba(0,0,0,0.3);width:300px;height:300px;z-index:1000;display:none;border-radius:15px;">
      <div style="font-size: 1.5rem;margin-top: 30px;padding: 20px;color:#000;">Do you want to save the animation in the Animation library ?</div>
      
      <button class="btn btn-success btn--shimmer" style="font-size:1.5rem;margin-right:20px;margin-top:10px" onclick="popup2start()">Yes</button><button style="font-size:1.5rem;margin-left:20px;margin-top:10px" class="btn btn-danger" onclick="popupend()">No</button>
  </div>
  
  <div id="first2popup" style="position:absolute;top:50%;left:50%;text-align:center;transform:translate(-50%,-50%);background-color:#fff;box-shadow: 0px 10px 15px -3px rgba(0,0,0,0.3);width:300px;height:300px;z-index:1000;display:none;border-radius:15px;">
      <div style="font-size: 2rem;margin-top: 30px;padding: 20px;color:#000;">Please name the animation</div>
      <form method="POST">
          <input name="animation_name" type="text" style="display:inline;border:1px solid black;font-size:1.5rem;width:200px;" required>
          <input type="hidden" name="animation_code" value='<?php echo $final_animation ?>'><br>
          <button class="btn btn-success btn--shimmer" style="font-size:1.5rem;margin-right:20px;margin-top:30px" name="savetoanimlib">Save</button>
          <button style="font-size:1.5rem;margin-left:20px;margin-top:30px" class="btn btn-danger" onclick="popupend()">Cancel</button>
      </form>
      
  </div>
  <?php 
   
   $dimensionspl=explode("x",$dimens);
   $widthcre=$dimensionspl[0];
   $heightcre=$dimensionspl[1];
  ?>
  
<script>
var heightdim = <?php echo json_encode($heightcre) ?>;
  console.log(heightdim);
  var widthdim = <?php echo json_encode($widthcre) ?>;
  console.log(widthdim);
const div = document.getElementById('contentfinaldiv');
const img = document.getElementById('aspect');
// Calculate the ratio of the image size to the div size
const ratioWidth = <?php echo $widthcre ?>/ 300;
const ratioHeight =<?php echo $heightcre ?>/ 300;
const ratio = Math.max(ratioWidth, ratioHeight);
if (ratio > 1) {
    const scaleFactor = 1 / ratio;
    img.style.transform = `scale(${scaleFactor})`;
    img.style.position= "absolute";
    img.style.left= "0px";
  }
  
</script>
<script>
      $(document).ready(function () {
      $('td>select').selectize({
          sortField: 'text'
      });
  });
 
  </script>
<script>
document.getElementById("updt_creat").addEventListener("click",()=>{
        window.location = "../update_creative.php";
    })
     document.getElementById("cam_inf").addEventListener("click",()=>{
        window.location = "../index.php";
    })
    
    // document.getElementById("temp").addEventListener("click",()=>{
    //     window.location = "../template/index.php?id=<?php echo $_SESSION['id']; ?>";
    // })
    
    document.getElementById("upld_ast").addEventListener("click",()=>{
        window.location = "../uploadasset/creative.php?id=<?php echo $_SESSION['id']; ?>";
    })
</script>

</body>
</html>

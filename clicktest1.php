<?php
ob_start();
session_start();
if(!$_SESSION['email']){
  header("location: login.php");
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
  <meta name="viewport" content="width=device-width, initial-scale=0.6">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="style.css" />
  <title>Click Test</title>
  <style>
    .container {
      margin-left: 0px;
    }

    .popup {
      height: 240px;
      width: 340px;
      position: fixed;
      top: 35%;
      left: 40%;
      font-family: bold;
      border:1 solid black;
      background: white;
      text-align: center;
      justify-content: center;
      border-radius:5px;
      color:black;
      box-shadow: 0px 0px 10px  #779ecb;
    }

    .popup2 {
     height: 300px;
    width: 340px;
    position: fixed;
    top: 35%;
    left: 40%;
    font-family: bold;
    border: 1 solid black;
    background: white;
    text-align: center;
    justify-content: center;
    border-radius: 5px;
    color: black;
    box-shadow: 0px 0px 10px #779ecb;
    
    }

    .btn1 {
      position: absolute;
    top: 68%;
    left: 10%;
    background-color: #BFE27E;
    color: white;
    width: 110px;
    height: 40px;
    border: none;
    border-radius: 5px;
    font-size: 20px;
    }

    .btn2 {
      position: absolute;
    top: 68%;
    background-color: #FF0145;
    color: white;
    width: 110px;
    height: 40px;
    border: none;
    border-radius: 5px;
    right: 10%;
    font-size: 20px;
    }

    .btn-success {
    color: black;
    font-family:bold;
    background-color: #9ED501;
    border-radius: 10px;
    border-color: #9ED501;
}
    .box1 {
      position: absolute;
      top: 120px;
      left: 115px;
      /* border: 2px solid grey; */
      width: 1447px;
      height: 40px;
      display: flex;
      align-items: center;
    }
    .saps{
        margin-top:35px;
        padding:5px;
    }
     #btnsaps {padding: 10px;
    text-decoration: none;
    background-color: #0554AC;
    height: 30px;
    color: white;
    width: 216px;
    border-radius: 0px;
    border: 2px solid #0554AC;
    font-size: 17px;
    font-weight: 600;
    margin-top: 10px;
        }
        #arr{
    animation:copy forwards 3s 3;
    animation-delay: 0.5s;
    opacity: 0;
}
@keyframes copy {
  0%   {top:-20px;left: -50px;opacity: 1;}
  50%  {top:-20px;left: -90px;opacity: 1;}
  100% {top:-20px;left: -50px;opacity: 1;}
  
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
    
    .btn-primary {
    color: #fff;
    background-color: #0B4DA1;
    border-color: #0B4DA1;
}

.btn-danger {
    color: #fff;
    background-color: #FF0145;
    border-color: #FF0145;
}
  </style>
</head>

<body>
  <form method="POST">
    <div>
  <!--      <ul class="list-unstyled multi-steps">-->
  <!--  <li style="cursor:pointer;" id="updt_creat">Update Creative</li>-->
  <!--  <li style="cursor:pointer;" id="cam_inf">Campaign information</li>-->
  <!--  <li style="cursor:pointer;" id="temp">select template</li>-->
  <!--  <li style="cursor:pointer;" id="upld_ast">Upload assets</li>-->
  <!--  <li style="cursor:pointer;" id="update_anim">Update animation</li>-->
    
  <!--  <li class="is-active">Click Test</li>-->
  <!--  <li>Previews/Adtags</li>-->
  <!--</ul>-->
  
  <div class="logo">
<img style="width:282px" src="https://s.hcurvecdn.com/atest/pooja/updateanimation/logo3.png"> 
</div>      

<ul class="list-unstyled multi-steps">    
<div class="sidebar" style="font-family:bold;position:fixed;top: 0;left: 0;background-color: #0b4da1;width:300px;padding-top: 5.5em;height:100%;cursor:pointer;z-index:5">
    <?php 
        $sql2="SELECT * FROM `campaign_info` WHERE id='$id'";
        $data2=mysqli_query($connectDB,$sql2);
        if(mysqli_num_rows($data2)>0){
    while($row2=mysqli_fetch_assoc($data2)){
        $tdims=$row2['dimension'];
        $adtag_type=$row2['adtag_type'];
            if($adtag_type!="dcm"){  
                ?>
               <div style="position: absolute;width: 300px;height: 70px;top: 590px;background-color: #84B7E3;"></div>
                <?php
             }else{
             ?>
                 <div style="position: absolute;width: 300px;height: 70px;top: 505px;background-color: #84B7E3;"></div> <?php
                 
             }
    }}
    ?>
    
    
  <li class="a"  id="updt_creat" ><img class="icon" src="https://s.hcurvecdn.com/atest/pooja/updateanimation/icons/Create-Icon.png">&nbsp;&nbsp;&nbsp;CREATE / UPDATE</li>
  <li class="a"  id="cam_inf" ><img class="icon" style="width: 45px;" src="https://hcurvecdn.com/atest/pooja/updateanimation/caminfo.png">&nbsp;&nbsp;&nbsp;CAMPAIGN INFO</li>
  <li class="a"  id="lib_tem" ><img class="icon" src="https://s.hcurvecdn.com/atest/pooja/updateanimation/icons/library-icon.png">&nbsp;&nbsp;&nbsp;LIBRARY</li>
  <li class="a"  id="upld_ast"><img class="icon" src="https://s.hcurvecdn.com/atest/pooja/updateanimation/icons/upload-icon.png">&nbsp;&nbsp;&nbsp;UPLOAD ASSETS</li>
  <li class="a" id="anim_up" style="cursor:pointer;cursor: pointer;position: relative;z-index: 1;"><img class="icon" src="https://s.hcurvecdn.com/atest/pooja/updateanimation/icons/animation-icon.png">&nbsp;&nbsp;&nbsp;ANIMATION</li>
  <?php 
        $sql2="SELECT * FROM `campaign_info` WHERE id='$id'";
        $data2=mysqli_query($connectDB,$sql2);
        if(mysqli_num_rows($data2)>0){
    while($row2=mysqli_fetch_assoc($data2)){
        $tdims=$row2['dimension'];
        $adtag_type=$row2['adtag_type'];
            if($adtag_type!="dcm"){  
                ?>
               <li class="a" id="add_trk" style="cursor:pointer;"><img class="icon" style="width: 45px;" src="https://s.hcurvecdn.com/atest/mahesh/cam_info/assets/addtracker.png">&nbsp;&nbsp;&nbsp;ADD TRACKER</li>
 
                <?php
             }
    }}
    ?>
  
  <li class="a" style="cursor:pointer;position: relative;z-index: 1;"><img class="icon" style="width: 45px;" src="https://s.hcurvecdn.com/atest/pooja/icn/Ad-tag-testing.png">&nbsp;&nbsp;&nbsp;AD TAG / TESTING</li>
  <!--<li class="a bot" style="cursor:pointer;bottom: 10px;position: absolute;"><img class="icon"src="https://s.hcurvecdn.com/atest/pooja/updateanimation/icons/Setting.png">&nbsp;&nbsp;&nbsp;SETTING</li>-->
<a href="../selfserve/logout.php" style="color:white;text-decoration:none"><li class="a bot" style="cursor:pointer;bottom: 10px;position: absolute;"><img style="width:70%;" src="https://hcurvecdn.com/atest/pooja/updateanimation/logoutctanew.png"/></li></a>
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
               <div style="z-index: 10;position: fixed;top: 119px;left: 265px;"><img style="height: 520px;" class="probar" src="https://hcurvecdn.com/atest/pooja/updateanimation/progressbar3.png">
<img style="height: 16px;position: absolute;top: 500px;left: 4px;" class="probardot" src="https://hcurvecdn.com/atest/pooja/updateanimation/progressbarselection.png"></div>
 
                <?php
             }else{
             ?>
                 <div style="z-index: 10;position: fixed;top: 119px;left: 265px;"><img style="height: 430px;" class="probar" src="https://s.hcurvecdn.com/atest/mahesh/cam_info/assets/progressbar2.png">
<img style="height: 15px;position: absolute;top: 412px;left: 3px;" class="probardot" src="https://hcurvecdn.com/atest/pooja/updateanimation/progressbarselection.png"></div>
             <?php
                 
             }
    }}
    ?>


    
  </ul>
  <!--<a href="logout.php" class="btn btn-danger" style="position:absolute;top:5px;right:5px">Logout</a>-->
      <?php
      $sql = "SELECT * FROM `campaign_info` WHERE id=$id LIMIT 1";
      $result = mysqli_query($connectDB, $sql);
      $row = mysqli_fetch_assoc($result);
      $cmp_tl=$row['campaign_title'];
      ?>
      <h2 class="blurr" style="text-align: left;position: absolute;top: 30px;left: 350px;font-family:bold"><?php echo $row['campaign_title'] ?></h2>
      <!--<div class="box1">-->
      <!--  <div style="position: absolute;top: 7px;left: 419px;font-size: 17px;font-weight: bold;">This icon indicates "click test is done"</div>-->
      <!--  <div style="position:absolute;top:7px;left:812px;font-size: 17px;font-weight: bold;">This icon indicates "click test is pending"</div>-->
      <!--  <img id="green" style="position: absolute;top: 2px;left:377px;width: 30px;height: 30px;" src="./tick.webp">-->
      <!--  <img id="red" style="position:absolute;top:2px;left:773px;width:30px;height:30px" src="./cross.png">-->
        <!--<img id="icon" style="    position: absolute;top: 4px;right: 6px;width: 26px;height: 27px;" src="./icon.png">-->
      <!--</div>-->
<!--<div style="position:absolute;top: 226px;left: 660px;width: 100%;color:#D5082D;font-size:16px"><span style="position:absolute;font-size:39px;" id="arr" >&larr;</span>&nbsp;<b>Click on the AD to do the Click Test</b></div>-->



   
      <br><br>
      
      <?php  if($adtag_type!="dcm"){
                ?>
                <button class="btn btn-primary blurr" name="update_trackers" style="position: absolute;top:90px;left: 350px;font-size: 19px;font-family: bold;background: #1379d6;border: none;width: 185px;height: 40px;border-radius:10px">Update Trackers</button>
                <?php
            }else{
            ?>
            <button class="btn btn-primary blurr" style="position: absolute;top: 91px;left: 350px;font-size: 17px;font-family: bold;background: #1379d6;border: none;width: 185px;height: 40px;border-radius:10px">Update Animation</button>
            <?php
            }
            ?>
      <button name="retest" class="btn btn-primary blurr" style="position: absolute;top:90px;left: 540px;font-size: 19px;font-family: bold;background: #1379d6;border: none;width: 140px;height: 40px;border-radius:10px">Retest</button>
    </div>
    <br>
    <div class="container" style="position: relative;left: 325px;margin-bottom:20px;top:100px">
      
          <?php
          $dims = $row['dimension'];

          $str_arr = explode(",", $dims);
          $i = 0;
          while ($i < count($str_arr)) {
            $wh_dim = explode("x", $str_arr[$i]) ?>
            
            <div style="display: flex;" class="blurr">
              
              <div style="margin: 0px 10px;position: relative;left: 0px;" id='<?php echo $i ?>'>
                <?php
                $camp=$row['campaign_name'];
                $client=$row['client_name'];
                
                $sql_creatcode = "SELECT * FROM `creativecode` WHERE client='$client' AND campaign='$camp' AND dimension='$str_arr[$i]'";
            $data_creatcode=mysqli_query($connectDB,$sql_creatcode);
      $row1 = mysqli_fetch_assoc($data_creatcode);
                    if ($row["adtag_type"] == "dcm") {
                        if($row["city_data"]=="geo"){
                            ?><div class='hockeycurve-v1'>
                      <iframe id='main-ad-tag<?php echo $i ?>' frameborder='0' scrolling='no' width='<?php echo $wh_dim[0] ?>' height='<?php echo $wh_dim[1] ?>'></iframe>



                      <script type='text/javascript'>
                        var params = {
                          'client': '<?php echo $client ?>',
                          'fcat': '<?php echo $row1['filter'] ?>',
                          'ct0': '%c_esc',
                          'lp0': '%u',
                          'cb': '%n',
                          'dbmc': '<?php echo $row1['filter'] ?>'
                        }
                        var cs = '';
                        for (var p in params) {
                          cs += '&' + encodeURIComponent(p) + '=' + encodeURIComponent(params[p]);
                        }
                        var final_src = 'https://ad.hockeycurve.com/ad.php?zoneid=<?php echo $str_arr[$i] ?>&partner=dcm&hct=master&geo=true&optout=false' + cs
                        document.getElementById('main-ad-tag<?php echo $i ?>').src = final_src
                      </script><br>
</div>
                    <?php 
                            
                        }else if($row["city_data"]=="bcamp"){
                            ?><div class='hockeycurve-v1'>
                      <iframe id='main-ad-tag<?php echo $i ?>' frameborder='0' scrolling='no' width='<?php echo $wh_dim[0] ?>' height='<?php echo $wh_dim[1] ?>'></iframe>



                      <script type='text/javascript'>
                        var params = {
                          'client': '<?php echo $client ?>',
                          'fcat': '<?php echo $row1['filter'] ?>',
                          'ct0': '%c_esc',
                          'lp0': '%u',
                          'cb': '%n',
                          'dbmc': '<?php echo $row1['filter'] ?>'
                        }
                        var cs = '';
                        for (var p in params) {
                          cs += '&' + encodeURIComponent(p) + '=' + encodeURIComponent(params[p]);
                        }
                        var final_src = 'https://ad.hockeycurve.com/ad.php?zoneid=<?php echo $str_arr[$i] ?>&partner=dcm&hct=master&geo=bcamp&optout=false' + cs
                        document.getElementById('main-ad-tag<?php echo $i ?>').src = final_src
                      </script><br>
</div>
                    <?php 
                        }else{
                            ?><div class='hockeycurve-v1'>
                      <iframe id='main-ad-tag<?php echo $i ?>' frameborder='0' scrolling='no' width='<?php echo $wh_dim[0] ?>' height='<?php echo $wh_dim[1] ?>'></iframe>



                      <script type='text/javascript'>
                        var params = {
                          'client': '<?php echo $client ?>',
                          'fcat': '<?php echo $row1['filter'] ?>',
                          'ct0': '%c_esc',
                          'lp0': '%u',
                          'cb': '%n',
                          'dbmc': '<?php echo $row1['filter'] ?>'
                        }
                        var cs = '';
                        for (var p in params) {
                          cs += '&' + encodeURIComponent(p) + '=' + encodeURIComponent(params[p]);
                        }
                        var final_src = 'https://ad.hockeycurve.com/ad.php?zoneid=<?php echo $str_arr[$i] ?>&partner=dcm&hct=master&optout=false' + cs
                        document.getElementById('main-ad-tag<?php echo $i ?>').src = final_src
                      </script><br>
</div>
                    <?php 
                        }
                  } else if ($row["adtag_type"] == "dv360") { 
                        if($row["city_data"]=="geo"){
                            ?>
                      <iframe id='main-ad-tag<?php echo $i ?>' src='https://ad.hockeycurve.com/ad.php?zoneid=<?php echo $str_arr[$i] ?>&client=<?php echo $client ?>&fcat=<?php echo $row1['filter'] ?>&partner=dbm&hct=master&geo=true&optout=false&ct0=${CLICK_URL_ENC}&cb=${CACHEBUSTER}&dbmc=${CAMPAIGN_ID}' frameborder='0' scrolling='no' width='<?php echo $wh_dim[0] ?>' height='<?php echo $wh_dim[1] ?>'></iframe>
                    <?php
                        }else if($row["city_data"]=="bcamp"){
                            ?>
                      <iframe id='main-ad-tag<?php echo $i ?>' src='https://ad.hockeycurve.com/ad.php?zoneid=<?php echo $str_arr[$i] ?>&client=<?php echo $client ?>&fcat=<?php echo $row1['filter'] ?>&partner=dbm&hct=master&geo=bcamp&optout=false&ct0=${CLICK_URL_ENC}&cb=${CACHEBUSTER}&dbmc=${CAMPAIGN_ID}' frameborder='0' scrolling='no' width='<?php echo $wh_dim[0] ?>' height='<?php echo $wh_dim[1] ?>'></iframe>
                    <?php
                        }else{
                            ?>
                      <iframe id='main-ad-tag<?php echo $i ?>' src='https://ad.hockeycurve.com/ad.php?zoneid=<?php echo $str_arr[$i] ?>&client=<?php echo $client ?>&fcat=<?php echo $row1['filter'] ?>&partner=dbm&hct=master&optout=false&ct0=${CLICK_URL_ENC}&cb=${CACHEBUSTER}&dbmc=${CAMPAIGN_ID}' frameborder='0' scrolling='no' width='<?php echo $wh_dim[0] ?>' height='<?php echo $wh_dim[1] ?>'></iframe>
                    <?php
                        }
                  
                   }
                ?>
              </div>
              <div style="font-size: 20px;position: relative;left:10px;font-family:bold">Size - <?php echo $str_arr[$i] ?></div><br>
  </form>
  
  <div style="margin: 0px 20px;"><button id='tag<?php echo $i ?>' name='ctest<?php echo $i ?>' style="visibility: hidden;">Check</button></div>
  <div style="position: absolute;left:<?php echo  $wh_dim[0]+220 ?>px;"><?php $clk = $row['click_test'];

            $clk2 = explode(",", $clk);
            $cclk = count($clk2);
            $sclk = array_sum($clk2);

            if ($clk2[$i] == 0) {
      ?><img  height="30px" width="30px" src="https://hcurvecdn.com/atest/prathamesh/ui/clicktest/failed.png" alt=""> <?php
                                                                } else {
                                                                  ?><img  height="30px" width="30px" src="https://hcurvecdn.com/atest/prathamesh/ui/clicktest/success.png" alt=""> <?php
                                                                                                                            }


                                                                                                                              ?></div>
 <div style="margin: 0px 20px;position:relative;left:68px;"><?php $clk = $row['click_test'];

            $clk2 = explode(",", $clk);
            $cclk = count($clk2);
            $sclk = array_sum($clk2);

            if ($clk2[$i] == 0) {
      ?>
      
      <?php
      $str1 = $str_arr[$i];
      $var=explode("x",$str1);
      ?> 
      
    <!--  <div style="position: absolute;top:<?php echo $var[1]/2 ?>px;left: 0px;width: 300px;color:#D5082D;font-size:16px"><span style="position:absolute;font-size:39px;" id="arr">-->
    <!--←</span>&nbsp;<b>Click on the AD to do the Click Test</b></div>-->
    <?php
                                                                } ?></div>  
                                                                
                                                        

<!--<div style="position:absolute;top: 226px;left: 660px;width: 100%;color:#D5082D;font-size:16px"><span style="position:absolute;font-size:39px;" id="arr" >-->
<!--    &larr;</span>&nbsp;<b>Click on the AD to do the Click Test</b></div>-->



</div><br><br><br><?php
            $i++;
          }
        ?>



<?php
if (isset($_POST['update_trackers'])) {
header("location:trackers.php?id=" . $id);
}
for ($p = 0; $p < count($str_arr); $p++) {

  if (isset($_POST['ctest' . $p])) {
    $clk2[$p] = 1;
    $clk3 = implode(",", $clk2);
    $updateQuery2 = "UPDATE campaign_info SET click_test = '$clk3'  where id = $id";
    $executeQuery = mysqli_query($connectDB, $updateQuery2);
    header("location:clicktest1.php?id=" . $id);

    ob_end_flush();
  };
};

?>
<?php
if ($cclk == $sclk) {
?><div class="popup" style="">
    <h2 class="saps">Are You Satisfied With Your Landing Page?</h3>
    <button name="yes" class="btn1">Yes</button><button name="no" class="btn2">No</button>
  </div><?php
        if (isset($_POST['yes'])) {
           
        date_default_timezone_set('Asia/Kolkata');
$time = date('Y-m-d H:i:s');
$client = $_SESSION['client'];
$email = $_SESSION['email'];
$fcat = $_SESSION['fcat'];
                $log="INSERT INTO `log_file`(`client_name`, `email`, `date_time`, `event`,`fcat`,`adtag`) VALUES ('$client','$email','$time','Satisied Yes','$fcat','$adtag_type')";
                $result_log=mysqli_query($connectDB,$log);
        ?> <div class="popup2" style="">
      <h3 Style="font-size:30px;">Congratulations !</h3>
      <h6 Style="font-size:20px;">Your Creative Is Ready</h6>
      <a target="_blank" href="https://publisherplex.io/selfserve/adtags1.php?id=<?php echo $id?>" class="btn btn-success">Check AD-Tag</a><br><br>
      <a target="_blank" id="btnsaps" href="https://publisherplex.io/selfserve/previews1.php?id=<?php echo $id?>">See the creative Preview</a>
      <h6 Style="width: 250px;font-size: 15px;top: 25px;position: relative;margin: 0 auto;">Please enter Email-id to unlock the adtags and previews :-</h6><br><br>
     <form method="POST" onsubmit="return checkmail()"><input style="border-radius:5px;color:black" name="emailadd" type="email" id="kab" required>
      <button class="btn btn-primary" name='adtagbtn' >Mail to</button></form>
    </div><?php
        } else if (isset($_POST['no'])) {
           
        date_default_timezone_set('Asia/Kolkata');
$time = date('Y-m-d H:i:s');
$client = $_SESSION['client'];
$email = $_SESSION['email'];
$fcat = $_SESSION['fcat'];
                $log="INSERT INTO `log_file`(`client_name`, `email`, `date_time`, `event`,`fcat`,`adtag`) VALUES ('$client','$email','$time','Satisied No','$fcat','$adtag_type')";
                $result_log=mysqli_query($connectDB,$log);
          for ($p = 0; $p < count($str_arr); $p++) {
            $clk2[$p] = 0;
          };
          $clk3 = implode(",", $clk2);
          $updateQuery2 = "UPDATE campaign_info SET click_test = '$clk3'  where id = $id";
          $executeQuery = mysqli_query($connectDB, $updateQuery2);
          header("location:clicktest1.php?id=" . $id);

          ob_end_flush();
        };
      }
          ?>
</div>

<label class="logoutLblPos">
       <div style="position: absolute;right:4em;white-space: nowrap;top:0.6em;font-size: 1;font-size: 1.5em;font-family: bold;"><?php echo $_SESSION['username'] ?></div>
        <div>
        <a href="../logout.php"><img style="position: absolute;right:1.3em;width:50px" src="https://s.hcurvecdn.com/atest/pooja/updateanimation/UserProfile-Icon.png"></a>
       </div>
 </label>
 
 <div>
     <img id="greent" class="blurr" style="position: absolute;right: 0px;width: 230px;top:90px;" src="https://hcurvecdn.com/atest/prathamesh/ui/clicktest/succes-icon_1.png">
     <img id="redt" class="blurr" style="position: absolute;right: 0px;width: 230px;top:170px;" src="https://hcurvecdn.com/atest/prathamesh/ui/clicktest/failed-icon_1.png">
 </div>

<?php

if (isset($_POST['adtagbtn'])) {
   
        date_default_timezone_set('Asia/Kolkata');
        $time = date('Y-m-d H:i:s');
        $client = $_SESSION['client'];
        $email = $_SESSION['email'];
        $fcat = $_SESSION['fcat'];
                $log="INSERT INTO `log_file`(`client_name`, `email`, `date_time`, `event`,`fcat`,`adtag`) VALUES ('$client','$email','$time','Mail to','$fcat','$adtag_type')";
                $result_log=mysqli_query($connectDB,$log);
    $sqlemail="UPDATE `campaign_info` SET `mailto`='true' WHERE `id`='$id'";
    $updatemail=mysqli_query($connectDB,$sqlemail);
   
    $email=$_POST['emailadd'];
    ?><div class="popup" >
      <h3 Style="font-size:30px;">Mail Sent Successfully! </h3>
      
      <h6 Style="font-size:20px;">Want to create new ad ?</h6>
      <a href="./update_creative.php" name="createyes" style="margin-right:20px;font-size:18px;margin-top:20px;" class="btn btn-success">Yes</a><a href="./logout.php" style="margin-left:20px;font-size:18px;margin-top:20px;" class="btn btn-danger">No</a>
    </div><?php
   
  $to = "$email";
    $message = "Hello Team, <br> \r\n\r\n";

    $message .="PFB adtags and previews for " .  $cmp_tl . "<br><br> \r\n\r\n";
   
    $message .="Adtag - https://publisherplex.io/selfserve/adtags.php?id=".$id."<br><br> \r\n\r\n";
   
    $message .="Preview - https://publisherplex.io/selfserve/previews.php?id=".$id."<br><br> \r\n\r\n";
   
    $message .="Thanks and Regards <br>\r\n";
    $message .="Team Hockeycurve";
     $subject ="Testing -" . $cmp_tl;
    $header = "From:bizops@hockeycurve.com \r\n";
    $header .= "MIME-Version: 1.0\r\n";
                 $header .= "Content-type: text/html\r\n";

                     
                     $retval = mail ($to,$subject,$message,$header);
                    //  echo $header;
                     if( $retval == true ) {
                        // echo "Email was send successfully please close the window";
                        exit;
                     }else {
                        echo "Message could not be sent...";
                     }
                     
    header("location:https://publisherplex.io/selfserve/adtags.php?id=".$id);
}

if (isset($_POST['retest'])) {
  for ($p = 0; $p < count($str_arr); $p++) {
    $clk2[$p] = 0;
  };
  $clk3 = implode(",", $clk2);
  $updateQuery2 = "UPDATE campaign_info SET click_test = '$clk3'  where id = $id";
  $executeQuery = mysqli_query($connectDB, $updateQuery2);
  header("location:clicktest.php?id=" . $id);

  ob_end_flush();
};
?>

<script>

    
   
  
  var lstr = <?php echo count($str_arr) ?>;
  focus();
  const listener = addEventListener('blur', function() {
    iframe = document.activeElement.id;
    var click = iframe.split("-");
    
    if (click[0] === "main"){
    if (document.activeElement.id === iframe) {
      setTimeout(function clk() {
        document.getElementById(click[2]).click();
        
      }, 200);

    }}
    removeEventListener('blur', listener);
  });
  
  function checkmail (){
  var re = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;  
    if(!re.test(document.getElementById("kab").value))  
    {  
        alert("Error: Email Id entered is not Valid!");
        return false;
    } 
    re =/@/;
          if(!re.test(document.getElementById("kab").value)) 
    {
            alert("Error: Mail Id must Contain @");
            return false;
          }
    re = /[.]/;
          if(!re.test(document.getElementById("kab").value)) 
    {
            alert("Error: Email Id must Contain .");
            return false;
    }
  
  }
</script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.19.1/TweenMax.min.js"></script>
<script>
function tAnim() {
    var tl = new TimelineMax({ repeat:0,repeatDelay:0,delay:0.5 })
        tl.from("#greent",0.5,{x:-50,opacity:0,ease:Power0.easeIn});
        tl.from("#redt",0.5,{x:-50,opacity:0,ease:Power0.easeIn},"-=0.1");
}
tAnim()
    
</script>

<script>
var cclk = <?php echo $cclk  ?>;
var sclk = <?php echo $sclk  ?>;

if(cclk == sclk){
  var blurr =  document.getElementsByClassName("blurr");
  for(i=0;i<blurr.length;i++){
      blurr[i].style.filter = "blur(5px)"
  }
}



</script>

<script>
     document.getElementById("updt_creat").addEventListener("click",()=>{
        window.location = "../selfserve/update_creative.php";
    })
     document.getElementById("cam_inf").addEventListener("click",()=>{
        window.location = "../selfserve/index.php";
    })
  
    document.getElementById("upld_ast").addEventListener("click",()=>{
        window.location = "../selfserve/uploadasset/creative.php?id=<?php echo $id; ?>";
    })
    
    document.getElementById("lib_tem").addEventListener("click",()=>{
        window.location = "../selfserve/template/index.php?id=<?php echo $id; ?>";
    })
    
    document.getElementById("anim_up").addEventListener("click",()=>{
        window.location = "update/update.php?id=<?php echo $id; ?>";
    })
    
    <?php
         if($adtag_type!="dcm"){
             ?>
                 document.getElementById("add_trk").addEventListener("click",()=>{
                 window.location = "trackers.php?id=<?php echo $id; ?>";
                 })
             <?php
         }
    ?>
    
 </script>
</body>

</html>
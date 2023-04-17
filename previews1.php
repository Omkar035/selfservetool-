<?php
ob_start();
session_start();
$_SESSION['client_name'];
    if(!$_SESSION['email']){
      header("location: ../login.php");
    }
error_reporting(E_ERROR | E_PARSE);

include "conn.php";
$id=$_GET['id'];
if(isset($_POST['id'])) {
    $id=$_GET['id'];
}
$_SESSION['id']=$id;
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
  <style>
    #btn {
      margin-left: 25px;
    }
    
    .container{
        width: 82%;
    position: absolute;
    left: 320px;
    top: 160px;
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

<body style="font-family:bold">
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
  <div>
      <span id="crdate" style="position:absolute;left:310px;"></span>
      
    <?php 
      $sql="SELECT * FROM `campaign_info` WHERE id=$id LIMIT 1";
      $result=mysqli_query($connectDB,$sql);
      $row=mysqli_fetch_assoc($result);
    ?>
    <h2 style="position: absolute;left: 330px;top: 80px;"><span><?php echo $row['adtag_type']?> - </span><?php echo $row['campaign_title']?></h2>
    <br><br>
  </div>
  <br>
  <div class="container">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Dimension</th>
          <th>Previews</th>
          <th width="8%">Demo</th>
        </tr>
      </thead>
      <tbody>
        <?php 
          $dimensions=$row['dimension'];
          $dim=explode(",",$dimensions);
          for($d=0;$d<count($dim);$d++){
              $wh_dim=explode("x",$dim[$d]);
              $camp=$row['campaign_name'];
                $client=$row['client_name'];
                
                $sql_creatcode = "SELECT * FROM `creativecode` WHERE client='$client' AND campaign='$camp' AND dimension='$dim[$d]'";
            $data_creatcode=mysqli_query($connectDB,$sql_creatcode);
      $row1 = mysqli_fetch_assoc($data_creatcode);
              ?> <tr>
              <td> <?php echo $dim[$d] ?> </td>
              <td> 
              <?php 
                if($row['adtag_type']=="dcm"){
                    if($row["city_data"]=="geo"){
                        ?>
                        <div class='hockeycurve-v1'>
                           <iframe id='main-ad-tag<?php echo $d ?>' frameborder='0' scrolling='no' width='<?php echo $wh_dim[0] ?>' height='<?php echo $wh_dim[1] ?>'></iframe>
                           <script type='text/javascript'>
                           var params = {'client':'<?php echo $client?>','fcat':'<?php echo $row1['filter'] ?>','ct0':'%c_esc', 'lp0':'%u','cb':'%n','dbmc':'<?php echo $row1['filter'] ?>'}
                           var cs = '';
                           for (var p in params) {
                           cs += '&' + encodeURIComponent(p) + '=' + encodeURIComponent(params[p
                           ]);
                           }
                           var final_src = 'https://ad.hockeycurve.com/ad.php?zoneid=<?php echo $dim[$d] ?>&partner=dcm&hct=master&geo=true&optout=false' + cs
                           document.getElementById('main-ad-tag<?php echo $d ?>').src = final_src
                           </script>
                           </div>
                    <?php 
                    }else if($row["city_data"]=="bcamp"){
                        ?>
                        <div class='hockeycurve-v1'>
                           <iframe id='main-ad-tag<?php echo $d ?>' frameborder='0' scrolling='no' width='<?php echo $wh_dim[0] ?>' height='<?php echo $wh_dim[1] ?>'></iframe>
                           <script type='text/javascript'>
                           var params = {'client':'<?php echo $client?>','fcat':'<?php echo $row1['filter'] ?>','ct0':'%c_esc', 'lp0':'%u','cb':'%n','dbmc':'<?php echo $row1['filter'] ?>'}
                           var cs = '';
                           for (var p in params) {
                           cs += '&' + encodeURIComponent(p) + '=' + encodeURIComponent(params[p
                           ]);
                           }
                           var final_src = 'https://ad.hockeycurve.com/ad.php?zoneid=<?php echo $dim[$d] ?>&partner=dcm&hct=master&geo=bcamp&optout=false' + cs
                           document.getElementById('main-ad-tag<?php echo $d ?>').src = final_src
                           </script>
                           </div>
                    <?php 
                    }else{
                        ?>
                        <div class='hockeycurve-v1'>
                           <iframe id='main-ad-tag<?php echo $d ?>' frameborder='0' scrolling='no' width='<?php echo $wh_dim[0] ?>' height='<?php echo $wh_dim[1] ?>'></iframe>
                           <script type='text/javascript'>
                           var params = {'client':'<?php echo $client?>','fcat':'<?php echo $row1['filter'] ?>','ct0':'%c_esc', 'lp0':'%u','cb':'%n','dbmc':'<?php echo $row1['filter'] ?>'}
                           var cs = '';
                           for (var p in params) {
                           cs += '&' + encodeURIComponent(p) + '=' + encodeURIComponent(params[p
                           ]);
                           }
                           var final_src = 'https://ad.hockeycurve.com/ad.php?zoneid=<?php echo $dim[$d] ?>&partner=dcm&hct=master&optout=false' + cs
                           document.getElementById('main-ad-tag<?php echo $d ?>').src = final_src
                           </script>
                           </div>
                    <?php 
                    }
                    
                }
                else if($row['adtag_type']=="dv360"){
                    if($row["city_data"]=="geo"){
                        ?> <iframe src='https://ad.hockeycurve.com/ad.php?zoneid=<?php echo $dim[$d] ?>&client=<?php echo $client ?>&fcat=<?php echo $row1['filter'] ?>&partner=dbm&hct=master&geo=true&optout=false&ct0=${CLICK_URL_ENC}&cb=${CACHEBUSTER}&dbmc=${CAMPAIGN_ID}' frameborder='0' scrolling='no' width='<?php echo $wh_dim[0] ?>' height='<?php echo $wh_dim[1] ?>'></iframe>
                <?php 
                    } else if($row["city_data"]=="bcamp"){
                        ?> <iframe src='https://ad.hockeycurve.com/ad.php?zoneid=<?php echo $dim[$d] ?>&client=<?php echo $client ?>&fcat=<?php echo $row1['filter'] ?>&partner=dbm&hct=master&geo=bcamp&optout=false&ct0=${CLICK_URL_ENC}&cb=${CACHEBUSTER}&dbmc=${CAMPAIGN_ID}' frameborder='0' scrolling='no' width='<?php echo $wh_dim[0] ?>' height='<?php echo $wh_dim[1] ?>'></iframe>
                <?php 
                    } else{
                        ?> <iframe src='https://ad.hockeycurve.com/ad.php?zoneid=<?php echo $dim[$d] ?>&client=<?php echo $client ?>&fcat=<?php echo $row1['filter'] ?>&partner=dbm&hct=master&optout=false&ct0=${CLICK_URL_ENC}&cb=${CACHEBUSTER}&dbmc=${CAMPAIGN_ID}' frameborder='0' scrolling='no' width='<?php echo $wh_dim[0] ?>' height='<?php echo $wh_dim[1] ?>'></iframe>
                <?php 
                    }
                    }
              ?> 
              </td>
              <td><a href="https://publisherplex.io/selfserve/blog.php?d=<?php echo urlencode( base64_encode($row['id'].",".$dim[$d])); ?>" target="_blank">Demo Ad</a></td> 
          </tr>
         <?php }
          ?>
          
          
      </tbody>
    </table>
    </div>
    <label class="logoutLblPos">
       <div style="position: absolute;right:4em;white-space: nowrap;top:0.6em;font-size: 1;font-size: 1.5em;font-family: bold;"><?php echo $_SESSION['username'] ?></div>
        <div>
        <a href="../logout.php"><img style="position: absolute;right:1.3em;width:50px" src="https://s.hcurvecdn.com/atest/pooja/updateanimation/UserProfile-Icon.png"></a>
       </div>
 </label>
 
 <script>
    document.getElementById("crdate").innerHTML = "Created on : <?php echo $row1['date'] ?>";
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
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
if(isset($_POST['preview'])){
   
                                
                                if($rowar['animation']==""){
                                    $sqlms="UPDATE `creativecode` SET `animation`='$animation' WHERE id='$id'";
         $datams=mysqli_query($connectDB,$sqlms);
                                }
                                else{
                                    $sqlms="UPDATE `creativecode` SET `test_anim`='$animation' WHERE id='$id'";
         $datams=mysqli_query($connectDB,$sqlms);
                                }
                             
                            }
                                

if(isset($_POST['cancel'])){
                               $sqlms2="UPDATE `creativecode` SET `test_anim`='$animation21' WHERE id='$id'";
         $datams2=mysqli_query($connectDB,$sqlms2);
            
}

if(isset($_POST['save'])){
                                    
                                    $ani='<script id="script'.$dimension.'">'.$animation.'</script>';
                                    
                                    $final=$rowar['content'].$ani;
                                    $sqlms3="UPDATE `creativecode` SET `finalcode`='$final' WHERE id='$id'";
         $datams3=mysqli_query($connectDB,$sqlms3);
                               $sqlms2="UPDATE `creativecode` SET `test_anim`='$animation' WHERE id='$id'";
         $datams2=mysqli_query($connectDB,$sqlms2);
                                    $sqlms1="UPDATE `creativecode` SET `animation`='$animation' WHERE id='$id'";
         $datams1=mysqli_query($connectDB,$sqlms1);
        
                         
}                            }}
                            
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
    li {
        font-size: 18px;
    }
    .items{
        width:200px;
    }
    #selectanimationform{
        position:absolute;
        top:100px;
        left:300px;
        font-size:18px;
    }
    #changeanimbtn{
        position:absolute;
        left:240px;
        top:0px;
    }
    #tableform{
        margin-top:100px;
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

</style>
<body>
    <script>
        function popupstart(){
            document.getElementById("firstpopup").style.display="block";
            document.getElementById("mainmain").style.filter="blur(1px)";
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
    <?php
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
    <li style="cursor:pointer;" id="updt_creat">Update Creative</li>
    <li style="cursor:pointer;" id="cam_inf">Campaign information</li>
    <li style="cursor:pointer;" id="temp">select template</li>
    <li style="cursor:pointer;" id="upld_ast">Upload assets</li>
    <li class="is-active">Update animation</li>
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
  <?php 
        $sqlanim="SELECT * FROM `creativecode` WHERE id='$id'";
         $dataanim=mysqli_query($connectDB,$sqlanim);
         $rowanim=mysqli_fetch_assoc($dataanim);
         
         $animation=$rowanim['animation'];
         $final_animation=str_replace($dimension,"dim",$animation);
                          
  ?>
  <a class="btn btn-danger" style="position:absolute;top:5px;right:5px;text-decoration:none;" href="../logout.php">logout</a>
  <button onclick="window.location.href = '../';" style="position:absolute;top:100px;left:20px;font-size:25px;padding:5px 10px;" class="btn btn-danger"><b><i class="fa fa-home"></i></b></button>
    <button onclick="window.location.href = './update.php?id=<?php echo $id2 ?>';" style="position:absolute;top:100px;left:100px;padding:5px 10px;font-size:25px;" class="btn btn-success"><i class="fa fa-arrow-left"></i></button>
   <form method='POST' id="selectanimationform"><select id="animation-lib" name="animation-lib">
        <option value=''>Select from library</option>

                                <?php  
                                $sql181="SELECT * FROM `creativecode` WHERE id='$id'";
         $data181=mysqli_query($connectDB,$sql181);
         $row181=mysqli_fetch_assoc($data181);
         $client1=$row181['client'];
                                
                                $sql211="SELECT * FROM `anim_lib` WHERE client='$client1'";
         $data211=mysqli_query($connectDB,$sql211);
         if(mysqli_num_rows($data211)>0){
                        while($row211=mysqli_fetch_assoc($data211)){
                            ?> <option value='<?php echo $row211["code"] ?>'><?php echo $row211['anim_name'] ?></option> <?php
                        }}
                                  ?>
                                  </select>
                                  
                                 <button name="changeanim" class="btn btn-primary" id="changeanimbtn">Change</button><a onclick="popupstart()" style="position:absolute;left:340px;top:0px" class="btn btn-success" >Same Animation in Library</a><div style="position:absolute;color:#063970;font-size:17px;width:280px;top:0px;left:640px;"><span style="position:absolute;font-size:39px;" id="arrow2">&larr;</span><b>Press save before saving the animation in the animation library </b></div>
                                  </form> 
                                  
  <div id="firstpopup" style="position:absolute;top:50%;left:50%;text-align:center;transform:translate(-50%,-50%);background-color:#55A1FF;width:300px;height:300px;z-index:1000;display:none;border-radius:10px;box-shadow: 0px 10px 15px -3px rgba(0,0,0,0.1);">
      <div style="font-size: 20px;margin-top: 30px;padding: 20px;color:#fff;">Do you want to same the animation in the Animation library ?</div>
      
      <button class="btn btn-success" style="font-size:20px;margin-right:20px;margin-top:10px" onclick="popup2start()">Yes</button><button style="font-size:20px;margin-left:20px;margin-top:10px" class="btn btn-danger" onclick="popupend()">No</button>
  </div>
  <div id="first2popup" style="position:absolute;top:50%;left:50%;text-align:center;transform:translate(-50%,-50%);background-color:#55A1FF;width:300px;height:300px;z-index:1000;display:none;border-radius:10px;box-shadow: 0px 10px 15px -3px rgba(0,0,0,0.1);">
      <div style="font-size: 20px;margin-top: 30px;padding: 20px;color:#fff;">Please name the animation</div>
      <form method="POST">
          <input name="animation_name" type="text" style="display:inline;border:1px solid black;font-size:16px;">
          <input type="hidden" name="animation_code" value='<?php echo $final_animation ?>'><br>
          <button class="btn btn-success" style="font-size:20px;margin-right:20px;margin-top:30px" name="savetoanimlib">Save</button>
          <button style="font-size:20px;margin-left:20px;margin-top:30px" class="btn btn-danger" onclick="popupend()">Cancel</button>
      </form>
      
  </div>
  <div id="mainmain">
    
    <form method='POST' id="tableform">
        <table class='table1' id='table1'>
    <thead>
    <tr>
        <td>Assets</td>
        <td>Select Animation <a href="https://docs.google.com/document/d/1GsykYm6opeKyAMagWFa0rnQ2QK3d5CzhYLWGUB9Zr8o/edit;" target="_blank">&#9432;</a></td>
        <td>Opacity <a href="https://docs.google.com/document/d/1GsykYm6opeKyAMagWFa0rnQ2QK3d5CzhYLWGUB9Zr8o/edit;" target="_blank">&#9432;</a></td>
        <td class='dn'>Duration <a href="https://docs.google.com/document/d/1GsykYm6opeKyAMagWFa0rnQ2QK3d5CzhYLWGUB9Zr8o/edit;" target="_blank">&#9432;</a></td>
        <td class='dy'>Delay <a href="https://docs.google.com/document/d/1GsykYm6opeKyAMagWFa0rnQ2QK3d5CzhYLWGUB9Zr8o/edit;" target="_blank">&#9432;</a></td>
        <td class='ry'>Repeat Delay <a href="https://docs.google.com/document/d/1GsykYm6opeKyAMagWFa0rnQ2QK3d5CzhYLWGUB9Zr8o/edit;" target="_blank">&#9432;</a></td>
        <td class='ar'>Animation Repeat Count <a href="https://docs.google.com/document/d/1GsykYm6opeKyAMagWFa0rnQ2QK3d5CzhYLWGUB9Zr8o/edit;" target="_blank">&#9432;</a></td>
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

                                <?php  $sql2="SELECT * FROM `anim_repo`";
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
        <td><input id="<?php echo $sasset[$i]; ?>repeatd" name="<?php echo $sasset[$i]; ?>-repeatd" type='text' value='1' placeholder='repeat delay' class='rclass'></td>
        <td><input id="<?php echo $sasset[$i]; ?>repeat" name="<?php echo $sasset[$i]; ?>-repeat" type='text' value='1' placeholder='No.of repeats' class='rnumber'></td></tr> 
        
        <?php
                            }}}?>
    
   </tbody>
    </table><br>
<button name='preview' id='preview1'  class="btn btn-primary" style='cursor:pointer;'>Preview</button>
<button name='save' id='save1' class="btn btn-success" style='cursor:pointer;margin:0 10px;'>Save</button>
<span id="text1" style="display:none"></span>
<button name='cancel' id='cancel1' class="btn btn-danger" style='cursor:pointer;'>Cancel</button> 
<span style="display:block" class='txt_val' id='showvalue'></span>
</form>



<div style="position:relative;margin-top:30px;">
    <?php
$sqljs="SELECT * FROM `creativecode` WHERE id='$id'";
         $datajs=mysqli_query($connectDB,$sqljs);
while($rowjs=mysqli_fetch_assoc($datajs)){
    $dimens=$rowjs['dimension'];
    
    $anim="<script>".$rowjs['test_anim']."</script>";
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
                var rdly = <?php echo $rp2; ?>;
                var rpt = <?php echo $rp; ?>;
                var all = dly + dration + (dration * rpt) + (rdly * rpt);
                

            }  
            
            jQuery(function($) {
                
                
                $('#<?php echo $assetpv[1] ?>durn').keyup(function() {
                
                    var <?php echo $assetpv[1] ?>u = parseFloat($(this).val())+parseFloat($('#<?php echo $assetpv[1] ?>delay').val())+(parseFloat($(this).val()) * parseFloat($('#<?php echo $assetpv[1] ?>repeat').val()))+(parseFloat($('#<?php echo $assetpv[1] ?>repeatd').val())*parseFloat($('#<?php echo $assetpv[1] ?>repeat').val()));
                    console.log(<?php echo $assetpv[1] ?>u);
                    if (<?php echo $assetpv[1] ?>u <= 30) {
                        console.log("gtg");
                        document.getElementById("preview1").disabled = false;
                        document.getElementById("save1").disabled = false;
                        document.querySelector('#<?php echo $assetpv[1] ?>durn').style.color = "black";
                        document.querySelector('#<?php echo $assetpv[1] ?>durn').style.fontWeight = "400";
                        document.getElementById("showvalue").style.color = "black";
                        document.getElementById("showvalue").innerText = "Totat Animation Time is" + " " + <?php echo $assetpv[1] ?>u + " " + "seconds"; 
                    } else {
                        console.log("check duration");
                        document.getElementById("preview1").disabled = true;
                        document.getElementById("save1").disabled = true;
                        document.querySelector('#<?php echo $assetpv[1] ?>durn').style.color = "red";
                        document.querySelector('#<?php echo $assetpv[1] ?>durn').style.fontWeight = "700";
                        document.getElementById("showvalue").style.color = "red";
                        document.getElementById("showvalue").innerText = "Totat Animation Time is" + " " + <?php echo $assetpv[1] ?>u + " " + "seconds" + " " + "Please" + " " + "Check";
                        
                    }

                });
                $('#<?php echo $assetpv[1] ?>delay').keyup(function() {
                    var <?php echo $assetpv[1] ?>v = parseFloat($(this).val())+parseFloat($('#<?php echo $assetpv[1] ?>durn').val())+(parseFloat($('#<?php echo $assetpv[1] ?>durn').val()) * parseFloat($('#<?php echo $assetpv[1] ?>repeat').val()))+(parseFloat($('#<?php echo $assetpv[1] ?>repeatd').val())*parseFloat($('#<?php echo $assetpv[1] ?>repeat').val()));
                    console.log(<?php echo $assetpv[1] ?>v);
                    if (<?php echo $assetpv[1] ?>v <= 30) {
                        console.log("gtg");
                        document.getElementById("preview1").disabled = false;
                        document.getElementById("save1").disabled = false;
                        document.querySelector('#<?php echo $assetpv[1] ?>delay').style.color = "black";
                        document.querySelector('#<?php echo $assetpv[1] ?>delay').style.fontWeight = "400";
                        document.getElementById("showvalue").style.color = "black";
                        document.getElementById("showvalue").innerText = "Totat Animation Time is" + " " + <?php echo $assetpv[1] ?>v + " " + "seconds";
                    } else {
                        console.log("check delay");
                        document.getElementById("preview1").disabled = true;
                        document.getElementById("save1").disabled = true;
                        document.querySelector('#<?php echo $assetpv[1] ?>delay').style.color = "red";
                        document.querySelector('#<?php echo $assetpv[1] ?>delay').style.fontWeight = "700";
                        document.getElementById("showvalue").style.color = "red";
                        document.getElementById("showvalue").innerText = "Totat Animation Time is" + " " + <?php echo $assetpv[1] ?>v + " " + "seconds" + " " + "Please" + " " + "Check";
                    }
                });
                $('#<?php echo $assetpv[1] ?>repeatd').keyup(function() {
                    var <?php echo $assetpv[1] ?>w = parseFloat($('#<?php echo $assetpv[1] ?>durn').val()) + parseFloat($('#<?php echo $assetpv[1] ?>delay').val()) + (parseFloat($('#<?php echo $assetpv[1] ?>durn').val()) * parseFloat($('#<?php echo $assetpv[1] ?>repeat').val())) + (parseFloat($(this).val())*parseFloat($('#<?php echo $assetpv[1] ?>repeat').val()));
                    console.log(<?php echo $assetpv[1] ?>w);
                    if (<?php echo $assetpv[1] ?>w <= 30) {
                        console.log("gtg");
                        document.getElementById("preview1").disabled = false;
                        document.getElementById("save1").disabled = false;
                        document.querySelector('#<?php echo $assetpv[1] ?>repeatd').style.color = "black";
                        document.querySelector('#<?php echo $assetpv[1] ?>repeatd').style.fontWeight = "400";
                        document.getElementById("showvalue").style.color = "black";
                        document.getElementById("showvalue").innerText = "Totat Animation Time is" + " " + <?php echo $assetpv[1] ?>w + " " + "seconds";
                    } else {
                        console.log("check repeat delay");
                        document.getElementById("preview1").disabled = true;
                        document.getElementById("save1").disabled = true;
                        document.querySelector('#<?php echo $assetpv[1] ?>repeatd').style.color = "red";
                        document.querySelector('#<?php echo $assetpv[1] ?>repeatd').style.fontWeight = "700";
                        document.getElementById("showvalue").style.color = "red";
                        document.getElementById("showvalue").innerText = "Totat Animation Time is" + " " + <?php echo $assetpv[1] ?>w + " " + "seconds" + " " + "Please" + " " + "Check";
                    }
                });
                $('#<?php echo $assetpv[1] ?>repeat').keyup(function() {
                    var <?php echo $assetpv[1] ?>x = parseFloat($('#<?php echo $assetpv[1] ?>durn').val()) + parseFloat($('#<?php echo $assetpv[1] ?>delay').val()) + (parseFloat($('#<?php echo $assetpv[1] ?>durn').val()) * parseFloat($(this).val())) + (parseFloat($('#<?php echo $assetpv[1] ?>repeatd').val())*parseFloat($('#<?php echo $assetpv[1] ?>repeat').val()));
                    console.log(<?php echo $assetpv[1] ?>x);
                    if (<?php echo $assetpv[1] ?>x <= 30) {
                        console.log("gtg");
                        document.getElementById("preview1").disabled = false;
                        document.getElementById("save1").disabled = false;
                        document.querySelector('#<?php echo $assetpv[1] ?>repeat').style.color = "black";
                        document.querySelector('#<?php echo $assetpv[1] ?>repeat').style.fontWeight = "400";
                        document.getElementById("showvalue").style.color = "black";
                        document.getElementById("showvalue").innerText = "Totat Animation Time is" + " " + <?php echo $assetpv[1] ?>x + " " + "seconds";
                    } else {
                        console.log("check repeat");
                        document.getElementById("preview1").disabled = true;
                        document.getElementById("save1").disabled = true;
                        document.querySelector('#<?php echo $assetpv[1] ?>repeat').style.color = "red";
                        document.querySelector('#<?php echo $assetpv[1] ?>repeat').style.fontWeight = "700";
                        document.getElementById("showvalue").style.color = "red";
                        document.getElementById("showvalue").innerText = "Totat Animation Time is" + " " + <?php echo $assetpv[1] ?>x + " " + "seconds" + " " + "Please" + " " + "Check";
                    }
                });

            });
            
         
            </script> <?php
 
   } } }

echo $total;



}
 ?>
</div>
  </div>
  <script>
      $(document).ready(function () {
      $('select').selectize({
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
    document.getElementById("temp").addEventListener("click",()=>{
        window.location = "../template/index.php?id=<?php echo $_SESSION['id']; ?>";
    })
    document.getElementById("upld_ast").addEventListener("click",()=>{
        window.location = "../uploadasset/creative.php?id=<?php echo $_SESSION['id']; ?>";
    })
</script>

</body>
</html>

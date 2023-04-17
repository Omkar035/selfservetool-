<?php
ob_start();
session_start();
if(!$_SESSION['email']){
  header("location: login.php");
}
include "conn.php";
error_reporting(E_ERROR | E_PARSE);
$id=$_GET['id'];
if(isset($_POST['id'])) {
    $id=$_GET['id'];
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
    <link rel="stylesheet" href="style.css" />
  
    <title>adtags</title>
    <style>
       
        
         #btn1 {
          background-color: #2f3a51;
    position: absolute;
    top: 310px;
    left: 320px;
    color: white;
    width: 410px;
    border-radius: 5px;
    border: 2px solid #2f3a51;
    font-size: 18px;
    font-weight: 600;
    margin: 10px;
    /* margin-right: 15px; */
    height: 40px;
    /* float: right;*/ 
         }
      
       
       
         #btn3{
         
             margin-top:10px;
          margin-right: 15px;
            float:right;
            border:none;
            border-radius: 5px;
            font-size:18px;
           background-color: #1E80C1;
            color:white;
            width:400px;
            height:38px;
            font-weight:600;
            padding:5px;
            text-align:center;
        }
    
     
     .btn6{
          border-radius:5px;
         font-weight:600;
         width: 160px;
         font-size:16px;
           margin-top: 13px; 
           height:40px;
            background-color: #0B4DA1;
           padding:5px;
             border:none;
            color:white;
            height:38px;
             font-weight:600;
            
               text-align:center;
     }
     
      .btn6:hover {background-color: #3e8e41;
            color:white;
            border:none;
            border-radius:5px;
           font-weight:600;
        }
     
     #sample0,.jasi{
         font-size:12px;
         text-align:left;
        
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
 
 
 
 div.container {
  text-align: center;
  width:100%;
   /*border:1px solid black;*/
}

ul.myUL {
  display: inline-block;
  text-align: left;
  color:red;
}

.center {
  text-align: center;
    /* margin-left: 35px; */
    width: 82%;
    top: 60px;
    position: absolute;
    left: 300px;
     /*border: 1px solid green;*/
}

 #btn2{
     position: absolute;
    background-color: #1E80C1;
    padding: 5px;
    top: 260px;
    left: 990px;
    /* margin-left: 50%; */
    transform: translate(-50%, 0);
    border-radius: 5px;
    border: none;
    font-size: 18px;
    color: white;
    height: 38px;
    font-weight: 600;
    width: 370px;
    text-align: center;
 }  
 #btn3{
    /* margin-right: 53px !important;*/
    margin-top: 14px !important;
    /* margin-left: 5px !important; */
    width: 266px !important;
    font-size: 12px !important;
    padding: 8px !important;
     position: absolute;
    justify-content: left;
    float: left;
 }
 

 #adtags_table{
     overflow:auto;
 }

 .jasi{
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
  <!--<h4 style="position: absolute;top:200px;color:green">"copied!"</h4>-->
    <!--<div style="background-color: grey;padding: 20px;">-->
    <!--    <div style="background-color: white;">-->
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
      
     
         
        <?php
            if($row["adtag_type"]=="dcm"){
        ?>       
                    <div onclick="location.href='faq/dcm.php?id=<?php echo $id ?>'"   ><button  id="btn2" class="cta btn--shimmer ">How to copy AD-Tag from HC Tool?</button></div>
                <!--<div  onclick="location.href='faq/dcm.php?id=<?php echo $id ?>'"><button class="cta2" id="btn3">Frequently asked question for DCM AD-Tag</button></div>-->
        <?php        
            }
            else if($row["adtag_type"]=="dv360")
            {
        ?>   
                    <div onclick="location.href='faq/dv360.php?id=<?php echo $id ?>'" ><button  id="btn2" class="cta btn--shimmer " >How to copy AD-Tag from HC Tool?</button></div>
                <!--<div  onclick="location.href='faq/dv360.php?id=<?php echo $id ?>'"> <button class="cta2" id="btn3">Frequently asked question for DV360 AD-Tag</button></div>-->
        <?php        
            }
            else
            {
        ?>        
               <div onclick="location.href='faq/dcm.php?id=<?php echo $id ?>'" ><button  id="btn2" class="cta btn--shimmer ">How to copy AD-Tag from HC Tool?</button></div>
        <?php        
            }
        ?>
        <br><br>
        <h2 id="rowss" class="center"><span><?php echo $row['adtag_type']?> - </span><?php echo $row['campaign_title']?></h2>
     
       <h2 style="color:red; text-align:center; text-align: center;width: 82%;top: 100px;position: absolute;left: 300px;"><?php echo strtoupper($row["adtag_type"]); ?> AD-Tag</h2>  
       <div class="container" style="font-size:18px;margin-left:0px;margin-right:0px;text-align:center;margin-top:20px;position: absolute;top: 140px;left: 300px;width: 82%;">
          <ul class="myUL">
            <li>The AD Tag URL contains <b><?php echo strtoupper($row["adtag_type"]); ?> </b>AD Tags.</li>
            <li> AD Tags to be used on <b><?php echo strtoupper($row["adtag_type"]); ?></b> only.</li>
             <li>AD Tags will not work on any other Platforms.</li> </ul>
       </div> <br><br><br>
          <button id="btn1" onclick="location.href = 'previews1.php?id=<?php echo $row['id']?>';">
        See the creative Preview for this AD-Tag</button>
    </div>
    <br>
    <div id="adtags_table" class="container" style="padding-bottom:5px;position: relative;top: 260px;left: 150px;width: 82%;">
        <table id="tabledata" class="table table-bordered">
            <thead>
                <tr >
                    <th style="width:100px;">fcats</th>
                    <th style="width:100px;">dimension</th>
                    <th style="width:550px;">Tags</th>
                    <th style="width:30px;"></th>
                </tr>
            </thead>
            <tbody>
            <?php 
                    $dimension=$row['dimension'];
                    $dim=explode(",","$dimension");
                    for($d=0;$d<count($dim);$d++){
                        $camp=$row['campaign_name'];
                $client=$row['client_name'];
                
                $sql_creatcode = "SELECT * FROM `creativecode` WHERE client='$client' AND campaign='$camp' AND dimension='$dim[$d]'";
            $data_creatcode=mysqli_query($connectDB,$sql_creatcode);
      $row1 = mysqli_fetch_assoc($data_creatcode);
                        ?> <tr> 
                        <td><?php echo $row1['filter'] ?></td>
                         <td><?php echo $dim[$d] ?></td>
                         <?php $wh_dim=explode("x","$dim[$d]") ?>
                         <td style="text-align:left"><div class="jasi" id="sample<?php echo $d ?>">
                             <?php
                                if($row['adtag_type']=="dcm"){
                                   if($row["city_data"]=="geo"){
                                       ?>&lt;div class='hockeycurve-v1'><br>
                           &lt;iframe id='main-ad-tag' frameborder='0' scrolling='no' width='<?php echo $wh_dim[0] ?>' height='<?php echo $wh_dim[1] ?>'>&lt;/iframe><br>
                           &lt;script type='text/javascript'><br>
                           var params = {'client':'<?php echo $client ?>','fcat':'<?php echo $row1['filter'] ?>','ct0':'%c_esc', 'lp0':'%u','cb':'%n','dbmc':'<?php echo $row1['filter'] ?>'}<br>
                           var cs = '';<br>
                           for (var p in params) {<br>
                           cs += '&' + encodeURIComponent(p) + '=' + encodeURIComponent(params[p<br>
                           ]);<br>
                           }<br>
                           var final_src = 'https://ad.hockeycurve.com/ad.php?zoneid=<?php echo $dim[$d] ?>&partner=dcm&hct=master&geo=true&optout=false' + cs<br>
                           document.getElementById('main-ad-tag').src = final_src<br>
                           &lt;/script><br>
                           &lt;/div>
                           <?php
                                   }else if($row["city_data"]=="bcamp"){
                                       ?>&lt;div class='hockeycurve-v1'><br>
                           &lt;iframe id='main-ad-tag' frameborder='0' scrolling='no' width='<?php echo $wh_dim[0] ?>' height='<?php echo $wh_dim[1] ?>'>&lt;/iframe><br>
                           &lt;script type='text/javascript'><br>
                           var params = {'client':'<?php echo $client ?>','fcat':'<?php echo $row1['filter'] ?>','ct0':'%c_esc', 'lp0':'%u','cb':'%n','dbmc':'<?php echo $row1['filter'] ?>'}<br>
                           var cs = '';<br>
                           for (var p in params) {<br>
                           cs += '&' + encodeURIComponent(p) + '=' + encodeURIComponent(params[p<br>
                           ]);<br>
                           }<br>
                           var final_src = 'https://ad.hockeycurve.com/ad.php?zoneid=<?php echo $dim[$d] ?>&partner=dcm&hct=master&geo=bcamp&optout=false' + cs<br>
                           document.getElementById('main-ad-tag').src = final_src<br>
                           &lt;/script><br>
                           &lt;/div>
                           <?php
                                   }else{
                                       ?>&lt;div class='hockeycurve-v1'><br>
                           &lt;iframe id='main-ad-tag' frameborder='0' scrolling='no' width='<?php echo $wh_dim[0] ?>' height='<?php echo $wh_dim[1] ?>'>&lt;/iframe><br>
                           &lt;script type='text/javascript'><br>
                           var params = {'client':'<?php echo $client ?>','fcat':'<?php echo $row1['filter'] ?>','ct0':'%c_esc', 'lp0':'%u','cb':'%n','dbmc':'<?php echo $row1['filter'] ?>'}<br>
                           var cs = '';<br>
                           for (var p in params) {<br>
                           cs += '&' + encodeURIComponent(p) + '=' + encodeURIComponent(params[p<br>
                           ]);<br>
                           }<br>
                           var final_src = 'https://ad.hockeycurve.com/ad.php?zoneid=<?php echo $dim[$d] ?>&partner=dcm&hct=master&optout=false' + cs<br>
                           document.getElementById('main-ad-tag').src = final_src<br>
                           &lt;/script><br>
                           &lt;/div>
                           <?php
                                   }
                                     
                                }
                                else if($row['adtag_type']=="dv360"){
                                     if($row["city_data"]=="geo"){
                                         ?>
                                    &lt;iframe src='https://ad.hockeycurve.com/ad.php?zoneid=<?php echo $dim[$d] ?>&client=<?php echo $client ?>&fcat=<?php echo $row1['filter'] ?>&partner=dbm&hct=master&optout=false&geo=true&ct0=${CLICK_URL_ENC}&cb=${CACHEBUSTER}&dbmc=${CAMPAIGN_ID}' frameborder='0' scrolling='no' width='<?php echo $wh_dim[0] ?>' height='<?php echo $wh_dim[1] ?>'>&lt;/iframe>
                                <?php 
                                     }
                                    else if($row["city_data"]=="bcamp"){
                                        ?>
                                    &lt;iframe src='https://ad.hockeycurve.com/ad.php?zoneid=<?php echo $dim[$d] ?>&client=<?php echo $client ?>&fcat=<?php echo $row1['filter'] ?>&partner=dbm&hct=master&optout=false&geo=bcamp&ct0=${CLICK_URL_ENC}&cb=${CACHEBUSTER}&dbmc=${CAMPAIGN_ID}' frameborder='0' scrolling='no' width='<?php echo $wh_dim[0] ?>' height='<?php echo $wh_dim[1] ?>'>&lt;/iframe>
                                <?php 
                                    }else{
                                        ?>
                                    &lt;iframe src='https://ad.hockeycurve.com/ad.php?zoneid=<?php echo $dim[$d] ?>&client=<?php echo $client ?>&fcat=<?php echo $row1['filter'] ?>&partner=dbm&hct=master&optout=false&ct0=${CLICK_URL_ENC}&cb=${CACHEBUSTER}&dbmc=${CAMPAIGN_ID}' frameborder='0' scrolling='no' width='<?php echo $wh_dim[0] ?>' height='<?php echo $wh_dim[1] ?>'>&lt;/iframe>
                                <?php 
                                    }
                                    }
                             ?>
                         </div></td>
                         <td><button class="btn6" id="adisaps" onclick="CopyToClipboard('sample<?php echo $d ?>')";>Copy this AD-Tag</button></td>
                         </tr>
                         <?php 
                    }
                   
                ?>

            </tbody>
        </table>
    
        </div>
        <div style="position: relative;left: 311px;bottom: -250px;">
            <button id="tabledownload" style="float: left;padding:5px;margin:5px;background: #0B4DA1;color: white;width: 170px;height: 40px;border: none;border-radius: 10px;font-size: 18px;">Download csv</button>
        <!--<button onclick="demoFromHTML()" style="float: left;padding: 5px;margin:5px">Download pdf</button>-->
        <button onclick="ExportToExcel('xlsx')"  style="float: left;padding:5px;margin:5px;background: #0B4DA1;color: white;width: 170px;height: 40px;border: none;border-radius: 10px;font-size: 18px;">Download excel</button>
        </div>
            
        <label class="logoutLblPos">
       <div style="position: absolute;right:4em;white-space: nowrap;top:0.6em;font-size: 1;font-size: 1.5em;font-family: bold;"><?php echo $_SESSION['username'] ?></div>
        <div>
        <a href="../logout.php"><img style="position: absolute;right:1.3em;width:50px" src="https://s.hcurvecdn.com/atest/pooja/updateanimation/UserProfile-Icon.png"></a>
       </div>
       

 </label>
        
        
        <!--</div>-->
        <!--</div>-->
 <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/table2csv@1.1.6/src/table2csv.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>
<script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>
<script type="text/javascript">
  $("#tabledownload").click(function(){
 $('#tabledata').table2csv({

  file_name:'adtags.csv',

  header_body_space: 0

});
});

function ExportToExcel(type, fn, dl) {
       var elt = document.getElementById('adtags_table');
       var wb = XLSX.utils.table_to_book(elt, { sheet: "sheet1" });
       return dl ?
         XLSX.write(wb, { bookType: type, bookSST: true, type: 'base64' }):
         XLSX.writeFile(wb, fn || ('adtag.' + (type || 'xlsx')));
    }
function CopyToClipboard(id)
{
var r = document.createRange();
r.selectNode(document.getElementById(id));
window.getSelection().removeAllRanges();
window.getSelection().addRange(r);
document.execCommand('copy');
window.getSelection().removeAllRanges();

// document.getElementById("adisaps").innerHTML="Copied!";

}

  function demoFromHTML() {
    var pdf = new jsPDF('l', 'px', 'tabloid');
    // source can be HTML-formatted string, or a reference
    // to an actual DOM element from which the text will be scraped.
    source = $('#adtags_table')[0];

    // we support special element handlers. Register them with jQuery-style 
    // ID selector for either ID or node name. ("#iAmID", "div", "span" etc.)
    // There is no support for any other type of selectors 
    // (class, of compound) at this time.
    specialElementHandlers = {
        // element with id of "bypass" - jQuery style selector
        '#bypassme': function (element, renderer) {
            // true = "handled elsewhere, bypass text extraction"
            return true
        }
    };
    margins = {
        top: 80,
        bottom: 60,
        left: 40,
        width: 522
    };
    // all coords and widths are in jsPDF instance's declared units
    // 'inches' in this case
    pdf.fromHTML(
    source, // HTML string or DOM elem ref.
    margins.left, // x coord
    margins.top, { // y coord
        'width': margins.width, // max width of content on PDF
        'elementHandlers': specialElementHandlers
    },

    function (dispose) {
        // dispose: object with X, Y of the last line add to the PDF 
        //          this allow the insertion of new lines after html
        pdf.save('Adtag.pdf');
    }, margins);
}


</script>


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
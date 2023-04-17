<?php

include "../conn.php";
error_reporting(E_ERROR | E_PARSE);

session_start();
$_SESSION['client_name'];
if(!$_SESSION['email']){
  header("location: ../login.php");
}
$id=$_GET['id'];
if(isset($_POST['id'])) {
    $id=$_GET['id'];
}
$_SESSION['id']=$id;



if(isset($_POST['submit'])){
  $countryarr=$_POST["dim"];
        $newvalues=  implode(",", $countryarr);
        $click_test=explode(",",$newvalues);
        if(count($click_test)==1){
            $click=0;
        }else{
            $click=0;
            for($nodim=1;$nodim<count($click_test);$nodim++){
            $click.=",0";
        }
        }
        
        $template=$_POST['temp'];
        
        
        $sql_log="SELECT * FROM `campaign_info` WHERE id='$id'";
$data_log = mysqli_query($connectDB,$sql_log);

$row_log=mysqli_fetch_assoc($data_log);
          date_default_timezone_set('Asia/Kolkata');
$time = date('Y-m-d H:i:s');

$email=$_SESSION['email'];
$client=$_SESSION['client_name'];
$fcat=$_SESSION['fcat'];
$adtg=$row_log['adtag_type'];
                

$log="INSERT INTO `log_file`(`client_name`, `email`, `adtag` ,`fcat`, `date_time`, `event`) VALUES ('$client','$email','$adtg','$fcat','$time','Select template submit - Dimension:$newvalues')";
                $result_log=mysqli_query($connectDB,$log);
        
    $sql="UPDATE `campaign_info` SET `dimension`='$newvalues',`click_test`='$click', `public`='$click',`template`='$template' WHERE id=$id";
    $result=mysqli_query($connectDB,$sql);

$_SESSION['dim_cnt'] = 0;
  $_SESSION['ast_val'] = 0;
  header("location: ../uploadasset/creative.php?id=$id");
 
    
  } 
$sql_reverse="SELECT * FROM `campaign_info` WHERE id='$id'";
$data_reverse = mysqli_query($connectDB,$sql_reverse);
if (mysqli_num_rows($data_reverse) > 0){
    while($row_reverse=mysqli_fetch_assoc($data_reverse)){
        $tmpll = $row_reverse['template'];
        $dimss = $row_reverse['dimension'];
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.19.1/TweenMax.min.js"></script>
   <!--<script type="text/javascript" src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>-->
  <link rel="stylesheet" href="../style.css" />
    
  <title>Template page</title>
  <style>
  body{
     overflow:hidden;
  }
  
  .page_info {
    position: absolute;
    top: 100px;
    right: 20px;
    font-size: 22px;
    font-family: 'bold';
}
  
  #popup{
    animation: kv 3s infinite ease-in-out;
    animation-delay: 1.5s;
    opacity: 1;
}
 @keyframes kv{
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
table{
            border-radius: 8px;
        }
        table,tr{
            box-shadow: 0px 3px 8px rgba(0,0,0,0.2);
            /*border: 1px solid #000;*/
        }
        
        td,th{
            border-left: 1px solid rgba(0,0,0,0.3);
        }

        thead tr th{
            padding: 8px 0;
        }

  </style>
</head>
<body>
    <ul class="list-unstyled multi-steps">
    <li style="cursor:pointer;" id="updt_creat">Update Creative</li>
    <li style="cursor:pointer;" id="cam_inf">Campaign information</li>
    <li class="is-active">select template</li>
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
    <li>Click Test</li>
    <li>Previews/Adtags</li>
  </ul>
<a href="../logout.php" class="btn btn-danger" style="position:absolute;top:5px;right:5px">Logout</a>
<div class="page_info">Click to <a target="_blank" href="https://docs.google.com/document/d/1WHSEKbv2CYElU4NvxeaJThrF0-jtFvibXUa01mkkapw">Know More</a></div>
<a id="updateanimation" href="../update/update.php?id=<?php echo $id ?>" class="btn btn-success" style="position:absolute;top:5px;right:80px;display:none;">Update Animation</a>
<!--<button button onclick="history.back()">Back</button>-->
<span id="err" style="text-align:center;color:red;display: flex;justify-content: center;"></span>
<div style="margin:40px">Select Template : <select onchange="alert();" id="template-box">
                             <option value="">Select Template</option>
                            </select></div>
<div id="msg" style="position:absolute;top:110px;left:445px;width:100%;color:#75309b;font-size:16px"><span style="position:absolute;font-size:39px;" id="arr">&larr;</span>&nbsp;<b>SELECT THE TEMPLATE FOR THE AD YOU WANT TO CREATE</b></div>
<div id="msg2" style="position:absolute;top:174px;left:453px;width:100%;color:#75309b;font-size:16px;display:none;text-transform:uppercase"></div>
<div id="main" style="margin:40px">
      <div id="table-data">
          <span style="font-size:20px;font-weight:bold">Some Demo ads</span>
          <table>
              <tr>
                  <td style="padding:20px;text-align:center">
                      <div class="click" id="search" style="position:absolute;width:300px;height:250px;z-index:20;cursor: pointer;"></div>
                      <iframe style="scale:0.7" src='https://ad.hockeycurve.com/ad.php?zoneid=300x250&client=plumsearch&fcat=pldc4js&optout=false' frameborder='0' scrolling='no' width='300' height='250'></iframe>
                      
                  </td>
                  <td style="padding:20px;text-align:center">
                      <div class="click" id="richmedia" style="position:absolute;width:300px;height:250px;z-index:20;cursor: pointer;"></div>
                      <iframe style="scale:0.7" src='https://ad.hockeycurve.com/ad.php?zoneid=300x250&client=aprimeauto&fcat=aajsma&optout=false' frameborder='0' scrolling='no' width='300' height='250'></iframe>
                      
                  </td>
                  <td style="padding:20px;text-align:center">
                      <div class="click" id="static" style="position:absolute;width:300px;height:250px;z-index:20;cursor: pointer;"></div>
                      <iframe style="scale:0.7" src='https://ad.hockeycurve.com/ad.php?zoneid=300x250&client=mpl1auto&fcat=mplstpv&optout=false' frameborder='0' scrolling='no' width='300' height='250'></iframe>
                      
                  </td>
              </tr>
              <tr>
                  <td style="text-align:center;padding:10px 0">
                      Search
                  </td>
                  
                  <td style="text-align:center;padding:10px 0">
                      Rich Media
                  </td>
                  <td style="text-align:center;padding:10px 0">
                      Static Ad (Only 1 image used)
                  </td>
              </tr>
          </table>
      </div>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.js"></script>
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.js"></script> -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
  <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css">
  


<script type="text/javascript">

function alert(){
        document.getElementById("msg").style.display = "none";
        document.getElementById("msg2").style.display = "block";
}
setInterval(() => {
var test55 = document.getElementById("template-box").value;
console.log(test55)
document.getElementById("msg2").innerHTML = "<span style='position:absolute;font-size:39px;' id='arr'>&larr;</span>&nbsp;<b>"+test55+" TEMPLATE IS SELECTED, SELECT YOUR CAMPAIGN AD SIZE</b>";

var test66 = document.getElementById("template-box");
if(test66.disabled == true){
   document.getElementById("msg").style.display = "none"; 
}
},3000)

document.getElementById("updt_creat").addEventListener("click",()=>{
        window.location = "../update_creative.php";
    })
 document.getElementById("cam_inf").addEventListener("click",()=>{
        window.location = "../index.php";
    })
    
    document.querySelector("#template-box").addEventListener("change",(e)=>{
    if("<?php echo $_SESSION['creative_type'] ?>" == "update"){
                e.target.value = "<?php echo $tmpll;  ?>";
                document.getElementById("err").innerText = "Sorry cannot update Template";
                window.location.reload();
            }
           
})


// function updateDiv()
// { 
//     $( "#table-data" ).load(window.location.href + " #table-data" );
// }
setTimeout(() => {
    if("<?php echo $_SESSION['creative_type'] ?>" == "update"){
        document.querySelector("#template-box").disabled = true;
        document.getElementById("updateanimation").style.display="block";
    }
    
},500)

  $(document).ready(function(){
      
    $.ajax({
      url : "load-templates.php",
      type : "POST",
      dataType : "JSON",
      success : function(data){
        $.each(data, function(key, value){
            <?php if($_SESSION['lineitem'] =="true"){ ?>
            if(value.template_name.includes("lineitem")){
                $("#template-box").append("<option   value='" + value.template_name + "'>" + value.template_name + "</option>");
            }
            <?php }else { ?>
          $("#template-box").append("<option   value='" + value.template_name + "'>" + value.template_name + "</option>");
          <?php } ?>
        });
        document.querySelector('option[value="<?php echo $tmpll; ?>"]').selected = true;
        if("<?php echo $tmpll; ?>" != ""){
            load_creat();
        }
        if("<?php echo $dimss; ?>" != ""){
            load_creat();
            setTimeout(()=>{
                var checkbox = document.querySelectorAll("input[type='checkbox']")
                    var dimss = "<?php echo $dimss; ?>";
                    var dim_arr = dimss.split(",");
                for(let i=0;i<checkbox.length;i++){
                    for(let j=0;j<dim_arr.length;j++){
                        if(checkbox[i].value==dim_arr[j]){
                            checkbox[i].parentElement.parentElement.parentElement.classList.add('active')
                            checkbox[i].checked=true;
                        }
                    }
                    
                }
                document.querySelector(".multiselect-selected-text").innerText = dimss;
                document.querySelector(".multiselect").title = dimss;
                    $("#templates_drop").val(dim_arr);
                 
            },2000)
            
        }
      }
    });


    function load_creat(){
        var template=$("#template-box").val();
        console.log(template)
        $.ajax({
          url : "load-table.php",
          type : "POST",
          data : { template : template },
          success : function(data){
            //   console.log(data)
            $("#table-data").html(data);
          }
        });
    }

    // Load Table Data
    
      $(".click").click(function(e){
      var value=e.target.id;
        document.querySelector('option[value='+value+']').selected = true
        var template=$("#template-box").val()
        $.ajax({
          url : "load-table.php",
          type : "POST",
          data : { template : template },
          success : function(data){

            $("#table-data").html(data);
          }
        });
      })
      
    $("#template-box").change(function(){
      var template = $(this).val();

      if(template == ""){
        $("#table-data").html("");
      }else{
        $.ajax({
          url : "load-table.php",
          type : "POST",
          data : { template : template },
          success : function(data){

            $("#table-data").html(data);
          }
        });
      }
    })
  });
  
</script>

</body>

</html>

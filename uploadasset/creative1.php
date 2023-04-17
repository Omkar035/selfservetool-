
<?php

    session_start();
    if(!$_SESSION['email']){
      header("location: ../login.php");
    };
    
    include "../conn.php";
    error_reporting(E_ERROR | E_PARSE);
    
    $id=$_GET['id'];
    if(isset($_POST['id'])) {
        $id=$_GET['id'];
    }
    
        $_SESSION['id'] = $id;

    $fcat = $_SESSION['fcat'];
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.js"></script>
     <link rel="stylesheet" href="../style.css" />
     <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.5.1/dist/confetti.browser.min.js"></script>
     <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.19.1/TweenMax.min.js"></script>
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.js"></script> -->
    <title>Upload Assets</title>

    <style>
    *{
        margin: 0;
    }
    html {
        zoom: 70%;
    }
    
    
    td {
        vertical-align: top;
    }
    
        #creative_table{
            display: flex;
    flex-direction: column;
    justify-content: center;
    /*align-items: center;*/
    position: absolute;
    left: 315px;
    top: 260px;
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
        
        #dims_total{
            text-align:center;font-size: 1.3rem;font-weight:bold;position: absolute;left: 315px;top: 90px;
        }
        
        #dummy_asset{
            position:absolute;right: 35px;font-weight:bold;font-size: 1.3rem;top: 90px;
        }
        #dims_check{
            display:flex;align-items:center;justify-content: left;width:1550px;flex-wrap:wrap;position: relative;left: 305px;top: 140px;
        }
        .upd_ast{
            position: absolute;
            /* top:0; */
            display: none;
            border: 1px solid #000;
            padding: 8px;
            background: #fff;
        }

        .upd_ast.active{
            display: block;
        }

        ul{
            text-align: left;
            list-style: none;
            padding: 0;
        }
        
        .citycheck{
            position:absolute;
            border:1px solid;
        }
        
        .tempcheck{
            position:absolute;
            border:1px solid;
            right:340px;
        }
        
        .weatcheck{
            position:absolute;
            right:233px;
            border:1px solid;
        }
        
         .aqicheck{
            position:absolute;
            top:625px;
            right:233px;
            border:1px solid;
        }
        
          .datecheck{
            position:absolute;
            top:725px;
            right:233px;
            border:1px solid;
        }

        .align_stl{
            display: none;
        }
        .align_stl.active{
            display: block;
        }

        .hide{
            display: none;
        }
        
        #upd_ast_check{
            position:absolute;
            top: 35%;
            left: 40%;
            width: 400px;
            height: 200px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0px 3px 8px rgba(0,0,0,0.4);
            z-index: 3000;
            display:none;
        }
        #upd_ast_box{
            width: 400px;
            height: 200px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        #upd_ast_check span{
            font-weight: bold;
            font-size: 1.5rem;
            margin-bottom: 30px;
        }
        
        #upload_assets{
            border: none;
            outline: none;
            background: #0E86D4;
            color: #fff;
            font-weight: bold;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
            box-shadow: 0px 2px 6px rgba(0,0,0,0.4);
            transform: translate(0) scale(1);
            /*animation: popup 3s 5 ease-in-out;*/
        }
        
        #sv_nxt{
            background: #90EE90;
            padding: 10px 20px;
            font-weight: bold;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            box-shadow: 0px 2px 6px rgba(0,0,0,0.4);
            /*animation: popup 3s 5 ease-in-out;*/
            /*animation-delay: 1.5s;*/
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
        
        
        
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}

.sidebar{
    font-family:bold;position:fixed;top: 0px;left: 0;background-color: #0b4da1;width:300px;padding-top: 3.8em;height:100%;cursor:pointer;z-index:5
}

.sidebar li{
  padding: 31px 8px 6px 16px;
    text-decoration: none;
    font-size: 15px;
    color: #ffffff;
    display: block;
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
.logo img{
    width:282px;
}
.sidebar_mobile{
    display:none;
}
.logoutLblPos{
   position:absolute;
   right:1em;
   top:1em;
}

.icon{
    position: relative;
    top: 12px;
}
@font-face {
        font-family: 'bold';
        src: url('https://s.hcurvecdn.com/fonts/Montserrat_Bol.woff2?v=3') format("truetype");
    }
    @font-face {
        font-family: 'sbold';
        src: url('https://s.hcurvecdn.com/fonts/NunitoSans-Bold.woff2?v=3') format("truetype");
    }
    label {
padding: 10px 5px;
    }
    
    
    input {
        width: 180px;
    height: 25px;
    border-radius: 10px;
    margin:2px 0px;
    font-family:bold;
    }
    
    .sidebar_right{
        position:absolute;
        top: 200px;
        right: 0;
        width: 400px;
        height: 80%;
        box-shadow: 0px 3px 14px rgba(0,0,0,0.5);
        background: #fff;
    }
    
    #page_heading{
        color:black;font-weight:bolder;font-size:3em;font-family:bold;margin-left:305px;position:absolute;top: 0px;
    }
    
    #clone_crt_date{
        position:absolute;
        top: 220px;
        left: 305px;
    }
    
    .nav-links{
        width: 100%;
        height: 100%;
    }
    .menu_title{
        width: 100%;
        height: 50px;
        border: 1px solid #000;
        padding: 0 10px;
        font-size: 20px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        cursor: pointer;
    }
    .sub_menu{
        display:none;
    }
    .sub_menu.show{
        display: block;
    }
    @media only screen and (max-width: 600px) {

  #destop_view{
      display:none;
  }
  
  #dims_total{
    font-size: 1.1rem;
    font-weight: bold;
    position: absolute;
    left: 20px;
    top: 120px;
        }
        #dummy_asset{
            position:absolute;
            left: 20px;
            font-weight:bold;
            font-size: 1.1rem;
            top: 190px;
        }
        
        #dims_check{
            display:flex;
            align-items:center;
            justify-content: left;width:100%;
            flex-wrap:wrap;
            position: absolute;left: 20px;top: 148px;
        }
  .sidebar_mobile{
      width: 100%;
      height: 70px;
      background: #0b4da1;
      position: fixed;
      bottom: 0;
      left: 0;
      box-shadow: 0 3px 8px rgba(0,0,0,0.5);
      z-index: 10;
      display: block;
  }
  .mobile_view{
      display: flex;
  }
  #creative_box{
      width: 100%;
  }
  #page_heading{
      margin-left: 20px;
      top: 80px;
      font-size: 2.1rem;
  }
  #creative_table{
      left: 20px;
  }
  .logo{
      position: fixed;
      width: 100%;
      height: 70px;
      background: #0b4da1;
      margin: 0;
      display:flex;
      align-items: center;
      justify-content: space-between;
      box-shadow: 0 3px 6px rgba(0,0,0,0.5);
  }
  .logo img{
      width: 240px;
  }
  .logoutLblPos{
      display:none;
  }
}
    </style>
</head>
<body>
    <div id="creative_box" style="font-family:bold;">
        <div class="logo">
<img src="https://s.hcurvecdn.com/atest/pooja/updateanimation/logo3.png"> 
</div> 
      <ul class="list-unstyled multi-steps" id="destop_view">    
<div class="sidebar">
    <?php 
    
   
        $sql21="SELECT * FROM `campaign_info` WHERE id='$id'";
        
        $data2=mysqli_query($connectDB,$sql21);
        if(mysqli_num_rows($data2)>0){
            
    while($row2=mysqli_fetch_assoc($data2)){
        $tdims=$row2['dimension'];
        $adtag_type=$row2['adtag_type'];
            if($adtag_type!="dcm"){  
                ?>
               <div style="position: absolute;width: 300px;height: 70px;top: 344px;background-color: #84B7E3;"></div>
                <?php
             }else{
             ?>
                 <div style="position: absolute;width: 300px;height: 70px;top: 344px;background-color: #84B7E3;"></div> 
                 <?php
                 
             }
    }}
    ?>
    
    
  <li class="a"  id="updt_creat" ><img class="icon" src="https://s.hcurvecdn.com/atest/pooja/updateanimation/icons/Create-Icon.png">&nbsp;&nbsp;&nbsp;CREATE / UPDATE</li>
  <li class="a"  id="cam_inf" ><img class="icon" style="width: 45px;" src="https://hcurvecdn.com/atest/pooja/updateanimation/caminfo.png">&nbsp;&nbsp;&nbsp;CAMPAIGN INFO</li>
  <li class="a"  id="lib_tem" ><img class="icon" src="https://s.hcurvecdn.com/atest/pooja/updateanimation/icons/library-icon.png">&nbsp;&nbsp;&nbsp;LIBRARY</li>
  <li class="a"  id="upld_ast" style="cursor:pointer;cursor: pointer;position: relative;z-index: 1;"><img class="icon" src="https://s.hcurvecdn.com/atest/pooja/updateanimation/icons/upload-icon.png">&nbsp;&nbsp;&nbsp;UPLOAD ASSETS</li>
  <li class="a" id="anim_up" ><img class="icon" src="https://s.hcurvecdn.com/atest/pooja/updateanimation/icons/animation-icon.png">&nbsp;&nbsp;&nbsp;ANIMATION</li>
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
<a href="../logout.php" style="color:white;text-decoration:none"><li class="a bot" style="cursor:pointer;bottom: 50px;position: absolute;"><img style="width:70%;" src="https://hcurvecdn.com/atest/pooja/updateanimation/logoutctanew.png"/></li></a>
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
               <div class="probardot" style="z-index: 10;position: fixed;top: 119px;left: 265px;"><img style="height: 520px;" class="probar" src="https://hcurvecdn.com/atest/pooja/updateanimation/progressbar3.png">
<img style="height: 16px;position: absolute;top: 252px;left: 4px;" src="https://hcurvecdn.com/atest/pooja/updateanimation/progressbarselection.png"></div>
 
                <?php
             }else{
             ?>
                 <div class="probardot" style="z-index: 10;position: fixed;top: 119px;left: 265px;"><img style="height: 430px;" class="probar" src="https://s.hcurvecdn.com/atest/mahesh/cam_info/assets/progressbar2.png">
<img style="height: 15px;position: absolute;top: 255px;left: 3px;" src="https://hcurvecdn.com/atest/pooja/updateanimation/progressbarselection.png"></div>
             <?php
                 
             }
    }}
    ?>


    
  </ul>
  
  <div class="sidebar_mobile">
  <ul class="mobile_view">
      <li class="a"  id="updt_creat" >CREATE / UPDATE</li>
  <li class="a"  id="cam_inf" >CAMPAIGN INFO</li>
  <li class="a"  id="lib_tem" >LIBRARY</li>
  <li class="a"  id="upld_ast" style="cursor:pointer;cursor: pointer;position: relative;z-index: 1;">UPLOAD ASSETS</li>
  <li class="a" id="anim_up" >ANIMATION</li>
  </ul>
  </div>
  <!--<a href="../logout.php" style="position:absolute;top:5px;right:5px;color: #fff;background-color: #d9534f;border-color: #d43f3a;text-decoration: none;padding: 7px;border-radius: 5px">Logout</a>-->
  <?php
        if($_SESSION['creative_type'] == "update") { ?>
        <!--<a href="../update/update.php?id=<?php echo $id ?>" class="btn--shimmer" style="position:absolute;top:5px;right:75px;color: #fff;background-color: #5cb85c;text-decoration: none;padding: 7px;border-radius: 5px">Update Animation</a>-->
    <?php } ?>
         <h1 id="page_heading">Upload <span style="color:#1c82e3;font-weight:bolder">Assets</span></h1>
    
        <!--<h3 style="text-align:center;margin: 5px;">Selected Template Name</h3>-->
        <div id="save_nxt_btn" style="display:none">
            <button id="back">Back</button>
            <button id="home">Home</button>
        </div>
        <div id="api_check"></div>
        <div id="dummy_asset">Use dummy assets for testing - <a target="_blank" href="https://drive.google.com/drive/folders/18GSWWOafnKQ0El050R7Z3ROUyMSVmEMj">Dummy assets</a></div>
        <div id="asset_err" style="display:flex;align-items:center;justify-content: center;"></div>
        <div id="dims_total"></div>
        <div id="dims_check"></div>
        <div id="upd_ast_check">
            <div id="upd_ast_box">
                <span>Do you want update assets ?</span>
                <div id="upd_ast_btn">
                    <button id="yes" style='margin:5px 5px;border:none;background: #BFE27E;font-weight:bold;width: 120px;height: 40px;border-radius:5px;cursor:pointer;color: white;font-size: 20px;'>Yes</button>
                    <button id="no" style='margin:5px 5px;border:none;background: #FF0145;font-weight:bold;width: 120px;height: 40px;border-radius:5px;cursor:pointer;color: white;font-size: 20px;'>No</button>
                </div>
            </div>
        </div>
        <div id="btn_clone"></div>
        <div id="creative_table"></div>
        
    </div>
    <label class="logoutLblPos">
       <div style="position: absolute;right:4em;white-space: nowrap;top:0.6em;font-size: 1;font-size: 1.5em;font-family: bold;"><?php echo $_SESSION['username'] ?></div>
        <div>
        <img style="position: absolute;right:1.3em;width:50px" src="https://s.hcurvecdn.com/atest/pooja/updateanimation/UserProfile-Icon.png">
       </div>
 </label>
 <div class="sidebar_right">
        <!--<div class="check_box" id="check_box"></div>-->
 </div>
 <script>
     document.getElementById("updt_creat").addEventListener("click",()=>{
        window.location = "../update_creative.php";
    })
    document.getElementById("cam_inf").addEventListener("click",()=>{
        window.location = "../index.php";
    })
    document.getElementById("lib_tem").addEventListener("click",()=>{
        window.location = "../template/index.php?id=<?php echo $id; ?>";
    })
     
 </script>
</body>
<script>

    let id = "<?php echo $id; ?>";
    let fcat = "<?php echo $fcat; ?>";
    let creat_tp = "<?php echo $_SESSION['creative_type']; ?>";
    var count = localStorage.getItem("count") || 0;
    var asset_script;
    var template_creative;
    var path = "";
    var asset_req = "";
    var dim_count;
    var style_in;
    var dim_split;
    var asset_status;
    var dim_arr;
    var geo_city = "";
    var default_city = "";
    var temp;
    var weather;
    var crt_date;
    var card_ast = [];
    var arrow_ast = [];
    var camp_title = "";
    var adtag_type="";
    var feed_url = "<?php echo $id ?>";

    function clicks (e){
        e.target.nextElementSibling.classList.toggle("show");
                
    }

    $(document).ready(function(){
      
    function loadCreative(){
        $.ajax({
            url : "loadcreative.php",
            type : "POST",
            dataType: "JSON",
            data: {
                id:  "<?php echo $id; ?>",
                fcat: "<?php echo $fcat; ?>",
                count: count,
            },
            success : function(dt){
                console.log(dt)
                asset_script = dt.asset_script;
                $("#creative_table").html(dt.content);
                $("head").append(dt.script)
                if(dt.asset_script != undefined && dt.asset_script != ""){
                    if(localStorage.getItem("assets") != "" && localStorage.getItem("assets") != null){
                        var asst_url = JSON.parse(localStorage.getItem("assets"));
                        asst_url.forEach(el => {
                            var ast_id = el.Key.substring(el.Key.lastIndexOf('/')+1).split('.')[0]
                            var ast_ext = el.Key.substring(el.Key.lastIndexOf('/')+1).split('.')[1]
                            if(ast_ext == "woff2" || ast_ext=="ttf" || ast_ext=="otf"){
                                var style = document.createElement("style");
                                var innerStyle = `@font-face {
                                    font-family: "${ast_id}";
                                    src: url("https://hcurvecdn.com/${el.Key}");
                                }`;
                                var innerStyleText = document.createTextNode(innerStyle)
                                style.appendChild(innerStyleText)
                                
                                document.getElementById("aspectRatio").appendChild(style)
                            }
                        })
                    }
                    $("body").append(dt.asset_script);
                    console.log("asset_script running ...")
                }
                
                camp_title = dt.camp_title;
                template_creative = dt.template;
                path = dt.path;
                adtag_type = dt.type;
                asset_req = dt.assets;
                dim_count = dt.dimCnt;
                style_in = dt.style_in;
                asset_status = dt.asset_status;
                dim_arr = dt.dims;
                geo_city = dt.city_data;
                default_city = dt.default_city;
                temp = dt.temp;
                weather = dt.weather;
                aqi = dt.aqi;
                crt_date = dt.current_date;
                dim_split = path.split("/")[2]
                localStorage.setItem("path",path);
                var number_of_date_div = document.querySelectorAll(".date_cls").length;
                
                // Aspect Ratio
                let aspectRatio = document.querySelector("#aspectRatio");
                let width_bx;
                let height_bx;
                
                // Spliting width and height
                var dim_sp = dim_split.split("x")
                width_bx = dim_sp[0]
                height_bx = dim_sp[1]
                var cm;
                for(var x1 in dt.table2){
                    if(crt_date == "true"){
                    
                    cm = `<li class="main_nav" id="main_nav">
                             <div class="menu_title" onclick="clicks(event);">
                                ${x1}
                                </div>
                                <ul class="sub_menu">
                                <li>${dt.table2[x1]}</li>
                                </ul>
                                </li>`;   
                    }                                            
                }
                document.querySelector(".sidebar_right").innerHTML = `<ul class="nav-links">
                                                                        ${cm}
                                                                    </ul>`;
                if(number_of_date_div > 1){
                    for(var xb=2;xb<=number_of_date_div;xb++){
                    alignment_input(xb); 
                    alignment_script(xb)
                    }
                }
                
                // aspect condition 
                if(width_bx > height_bx || Number(width_bx) > Number(height_bx)){
                    var scale_vl = 290/Number(width_bx);
                    aspectRatio.style.transform=`scale(${scale_vl.toFixed(2)})`;
                }else{
                    var scale_vl = 290/Number(height_bx);
                    aspectRatio.style.transform=`scale(${scale_vl.toFixed(2)})`;
                }

                var d = path.split("/")[2];
                if("dim"+d == localStorage.getItem("statdim"+d)){
                    algn_hd = document.querySelectorAll(".hide")
                    algn_hd.forEach(el => {
                        el.style.display="table-cell";
                    });
                }
                if(count == (dim_count-1)){     
                    $("#sv_nxt").text("Proceed");
                    $("#pro_msg").text("Click the Proceed button to continue");
                }else{
                    $("#sv_nxt").text("Save & Next");
                    $("#pro_msg").text("Click the Save & Next button to continue");
                }
                if(localStorage.getItem("assets") == "" || localStorage.getItem("assets") == null){
                    localStorage.setItem("asset_req",dt.assets);   
                }
                
                if(asset_status){
                    setTimeout(()=>{
                        document.getElementById("sv_nxt").style.display = "block"
                    },1500)
                }
                
                dim_check(dt.dims);
                if(geo_city != ""){
                    if(document.querySelector("#city_dv") == null){
                        var divss = "<div id='city_dv' style='position:absolute;top:0;left:0;'><span id='city_name' style='text-transform:capitalize'>"+dt.default_city+"</span></div>";
                        document.querySelector("#clickurl").innerHTML += divss;
                    }
                  if(asset_status){
                    if(template_creative == "spinwheel"){
                          document.querySelector('.city_temp_align').innerHTML += "<ul class='citycheck'>City:<li><label for='html'>Frame 1</label><input type='radio' id='citycheck1' value='citycheck1' class='check_c' name='cityc' checked></li><li><label for='html'>Frame 2</label><input type='radio' class='check_c' id='citycheck2' value='citycheck2' name='cityc'></li><li><label for='html'>Both</label><input type='radio' class='check_c' id='citycheck3' value='citycheck3' name='cityc'></li></ul>" 
                          if(temp == 'true'){
                               document.querySelector('.city_temp_align').innerHTML += "<ul class='tempcheck'>Tempreture:<li><label for='html2'>Frame 1</label><input type='radio' id='tempcheck1' value='tempcheck1' class='check_t' name='tempc' checked></li><li><label for='html2'>Frame 2</label><input type='radio' class='check_t' id='tempcheck2' value='tempcheck2' name='tempc'></li><li><label for='html2'>Both</label><input type='radio' class='check_t' id='tempcheck3' value='tempcheck3' name='tempc'></li></ul>" 
                          }
                          
                          if(weather == 'true'){
                               document.querySelector('.city_temp_align').innerHTML += "<ul class='weatcheck'>Weather:<li><label for='html3'>Frame 1</label><input type='radio' id='weatcheck1' value='weatcheck1' class='check_w' name='weatc' checked></li><li><label for='html3'>Frame 2</label><input type='radio' class='check_w' id='weatcheck2' value='weatcheck2' name='weatc'></li><li><label for='html3'>Both</label><input type='radio' class='check_w' id='weatcheck3' value='weatcheck3' name='weatc'></li></ul>" 
                          }
                          
                          if(aqi == 'true'){
                               document.getElementById('creative_table').innerHTML += "<ul class='aqicheck'>AQI:<li><label for='html4'>Frame 1</label><input type='radio' id='aqicheck1' value='aqicheck1' class='check_a' name='aqic' checked></li><li><label for='html4'>Frame 2</label><input type='radio' class='check_a' id='aqicheck2' value='aqicheck2' name='aqic'></li><li><label for='html4'>Both</label><input type='radio' class='check_a' id='aqicheck3' value='aqicheck3' name='aqic'></li></ul>" 
                          }
                          
                          if(crt_date == 'true'){
                               document.getElementById('creative_table').innerHTML += "<ul class='datecheck'>Date:<li><label for='html5'>Frame 1</label><input type='radio' id='datecheck1' value='datecheck1' class='check_d' name='datec' checked></li><li><label for='html5'>Frame 2</label><input type='radio' class='check_d' id='datecheck2' value='datecheck2' name='datec'></li><li><label for='html5'>Both</label><input type='radio' class='check_d' id='datecheck3' value='datecheck3' name='datec'></li></ul>" 
                          }
                        }
                         
                        document.getElementById("city_top").value = Number(document.getElementById("city_dv").style.top.replace(/px/g, ''));
                        document.getElementById("city_left").value = Number(document.getElementById("city_dv").style.left.replace(/px/g, ''));
                        document.getElementById("city_size").value = Number(document.getElementById("city_name").style.fontSize.replace(/px/g, ''));
                        document.getElementById("city_transform").value = document.getElementById("city_name").style.textTransform;
                        document.getElementById("city_width").value = Number(document.getElementById("city_dv").style.width.replace(/px/g, ''));
                        document.getElementById("city_align").value = document.getElementById("city_dv").style.textAlign;
                        document.getElementById("city_zindex").value = Number(document.getElementById("city_dv").style.zIndex);
                        document.getElementById("city_family").value = document.getElementById("city_dv").style.fontFamily;
    
                        document.getElementById("city_top").addEventListener("keyup",(e)=>{
                            document.getElementById("city_dv").style.top = e.target.value+"px";
                        });
                        document.getElementById("city_left").addEventListener("keyup",(e)=>{
                            document.getElementById("city_dv").style.left = e.target.value+"px";
                        });
                        document.getElementById("city_color").addEventListener("input",(e)=>{
                            document.getElementById("city_name").style.color = e.target.value;
                        });
                        document.getElementById("city_size").addEventListener("keyup",(e)=>{
                            document.getElementById("city_name").style.fontSize = e.target.value+"px";
                        });
                        document.getElementById("city_transform").addEventListener("keyup",(e)=>{
                            document.getElementById("city_name").style.textTransform = e.target.value;
                        });
                        document.getElementById("city_width").addEventListener("keyup",(e)=>{
                            document.getElementById("city_dv").style.width = e.target.value+"px";
                        });
                        document.getElementById("city_align").addEventListener("keyup",(e)=>{
                            document.getElementById("city_dv").style.textAlign = e.target.value;
                        });
                        document.getElementById("city_zindex").addEventListener("keyup",(e)=>{
                            document.getElementById("city_dv").style.zIndex = e.target.value;
                        });
                        document.getElementById("city_family").addEventListener("keyup",(e)=>{
                            document.getElementById("city_dv").style.fontFamily = e.target.value;
                        });
                }
                    if(temp == 'true'){
                        if(document.querySelector("#temp_div") == null){
                            var div_temp = "<div id='temp_div' style='position:absolute;top:0;left:0;'><span id='temp_c' style='text-transform:capitalize;font-size:12px'></span></div>";
                           
                                document.querySelector("#clickurl").innerHTML += div_temp;
                            var temp_script = document.createElement("script")
                            var innerScript = `
                            setTimeout(()=>{
                            var temp_city = document.querySelector("#city_name").innerText;
                            fetch("https://doapi.hockeycurve.com/hcurve-proxy10m/api.openweathermap.org/geo/1.0/direct?q="+temp_city+"&limit=1&appid=55df4b7c6c734fa8faba1b30aca98076&units=metric&c=v1")
                                .then(function(response) {
                                    return response.json();
                                })
                                .then(function(myJson) {
                                    var lat = myJson[0]["lat"];
                                    var lon = myJson[0]["lon"];
                                    getWeather(lat,lon);
                                })
                                
                            function getWeather(lat,lon) {
                                fetch("https://doapi.hockeycurve.com/hcurve-proxy10m/api.openweathermap.org/data/2.5/weather?lat="+lat+"&lon="+lon+"&appid=55df4b7c6c734fa8faba1b30aca98076&units=metric&c=v1")
                                .then(function(response) {
                                    return response.json();
                                })
                                .then(function(myJson) {
                                        temp_deg=Math.round(myJson["main"]["temp"]);
                                        deg= "\u00B0";
                                        
                                    document.getElementById("temp_c").innerHTML = temp_deg + deg + "C";
                            })
                            }
                            },1000)
                            `;
                            var innerScriptText = document.createTextNode(innerScript)
                            temp_script.appendChild(innerScriptText)
                            document.getElementById("aspectRatio").appendChild(temp_script)
                            
                        }
                        
                
            
                        document.getElementById("temp_top").value = Number(document.getElementById("temp_div").style.top.replace(/px/g, ''));
                                document.getElementById("temp_left").value = Number(document.getElementById("temp_div").style.left.replace(/px/g, ''));
                                document.getElementById("temp_size").value = Number(document.getElementById("temp_c").style.fontSize.replace(/px/g, ''));
                        document.getElementById("temp_family").value = document.getElementById("temp_div").style.fontFamily;
            
                                document.getElementById("temp_top").addEventListener("keyup",(e)=>{
                                    document.getElementById("temp_div").style.top = e.target.value+"px";
                                });
                                document.getElementById("temp_left").addEventListener("keyup",(e)=>{
                                    document.getElementById("temp_div").style.left = e.target.value+"px";
                                });
                                document.getElementById("temp_color").addEventListener("input",(e)=>{
                                    document.getElementById("temp_c").style.color = e.target.value;
                                });
                                document.getElementById("temp_size").addEventListener("keyup",(e)=>{
                                    document.getElementById("temp_c").style.fontSize = e.target.value+"px";
                                });
                        document.getElementById("temp_family").addEventListener("keyup",(e)=>{
                            document.getElementById("temp_div").style.fontFamily = e.target.value;
                        });
                                
                                
                    }
                    
                    if(weather == 'true'){
                        if(document.querySelector("#wea_div") == null){
                            var div_weather = "<div id='wea_div' style='position:absolute;top:22px;left:0;'><span id='temp_w' style='text-transform:capitalize;font-size:12px'></span></div>";
                            document.querySelector("#clickurl").innerHTML += div_weather;
                            
                            var temp_script = document.createElement("script")
                            var innerScript = `
                            setTimeout(()=>{
                            var temp_city = document.querySelector("#city_name").innerText;
                                                fetch("https://doapi.hockeycurve.com/hcurve-proxy10m/api.openweathermap.org/geo/1.0/direct?q="+temp_city+"&limit=1&appid=55df4b7c6c734fa8faba1b30aca98076&units=metric&c=v1")
                                .then(function(response) {
                                    return response.json();
                                })
                                .then(function(myJson) {
                                    lat_aqi = myJson[0]["lat"];
                                    lon_aqi = myJson[0]["lon"];
                                    getWeather(lat_aqi,lon_aqi);
                                })
                                
                            function getWeather(lat_aqi,lon_aqi) {
                                fetch("https://doapi.hockeycurve.com/hcurve-proxy10m/api.openweathermap.org/data/2.5/weather?lat="+lat_aqi+"&lon="+lon_aqi+"&appid=55df4b7c6c734fa8faba1b30aca98076&units=metric&c=v1")
                                .then(function(response) {
                                    return response.json();
                                })
                                .then(function(myJson) {
                                        weather=myJson["weather"][0]["main"];
                                        
                                    document.getElementById("temp_w").innerHTML = weather;
                            })
                            }
                            },1000)
                            `;
                            var innerScriptText = document.createTextNode(innerScript)
                            temp_script.appendChild(innerScriptText)
                            document.getElementById("aspectRatio").appendChild(temp_script)
                        }
                        
                        
                        document.getElementById("weath_top").value = Number(document.getElementById("wea_div").style.top.replace(/px/g, ''));
                        document.getElementById("weath_left").value = Number(document.getElementById("wea_div").style.left.replace(/px/g, ''));
                        document.getElementById("weath_size").value = Number(document.getElementById("temp_w").style.fontSize.replace(/px/g, ''));
                        document.getElementById("weath_family").value = document.getElementById("wea_div").style.fontFamily;
                        
                        document.getElementById("weath_top").addEventListener("keyup",(e)=>{
                                    document.getElementById("wea_div").style.top = e.target.value+"px";
                                });
                        document.getElementById("weath_left").addEventListener("keyup",(e)=>{
                                    document.getElementById("wea_div").style.left = e.target.value+"px";
                                });
                        document.getElementById("weath_size").addEventListener("keyup",(e)=>{
                                    document.getElementById("temp_w").style.fontSize = e.target.value+"px";
                                });
                        document.getElementById("weath_color").addEventListener("input",(e)=>{
                                    document.getElementById("temp_w").style.color = e.target.value;
                                });
                                document.getElementById("weath_family").addEventListener("keyup",(e)=>{
                            document.getElementById("wea_div").style.fontFamily = e.target.value;
                        });
                    }
                    
                    if(aqi == 'true'){
                        if(document.querySelector("#aqi_div") == null){
                            var div_aqi = "<div id='aqi_div' style='position:absolute;top:22px;left:0;'><span id='city_aqi' style='text-transform:capitalize;font-size:12px'></span></div>";
                            document.querySelector("#clickurl").innerHTML += div_aqi;
                            
                            var temp_script = document.createElement("script")
                            var innerScript = `
                            setTimeout(()=>{
                            var temp_city = document.querySelector("#city_name").innerText;
                            console.log(temp_city)
                                async function loadApi() {
                                    var temp_city = document.querySelector("#city_name").innerText;
                                    var response = await fetch("https://api.waqi.info/feed/"+temp_city+"/?token=828aefd9a826b1664fca55e37b0b4ccac712ef86")
                                    var data = await response.json();
                                        return data;
                                }
                                    
                                loadApi().then(res => {
                                console.log(res)
                                    document.getElementById("city_aqi").innerText = res.data.aqi;
                                })
                            },1000)
                            `;
                            var innerScriptText = document.createTextNode(innerScript)
                            temp_script.appendChild(innerScriptText)
                            document.getElementById("aspectRatio").appendChild(temp_script)
                        }
                        
                        document.getElementById("aqi_top").value = Number(document.getElementById("aqi_div").style.top.replace(/px/g, ''));
                                document.getElementById("aqi_left").value = Number(document.getElementById("aqi_div").style.left.replace(/px/g, ''));
                                document.getElementById("aqi_size").value = Number(document.getElementById("city_aqi").style.fontSize.replace(/px/g, ''));
                                document.getElementById("aqi_family").value = document.getElementById("aqi_div").style.fontFamily;
            
                                document.getElementById("aqi_top").addEventListener("keyup",(e)=>{
                                    document.getElementById("aqi_div").style.top = e.target.value+"px";
                                });
                                document.getElementById("aqi_left").addEventListener("keyup",(e)=>{
                                    document.getElementById("aqi_div").style.left = e.target.value+"px";
                                });
                                document.getElementById("aqi_color").addEventListener("input",(e)=>{
                                    document.getElementById("city_aqi").style.color = e.target.value;
                                });
                                document.getElementById("aqi_size").addEventListener("keyup",(e)=>{
                                    document.getElementById("city_aqi").style.fontSize = e.target.value+"px";
                                });
                                document.getElementById("aqi_family").addEventListener("keyup",(e)=>{
                                    document.getElementById("aqi_div").style.fontFamily = e.target.value;
                                });
                    }
                }
                
                if(crt_date == 'true'){
                        document.getElementById("btn_clone").innerHTML += `<button id="clone_crt_date">Add current time</button>`
                    
                    if(document.querySelector("#date_dv") == null){
                            var div_date = "<div id='date_dv' class='date_cls' style='position:absolute;top:0px;left:0;'><span id='date_nm' style='text-transform:capitalize;font-size:12px;'></span><input type='hidden' id='dt_hd' value='date hmonth' /></div>";
                            document.querySelector("#clickurl").innerHTML += div_date;
                            
                            var date_script = document.createElement("script");
                            date_script.id = "date_script"
                            var innerScript = `
                            var date_now = new Date();
                            var day_arr = ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];
                            var month_arr = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
                            var current_year = date_now.getFullYear();
                            var short_year = current_year.toString().substr(2);
                            var current_month = month_arr[date_now.getMonth()];
                            var current_month_short = current_month.substring(0,3);
                            var current_day = day_arr[date_now.getDay()];
                            var current_day_short = day_arr[date_now.getDay()].substring(0,3);
                            var current_date = date_now.getDate();
                            var current_hrs = date_now.getHours();
                            var current_mns = date_now.getMinutes();
                            var current_secs = date_now.getSeconds();
                            var month_number = date_now.getMonth() + 1;
                            month_number = month_number < 10 ? "0"+month_number : month_number
                            var am_pm;
                            var format_12hrs;
                            var date_str = "";
                            if(current_mns < 10){
                                current_mns = "0"+current_mns;
                            }
                            if(current_date < 10){
                                current_date = "0"+current_date;
                            }
                            if(current_hrs < 12){
                                am_pm = "AM"
                            }else{
                                am_pm = "PM";
                            }
                            if(current_hrs > 12){
                                format_12hrs = current_hrs - 12
                            }
                            document.getElementById("date_nm").innerText = "";
                            document.getElementById("date_nm").innerText = document.getElementById("dt_hd").value.replace("fday",current_day).replace("fmonth",current_month).replace("hmonth",current_month_short).replace("nmonth",month_number).replace("hrs",current_hrs).replace("hrs12",format_12hrs).replace("mns",current_mns).replace("secs",current_secs).replace("date",current_date).replace("year",current_year).replace("hyear",short_year).replace("ampm",am_pm).replace("hday",current_day_short);
                            `;
                            
                            
                            var innerScriptText = document.createTextNode(innerScript)
                            date_script.appendChild(innerScriptText)
                            document.getElementById("aspectRatio").appendChild(date_script)
                    }
                    
        
                    document.getElementById("date_format").addEventListener("keyup",(e)=>{
                            document.getElementById("dt_hd").value = e.target.value;
                            document.getElementById("date_nm").innerText = document.getElementById("dt_hd").value.replace("fday",current_day).replace("fmonth",current_month).replace("hmonth",current_month_short).replace("nmonth",month_number).replace("hrs",current_hrs).replace("hrs12",format_12hrs).replace("mns",current_mns).replace("secs",current_secs).replace("date",current_date).replace("year",current_year).replace("hyear",short_year).replace("ampm",am_pm).replace("hday",current_day_short);
                    })
                    document.getElementById("date_format").value = document.getElementById("dt_hd").value;
                    document.getElementById("date_top").value = Number(document.getElementById("date_dv").style.top.replace(/px/g, ''));
                        document.getElementById("date_left").value = Number(document.getElementById("date_dv").style.left.replace(/px/g, ''));
                        document.getElementById("date_size").value = Number(document.getElementById("date_nm").style.fontSize.replace(/px/g, ''));
                        document.getElementById("date_transform").value = document.getElementById("date_nm").style.textTransform;
                        document.getElementById("date_width").value = Number(document.getElementById("date_dv").style.width.replace(/px/g, ''));
                        document.getElementById("date_zindex").value = Number(document.getElementById("date_dv").style.zIndex);
                        document.getElementById("date_align").value = document.getElementById("date_dv").style.textAlign;
                        document.getElementById("date_family").value = document.getElementById("date_dv").style.fontFamily;
    
                        document.getElementById("date_top").addEventListener("keyup",(e)=>{
                            document.getElementById("date_dv").style.top = e.target.value+"px";
                        });
                        document.getElementById("date_left").addEventListener("keyup",(e)=>{
                            document.getElementById("date_dv").style.left = e.target.value+"px";
                        });
                        document.getElementById("date_color").addEventListener("input",(e)=>{
                            document.getElementById("date_nm").style.color = e.target.value;
                        });
                        document.getElementById("date_size").addEventListener("keyup",(e)=>{
                            document.getElementById("date_nm").style.fontSize = e.target.value+"px";
                        });
                        document.getElementById("date_transform").addEventListener("keyup",(e)=>{
                            document.getElementById("date_nm").style.textTransform = e.target.value;
                        });
                        document.getElementById("date_width").addEventListener("keyup",(e)=>{
                            document.getElementById("date_dv").style.width = e.target.value+"px";
                        });
                        document.getElementById("date_align").addEventListener("keyup",(e)=>{
                            document.getElementById("date_dv").style.textAlign = e.target.value;
                        });
                        document.getElementById("date_zindex").addEventListener("keyup",(e)=>{
                            document.getElementById("date_dv").style.zIndex = e.target.value;
                        });
                        document.getElementById("date_family").addEventListener("keyup",(e)=>{
                            document.getElementById("date_dv").style.fontFamily = e.target.value;
                        });
                        
                        document.getElementById("clone_crt_date").addEventListener("click",(e)=>{
                            number_of_date_div = document.querySelectorAll(".date_cls").length;
                            if(number_of_date_div > 0){
                               var date_div = document.getElementById("date_dv");
                               var date_srcipt_tag = document.getElementById("date_script");
                               clone_date_div = date_div.cloneNode(true);
                               clone_date_div.id = date_div.id+(Number(number_of_date_div)+1);
                               for(var dtx=0;dtx<clone_date_div.children.length;dtx++){
                                   clone_date_div.children[dtx].id = clone_date_div.children[dtx].id+(Number(number_of_date_div)+1)
                               }
                                document.getElementById("clickurl").appendChild(clone_date_div);
                                
                                var date_script_clone = document.createElement("script");
                                date_script_clone.id = "date_script"+(Number(number_of_date_div)+1);
                                var innerScript_clone = `
                                    var date_now${Number(number_of_date_div)+1} = new Date();
                                    var day_arr${Number(number_of_date_div)+1} = ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];
                                    var month_arr${Number(number_of_date_div)+1} = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
                                    var current_year${Number(number_of_date_div)+1} = date_now.getFullYear();
                                    var current_month${Number(number_of_date_div)+1} = month_arr[date_now.getMonth()];
                                    var current_month_short${Number(number_of_date_div)+1} = current_month.substring(0,3);
                                    var current_day${Number(number_of_date_div)+1} = day_arr[date_now.getDay()];
                                    var current_day_short${Number(number_of_date_div)+1} = day_arr[date_now.getDay()].substring(0,3);
                                    var current_date${Number(number_of_date_div)+1} = date_now.getDate();
                                    var current_hrs${Number(number_of_date_div)+1} = date_now.getHours();
                                    var current_mns${Number(number_of_date_div)+1} = date_now.getMinutes();
                                    var am_pm${Number(number_of_date_div)+1};
                                    var date_str${Number(number_of_date_div)+1} = "";
                                    if(current_mns${Number(number_of_date_div)+1} < 10){
                                        current_mns${Number(number_of_date_div)+1} = "0"+current_mns${Number(number_of_date_div)+1};
                                    }
                                    if(current_date${Number(number_of_date_div)+1} < 10){
                                        current_date${Number(number_of_date_div)+1} = "0"+current_date${Number(number_of_date_div)+1};
                                    }
                                    if(current_hrs${Number(number_of_date_div)+1} < 12){
                                        am_pm${Number(number_of_date_div)+1} = "AM"
                                    }else{
                                        am_pm${Number(number_of_date_div)+1} = "PM";
                                    }
                                    document.getElementById("date_nm${Number(number_of_date_div)+1}").innerText = "";
                                    document.getElementById("date_nm${Number(number_of_date_div)+1}").innerText = document.getElementById("dt_hd${Number(number_of_date_div)+1}").value.replace("fday",current_day).replace("fmonth",current_month).replace("hrs",current_hrs).replace("mns",current_mns).replace("date",current_date).replace("year",current_year).replace("ampm",am_pm).replace("hday",current_day_short).replace("hmonth",current_month_short);
                                    `;
                                    
                                    var innerScriptTextClone = document.createTextNode(innerScript_clone)
                                    date_script_clone.appendChild(innerScriptTextClone)
                                    document.getElementById("aspectRatio").appendChild(date_script_clone)
                               
                        
                        alignment_input(Number(number_of_date_div)+1)
                        alignment_script(Number(number_of_date_div)+1);
                        
                                }
                        });
                }
                
                if(dt.countdown == "true" && dt.countdown_endtime != ""){
        
                    if(document.querySelector("#count_dv") == null){
                            var div_count = "<div id='count_dv' style='position:absolute;top:0px;left:0;'><span id='count_nm' style='text-transform:capitalize;font-size:12px;'></span><input type='hidden' id='cnt_hd' /> <input type='hidden' id='cnt_end_tm' /></div>";
                            document.querySelector("#clickurl").innerHTML += div_count;
                            
                            var count_script = document.createElement("script");
                            count_script.setAttribute("id","count_script")
                            var innerScript = `document.getElementById("count_nm").innerText = "";
                                                var cnt_time = setInterval(()=>{
                                                let end_time = document.getElementById("cnt_end_tm").value;
                                                    var end_date = new Date(end_time);
                                                    var date_now = new Date();
                                                    var diff = end_date - date_now
                                                    
                                                    var days = Math.floor(diff / (1000 * 60 * 60 * 24));    
                                                    var hrs = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                                                    var mns = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
                                                    var secs = Math.floor((diff % (1000 * 60)) / 1000);
                                                    
                                                    days = (days < 10) ? "0"+days : days;
                                                    hrs = (hrs < 10) ? "0"+hrs : hrs;
                                                    mns = (mns < 10) ? "0"+mns : mns;
                                                    secs = (secs < 10) ? "0"+secs : secs;
                                                document.getElementById("count_nm").innerText = document.getElementById("cnt_hd").value.replace("day",days).replace("hrs",hrs).replace("mns",mns).replace("sec",secs);
                                                },1000)
                                                
                                                setTimeout(function(){
                                                    window.clearInterval(cnt_time)
                                                },30000)
                            `;
                            var innerScriptText = document.createTextNode(innerScript)
                            count_script.appendChild(innerScriptText)
                            document.getElementById("aspectRatio").appendChild(count_script)
                            
                    }
                    
                    
                    document.getElementById("count_format").addEventListener("keyup",(e)=>{
                            document.getElementById("cnt_hd").value = e.target.value;
                    })
                    document.getElementById("cnt_end_tm").value = dt.countdown_endtime;
                    
                    document.getElementById("count_format").value = document.getElementById("cnt_hd").value;
                    document.getElementById("count_top").value = Number(document.getElementById("count_dv").style.top.replace(/px/g, ''));
                        document.getElementById("count_left").value = Number(document.getElementById("count_dv").style.left.replace(/px/g, ''));
                        document.getElementById("count_size").value = Number(document.getElementById("count_nm").style.fontSize.replace(/px/g, ''));
                        document.getElementById("count_transform").value = document.getElementById("count_nm").style.textTransform;
                        // document.getElementById("count_word").value = Number(document.getElementById("count_nm").style.wordSpacing.replace(/px/g, ''));
                        document.getElementById("count_letter").value = Number(document.getElementById("count_nm").style.letterSpacing.replace(/px/g, ''));
                        document.getElementById("count_width").value = Number(document.getElementById("count_dv").style.width.replace(/px/g, ''));
                        document.getElementById("count_zindex").value = Number(document.getElementById("count_dv").style.zIndex);
                        document.getElementById("count_align").value = document.getElementById("count_dv").style.textAlign;
                        document.getElementById("count_family").value = document.getElementById("count_dv").style.fontFamily;
    
                        document.getElementById("count_top").addEventListener("keyup",(e)=>{
                            document.getElementById("count_dv").style.top = e.target.value+"px";
                        });
                        document.getElementById("count_left").addEventListener("keyup",(e)=>{
                            document.getElementById("count_dv").style.left = e.target.value+"px";
                        });
                        document.getElementById("count_color").addEventListener("input",(e)=>{
                            document.getElementById("count_nm").style.color = e.target.value;
                        });
                        // document.getElementById("count_word").addEventListener("input",(e)=>{
                        //     document.getElementById("count_nm").style.wordSpacing = e.target.value+"px";
                        // });
                        document.getElementById("count_letter").addEventListener("input",(e)=>{
                            document.getElementById("count_nm").style.letterSpacing = e.target.value+"px";
                        });
                        document.getElementById("count_size").addEventListener("keyup",(e)=>{
                            document.getElementById("count_nm").style.fontSize = e.target.value+"px";
                        });
                        document.getElementById("count_transform").addEventListener("keyup",(e)=>{
                            document.getElementById("count_nm").style.textTransform = e.target.value;
                        });
                        document.getElementById("count_width").addEventListener("keyup",(e)=>{
                            document.getElementById("count_dv").style.width = e.target.value+"px";
                        });
                        document.getElementById("count_align").addEventListener("keyup",(e)=>{
                            document.getElementById("count_dv").style.textAlign = e.target.value;
                        });
                        document.getElementById("count_zindex").addEventListener("keyup",(e)=>{
                            document.getElementById("count_dv").style.zIndex = e.target.value;
                        });
                    
                }
    
                 if(dt.d3text == "true"){
                    if(document.querySelector("#section_3d") == null){
                        
                            var div_3d = "<div id='section_3d'><div class='earth'></div><div id='circle'></div><input type='hidden' id='d3_text' /><input type='hidden' id='d3_color' /><input type='hidden'id='d3_color' /> <input type='hidden' id='d3_top'> <input type='hidden' id='d3_left'> <input type='hidden'id='d3_font_size'><input type='hidden' id='d3_font_fam'><input type='hidden' id='d3_rotation'><input type='hidden' id='d3_sept'><input type='hidden' id='d3_rotor_speed'><input type='hidden' id='d3_x_axe'><input type='hidden' id='d3_y_axe'><input type='hidden' id='d3_blur'><input type='hidden' id='d3_sh_color'><input type='hidden' id='d3_letter_space'></div>";
                            console.log(div_3d);
                            document.querySelector("#clickurl").innerHTML += div_3d;
                            
                            var text3d_script = document.createElement("script");
                            text3d_script.setAttribute("id","text3d_script")
                           var innerScript = `
                           function updateValue(){
                                document.getElementById("d3_text").value = document.getElementById("copy_field").value;
                                document.getElementById("d3_color").value=document.getElementById("text_color").value;
                                document.getElementById("d3_top").value=document.getElementById("top").value;
                                document.getElementById("d3_left").value=document.getElementById("left").value;
                                document.getElementById("d3_font_size").value=document.getElementById("font_size").value;
                                document.getElementById("d3_font_fam").value=document.getElementById("font_fam").value;
                                document.getElementById("d3_rotation").value=document.getElementById("rotation").value;
                                document.getElementById("d3_sept").value=document.getElementById("per_sept").value;
                                document.getElementById("d3_rotor_speed").value=document.getElementById("rotor_speed").value;
                                document.getElementById("d3_x_axe").value=document.getElementById("x_axe").value;
                                document.getElementById("d3_y_axe").value=document.getElementById("y_axe").value;
                                document.getElementById("d3_blur").value=document.getElementById("blur").value;
                                document.getElementById("d3_sh_color").value=document.getElementById("sh_color").value;
                                document.getElementById("d3_letter_space").value = document.getElementById("letter_space").value;

            var copy_text = document.getElementById("d3_text").value;
            var text_color = document.getElementById("d3_color");
            var text_top = document.getElementById("d3_top");
            var text_left = document.getElementById("d3_left");
            var font_size = document.getElementById("d3_font_size");
            var font_fam = document.getElementById("d3_font_fam");
            var rotation = document.getElementById("d3_rotation");
            var rotorANS;
            var per_sept = document.getElementById("d3_sept");
            var rotor_speed = document.getElementById("d3_rotor_speed");
            var x_axe = document.getElementById("d3_x_axe");
            var y_axe = document.getElementById("d3_y_axe");
            var blur = document.getElementById("d3_blur");
            var sh_color = document.getElementById("d3_sh_color");


            var letter_space = document.getElementById("d3_letter_space");
            
            var MyArray = [];

            var circle = document.getElementById("circle");
            circle.innerHTML = "";

            for (i = 0; i < copy_text.length; i++) {
                MyArray.push(copy_text[i]);

            }

            for (var j = 0; j <= MyArray.length - 1; j++) {
                var yourSpan = document.createElement("span");

                yourSpan.innerHTML += MyArray[j];
                yourSpan.style.setProperty("--i", j + 1);
                circle.appendChild(yourSpan);
            }
            
            //STOP ANIMATION AFTER 30S  

            setTimeout(() => {
                document.getElementById("circle").setAttribute("animation-play-state","paused")
            }, 30000);

            function rotationType() {
                if (rotation.value === "clock" || rotation.value === "clockwise") {
                    rotorANS = 360;
                    return rotorANS;
                } else {
                    rotorANS = -360;
                    return rotorANS;
                }
                
            }


            function addCSS () {document.head.appendChild(document.createElement("style")).innerHTML = "#section_3d {display: flex;justify-content:center;transform-style:preserve-3d;}  .stop_animation {animation: none!important;} #circle span {position:absolute;left:-20px;top: 0;transform-origin:center;transform-style:preserve-3d;padding: 5px 12px;transform: rotateY(calc(var(--i) * calc(360deg / "+ MyArray.length + "))) translateZ(" + letter_space.value + "px);font-size: " + font_size.value + "px;font-family: " + font_fam.value + ";color: " + text_color.value + ";text-shadow: " + x_axe.value +"px " + y_axe.value +"px " + blur.value +"px " + sh_color.value +";} #circle {top: " + text_top.value +"px;left: "+ text_left.value + "px;position: absolute;transform-style: preserve-3d;animation:animtxt linear infinite;animation-duration: " + rotor_speed.value +"s;} @keyframes animtxt {0% {transform: perspective(" + per_sept.value +"px) rotateY(0deg) rotateX(0deg) translateY(0px);} 100% {transform: perspective(" + per_sept.value +"px) rotateY(" + rotationType() +"deg) rotateX(0deg) translateY(0px);}}"}
            
            addCSS();
                            }
            if(document.querySelector(".stop_animation") != null){
                document.getElementById("circle").classList.remove("stop_animation")
            }
            var copy_text = document.getElementById("d3_text").value;
            var text_color = document.getElementById("d3_color");
            var text_top = document.getElementById("d3_top");
            var text_left = document.getElementById("d3_left");
            var font_size = document.getElementById("d3_font_size");
            var font_fam = document.getElementById("d3_font_fam");
            var rotation = document.getElementById("d3_rotation");
            var rotorANS;
            var per_sept = document.getElementById("d3_sept");
            var rotor_speed = document.getElementById("d3_rotor_speed");
            var x_axe = document.getElementById("d3_x_axe");
            var y_axe = document.getElementById("d3_y_axe");
            var blur = document.getElementById("d3_blur");
            var sh_color = document.getElementById("d3_sh_color");


            var letter_space = document.getElementById("d3_letter_space");
            
            var MyArray = [];

            var circle = document.getElementById("circle");
            circle.innerHTML = "";
            for (i = 0; i < copy_text.length; i++) {
                MyArray.push(copy_text[i]);

            }

            for (var j = 0; j <= MyArray.length - 1; j++) {
                var yourSpan = document.createElement("span");

                yourSpan.innerHTML += MyArray[j];
                yourSpan.style.setProperty("--i", j + 1);
                circle.appendChild(yourSpan);
            }
            
            //STOP ANIMATION AFTER 30S  

            setTimeout(() => {
                document.getElementById("circle").setAttribute("animation-play-state","paused")
            }, 30000);

            function rotationType() {
                if (rotation.value === "clock" || rotation.value === "clockwise") {
                    rotorANS = 360;
                    return rotorANS;
                } else {
                    rotorANS = -360;
                    return rotorANS;
                }
                
            }


            function addCSS () {document.head.appendChild(document.createElement("style")).innerHTML = "#section_3d {display: flex;justify-content:center;transform-style:preserve-3d;}  .stop_animation {animation: none!important;} #circle span {position:absolute;left:-20px;top: 0;transform-origin:center;transform-style:preserve-3d;padding: 5px 12px;transform: rotateY(calc(var(--i) * calc(360deg / "+ MyArray.length + "))) translateZ(" + letter_space.value + "px);font-size: " + font_size.value + "px;font-family: " + font_fam.value + ";color: " + text_color.value + ";text-shadow: " + x_axe.value +"px " + y_axe.value +"px " + blur.value +"px " + sh_color.value +";} #circle {top: " + text_top.value +"px;left: "+ text_left.value + "px;position: absolute;transform-style: preserve-3d;animation:animtxt linear infinite;animation-duration: " + rotor_speed.value +"s;} @keyframes animtxt {0% {transform: perspective(" + per_sept.value +"px) rotateY(0deg) rotateX(0deg) translateY(0px);} 100% {transform: perspective(" + per_sept.value +"px) rotateY(" + rotationType() +"deg) rotateX(0deg) translateY(0px);}}"}
            
            addCSS();

            console.log(MyArray);
            console.log(yourSpan);
        `;




                            var innerScriptText = document.createTextNode(innerScript)
                            text3d_script.appendChild(innerScriptText)
                            document.getElementById("aspectRatio").appendChild(text3d_script)
                            
                    }
                    
                   
                    
                }
                
                
                localStorage.setItem("count",count);
                
                // date alignment input field cloning
                function alignment_input(count){
                    var date_align_clone = document.querySelector("#main_nav").cloneNode(true);
                        date_align_clone.id = `${date_align_clone.id}${count}`;
                        date_align_clone.children[1].children[0].querySelectorAll("input").forEach(el =>{
                            el.id = el.id+count;
                        });
                        document.querySelector(".nav-links").appendChild(date_align_clone)
                }
                
                // date alignment srcipt code
                function alignment_script(count){
                    var date_align = `document.getElementById("date_format${count}").addEventListener("keyup",(e)=>{
                                document.getElementById("dt_hd${count}").value = e.target.value;
                                document.getElementById("date_nm${count}").innerText = e.target.value.replace("fday",current_day).replace("fmonth",current_month).replace("hrs",current_hrs).replace("mns",current_mns).replace("date",current_date).replace("year",current_year).replace("ampm",am_pm).replace("hday",current_day_short).replace("hmonth",current_month_short);
                            });
                        document.getElementById("date_format${count}").value = document.getElementById("dt_hd${count}").value;
                        document.getElementById("date_top${count}").value = Number(document.getElementById("date_dv${count}").style.top.replace(/px/g, ''));
                        document.getElementById("date_left${count}").value = Number(document.getElementById("date_dv${count}").style.left.replace(/px/g, ''));
                        document.getElementById("date_size${count}").value = Number(document.getElementById("date_nm${count}").style.fontSize.replace(/px/g, ''));
                        document.getElementById("date_transform${count}").value = document.getElementById("date_nm${count}").style.textTransform;
                        document.getElementById("date_width${count}").value = Number(document.getElementById("date_dv${count}").style.width.replace(/px/g, ''));
                        document.getElementById("date_zindex${count}").value = Number(document.getElementById("date_dv${count}").style.zIndex);
                        document.getElementById("date_align${count}").value = document.getElementById("date_dv${count}").style.textAlign;
                        document.getElementById("date_family${count}").value = document.getElementById("date_dv${count}").style.fontFamily;
    
                        document.getElementById("date_top${count}").addEventListener("keyup",(e)=>{
                            document.getElementById("date_dv${count}").style.top = e.target.value+"px";
                        });
                        document.getElementById("date_left${count}").addEventListener("keyup",(e)=>{
                            document.getElementById("date_dv${count}").style.left = e.target.value+"px";
                        });
                        document.getElementById("date_color${count}").addEventListener("input",(e)=>{
                            document.getElementById("date_nm${count}").style.color = e.target.value;
                        });
                        document.getElementById("date_size${count}").addEventListener("keyup",(e)=>{
                            document.getElementById("date_nm${count}").style.fontSize = e.target.value+"px";
                        });
                        document.getElementById("date_transform${count}").addEventListener("keyup",(e)=>{
                            document.getElementById("date_nm${count}").style.textTransform = e.target.value;
                        });
                        document.getElementById("date_width${count}").addEventListener("keyup",(e)=>{
                            document.getElementById("date_dv${count}").style.width = e.target.value+"px";
                        });
                        document.getElementById("date_align${count}").addEventListener("keyup",(e)=>{
                            document.getElementById("date_dv${count}").style.textAlign = e.target.value;
                        });
                        document.getElementById("date_zindex${count}").addEventListener("keyup",(e)=>{
                            document.getElementById("date_dv${count}").style.zIndex = e.target.value;
                        });
                        document.getElementById("date_family${count}").addEventListener("keyup",(e)=>{
                            document.getElementById("date_dv${count}").style.fontFamily = e.target.value;
                        });`
                        
                        // Creating script tag for date alignment script
                        var date_script_doc = document.createElement("script");
                        var innerScriptTextdoc = document.createTextNode(date_align)
                        date_script_doc.appendChild(innerScriptTextdoc)
                        
                        // appending to body tag
                        $("body").append(date_script_doc)
                }
                
            }
        });

        

    
    }
    

    loadCreative();
    
    setTimeout(()=>{
        if(asset_script != undefined && asset_script != ""){
            // $("body").append(asset_script);
            console.log("asset_script running ...")
        }else{
            if(localStorage.getItem("assets") != "" && localStorage.getItem("assets") != null){
            
            console.log("default running ...")
            
            var asst_url = JSON.parse(localStorage.getItem("assets"))
            path = localStorage.getItem("path")
            count = localStorage.getItem("count")
            a_rq = localStorage.getItem("asset_req")
            
            var dim_url = path.split("/")[2]
            var dim_wd = dim_url.split("x")[0]
            loadCreative();
                var box_dy = document.getElementById("dynadata"+dim_url);
                box_dy.innerHTML = "";
                a_rq.split(",").forEach(ar => {
                asst_url.forEach(el => {
                    var ast_id = el.Key.substring(el.Key.lastIndexOf('/')+1).split('.')[0]
                    
                    if(ast_id == "video"){
                        document.querySelector("source").src="https://hc-do.sgp1.cdn.digitaloceanspaces.com/"+el.Key+"?v="+el.LastModified;
                    }else if(ast_id.includes("play")==true){
                        document.querySelector("#homescreen").poster = "https://s.hcurvecdn.com/"+el.Key+"?v="+el.LastModified;
                    }else if(ast_id.includes("card")==true || ast_id.includes("color")==true){
                        
                            
                            if(ar == ast_id){
                                
                            var obj = {
                                key: el.Key,
                                modified: el.LastModified
                            }
                                card_ast.push(obj)
                            }
                        
                        localStorage.setItem("card_ast",JSON.stringify(card_ast))
                    }else if(ast_id.includes("left-arrow")==true || ast_id.includes("right-arrow")==true) {
                            
                            if(ast_id == ar){
                                
                            var obj = {
                                key: el.Key,
                                modified: el.LastModified
                            }
                                arrow_ast.push(obj)
                            }
                        localStorage.setItem("arrow_ast",JSON.stringify(arrow_ast))
                    }else {
                            if(ast_id == ar){
                                box_dy.innerHTML += `<img id="${ast_id}${dim_url}" style="position:absolute;width:${dim_wd}px;" src="https://s.hcurvecdn.com/${el.Key}?v=${el.LastModified}" />`
                        }
                    }
                    
                });
                })
                insertCreative_btn();                
            localStorage.setItem("assets","");
            window.location.reload();
        }
        }
    },500)
    
    function insertCreative_btn(){
                var creative_code = $("#aspectRatio").html();
                if(document.getElementById("wrap") != null){
                    if(document.getElementById("wrap").style.display != ""){
                    document.getElementById("wrap").style.removeProperty("display");
                    document.getElementById("homescreen").style.removeProperty("display");
                    document.getElementById("progress").style.width = "0%"
                    played = false;
                    }
                }
                $.ajax({
                    url : "insertcreative.php",
                    type : "POST",
                    dataType: "JSON",
                    data: {
                        id:  "<?php echo $id; ?>",
                        count: count,
                        content: creative_code.trim(),
                        fcat: "<?php echo $fcat; ?>",
                        asset_r: localStorage.getItem("asset_req"),
                    },
                    success : function(dt){
                        console.log(dt)
                    }
                });       
            } 
        
    function dim_check(dims){
        $.ajax({
            url : "dim_check.php",
            type : "POST",
            dataType: "JSON",
            data: {
                id:  "<?php echo $id; ?>",
                fcat: "<?php echo $fcat; ?>",
            },
            success : function(dt){
                console.log(dt)
                if(dt.status){
                    document.getElementById("dims_total").innerHTML = "Dimension done - ["+dt.dim.length+"/"+dims.length+"] - Total Dimension";
                }else{
                    var done_dim = dims.length - dt.dim.length;
                    document.getElementById("dims_total").innerHTML = "Dimension done - ["+done_dim+"/"+dims.length+"] - Total Dimension";
                }
                setTimeout(()=>{
                        dim_div = "";
                        dims.forEach((el,i)=>{
                        if(dt.dim.includes(el) && dt.status){
                            dim_div += "<button class='btn_chg' id='"+i+"' style='margin:5px 5px;border:none;background:#90EE90;font-weight:bold;width:100px;height:30px;border-radius:5px;cursor:pointer;'>"+el+"</button>";
                        }else{
                            dim_div += "<button style='margin:5px 5px;border:none;background:#FFCCCB;font-weight:bold;width:100px;height:30px;border-radius:5px;'>"+el+"</button>";
                        }
                        })

                        document.getElementById("dims_check").innerHTML = dim_div;
                        
                        var btn_ar =  document.getElementsByClassName('btn_chg');
                        for(var i=0;i<btn_ar.length;i++){
                            btn_ar[i].addEventListener("click",(e)=>{
                                count = e.target.id;
                                
                                if(count == (dim_count-1)){
                                    $("#sv_nxt").text("Proceed");
                                    $("#pro_msg").text("Click the Proceed button to continue");
                                }
                                if(count >= 0) {    
                                    $("#sv_nxt").text("Save & Next");
                                    $("#pro_msg").text("Click the Save & Next button to continue");
                                    
                                }
                                loadCreative();
                                
                            })
                        }
                        
                    },200)
            }
        });       
    }  
        
    
    $(document).on("click","#sv_nxt",function(e){
        e.preventDefault();
        if(creat_tp == "update"){
            msg_p = "update creative - Save button Dimension:"+dim_split;
        }else{
            msg_p = "New creative - Save button Dimension:"+dim_split;
        }
        $.ajax({
                    url : "log.php",
                    type : "POST",
                    dataType: "JSON",
                    data: {
                        fcat: "<?php echo $fcat; ?>",
                        adtag_type:adtag_type,
                        message: msg_p,
                    },
                    success : function(dt){
                        console.log(dt)
                    }
                });
        if(asset_script != undefined && asset_script != ""){
            if(asset_status){
                if(count < dim_count){
                    $("#pro_msg").text("Click the Save & Next button to continue");
                    insertCreative();
                    count++;
                    loadCreative();
                }
                if(count == dim_count){
                    $("#sv_nxt").text("Proceed");
                    $("#pro_msg").text("Click the Proceed button to continue");
                    localStorage.setItem("count",0);  
                    window.location = "../update/update.php?id=<?php echo $id; ?>";
                }
            }else{
                document.getElementById("asset_err").innerHTML = "<span style='color:red;'>Please upload assets</span>";
            }
        }else{
            if(document.getElementById("wrap") != null){
                if(document.getElementById("wrap").style.display != ""){
                document.getElementById("wrap").style.removeProperty("display");
                document.getElementById("homescreen").style.removeProperty("display");
                document.getElementById("progress").style.width = "0%"
                played = false;
                }
            }
            
            if(asset_status){
                if(count < dim_count){
                    
                    $("#pro_msg").text("Click the Save & Next button to continue");
                    insertCreative_btn();
                    count++;
                    loadCreative();
                    
                }
                if(count == (dim_count-1)){     
                    $("#sv_nxt").text("Proceed");
                    $("#pro_msg").text("Click the Proceed button to continue");
                    
                }
                if(count == dim_count){
                    insertCreative_btn();
                    localStorage.setItem("count",0);  
                    $("#pro_msg").text("Click the Proceed button to continue");
                    window.location = "../update/update.php?id=<?php echo $id; ?>";
                }
            }else{
                document.getElementById("asset_err").innerHTML = "<span style='color:red;'>Please upload assets</span>";
            }
        }
        
    })
        
    
    
    document.getElementById("no").addEventListener("click",()=>{
        document.getElementById("upd_ast_check").style.display="none";
    })
    document.getElementById("yes").addEventListener("click",()=>{
            localStorage.setItem("path",path);
            localStorage.setItem("count",count);    
            localStorage.setItem("asset_req",asset_req);   
            window.location = "./uploadimage.php?id=<?php echo $id; ?>";
    })
    
    $(document).on("click","#upload_assets",function(e){
        e.preventDefault();
        if(asset_status){
            document.getElementById("upd_ast_check").style.display="block";
            
        }else{
            localStorage.setItem("path",path);
            localStorage.setItem("count",count);    
            localStorage.setItem("asset_req",asset_req);   
            window.location = "./image2.php?id=<?php echo $id; ?>";
        }
    })
    
    $(document).on("click","#yes",function(e){
        var msg_p = "";
        if(creat_tp == "update"){
            msg_p = "update creative - assets updated - status:Yes Dimension:"+dim_split;
        }else{
            msg_p = "New creative - assets updated - status:Yes Dimension:"+dim_split;
        }
        $.ajax({
                    url : "log.php",
                    type : "POST",
                    dataType: "JSON",
                    data: {
                        fcat: "<?php echo $fcat; ?>",
                        adtag_type:adtag_type,
                        message: msg_p,
                    },
                    success : function(dt){
                        console.log(dt)
                    }
                });
    })
    
    $(document).on("click","#no",function(e){var msg_p = "";
        if(creat_tp == "update"){
            msg_p = "update creative - assets update - status:Yes Dimension:"+dim_split;
        }else{
            msg_p = "New creative - assets update - status:Yes Dimension:"+dim_split;
        }
        $.ajax({
                    url : "log.php",
                    type : "POST",
                    dataType: "JSON",
                    data: {
                        fcat: "<?php echo $fcat; ?>",
                        adtag_type:adtag_type,
                        message: msg_p,
                    },
                    success : function(dt){
                        console.log(dt)
                    }
                });
    })
    
    $(document).on("click",".new_assets",function(e){var msg_p = "";
        msg_p = "New creative - new assets - status:Yes Dimension:"+dim_split;
        $.ajax({
                    url : "log.php",
                    type : "POST",
                    dataType: "JSON",
                    data: {
                        fcat: "<?php echo $fcat; ?>",
                        adtag_type:adtag_type,
                        message: msg_p,
                    },
                    success : function(dt){
                        console.log(dt)
                    }
                });
    })

    $("#back").on("click",function(e){
        e.preventDefault();
        if(count > 0){
            count--;
            loadCreative();    
            $("#sv_nxt").text("Save & Next");
                    $("#pro_msg").text("Click the Save & Next button to continue");
        }else if(count<=0){
            window.location = "../template/index.php?id=<?php echo $id; ?>";
        }
    })
    
    $("#home").on("click",function(e){
        e.preventDefault();
        window.location = "../index.php";
    })

    
  
    });
    
    // async function loadApi() {
    //                     var response = await fetch("https://publisherplex.io/selfserve/feed/lineitem.php?id="+feed_url);
                        
    //                     var data = await response.json();
                        
    //                     return data;
    //                 }
    //                 loadApi().then(res => {
    //                     if(template_creative.includes("lineitem")){
    //                         for(let y in res){
    //                         for(var ih=0;ih<1;ih++){
    //                             var heading = Object.keys(res[y][ih]);
    //                             heading.forEach(el =>{
    //                                 if(el != "lineitem")
    //                                 document.getElementById("check_box").innerHTML += `<label style="font-size:20px;cursor:pointer;" for="${el}">${el}</label><input style="width:50px;cursor:pointer" id="${el}" type="checkbox" />`;
    //                             })
    //                         }
    //                         break;
    //                     }
    //                     }else{
    //                         document.getElementById("check_box").innerHTML += "<h1>Second</h1>"
    //                     }
    //                 })
</script>
</html>


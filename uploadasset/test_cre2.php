
<?php

    session_start();
    if(!$_SESSION['email']){
      header("location: ../login.php");
    }
    // error_reporting(E_ERROR | E_PARSE);
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
        #creative_table{
            display: flex;
            flex-direction: column;
            justify-content:center;
            align-items: center;
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
            top: 30%;
            left: 40%;
            width: 400px;
            height: 300px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0px 3px 8px rgba(0,0,0,0.4);
            z-index: 3000;
            display:none;
        }
        #upd_ast_box{
            width: 400px;
            height: 300px;
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
            animation: popup 3s 5 ease-in-out;
        }
        
        #sv_nxt{
            background: #90EE90;
            padding: 10px 20px;
            font-weight: bold;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            box-shadow: 0px 2px 6px rgba(0,0,0,0.4);
            animation: popup 3s 5 ease-in-out;
            animation-delay: 1.5s;
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
    </style>
</head>
<body>
    <div id="creative_box">
        <ul class="list-unstyled multi-steps">
    <li style="cursor:pointer;" id="updt_creat">Update Creative</li>
    <li style="cursor:pointer;" id="cam_inf">Campaign information</li>
    <li style="cursor:pointer;" id="temp">select template</li>
    <li class="is-active">Upload assets</li>
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
  <a href="../logout.php" style="position:absolute;top:5px;right:5px;color: #fff;background-color: #d9534f;border-color: #d43f3a;text-decoration: none;padding: 7px;border-radius: 5px">Logout</a>
  <?php
        if($_SESSION['creative_type'] == "update") { ?>
        <a href="../update/update.php?id=<?php echo $id ?>" style="position:absolute;top:5px;right:80px;color: #fff;background-color: green;border-color: #d43f3a;text-decoration: none;padding: 7px;border-radius: 5px">Update Animation</a>
    <?php } ?>
        <h2 style="text-align:center;">Upload Assets</h2>
        <h3 style="text-align:center;margin: 5px;">Selected Template Name</h3>
        <div id="save_nxt_btn">
            <button id="back">Back</button>
            <button id="home">Home</button>
        </div>
        <div id="api_check"></div>
        <div style="position:absolute;right:250px;font-weight:bold;font-size:1.05rem;">Use dummy assets for testing - <a target="_blank" href="https://drive.google.com/drive/folders/18GSWWOafnKQ0El050R7Z3ROUyMSVmEMj">Dummy assets</a></div>
        <div id="asset_err" style="display:flex;align-items:center;justify-content: center;"></div>
        <div id="dims_check" style="display:flex;align-items:center;justify-content: center;width:1200px;margin:15px auto;flex-wrap:wrap"></div>
        <div id="upd_ast_check">
            <div id="upd_ast_box">
                <span>Do you want update assets ?</span>
                <div id="upd_ast_btn">
                    <button id="yes" style='margin:5px 5px;border:none;background:#90EE90;font-weight:bold;width:100px;height:30px;border-radius:5px;cursor:pointer;'>Yes</button>
                    <button id="no" style='margin:5px 5px;border:none;background:#FFCCCB;font-weight:bold;width:100px;height:30px;border-radius:5px;cursor:pointer;'>No</button>
                </div>
            </div>
        </div>
        <!--<img style="width:20px" src="https://s.hcurvecdn.com/test/cursor.png" />-->
        <div id="creative_table"></div>
        <script>
        
            //   setTimeout(function(){ 
            //   var len=document.getElementsByTagName("th").length;
            //   var pos=document.getElementById("pro_msg");
            //   if(len<4){
            //   pos.style.left="-95px";
            //   pos.style.top="82px";
            //  }
            // else{
            //   pos.style.left="-37px";
            //   pos.style.top="134px";
            //   }
                 
            //   },1000);
      
        </script>
    </div>
</body>
<script>
      
         
        document.getElementById("updt_creat").addEventListener("click",()=>{
        window.location = "../update_creative.php";
    })
    document.getElementById("cam_inf").addEventListener("click",()=>{
        window.location = "../index.php";
    })
    document.getElementById("temp").addEventListener("click",()=>{
        window.location = "../template/index.php?id=<?php echo $id; ?>";
    })
    
    let id = "<?php echo $id; ?>";
    let fcat = "<?php echo $fcat; ?>";
    let count = localStorage.getItem("count") || 0;
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
    var aqi;
    var crt_date;
    var card_ast = [];
    var arrow_ast = [];

    $(document).ready(function(){
      
    function loadCreative(){
        $.ajax({
            url : "load2.php",
            type : "POST",
            dataType: "JSON",
            data: {
                id:  "<?php echo $id; ?>",
                count: count,
            },
            success : function(dt){
                console.log(dt)
                $("#creative_table").html(dt.content);
                $("body").append(dt.asset_script);
                $("head").append(dt.script)
                path = dt.path;
                asset_req = dt.assets;
                dim_count = dt.dimCnt;
                style_in = dt.style_in;
                asset_status = dt.asset_status;
                dim_arr = dt.dims
                geo_city = dt.city_data;
                default_city = dt.default_city;
                temp = dt.temp;
                weather = dt.weather;
                aqi = dt.aqi;
                crt_date = dt.current_date;
                
                dim_split = path.split("/")[2]
                localStorage.setItem("path",path);
                // Aspect Ratio
                let aspectRatio = document.querySelector("#aspectRatio");
                let width_bx;
                let height_bx;
                
                // Spliting width and height
                var dim_sp = dim_split.split("x")
                width_bx = dim_sp[0]
                height_bx = dim_sp[1]
                
                // aspect condition 
                if(width_bx > height_bx || Number(width_bx) > Number(height_bx)){
                    var scale_vl = 180/Number(width_bx);
                    aspectRatio.style.transform=`scale(${scale_vl.toFixed(2)})`;
                }else{
                    var scale_vl = 180/Number(height_bx);
                    aspectRatio.style.transform=`scale(${scale_vl.toFixed(2)})`;
                }

                var d = path.split("/")[2];
                if("dim"+d == localStorage.getItem("statdim"+d)){
                    console.log("hello")
                    algn_hd = document.querySelectorAll(".hide")
                    algn_hd.forEach(el => {
                        el.style.display="table-cell";
                        console.log(el)
                    });
                }
                if(count == (dim_count-1)){     
                    $("#sv_nxt").text("Proceed");
                }
                
                if(asset_status){
                    setTimeout(()=>{
                        document.getElementById("sv_nxt").style.display = "block"
                    },1500)
                }
                
                // if(geo_city != "" && asset_status){
                //     if(document.querySelector("#city_dv") == null){
                //         var divss = "<div id='city_dv' style='position:absolute;top:0;left:0;z-index:100;'><span id='city_name' style='text-transform:capitalize'>"+dt.default_city+"</span></div>";
                //         document.querySelector("#clickurl").innerHTML += divss;
                //     }
                
                //         document.getElementById("city_top").value = Number(document.getElementById("city_dv").style.top.replace(/px/g, ''));
                //         document.getElementById("city_left").value = Number(document.getElementById("city_dv").style.left.replace(/px/g, ''));
                //         document.getElementById("city_size").value = Number(document.getElementById("city_name").style.fontSize.replace(/px/g, ''));
                //         document.getElementById("city_transform").value = document.getElementById("city_name").style.textTransform;
    
                //         document.getElementById("city_top").addEventListener("keyup",(e)=>{
                //             document.getElementById("city_dv").style.top = e.target.value+"px";
                //         });
                //         document.getElementById("city_left").addEventListener("keyup",(e)=>{
                //             document.getElementById("city_dv").style.left = e.target.value+"px";
                //         });
                //         document.getElementById("city_color").addEventListener("change",(e)=>{
                //             document.getElementById("city_name").style.color = e.target.value;
                //         });
                //         document.getElementById("city_size").addEventListener("keyup",(e)=>{
                //             document.getElementById("city_name").style.fontSize = e.target.value+"px";
                //         });
                //         document.getElementById("city_transform").addEventListener("keyup",(e)=>{
                //             document.getElementById("city_name").style.textTransform = e.target.value;
                //         });
                // }
                if(geo_city != "" && asset_status == 'true'){
                    if(document.querySelector("#city_dv") == null){
                        var divss = "<div id='city_dv' style='position:absolute;top:0;left:0;'><span id='city_name' style='text-transform:capitalize'>"+dt.default_city+"</span></div>";
                        document.querySelector("#clickurl").innerHTML += divss;
                    }
                    
                        document.getElementById("city_top").value = Number(document.getElementById("city_dv").style.top.replace(/px/g, ''));
                        document.getElementById("city_left").value = Number(document.getElementById("city_dv").style.left.replace(/px/g, ''));
                        document.getElementById("city_size").value = Number(document.getElementById("city_name").style.fontSize.replace(/px/g, ''));
                        document.getElementById("city_transform").value = document.getElementById("city_name").style.textTransform;
                        document.getElementById("city_width").value = Number(document.getElementById("city_dv").style.width.replace(/px/g, ''));
                        document.getElementById("city_align").value = document.getElementById("city_dv").style.textAlign;
                        document.getElementById("city_family").value = document.getElementById("city_dv").style.fontFamily;
    
                        document.getElementById("city_top").addEventListener("keyup",(e)=>{
                            document.getElementById("city_dv").style.top = e.target.value+"px";
                        });
                        document.getElementById("city_left").addEventListener("keyup",(e)=>{
                            document.getElementById("city_dv").style.left = e.target.value+"px";
                        });
                        document.getElementById("city_color").addEventListener("change",(e)=>{
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
                        document.getElementById("city_family").addEventListener("keyup",(e)=>{
                            var style = document.createElement("style");
                            var innerStyle = `@font-face {
        font-family: "${e.target.value}";
        src: url("https://hcurvecdn.com/fonts/${e.target.value}.woff2");
    }`
                            document.getElementById("city_dv").style.fontFamily = e.target.value;
                        });
                        
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
            
                                document.getElementById("temp_top").addEventListener("keyup",(e)=>{
                                    document.getElementById("temp_div").style.top = e.target.value+"px";
                                });
                                document.getElementById("temp_left").addEventListener("keyup",(e)=>{
                                    document.getElementById("temp_div").style.left = e.target.value+"px";
                                });
                                document.getElementById("temp_color").addEventListener("change",(e)=>{
                                    document.getElementById("temp_c").style.color = e.target.value;
                                });
                                document.getElementById("temp_size").addEventListener("keyup",(e)=>{
                                    document.getElementById("temp_c").style.fontSize = e.target.value+"px";
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
                                        deg= "\u00B0";
                                        
                                    document.getElementById("temp_w").innerHTML = weather;
                            })
                            }
                            },1000)
                            `;
                            var innerScriptText = document.createTextNode(innerScript)
                            temp_script.appendChild(innerScriptText)
                            document.getElementById("aspectRatio").appendChild(temp_script)
                        }
                        
                        
                        document.getElementById("weath_top").value = Number(document.getElementById("temp_div").style.top.replace(/px/g, ''));
                        document.getElementById("weath_left").value = Number(document.getElementById("temp_div").style.left.replace(/px/g, ''));
                        document.getElementById("weath_size").value = Number(document.getElementById("temp_w").style.fontSize.replace(/px/g, ''));
                        
                        document.getElementById("weath_top").addEventListener("keyup",(e)=>{
                                    document.getElementById("wea_div").style.top = e.target.value+"px";
                                });
                        document.getElementById("weath_left").addEventListener("keyup",(e)=>{
                                    document.getElementById("wea_div").style.left = e.target.value+"px";
                                });
                        document.getElementById("weath_size").addEventListener("keyup",(e)=>{
                                    document.getElementById("temp_w").style.fontSize = e.target.value+"px";
                                });
                        document.getElementById("weath_color").addEventListener("change",(e)=>{
                                    document.getElementById("temp_w").style.color = e.target.value;
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
            
                                document.getElementById("aqi_top").addEventListener("keyup",(e)=>{
                                    document.getElementById("aqi_div").style.top = e.target.value+"px";
                                });
                                document.getElementById("aqi_left").addEventListener("keyup",(e)=>{
                                    document.getElementById("aqi_div").style.left = e.target.value+"px";
                                });
                                document.getElementById("aqi_color").addEventListener("change",(e)=>{
                                    document.getElementById("city_aqi").style.color = e.target.value;
                                });
                                document.getElementById("aqi_size").addEventListener("keyup",(e)=>{
                                    document.getElementById("city_aqi").style.fontSize = e.target.value+"px";
                                });
                    }
                }
                
                if(crt_date == 'true'){
                    if(document.querySelector("#date_dv") == null){
                            var div_date = "<div id='date_dv' style='position:absolute;top:0px;left:0;'><span id='date_nm' style='text-transform:capitalize;font-size:12px;'></span><input type='hidden' id='dt_hd' /></div>";
                            document.querySelector("#clickurl").innerHTML += div_date;
                            
                            var date_script = document.createElement("script");
                            var innerScript = `
                            var date_now = new Date();
                            var day_arr = ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];
                            var month_arr = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
                            var current_year = date_now.getFullYear();
                            var current_month = month_arr[date_now.getMonth()];
                            var current_month_short = current_month.substring(0,3);
                            var current_day = day_arr[date_now.getDay()];
                            var current_day_short = day_arr[date_now.getDay()].substring(0,3);
                            var current_date = date_now.getDate();
                            var current_hrs = date_now.getHours();
                            var current_mns = date_now.getMinutes();
                            var am_pm;
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
                            document.getElementById("date_nm").innerText = "";
                            document.getElementById("date_nm").innerText = document.getElementById("dt_hd").value.replace("fday",current_day).replace("fmonth",current_month).replace("hrs",current_hrs).replace("mns",current_mns).replace("date",current_date).replace("year",current_year).replace("ampm",am_pm).replace("hday",current_day_short).replace("hmonth",current_month_short);
                            `;
                            
                            
                            var innerScriptText = document.createTextNode(innerScript)
                            date_script.appendChild(innerScriptText)
                            document.getElementById("aspectRatio").appendChild(date_script)
                    }
                    
        
                    document.getElementById("date_format").addEventListener("keyup",(e)=>{
                            document.getElementById("dt_hd").value = e.target.value;
                            document.getElementById("date_nm").innerText = e.target.value.replace("fday",current_day).replace("fmonth",current_month).replace("hrs",current_hrs).replace("mns",current_mns).replace("date",current_date).replace("year",current_year).replace("ampm",am_pm).replace("hday",current_day_short).replace("hmonth",current_month_short);
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
                
                
                dim_check(dim_arr);
                localStorage.setItem("count",count);
            }
        });

        

    }

    loadCreative();
    
    if(localStorage.getItem("assets") != "" && localStorage.getItem("assets") != null){
        setTimeout(()=>{
            loadCreative();
        },1500)
    }
    
    // if(localStorage.getItem("assets") != "" && localStorage.getItem("assets") != null){
    //         console.log("hello")
    //         var asst_url = JSON.parse(localStorage.getItem("assets"))
    //         path = localStorage.getItem("path")
    //         count = localStorage.getItem("count")
    //         a_rq = localStorage.getItem("asset_req")
            
    //         var dim_url = path.split("/")[2]
    //         var dim_wd = dim_url.split("x")[0]
    //         loadCreative();
    //         setTimeout(() => {
    //             var box_dy = document.getElementById("dynadata"+dim_url);
    //             console.log(box_dy)
    //             box_dy.innerHTML = "";
    //             asst_url.forEach(el => {
    //                 var ast_id = el.Key.substring(el.Key.lastIndexOf('/')+1).split('.')[0]
                    
    //                 // if(ast_id.includes("card")==false){
    //                 //     a_rq.split(",").forEach(ar => {
    //                 //         if(ar == ast_id){
    //                 //             box_dy.innerHTML += `<img id="${ast_id}${dim_url}" style="position:absolute;width:${dim_wd}px;" src="https://s.hcurvecdn.com/${el.Key}?v=${el.LastModified}" />`
    //                 //     }
                        
    //                 //     })
    //                 // }else{
    //                 //     a_rq.split(",").forEach(ar => {
    //                 //         if(ar == ast_id){
    //                 //             var obj = {
    //                 //                 key: el.Key,
    //                 //                 modified: el.LastModified
    //                 //             }
    //                 //             card_ast.push(obj)
    //                 //         }
    //                 //     })
    //                 //     localStorage.setItem("card_ast",JSON.stringify(card_ast))
    //                 // }
    //                 if(ast_id == "video"){
    //                     document.querySelector("source").src="https://do.hockeycurve.com/"+el.Key+"?v="+el.LastModified;
    //                 }else if(ast_id.includes("play")==true){
    //                     document.querySelector("#homescreen").poster = "https://s.hcurvecdn.com/"+el.Key+"?v="+el.LastModified;
    //                 }else if(ast_id.includes("card")==true || ast_id.includes("color")==true){
    //                     a_rq.split(",").forEach(ar => {
                            
    //                         if(ar == ast_id){
                                
    //                         var obj = {
    //                             key: el.Key,
    //                             modified: el.LastModified
    //                         }
    //                             card_ast.push(obj)
    //                         }
    //                     })
    //                     localStorage.setItem("card_ast",JSON.stringify(card_ast))
    //                 }else if(ast_id.includes("left-arrow")==true || ast_id.includes("right-arrow")==true) {
    //                     a_rq.split(",").forEach(ar => {
                            
    //                         if(ar == ast_id){
                                
    //                         var obj = {
    //                             key: el.Key,
    //                             modified: el.LastModified
    //                         }
    //                             arrow_ast.push(obj)
    //                         }
    //                     })
    //                     localStorage.setItem("arrow_ast",JSON.stringify(arrow_ast))
    //                 }else {
                        
    //                     a_rq.split(",").forEach(ar => {
    //                         if(ar == ast_id){
    //                             box_dy.innerHTML += `<img id="${ast_id}${dim_url}" style="position:absolute;width:${dim_wd}px;" src="https://s.hcurvecdn.com/${el.Key}?v=${el.LastModified}" />`
    //                     }
                        
    //                     })
    //                 }
                    
    //             });
    //             insertCreative();
    //             // loadCreative();                
    //         localStorage.setItem("assets","");
    //         window.location.reload();
    //         }, 500);
    //         // loadCreative(); 
    //     }
        
    function dim_check(dims){
        $.ajax({
            url : "dim_check.php",
            type : "POST",
            dataType: "JSON",
            data: {
                id:  "<?php echo $id; ?>",
            },
            success : function(dt){
                console.log(dt)
                console.log(dims.length,dt.dim.length)
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
                                }
                                if(count >= 0) {    
                                    $("#sv_nxt").text("Save & Next");
                                }
                                loadCreative();
                                
                            })
                        }
                        
                    },200)
            }
        });       
    }  
        
    
    // $("#sv_nxt").on("click",function(e){
    //     e.preventDefault();
    //     if(document.getElementById("wrap") != null){
    //         if(document.getElementById("wrap").style.display != ""){
    //         document.getElementById("wrap").style.removeProperty("display");
    //         document.getElementById("homescreen").style.removeProperty("display");
    //         document.getElementById("progress").style.width = "0%"
    //         played = false;
    //         }
    //     }
        
    //     if(asset_status){
    //         if(count < dim_count){
    //             insertCreative();
    //             count++;
    //             loadCreative();
    //         }
    //         if(count == (dim_count-1)){     
    //             $("#sv_nxt").text("Proceed");
    //         }
    //         if(count == dim_count){
    //             localStorage.setItem("count",0);  
    //             window.location = "../update/update.php?id=<?php echo $id; ?>";
    //         }
    //     }else{
    //         document.getElementById("asset_err").innerHTML = "<span style='color:red;'>Please upload assets</span>";
    //     }
        
    // })
    
    $(document).on("click","#sv_nxt",function(e){
        e.preventDefault();
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
                insertCreative();
                count++;
                loadCreative();
            }
            if(count == (dim_count-1)){     
                $("#sv_nxt").text("Proceed");
            }
            if(count == dim_count){
                console.log("proceed")
                localStorage.setItem("count",0);  
            }
        }else{
            document.getElementById("asset_err").innerHTML = "<span style='color:red;'>Please upload assets</span>";
        }
        
    })
    
    document.getElementById("no").addEventListener("click",()=>{
        document.getElementById("upd_ast_check").style.display="none";
    })
    document.getElementById("yes").addEventListener("click",()=>{
            localStorage.setItem("path",path);
            localStorage.setItem("count",count);    
            localStorage.setItem("asset_req",asset_req);   
            window.location = "./image2.php?id=<?php echo $id; ?>";
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

    $("#back").on("click",function(e){
        e.preventDefault();
        if(count > 0){
            console.log(dim_count)
            count--;
            loadCreative();    
            $("#sv_nxt").text("Save & Next");
        }else if(count<=0){
            window.location = "../template/index.php?id=<?php echo $id; ?>";
        }
    })
    
    $("#home").on("click",function(e){
        e.preventDefault();
        window.location = "../index.php";
    })

    
  
    });
</script>
</html>


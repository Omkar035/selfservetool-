<?php 

    include "../conn.php";
    session_start();
    error_reporting(E_ERROR | E_PARSE);

    $id = $_POST['id'];
    $count = $_POST['count'];
    $fcat = $_POST['fcat'];
    $stat = true;
    $type = $_SESSION['creative_type'];
    $align_r = array();
    $output = "";

    $sql="SELECT * FROM `campaign_info` WHERE id='$id'";
    $data=mysqli_query($connectDB,$sql);
    if(mysqli_num_rows($data)>0){
        while($row=mysqli_fetch_assoc($data)){
            $template = $row['template'];
            $dimension = $row['dimension']; 
            $camp =  $row['campaign_name'];
            $client =  $row['client_name'];
            $adtagtype = $row['adtag_type'];
            $city_data = $row['city_data'];
            $default_city = $row['default_city'];
            $temp = $row['temp'];
            $weather = $row['weather'];
            $aqi = $row['aqi'];
            $current_date = $row['crt_date'];
            $countdown = $row['countdown'];
            $countdown_endtime = $row['countdown_endtime'];
            $d3_text = $row['3dtext'];
           

            $ep_dim = explode(",",$dimension);
            $dim_count = count($ep_dim);
            $single_dim = $ep_dim[$count];

            $sql_creatcode = "SELECT * FROM `creativecode` WHERE client='$client' AND campaign='$camp' AND dimension='$single_dim'";
            $data_creatcode=mysqli_query($connectDB,$sql_creatcode);

            if(mysqli_num_rows($data_creatcode)>0){
                $sql_temp="SELECT * FROM `templates` WHERE template_name='$template' AND dim='$single_dim'";
                $data_temp=mysqli_query($connectDB,$sql_temp);
                $row_temp=mysqli_fetch_assoc($data_temp);
                $asset_req = $row_temp['assets_req'];
                $script = $row_temp['script_tags'];
                $asset_script = $row_temp['upload_srcipt'];
                $style_in = explode(",",$row_temp['css_style']);
                $align_in;
                $im_lp_in;
                
                foreach($style_in as $cv){
                    if(strpos($cv, 'color')){
                        $align_in .= "<label>{$cv} : </label><input id='{$cv}' type='color' /></br>";
                    }else if(strpos($cv, 'tracker')  || strpos($cv, 'url')){
                        "<input type='hidden' />";
                    }else if(strpos($cv, 'text')){
                        $align_in .= "<label>{$cv} : </label><input id='{$cv}' type='text' /></br>";
                    }else if(strpos($cv, 'range')){
                        $align_in .= "<label>{$cv} : </label><input id='{$cv}' type='range' min='0' max='100' /></br>";
                    }else if($cv != ""){
                        $align_in .= "<label>{$cv} : </label><input id='{$cv}' type='number' /></br>";
                    }
                }
                
                $city_input = "<label>City top: </label><input type='number' id='city_top' /><br />
                                            <label>City left: </label><input type='number' id='city_left' /><br />
                                            <label>City color: </label><input type='color' id='city_color' /><br />
                                            <label>City font size: </label><input type='number' id='city_size' /><br />
                                            <label>City text transform: </label><input type='text' id='city_transform' /><br />
                                            <label>City width: </label><input type='number' id='city_width' /><br />
                                            <label>City text align: </label><input type='text' id='city_align' /><br />
                                            <label>City Zindex: </label><input type='text' id='city_zindex' /><br />
                                            <label>City font family: </label><input type='text' id='city_family' /><br />";
                
                $temp_input = "<label>Temp top: </label><input type='number' id='temp_top' /><br />
                                            <label>Temp left: </label><input type='number' id='temp_left' /><br />
                                            <label>Temp color: </label><input type='color' id='temp_color' /><br />
                                            <label>Temp font size: </label><input type='number' id='temp_size' /><br />
                                            <label>Temp font family: </label><input type='text' id='temp_family' /><br />";
                                            
                $weather_input = "<label>Weather top: </label><input type='number' id='weath_top' /><br />
                                            <label>Weather left: </label><input type='number' id='weath_left' /><br />
                                            <label>Weather color: </label><input type='color' id='weath_color' /><br />
                                            <label>Weather font size: </label><input type='number' id='weath_size' /><br />
                                            <label>Weather font family: </label><input type='text' id='weath_family' /><br />";
                                            
                $aqi_input = "<label>AQI top: </label><input type='number' id='aqi_top' /><br />
                                            <label>AQI left: </label><input type='number' id='aqi_left' /><br />
                                            <label>AQI color: </label><input type='color' id='aqi_color' /><br />
                                            <label>AQI font size: </label><input type='number' id='aqi_size' /><br />
                                            <label>AQI font family: </label><input type='text' id='aqi_family' /><br />";
                                            
                $date_input = "<label>Date format: </label><input type='text' id='date_format' /><br />
                                            <label>date top: </label><input type='number' id='date_top' /><br />
                                            <label>date left: </label><input type='number' id='date_left' /><br />
                                            <label>date color: </label><input type='color' id='date_color' /><br />
                                            <label>date font size: </label><input type='number' id='date_size' /><br />
                                            <label>date text transform: </label><input type='text' id='date_transform' /><br />
                                            <label>date width: </label><input type='number' id='date_width' /><br />
                                            <label>date zindex: </label><input type='number' id='date_zindex' /><br />
                                            <label>date text align: </label><input type='text' id='date_align' /><br />
                                            <label>date font family: </label><input type='text' id='date_family' /><br />";
                                            
                 $d3_text_input = "<label>Copy Text:</label><input type='text' id='copy_field' onkeyup='updateValue()'><br>
                                       <label for='letter_space'>Letter-Spacing:</label><input type='number' name='letter_space' value='170' id='letter_space'
                                           onkeyup='updateValue()'><br>
                                       <label for='text_color'>Text-Color:</label><input type='color' name='text_color' value='' id='text_color'
                                           oninput='updateValue()'><br>
                                       <label for='top'>Top:</label><input type='number' name='top' value='45' id='top' onkeyup='updateValue()'><br>
                                       <label for='angle'>Left:</label><input type='number' value='100' name='left' value='' id='left' onkeyup='updateValue()'><br>
                                       <label for='font-size'>Font-size:</label><input type='number' minlength='' maxlength='' name='font_size' value='50'
                                           id='font_size' onkeyup='updateValue()'><br>
                                       <label for='font_fam'>Font-Family:</label><input type='text' name='font_fam' id='font_fam' onkeyup='updateValue()'><br>
                                       <label for='per_sept'>Perspective:</label><input type='number' name='per_sept' id='per_sept' value='500'
                                           onkeyup='updateValue()'><br>
                                       <label for='w_text'>Text Shadow Position:</label>
                                       <label for='w_text' style='display: block;'>X Axis:</label><input style='width: 50px;' type='number' name='x_axe'
                                           id='x_axe' value='2' size='25' onkeyup='updateValue()'><br>
                                       <label for='w_text' style='display: block;'>Y Axis:</label><input style='width: 50px;' type='number' name='y_axe'
                                           id='y_axe' value='2' size='25' onkeyup='updateValue()'><br>
                                       <label for='w_text' style='display: block;'>Blurriness:</label><input style='width: 50px;' type='number' name='blur'
                                           id='blur' value='' size='25' onkeyup='updateValue()'><br>
                                       <label for='w_text' style='display: block;'>Shadow Color:</label><input style='width: 50px;' type='color'
                                           name='sh_color' id='sh_color' value='' size='25' oninput='updateValue()'><br>
                                       <label for='rotation'>Rotation:</label><input type='text' value='clock' name='rotation' id='rotation'
                                           onkeyup='updateValue()'><br>
                                                                              <label for='rotor_speed'>Rotation speed:</label><input type='number' name='rotor_speed' value='10' id='rotor_speed'
                                           onkeyup='updateValue()'><br>
                                       ";
                
                if($city_data != "" && $temp == 'false' && $weather == 'false' && $aqi == 'false'){
                            
                            $city_align_head = "<th>City Alignment</th>";
                            $cit_align = "<td class='city_align'>
                                            {$city_input}
                                        </td>";
                    $align_r["city_data"]=$city_input;
                }else if($city_data != "" && $temp == 'true' && $weather == 'false' && $aqi == 'false'){
                    $city_align_head = "<th>City/Temp Alignment</th>";
                            $cit_align = "<td class='city_temp_align'>
                                            {$city_input}
                                            {$temp_input}
                                        </td>";
                    $align_r["city_data"]=$city_input;
                    $align_r["temp_data"]=$temp_input;
                }else if($city_data != "" && $temp == 'false' && $weather == 'true' && $aqi == 'false'){
                    $city_align_head = "<th>City/Weather Alignment</th>";
                            $cit_align = "<td class='city_temp_align'>
                                            {$city_input}
                                            {$weather_input}
                                        </td>";
                    $align_r["city_data"]=$city_input;
                    $align_r["weather_data"]=$weather_input;
                }else if($city_data != "" && $temp == 'false' && $weather == 'false' && $aqi == 'true'){
                    $city_align_head = "<th>City/AQI Alignment</th>";
                            $cit_align = "<td class='city_temp_align'>
                                            {$city_input}
                                            {$aqi_input}
                                        </td>";
                    $align_r["city_data"]=$city_input;
                    $align_r["aqi_data"]=$aqi_input;
                }else if($city_data != "" && $temp == 'true' && $weather == 'true' && $aqi == 'false'){
                    $city_align_head = "<th>City/Temp/Weather Alignment</th>";
                            $cit_align = "<td class='city_temp_align'>
                                            {$city_input}
                                            {$temp_input}
                                            {$weather_input}
                                        </td>";
                    $align_r["city_data"]=$city_input;
                    $align_r["temp_data"]=$temp_input;
                    $align_r["weather_data"]=$weather_input;
                }else if($city_data != "" && $temp == 'true' && $weather == 'false' && $aqi == 'true'){
                    $city_align_head = "<th>City/Temp/AQI Alignment</th>";
                            $cit_align = "<td class='city_temp_align'>
                                            {$city_input}
                                            {$temp_input}
                                            {$aqi_input}
                                        </td>";
                    $align_r["city_data"]=$city_input;
                    $align_r["temp_data"]=$temp_input;
                    $align_r["aqi_data"]=$aqi_input;
                }else if($city_data != "" && $temp == 'false' && $weather == 'true' && $aqi == 'true'){
                    $city_align_head = "<th>City/Weather/AQI Alignment</th>";
                            $cit_align = "<td class='city_temp_align'>
                                            {$city_input}
                                            {$weather_input}
                                            {$aqi_input}
                                        </td>";
                    $align_r["city_data"]=$city_input;
                    $align_r["weather_data"]=$weather_input;
                    $align_r["aqi_data"]=$aqi_input;
                }else if($city_data != "" && $temp == 'true' && $weather == 'true' && $aqi == 'true'){
                    $city_align_head = "<th>City/Temp/Weather/AQI Alignment</th>";
                            $cit_align = "<td class='city_temp_align'>
                                            {$city_input}
                                            {$temp_input}
                                            {$weather_input}
                                            {$aqi_input}
                                        </td>";
                    $align_r["city_data"]=$city_input;
                    $align_r["temp_data"]=$temp_input;
                    $align_r["weather_data"]=$weather_input;
                    $align_r["aqi_data"]=$aqi_input;
                }
                
                if($current_date == 'true'){
                    $date_head = "<th>Current Date Alignment</th>";
                            $date_body = "<td class='date_align'>
                                            {$date_input}
                                        </td>";
                    $align_r["current_date"]=$date_input;
                }
                
                if($countdown == 'true' && $countdown_endtime != ""){
                    $count_head = "<th>Countdown Alignment</th>";
                            $count_body = "<td class='date_align'>
                                            {$count_input}
                                        </td>";
                    $align_r["countdown"]=$count_input;
                }
                
                if($d3_text == 'true'){
                    $d3_head = "<th>3d Text Alignment</th>";
                            $d3_body = "<td class='3d_text_hedd'>
                                            {$d3_text_input}
                                        </td>";
                    $align_r["d3text"]=$d3_text_input;
                }

                while($row_creatcode=mysqli_fetch_assoc($data_creatcode)){
                    $temp_cre = $row_creatcode['name'];
                        $dim_cre = $row_creatcode['dimension'];
                        $content_cre = $row_creatcode['content'];
                        $asset_used = $row_creatcode['asset_used'];
                        
                        if($align_in != null){
                            $algn_var = "<th>Alignment</th>";
                            $algn_td = "<td>
                                            {$align_in}
                                        </td>";
                    $align_r["creative alignment"]=$align_in;
                        }
                        
                        $num = $count+1;
                        
                        $output = "
                            <h3 style='text-align:left;margin: 10px;font-size: 1.3rem;'>Template : {$temp_cre}</h3>
                            <h4 style='text-align:left;margin: 10px;font-size: 1.3rem;'>Ad Size : {$dim_cre}</h4>
                            <table  style='width:auto;margin:20px 0px;height:500px;'>
                                <thead>
                                    <tr>
                                        <th>Ad Size</th>
                                        <th>Previews</th>
                                        <th id='upload_asset'>Update Assets</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td style='position:relative;text-align:center;vertical-align: top;top: 10px;'>{$dim_cre}</td>
                                        <td style='position:relative;width:300px;height:180px;overflow:hidden;'>
                                            <div id='aspectRatio' style='position:absolute;top:0;left:0;'>
                                                {$content_cre}
                                            </div>
                                        </td>
                                        <td style='position:relative;width:100%;height:100%;text-align:center;display:flex;flex-direction:column;justify-content:space-evenly;align-items:center'>
                                            <button id='upload_assets' class='update_assets' style='position: absolute;top: 10px;left: 9px;'>Update</button>
                                            <button type='button' id='sv_nxt' style='display:none;position: absolute;top: 80px;'>Save & Next</button>
                                            <div style='position:relative;color:green;white-space:nowrap;display:none'><span id='pro_msg'>Click the proceed button to continue</span></div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        ";
                    
            }
            $path = "$client/$camp/$single_dim";
            $resp = array("status"=>true,"template"=>$template,"content"=>$output,"path"=>$path,"assets"=>$asset_used,"dimCnt"=>$dim_count,"style_in"=>$style_in,"script"=>$script,"dims"=>$ep_dim,"type"=>$adtagtype,"asset_status"=>true,"city_data"=>$city_data,"default_city"=>$default_city,"asset_script"=>$asset_script,"temp"=>$temp,"weather"=>$weather,"aqi"=>$aqi,"current_date"=>$current_date,"countdown"=>$countdown,"countdown_endtime"=>$countdown_endtime,"table"=>$date_input,"table2"=>$align_r,'d3text'=>$d3_text);
            echo json_encode($resp);
            }
            else{
                $sql_temp="SELECT * FROM `templates` WHERE template_name='$template' AND dim='$single_dim'";
                $data_temp=mysqli_query($connectDB,$sql_temp);
                if(mysqli_num_rows($data_temp)>0){
                    while($row_temp=mysqli_fetch_assoc($data_temp)){
                        $temp = $row_temp['template_name'];
                        $dim = $row_temp['dim'];
                        $content = $row_temp['master_code'];
                        $asset_req = $row_temp['assets_req'];
                        $asset_script = $row_temp['upload_srcipt'];
                        $style_in = explode(",",$row_temp['css_style']);
                        $num = $count+1;
                        $output = "
                            <h3 style='text-align:center;margin: 10px;font-size: 1.3rem;'>Template : {$temp}</h3>
                            <h4 style='text-align:center;margin: 10px;font-size: 1.3rem;'>Ad Size : {$dim}</h4>
                            <table style='width:auto;margin:20px 0px;height:500px;'>
                                <thead>
                                    <tr>
                                        <th>Ad Size</th>
                                        <th style='display:none;'>Previews</th>
                                        <th>Upload Assets</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td style='position:relative;text-align:center;vertical-align: top;top: 10px;'>{$dim}</td>
                                        <td style='position:relative;width:180px;height:180px;overflow:hidden;display:none;'>
                                            <div id='aspectRatio' style='position:absolute;top:0;left:0;'>
                                                {$content}
                                            </div>
                                        </td>
                                        <td style='position:relative;text-align:center;width:100px;height:180px;'>
                                            <button id='upload_assets' class='new_assets' style='position: absolute;top: 10px;left: 9px;'>Upload</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        ";
                    }
                    $path = "$client/$camp/$single_dim";
                    $resp = array("status"=>true,"content"=>$output,"path"=>$path,"assets"=>$asset_req,"dimCnt"=>$dim_count,"style_in"=>$style_in,"script"=>$script,"dims"=>$ep_dim,"type"=>$adtagtype,"asset_status"=>false,"city_data"=>$city_data,"default_city"=>$default_city,"asset_script"=>$asset_script);
                    echo json_encode($resp);
                }else{
                    echo "<span>Error</span>";
                }
            }
            
        }
    }else{
        echo "<span>Hello</span>";
    }
?>
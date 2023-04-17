<?php 

    include "../conn.php";
    session_start();
    // error_reporting(E_ERROR | E_PARSE);

    $id = $_POST['id'];
    $count = $_POST['count'];
    $fcat = $_POST['fcat'];
    $stat = true;
    $type = $_SESSION['creative_type'];
    $cpm_rep = $_SESSION['campaign_name_rep'];
    $replica_arr = [];
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
            $feed = $row['feed'];
            $feed_url = $row['feed_url'];

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
                $test = $row_temp['test'];
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
                    }else if($cv != ""){
                        $align_in .= "<label>{$cv} : </label><input id='{$cv}' type='number' /></br>";
                    }
                }
                
                $city_input = "<lablel>City top: </label><input type='number' id='city_top' /><br />
                                            <lablel>City left: </label><input type='number' id='city_left' /><br />
                                            <lablel>City color: </label><input type='color' id='city_color' /><br />
                                            <lablel>City font size: </label><input type='number' id='city_size' /><br />
                                            <lablel>City text transform: </label><input type='text' id='city_transform' /><br />
                                            <lablel>City width: </label><input type='number' id='city_width' /><br />
                                            <lablel>City text align: </label><input type='text' id='city_align' /><br />
                                            <lablel>City Zindex: </label><input type='text' id='city_zindex' /><br />
                                            <lablel>City font family: </label><input type='text' id='city_family' /><br />";
                
                $temp_input = "<lablel>Temp top: </label><input type='number' id='temp_top' /><br />
                                            <lablel>Temp left: </label><input type='number' id='temp_left' /><br />
                                            <lablel>Temp color: </label><input type='color' id='temp_color' /><br />
                                            <lablel>Temp font size: </label><input type='number' id='temp_size' /><br />";
                                            
                $weather_input = "<lablel>Weather top: </label><input type='number' id='weath_top' /><br />
                                            <lablel>Weather left: </label><input type='number' id='weath_left' /><br />
                                            <lablel>Weather color: </label><input type='color' id='weath_color' /><br />
                                            <lablel>Weather font size: </label><input type='number' id='weath_size' /><br />";
                                            
                $aqi_input = "<lablel>AQI top: </label><input type='number' id='aqi_top' /><br />
                                            <lablel>AQI left: </label><input type='number' id='aqi_left' /><br />
                                            <lablel>AQI color: </label><input type='color' id='aqi_color' /><br />
                                            <lablel>AQI font size: </label><input type='number' id='aqi_size' /><br />";
                                            
                $date_input = "<lablel>Date format: </label><input type='test' id='date_format' /><br />
                                            <lablel>date top: </label><input type='number' id='date_top' /><br />
                                            <lablel>date left: </label><input type='number' id='date_left' /><br />
                                            <lablel>date color: </label><input type='color' id='date_color' /><br />
                                            <lablel>date font size: </label><input type='number' id='date_size' /><br />
                                            <lablel>date text transform: </label><input type='text' id='date_transform' /><br />
                                            <lablel>date width: </label><input type='number' id='date_width' /><br />
                                            <lablel>date zindex: </label><input type='number' id='date_zindex' /><br />
                                            <lablel>date text align: </label><input type='text' id='date_align' /><br />
                                            <lablel>date font family: </label><input type='text' id='date_family' /><br />";
                                            
                $count_input = "<lablel>Count format: </label><input type='test' id='count_format' /><br />
                                            <lablel>count top: </label><input type='number' id='count_top' /><br />
                                            <lablel>count left: </label><input type='number' id='count_left' /><br />
                                            <lablel>count color: </label><input type='color' id='count_color' /><br />
                                            <lablel>count font size: </label><input type='number' id='count_size' /><br />
                                            <lablel>count text transform: </label><input type='text' id='count_transform' /><br />
                                            <lablel>count width: </label><input type='number' id='count_width' /><br />
                                            <lablel>count zindex: </label><input type='number' id='count_zindex' /><br />
                                            <lablel>count text align: </label><input type='text' id='count_align' /><br />
                                            <lablel>count font family: </label><input type='text' id='count_family' /><br />
                                            <lablel>count font letter spacing: </label><input type='number' id='count_letter' /><br />";
                
                if($city_data != "" && $temp == 'false' && $weather == 'false' && $aqi == 'false'){
                            
                            $city_align_head = "<th>City Alignment</th>";
                            $cit_align = "<td class='city_align'>
                                            {$city_input}
                                        </td>";
                }else if($city_data != "" && $temp == 'true' && $weather == 'false' && $aqi == 'false'){
                    $city_align_head = "<th>City/Temp Alignment</th>";
                            $cit_align = "<td class='city_temp_align'>
                                            {$city_input}
                                            {$temp_input}
                                        </td>";
                }else if($city_data != "" && $temp == 'false' && $weather == 'true' && $aqi == 'false'){
                    $city_align_head = "<th>City/Weather Alignment</th>";
                            $cit_align = "<td class='city_temp_align'>
                                            {$city_input}
                                            {$weather_input}
                                        </td>";
                }else if($city_data != "" && $temp == 'false' && $weather == 'false' && $aqi == 'true'){
                    $city_align_head = "<th>City/AQI Alignment</th>";
                            $cit_align = "<td class='city_temp_align'>
                                            {$city_input}
                                            {$aqi_input}
                                        </td>";
                }else if($city_data != "" && $temp == 'true' && $weather == 'true' && $aqi == 'false'){
                    $city_align_head = "<th>City/Temp/Weather Alignment</th>";
                            $cit_align = "<td class='city_temp_align'>
                                            {$city_input}
                                            {$temp_input}
                                            {$weather_input}
                                        </td>";
                }else if($city_data != "" && $temp == 'true' && $weather == 'false' && $aqi == 'true'){
                    $city_align_head = "<th>City/Temp/AQI Alignment</th>";
                            $cit_align = "<td class='city_temp_align'>
                                            {$city_input}
                                            {$temp_input}
                                            {$aqi_input}
                                        </td>";
                }else if($city_data != "" && $temp == 'false' && $weather == 'true' && $aqi == 'true'){
                    $city_align_head = "<th>City/Weather/AQI Alignment</th>";
                            $cit_align = "<td class='city_temp_align'>
                                            {$city_input}
                                            {$weather_input}
                                            {$aqi_input}
                                        </td>";
                }else if($city_data != "" && $temp == 'true' && $weather == 'true' && $aqi == 'true'){
                    $city_align_head = "<th>City/Temp/Weather/AQI Alignment</th>";
                            $cit_align = "<td class='city_temp_align'>
                                            {$city_input}
                                            {$temp_input}
                                            {$weather_input}
                                            {$aqi_input}
                                        </td>";
                }
                
                if($current_date == 'true'){
                    $date_head = "<th>Current Date Alignment</th>";
                            $date_body = "<td class='date_align'>
                                            {$date_input}
                                        </td>";
                }
                
                if($countdown == 'true' && $countdown_endtime != ""){
                    $count_head = "<th>Countdown Alignment</th>";
                            $count_body = "<td class='date_align'>
                                            {$count_input}
                                        </td>";
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
                        }
                        
                        $num = $count+1;
                        
                        $output = "
                            <h3 style='text-align:center;margin: 10px;'>{$temp_cre}</h3>
                            <h4 style='text-align:center;margin: 10px;'>{$dim_cre}</h4>
                            <table  style='width:auto;'>
                                <thead>
                                    <tr>
                                        <th>Ad Size</th>
                                        <th>Previews</th>
                                        <th id='upload_asset'>Update Assets</th>
                                        {$algn_var}
                                        {$city_align_head}
                                        {$date_head}
                                        {$count_head}
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td style='position:relative;text-align:center;'>{$dim_cre}</td>
                                        <td style='position:relative;width:180px;height:180px;overflow:hidden;'>
                                            <div id='aspectRatio' style='position:absolute;top:0;left:0;'>
                                                {$content_cre}
                                            </div>
                                        </td>
                                        <td style='position:relative;width:100%;height:180px;text-align:center;display:flex;flex-direction:column;justify-content:space-evenly;align-items:center'>
                                            <button id='upload_assets'>Update</button>
                                            <button type='button' id='sv_nxt' style='display:none'>Save & Next</button>
                                            <div style='position:relative;color:green;white-space:nowrap;'><span id='pro_msg'>Click the proceed button to continue</span></div>
                                        </td>
                                        {$algn_td}
                                        {$cit_align}
                                        {$date_body}
                                        {$count_body}
                                    </tr>
                                </tbody>
                            </table>
                        ";
                    
            }
            $path = "$client/$camp/$single_dim";
            $resp = array("status"=>true,"sql"=>array_diff($dim_v,$replica_arr),"template"=>$template,"content"=>$output,"path"=>$path,"assets"=>$asset_used,"dimCnt"=>$dim_count,"style_in"=>$style_in,"script"=>$script,"dims"=>$ep_dim,"asset_status"=>true,"city_data"=>$city_data,"default_city"=>$default_city,"asset_script"=>$asset_script,"temp"=>$temp,"weather"=>$weather,"aqi"=>$aqi,"current_date"=>$current_date,"countdown"=>$countdown,"countdown_endtime"=>$countdown_endtime,"feed"=>$feed,"feed_sheet"=>$feed_url);
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
                            <h3 style='text-align:center;margin: 10px;'>{$temp}</h3>
                            <h4 style='text-align:center;margin: 10px;'>{$dim}</h4>
                            <table style='width:300px;'>
                                <thead>
                                    <tr>
                                        <th>Ad Size</th>
                                        <th style='display:none;'>Previews</th>
                                        <th>Upload Assets</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td style='position:relative;text-align:center;width:100px;height:180px;'>{$dim}</td>
                                        <td style='position:relative;width:180px;height:180px;overflow:hidden;display:none;'>
                                            <div id='aspectRatio' style='position:absolute;top:0;left:0;'>
                                                {$content}
                                            </div>
                                        </td>
                                        <td style='position:relative;text-align:center;width:100px;height:180px;'>
                                            <button id='upload_assets'>Upload</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        ";
                    }
                    $path = "$client/$camp/$single_dim";
                    $resp = array("status"=>$test,"content"=>$output,"path"=>$path,"assets"=>$asset_req,"dimCnt"=>$dim_count,"style_in"=>$style_in,"script"=>$script,"dims"=>$ep_dim,"type"=>$adtagtype,"asset_status"=>false,"asset_script"=>$asset_script);
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
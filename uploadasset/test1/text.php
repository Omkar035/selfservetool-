<?php

include "../conn.php";
session_start();
error_reporting(E_ERROR | E_PARSE);

$autofcat="";
  $characters = 'abcdefghijklmnopqrstuvwxyz0123456789';
  $charCount = strlen($characters);
  for($i=0;$i<6;$i++){
    $autofcat.= substr($characters,rand(0,$charCount),1);
  }

$id=$_GET['id'];
if(isset($_POST['id'])) {
    $id=$_GET['id'];
}

$sql1="SELECT * FROM `campaign_info` WHERE id='$id'";
$data1=mysqli_query($connectDB,$sql1);
if(mysqli_num_rows($data1)>0){
    while($row1=mysqli_fetch_assoc($data1)){
    $camp =  strtolower($row1['campaign_name']);
    $client =  str_replace(" ","",strtolower($row1['client_name']));   
    $template = $row1['template'];
    $dimension = $row1['dimension']; 
}}

$path = "$client/$camp/$dimension";

$_SESSION['urlpath'] = $path;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Upload Assets</title>

    <style>
        .slt_tmp{
            width: 100%;
            display: flex;
            justify-content:center;
        }
        table{
            width: 80%; 
        }
        table,tr,td,th{
            border: 1px solid #000;
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

    </style>
</head>
<body>
    <div class="upload_cnt">
        <h2 style="text-align:center;">Upload Assets</h2>
        <h3 style="text-align:center;">Selected Template Name</h3>
        <form method="POST">
                <input id="htmlcode" type="hidden" name="htmlcode" />
                <input id="landing_url" type="hidden" name="landing_url" />
                <input id="imperession_trk" type="hidden" name="imperession_trk" />
                <button onclick="proceed()" name="submit">proceed</button>
                <!-- <button onclick="update()" name="update">Update</button> -->
        <div class="slt_tmp">
            <table>
                <thead>
                    <tr>
                        <th>Ad Size</th>
                        <th>Previews</th>
                        <th>Upload Assets</th>
                        <th>Alignment</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $sql="SELECT * FROM `templates` WHERE template_name='$template' AND dim='$dimension'";

                    $data=mysqli_query($connectDB,$sql);
                    if(mysqli_num_rows($data)>0){
                        while($row=mysqli_fetch_assoc($data)){

                            $dim = $row['dim'];
                            $tmp_name = $row['template_name'];
                            $script = $row['script_tags'];
                            $_SESSION['assets'] = $row['assets_req'];
                            $style = $row['css_style'];
                            ?>
                            <tr>
                                <td style="text-align:center;"><?php echo $row['dim']; ?></td>
                                <td style="position:relative;width:180px;height:180px;">
                                    <div id="aspectRatio" style="position:absolute;top:0;left:0">
                                    <?php $code = isset($_POST['submit']) ? $_POST['htmlcode'] : $row['master_code']; 
                                        echo $code;
                                    ?>
                                    </div>
                                </td>
                                <td style="position:relative;text-align:center;">
                                    <button type="button"><a href="https://publisherplex.io/selfserve/uploadasset/uploadimage.php?id=<?php echo $id; ?>">Upload</a></button>
                                </td>
                                <td style="position:relative;text-align:center;">
                                    <button id="upload_asset" type="button" onclick="uploadAssets()">Alignment</button>
                                </td>
                            </tr>
                            <?php
                        }}  
                ?>
                </tbody>
            </table>
            
        </div>
        <div class="slt_tmp align_stl">
        <table>
                <thead>
                    <tr>
                    <th>Creative alignment</th>
                        <th>Landing URL / Imperession Tracker</th>
                    </tr>
                </thead>
                <tbody>
                        <tr>
                        <td id="searchalign" style="text-align:center;">
                            <?php 
                                $id_inp = explode(',',$style);
                                foreach($id_inp as $vl){
                                    if(strpos($vl, 'color')){
                                        echo "<label>".$vl. ":</label> <input type='color' id='".$vl."' />  <br>";
                                    }else if(strpos($vl, 'tracker')  || strpos($vl, 'url')){
                                        echo "<input type='hidden' />";
                                    }else {
                                        echo "<label>".$vl. ":</label> <input type='text' id='".$vl."' />  <br>";
                                    }
                                }
                            ?>
                                </td>
                                <td id="lp_imp" style="text-align:center;">
                                    <?php 
                                        $id_inpt = explode(',',$style);
                                        foreach($id_inpt as $vl1){
                                            if(strpos($vl1, 'tracker') || strpos($vl1, 'url')){
                                                echo "<label>".$vl1. ":</label> <input type='text' id='".$vl1."' />  <br>";
                                            }
                                        }
                                    ?>
                                </td>
                        </tr>
                </tbody>
            </table>
        </div>
    </div>
    </form>
    <?php
   
        if(isset($_POST['submit'])){
            $htmlcode = $_POST['htmlcode'];
            $landing_url = $_POST['landing_url'];
            $imperession_trk = $_POST['imperession_trk'];
            // echo $htmlcode;
            $sql1 = "INSERT INTO creativecode (name,campaign,type,cdata,client,dimension,filter,status,content,clicks,impressions) VALUES ('$tmp_name','searchtile','static','popular','plumsearch','$dim','$autofcat','active','$htmlcode','$landing_url','$imperession_trk')";
            $data1=mysqli_query($connectDB,$sql1);
            if($data1){
                
            }
        }

    ?>
</body>

<script>

    // Aspect Ratio
    let aspectRatio = document.querySelector("#aspectRatio");
    let dim = "<?php echo $dim; ?>"
    let width_bx;
    let height_bx;
    
    // Spliting width and height
    width_bx = dim.split("x")[0]
    height_bx = dim.split("x")[1]

    // aspect condition 
    if(width_bx > height_bx){
        var scale_vl = 180/Number(width_bx);
        aspectRatio.style.transform=`scale(${scale_vl})`;
    }else{
        var scale_vl = 180/Number(height_bx);
        aspectRatio.style.transform=`scale(${scale_vl})`;
    }
    
    function uploadAssets(){
        // document.querySelector(".upd_ast").classList.toggle("active");
        document.querySelector(".align_stl").classList.toggle("active")
    }

    function proceed(){
        document.querySelector("#htmlcode").value = aspectRatio.innerHTML.trim();
        document.querySelector("#landing_url").value = document.getElementById("clicktracker").value;
        document.querySelector("#imperession_trk").value = document.getElementById("impressiontracker").value;
        console.log(document.querySelector("#htmlcode").value)
    }

    function update(){
        document.querySelector("#htmlcode").value = aspectRatio.innerHTML.trim();
        console.log(document.querySelector("#htmlcode").value)
    }
    
    if(<?php echo $_SESSION['ast_val']; ?> == 1){
        var dy_bx = document.getElementById("dynadata<?php echo $dimension; ?>")
        dy_bx.innerHTML = "";
        var all_ast = "<?php echo $_SESSION['assets']; ?>";
        all_ast.split(',').forEach(al => {
            var imgs = `<img id="${al}" style="position:absolute;width:${width_bx}px" src="https://s.hcurvecdn.com/<?php echo $path; ?>/${al}.webp" alt="${al}" />`;
            dy_bx.innerHTML += imgs;
        })
        <?php $_SESSION['ast_val'] = 0 ?>
    }

</script>
<?php echo $script; ?>
</html>
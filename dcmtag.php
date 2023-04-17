<?php
include "./conn.php";
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
  <title>Previews</title>
  <style>
    #btn {
      margin-left: 25px;
    }
  </style>
</head>

<body>
  <div>
    <?php 
      $sql="SELECT * FROM `creativecode` WHERE id=$id LIMIT 1";
      $result=mysqli_query($connectDB,$sql);
      $row=mysqli_fetch_assoc($result);
    ?>
    <h2 style="margin-left: 25px;"><?php echo $row['campaign_name']?></h2>
    <br><br>
    <button id="btn" onclick="history.back();">back</button>
  </div>
  <br>
<form  method="post">
 <p>Test Lp: <input type="text" name="landingurl" /></p>
 <p><input type="submit" /></p>
</form>

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
          $fdims=$row['dims'];
          $f_arr=explode("||",$fdims);
          $fcat_s=explode(",",$row['fcat']);
          $i=0;
          for($jas=0 ; $jas < count($fcat_s);$jas++){
            $fcat=$fcat_s[$jas];
          
          $str_arr = explode (",", $f_arr[$jas]);
          $j = 0;
          while($j < count($str_arr)){
            $wh_dim=explode("x",$str_arr[$j])?>
            <tr>   
              <td><?php echo $str_arr[$j]?></td>
              <td>
              <?php 
                if ($row["fcat_n"]==""){
                    if($row["fcat_n"]=="s"){
                        if ($row["geo"]==""){                                                 
                            if($row["adtag_type"]=="DCM"){
                           ?> <div class='hockeycurve-v1'>
                           <iframe id='main-ad-tag<?php echo $i ?>' frameborder='0' scrolling='no' width='<?php echo $wh_dim[0] ?>' height='<?php echo $wh_dim[1] ?>'></iframe>
                           <script type='text/javascript'>
                           var params = {'client':'<?php echo $row['client']?>','fcat':'<?php echo $fcat?>','ct0':'%c_esc','cb':'%n','dbmc':'<?php echo $fcat?>'}
                           var cs = '';
                           for (var p in params) {
                           cs += '&' + encodeURIComponent(p) + '=' + encodeURIComponent(params[p
                           ]);
                           }
                           var final_src = 'https://ad.hockeycurve.com/ad.php?zoneid=<?php echo $str_arr[$j] ?>&lp0=<?php echo urldecode($_POST['landingurl']) ?>&partner=dcm&hct=master&optout=false' + cs
                           document.getElementById('main-ad-tag<?php echo $i ?>').src = final_src
                           </script><br>
                           </div>
                             <?php }
                             
                           }
                    else if ($row["geo"]=="true"){
                      if($row["adtag_type"]=="DCM"){ ?>
                        <div class='hockeycurve-v1'>
                        <iframe id='main-ad-tag<?php echo $j ?>' frameborder='0' scrolling='no' width='<?php echo $wh_dim[0] ?>' height='<?php echo $wh_dim[1] ?>'></iframe>
                        <script type='text/javascript'>
                        var params = {'client':'<?php echo $row['client']?>','fcat':'<?php echo $fcat?>','geo':'true','ct0':'%c_esc','cb':'%n','dbmc':'<?php echo $fcat?>'}
                        var cs = '';
                        for (var p in params) {
                        cs += '&' + encodeURIComponent(p) + '=' + encodeURIComponent(params[p
                        ]);
                        }
                        var final_src = 'https://ad.hockeycurve.com/ad.php?zoneid=<?php echo $str_arr[$j] ?>&lp0=<?php echo urldecode($_POST['landingurl']) ?>&partner=dcm&hct=master&optout=false' + cs
                        document.getElementById('main-ad-tag<?php echo $i ?>').src = final_src
                        </script>
                        </div>
                        <?php }}
                      else if ($row["geo"]=="bcamp")
                      {
                        if($row["adtag_type"]=="DCM"){
                          ?><div class='hockeycurve-v1'>
                            <iframe id='main-ad-tag<?php echo $i ?>' frameborder='0' scrolling='no' width='<?php echo $wh_dim[0] ?>' height='<?php echo $wh_dim[1] ?>'></iframe>
                            <script type='text/javascript'>
                            var params = {'client':'<?php echo $row['client']?>','fcat':'<?php echo $fcat?>','geo':'bcamp','ct0':'%c_esc','cb':'%n','dbmc':'<?php echo $fcat?>'}
                            var cs = '';
                            for (var p in params) {
                            cs += '&' + encodeURIComponent(p) + '=' + encodeURIComponent(params[p
                            ]);
                            }
                            var final_src = 'https://ad.hockeycurve.com/ad.php?zoneid=<?php echo $str_arr[$j] ?>&lp0=<?php echo urldecode($_POST['landingurl']) ?>&partner=dcm&hct=master&optout=false' + cs
                            document.getElementById('main-ad-tag<?php echo $i ?>').src = final_src
                            </script>
                            </div>
                        <?php }
                        }
                    }else{
                        if ($row["geo"]==""){                                                 
                            if($row["adtag_type"]=="DCM"){
                           ?> <div class='hockeycurve-v1'>
                           <iframe id='main-ad-tag<?php echo $i ?>' frameborder='0' scrolling='no' width='<?php echo $wh_dim[0] ?>' height='<?php echo $wh_dim[1] ?>'></iframe>
                           <script type='text/javascript'>
                           var params = {'client':'<?php echo $row['client']?>','fcat':'<?php echo $fcat?>','ct0':'%c_esc','cb':'%n','dbmc':'<?php echo $fcat?>'}
                           var cs = '';
                           for (var p in params) {
                           cs += '&' + encodeURIComponent(p) + '=' + encodeURIComponent(params[p
                           ]);
                           }
                           var final_src = 'https://ad.hockeycurve.com/ad.php?zoneid=<?php echo $str_arr[$j] ?>&lp0=<?php echo urldecode($_POST['landingurl']) ?>&partner=dcm&optout=false' + cs
                           document.getElementById('main-ad-tag<?php echo $i ?>').src = final_src
                           </script><br>
                           </div>
                             <?php }
                             
                           }
                    else if ($row["geo"]=="true"){
                      if($row["adtag_type"]=="DCM"){ ?>
                        <div class='hockeycurve-v1'>
                        <iframe id='main-ad-tag<?php echo $j ?>' frameborder='0' scrolling='no' width='<?php echo $wh_dim[0] ?>' height='<?php echo $wh_dim[1] ?>'></iframe>
                        <script type='text/javascript'>
                        var params = {'client':'<?php echo $row['client']?>','fcat':'<?php echo $fcat?>','geo':'true','ct0':'%c_esc','cb':'%n','dbmc':'<?php echo $fcat?>'}
                        var cs = '';
                        for (var p in params) {
                        cs += '&' + encodeURIComponent(p) + '=' + encodeURIComponent(params[p
                        ]);
                        }
                        var final_src = 'https://ad.hockeycurve.com/ad.php?zoneid=<?php echo $str_arr[$j] ?>&lp0=<?php echo urldecode($_POST['landingurl']) ?>&partner=dcm&optout=false' + cs
                        document.getElementById('main-ad-tag<?php echo $i ?>').src = final_src
                        </script>
                        </div>
                        <?php }}
                      else if ($row["geo"]=="bcamp")
                      {
                        if($row["adtag_type"]=="DCM"){
                          ?><div class='hockeycurve-v1'>
                            <iframe id='main-ad-tag<?php echo $i ?>' frameborder='0' scrolling='no' width='<?php echo $wh_dim[0] ?>' height='<?php echo $wh_dim[1] ?>'></iframe>
                            <script type='text/javascript'>
                            var params = {'client':'<?php echo $row['client']?>','fcat':'<?php echo $fcat?>','geo':'bcamp','ct0':'%c_esc','cb':'%n','dbmc':'<?php echo $fcat?>'}
                            var cs = '';
                            for (var p in params) {
                            cs += '&' + encodeURIComponent(p) + '=' + encodeURIComponent(params[p
                            ]);
                            }
                            var final_src = 'https://ad.hockeycurve.com/ad.php?zoneid=<?php echo $str_arr[$j] ?>&lp0=<?php echo urldecode($_POST['landingurl']) ?>&partner=dcm&optout=false' + cs
                            document.getElementById('main-ad-tag<?php echo $i ?>').src = final_src
                            </script>
                            </div>
                        <?php }
                        }
                    }
                    
                 } 
                
                 
                 ?></td>
                 <td><a href="https://publisherplex.io/Adtag/blog.php?d=<?php echo urlencode( base64_encode($row['id'].",".$str_arr[$j])); ?>" target="_blank">Demo Ad</a></td> 
                </tr><?php
	                $i++;
                    $j++;
                }}
                ?>  
      </tbody>
    </table>
</body>

</html>
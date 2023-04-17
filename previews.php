<?php
include "conn.php";
$id=$_GET['id'];
if(isset($_POST['id'])) {
    $id=$_GET['id'];
}
$sqlto="SELECT * FROM `campaign_info` WHERE id='$id'";
$resultto=mysqli_query($connectDB,$sqlto);
$rowto=mysqli_fetch_assoc($resultto);
$mailcheck=$rowto['mailto'];
if($mailcheck!='true'){
    echo "please complete the steps to unlock the Previews";
}
else{

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
      $sql="SELECT * FROM `campaign_info` WHERE id=$id LIMIT 1";
      $result=mysqli_query($connectDB,$sql);
      $row=mysqli_fetch_assoc($result);
    ?>
    <h2 style="margin-left: 25px;"><?php echo $row['campaign_title']?></h2>
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
              <td><a href="https://publisherplex.io/selfserve_test/blog.php?d=<?php echo urlencode( base64_encode($row['id'].",".$dim[$d])); ?>" target="_blank">Demo Ad</a></td> 
          </tr>
         <?php }
          ?>
          
          
      </tbody>
    </table>
</body>
</html>

<?php
}
?>
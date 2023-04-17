<?php
include "conn.php";
error_reporting(E_ERROR | E_PARSE);

$sql="SELECT * FROM `log_file` ORDER BY `id`";
$data=mysqli_query($connectDB,$sql);
        if(mysqli_num_rows($data)>0){
          while($row=mysqli_fetch_assoc($data)){
              $time=$row['date_time'];
              $client=$row['client_name'];
              $email=$row['email'];
              $fcat=$row['fcat'];
              $event=$row['event'];
              $adtag=$row['adtag'];
              
              echo "[$time] client:'$client' email:'$email' fcat:'$fcat' adtag:'$adtag' event:'$event'";?> <br> <?php
          }
            
        }
?>
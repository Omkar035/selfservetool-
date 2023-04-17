<?php
    include "../conn.php";
header("Access-Control-Allow-Origin: *");
header("Content-type: application/json");


$id = $_GET['id'];

$sql="SELECT * FROM `campaign_info` WHERE id='$id'";
    $data=mysqli_query($connectDB,$sql);
    if(mysqli_num_rows($data)>0){
        while($row=mysqli_fetch_assoc($data)){
            $feed_url = $row['feed_url'];
if (($handle = fopen("$feed_url", "r")) !== FALSE) {
    $csvs = [];
    while(! feof($handle)) {
       $csvs[] = fgetcsv($handle);
    }
    // print_r($csvs);





// $level1=array_unique($mainarr);





    for($k=1;$k<count($csvs);$k++){
        
        for($j=0;$j<count($csvs[0]);$j++){
        $level3[$csvs[0][$j]]=$csvs[$k][$j];
}
$level4[]=$level3;

}


  $catArray = array_column($level4, 'category');
  $uniquecats = array_unique($catArray);
  
  
  
  foreach($uniquecats as $unicat){
      $diffcat[]=$unicat;
  }
  

// print_r($diffcat);
for($js=0;$js<count($diffcat);$js++){
    for($fs=0;$fs<count($level4);$fs++){
        if($diffcat[$js]==$level4[$fs]['category']){
            $level10[$diffcat[$js]][]=$level4[$fs];
        }
    }
}






    
    $json = json_encode($level10);
    fclose($handle);
    print_r($json);
    

}
}}
?>



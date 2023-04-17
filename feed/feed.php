<?php
    include "../conn.php";
header("Access-Control-Allow-Origin: *");
header("Content-type: application/json");
// php function to convert csv to json format
// $file = "https://docs.google.com/spreadsheets/d/e/2PACX-1vRG8JP0GG4nd0WTsaL1FU0W4tspucxfIjtPSd2ZcGTF5Uj_k1Kpsl_osQHsLYIXXdbxJF0rUew4_h9i/pub?gid=0&single=true&output=csv";

// $fileData=fopen($file,'r');
// while (($line = fgetcsv($fileData)) !== FALSE) {

//   $s[] = $line;
// }
// echo "<pre>";
// var_dump($s);


// $assoc_array = [];
// if (($handle = fopen("https://docs.google.com/spreadsheets/d/e/2PACX-1vRG8JP0GG4nd0WTsaL1FU0W4tspucxfIjtPSd2ZcGTF5Uj_k1Kpsl_osQHsLYIXXdbxJF0rUew4_h9i/pub?gid=0&single=true&output=csv", "r")) !== false) {                 // open for reading
//     if (($data = fgetcsv($handle, 1000, ",")) !== false) {         // extract header data
//         $keys = $data;                                             // save as keys
//     }
//     while (($data = fgetcsv($handle, 1000, ",")) !== false) {      // loop remaining rows of data
//         $assoc_array[] = array_combine($keys, $data);              // push associative subarrays
//     }
//     fclose($handle);                                               // close when done
// }
// echo "<pre>";
//     var_export($assoc_array);                                      // print to screen
// echo "</pre>";

$id = $_GET['id'];

$sql="SELECT * FROM `campaign_info` WHERE id='$id'";
    $data=mysqli_query($connectDB,$sql);
    if(mysqli_num_rows($data)>0){
        while($row=mysqli_fetch_assoc($data)){
            $feed_url = $row['feed_url'];
            if (($handle = fopen("$feed_url","r")) !== FALSE) {
            $csvs = [];
            while(! feof($handle)) {
              $csvs[] = fgetcsv($handle);
            }
            $datas = [];
            $column_names = [];
            foreach ($csvs[0] as $single_csv) {
                $column_names[] = $single_csv;
            }
            foreach ($csvs as $key => $csv) {
                if ($key === 0) {
                    continue;
                }
                foreach ($column_names as $column_key => $column_name) {
                    $datas[$key-1][$column_name] = $csv[$column_key];
                }
            }
            $json = json_encode($datas);
            fclose($handle);
            print_r($json);
}
            
        }
    }
    // echo json_encode($c[0]);

// ($handle = fopen("https://docs.google.com/spreadsheets/d/e/2PACX-1vRG8JP0GG4nd0WTsaL1FU0W4tspucxfIjtPSd2ZcGTF5Uj_k1Kpsl_osQHsLYIXXdbxJF0rUew4_h9i/pub?gid=0&single=true&output=csv", "r")
// if (($handle = fopen("$id","r")) !== FALSE) {
//     $csvs = [];
//     while(! feof($handle)) {
//       $csvs[] = fgetcsv($handle);
//     }
//     $datas = [];
//     $column_names = [];
//     foreach ($csvs[0] as $single_csv) {
//         $column_names[] = $single_csv;
//     }
//     foreach ($csvs as $key => $csv) {
//         if ($key === 0) {
//             continue;
//         }
//         foreach ($column_names as $column_key => $column_name) {
//             $datas[$key-1][$column_name] = $csv[$column_key];
//         }
//     }
//     $json = json_encode($datas);
//     fclose($handle);
//     print_r($json);
// }

?>



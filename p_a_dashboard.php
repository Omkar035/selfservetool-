<?php

include "conn.php";
error_reporting(E_ERROR | E_PARSE);

// current date

date_default_timezone_set('Asia/Kolkata');
$date2 = date('Y-m-d');
$date1 = date('Y-m-d',strtotime('-15 days',strtotime(date('Y-m-d'))));
// echo $time;
// echo $newDate;

$queryn = "SELECT distinct date FROM creativecode WHERE date BETWEEN '$date1' AND '$date2'";
// $datan=mysqli_query($connectDB,$queryn);
// $rown = $datan->fetch_assoc();
$datan=mysqli_query($connectDB,$queryn);
if (mysqli_num_rows($datan) > 0) {
    while($rown=mysqli_fetch_assoc($datan)){
$date_arr[] = $rown['date'];
    }
 
}

$active_date= array();
//Total number of registered users 
$query = "SELECT count(distinct name) as totalusers FROM login";
$data=mysqli_query($connectDB,$query);
$row = $data->fetch_assoc();

// Total adsizes created 
$query2 = "SELECT count(distinct dim) as totaldimensions FROM templates";
$data2=mysqli_query($connectDB,$query2);
$row2 = $data2->fetch_assoc();

// Total adsizes created 
$query3 = "SELECT count(name) as totalads FROM creativecode";
$data3=mysqli_query($connectDB,$query3);
$row3 = $data3->fetch_assoc();

// Total number of active users 
$query4 = "SELECT count(distinct username) as totalauser FROM creativecode ";
$data4=mysqli_query($connectDB,$query4);
$row4 = $data4->fetch_assoc();

// Total number of active users date wise
$query7 = "SELECT * FROM creativecode Where date BETWEEN '$date1' AND '$date2'";
$data7=mysqli_query($connectDB,$query7);
if (mysqli_num_rows($data7) > 0) {
    while($rown7=mysqli_fetch_assoc($data7)){
$active_arr = array();
$active_date[] = $rown7['date'];
        $active_arr[$rown7['date']] = $rown7['username'];
        $arr[] = $active_arr;
    }
}

            $final_arr = array();
foreach(array_unique($active_date) as $value3){
    $date_arr2 = array();
    foreach ($arr as $value) {
        foreach ($value as $key=>$value2) {
            if($value3 == $key){
                $date_arr2[] = $value2;
                $final_arr[$value3]=array_unique($date_arr2);
            }
        }
    }
}
// TO FIND RATIO 
$totalRatio = round($row4['totalauser'] / $row['totalusers'], 2);

// Total templates created 
$query1 = "SELECT count(distinct template_name) as totaltemplates FROM templates";
$data1=mysqli_query($connectDB,$query1);
$row1 = $data1->fetch_assoc();

// Total templates used 
$query5 = "SELECT count(distinct name) as totaltempused FROM creativecode";
$data5=mysqli_query($connectDB,$query5);
$row5 = $data5->fetch_assoc();

// Total templates used 
$query5 = "SELECT count(distinct name) as totaltempused FROM creativecode";
$data5=mysqli_query($connectDB,$query5);
$row5 = $data5->fetch_assoc();

// Total templates created 
$query1 = "SELECT count(distinct template_name) as totaltemplates FROM templates";
$data1=mysqli_query($connectDB,$query1);
$row1 = $data1->fetch_assoc();

// Calculate the progress percentage based on the total dimensions
$progress = ($row5['totaltempused'] / $row2['totaltemplates']) * 100;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 <title>Product Analytical Dashboard</title>
   <link rel="stylesheet" href="product.css" />


</head>
<body>
<div id="box">
    <div>
        <img id="bg" style="position:absolute;top:0px;left:0px;width:100%;z-index:-1" src="https://s.hcurvecdn.com/saps/pad/bg.png"> 
        <!--<img id="logo" style="position:absolute;top:0px;left:0px;width:100%;z-index:1;opacity:1" src="https://s.hcurvecdn.com/saps/pad/logo.png">-->
        <img id="logo"  src="https://s.hcurvecdn.com/atest/pooja/updateanimation/logo3.png">
       

    </div>
    <div id="saps">Product Analytic Dashboard</div>
    
    <!--line-->
    <div class="horizontal-line"></div><br><br>
    
    <!--cards-->
     <div class="cards">
          <div class="card" style="box-shadow: 0px 1px 1px 1px blue;">
              <span class="crd" style="font-family:bold; font-size: 11px;"> TOTAL NUMBER OF REGISTERED USERS :</span></br>
            <img class="icon1" style="margin-left: -60%;width: 13%;" src="https://s.hcurvecdn.com/saps/pad/Noofregisteruser.png"><br>
             <span class="text1 text">  <?php echo $row['totalusers'] ?></span>
   </div>
          <div class="card" style="box-shadow: 0px 1px 1px 1px blue;">
            <span class="crd" style="font-family:bold; font-size: 11px;">TOTAL ADS CREATED :</span></br>
            <img class="icon2" style="margin-left: -60%;width: 13%;"  src="https://s.hcurvecdn.com/saps/pad/ad.png"> <br>
            <span class="text2 text" > <?php echo $row3['totalads']?></span>
         </div>
          <div class="card" style="box-shadow: 0px 1px 1px 1px blue;">
          <span class="crd" style="font-family:bold; font-size: 11px;">TOTAL AD SIZES CREATED(DIMENSION) :</span></br>
          <img class="icon" style="margin-left: -60%;width: 13%;"  src="https://s.hcurvecdn.com/saps/pad/ad-size.png"> <br>
          <span class="text" >   <?php echo $row2['totaldimensions']?></span>
   </div>
 </div>
 
        <!--chart-->
   <div id="abc"   >  
        <label for="months">Select month:</label>
        <select name="months" id="months" onchange="updateChart()">
  <option value="0">All months</option>
  <option value="1">January</option>
  <option value="2">February</option>
  <option value="3">March</option>
</select>
        <div id="chart_id"> 
                <canvas id="myCharts"></canvas>
              </div>
  
</div>

      <!--progress bar-->
   <div id="proo">
    <span class="t_temp" style="margin-left:1%;margin-top:1%;font-family:bold">Total Template</span>
      <div class="progress">
         <div class="progress-bar" id="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
           <span class="temp"> TOTAL TEMPLATES IN USE :</span>
            <span class="fdata" > <?php echo $row5['totaltempused'] ?></span>
        </div>
     </div>
</div>

<!--side cards-->
  <div id="side">
      <div class="a" style="box-shadow: 0px 1px 1px 1px #ddd;">
         <ul>
             <li>Total No. of Registered Users</li>
             <span class="sapss">The number of Users registered in the Self Serve Tool </span>
         </ul>
     </div>
      <div class="b" style="box-shadow: 0px 1px 1px 1px #ddd;">
         <ul>
             <li>Total ADS Created</li>
             <span class="sapss">The number of ADS created  in the Self Serve Tool </span>
         </ul>
     </div>
      <div class="c" style="box-shadow: 0px 1px 1px 1px #ddd;">
         <ul>
             <li>Total AD Size created</li>
             <span class="sapss">The Number of Dimensions <br>in the Self Serve Tool  </span>
         </ul>
     </div>
      <div class="d" style="box-shadow: 0px 1px 1px 1px #ddd;">
         <ul>
             <li>Total Number of Active Users </li>
             <span class="sapss">The Number of Users Active in the Self Serve Tool </span>
         </ul>
     </div>
      <div class="e" style="box-shadow: 0px 1px 1px 1px #ddd;">
         <ul>
             <li>Ratio of Active/Registered Users </li>
             <span class="sapss">The total Number of Active/Registered Users</span>
         </ul>
     </div>
   </div>   
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
var userregistered = '<?php echo json_encode($row) ?>';
var date = '<?php echo json_encode($date_arr) ?>';
var activeuser = '<?php echo json_encode($final_arr) ?>';
var jsondata = JSON.parse(activeuser)
var jsonreg = JSON.parse(userregistered)
var arr = [];
var arr2=[];
for(var z in jsondata){
    for(var y in jsondata[z]){   
        arr2.push(jsondata[z][y]);
    }
    // var arr2cont = arr2.length / Number(jsonreg.totalusers);
    
    var arr2cont = arr2.length;
    arr.push(arr2cont);
    arr2=[]
}
  const ctx = document.getElementById('myCharts');

  new Chart(ctx, {
    type: 'line',
    data: {
      labels: JSON.parse(date),
      datasets: [{
          Color:"red",
        label: 'Total No of Active Users',
        borderColor: "#176cc6",
          backgroundColor: "white",
        data: arr,
        borderWidth: 0.5
     
      }]
    },
    
    options: {
        
    responsive: true,
    maintainAspectRatio: false,
    
    plugins: { 
      legend: {
        labels: {
          color: "black",  
        }
      }
    },
      
  scales: {
      y: {
        ticks: { color: 'black', beginAtZero: true }
      },
      x: {
        ticks: { color: 'black', beginAtZero: true }
      }
    }
    
    },
   
  });
</script>


<!--bar-->
<script>
  const progressBar = document.getElementById("progress-bar");
function updateProgress(progress) {
progressBar.style.width = progress + "%";
progressBar.setAttribute("aria-valuenow", progress);
}
updateProgress(<?php echo $progress ?>);
</script>
















</html>
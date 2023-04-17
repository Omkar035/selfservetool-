<?php

include "conn.php";
error_reporting(E_ERROR | E_PARSE);

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
$query4 = "SELECT count(distinct username) as totalauser FROM creativecode";
$data4=mysqli_query($connectDB,$query4);
$row4 = $data4->fetch_assoc();

// Total templates created 
$query1 = "SELECT count(distinct template_name) as totaltemplates FROM templates";
$data1=mysqli_query($connectDB,$query1);
$row1 = $data1->fetch_assoc();

// Total templates used 
$query5 = "SELECT count(distinct name) as totaltempused FROM creativecode";
$data5=mysqli_query($connectDB,$query5);
$row5 = $data5->fetch_assoc();





?>
<html>
    <head>
  <meta name="viewport" content="width=device-width, initial-scale=1">



<style>
/*body {*/
  /*background: url("https://s.hcurvecdn.com/hc_logo.png") ;*/
/* border: 4px dashed black;*/
/*  padding: 25px;*/
/*  background-repeat: no-repeat;*/
/*  background-origin: content-box;*/
/*  background-attachment: fixed;*/
/*  background-position: center;    */
/*  border-block-color: pink;*/
    
/*}*/
@font-face {
        font-family: 'opensb';
        src: url('https://hcurvecdn.com/fonts/OpenSans-ExtraBold.woff2?v=3') format("truetype");
    }
    @font-face {
font-family: 'opens';
src: url('https://hcurvecdn.com/fonts/OpenSans-SemiBold.woff2?v=3') format("truetype");
 }
 @font-face {
        font-family: 'bold';
        src: url('https://s.hcurvecdn.com/fonts/NunitoSans-Bold.woff2?v=3') format("truetype");
    }

    .card {
  font-size: 18px;
  box-shadow: 0 0 5px #2096f3;
  background-color:white;
  color: black;
  padding: 1rem;
  height: 4.5rem;
   border-radius: 10px;
}


/*.cards {*/
/*   background:url(https://s.hcurvecdn.com/hc_logo.png) no-repeat;*/
/*}*/
.cards {
  max-width: 1200px;
  margin: 0 auto;
  display: grid;
  grid-gap: 1rem;
  border-radius: 10px;
 font-weight:900;
 font-family: opensb;
 
  color: black;
 text-align: center;
line-height: 2em;
 
}
.card:hover {
        background-color: #063970;
        color:white;
      }
#saps{
    width:100%;
    left:0;
    text-align:center;
    margin-top:20px;
    font-size:35px;
    font-family:bold;
    color:#063970;
    /*border:1px solid red;*/
}


/* Screen larger than 600px? 2 column */
@media (min-width: 600px) {
  .cards { grid-template-columns: repeat(2, 1fr); }
}

/* Screen larger than 900px? 3 columns */
@media (min-width: 900px) {
  .cards { grid-template-columns: repeat(3, 1fr); }
}
</style>

    </head>
    <body>
<div>          <div id="saps">Product Analytic dashboard</div><br><br>
      
        <!--<div id="saps"><span style="width:50%;  box-shadow: 0 0 5px #2096f3;border-radius:5px;padding:5px">Product Analytic dashboard</span></div><br><br>-->
        <div class="cards">
   <div class="card">
      <span style="font-family:opens; font-size: 14px;"> TOTAL NUMBER OF REGISTERED USERS :</span></br>
       <?php echo $row['totalusers'] ?>
   </div>
   <div class="card">
        <span style="font-family:opens; font-size: 14px;"> TOTAL NUMBER OF ACTIVE USERS :</span></br>
       <?php echo $row4['totalauser']?>
   </div>
   <div class="card">
       <span style="font-family:opens; font-size: 14px;">  RATIO OF  ACTIVE/REGISTERED USERS :</span></br>
       <?php echo round($row4['totalauser'] / $row['totalusers'], 2); ?>

   </div>
   <div class="card">
         <span style="font-family:opens; font-size: 14px;">TOTAL ADS CREATED :</span></br>
       <?php echo $row3['totalads']?>
   </div>
   <div class="card">
       <span style="font-family:opens; font-size: 14px;">  TOTAL AD SIZES CREATED(DIMENSION) :</span></br>
       <?php echo $row2['totaldimensions']?>
   </div>
   <div class="card">
       <span style="font-family:opens; font-size: 14px;">  TOTAL TEMPLATES :</span></br>
       <?php echo $row5['totaltempused'] ?>
   </div>
   <div class="card">
        <span style="font-family:opens; font-size: 14px;padding:5px"> TOTAL TEMPLATES IN USE :</span></br>
       <?php echo $row5['totaltempused'] ?>
   </div>
 </div>
</div> 

 
 
    </body>
</html>
<script>
   
</script>
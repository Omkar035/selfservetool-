
<?php
include "includes/connection.php";
error_reporting(E_ERROR | E_PARSE);
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
    <link rel='stylesheet' href='https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css'>
    <link rel="stylesheet" href="style.css">
    <title>Document</title>

   <style>
   #btn {
         margin-top: 25px;
            margin-left: 15px;
            background-color: #f0f0f0;
            height: 30px;
               /*color:white;*/
            width: 70px;
          border-radius: 5px;
            border: 2px solid black;
            font-size:18px;
             font-weight:600;
             /*box-shadow:1px 1px 1px 1px;*/
        }
        
        #btn:hover {background-color: #2f3a51;
            color:white;
            
        }
  </style>

</head>
<body>
 
<button  id="btn" onclick="location.href='/selfserve/adtags.php?id=<?php echo $id ?>'"  >Back</button><br>
<div class="container">

  <h2 style="text-align: center;">Frequently Asked Questions</h2>

  <div class="faq">
    <div class="faq-item">
      
      <a>How to use AD-Tag?</a>
      <div class="content">
               <h2>Steps to Use AD-Tag :-</h2>
       <div>
           1) There are total 3 columns :- <br><br>
              <b> fcats > Dimension > AD-Tags</b>
           <div><img src="https://s.hcurvecdn.com/atest/sapna/dcm1.png" alt="DCM adtag" style="height: 250px; width:100%; margin:10px"> 
           <img src="https://s.hcurvecdn.com/atest/sapna/dcm2.png" alt="DCM adtag" style="height: 250px; width:100%; margin:10px"> </div>
           <p style="text-align: center;"><b>Fig 1:</b>This figure Shows the DCM AD-Tags</p>  <br> 
           
           <div><img src="https://s.hcurvecdn.com/atest/sapna/adtag_2_2.png" alt="DCM adtag" >
             <p style="text-align: center;"><b>Fig 2:</b> This button is used to copy the AD-Tag</p>  <br> </div>
         
           2) User need not to copy the AD-Tag manually just Click on the Copy this AD-tag button. Your AD-Tag gets copied and you can use the AD-Tag.<br> <br>
           
          <img src="https://s.hcurvecdn.com/atest/sapna/adtag_3.png" alt="preview-btn" ><br> 3) When a user
          clicks on this button, then the<b> Preview</b> page will be shown.
           <br> <br>
         <div>  <img src="https://s.hcurvecdn.com/atest/sapna/btn_1.png" alt="adtag btn" >
            <img src="https://s.hcurvecdn.com/atest/sapna/btn_2.png" alt="adtag btn" style="margin-left: 21px;">
            <p style="text-align: center;"> <b>Fig 3:</b> These 2 buttons will helps us with clear our doubts</p>  <br>   </div><br>
           4) How to Copy Ad-Tag from HC Tool/Frequently asked question for DCM AD-Tag:-<br> &nbsp; &nbsp;FAQ page will be visible, if a 
           user clicks on it. <br><br>
           5) User can download the report on different formal(like excel pdf etc.)<br><br>
             <img src="https://s.hcurvecdn.com/atest/btnnn_n.png" alt="download" ><br>
             <p style="text-align: center;"><b>Fig 3:</b>This button is used for download the data</p>
          <b> CSV Format-</b> A CSV file is a text file that has a specific format which allows data to
           be saved in a table structured Format.User Can download the data report in this format.<br><br>
           
           <b>PDF Format-  </b>User Can download the data report in PDF format.<br><br>
           
           <b> Excel Format- </b> User Can download the data report in excel format as well.<br><br>
       </div>
      </div>
    </div> 
    <div class="faq-item">
      <a>Placement of DCM - 3rd party AD-Tags</a>
      <div class="content">
        <div><p style="text-align: center; font-size:20px;font-weight: 600;"> Steps for Adding a 3rd Party Creative in DCM </p>
            Step 1) Click on New <br> <br> 
            Step 2) Select Custom Display (from the Dropdown)<br> 
            <div><img src="https://s.hcurvecdn.com/atest/sapna/faq/4.png" alt="Fig1" style="height: 350px; width:100%; margin:10px">   </div>
            <p style="text-align: center;">Fig 1: Screenshot Showing the View for Step 1 and Step 2</p>  <br> 
            Step 3.1) Add creative name<br><br> 
            Step 3.2) Select relevant dimension<br><br> 
            <div><img src="https://s.hcurvecdn.com/atest/sapna/faq/3.png" alt="Fig2" style="height: 350px; width:100%; margin:10px">   </div>       
            <p style="text-align: center;">Fig 2: New Creative setup View.</p>   <br>    
            Step 3.3) Click on the HTML code box<br>  <br> 
            Step 3.4) Paste the HC DCM AD-Tag (Shared via HC AD-Tag Link)<br>  <br> 
            <div><img src="https://s.hcurvecdn.com/atest/sapna/faq/2.png" alt="Fig3" style="height: 350px; width:100%; margin:10px">   </div> 
           <div><img src="https://s.hcurvecdn.com/atest/sapna/faq/22.png" alt="Fig3" style="height: 350px; width:90%; margin:10px">   </div> 
            <p style="text-align: center;"> Fig3: This is how it will look once HC DCM AD-Tag is added.</p>  <br> 
            
            Step4) Save the creative post the HC DCM AD-Tag is added.<br><br>
            
            Step5) Map respective ad/placement with valid url to the creative. <br><br>
           <b> Note:</b> Once the creatives are mapped to placements they will auto sync with DV360. Auto sync creatives are now available in DV360 to activate the campaign.If it's a publisher campaign, download the DCM tags to share with publishers.
            
            
            
            
        </div>
      </div>
    </div>
    <div class="faq-item">
      <a>DCM impression Discrepancy</a>
      <div class="content">
       <div>
 Event Flow<br>

<p style="font-weight: 600;"> Auction Won → Ad Call → Ad assets Render → DCM tracker triggers (Concurrent)</p>
<p style="font-weight: 600;">  Impression tracking</p>
Ad servers and DSPs have different measurement tech. And based on the dynamic variables like fraud, viewability, latency in bids, load times the impression counts differ.<br>Specifically for mobile app impressions, CM360 is likely to overcount significantly relative to the DSP provided that the DSP counts on a notification fired when the ad is displayed (not when the ad markup is downloaded but not yet displayed by the app). In app environments, it can be expected that the markup loads far more often than actual "impressions" according to that criteria, especially for interstitials and popup creatives where the creative might not ever come to happen.<br><br>HC tech just creates a holder for the CM tracker. HC tech isn't in any way involved in measurement of impressions by CM. CM has their own method and tech to measure impressions.<br>
<a class="docs" href="https://support.google.com/authorizedbuyers/answer/6156722#ads-not-rendered&zippy=%2Clearn-more-about-the-possible-reasons
" target="_blank">https://support.google.com/authorizedbuyers/answer/6156722#ads-not-rendered&zippy=%2Clearn-more-about-the-possible-reasons</a>

<b>Short Session Times: </b>Consumer’s behavior on mobile devices, especially smartphones, is different than when sitting in front of a computer browsing the web. There are more scenarios when a user may launch an app or a website to quickly check something and then close out. In these abbreviated sessions not all parties tracking calls may be called or complete before the consumer exits the app or browser.<br> 

<a class="docs" href="https://www.iab.com/wp-content/uploads/2015/07/IABMobileDiscrepancies.pdf
" target="_blank">https://www.iab.com/wp-content/uploads/2015/07/IABMobileDiscrepancies.pdf</a>

<p style="font-weight: 600;font-size: 20px;"> CM Tracking options</p><br>
Current - CM trackers are added in HC tracker holders.<br><br>
To prevent impression count discrepancy token macro can be added<br><br>
<a class="docs" href="https://support.google.com/displayvideo/answer/9280273
" target="_blank">https://support.google.com/displayvideo/answer/9280273</a>

Other Upload options to reduce discrepancy<br><br>
Upload in DV360 and sync the creative in DCM placements for the same AD-Tag. Please reach out to DV360 rep who can help sync third party creatives to DCM from DV360. This is the most preferred option.
Upload/host the AD-Tags in CM and run it in DV360. Please reach out to the DCM rep to help upload third party creatives in CM and sync them in DV360.<br><br>

HC is happy to extend support required to achieve any 1 of above use cases.<br><br>

       </div>
      </div>
    </div>
    <div class="faq-item">
      <a>Programmatic Media Buy - Best Practices</a>
      <div class="content">
       <div>
        <p style="font-size: 20px;font-weight: 600;"> AD Size</p>
        <ul>
       <li> Create separate Line-items (LIs) for different ad sizes.</li>
       <b> for e.g.</b> Create separate LIs for 300x250 vs 300x600
       <li> If all creatives are attached to the same LI budget, it gets spent on creative with most inventory.</li>
       <b> for e.g.</b> 320x50 & 300x250 will get 80-90% of budget</ul>
        
       <p style="font-size: 20px;font-weight: 600;"> Viewability</p>
       <ul>
        <li>  Add viewability filter. DV360 gives option to add filter on viewability..</li>
          <li> Keep Line-item (LI) viewability filter above 70%.</li>
            <li> Low or No viewability, ad inventory will result in poor CTR.</li></ul>
        
            <p style="font-size: 20px;font-weight: 600;">  Goal/Target</p>
            <ul>
              <li> Set your goal targets carefully. </li></ul>
      <b>  for e.g. </b>if you are setting up rs. 200 CPT target, algo will optimize to achieve equal or lower than 200.
        
        <p style="font-size: 20px;font-weight: 600;"> Time of day Spending</p>
        <ul>
          <li> For moment marketing campaigns the delivery should be evenly distributed across all hours of the campaign.</li>
            <li> Hence, check your hourly report daily to see if the impressions are bought evenly across all campaign hours.</li>
              <li> HC Recommendation Model suggests 75-80% of the Daily Impressions should happen on the During Match Hours (On Live Moments). </li>
                <li>Remaining 25-20% impressions to happen throughout the day.</li></ul>
        
      <b> for e.g.</b>  If a Cricket Match is at 8pm, So daily Budget should be set up in a way that from 12 am to 7:30 pm only 15-20% of the daily impressions is bought, so that from 7:30pm to 11:30pm 75-80% Impressions are done.<br>
        
        So that the campaign should not face issue of key match hours didn't get impressions as the daily budget got exhausted before the match started and Whole of the media buying happened on a default Creative.
        

       </div>
      </div>
    </div>
    
  </div>
  
</div>

<script src='https://code.jquery.com/jquery-3.2.1.min.js'></script>
<script  src="function.js"></script>
<script>
       
const items = document.querySelectorAll(".faq a");

function togglefaq(){
  this.classList.toggle('active');
  this.nextElementSibling.classList.toggle('active');
}

items.forEach(item => item.addEventListener('click', togglefaq));
</script>
</body>
</html>
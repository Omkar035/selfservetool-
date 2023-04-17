
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
       <div>
           <h2>Steps to Use AD-Tag :-</h2>
           1) There are total 3 columns :- <br><br>
             <b> fcats > Dimension > AD-Tags</b>
           <div><img src="https://s.hcurvecdn.com/atest/sapna/adtag1_1.png" alt="DV360 adtag" style=" width:100%; margin:10px">   </div>
           <p style="text-align: center;"><b>Fig 1:</b> Screenshot Showing the DV360 AD-Tag</p>  <br>   
           <div><img src="https://s.hcurvecdn.com/atest/sapna/adtag_2_2.png" alt="DV360 adtag">
           <p style="text-align: center;"> <b>Fig 2:</b> This button is used to copy the AD-Tag</p>  <br>   </div><br>
           
           2) User need not to copy the AD-Tag manually just Click on the Copy thid AD-Tag button. Your AD-Tag gets copied and you can use the AD-Tag.<br><br>
           
          <img src="https://s.hcurvecdn.com/atest/sapna/adtag_3.png" alt="preview-btn"><br>
          3) When a user clicks on this button, then the<b> Preview</b> page will be shown.
           <br><br><br>
           <div> <img src="https://s.hcurvecdn.com/atest/sapna/btn_1.png" alt="adtag btn" >
            <img src="https://s.hcurvecdn.com/atest/sapna/btn_2.png" alt="adtag btn" style="margin-left: 21px;">
            <p style="text-align: center;"> <b>Fig 3:</b> These 2 buttons will helps us with clear our doubts</p>  <br>   </div><br>
           4) How to Copy Ad-Tag from HC Tool/Frequently asked question for DV360 AD-Tag:-<br> &nbsp; &nbsp;FAQ page will be visible, if a 
           user clicks on it. <br><br>
           5) user can download the report on different formal(like excel pdf etc.)<br><br>
             <img src="https://s.hcurvecdn.com/atest/btnnn_n.png" alt="download button" ><br>
            <p style="text-align: center;"><b>Fig 4:</b>These buttons are used for download the data</p>
          <b> CSV Format-</b> A CSV file is a text file that has a specific format which allows data to
           be saved in a table structured Format.User Can download the data report in this format.<br><br>
           
           <b>PDF Format-  </b>User Can download the data report in PDF format.<br><br>
           
           <b> Excel Format- </b> User Can download the data report in excel format as well.<br><br>
       </div>
      </div>
    </div> 
    
    
    <div class="faq-item">
      <a>DV360 Third party AD-Tag Placement and Testing</a>
      <div class="content">
        <div>
          <p style="font-weight: 600;"> How to ensure campaign 3rd party AD-Tags are uploaded correctly to DV360?</p>

Step 1) Under creative upload - Select 3rd party Display<br><br>

Step 2) Click the box below Thirdparty tag.<br><br>
 
Step 3) Paste the HC DV360 AD-Tag (Shared via HC AD-Tag Link)<br>
<div><img src="https://s.hcurvecdn.com/atest/sapna/faq/1_1.png" alt="Fig1" style="height: 350px; width:100%; margin:10px">   </div>

 <p style="text-align: center;font-weight: 600;"> Fig 1: This is how it will look once the HC DV360 AD-Tag is added.</p>

<p style="font-weight: 600;">  Very important -  (Tag Testing)</p>
This step is mandatory for 3rd party AD-Tags.
<div><img src="https://s.hcurvecdn.com/atest/sapna/faq/2_2.png" alt="Fig2" style="height: 450px; width:90%; margin:10px">   </div>

<p style="text-align: center;font-weight: 600;">Fig 2: Showing the TEST TAG Button below the uploaded AD-Tag.</p>

Step 4) Click on the <b> TEST TAG </b> button. <br>
<div><img src="https://s.hcurvecdn.com/atest/sapna/faq/3_3.png" alt="Fig3" style="height: 450px; width:90%; margin:10px">   </div>

<p style="text-align: center;font-weight: 600;">Fig 3: On click the ad preview appears. (containing the Creative Preview you have uploaded)</p>
<b>Note:</b> There is a message just below the creative Preview - Waiting for click tracking event…(Please see Fig 3)<br><br>

Step 5) Click on the ad. <br><br>

<b> Note:</b> On click the ad redirects to the advertiser landing URL. <br><br>

<div><img src="https://s.hcurvecdn.com/atest/sapna/faq/4_4.png" alt="Fig4" style="height: 450px; width:90%; margin:10px">   </div>
<p style="text-align: center;font-weight: 600;">Fig 4: Showcasing the Click tracking received message Post Step 5.</p>

 New message appears - <b>Click tracking received </b>(Please see Fig 4)<br><br>

<b> Conclusion:</b> This means the DV360 console has completed its click tracking event.<br><br>

<b> Note:</b> Once above steps are completed. The AD-Tag is good for trafficking.<br><br>
<a class="docs" href="https://support.google.com/displayvideo/answer/7129061?hl=en
" target="_blank">https://support.google.com/displayvideo/answer/7129061?hl=en</a>



        </div>
      </div>
    </div>
    <div class="faq-item">
      <a>DV360 impression Discrepancy</a>
      <div class="content">
        <div>
         <h4> Discrepancy in impressions - HC adserver vs DSP DV360</h4>

The difference in impressions is based on how ad technologies calculate and reconcile their ad request. (Impression definition is different depending on technologies.)<br><br>

<b> Auction → ad Call/request → ad served HC (HC impressions) - served ad reconciled as billable impression (DV360 Impression)</b> <br><br>

For DV360 - Impressions are billable entities and reconciled basis different filters - <b> ad not rendered, fraud, viewability, above/below fold etc.</b><br><br>

Hockeycurve doesn't provide the above features and considers all ad requests as impressions.<br><br>

<b> DV360/AdX help doc</b>
All ad calls are not considered as an impression for billing by DSP/Ad exchange. - <a class="doc" href="https://support.google.com/authorizedbuyers/answer/6156722?hl=en#ads-not-rendered"> https://support.google.com/authorizedbuyers/answer/6156722?hl=en#ads-not-rendered</a><br>

<b>For display creatives:</b>
Once an auction is won, the Publisher requests an ad and intends to display it, but the ad fails to render for multiple reasons (e.g. user navigates away, poor network connection, etc.)<br><br>

<b> For mobile app creatives:</b><br>
Publisher requests an ad but never actually shows ad (ad is downloaded in preparation for an ad break, but the ad is never given a chance to be shown) - poor connection, user stops the app load etc<br><br>

<b>How much discrepancy? </b> <br>
Device environment wise it varies mobile environment sees anywhere between 50-60% discrepancy depending on the publisher, deal type and scale of the campaign. <br><br>

<b>If deep details are required - </b> <br>
Auctions won data available under report section of DSPs, you can compare and see the difference between auction won and impressions for billing.<br><br>

<b>Conclusion-</b>
With the nature of the real time bid protocol each time ad call is made adserver has to render the content and it reports the impression. Hence, as a practice at Hockeycurve we use the DSP impressions for billing because DSP has the final reconciled amount of impressions bought from the exchange.<br>



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
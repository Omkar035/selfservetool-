<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Opt In-Out</title>
    <link rel="stylesheet" type="text/css" href="CSS/opt_css.css">
    <link rel="stylesheet" type="text/css" href="CSS/web_css.css">
</head>
<body class="mp0">
    <div class="opt_complete_container flx_col">
        <div class="navbar flx_row user_none">
            <div class="Hlogo">
                <a href="https://publisherplex.io/selfserve/home/web.php">
                    <img src="https://s.hcurvecdn.com/selfserve/icons/logohc.webp" height="54px" width="300px">
                </a>
            </div>
            <div class="options flx_row">
                <div class="nav-link"><a href="#home">Home</a></div>
                <div class="dropdown nav-link"><a class="dropbtn" href="#about_us">About Us</a>
                    <div class="dropdown-content">
                        <a href="https://publisherplex.io/selfserve/home/optout.php">Optout</a>
                        <a href="https://publisherplex.io/selfserve/home/privacy.php">Privacy Policy</a>
                    </div>
                </div>
                <div class="nav-link"><a href="#achive_container">achivements</a></div>
                <div class="nav-link"><a href="#selfserve">Self Serve Tool</a></div>
                <div class="nav-link"><a href="#contact">Contact Us</a></div>
            </div>
            <div class="menu-wrap">
                <input type="checkbox" id="check" class="toggler">
                <div class="hamburger">
                    <div></div>
                </div>
                <div class="menu">
                    <div>
                        <div>
                            <ul>
                                <li><a href="https://publisherplex.io/selfserve/home/web.php" onclick="menu()">Home</a></li>
                                <li><a href="#about_us" onclick="menu()">About Us</a></li>
                                <li><a href="#achive_container" onclick="menu()">achivements</a></li>
                                <li><a href="#selfserve" onclick="menu()">Self Serve Tool</a></li>
                                <li><a href="https://publisherplex.io/selfserve/home/optout.php">Optout</a></li>
                                <li><a href="https://publisherplex.io/selfserve/home/privacy.php">Privacy Policy</a></li>
                                <li><a href="#contact" onclick="menu()">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="opt_heading">
            OPT IN - OUT
        </div>
        <div class="all_content">
            <div class="row">
                <div class="col colorblack">
                    <h3 class="colorblack mrb">Why are you being re-targeted?</h3>
                    <p>You may have visited an online advertiser’swebsite (such as ecommerce, travel, hospitality website) and exhibited intent to purchase on the website. The advertiser has identified you as an “interested user” and would like to recommend products or services that might be of interest to you through online advertisements (ads).</p>

                    <h3 class="colorblack mrb mrt">Why do you see HockeyCurve Retargeting ads?</h3>
                    <p>HockeyCurve provides online re-targeting solutions to leading online advertisers across the globe. If you have visited any of our clients’ website and exhibited intent to purchase, we will show re-targeting ads across our trusted partner websites.</p>

                    <p style="color:blue">We know that you do not like being hassled by irrelevant ads on the internet; so we customize online ads such that they are useful to you. Based on your visit to our client’s website we predict your preferences and customize ads based on these preferences.</p>

                    <h4 class="mrb mrt colorblack">If you do not want to see HockeyCurve's re-targeting ads</h4>
                    
                    <h5 class="mrb">For Desktop:</h5>
                    <ul>
                    <li>Click on <button id="optin-out" onclick="Showmsg()" style="display:inline;padding: 10px 9px;font-weight:700;border-radius:4px;background-color:#EF5E4A;color: white;border: none"> Opt me <span id="out">out</span></button>   <span class="nomg" style="color:green" id="message"> - You have been successfully opted out of tracking.</span></li>
                    </ul>
                    
                    
                        <h5>For Android:</h5>
                    <ul>
                        <li>On the Android device, open Settings</li>
                        <li>Tap Accounts &amp; sync (this may vary, depending on your device)</li>
                        <li>Locate and tap on the Google listing</li>
                        <li>Tap Ads</li>
                        <li>Tap the check box for Opt out of interest-based ads</li>
                    </ul>
                    
                    
                        <h5>For iOS:</h5>
                    <ul>
                        <li>Launch the settings app on your device</li>
                        <li>Then tap on "Privacy"</li>
                        <li>Scroll down to "Advertising"</li>
                        <li>Turn on "Limit Ad Tracking"</li>
                    </ul>
                    
                        <p>By opting out here, you will disable only HockeyCurve's re-targeting ads and not the ads shown by agencies external to HockeyCurve</p>
                    
                    <h5>Opt-in scenario - Relevant ads</h5>
                    <img class="imgr" src="https://s.hcurvecdn.com/selfserve/icons/relevant.webp" alt="">

                    <h5>Opt-out scenario - Irrelevant ads</h5>
                    <img class="imgr mrb" src="https://s.hcurvecdn.com/selfserve/icons/irrelevant.webp" alt="">

                    <h3 class="mrt mrb">How do we customize ads?</h3>
                    <p class="mrb">When you visit any of our client's website, we insert a cookie on your browser and collect user behavior data (such as web pages visited on our client's website and products viewed, date, time of visit etc.). Using the user behavior data you exhibited, we predict/recommend the best possible and most ideal products/services and customize ads to be shown to you.
                    Please note that the user behavior data is anonymous and we never collect your personal information such as name, contact details, social security number.</p>

                    <h3 class="mrt mrb">Safe ads</h3>

                    <p>We strive to ensure that HockeyCurve ads are safe and do not contain inappropriate content, virus or malware.</p>

                    <p class="mrb">Reasons not to opt-out</p>
                    <img class="imgr mrb" src="https://s.hcurvecdn.com/selfserve/icons/safe.webp" alt="">

                    <h3 class="mrb mrt">What happens when you opt-out?</h3>

                    <p>If you choose to opt out, we will insert an opt-out cookie on your browser. We rely on this cookie to identify you as an opted-out user. We will not track your user behavior data or show customized ads if you have opted-out. However, youmight be shown ads that are not customized based on your interests and preferences.</p>
                    <p style="color:blue" class="mrb">Please note that you must opt-out every time you use a different browser, a different computer or have cleared the opt-out cookie from your browser.</p>


                </div>
            </div>
        </div>
        <footer id="footer">
              <div class="nav-menu flx_row" style="text-transform: uppercase;">
                  <div><a href="#home">HOME</a></div>
                  <div><a href="#about_us">ABOUT US</a></div>
                  <div><a href="#achive_container">achivements</a></div>
                  <div><a href="#selfserve">SELF SERVE TOOL</a></div>
                  <div><a href="#contact">CONTACT US</a></div>
              </div>
              <form id="contact" method="POST">
                  <h3 class="form-title">REACH US</h3>
                  <p id="err"></p>
                  <input type="text" name="name" placeholder="Name" id="usname" required>
                  <input type="text" name="agency" placeholder="Agency Name" id="agname" required>
                  <input type="email" name="email" placeholder="Email ID" id="usemail" required>
                  <input type="tel" name="number" placeholder="Phone Number" id="usnum" required>
                  <div class="ctaparent"><button type="submit" name="submit" onclick="valid()" class="cta-text" id="ctaofooter"> CONTACT US</button></div>
              </form>
              <p class="foot-text">&copy; HOCKEYCURVE GROWTH SOLUTIONS PVT LTD <span id="year"></span></p>
        </footer>
    </div>
    <script src="JavaScript/web_js.js"></script>   
<script>

function Showmsg(){
    var showmsg = document.getElementById("message");
    showmsg.classList.toggle("nomg");
    var chmsg = document.getElementById("out");
  if (chmsg.innerHTML === "out") {
    chmsg.innerHTML = "in";
  } else {
    chmsg.innerHTML = "out";
  }
}

</script>  
 
</body>
<?php 
if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $agency=$_POST['agency'];
    $number=$_POST['number'];
    $email=$_POST['email'];

     
    $to ='jasmeet.singh@hockeycurve.com,pavan.vichare@hockeycurve.com';
    $message = "Hello team, <br> \r\n\r\n";

    $message .="$name from $agency wants to connect.<br><br> \r\n\r\n";
   
    $message .="<b> PFB the person's mail id and mobile number <br><br></b>\r\n\r\n";
   
    $message .="<b>Email - $email<br><br></b> \r\n\r\n";
   
    $message .="<b>Number - $number<br><br></b> \r\n\r\n";
   

     $subject = 'Help request' ;
     $header = "From:bizops@hockeycurve.com \r\n";
     $header .= "MIME-Version: 1.0\r\n";
                 $header .= "Content-type: text/html\r\n";

                     
                     $retval = mail ($to,$subject,$message,$header);

 header("location: web.php");
}

?>
</html>
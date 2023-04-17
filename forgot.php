<?php
include "conn.php";
// $autopassword="";
  $characters = 'abcdefghijklmnopqrstuvwxyz0123456789';
  $charCount = strlen($characters);
//   for($i=0;$i<8;$i++){
//     $autopassword.= substr($characters,rand(0,$charCount-1),1);
//   }
//   $sqlpassword = "SELECT DISTINCT password FROM login";
//   $resultpassword = mysqli_query($conn,$sqlpassword);
//   while($row = mysqli_fetch_array($resultpassword))
//         {
//           if($row['password'] === $autopassword){
//               echo "password is their" ;
//               header("Refresh:0");//refresh
//             }}
 

if(isset($_POST['submit'])){
$cname=$_POST['uname'];
$email=$_POST['email'];
$up=$_POST['onep'];

$password=$_POST['password'];
$confirm_password=$_POST['confirm_password'];
$password2=password_hash($confirm_password, PASSWORD_DEFAULT);
if ($password != $confirm_password) {
      echo "<h1 style='color:red;font-size:18px;position:absolute;top:168px;left:67%;z-index:99'>Password and confirm password do not match.</h1>";
    }else{
 $query = "SELECT * FROM login WHERE `email`='$email' and `client_name` = '$cname' LIMIT 1";
 $data=mysqli_query($connectDB,$query);
 if(mysqli_num_rows($data)>0){
 if($up=="self"){
    $sql= "UPDATE `login` SET `password`='$password2' WHERE client_name='$cname' AND email='$email'"; 
    // echo $sql;
      $result=mysqli_query($connectDB, $sql);
    //   echo "$autopassword";
    //   echo "success";
    $check="SELECT * FROM `login` WHERE client_name='$cname' AND email='$email'"; 
    echo "<span style='color: green; position: absolute;top: 26%;text-align: center;margin-left: 55%;width: 50%;z-index: 10;float: right;'>Mail Send please check</span>";
 }

  elseif($up=="one"){
         $sql= "UPDATE `login` SET `password`='$password' WHERE client_name='$cname'";  
      $result=mysqli_query($connectDB, $sql);
          $check="SELECT * FROM `login` WHERE client_name='$cname'"; 
        echo "<span style='color: green;position: absolute;top: 31%;text-align: center;margin-left: 50%;width: 50%;z-index: 10;float: right;'>Mail Send to all the members of ".$cname." please check</span>";
  }
  else{
      echo "<span style='color: red;position: absolute;top: 27%;text-align: center;margin-left: 50%;width: 50%;z-index: 10;float: right;'>Please check the Client name and Email</span>";
  }
 }else{
     echo "<span style='color: red;position: absolute;top: 27%;text-align: center;margin-left: 50%;width: 50%;z-index: 10;float: right;'>Please check the Client name and Email</span>";
 }
  
      $resultmail=mysqli_query($connectDB, $check);
    while($row=mysqli_fetch_assoc($resultmail)){
        // echo $row['password'];
        $emailall.=$row['email'].",";
        
        
    }
    
    
     $to = $emailall;

    $message = "Hello " .$cname . ", <br> \r\n\r\n";

     $message .= "Your Mail ID-  " . $email . " <br><br>  \r\n\r\n";
    $message .= "Your Password Is-  " . $confirm_password . " <br> \r\n\r\n";
     $message .="Thanks & Regards <br>";
 
    $message .="HockeyCurve ";

     $subject ="Registration of Client";
    $header = "From:bizops@hockeycurve.com \r\n";
    $header .= 'Bcc:bizops@hockeycurve.com'. "\r\n";
    $header .= "MIME-Version: 1.0\r\n";
                 $header .= "Content-type: text/html\r\n";
                     $retval = mail ($to,$subject,$message,$header);
                    //  echo $header;
    
}  
}


?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.19.1/TweenMax.min.js"></script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Recovery Page</title>
  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
    label {

text-transform: uppercase;
}
     #box{
		width:100%;
        height:100%;
		position: absolute;
		left:0px;
		top:0px;
		user-select: none;
		cursor: pointer;
		overflow: hidden;
		box-sizing: border-box;
		     font-family:bold;
	  box-shadow: 0px 3px 3px 1px #ddd;
	}
@font-face {
        font-family: 'bold';
        src: url('https://s.hcurvecdn.com/fonts/Montserrat_Bol.woff2?v=3') format("truetype");
    }
    @font-face {
        font-family: 'sbold';
        src: url('https://s.hcurvecdn.com/fonts/NunitoSans-Bold.woff2?v=3') format("truetype");
    }
form {
    /*border: 3px solid #f1f1f1;*/
    width: 28%;
    /* height: 40%; */
    /* float: right; */
    position: absolute;
    top: 23%;
    left: 66%;
    z-index: 1
}

input[type=text], input[type=email],input[type=password] {
    width: 100%;
   padding: 8px 8px;
  margin: 6px 0;
  display: inline-block;
border:none;
  box-shadow: 0 0 7px rgba(0, 0, 0, 0.4);
  box-sizing: border-box;
  border-radius: 5px;
}

.saps {
    background-image: linear-gradient(#0b61b5, #1277d3);
  color: white;
  padding: 8px 10px;
  margin: 0.8rem 0.3rem;
  border: none;
  cursor: pointer;
  font-weight:900;
  font-family:bold;
  width: 100%;
  font-size: 1.8rem;
  box-shadow: 1px 1px 4px rgb(0 0 0 / 40%);
  border-radius: 10px;
}
.saps2 {
    background-image: linear-gradient(#0b61b5, #1277d3);
  color: white;
  padding: 6px 10px;
  margin: 0.5rem 0.5rem;
  border: none;
  cursor: pointer;
  font-weight:900;
  font-family:bold;
  position:absolute;
  width: 90%;
  font-size: 1.8rem;
  box-shadow: 1px 1px 4px rgb(0 0 0 / 40%);
  border-radius: 10px;
  height:12%;
  left:5%;
}
.carousel-indicators li {
    width: 10px;
    height: 10px;
    border-radius: 100%;
}
.carousel-indicators {
    bottom: -35px;
}

.radio_container{
    font-size: 1.5rem;
  font-family: bold;
  margin: 2% 0 6px 36%;
 color:#838080;
   /*border:1px solid ORANGE; */
}


.form_container {
  padding: 20px;
}

span.psw {
  float: right;
  padding-top: 5%;
  color:#d3d3d3;font-family:sbold;font-weight:900
}

.floating { 
    animation-name: floating;
    animation-duration: 3s;
    animation-iteration-count: infinite;
    animation-timing-function: ease-in-out;
    /* margin-left: 30px;
    margin-top: 5px; */
}
 
@keyframes floating {
    0% { transform: translate(0,  0px); }
    50%  { transform: translate(0, 15px); }
    100%   { transform: translate(0, -0px); }   
    
}

.floating2 { 
    animation-name: floating;
    animation-duration: 3s;
    animation-iteration-count: infinite;
    animation-timing-function: ease-in-out;
    animation-delay: 1s;
}
 
@keyframes floating2 {
    0% { transform: translate(0,  0px); }
    50%  { transform: translate(0, 25px); }
    100%   { transform: translate(0, -0px); }   
}

#dynamic{
    position: absolute;top: 10%;left: 0%;width: 54%;height: 14%;padding:1%;font-size: 4rem;
    color:white;text-align: center;font-family:bold; 
}

.car_container{
        width: 50%;
		height: 100%;
		position: absolute;
		left:0%;
		top:0%;
		padding:0px 0px;
		z-index:1000;
}

.text{
margin-left: 1%;width: 100%;height: 14%;padding:1%;color:white;text-align: center;font-family:bold;
/*border:1px solid yellow;*/
font-size: 3rem;
}
.adi{
    position: relative;left: 30%;width: 40%;height: 30%;
    /*border:1px solid black;*/
}
.hhh{
    position:relative;margin-top:23%;left:0%;width:100%;height:100%;background-color:transparent;
    /*border:1px solid red;*/
}

.flex-container {
        display: flex;
        justify-content: center;  text-transform: lowercase;
          /*border:1px solid red;*/
      }
      
      .flex-container > div {
        width: 50%;
        margin: 8px; 
        text-transform: capitalize;
     color:#838080;
     font-size: 1.5rem;
   
      }
      #bluebg {
    position:absolute;top:0px;left:0px;width:100%;z-index:-1
  }
.clouds{
    position:absolute;top:0px;left:50%;width:50%;z-index:1
}
.white{
    display:none;
}
.hc-logo1{
    position:absolute;top:0px;left:0px;width:100%;z-index:1;
}
.hc-logo2{
    display:none;
}
.icon-copy{
    position:absolute;top:0px;left:0px;width:100%;z-index:-1
}

.eye{
    position: absolute;top: 48%;font-size: 1rem;left: 88%;
}
@media only screen and (max-width: 600px) {
  #bluebg {
    position:absolute;top:0px;left:0px;height:100%;z-index:-1
  }
  .clouds{
    position:absolute;left:0px;top:20%;width:100%;transform:rotate(90deg);z-index:1
}
.white{
    background-color:white;
    height:300px;
    position:absolute;
    width:100%;
    bottom:0px;
    display:block;
}
.hc-logo1,.icon-copy{
    display:none;
}
.hc-logo2{
    display:block;
    position:absolute;
    width:80%;
    top:5%;
    left:10%;
}
 .warning1{
     color:green;position:absolute;top:38%;font-size:20px;width:100%;float:right;left:0;text-align:center;z-index:10;
 }
 .warning-2{
     color: red;position: absolute;top:42%;text-align:center;margin-left: 0%;z-index:99;width: 100%;transform: translate(0%, 0%);
 }
form {
    /*border: 3px solid #f1f1f1;*/
    width: 100%;
    position: absolute;
    display:flex;
    align-items:center;
    
    flex-direction:column;
    left:0;
    top:33%;
}
.eye{
    position: absolute;top: 46%;font-size: 1rem;left: 88%;
}
#dynamic,.car_container{
    display:none;
}

input[type=text], input[type=email],input[type=password] {
    width: 100%;
   padding: 8px 8px;
  margin: 6px 0;
  display: inline-block;
border:1px solid black;
  box-shadow: 0 0 7px rgba(0, 0, 0, 0.4);
  box-sizing: border-box;
  border-radius: 5px;
}

@keyframes floating {
    0% { top:5%; transform: translate(0,  0px) rotate(90deg)}
    50%  {top:5%; transform: translate(15px, 0px) rotate(90deg); }
    100%   {top:5%; transform: translate(0, 0px) rotate(90deg); }   
    
}

@keyframes floating2 {
     0% {top:5%; transform: translate(0,  0px) rotate(90deg)}
    50%  {top:5%; transform: translate(25px, 0px) rotate(90deg); }
    100%   {top:5%; transform: translate(0, 0px) rotate(90deg); }  
}

}
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
     color:#d3d3d3;font-family:sbold;font-weight:900
  }
  .cancelbtn {
     width: 100%;
  }
}
</style>
</head>
<body>

<div id="box">
    <div>
        <img class="clouds" src="https://s.hcurvecdn.com/selfserve/module1/login/cloud.png"> 
        <img  class="floating clouds" src="https://s.hcurvecdn.com/selfserve/module1/login/cloud2.png"> 
        <img class="floating2 clouds" src="https://s.hcurvecdn.com/selfserve/module1/login/cloud3.png"> 
        <img id="bluebg" src="https://s.hcurvecdn.com/selfserve/module1/login/bg2.jpg"> 
        <div class="white"></div>
        <img class="hc-logo1" src="https://s.hcurvecdn.com/selfserve/module1/login/logo.png"> 
        <img class="hc-logo2" src="https://s.hcurvecdn.com/atest/pooja/updateanimation/logo3.png"> 
    
    </div>
 
<form name="registerForm" method="post" >

  <div class="imgcontainer" style="z-index: 1;text-align:center">
 Password Recovery
  </div>
 
 
 <span id="err" style="color:red;"></span>
        <span id="err4" style="color:red;"></span>
      <span id="err3" style="color:red;"></span>
      <span id="err2" style="color:red;"></span>
          <div id="error-message"  style="color:red;"></div>
  <div class="form_container"  style="z-index: 1;">
 
    <input type="text" id="uname" name="uname" placeholder="Enter your Client- Name" required/><br>
 
 
    <input type="email" id="e-mail" name="email" oninput="checker()" placeholder="Enter Email-Id"  required multiple />
    
    <input type="password" id="password" name="password" placeholder="Password" required minlength="8" title="8 characters minimum">
      <span style="position: absolute;top: 46%;font-size: 1rem;left:86%;" onclick="showpass()"><i style="font-size:20px" class="fa fa-eye"></i></span>

  <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm Password" required>
  <span style="position: absolute;top:61%;font-size: 1rem;left:86%;" onclick="showpass2()"><i style="font-size:20px" class="fa fa-eye"></i></span>

    <div class="radio_container" style="z-index: 1; display:none;">
        <p class="abc">Update for </p>
    </div>
    <div class="flex-container">
        <div>
            <input type="radio" id="yself" name="onep" value="self" checked style=" display:none;" >
            <label class="radioo" for="self" style=" display:none; text-transform: capitalize;">Myself</label>
        </div>
        <!--<div>-->
        <!--    <input type="radio" id="eone" name="onep" value="one" >-->
        <!--<label class="radioo" for="one"  style="   text-transform: capitalize;">All Members</label> -->
        <!--</div>-->
      </div>
        <input class="saps button" type="submit" value="Recover Password" name="submit" ><br>
        <!--<a href="login.php"  style="float:right;   color:#838080;font-size: 1.2rem;"> Login </a>-->
    <span class="saps2"><a href="login.php" style="color:white;left:4%;width:90%;text-align:center;position:absolute">Login</a></span>

  </div>       
</form>


<div id="dynamic">ENTERPRISE ANALYTICS</div>
 <div class="car_container">
    
    <div id="myCarousel" class="carousel slide" data-ride="carousel" data-wrap="false"  data-interval="3000">
      <ol class="carousel-indicators">
        <li data-target="#slider" data-slide-to="0" class="active"></li>
        <li data-target="#slider" data-slide-to="1"></li>
        <li data-target="#slider" data-slide-to="2"></li>
        <li data-target="#slider" data-slide-to="3"></li>
        <li data-target="#slider" data-slide-to="4"></li>
         <li data-target="#slider" data-slide-to="5"></li>

    </ol>  
    <div class="carousel-inner">
        <div class="item active">
            <div class="hhh">
                <img id="img1" class="adi" src="https://s.hcurvecdn.com/selfserve/module1/signup/sliders/x.gif">
              <br>  <div class="text" >On Demand Access to Strategic Domain Experts for Programmatic Setup</div>
            </div>
        </div>
        <div class="item">
            <div class="hhh">
                <img id="img2" class="adi" src="https://s.hcurvecdn.com/selfserve/module1/signup/sliders/y.gif">
                <div class="text" >Brands use this to create & show data based relevant ads        </div>
            </div>
        </div>
        <div class="item">
            <div class="hhh">
                <img id="img3" class="adi" src="https://s.hcurvecdn.com/selfserve/module1/signup/sliders/z.gif">
                <div class="text" >Every user is unique, hence every ad for every users should be unique.        </div>
            </div>
        </div>
        <div class="item">
            <div class="hhh">
                <img id="img4" class="adi"  src="https://s.hcurvecdn.com/selfserve/module1/signup/sliders/a.gif">
                <div class="text" >We provide real time campaign performance dashboards, a/b testing environments        </div>
            </div>
        </div>
        <div class="item">
            <div class="hhh">
                <img id="img5" class="adi"  src="https://s.hcurvecdn.com/selfserve/module1/signup/sliders/b.gif">
                <div class="text" >Media Buying Automation for Bringing Speed, Scale & Driving Performance        </div>
            </div>
        </div>
        <div class="item">
            <div class="hhh">
                <img id="img6" class="adi"  src="https://s.hcurvecdn.com/selfserve/module1/signup/sliders/c.gif">
                <div class="text" >Generate User product feed based on his online and offline activity        </div>
            </div>
        </div>
 

  </button>
   
        
        
    </div>
    </div>

</div>
</div>
</div>
</body>
<script>
  let emailId = document.getElementById("e-mail");
    let mailRegex = /^[a-zA-Z][a-zA-Z0-9\-\_\.]+@[a-zA-Z0-9]{2,}\.[a-zA-Z0-9]{2,}$/;
       function checker(){
    
    if(emailId.value.match(mailRegex)){
        
        document.getElementById("err3").innerText = "";
        var vl1 = document.getElementById("err").innerText;
    var vl2 = document.getElementById("err2").innerText;
    var vl3 = document.getElementById("err3").innerText;
    var vl4 = document.getElementById("err3").innerText;
    if (vl1 == "" && vl2 == "" && vl3 == "" && vl4 == ""){
  document.querySelector(".button").disabled =false;
} 
    }
    
    else{
        document.getElementById("err3").innerText = "Email Id entered is not Valid!";
            document.querySelector(".button").disabled =true;
    }

}
</script>
<script>
    if(window.history.replaceState){
        window.history.replaceState( null,null, window.location.href)
    }
</script>
<script>
    function showpass(){
        if(document.getElementById("password").type=="password"){
        document.getElementById("password").type="text";
        }
        else if(document.getElementById("password").type=="text"){
            document.getElementById("password").type="password";
        }
    }
        if(window.history.replaceState){
            window.history.replaceState( null,null, window.location.href)
        }
        
function showpass2(){
        if(document.getElementById("confirm_password").type=="password"){
        document.getElementById("confirm_password").type="text";
        }
        else if(document.getElementById("confirm_password").type=="text"){
            document.getElementById("confirm_password").type="password";
        }
    }
        if(window.history.replaceState){
            window.history.replaceState( null,null, window.location.href)
        }
        

</script>
</html>

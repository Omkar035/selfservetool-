<?php
include "conn.php";
error_reporting(E_ERROR | E_PARSE);
session_start();
if($_SESSION['email']){
    header("location: index.php?registration=success");
  }
  
$url.= $_SERVER['REQUEST_URI'];  

 if($url == "/selfserve/login.php?registration=success"){
     echo "<span class='warning1'>Please check your email for login credentials.</span>";
 };
 
if(isset($_POST["submit"])){
    
    
    
    $email = $_POST['email'];
	$password = $_POST['password'];
	$cname=$_POST['client'];
	$_SESSION['client_nm'] = $cname;
    
        $query = "SELECT * FROM login WHERE `email`='$email' and `client_name` = '$cname' LIMIT 1";
        $data=mysqli_query($connectDB,$query);
        if(mysqli_num_rows($data)>0){
          while($row=mysqli_fetch_assoc($data)){
              
              
              
              
              
            if(password_verify($password,$row['password']))
            // if($password==$row['password'])
            {
                
                $client=$row['client_name'];
                $_SESSION['email']=$email;
                $_SESSION['client_name']=$client;
                $_SESSION['username']=$row['name'];
                
                date_default_timezone_set('Asia/Kolkata');
$time = date('Y-m-d H:i:s');

                $log="INSERT INTO `log_file`(`client_name`, `email`, `date_time`, `event`) VALUES ('$client','$email','$time','logged in')";
                $result_log=mysqli_query($connectDB,$log);
                
                
                
                header("location: update_creative.php");
                
                
            }
            else{
              echo "<span class='warning-2'>Wrong Password</span>";
            }
        }
    }else{
              echo "<span class='warning-2'>Please check the Client name or Email</span>";
    }
}
    


  


?>



<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login Page</title>
    <link rel="stylesheet" href="style.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
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
    /* height: 50%; */
    /* float: right; */
    position: absolute;
    top: 26%;
    left: 62%;z-index: 1
}

input[type=text], input[type=password], input[type=email] {
    width: 100%;

  padding: 6px 10px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
  border-radius: 5px;
  box-shadow: 0 0 7px rgba(0, 0, 0, 0.4);
}
.page_info {
    font-size: 14px;
    margin: 10px 0px;
    font-family: 'bold';
}
button {
    background-image: linear-gradient(#0b61b5, #1277d3);
  color: white;
  padding: 14px 20px;
  margin: 2rem 0.5rem;
  border: none;
  cursor: pointer;
  font-weight:900;
  font-family:bold;
  width: 100%;
  font-size: 1.2rem;
  box-shadow: 1px 1px 4px rgb(0 0 0 / 40%);
  border-radius: 10px;
}

.imgcontainer {
  /* text-align: center; */
  font-size: 2rem;
  font-family: sbold;
  margin: 24px 0 12px 0;
}

img.avatar {
  width: 40%;
  border-radius: 50%;
}

.container {
  padding: 16px;
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
 .warning1{
     color:green;position:absolute;top:165px;font-size:20px;width:50%;float:right;left:55%;text-align:center;z-index:10
 }
 .warning-2{
     color: red;position: absolute;top:39%;text-align:center;margin-left: 75%;z-index:99;width: 100%;transform: translate(-50%, -50%);
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
/*mobile responsive*/
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
        <img class="icon-copy" src="https://s.hcurvecdn.com/selfserve/module1/login/copy1.png"> 
        <img class="icon-copy" src="https://s.hcurvecdn.com/selfserve/module1/login/copy2.png">
         <img class="icon-copy" src="https://s.hcurvecdn.com/selfserve/module1/login/icon.png">
    
    </div>
<form method="post" class="form" >
  <div class="imgcontainer" style="z-index: 1;">
   Sign in to Your Account
  </div>

  <div class="container"  style="z-index: 1;">
    <input type="text" id="client" name="client" class="in" placeholder="Enter Client Name" style="" >
    <input type="email" id="e-mail" name="email" placeholder="Email" class="in"  style="border-radius:5px">
    
     <input id="paswod" type="password" class="in" name="password"  placeholder="Password" autocomplete="off" readonly 
onfocus="this.removeAttribute('readonly')" required minlength="8" title="8 characters minimum" style="border-radius:5px"/> 
<span class="eye" onclick="showpass()"><i class="fa fa-eye"></i></span>
<span class="psw"><a href="forgot.php" style="text-decoration: none; color:#d3d3d3;font-family:sbold;font-weight:900">Forgot Password?</a></span>  
    <button type="submit" name="submit">Sign In</button>
    <span style=" font-size: 1rem;top: 95%;width: 100%;">Don't have an Account? <a href="register.php" style="text-align:right;font-size: 1.1rem;text-decoration: none;color:#2e60a7;font-family:bold;font-weight:900">Sign up for Free</a></span>
<div class="page_info">Click to <a target="_blank" href="https://docs.google.com/document/d/1YsPR8NMrBPzxpHW8SNTdBB9wBSkU1-pv7elX6AG-akk">Know More</a></div>
  </div>
 

 
</form>


</div>
</body>
<script>
    function showpass(){
        if(document.getElementById("paswod").type=="password"){
        document.getElementById("paswod").type="text";
        console.log("password")
        }
        else if(document.getElementById("paswod").type=="text"){
            document.getElementById("paswod").type="password";
            console.log("text");
        }
    }
        if(window.history.replaceState){
            window.history.replaceState( null,null, window.location.href)
        }
    </script>
</html>

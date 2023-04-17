<?php
include "conn.php";
$id=$_GET['id'];
if(isset($_POST['id'])) {
    $id=$_GET['id'];
}
if(isset($_POST['submit'])){
    $poc=$_POST['poc'];
    $emaila=$_POST['emaila'];
    $number=$_POST['number'];
    $gatiname=$_POST['gatiname'];
$sql="SELECT * FROM `campaign_info` WHERE id=$id LIMIT 1";
      $result=mysqli_query($connectDB,$sql);
      $row=mysqli_fetch_assoc($result);
      $tag=$row['adtag_type'];
      
    $to =$emaila;
    $message = "Hello ".$poc.", <br> \r\n\r\n";



    $message .="Please find the AD Tags & AD Previews below<br><br> \r\n\r\n";
    
    $message .="<b>AD Tags- https://publisherplex.io/selfserve/adtags.php?id=".$row['id']."<br><br></b>\r\n\r\n";
    
    $message .="<b>AD Previews - https://publisherplex.io/selfserve/previews.php?id=".$row['id']."<br><br></b> \r\n\r\n";
    
    $message .="Steps to add adtags - https://publisherplex.io/Adtag/faq/".$tag.".php<br><br> \r\n\r\n".
    
    "Note: <br> \r\n\r\n
<ul><li>The AD Tag URL contains " .$row['adtag_type']. " AD Tags.</li>\r\n\r\n
<li>AD Tags to be used on " .$row['adtag_type']. " only.</li> \r\n\r\n
<li>AD Tags will not work on any other Platforms.</li><br></ul> \r\n\r\n

Also,<br> \r\n\r\n
 <ol><li>Please confirm if there is any query in understanding of the AD Tags.</li> \r\n\r\n
<li> Do Let us Know once the Ad Tags are uploaded.</li> \r\n\r\n
<li>Please share the estimated time by when the campaign will be taken live.</li>\r\n\r\n
<li>Please check ads on your end before taking the campaign live.</li></ol>\r\n\r\n



Feel free to contact us in case of Any Queries.<br><br> \r\n\r\n


Thanks<br> \r\n\r\n
HC Updates<br>
"
.$gatiname."<br>"
.$number;

     $subject = $row['campaign_title'] ;
     $header = "From:bizops@hockeycurve.com \r\n";
     $header .= "Cc:dinesh@hockeycurve.com,aditya@hockeycurve.com,harsh@hockeycurve.com,shivam.singh@hockeycurve.com,adithi@hockeycurve.com \r\n";
     $header .= "MIME-Version: 1.0\r\n";
                 $header .= "Content-type: text/html\r\n";

                     
                     $retval = mail ($to,$subject,$message,$header);

$sqlmail="UPDATE `campaign_info` SET `mail_sent`=1 WHERE id=$id";
$resultmail=mysqli_query($connectDB,$sqlmail);

 header("location: ./console.php");
}
?>




<!DOCTYPE html>
<html>

<head>
    <title>Mailer</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>  
<body>
    <h3 style="text-align:center;">Send Mail</h3>
    <div style="display:flex;justify-content:center;align-items:center; height: 300px;">
        <form style="display:flex; flex-direction:column;justify-content:space-between;height:100%; width:400px;" action="" method="post">
            <div style="display:flex; flex-direction:row;justify-content:space-between;align-items:center;">
                <label>POC Name: </label>
                <input style="width:200px;height:50px;font-size:12px;" placeholder="POC name" type="text" name="poc" />
            </div>
            <div style="display:flex; flex-direction:row;justify-content:space-between;align-items:center;"><label>Client Email: <br>(comma separated email) </label><input style="width:200px;height:50px;font-size:12px;" placeholder="abc@gmail.com,xyz@gmail.com" type="text" name="emaila"></div>
            <div style="display:flex; flex-direction:row;justify-content:space-between;align-items:center;"><label>Your Name: </label><input style="width:200px;height:50px;font-size:12px;" placeholder="Your name" type="text" name="gatiname"></div>
            <div style="display:flex; flex-direction:row;justify-content:space-between;align-items:center;"><label>Your Number: </label><input style="width:200px;height:50px;font-size:12px;" placeholder="Your number" type="text" name="number"></div>
            <button style="margin-top:20px; margin-left: 300px; width:100px;height:40px;cursor:pointer;" type="submit" name="submit">Send</button>
        </form>
    </div>
</body>
</html>
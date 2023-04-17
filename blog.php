<?php include 'connection.php';
include 'conn.php';

$id=$_GET['id'];

// if(isset($_POST['id'])) {
//     $id=$_GET['id'];
// }
   $url = $_SERVER['REQUEST_URI'];
    $url_components = parse_url($url);
    parse_str($url_components['query'], $params);
    $test = base64_decode( urldecode( $params['d']));
    // echo $test;
    $dim = explode(",",$test);
    // print_r($dim);
    
     $sql="SELECT * FROM `campaign_info` WHERE id='$dim[0]'  LIMIT 1";

      $result=mysqli_query($connectDB,$sql);
      $row=mysqli_fetch_assoc($result);
      $dim = $dim[1];
      $camp=$row['campaign_name'];
                $client=$row['client_name'];
                
                $sql_creatcode = "SELECT * FROM `creativecode` WHERE client='$client' AND campaign='$camp' AND dimension='$dim'";
            $data_creatcode=mysqli_query($connectDB,$sql_creatcode);
      $row1 = mysqli_fetch_assoc($data_creatcode);
    //   echo $sql;
      $fcat = $row1['filter'];
       $dime = explode("x",$dim);
     
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

 <title>Discover Dynamic Creative Optimization, Programmatic & Remarketing Trends - WhyWhatNext by Hockeycurve</title>
 <meta name="description" content="WhyWhatNext by Hockeycurve is the go to destination for all curious marketers. Browse through exclusive guides, articles and case studies in dynamic creative optimisation, dsp, programmatic buying, display advertising and remarketing ads.">
 <meta name="keywords" content="Dynamic Creation Optimization - DCO, Programmatic Creative, Dynamic Retargeting, CTR,
                     Conversion Rate, Weather Creative, Countdown Creative, Sports Creative, Football score creative, Basketball score creative, 
                     Cricket score creative, eCommerce creative, Feed Creative, OTT dynamic creative, Travel Dynamic ads, auto feed ads,
                     dynamic creative optimisation, programmatic ads, programmatic display,dsp advertising, programmatic buying, google remarketing ads, dco programmatic ads">    

       <!--<script src="logic.js"></script>-->

    <link rel="stylesheet" type="text/css" href="css/blog.css"> 
    <link rel="stylesheet" type="text/css" href="css/blackbox.css"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="theme-color" content="#317EFB"/>
    <!--<link rel="manifest" href="manifest.json">-->
    <link rel="apple-touch-icon" href="images/apple-icon.jpeg">
    
      <script src="js/blog.js"></script>
      <script src="js/blackbox.js"></script>
      
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/simplePagination.js/1.6/jquery.simplePagination.js"></script>

    <style>
     /* pagination */

     .simple-pagination ul {
        margin: -35px 0px 0px;
        padding: 0;
        list-style: none;
        text-align: left;
    }
    
    .simple-pagination li {
        display: inline-block;
        margin-right: 5px;
    }
    
 
    
    .simple-pagination .current {
        color: black;
        /* background-color: #FF7182; */
        /* border-color: #FF7182; */
    }
    @media (max-width: 700px) {
        .simple-pagination ul {
        margin: -10px 0px 0px;
       
    }
}
    #adver{
        width:100%;
        text-align:center;
        margin-top:1.5%;
    }


    </style>
</head>
<body>
     <div class="blackbox" id="blackbox">
            
       <img class="logowhite" onclick="location.reload()" src="images/W_White.png" alt="logo"
           style="position:fixed;top:3.5%;left:3%;width:40px;cursor:pointer">
   
        <div id="close" onclick="location.reload()">&#10005;</div>
    
       <a onclick="location.href = '../product.html';" style="text-decoration:none;">
           <div class="bbcontent" onmouseover="myEnterFunction(this.id)" onmouseout="myEnter()" id="productss" onclick="openn(this.id)" >
           <h6 style="margin-top: 0em;">
               <span id="pr" >01</span>Products.
           </h6></div>
       </a>
   
       <a onclick="location.href = '../about.html';" style="text-decoration:none;">
           <div  class="bbcontent" onmouseover="myEnterFunction(this.id)" onmouseout="myEnter()" id="abouts" onclick="openn(this.id)" >
           <h6 style="margin-top: 0em;">About.
           <span id="ab" >02</span>
           </h6></div>
       </a>

       <a onclick="location.href = 'blog.php';" style="text-decoration:none;">
               <div  class="bbcontent" onmouseover="myEnterFunction(this.id)" onmouseout="myEnter()" id="blog" onclick="openn(this.id)" >
               <h6 style="margin-top: 0em;">Blog.
               <span id="blg" >03</span>
               </h6></div>
        </a>
   
       <a onclick="location.href = '../contact.php';" style="text-decoration:none;">
           <div  class="bbcontent" onmouseover="myEnterFunction(this.id)" onmouseout="myEnter()" id="contacts" onclick="openn(this.id)"  > 
           <h6 style="margin-top: 0em;">Contact.
           <span id="con">04</span>
           </h6></div>
       </a>

       <a onclick="location.href = '../contact.php';" style="text-decoration:none;  cursor:pointer">
           <div id="syhllo" onclick="openn(this.id)" onmouseover="sayhello()" onmouseout="normal()">SAY HELLO</div> 

           <div  id="emailb" onclick="location.href = '../contact.php'">hello@whywhatnext.com</div>
       </a>  
       
       

    </div> 

    <div class="layout" id="layout">
       

        <div class="container">

            <div class="header"> 
                <div style="position:fixed;top:0px;width:100%;height:3em;background-color: white;z-index:100;">
                    <a onclick="location.href = '../index.html';"> <img class="logowhite"  src="images/W_Black.png" alt="logo"
                         style="position:fixed;top:4%;left:3%;width:40px;cursor:pointer"></a>
                         
                         <a onclick="location.href = '../contact.php';">
                            <div id="say" onmouseover="say()" onmouseout="normals()" style="position:fixed;top:2.5%;left:83%;text-align:center;padding-top:8px;width:11.5%;height:33px; 
                            font-size:12px;color:black;border:1px solid black;font-family:MRegular;cursor:pointer"> 
                           SAY HELLO
                          </div></a> 
                     
                   
                
                     <img  class="menu" onclick="openblog()" src="images/menu.svg" alt="menu bar" 
                     style="position:fixed;top:4%;left:96%;width:25px;overflow:hidden;cursor:pointer;z-index:100">
                </div>
            </div>
            <?php
                if($dime[1]<=350)
                {
            ?>
            <div id="adver">
                    <iframe id="adveri" src='https://ad.hockeycurve.com/ad.php?zoneid=<?php echo $dim?>&client=<?php echo $client?>&fcat=<?php echo $fcat?>&partner=dbm&optout=false&hct=master&geo=true&ct0=${CLICK_URL_ENC}&cb=${CACHEBUSTER}&dbmc=ndisuz' frameborder='0' scrolling='no' width='<?php echo $dime[0]?>' height='<?php echo $dime[1]?>'></iframe>
                </div>
              <?php
                }
            ?>   
            <div id="content"  >
             <?php
                // if($dime[0]<=320 && $dime[1]>=350)
                if($dime[0]<=1100 && $dime[1]>=400)
                {
            ?> 
            
            <div id="adveh" style="margin-left:2%;text-align:center;width:100%">
                    <iframe id="adveri" src='https://ad.hockeycurve.com/ad.php?zoneid=<?php echo $dim?>&client=<?php echo $client?>&fcat=<?php echo $fcat?>&partner=dbm&optout=false&hct=master&geo=true&ct0=${CLICK_URL_ENC}&cb=${CACHEBUSTER}&dbmc=ndisuz' frameborder='0' scrolling='no' width='<?php echo $dime[0]?>' height='<?php echo $dime[1]?>'></iframe>
                </div>
            <?php
                }
            ?>
                <div class="main" >
                    <div class="heading">
                       <h1> Blog.</h1>
                    </div>
                    <!-- <div class="blogs"> -->
                    <!-- <div class="post"> -->
                    <ul id="myUL" >
                    <?php
                                $sql = "SELECT * from blog order by id desc";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    // output data of each row
                                    while($row = $result->fetch_assoc()) {
                                    
                                       echo "<li class=\"caat\">";
                                       echo "<div class=\"post\"  onclick=\"submitt($row[id])\"> ";
                                       echo "  <div  class=\"title1\" ><h3>$row[title]</h3></div>";
                                       echo "<div class=\"prdarrw\"> ";
                                       echo "<img class=\"imgprd\" src=\"images/next2.png\" alt=\"arrow\">";
                                       echo "  </div>";
                                       echo "  <div class=\"desc\">$row[description]</div>";
                                       echo " <div class=\"details bldet\">";
                                       echo " 
                                               <span><a>$row[catg]</a></span>
                                                <span>|</span>
                                                <span>$row[date]</span> 
                                                <span>|</span>
                                                <span> $row[rtym] min read </span> ";
                                       echo "</div>";
                                       
                                       echo "</div>";
                                       echo "</li>";
                                    
                                    }

                                } 

                            ?> 
                            </ul>
                       <!-- </div>      -->
                    <div class="nav" >
                        <!--<div onclick="location.href = '../contact.php';" id="email">hello@whywhatnext.com-->
                        <!-- </div>-->
                         <div  id="num"></div>

                    </div>
                
    
                </div>
                <div class="notes" >

                    <div class="search" style="display:inline">
                        
                        <form style="display:inline" action="" method="post">
                            <label>Search Blog
                        <input id="abc" type="text" onkeyup="myFunction()" autocomplete="off" class="searchTerm" placeholder="SEARCH" style="font-size:13px">
                        </lable>
                        <button style="	pointer-events:none;cursor:pointer;" type="submit" id="xyz" class="searchButton" aria-label="Search">
                        <i class="fa fa-search" style="font-size: 20px;"></i>
                        </button>
                        </form>
                        </div>
                    
                    
                    <div class="categories" >
                        <div class="heading" style="border-bottom: .5px solid #9A9A9A;">
                            <h4>Categories</h4>
                        </div>
                        <ul id="myUL1">
                        <?php

                                
                            $sql = "SELECT * from blog GROUP BY catg order by id desc  ";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                // output data of each row
                                while($row = $result->fetch_assoc()) {


                                echo "<li><a onclick=\"myFunction()\">$row[catg]</a> ";
                                echo "</li>";
                            
                                }

                            } 

                        ?> 
                        </ul>
                    </div>
                    <div class="popular ">
                        <div class="heading">
                            <h4>Popular Posts</h4>
                        </div>
                        
                        <ul > 
                        <?php

                                
                                $sql = "SELECT * from blog order by id desc limit 3";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    // output data of each row
                                    while($row = $result->fetch_assoc()) {

                         
                                       echo "<li> ";
                                       echo "  <div class=\"title\" onclick=\"submitt($row[id])\"><h5>$row[title]</h5></div>";
                                       echo " <div class=\"details\"> $row[rtym] min read";
                                       echo "</li>";
                                  
                                    }

                                } 

                            ?> 
                           
                        </ul>
                    </div>

                </div>

            </div>

        </div>
    </div>
    <div class="footer" id="foot" >
    
        <div class="footer-distributed" >
        <div class="footer-left">
        <p class="footer-links"> 
        <a href="../index.html" onclick="location.reload()">Home</a> 
        <a href="../product.html" id="prod" onclick="openn(this.id)" >Products</a>
        <a href="../about.html" id="abt" onclick="openn(this.id)">About</a>
        <a href="blog.php" id="blgg" onclick="openn(this.id)">Blog</a>
        <a href="../contact.php" id="cont" onclick="openn(this.id)">Contact</a>
        </p>
        <p class="footer-company-name">© WhyWhatNext.com | All right reserved 2020</p>  

        </div> 
        <div onclick="location.href = '../contact.php';" class="email2">hello@whywhatnext.com</div>
    
    </div>
   
</div>
</body>
<!--<script src="service-worker.js"></script>-->

<script>

 var width = <?php echo $dime[0] ?>;
 var height = <?php echo $dime[1] ?>;
 console.log(width)
 console.log(height)

    
 if (window.matchMedia('screen and (max-width: 768px)').matches)
    {
         document.getElementById("content").style.gridTemplateColumns = "none"
        if(document.getElementById("adveri").width > "400")
        {
            // alert("IN")
            // alert(document.getElementById("adveri").width)
            document.getElementById("adver").style.display = "none";
            
        }
        else{
            document.getElementById("adver").style.display = "block";
        }
       
    }
    else{
        
            if(height <= 350 )
        {
            document.getElementById("content").style.gridTemplateColumns = "73% 24%"
    //         alert("ii")
    //         document.getElementById("adver").style.display = "block";
            
        }
        else if(width<=320 && height>=350)
        {
    //         alert("hh")
    //          document.getElementById("adverh").style.display = "block";
             document.getElementById("content").style.gridTemplateColumns = "20% 60% 20%"
        }
    }    
</script>
<script>

var items = $(".main .post");
    var numItems = items.length;
    var perPage = 4;

    items.slice(perPage).hide();

    $('#num').pagination({
        items: numItems,
        itemsOnPage: perPage,
        prevText: "",
        nextText: "",
        onPageClick: function (pageNumber) {
            var showFrom = perPage * (pageNumber - 1);
            var showTo = showFrom + perPage;
            items.hide().slice(showFrom, showTo).show();
        }
    });
</script>

</html>


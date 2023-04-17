<?php
ob_start();
error_reporting(E_ERROR | E_PARSE);
include "../conn.php";
$url = $_SERVER['REQUEST_URI'];

    // $url_components = parse_url($url);
    // parse_str($url_components['query'], $params);
    // $client = $params['client'];
    // // echo $client;
    // $sql = "SHOW COLUMNS FROM $client";
    //     $result = mysqli_query($connectDB,$sql);
    //     $rowcount = mysqli_num_rows( $result );
    //     while($row = mysqli_fetch_array($result))
    //     {
    //         $name[] = $row['Field'];
    //     }
        


$id=$_GET['id'];
if(isset($_POST['id'])) {
    $id=$_GET['id'];
}

$sql1="SELECT * FROM `campaign_info` WHERE id='$id'";
$data1=mysqli_query($connectDB,$sql1);
if(mysqli_num_rows($data1)>0){
    while($row1=mysqli_fetch_assoc($data1)){
    $camp =  strtolower($row1['campaign_name']);
    $client =  str_replace(" ","",strtolower($row1['client_name']));   
    $template = $row1['template'];
    $dimension = $row1['dimension']; 
    $abc=explode(",",$dimension);
     for($f=0; $f<count($abc); $f++ ){
         $sql2="SELECT * FROM `creativecode` WHERE name=$template AND campaign=$camp AND client=$client AND dimension=$abc[$f]"; 
         $data2=mysqli_query($connectDB,$sql2);
         if(mysqli_num_rows($data2)>0){
             while($rowa=mysqli_fetch_assoc($data2)){
                 echo $rowa['content'];
             }
     }
}


}}
  
?>
<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">  
 
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.19.1/TweenMax.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" href="styles.css" />
</head>  
<style>
    body{
        font-family: 'Times New Roman', Times, serif;
        user-select: none;
        margin-left:1%;
    }
    .table1,th,td{
       width: auto;
       height:auto;
       border: 1px solid black;
       padding: 10px;
       margin: auto;
       text-align: center;
       border-collapse: collapse; 
    }
    img{
        width:20px;
    }
    input{
        outline: none;
        border: 0px;
        text-align: center;
        background-color: white;
    }
    select,option{
        width:10%;
        text-align:center;
        height:4%;
        border:1px solid gray;
        border-radius:10px;
        font-size:18px;
        -webkit-appearance:none;
        outline:none;  

    }
    .fa-home{
        display: none;
    }
    .section1 { 
                width: auto;
                height:auto; 
                margin-top: auto;
                left:0px;
                top:0px;
                overflow-wrap: anywhere;
                text-align:center; 
                /*border:1px solid red;*/
                
            } 
    textarea {
    border: none;
    background-color: transparent;
    resize: none;
    outline: none;
}        
.multiselect{
        width:180px;
        font-size:20px;
    }
    .input-group-addon{
        display:none;
    }
    .dropdown-menu{
        max-height:230px;
        overflow-y:auto;
    }
    li{
        font-size:18px;
    }
        input[type="radio"]{
        display:none;
    }
    .btn-group{
        display: none;
    }
    .cad{
        float: right;
        margin: 30px 40px 0px 0px;
    }
</style>    
<body>
<button type="submit" name="runs" class="cad" value="runc">Create Ad</button> 
    <a href="./" style="font-size:28px;color:black;position:absolute;top:0px"><i class="fa fa-home"></i></a>
    <form id="formId" method="post">
    <select id="campaigns" name="campaign">
            <?php
                $sql = "select campaign from $client group by campaign";
                $result = mysqli_query($connectDB, $sql);
                while($row = mysqli_fetch_array($result))
                { 
                    $campaign = $row['campaign'];
                echo '<option value ='.$campaign.'>'.$campaign.'</option>';
                }
            ?>
        </select> <button name="submit" type="submit" style="border:1px solid black;font-size:15px;display:none;">Submit</button>
        <script>
            let $select = $('#campaigns').multiselect({
  enableFiltering: true,
  includeFilterClearBtn: true,
  enableCaseInsensitiveFiltering: true
});

        </script>
    <?php
      
      if(!empty($client))
      {
        echo '<br><br><table class="table1" id="table1">
        <thead>
        <tr id="addrow">';  
        $sql = "SHOW COLUMNS FROM $client";
        $result = mysqli_query($connectDB,$sql);
        $rowcount = mysqli_num_rows( $result );
        $name[] = $rowcount['Field'];
        echo '<th>Previews</th>';
        while($row = mysqli_fetch_array($result))
        {
           if ($row['Field']=="testanim" ||$row['Field']=="id"||$row['Field']=="date" ||$row['Field']=="fcat"||$row['Field']=="client"){
               echo '<th style="display:none;" name='.$row['Field'].'>'.$row['Field'].'</th>';
           }
           elseif($row['Field']=="campaign" ) {
                echo '<th style="display:none;" name='.$row['Field'].'>Campaign Name</th>';
           }
           elseif($row['Field']=="dim" ) {
                echo '<th name='.$row['Field'].'>Ad Size</th>';
           }
           elseif($row['Field']=="previews" ) {
            echo '<th name='.$row['Field'].'>previews</th>';
       }
           elseif($row['Field']=="animation" ) {
                echo '<th name='.$row['Field'].'>Animation</th>';
           }
           else{
            // echo '<th name='.$row['Field'].'>'.$row['Field'].'</th>'; 
           }
        }
       
            echo '</tr>
            </thead>
            <tbody>';
            $datee = date("Y-m-d");
            if(isset($_POST['submit']))
            {
                $campaign = $_POST['campaign'];
                $sql = "select * FROM $client where campaign = '$campaign' ";
            }
            else{
                $sql = "select * FROM $client where date = '$datee' ";
            }
           
            $rowcount = mysqli_num_rows( $result );
            $result = mysqli_query($connectDB,$sql);
            $result1 = mysqli_query($connectDB,$sql);
            while($row1 = mysqli_fetch_assoc($result1)){
             $json[] = $row1;
            }
            $count=0;
            while($row = mysqli_fetch_array($result))
            {
                
                echo '<tr>';
                 echo '<td><div id="dyn'.$count.'" style="position:relative;display: flex;flex-wrap: wrap;width:100%"></div> </td>';
                for ($i=2;$i<=$rowcount-1;$i++)
                    { 
                        if($name[$i]=="dim" ||$name[$i]=="date"||$name[$i]=="top"||$name[$i]=="width"||$name[$i]=="left"||$name[$i]=="height")
                        {
                            echo '<td ><input type="text" name="'.$name[$i].$row['id'].'"value="'.$row[$i].'"></td> ';
                        }
                     if($name[$i]=="animation"){
                            echo '<td><a href="./animation.php?id='.$row['id'].'&date='.$row['date'].'&client='.$row['client'].'&fcat='.$row['fcat'].'&dim='.$row['dim'].'">Update Animation</a><span><img src="./info.png" class="img" title="You can make changes in animation"></span></td>';
                        }else if($name[$i]=="fcat"||$name[$i]=="client" ){
                            echo '<td style="display:none;" ><input  type="text" name="'.$name[$i].$row['id'].'"value="'.$row[$i].'"></td> ';
                        }
                        else if($name[$i]=="testanim" || $name[$i]=="campaign"){
                            echo '<td style="display:none;"></td> ';
                        }
                        else if($name[$i]=="previews"){
                            echo '<td style=""=></td> ';
                        }
                        else{
                 
                            // echo '<td ><a href='.$row[$i].' target = "_blank"><input class="section1" type="text" name="'.$name[$i].$row['id'].'"value="'.$row[$i].'"></a></td> ';
                            // echo "<td ><textarea class='section1' type='text' name='".$name[$i].$row['id']."'value='".$row[$i]."'>".$row[$i]."</textarea></td>";
                        }
                        
                    }
                   
                    // echo '<td><input type="submit" name="update" onclick="idd(this.parentElement.id-1)" value="Update">';
                    echo '</tr>'; 
                 $count++;   
            }
            
            echo '</tbody>  
            </table><br><br>'; 

        }    
    
    ?> 
  
     <!-- <button type="submit" name="runs" value="runc">Create Ad</button>  -->
     <input type="hidden" id="colc" name="colc" value="">
    </form> <br>
    <!-- <div id="dyn" style="position:relative;display: flex;flex-wrap: wrap;width:100%;"></div> -->
</body>
</html>
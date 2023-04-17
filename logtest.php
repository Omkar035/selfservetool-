<?php
include "conn.php";
error_reporting(E_ERROR | E_PARSE);



?><head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/simplePagination.js/1.6/jquery.simplePagination.js"></script>
</head>
<body>
    
    <style>

.dropdown-menu{
        max-height: 500px;
    overflow: overlay;
}
     .input-box {
  width: 100%;
  margin: 50px 0px;
}
form {
  display: flex;
  justify-content: center;
  flex-direction:row;
  width: 100%;
  
   margin: 0px 10px;
}
 
#pagination ul{
      display: flex;
  }
    #pagination li {
          list-style-type: none;
          margin: 10px 0px;
          padding: 6px 10px;
      }
      
      .table{
          width:100%;
          display: flex;
          align-items: center;
          flex-direction: column;
      }
      .table table {
  border-collapse: collapse;
  width: 100%;
}.table table td,
 .table table th {
  padding: 5px;
  font-size: 1.6rem;
  border: solid 0.5px black;
}
    </style>
    <h2 style="width:100%;text-align:center">LOG FILES</h2>
    <form method="POST">
     
        <div class="input-box">
          <label for="datefrom">From</label>
          <input type="date" name="datefrom" id="datefrom">
        </div>

        <div class="input-box">
          <label for="dateto">To</label>
          <input type="date" name="dateto" id="dateto">
        </div>

        <div class="input-box">
          <label for="clients">Clients</label>
          <select id="clients" name="client" multiple="multiple">
              <?php
                $sqlc = "SELECT distinct client_name FROM `log_file` WHERE client_name !='' ";
      $resultc = $connectDB->query($sqlc);
      
      if ($resultc->num_rows > 0) {
        // output data of each row
        while($rowc = $resultc->fetch_assoc()) {
            ?>
                <option value="<?php echo $rowc['client_name'] ?>"><?php echo $rowc['client_name'] ?></option>
            <?php
        }}
              ?>
              
              
          </select>
        </div>

        <div class="input-box">
          <label for="emails">Emails</label>
          <select id="emails" name="emails" multiple="multiple">
              <?php
                $sqle = "SELECT distinct email FROM `log_file` WHERE email !=''";
      $resulte = $connectDB->query($sqle);
      
      if ($resulte->num_rows > 0) {
        // output data of each row
        while($rowe = $resulte->fetch_assoc()) {
            ?>
                <option value="<?php echo $rowe['email'] ?>"><?php echo $rowe['email'] ?></option>
            <?php
        }}
              ?>
          </select>
        </div>
        <div class="input-box">
          <label for="fcats">Fcats</label>
          <select id="fcats" name="fcats" multiple="multiple">
              <?php
                $sqlf = "SELECT distinct fcat FROM `log_file` WHERE fcat !='' ";
      $resultf = $connectDB->query($sqlf);
      
      if ($resultf->num_rows > 0) {
        // output data of each row
        while($rowf = $resultf->fetch_assoc()) {
            ?>
                <option value="<?php echo $rowf['fcat'] ?>"><?php echo $rowf['fcat'] ?></option>
            <?php
        }}
              ?>
          </select>
        </div>
        <div class="input-box">
          <label for="adtag">Adtag</label>
          <select id="adtag" name="adtag" multiple="multiple">
              <?php
                $sqla = "SELECT distinct adtag FROM `log_file` WHERE adtag !=''";
      $resulta = $connectDB->query($sqla);
      
      if ($resulta->num_rows > 0) {
        // output data of each row
        while($rowa = $resulta->fetch_assoc()) {
            ?>
                <option value="<?php echo $rowa['adtag'] ?>"><?php echo $rowa['adtag'] ?></option>
            <?php
        }}
              ?>
          </select>
        </div>
        <div class="input-box">
          <label for="events">Events</label>
          <select id="events" name="events" multiple="multiple">
              <?php
                $sqlev = "SELECT distinct event FROM `log_file` WHERE event !=''";
      $resultev = $connectDB->query($sqlev);
      
      if ($resultev->num_rows > 0) {
        // output data of each row
        while($rowev = $resultev->fetch_assoc()) {
            ?>
                <option value="<?php echo $rowev['event'] ?>"><?php echo $rowev['event'] ?></option>
            <?php
        }}
              ?>
          </select>
        </div>
        
        <div class="input-box">
          <button type="submit" name="submit">Result</button>
        </div>

      </form>
      <div id="table" class="table">
      <table>
          <thead>
  <th style="text-align: center;">Date</th>
  <th style="text-align: center;">Client</th>
  <th style="text-align: center;">Email</th>
  <th style="text-align: center;">Fcat</th>
  <th style="text-align: center;">Adtag-Type</th>
  <th style="text-align: center;">Event</th>
    </thead>
    <?php
      $sql = "SELECT * FROM `log_file` ORDER BY id DESC";
      $result = $connectDB->query($sql);
      
      if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $time=$row['date_time'];
              $client=$row['client_name'];
              $email=$row['email'];
              $fcat=$row['fcat'];
              $event=$row['event'];
              $adtag=$row['adtag'];
            ?>
            <tr class="t2">
      <td style="text-align: center;"><?php echo $time ?></td>
        <td style="text-align: center;"><?php echo $client ?></td>
        <td style="text-align: center;"><?php echo $email ?></td>
        <td style="text-align: center;"><?php echo $fcat ?></td>
        <td style="text-align: center;"><?php echo $adtag ?></td>
        <td style="text-align: center;"><?php echo $event ?></td>
        
        </tr>
            
            
            <?php
        }}
          ?>
      </table>
      <div id="pagination"></div>
      </div>
</body>



<?php
if(isset($_POST['submit'])){
    $datefrom=$_POST['datefrom'];
    $new_date=$_POST['dateto'];
    $dateto = date('Y-m-d', strtotime($new_date . ' +1 day'));
    $client2=$_POST['client'];
    $email2=$_POST['emails'];
    $fcat2=$_POST['fcats'];
    $adtag2=$_POST['adtag'];
    $event2=$_POST['events'];
    
    if($datefrom!="" && $dateto!="" && $client2!=""){
        $query="SELECT * from `log_file` where client_name='$client2' date_time BETWEEN '$datefrom' AND '$dateto'  ORDER BY id DESC";
    }
    else if($datefrom!="" && $dateto!="" && $email2!=""){
        $query="SELECT * from `log_file` where email='$email2' date_time BETWEEN '$datefrom' AND '$dateto'  ORDER BY id DESC";
    }
    else if($datefrom!="" && $dateto!="" && $fcat2!=""){
        $query="SELECT * from `log_file` where fcat='$fcat2' date_time BETWEEN '$datefrom' AND '$dateto'  ORDER BY id DESC";
    }
    else if($datefrom!="" && $dateto!="" && $adtag2!=""){
        $query="SELECT * from `log_file` where adtag='$adtag2' date_time BETWEEN '$datefrom' AND '$dateto'  ORDER BY id DESC";
    }
    else if($datefrom!="" && $dateto!="" && $event2!=""){
        $query="SELECT * from `log_file` where event='$event2' date_time BETWEEN '$datefrom' AND '$dateto'  ORDER BY id DESC";
    }
    else if($datefrom!="" && $dateto!=""){
        $query="SELECT * from `log_file` where date_time BETWEEN '$datefrom' AND '$dateto'  ORDER BY id DESC";
    }

    
    else if($client2!=""){
        $query="SELECT * from `log_file` where client_name='$client2' ORDER BY id DESC ";
    }else if($email2!=""){
         $query="SELECT * from `log_file` where email='$email2' ORDER BY id DESC";
    
    }else if($email2!=""){
         $query="SELECT * from `log_file` where email='$email2' ORDER BY id DESC";
    
    }else if($fcat2!=""){
         $query="SELECT * from `log_file` where fcat='$fcat2' ORDER BY id DESC";
    
    }else if($adtag2!=""){
         $query="SELECT * from `log_file` where adtag='$adtag2' ORDER BY id DESC";
    
    }else if($event2!=""){
         $query="SELECT * from `log_file` where event='$event2' ORDER BY id DESC";
    
    }
    ?>
        <script>
            document.getElementById("table").innerHTML="";
            document.getElementById("table").innerHTML=`
            <table>
                <thead>
  <th style="text-align: center;">Date</th>
  <th style="text-align: center;">Client</th>
  <th style="text-align: center;">Email</th>
  <th style="text-align: center;">Fcat</th>
  <th style="text-align: center;">Adtag-Type</th>
  <th style="text-align: center;">Event</th>
    </thead>
    
    <?php
    $resultfinal = $connectDB->query($query);
      
      if ($resultfinal->num_rows > 0) {
        // output data of each row
        while($rowfinal = $resultfinal->fetch_assoc()) {
    ?>
    <tr class="t2">
      <td style="text-align: center;"><?php echo $rowfinal['date_time'] ?></td>
        <td style="text-align: center;"><?php echo $rowfinal['client_name'] ?></td>
        <td style="text-align: center;"><?php echo $rowfinal['email'] ?></td>
        <td style="text-align: center;"><?php echo $rowfinal['fcat'] ?></td>
        <td style="text-align: center;"><?php echo $rowfinal['adtag'] ?></td>
        <td style="text-align: center;"><?php echo $rowfinal['event'] ?></td>
        
        </tr>
        <?php 
        }}else{
            echo "no data";
        }
        ?>
            </table><div id="pagination"></div>`;
        </script>
    <?php
}

?>









<script>
    let $select = $('select').multiselect({
  enableFiltering: true,
  includeFilterClearBtn: true,
  enableCaseInsensitiveFiltering: true
  
});
</script>
<script type="text/javascript">
  var items = $("#table .t2");
  console.log(items.length)
  var numItems = items.length;
    var perPage = 50;
    items.slice(perPage).hide();

    $('#pagination').pagination({
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


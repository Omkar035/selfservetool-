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
    max-height: 345px;
    overflow: overlay;
    max-width: 250px;
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
    <h2 style="width:100%;text-align:center">Client Campaign Manager - SelfServe</h2>
    <form method="POST">
     
        <div class="input-box">
          <label for="create_datefroms">From</label>
          <input type="date" name="create_datefrom" id="create_datefroms">
        </div>

        <div class="input-box">
          <label for="create_datetos">To</label>
          <input type="date" name="create_dateto" id="create_datetos">
        </div>

        <div class="input-box">
          <label for="clients">Client</label>
          <select id="clients" name="client" multiple="multiple">
              <?php
                $sqlc = "SELECT distinct client_name FROM `campaign_info` WHERE client_name !='' ORDER BY id DESC";
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
          <label for="titles">Title</label>
          <select id="titles" name="title" multiple="multiple">
              <?php
                $sqle = "SELECT distinct campaign_title FROM `campaign_info` WHERE campaign_title !='' ORDER BY id DESC";
      $resulte = $connectDB->query($sqle);
      
      if ($resulte->num_rows > 0) {
        // output data of each row
        while($rowe = $resulte->fetch_assoc()) {
            ?>
                <option value="<?php echo $rowe['campaign_title'] ?>"><?php echo $rowe['campaign_title'] ?></option>
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
  <th style="text-align: center;">create_date</th>           
  <th style="text-align: center;">Client</th>
  <th style="text-align: center;">Title</th>
  <th style="text-align: center;">Previews</th>
  <th style="text-align: center;">Mail</th>
  
    </thead>
    <?php
      $sql = "SELECT * FROM `campaign_info` ORDER BY id DESC";
      $result = $connectDB->query($sql);
      
      if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
              $dimension=$row['dimension'];
              $id=$row['id'];
              $create_date=$row['create_date'];
              $client=$row['client_name'];
              $title=$row['campaign_title'];
              $mail_sent=$row['mail_sent'];
              $single_dim=explode(',',$dimension);
              for($dim=0;$dim<count($single_dim);$dim++){
            ?>
            <tr class="t2">
        <td style="text-align: center;"><?php echo $create_date ?></td>
        <td style="text-align: center;"><?php echo $client ?></td>
        <td style="text-align: center;"><?php echo $title."-".$single_dim[$dim] ?></td>
        <td style="text-align: center;"><a target="_blank" href="https://publisherplex.io/selfserve/previews.php?id=<?php echo $id ?>">URL</a></td>
        <?php if($mail_sent==1){
        ?>
        <td style="text-align: center;"><a target="_blank" style="color:red" href="https://publisherplex.io/selfserve/mailer.php?id=<?php echo $id ?>">Mail</a></td>
        <?php 
        } else{
        ?>
        <td style="text-align: center;"><a target="_blank" href="https://publisherplex.io/selfserve/mailer.php?id=<?php echo $id ?>">Mail</a></td>
        <?php
        } ?>
        
        
        </tr>
            
            
            <?php
        }}}
          ?>
      </table>
      <div id="pagination"></div>
      </div>
</body>



<?php
if(isset($_POST['submit'])){
    $create_datefrom=$_POST['create_datefrom'];
    $create_dateto=$_POST['create_dateto'];
    // $create_dateto = date('Y-m-d', strtotime($new_date . ' +1 day'));
    $client2=$_POST['client'];
    $title2=$_POST['title'];

    
    if($create_datefrom!="" && $create_dateto!=""){
        if($client2!="" && $title2!=""){
             $query="SELECT * from `campaign_info` where client_name='$client2' AND campaign_title='$title2' AND create_date BETWEEN '$create_datefrom' AND '$create_dateto' ORDER BY id DESC ";
        }
        else if($client2!=""){
        $query="SELECT * from `campaign_info` where client_name='$client2' AND create_date BETWEEN '$create_datefrom' AND '$create_dateto' ORDER BY id DESC ";
    }else if($title2!=""){
         $query="SELECT * from `campaign_info` where campaign_title='$title2' AND create_date BETWEEN '$create_datefrom' AND '$create_dateto' ORDER BY id DESC";
    }else{
        $query="SELECT * from `campaign_info` where create_date BETWEEN '$create_datefrom' AND '$create_dateto' ORDER BY id DESC";
    }
    }
    else if($client2!=""){
        if($title2!=""){
            $query="SELECT * from `campaign_info` where client_name='$client2' AND campaign_title='$title2' ORDER BY id DESC ";
        }else{
            $query="SELECT * from `campaign_info` where client_name='$client2' ORDER BY id DESC ";
        }
        
    }else if($title2!=""){
         $query="SELECT * from `campaign_info` where campaign_title='$title2' ORDER BY id DESC";
    }
    ?>
        <script>
            document.getElementById("table").innerHTML="";
            document.getElementById("table").innerHTML=`
            <table>
                <thead>
  <th style="text-align: center;">create_date</th>           
  <th style="text-align: center;">Client</th>
  <th style="text-align: center;">Title</th>
  <th style="text-align: center;">Adtags</th>
  <th style="text-align: center;">Previews</th>
  <th style="text-align: center;">Mail</th>
    </thead>
    
    <?php
    $resultfinal = $connectDB->query($query);
      
      if ($resultfinal->num_rows > 0) {
        // output data of each row
        while($rowfinal = $resultfinal->fetch_assoc()) {
    ?>
    <tr class="t2">
      <td style="text-align: center;"><?php echo $rowfinal['create_date'] ?></td>
        <td style="text-align: center;"><?php echo $rowfinal['client_name'] ?></td>
  <td style="text-align: center;"><?php echo $rowfinal['campaign_title'] ?></td>
        <td style="text-align: center;"><a target="_blank" href="https://publisherplex.io/selfserve/adtags.php?id=<?php echo $rowfinal['id'] ?>">URL</a></td>
        <td style="text-align: center;"><a target="_blank" href="https://publisherplex.io/selfserve/previews.php?id=<?php echo $rowfinal['id'] ?>">URL</a></td>
        <?php if($rowfinal['mail_sent']==1){
        ?>
        <td style="text-align: center;"><a target="_blank" style="color:red" href="https://publisherplex.io/selfserve/mailer.php?id=<?php echo $rowfinal['id'] ?>">Mail</a></td>
        <?php 
        } else{
        ?>
        <td style="text-align: center;"><a target="_blank" href="https://publisherplex.io/selfserve/mailer.php?id=<?php echo $rowfinal['id'] ?>">Mail</a></td>
        <?php
        } ?>
        
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
    var perPage = 10;
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


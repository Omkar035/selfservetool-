<?php

include "./conn.php";

$sql = "SELECT * FROM templates WHERE template_name = '{$_POST['template']}' LIMIT 1 ";
$result = mysqli_query($connectDB, $sql) or die("SQL Query Failed.");

$output = "";
?>


<form method="POST" >
<?php
if(mysqli_num_rows($result) > 0 ){
  $output .= '
  Select Dimension : <select name="dim[]" id="templates_drop" multiple="multiple" title="Select Dimension" required>
  ';
  $sql1 = "SELECT * FROM templates WHERE template_name = '{$_POST['template']}'";
$result1 = mysqli_query($connectDB, $sql1) or die("SQL Query Failed.");
  while($row1 = mysqli_fetch_assoc($result1)){
    $output.="<option value='{$row1['dim']}'>{$row1['dim']}</option>";
  }
  $output.='
  </select>';

   echo $output;
}else{
    echo "No Record Found.";
}
?>
<?php
   $autofcats2 = "";
            $characters = 'abcdefghijklmnopqrstuvwxyz0123456789';
              $charCount = strlen($characters);
              for($i=0;$i<6;$i++){
                $autofcats2 .= substr($characters,rand(0,$charCount),1);}
            ?>         
<script>
  function refresh(){
        window.location.reload("Refresh")
      }
</script>
<script>

let $select<?php echo $autofcats2 ?> = $('#templates_drop').multiselect({
  enableFiltering: true,
  includeFilterClearBtn: true,
  enableCaseInsensitiveFiltering: true
  
});
    </script>


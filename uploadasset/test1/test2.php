<?php
    
    session_start();
    $paths = $_SESSION['urlpath'];
    $assets = $_SESSION['assets'];
    
    $id=$_GET['id'];
    if(isset($_POST['id'])) {
        $id=$_GET['id'];
    }
    
    if(isset($_POST['back'])){
        $_SESSION['ast_val'] = 0;
        
        header("location:https://publisherplex.io/selfserve/uploadasset/test1.php?id=$id");
    }
    if(isset($_POST['done'])){
        $_SESSION['ast_val'] = 1;
        $s_d = basename($paths);
        $s_n = "assest_$s_d";
        $_SESSION[$s_n] = $_POST['up_st'];
        header("location:https://publisherplex.io/selfserve/uploadasset/test1.php?id=$id");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Upload Assets</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
    <script src="https://dynamique.hockeycurve.com/js/hc.min.js"> </script>
    
    <body>
        <form method="post" id="ast_bx">
            <h4>Assets required to Upload</h4>
            <ul style="list-style:none;padding:0;"></ul>
            <div id="err_bx"></div>
            <input name="up_st" id="updt_vl" type="hidden" />
            <button name="back">Back to creative</button>
        </form>
        
<script>
    
    pathurl = "<?php echo $paths ?>";
    req_assets = "<?php echo $assets ?>";
    
    req_assets.split(",").forEach(el =>{
        document.querySelector("ul").innerHTML += `<li id="${el}">${el}</li>`;
    })
    
  let assetManager = HC.AssetManager(document.body)

       async function postName() 
   {
  const object = { "paths":[pathurl+'/'] };
  const response = await fetch('https://dynamique.hockeycurve.com/keys?key=Kth7NS3ACWX2', {
    method: 'POST',
    body: JSON.stringify(object)
  });
  const test = await response.json();
  
  var keyss=test['data'][0]['key']
   
    assetManager.showFolders([{path:pathurl+'/',key:keyss}])
    
var a = await assetManager.getFiles({path:pathurl+'/',key:keyss})
var img_arr = [];

assetManager.onUpdate((data) => {
   document.querySelector("#err_bx").innerHTML = "";
    data.items.forEach(item => {
        if(req_assets.split(",").includes(item.name)){
            req_assets.split(",").forEach(el =>{
                if(item.name == el){
                    document.querySelector(`#${el}`).innerHTML += '<i class="fa fa-check" aria-hidden="true"></i>';
                    if(!img_arr.includes(item.name)){
                        img_arr.push(item.name);
                    }
                    if(req_assets.split(",").length == img_arr.length){
                        var vn = JSON.stringify(a);
                         document.querySelector("#updt_vl").value = vn;
                        document.querySelector("#ast_bx").innerHTML += `<button name="done">Done</button>`;
                        
                    }
                }      
            })
        }
        else{
            document.querySelector("#err_bx").innerHTML += `<span style="color:red;">${item.name} is not the required asset for the creative please check</span><br>`;
        }
    })
})
    a.forEach(al => {
        var img_nm = al.Key.substring(al.Key.lastIndexOf('/')+1).split('.')[0];
        if(req_assets.split(",").includes(img_nm)){
            img_arr.push(img_nm)
            req_assets.split(",").forEach(el =>{
                if(img_nm == el){
                    document.querySelector(`#${el}`).innerHTML += '<i class="fa fa-check" aria-hidden="true"></i>';}
            })
            
            if(req_assets.split(",").length == img_arr.length){
                         var vn = JSON.stringify(a);
                         console.log(vn);
                         document.querySelector("#updt_vl").value = vn;
                        document.querySelector("#ast_bx").innerHTML += `<button name="done" onclick="done_vt(e)">Done</button>`;
                    }
        }
    })
   }
postName();



</script>

</body>
</html>
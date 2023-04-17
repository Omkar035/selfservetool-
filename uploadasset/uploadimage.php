<?php
    
    session_start();
    if(!$_SESSION['email']){
      header("location: ../login.php");
    }
    $id=$_GET['id'];
    if(isset($_POST['id'])) {
        $id=$_GET['id'];
    }
    
    if(isset($_POST['back'])){
        $_SESSION['ast_val'] = 0;
        
        header("location:./uploadassets.php?id=$id");
    }
    // if(isset($_POST['done'])){
    //     // $_SESSION['ast_val'] = 1;
        
    //     $_SESSION['assets_s'] = $_POST['up_st'];
    //     header("location:./uploadassets.php?id=$id");
    // }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Upload Assets</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.js"></script>
    <style>
        #arr{
    animation:copy ease-in-out 1.5s 3;
    animation-delay: 0.5s;
    opacity: 0;
}
@keyframes copy {
    
  0%   {left: -30px;opacity: 1;}
  50%  {left: -40px;opacity: 1;}
  100% {left: =30px;opacity: 1;}
  
}

#iconimg:hover + .infotxt {
  display: inline-block;
}

.infotxt{
  display: none;
}
    </style>
</head>
    <script src="https://dynamique.hockeycurve.com/js/hc.min.js"> </script>
    
    <body>
        <a href="../logout.php" style="position:absolute;top:5px;left:5px;color: #fff;background-color: #d9534f;border-color: #d43f3a;text-decoration: none;padding: 7px;border-radius: 5px">Logout</a>
        <div id="ast_bx" style="margin-top:50px;">
            <h4>Assets required to Upload</h4>
            <ul style="list-style:none;padding:0;"></ul>
            <div>
                <input type="text" id="req_assest_field" />
                <button style="margin:10px 0" id="add_rm">Add/Remove Assets</button><img style="width:1%;margin-left:10px;" src="https://publisherplex.io/selfserve/info.png" id="iconimg" /><span style="border: 1px solid;background: black;color: white;margin-left: 7px;position: fixed;" class="infotxt">Add or remove assets from creative<br>Assets order (bg,cta)-bg will come first  then cta over it.</span>
            </div>
            <div id="err_bx"></div>
            <input name="up_st" id="updt_vl" type="hidden" />
            <button name="back" onclick="back()">Back to creative</button>
            <span id="btn"></span>
            <div id="show" style="font-size:16px;color:green;display:inline;position:relative;top:30px;left:180px;z-index:10"><span style="font-size:30px;position:absolute;top:-8px;left:-30px;opacity:1" id="arr" >&larr;</span>&nbsp;<b>Click on upload file button to upload your assets</b></div>
        </div> 
<script>
  
    pathurl = localStorage.getItem("path");
    req_assets = localStorage.getItem("asset_req");
    count = localStorage.getItem("count");
    asset_arr = []
    
    req_assets.split(",").forEach(el =>{
        document.querySelector("ul").innerHTML += `<li id="${el}">${el} <span id="tick"></span></li>`;
    })
    
    document.querySelector("#req_assest_field").value = req_assets;
      
    document.querySelector("#add_rm").addEventListener("click",()=>{
        assets_value = document.querySelector("#req_assest_field").value
        localStorage.setItem("asset_req",assets_value);
        window.location.reload();
    })
    
    
  let assetManager = HC.AssetManager(document.body)
var keyss;
       async function postName() 
   {
  const object = { "paths":[pathurl+'/'] };
  const response = await fetch('https://dynamique.hockeycurve.com/keys?key=Kth7NS3ACWX2', {
    method: 'POST',
    body: JSON.stringify(object)
  });
  const test = await response.json();
  
  keyss=test['data'][0]['key']
   
    assetManager.showFolders([{path:pathurl+'/',key:keyss}])
    
a = await assetManager.getFiles({path:pathurl+'/',key:keyss})
console.log(a)
var img_arr = [];

assetManager.onUpdate((data) => {
   document.querySelector("#err_bx").innerHTML = "";
    data.items.forEach(item => {
        // console.log(item)
        if(req_assets.split(",").includes(item.name)){
            req_assets.split(",").forEach(el =>{
                if(item.name == el){
                    document.querySelector(`#${el} #tick`).innerHTML = '<i class="fa fa-check" aria-hidden="true"></i>';
                    if(!img_arr.includes(item.name)){
                        img_arr.push(item.name);
                    }
                    if(req_assets.split(",").length == img_arr.length){
                        document.querySelector("#btn").innerHTML = `<button onclick="assest()" id="done">Done</button> <div style="font-size:16px;color:green;display:inline;margin-left:40px;position:relative;"><span style="font-size:30px;position:absolute;top:-8px;left:-30px;opacity:1" id="arr" >&larr;</span>&nbsp;<b>Your assets are sucessfully uploaded click on done to continue</b></div>`;
                        document.getElementById("show").setAttribute("style","display:none");    
                        window.location.reload();
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
                    document.querySelector(`#${el} #tick`).innerHTML += '<i class="fa fa-check" aria-hidden="true"></i>';
                    // echo "<h2 style:"color:green">uploaded successfully</h2>"; 
                }
            })
            
            if(req_assets.split(",").length == img_arr.length){
                         var vn = JSON.stringify(a);
                        //  console.log(vn);
                         document.querySelector("#updt_vl").value = vn;
                        document.querySelector("#btn").innerHTML = `<button onclick="assest()" id="done">Done</button> <div style="font-size:16px;color:green;display:inline;margin-left:40px;position:relative;"><span style="font-size:30px;position:absolute;top:-8px;left:-30px;opacity:1" id="arr" >&larr;</span>&nbsp;<b>Your assets are sucessfully uploaded click on done to continue</b></div>`;
                document.getElementById("show").setAttribute("style","display:none");    
                
            }
        }
    })
    
    
   }
postName();
async function assest(){
    var aw_ast = await assetManager.getFiles({path:pathurl+'/',key:keyss})
    var vna = JSON.stringify(aw_ast);
    var stat = "dim"+pathurl.split("/")[2]
    localStorage.setItem("assets",vna);
    localStorage.setItem("count",count);
    localStorage.setItem("stat"+stat,stat);
    window.location = "./creative.php?id=<?php echo $id; ?>";
}

function back(){
    window.location = "./creative.php?id=<?php echo $id; ?>";
    
    localStorage.setItem("count",count);
}

</script>

</body>
</html>
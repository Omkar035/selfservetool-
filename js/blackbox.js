    
function openblog(){
       
    document.getElementById("layout").style.display = 'none'

           
                 document.getElementById('blackbox').style.display = 'flex';
                 document.getElementById('foot').style.display = 'none';
             
 
         
 } 
    

function sayhello(){
    document.getElementById("syhllo").style.backgroundColor="white";
    document.getElementById("syhllo").style.color="black";
}
function normal()
{
document.getElementById("syhllo").style.backgroundColor="black";
    document.getElementById("syhllo").style.color="white";
}
function say(){
    document.getElementById("say").style.backgroundColor="black";
    document.getElementById("say").style.color="white";
}
function normals()
{
document.getElementById("say").style.backgroundColor="white";
    document.getElementById("say").style.color="black";
}


function myEnterFunction(id) 
{
if(id == 'productss')
{
    document.getElementById("pr").style.color = "#ffffff";
}
if(id == 'abouts')
{
    document.getElementById("ab").style.color = "#ffffff";
}
if(id == 'contacts')
{
    document.getElementById("con").style.color = "#ffffff";
}
if(id == 'blog')
{
    document.getElementById("blg").style.color = "#ffffff";
}

}
function myEnter() 
{
document.getElementById("pr").style.color = "black"
document.getElementById("ab").style.color = "black";
document.getElementById("con").style.color = "black";
document.getElementById("blg").style.color = "black";
}


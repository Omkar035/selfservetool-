
    function submitt(id)
    {
        window.location.href = "blogpg.php"+"?id="+id;
        

    }
    

    function myFunction() {
        var input, filter, ul, li, a, i,li1,a1,ul1, txtValue, txtValue1;
        input = document.getElementById("abc");
        filter = input.value.toUpperCase();
        ul = document.getElementById("myUL");
        ul1 = document.getElementById("myUL1");
        li = ul.getElementsByTagName("li");
        li1 = ul1.getElementsByTagName("li");
        for (i = 0; i < li.length; i++) {
            a = li[i].getElementsByTagName("a")[0];
        
            txtValue = a.textContent || a.innerText;
        
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                li[i].style.display = "";
                
            } else {
                li[i].style.display = "none";
              
            }
        }
        for (i = 0; i < li1.length; i++) {
            a1 = li1[i].getElementsByTagName("a")[0];
        
            txtValue1 = a1.textContent || a1.innerText;
        
            if (txtValue1.toUpperCase().indexOf(filter) > -1) {
                li1[i].style.display = "";
                
            } else {
                li1[i].style.display = "none";
              
            }
        }
    }
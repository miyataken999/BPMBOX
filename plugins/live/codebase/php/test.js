function showUser2(str) {
    var aaa = "";
    
    if (str == "") {
       // document.getElementById("txtHint").innerHTML = "";
        //return;
    } else { 
        if (window.XMLHttpRequest) {
             xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              var aaa = this.responseText; 
              console.log(aaa);
              popup=window.open(aaa,"window_name","width=300,height=200,scrollbars=yes");
              //window_1.attachURL(aaa);
}
        };
        xmlhttp.open("GET","/dhtmlxC/block/tree/get_menuid.php?q="+str,true);
        xmlhttp.send();
    }
}	

	
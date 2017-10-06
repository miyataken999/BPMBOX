window.dhx4.skin = 'dhx_skyblue';
	var main_layout = new dhtmlXLayoutObject(document.body, '3W');

	var a = main_layout.cells('a');
	a.setWidth('150');
	var tree_1 = a.attachTree();
		tree_1.setImagePath('./codebase/imgs/dhxtree_'+dhx4.skin.replace(/^dhx_/,'')+'/');
		tree_1.enableItemEditor(1);
		tree_1.load('http://157.7.139.217/dhtmlxC/block/tree/05_save_connector.php', 'xml');
	
	tree_1.attachEvent('onClick', function(id, prewid){
		function showUser(str) {
  var aaa = "";
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              //alert(this.responseText);
              var aaa = this.responseText; 
              console.log(aaa);
              cell_1.attachURL(aaa);
            }
        };
        xmlhttp.open("GET","http://157.7.139.217/dhtmlxC/block/tree/get_menuid.php?q="+str,true);
        xmlhttp.send();
    }
}
showUser(id);

	});



	var cell_1 = main_layout.cells('b');
	cell_1.attachURL('http://157.7.139.217/ecc/html/index.php');


	var cell_11 = main_layout.cells('c');
	cell_11.attachURL('http://157.7.139.217/');



	var windows = new dhtmlXWindows();
	windows.setSkin('dhx_skyblue');

	var window_1 = windows.createWindow('window_1', 0, 400, 1200, 400);
	var tabbar_1 = window_1.attachTabbar();
	tabbar_1.addTab('tab_1','tab_1');
	var tab_1 = tabbar_1.cells('tab_1');
	tab_1.setActive();
	tab_1.attachURL('https://www.chatwork.com/#!rid68678236');





	window_1.hide();
	window_1.button('minmax').show();
	window_1.button('minmax').enable();



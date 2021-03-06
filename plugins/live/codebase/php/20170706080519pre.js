window.dhx4.skin = 'dhx_skyblue';
	var main_layout = new dhtmlXLayoutObject(document.getElementById('vb') || document.body, '3W');

	var a = main_layout.cells('a');
	a.setWidth('150');
	var toolbar_2 = a.attachToolbar();
	toolbar_2.setIconsPath('./codebase/imgs/');
	
	var status_2 = a.attachStatusBar();
	status_2.setText('');

	var ribbon_1 = a.attachRibbon({
skin : "dhx_skyblue", icons_path : "./codebase/imgs/", tabs : [
{id : "tab_1", text : "tab_1", items : [

{id : "block_1", text : "block_1", text_pos : "buttom", type : "block", mode : "cols", list : [

{id : "slider_1", text : "slider_1", type : "slider", size : 150, max : 99, step : 1, margin : 10}

]}

]}
]
	});

	var tree_1 = a.attachTree();
		tree_1.setImagePath('./codebase/imgs/dhxtree_'+dhx4.skin.replace(/^dhx_/,'')+'/');
		tree_1.enableItemEditor(1);
		tree_1.load('http://157.7.139.217/dhtmlxC/block/tree/01_basic_connector.php', 'xml');
	
	tree_1.attachEvent('onDrag', function(sId, tId, id, sObject, tObject){
		alert('onDrag');
	});


	tree_1.attachEvent('onDrop', function(sId, tId, id, sObject, tObject){
		alert('onDrop');
	});


	tree_1.attachEvent('onEdit', function(state, id, tree, value){
		alert('onEdit');
	});


	tree_1.attachEvent('onClick', function(id, prewid){
		
alert('onClick'+id);
	});



	var b = main_layout.cells('b');
	b.attachURL('http://157.7.139.217/TRADE/dtb_product_list.php');


	var cell_1 = main_layout.cells('c');
	cell_1.attachURL('http://157.7.139.217/bpmbox/APP_CACHE_VIEW_INDEX_list.php');



	var ribbon_2 = main_layout.attachRibbon({
skin : "dhx_skyblue", icons_path : "./codebase/imgs/", items : [

{id : "block_2", text : "block_2", text_pos : "buttom", type : "block", mode : "cols", list : [

{id : "slider_2", text : "slider_2", isbig : true, type : "slider", size : 150, max : 99, step : 1, margin : 10, vertical : true, enableTooltip : true}

]},
{id : "block_3", text : "block_3", text_pos : "buttom", type : "block", mode : "cols", list : [

{id : "button_1", text : "button_1", isbig : true, type : "button"},
{id : "button_2", text : "button_2", type : "button"}

]},
{id : "block_4", text : "block_4", text_pos : "buttom", type : "block", mode : "cols", list : [

{id : "checkbox_1", text : "checkbox_1", type : "checkbox"}

]}

]
	});

	ribbon_2.attachEvent('onClick', function(id){
		alert('onClick'+id);
var db;
var indexedDB = window.indexedDB || window.mozIndexedDB || window.msIndexedDB;
if (indexedDB) {
  // データベースを削除したい場合はコメントを外します。
  //indexedDB.deleteDatabase("mydb");
  var openRequest = indexedDB.open("mydb", 1.0);
   
  openRequest.onupgradeneeded = function(event) {
    // データベースのバージョンに変更があった場合(初めての場合もここを通ります。)
    db = event.target.result;
    var store = db.createObjectStore("mystore", { keyPath: "mykey"});
     
    // インデックスを作成します。
    store.createIndex("myvalueIndex", "myvalue");
  }
   
  openRequest.onsuccess = function(event) {
        db = event.target.result;
    }
} else {
  window.alert("このブラウザではIndexed DataBase API は使えません。");
}


	});


	ribbon_2.attachEvent('onSelect', function(id, last_id){
		alert('onSelect');
	});


	ribbon_2.attachEvent('onEnter', function(id, value){
		alert('onEnter');

	});




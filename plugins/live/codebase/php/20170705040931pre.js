window.dhx4.skin = 'dhx_skyblue';
	var main_layout = new dhtmlXLayoutObject(document.body, '3W');

	var a = main_layout.cells('a');
	a.setText('TREE');
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
		tree_1.enableKeyboardNavigation(1);
		tree_1.enableMultiselection(1);
		tree_1.enableItemEditor(1);
		tree_1.enableAutoTooltips(1);
		tree_1.load('http://157.7.139.217/dhtmlxC/block/tree/05_save_connector.php', 'xml');
	
	tree_1.attachEvent('onDrag', function(sId, tId, id, sObject, tObject){
		alert('onDrag');
	});


	tree_1.attachEvent('onDrop', function(sId, tId, id, sObject, tObject){
		alert('onDrop');
	});


	tree_1.attachEvent('onClick', function(id, prewid){
		alert(id)
 cell_1.attachURL('http://157.7.139.217/dhtmlxC/dhtmlxGantt/samples/01_initialization/05_connector_xml.html?dhxr1497150585916'); 


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

{id : "checkbox_1", text : "checkbox_1", type : "checkbox"},
{id : "group_1", text : "group_1", type : "group", list : [

{id : "button_3", text : "button_3", type : "button"},
{id : "button_4", text : "button_4", type : "button"}

]}

]}

]
	});

	ribbon_2.attachEvent('onClick', function(id){
		alert('onClick'+id);
if(id=="button_3"){
b.attachURL(" http://157.7.139.217/dhtmlxC/block/grid/BPMBOXEoc.php?dhxr1499434619118"); 
} else{
b.attachHTMLString('<div class="objId">'+
							'<div style="margin: 5px 8px;">'+
								'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'+
							'</div>'+
						'</div>');
}
if(id=="button_1"){
  
}
	});


	ribbon_2.attachEvent('onSelect', function(id, last_id){
		alert('onSelect');
	});


	ribbon_2.attachEvent('onEnter', function(id, value){
		alert('onEnter');
	});




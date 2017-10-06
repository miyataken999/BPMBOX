window.dhx4.skin = 'dhx_skyblue';
	var main_layout = new dhtmlXLayoutObject(document.body, '3W');

	var a = main_layout.cells('a');
	a.setWidth('200');
	var carousel_1 = a.attachCarousel({effect: 'slide', item_width: 'auto', item_height: 'auto', offset_left: '2', offset_top: '2', offset_item: '4', keys: 'true'});
	carousel_1.addCell('carousel_item_1');
	var carousel_item_1 = carousel_1.cells('carousel_item_1');
	var tree_2 = carousel_item_1.attachTree();
		tree_2.setImagePath('./codebase/imgs/dhxtree_'+dhx4.skin.replace(/^dhx_/,'')+'/');
		tree_2.load('/dhtmlxC/block/tree/05_save_connector.php', 'xml');
	
	tree_2.attachEvent('onClick', function(id, prewid){
		showUser(id);  n
	});



	carousel_1.addCell('carousel_item_2');
	var carousel_item_2 = carousel_1.cells('carousel_item_2');
	var tree_3 = carousel_item_2.attachTree();
		tree_3.setImagePath('./codebase/imgs/dhxtree_'+dhx4.skin.replace(/^dhx_/,'')+'/');
		tree_3.load('/dhtmlxC/block/tree/05_save_connector.php', 'xml');
	
	tree_3.attachEvent('onClick', function(id, prewid){
		showUser(id);  
	});







	var b = main_layout.cells('b');
	var layout_1 = b.attachLayout('2E');

	var cell_4 = layout_1.cells('a');
	cell_4.attachURL('http://dev.bpm999.com/bpmbox/APPLICATION_list.php');


	var cell_5 = layout_1.cells('b');
	cell_5.setHeight('100');
	cell_5.attachURL('https://hangouts.google.com/');





	var c = main_layout.cells('c');
	c.attachURL('http://dev.bpm999.com/sys/en/neoclassic/login/login');


	var toolbar_1 = main_layout.attachToolbar();
	toolbar_1.setIconsPath('./codebase/imgs/');
	
	toolbar_1.attachEvent('onClick', function(id){
		if(id=="button_normal_1")popup=window.open('https://bpm999.com/bot/trs/dtb_product_list.php','window_name','width=300,height=200,scrollbars=yes');if(id=="button_normal_2")popup=window.open('http://dev.bpm999.com:85/ide.html','window_name','width=300,height=200,scrollbars=yes');
	});

	toolbar_1.loadStruct('<toolbar><item type="buttonInput" id="button_input_1" /><item type="button" id="button_normal_1" text="Button" /><item type="button" id="button_normal_2" text="Button" /></toolbar>', function() {});
	var menu_1 = main_layout.attachMenu();
	menu_1.setIconsPath('./codebase/imgs/');
	

	var windows = new dhtmlXWindows();
	windows.setSkin('dhx_skyblue');

	var window_1 = windows.createWindow('window_1', 900, 300, 800, 600);
	window_1.attachURL('http://157.7.139.217/ecc/html/index.php');

	window_1.setText('SYSTEM1');
	window_1.button('minmax').show();
	window_1.button('minmax').enable();


	var window_2 = windows.createWindow('window_2', 900, 300, 800, 600);
	window_2.attachURL('http://157.7.131.112/vnc.html');

	window_2.setText('SYSTEM2');
	window_2.button('minmax').show();
	window_2.button('minmax').enable();


	var window_3 = windows.createWindow('window_3', 900, 0, 800, 600);
	window_3.attachURL('https://www.bpsimulator.com/run/');

	window_3.button('minmax').show();
	window_3.button('minmax').enable();



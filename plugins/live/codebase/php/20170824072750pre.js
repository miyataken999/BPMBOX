window.dhx4.skin = 'dhx_skyblue';
	var main_layout = new dhtmlXLayoutObject(document.body, '3W');

	var a = main_layout.cells('a');
	a.setWidth('200');
	var tree_1 = a.attachTree();
		tree_1.setImagePath('./codebase/imgs/dhxtree_'+dhx4.skin.replace(/^dhx_/,'')+'/');
	
	tree_1.attachEvent('onClick', function(id, prewid){
		showUser(id);
	});



	var b = main_layout.cells('b');
	var layout_1 = b.attachLayout('2E');

	var cell_4 = layout_1.cells('a');
	cell_4.attachURL('http://dev.bpm999.com/bpmbox/menu.php');


	var cell_5 = layout_1.cells('b');
	cell_5.attachURL('https://www.chatwork.com/#!rid68678236');





	var c = main_layout.cells('c');
	c.attachURL('http://dev.bpm999.com/sys/en/neoclassic/login/login');


	var toolbar_1 = main_layout.attachToolbar();
	toolbar_1.setIconsPath('./codebase/imgs/');
	
	toolbar_1.attachEvent('onClick', function(id){
		window.open('https://bpm999.com/bot/trs/dtb_product_list.php','window_name','width=300,height=200,scrollbars=yes');
	});

	toolbar_1.loadStruct('<toolbar><item type="buttonInput" id="button_input_1" /><item type="button" id="button_normal_1" text="Button" /></toolbar>', function() {});

	var windows = new dhtmlXWindows();
	windows.setSkin('dhx_skyblue');

	var window_1 = windows.createWindow('window_1', 700, 0, 480, 600);
	window_1.attachURL('http://157.7.139.217/ecc/html/index.php');

	window_1.button('minmax').show();
	window_1.button('minmax').enable();



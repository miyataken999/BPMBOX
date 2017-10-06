window.dhx4.skin = 'dhx_skyblue';
	var main_layout = new dhtmlXLayoutObject(document.getElementById('sdsd') || document.body, '3W');

	var a = main_layout.cells('a');
	a.setText('メニュー(menu)');
	a.setWidth('150');
	var tree_2 = a.attachTree();
		tree_2.setImagePath('./codebase/imgs/dhxtree_'+dhx4.skin.replace(/^dhx_/,'')+'/');
		tree_2.load('http://157.7.139.217/dhtmlxC/block/tree/05_save_connector.php', 'xml');
	
	tree_2.attachEvent('onClick', function(id, prewid){
		showUser(id);
	});



	var b = main_layout.cells('b');
	var layout_2 = b.attachLayout('2E');

	var cell_7 = layout_2.cells('a');
	cell_7.setText('サービス(servie)');
	cell_7.attachURL('http://157.7.139.217/ecc/html/index.php');


	var cell_8 = layout_2.cells('b');
	cell_8.setText('分析(check)');
	cell_8.attachURL('http://dev.bpm999.com/bpmbox/menu.php');





	var c = main_layout.cells('c');
	var layout_1 = c.attachLayout('3E');

	var cell_1 = layout_1.cells('a');
	cell_1.setText('分析');
	var toolbar_1 = cell_1.attachToolbar();
	toolbar_1.setIconsPath('./codebase/imgs/');
	
	toolbar_1.attachEvent('onClick', function(id){
		alert('onClick');
	});

	toolbar_1.loadStruct('<toolbar><item type="button" id="button_normal_1" text="Button" /></toolbar>', function() {});
	cell_1.attachURL('./data/default.html', true);


	var cell_2 = layout_1.cells('b');
	cell_2.setText('分析');
	cell_2.attachURL('https://bpm999.com/bot/trs/dtb_order_Chart_chart.php');


	var cell_3 = layout_1.cells('c');
	cell_3.setText('連絡');
	cell_3.attachURL('https://www.chatwork.com/#!rid24476813');


	var toolbar_2 = layout_1.attachToolbar();
	toolbar_2.setIconsPath('./codebase/imgs/');
	




	var windows = new dhtmlXWindows();
	windows.setSkin('dhx_skyblue');

	var window_1 = windows.createWindow('window_1', 600, 0, 800, 600);
	window_1.attachURL('http://dev.bpm999.com/sysworkflow/en/neoclassic/processes/mainInit');

	window_1.setText('BPMBOX(Plan)');
	window_1.button('minmax').show();
	window_1.button('minmax').enable();



window.dhx4.skin = 'dhx_skyblue';
	var main_layout = new dhtmlXLayoutObject(document.body, '2U');

	var a = main_layout.cells('a');
	var toolbar_1 = a.attachToolbar();
	toolbar_1.setIconsPath('./codebase/imgs/');
	
	toolbar_1.loadStruct('./data/toolbar.xml', function() {});
	var tabbar_1 = a.attachTabbar();
	tabbar_1.addTab('tab_1','tab_1');
	var tab_1 = tabbar_1.cells('tab_1');
	tab_1.setActive();
	tab_1.attachURL('http://157.7.139.217/bpmbox/APPLICATION_list.php');


	tabbar_1.addTab('tab_2','tab_2');
	var tab_2 = tabbar_1.cells('tab_2');
	tab_2.attachURL('http://157.7.139.217/TRADE/dtb_product_list.php');


	tabbar_1.addTab('tab_3','tab_3');
	var tab_3 = tabbar_1.cells('tab_3');
	tab_3.attachURL('http://157.7.139.217/dhtmlxC/dhtmlxGantt/samples/01_initialization/05_connector_xml.html?dhxr1497150585916');


	tabbar_1.addTab('tab_4','tab_4');
	var tab_4 = tabbar_1.cells('tab_4');
	tab_4.attachURL('http://157.7.139.217');






	var b = main_layout.cells('b');
	b.setWidth('0');
	b.attachURL('https://www.chatwork.com/#!rid68678236');





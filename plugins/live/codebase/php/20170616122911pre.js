window.dhx4.skin = 'dhx_skyblue';
	var main_layout = new dhtmlXLayoutObject(document.body, '4H');

	var a = main_layout.cells('a');
	a.attachURL('http://157.7.139.217/sysworkflow/en/neoclassic/cases/main');


	var b = main_layout.cells('b');
	b.setWidth('300');
	var tabbar_1 = b.attachTabbar();
	tabbar_1.addTab('tab_1','CHATWORK');
	var tab_1 = tabbar_1.cells('tab_1');
	tab_1.setActive();
	tab_1.attachURL('http://157.7.139.217/sysworkflow/en/neoclassic/designer?prj_uid=479727113586758ff5c1c55098614310');


	tabbar_1.addTab('tab_2','GANTT');
	var tab_2 = tabbar_1.cells('tab_2');
	tab_2.attachURL('http://157.7.139.217/live/sp/samples/04_usage_key_full_access.html');






	var cell_3 = main_layout.cells('c');
	cell_3.attachURL('http://157.7.139.217/dhtmlxC/dhtmlxGantt/samples/01_initialization/05_connector_xml.html?dhxr1497150585916');


	var cell_4 = main_layout.cells('d');
	cell_4.fixSize(0,1);
	cell_4.attachURL('https://www.chatwork.com/#!rid68678236');


	var toolbar_1 = main_layout.attachToolbar();
	toolbar_1.setIconsPath('./codebase/imgs/');
	
	toolbar_1.loadStruct('./data/toolbar.xml', function() {});



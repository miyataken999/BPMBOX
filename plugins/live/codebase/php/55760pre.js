window.dhx4.skin = 'dhx_skyblue';
	var main_layout = new dhtmlXLayoutObject(document.body, '2U');

	var a = main_layout.cells('a');
	var tabbar_1 = a.attachTabbar();
	tabbar_1.addTab('tab_1','tab_1');
	var tab_1 = tabbar_1.cells('tab_1');
	tab_1.setActive();
	tab_1.attachURL('http://157.7.139.217/bpmbox/APPLICATION_list.php');


	tabbar_1.addTab('tab_2','tab_2');
	var tab_2 = tabbar_1.cells('tab_2');
	tab_2.attachURL('http://157.7.139.217/sysworkflow/en/neoclassic/cases/main');


	tabbar_1.addTab('tab_3','tab_3');
	var tab_3 = tabbar_1.cells('tab_3');
	tab_3.attachURL('http://157.7.139.217/sysworkflow/en/neoclassic/designer?prj_uid=479727113586758ff5c1c55098614310');


	tabbar_1.addTab('tab_4','tab_4');
	var tab_4 = tabbar_1.cells('tab_4');
	tab_4.attachURL('http://157.7.139.217:6080/vnc_auto.html?autoconnect=1&autoscale=0&quality=3');






	var b = main_layout.cells('b');
	b.attachURL('https://www.chatwork.com/#!rid68678236');


	var toolbar_1 = main_layout.attachToolbar();
	toolbar_1.setIconsPath('./codebase/imgs/');
	
	toolbar_1.attachEvent('onClick', function(id){
		alert('onClick');var main_layout = new dhtmlXLayoutObject(document.body, '2U');nntvar a = main_layout.cells('a');ntvar tabbar_1 = a.attachTabbar();
	});

	toolbar_1.loadStruct('<toolbar><item type="button" id="button_normal_1" text="Button" /><item type="button" id="button_normal_2" text="Button" /><item type="button" id="button_normal_3" text="Button" /><item type="button" id="button_normal_4" text="Button" /></toolbar>', function() {});



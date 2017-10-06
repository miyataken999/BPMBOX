window.dhx4.skin = 'dhx_skyblue';
	var main_layout = new dhtmlXLayoutObject(document.body, '1C');

	var a = main_layout.cells('a');
	a.attachURL('http://157.7.139.217/bpmbox/PROCESS_list.php?menuItemId=78');



	var windows = new dhtmlXWindows();
	windows.setSkin('dhx_skyblue');

	var window_1 = windows.createWindow('window_1', 0, 0, 300, 400);
	var carousel_1 = window_1.attachCarousel({effect: 'slide', item_width: 'auto', item_height: 'auto', offset_left: '2', offset_top: '2', offset_item: '4', keys: 'true'});
	carousel_1.addCell('carousel_item_1');
	var carousel_item_1 = carousel_1.cells('carousel_item_1');
	carousel_item_1.attachURL('http://157.7.139.217/sysworkflow/en/neoclassic/designer?prj_uid=56068788759210c33c195e0057017114');





	window_1.denyResize();
	window_1.button('stick').hide();
	window_1.button('minmax').show();
	window_1.button('minmax').enable();



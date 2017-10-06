window.dhx4.skin = 'dhx_skyblue';
	var main_layout = new dhtmlXLayoutObject(document.body, '1C');

	var a = main_layout.cells('a');
	a.attachURL('http://157.7.139.217/TRADE/dtb_order_list.php');



	var windows = new dhtmlXWindows();
	windows.setSkin('dhx_skyblue');

	var window_1 = windows.createWindow('window_1', 0, 0, 900, 500);
	window_1.attachURL('http://157.7.139.217/ecc/html/index.php');

	window_1.setText('販売サイト');
	window_1.button('minmax').show();
	window_1.button('minmax').enable();



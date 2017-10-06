window.dhx4.skin = 'dhx_skyblue';
	var main_layout = new dhtmlXLayoutObject(document.body, '3E');

	var a = main_layout.cells('a');
	var sidebar_1 = a.attachSidebar({template: 'details', width: '200', icons_path: './codebase/imgs_sidebar/', autohide: '', header: ''});
	sidebar_1.addItem({id: 'sidebar_item_1', text: 'sidebar_item_1', icon: 'sidebar_item_icon.png'});
	var sidebar_item_1 = sidebar_1.cells('sidebar_item_1');
	sidebar_item_1.setActive();
	var toolbar_1 = sidebar_item_1.attachToolbar();
	toolbar_1.setIconsPath('./codebase/imgs/');
	
	var carousel_1 = sidebar_item_1.attachCarousel({effect: 'slide', item_width: 'auto', item_height: 'auto', offset_left: '2', offset_top: '2', offset_item: '4', keys: 'true'});
	carousel_1.addCell('carousel_item_1');
	var carousel_item_1 = carousel_1.cells('carousel_item_1');


	carousel_1.addCell('carousel_item_2');
	var carousel_item_2 = carousel_1.cells('carousel_item_2');




	var menu_1 = sidebar_item_1.attachMenu();
	menu_1.setIconsPath('./codebase/imgs/');
	
	menu_1.loadStruct('<menu><item type="separator" id="menuitem_separator_1" /><item type="item" id="menuitem_1" text="Menu Item" ><item type="separator" id="menuitem_separator_2" /><item type="item" id="menuitem_2" text="Menu Item" ><item type="item" id="menuitem_3" text="Menu Item" /></item></item></menu>');







	var ribbon_1 = main_layout.attachRibbon({
skin : "dhx_skyblue", icons_path : "./codebase/imgs/", tabs : [
{id : "tab_1", text : "tab_1", items : [

{id : "block_1", text : "block_1", text_pos : "buttom", type : "block", mode : "cols", list : [

{id : "slider_1", text : "slider_1", type : "slider", size : 150, max : 99, step : 1, margin : 10}

]}

]},
{id : "tab_2", text : "tab_2"}
]
	});




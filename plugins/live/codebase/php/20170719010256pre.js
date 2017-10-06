window.dhx4.skin = 'dhx_skyblue';
	var main_layout = new dhtmlXLayoutObject(document.body, '3W');

	var a = main_layout.cells('a');
	a.setWidth('150');
	var tree_1 = a.attachTree();
		tree_1.setImagePath('./codebase/imgs/dhxtree_'+dhx4.skin.replace(/^dhx_/,'')+'/');
		tree_1.load('http://157.7.139.217/dhtmlxC/block/tree/05_save_connector.php', 'xml');
	
	tree_1.attachEvent('onClick', function(id, prewid){
		if(id==1){cell_1.attachURL('http://www.google.com');}if(id==2){cell_1.attachURL('http://www.yahoo.co.jp');}if(id==3){cell_1.attachURL('http://157.7.139.217/live/index.php#34905');}if(id==6){cell_1.attachURL('https://www.chatwork.com');}if(id==7){cell_1.attachURL('http://157.7.139.217/bpmbox/PMT_MENU_list.php');}if(id==8){cell_1.attachURL('');}if(id==9){cell_1.attachURL('');}if(id==10){cell_1.attachURL('http://157.7.139.217/bpmbox/PMT_MENU_list.php');}if(id==21){cell_1.attachURL('https://xlinesoft.com/phprunner/docs/runnerpage_object.htm');}if(id==22){cell_1.attachURL('http://157.7.139.217/live/#68751');}if(id==23){cell_1.attachURL('http://157.7.139.217/live/?preid=68751');}if(id==24){cell_1.attachURL('https://docs.google.com/spreadsheets/d/1vrYoyUtLgjnl-DhAFhmULkTVMNVHRgL1Fp-9UXwh-2Y/edit#gid=2076545303');}if(id==25){cell_1.attachURL('');}if(id==26){cell_1.attachURL('http://157.7.139.217/dhtmlxC/block/grid/BPMBOXEoc.php');}if(id==27){cell_1.attachURL('https://docs.google.com/spreadsheets/d/1Nmo5DFyRhxlP1O8MWcxUNfayvNx9O3FJSNV3f0DaA5s/edit#gid=1667537317');}if(id==28){cell_1.attachURL('https://docs.google.com/spreadsheets/d/1vrYoyUtLgjnl-DhAFhmULkTVMNVHRgL1Fp-9UXwh-2Y/edit#gid=1781121505');}if(id==29){cell_1.attachURL('http://157.7.139.217/bpmbox/PMT_MENU_list.php');}if(id==31){cell_1.attachURL('https://www.chatwork.com/#!rid68678236');}if(id==32){cell_1.attachURL('https://docs.google.com/spreadsheets/d/1TX37BJ8jGFg4H_Bbtl8dcuZUa7RruxHhkvXJfAys0Vw/edit#gid=1856619256');}if(id==33){cell_1.attachURL('http://157.7.139.217/live/#69082');}if(id==34){cell_1.attachURL('http://157.7.139.217/live/#69082');}if(id==35){cell_1.attachURL('http://157.7.139.217/live/?preid=69082');}if(id==36){cell_1.attachURL('ＧＯＯＧＬＥ');}if(id==37){cell_1.attachURL('');}if(id==38){cell_1.attachURL('https://sites.google.com/');}if(id==40){cell_1.attachURL('');}if(id==41){cell_1.attachURL('https://sites.google.com/site/bpm999999/home/3-sekando-suteji-ari-suteji/12jibenshejishu/hua-mian-zuo-chengpuroguramu');}if(id==42){cell_1.attachURL('http://157.7.139.217:6080/vnc_auto.html?autoconnect=1&autoscale=0&quality=3');}if(id==43){cell_1.attachURL('https://docs.google.com/spreadsheets/d/1USCZn3MBcVixxxSh1-3wJ15l8K6ReioilSTgkl_eSd0/edit#gid=541882732');}if(id==49){cell_1.attachURL('');}if(id==50){cell_1.attachURL('');}if(id==51){cell_1.attachURL('');}if(id==52){cell_1.attachURL('');}if(id==53){cell_1.attachURL('');}if(id==54){cell_1.attachURL('');}if(id==55){cell_1.attachURL('');}if(id==56){cell_1.attachURL('');}if(id==57){cell_1.attachURL('https://sites.google.com/site/project19991/');}if(id==58){cell_1.attachURL('https://sites.google.com/site/evakaifa999/');}if(id==60){cell_1.attachURL('https://docs.google.com/spreadsheets/d/1vrYoyUtLgjnl-DhAFhmULkTVMNVHRgL1Fp-9UXwh-2Y/edit#gid=2112292441');}if(id==61){cell_1.attachURL('https://docs.google.com/spreadsheets/d/1660J_gcsK6URXqcAaxs9LLqJ9831dverQO3Uu5VWx3w/edit?userstoinvite=bpm9990001@gmail.com&ts=58e9ef54&actionButton=1#gid=733263131');}if(id==62){cell_1.attachURL('Your browser sent a request that this server could not understand. Size of a request header field exceeds server limit.');}if(id==63){cell_1.attachURL('Your browser sent a request that this server could not understand. Size of a request header field exceeds server limit.');}if(id==64){cell_1.attachURL('http://157.7.139.217/xhgui/xhprof_html/index.php');}if(id==65){cell_1.attachURL('http://157.7.139.217:6080/vnc_auto.html?autoconnect=1&autoscale=0&quality=3');}if(id==66){cell_1.attachURL('http://157.7.139.217:85/ide.html');}if(id==67){cell_1.attachURL('https://docs.google.com/spreadsheets/d/1D8oc5fYryQuJ77m1oCJhMhQOuj3utYdh2iZg5O_MRpE/edit#gid=0');}if(id==68){cell_1.attachURL('https://www.chatwork.com/#!rid24476813');}if(id==69){cell_1.attachURL('http://157.7.139.217:10088/ZendServer/Dashboard/');}if(id==70){cell_1.attachURL('https://app.datadoghq.com/event/stream?tags_execution=and&show_private=true&per_page=30&aggregate_up=true&use_date_happened=false&display_timeline=true&from_ts=1491264000000&priority=normal&live=true&is_zoomed=false&status=all&to_ts=1491868800000&is_auto=');}if(id==71){cell_1.attachURL('https://docs.google.com/spreadsheets/d/1yGLfGDDi5hmIAkv7Cw52DbVCVxgsuw_0RpNYYCcWiFc/edit');}if(id==72){cell_1.attachURL('http://157.7.139.217/live/?preid=53738');}if(id==73){cell_1.attachURL('https://platform.ifttt.com/');}if(id==74){cell_1.attachURL('http://157.7.139.217:10080/search?page=2&project_id=1&scope=&search=X-ChatWorkToken&snippets=&utf8=%E2%9C%93');}if(id==75){cell_1.attachURL('http://157.7.139.217/ecc/html/index.php/');}if(id==76){cell_1.attachURL('http://urlounge.co.jp/munin/');}if(id==77){cell_1.attachURL('http://157.7.139.217/ampps/index.php?act=login');}if(id==78){cell_1.attachURL('https://docs.google.com/spreadsheets/d/1-UYxl-KkXFcN5bXrjy3bsJWtrXwIgb-DfFNNR3652gc/edit#gid=126803943');}if(id==79){cell_1.attachURL('https://sites.google.com/site/fmhibaoxiansaito999/');}if(id==80){cell_1.attachURL('https://script.google.com/macros/d/MxkfAW14hTx8_IbCw4WU7zjtZ3D6PDKxB/edit?mid=ACjPJvFW8JnRbzIxT64YeNWIBNcX_DXHB2P7PG0wCIicfrTq1lAXHlYWRL3S0wQ-4MLdA7QpjJlhBXUnxqLLVwpQ4eRMr8eMfd5CMKXtcrPp0hz8OJIndPWC-SgUV6x9');}if(id==81){cell_1.attachURL('https://script.google.com/macros/d/MxkfAW14hTx8_IbCw4WU7zjtZ3D6PDKxB/edit?mid=ACjPJvFW8JnRbzIxT64YeNWIBNcX_DXHB2P7PG0wCIicfrTq1lAXHlYWRL3S0wQ-4MLdA7QpjJlhBXUnxqLLVwpQ4eRMr8eMfd5CMKXtcrPp0hz8OJIndPWC-SgUV6x9');}if(id==82){cell_1.attachURL('https://groups.google.com/forum/#!forum/processmaker999');}if(id==83){cell_1.attachURL('https://groups.google.com/forum/#!forum/processmaker999');}if(id==84){cell_1.attachURL('https://groups.google.com/forum/#!forum/processmaker999');}if(id==85){cell_1.attachURL('https://groups.google.com/forum/embed/?place=forum/processmaker99');}if(id==86){cell_1.attachURL('aa');}if(id==87){cell_1.attachURL('https://script.google.com/macros/s/AKfycbyOBroXhzy3NFxRfpm9_m-zQhxbSCHWb59mgwPtxPge/dev');}if(id==88){cell_1.attachURL('http://www.google.com');}if(id==89){cell_1.attachURL('https://www.blogger.com/blogger.g?blogID=8997235850826793901#allposts/src=sidebar');}if(id==90){cell_1.attachURL('GOOGLEPPT');}if(id==91){cell_1.attachURL('http://157.7.139.217/live/#69082');}if(id==92){cell_1.attachURL('http://157.7.139.217/ADMANAGEMENT/openclass/');}if(id==93){cell_1.attachURL('https://script.google.com/macros/d/MJscm0tkeCAXK8m6MXwenTeIXr7I-CV9P/edit?mid=ACjPJvEAu9yaV4fOzvYd7cJrEmTVP9shg2qoR5QqOoN7_v2728C9czC5rokw6keikzikMPZ3aFLecZy5r97rz4QIlI39wOjyfzWHjJx_lCoaL_DCTFVGaoYHhspz');}if(id==94){cell_1.attachURL('https://docs.google.com/spreadsheets/d/1Fgn2IvyMiqzPfl-DGilmmyqAAQup0Ur9fjOw8YGpHIE/edit#gid=480285940');}if(id==95){cell_1.attachURL('https://script.google.com/macros/d/M3vX8NOF30LoIVITajuRAiuIXr7I-CV9P/edit?uiv=2&mid=ACjPJvFe4_O3HCcw3TwcU6p0zbCOohxCWfj2y15ExNz6a9a-d_plabZjMbdKav6YKj3Rr4E_dxBThh-Sv-L2tt5bsgJ8bP6E3nEjv3Cwiao4WRAZ9Ka5PSd6HwXhRTYW6KuD_tI7Zr1j1ko');}if(id==96){cell_1.attachURL('http://157.7.139.217:10080/root/shop5');}if(id==97){cell_1.attachURL('http://157.7.139.217/live/?preid=78252');}if(id==98){cell_1.attachURL('https://docs.google.com/spreadsheets/d/1njSDfgHItr0JfwRL5U1nxf2_G0DzkvKm5RtUXRWbeKc/edit#gid=768249723');}if(id==99){cell_1.attachURL('https://docs.google.com/spreadsheets/d/1D7rozSRHpVgi-diXMJojvV8vMZ3jd0MynJ1K2CHO8ls/edit#gid=713348889');}if(id==100){cell_1.attachURL('https://bitnami.com/stacks');}if(id==101){cell_1.attachURL('https://www.google.co.jp/intl/ja/about/products/');}if(id==102){cell_1.attachURL('https://docs.google.com/spreadsheets/d/1p6j1bQoeD735GyazHFu_BmmRDU0c-4Va2b85mMPR9EI/edit#gid=503767100');}if(id==103){cell_1.attachURL('https://zapier.com/app/explore');}if(id==104){cell_1.attachURL('http://157.7.139.217/cms/modxevo/evolution-jp-master/manager/');}if(id==105){cell_1.attachURL('http://157.7.139.217/cms/modxevo/evolution-jp-master/manager/');}if(id==106){cell_1.attachURL('http://157.7.139.217/dhtmlxC/dhtmlxGantt/samples/01_initialization/05_connector_xml.html?dhxr1497150585916');}if(id==107){cell_1.attachURL('http://157.7.139.217/dhtmlxC/dhtmlxGantt/samples/01_initialization/05_connector_xml.html?dhxr1497150585916');}if(id==108){cell_1.attachURL('http://157.7.139.217/ecc/html/index.php/admin123/setting/shop');}if(id==109){cell_1.attachURL('https://gojs.net/latest/extensions/BPMN.html#');}if(id==110){cell_1.attachURL('https://docs.google.com/spreadsheets/d/111QBnxIZjMrs1QbBfPf849KUivLinB1yhZTQb5RCXdw/edit#gid=0');}if(id==111){cell_1.attachURL('http://157.7.139.217/erp/sha/menu.php');}if(id==112){cell_1.attachURL('http://157.7.139.217/TRADE/dtb_product_list.php');}if(id==113){cell_1.attachURL('http://157.7.139.217/dhtmlxC/dhtmlxGantt/samples/index.html');}if(id==114){cell_1.attachURL('http://jsoneditoronline.org/');}if(id==115){cell_1.attachURL('https://gojs.net/latest/extensions/BPMN.html');}if(id==116){cell_1.attachURL('http://157.7.139.217/dhtmlxC/block/spread/samples/');}n
	});


	var ribbon_1 = a.attachRibbon({
skin : "dhx_skyblue", icons_path : "./codebase/imgs/", items : [

{id : "block_1", text : "block_1", text_pos : "buttom", type : "block", mode : "cols", list : [

{id : "button_1", text : "button_1", type : "button"},
{id : "button_2", text : "button_2", type : "button"}

]}

]
	});

	ribbon_1.attachEvent('onClick', function(id){
		alert('onClick');
	});



	var cell_1 = main_layout.cells('b');
	cell_1.attachURL('http://157.7.139.217/ecc/html/index.php');


	var cell_11 = main_layout.cells('c');
	cell_11.attachURL('http://157.7.139.217/');


	var toolbar_1 = main_layout.attachToolbar();
	toolbar_1.setIconsPath('./codebase/imgs/');
	
	toolbar_1.loadStruct('<toolbar><item type="buttonSelect" id="button_select_1" text="List" /><item type="button" id="button_normal_1" text="Button" /></toolbar>', function() {});
	var menu_1 = main_layout.attachMenu();
	menu_1.setIconsPath('./codebase/imgs/');
	
	menu_1.attachEvent('onClick', function(id, zoneId, casState){
		alert('onClick');
	});

	menu_1.loadStruct('<menu><item type="item" id="menuitem_1" text="Menu Item" ><item type="item" id="menuitem_2" text="Menu Item" /></item><item type="separator" id="menuitem_separator_1" /><item type="item" id="menuitem_3" text="Menu Item" /><item type="item" id="menuitem_4" text="Menu Item" /></menu>');

	var windows = new dhtmlXWindows();
	windows.setSkin('dhx_skyblue');

	var window_1 = windows.createWindow('window_1', 0, 400, 1200, 400);
	var tabbar_1 = window_1.attachTabbar();
	tabbar_1.addTab('tab_1','tab_1');
	var tab_1 = tabbar_1.cells('tab_1');
	tab_1.setActive();
	tab_1.attachURL('https://www.chatwork.com/#!rid68678236');





	window_1.hide();
	window_1.button('stick').show();
	window_1.button('stick').enable();
	window_1.button('help').show();
	window_1.button('help').enable();
	window_1.button('minmax').show();
	window_1.button('minmax').enable();



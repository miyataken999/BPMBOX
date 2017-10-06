window.dhx4.skin = 'dhx_skyblue';
	var main_layout = new dhtmlXLayoutObject(document.body, '3W');

	var a = main_layout.cells('a');
	a.setText('TREE');
	a.setWidth('150');
	var toolbar_2 = a.attachToolbar();
	toolbar_2.setIconsPath('./codebase/imgs/');
	
	var status_2 = a.attachStatusBar();
	status_2.setText('');

	var ribbon_1 = a.attachRibbon({
skin : "dhx_skyblue", icons_path : "./codebase/imgs/", tabs : [
{id : "tab_1", text : "tab_1", items : [

{id : "block_1", text : "block_1", text_pos : "buttom", type : "block", mode : "cols", list : [

{id : "slider_1", text : "slider_1", type : "slider", size : 150, max : 99, step : 1, margin : 10}

]}

]}
]
	});

	var tree_1 = a.attachTree();
		tree_1.setImagePath('./codebase/imgs/dhxtree_'+dhx4.skin.replace(/^dhx_/,'')+'/');
		tree_1.enableKeyboardNavigation(1);
		tree_1.enableMultiselection(1);
		tree_1.enableItemEditor(1);
		tree_1.enableAutoTooltips(1);
		tree_1.load('http://157.7.139.217/dhtmlxC/block/tree/05_save_connector.php', 'xml');
	
	tree_1.attachEvent('onDrag', function(sId, tId, id, sObject, tObject){
		alert('onDrag');
	});


	tree_1.attachEvent('onDrop', function(sId, tId, id, sObject, tObject){
		alert('onDrop');
	});


	tree_1.attachEvent('onClick', function(id, prewid){
		alert(id);
if(id==1){b.attachURL("http://www.google.com");}
if(id==2){b.attachURL("http://www.yahoo.co.jp");}
if(id==3){b.attachURL("http://157.7.139.217/live/index.php#34905");}
if(id==6){b.attachURL("https://www.chatwork.com");}
if(id==7){b.attachURL("http://157.7.139.217/bpmbox/PMT_MENU_list.php");}
if(id==8){b.attachURL("");}
if(id==9){b.attachURL("");}
if(id==10){b.attachURL("http://157.7.139.217/bpmbox/PMT_MENU_list.php");}
if(id==21){b.attachURL("https://xlinesoft.com/phprunner/docs/runnerpage_object.htm");}
if(id==22){b.attachURL("http://157.7.139.217/live/#68751");}
if(id==23){b.attachURL("http://157.7.139.217/live/?preid=68751");}
if(id==24){b.attachURL("https://docs.google.com/spreadsheets/d/1vrYoyUtLgjnl-DhAFhmULkTVMNVHRgL1Fp-9UXwh-2Y/edit#gid=2076545303");}
if(id==25){b.attachURL("");}
if(id==26){b.attachURL("http://157.7.139.217/dhtmlxC/block/grid/BPMBOXEoc.php");}
if(id==27){b.attachURL("https://docs.google.com/spreadsheets/d/1Nmo5DFyRhxlP1O8MWcxUNfayvNx9O3FJSNV3f0DaA5s/edit#gid=1667537317");}
if(id==28){b.attachURL("https://docs.google.com/spreadsheets/d/1vrYoyUtLgjnl-DhAFhmULkTVMNVHRgL1Fp-9UXwh-2Y/edit#gid=1781121505");}
if(id==29){b.attachURL("http://157.7.139.217/bpmbox/PMT_MENU_list.php");}
if(id==31){b.attachURL("https://www.chatwork.com/#!rid68678236");}
if(id==32){b.attachURL("https://docs.google.com/spreadsheets/d/1TX37BJ8jGFg4H_Bbtl8dcuZUa7RruxHhkvXJfAys0Vw/edit#gid=1856619256");}
if(id==33){b.attachURL("http://157.7.139.217/live/#69082");}
if(id==34){b.attachURL("http://157.7.139.217/live/#69082");}
if(id==35){b.attachURL("http://157.7.139.217/live/?preid=69082");}
if(id==36){b.attachURL("ＧＯＯＧＬＥ");}
if(id==37){b.attachURL("");}
if(id==38){b.attachURL("https://sites.google.com/");}
if(id==40){b.attachURL("");}
if(id==41){b.attachURL("https://sites.google.com/site/bpm999999/home/3-sekando-suteji-ari-suteji/12jibenshejishu/hua-mian-zuo-chengpuroguramu");}
if(id==42){b.attachURL("http://157.7.139.217:6080/vnc_auto.html?autoconnect=1&autoscale=0&quality=3");}
if(id==43){b.attachURL("https://docs.google.com/spreadsheets/d/1USCZn3MBcVixxxSh1-3wJ15l8K6ReioilSTgkl_eSd0/edit#gid=541882732");}
if(id==49){b.attachURL("");}
if(id==50){b.attachURL("");}
if(id==51){b.attachURL("");}
if(id==52){b.attachURL("");}
if(id==53){b.attachURL("");}
if(id==54){b.attachURL("");}
if(id==55){b.attachURL("");}
if(id==56){b.attachURL("");}
if(id==57){b.attachURL("https://sites.google.com/site/project19991/");}
if(id==58){b.attachURL("https://sites.google.com/site/evakaifa999/");}
if(id==60){b.attachURL("https://docs.google.com/spreadsheets/d/1vrYoyUtLgjnl-DhAFhmULkTVMNVHRgL1Fp-9UXwh-2Y/edit#gid=2112292441");}
if(id==61){b.attachURL("https://docs.google.com/spreadsheets/d/1660J_gcsK6URXqcAaxs9LLqJ9831dverQO3Uu5VWx3w/edit?userstoinvite=bpm9990001@gmail.com&ts=58e9ef54&actionButton=1#gid=733263131");}
if(id==62){b.attachURL("Your browser sent a request that this server could not understand. Size of a request header field exceeds server limit.");}
if(id==63){b.attachURL("Your browser sent a request that this server could not understand. Size of a request header field exceeds server limit.");}
if(id==64){b.attachURL("http://157.7.139.217/xhgui/xhprof_html/index.php");}
if(id==65){b.attachURL("http://157.7.139.217:6080/vnc_auto.html?autoconnect=1&autoscale=0&quality=3");}
if(id==66){b.attachURL("http://157.7.139.217:85/ide.html");}
if(id==67){b.attachURL("https://docs.google.com/spreadsheets/d/1D8oc5fYryQuJ77m1oCJhMhQOuj3utYdh2iZg5O_MRpE/edit#gid=0");}
if(id==68){b.attachURL("https://www.chatwork.com/#!rid24476813");}
if(id==69){b.attachURL("http://157.7.139.217:10088/ZendServer/Dashboard/");}
if(id==70){b.attachURL("https://app.datadoghq.com/event/stream?tags_execution=and&show_private=true&per_page=30&aggregate_up=true&use_date_happened=false&display_timeline=true&from_ts=1491264000000&priority=normal&live=true&is_zoomed=false&status=all&to_ts=1491868800000&is_auto=");}
if(id==71){b.attachURL("https://docs.google.com/spreadsheets/d/1yGLfGDDi5hmIAkv7Cw52DbVCVxgsuw_0RpNYYCcWiFc/edit");}
if(id==72){b.attachURL("http://157.7.139.217/live/?preid=53738");}
if(id==73){b.attachURL("https://platform.ifttt.com/");}
if(id==74){b.attachURL("http://157.7.139.217:10080/search?page=2&project_id=1&scope=&search=X-ChatWorkToken&snippets=&utf8=%E2%9C%93");}
if(id==75){b.attachURL("http://157.7.139.217/ecc/html/index.php/");}
if(id==76){b.attachURL("http://urlounge.co.jp/munin/");}
if(id==77){b.attachURL("http://157.7.139.217/ampps/index.php?act=login");}
if(id==78){b.attachURL("https://docs.google.com/spreadsheets/d/1-UYxl-KkXFcN5bXrjy3bsJWtrXwIgb-DfFNNR3652gc/edit#gid=126803943");}
if(id==79){b.attachURL("https://sites.google.com/site/fmhibaoxiansaito999/");}
if(id==80){b.attachURL("https://script.google.com/macros/d/MxkfAW14hTx8_IbCw4WU7zjtZ3D6PDKxB/edit?mid=ACjPJvFW8JnRbzIxT64YeNWIBNcX_DXHB2P7PG0wCIicfrTq1lAXHlYWRL3S0wQ-4MLdA7QpjJlhBXUnxqLLVwpQ4eRMr8eMfd5CMKXtcrPp0hz8OJIndPWC-SgUV6x9");}
if(id==81){b.attachURL("https://script.google.com/macros/d/MxkfAW14hTx8_IbCw4WU7zjtZ3D6PDKxB/edit?mid=ACjPJvFW8JnRbzIxT64YeNWIBNcX_DXHB2P7PG0wCIicfrTq1lAXHlYWRL3S0wQ-4MLdA7QpjJlhBXUnxqLLVwpQ4eRMr8eMfd5CMKXtcrPp0hz8OJIndPWC-SgUV6x9");}
if(id==82){b.attachURL("https://groups.google.com/forum/#!forum/processmaker999");}
if(id==83){b.attachURL("https://groups.google.com/forum/#!forum/processmaker999");}
if(id==84){b.attachURL("https://groups.google.com/forum/#!forum/processmaker999");}
if(id==85){b.attachURL("https://groups.google.com/forum/embed/?place=forum/processmaker99");}
if(id==86){b.attachURL("aa");}
if(id==87){b.attachURL("https://script.google.com/macros/s/AKfycbyOBroXhzy3NFxRfpm9_m-zQhxbSCHWb59mgwPtxPge/dev");}
if(id==88){b.attachURL("http://www.google.com");}
if(id==89){b.attachURL("https://www.blogger.com/blogger.g?blogID=8997235850826793901#allposts/src=sidebar");}
if(id==90){b.attachURL("GOOGLEPPT");}
if(id==91){b.attachURL("http://157.7.139.217/live/#69082");}
if(id==92){b.attachURL("http://157.7.139.217/ADMANAGEMENT/openclass/");}
if(id==93){b.attachURL("https://script.google.com/macros/d/MJscm0tkeCAXK8m6MXwenTeIXr7I-CV9P/edit?mid=ACjPJvEAu9yaV4fOzvYd7cJrEmTVP9shg2qoR5QqOoN7_v2728C9czC5rokw6keikzikMPZ3aFLecZy5r97rz4QIlI39wOjyfzWHjJx_lCoaL_DCTFVGaoYHhspz");}
if(id==94){b.attachURL("https://docs.google.com/spreadsheets/d/1Fgn2IvyMiqzPfl-DGilmmyqAAQup0Ur9fjOw8YGpHIE/edit#gid=480285940");}
if(id==95){b.attachURL("https://script.google.com/macros/d/M3vX8NOF30LoIVITajuRAiuIXr7I-CV9P/edit?uiv=2&mid=ACjPJvFe4_O3HCcw3TwcU6p0zbCOohxCWfj2y15ExNz6a9a-d_plabZjMbdKav6YKj3Rr4E_dxBThh-Sv-L2tt5bsgJ8bP6E3nEjv3Cwiao4WRAZ9Ka5PSd6HwXhRTYW6KuD_tI7Zr1j1ko");}
if(id==96){b.attachURL("http://157.7.139.217:10080/root/shop5");}
if(id==97){b.attachURL("http://157.7.139.217/live/?preid=78252");}
if(id==98){b.attachURL("https://docs.google.com/spreadsheets/d/1njSDfgHItr0JfwRL5U1nxf2_G0DzkvKm5RtUXRWbeKc/edit#gid=768249723");}
if(id==99){b.attachURL("https://docs.google.com/spreadsheets/d/1D7rozSRHpVgi-diXMJojvV8vMZ3jd0MynJ1K2CHO8ls/edit#gid=713348889");}
if(id==100){b.attachURL("https://bitnami.com/stacks");}
if(id==101){b.attachURL("https://www.google.co.jp/intl/ja/about/products/");}
if(id==102){b.attachURL("https://docs.google.com/spreadsheets/d/1p6j1bQoeD735GyazHFu_BmmRDU0c-4Va2b85mMPR9EI/edit#gid=503767100");}
if(id==103){b.attachURL("https://zapier.com/app/explore");}
if(id==104){b.attachURL("http://157.7.139.217/cms/modxevo/evolution-jp-master/manager/");}
if(id==105){b.attachURL("http://157.7.139.217/cms/modxevo/evolution-jp-master/manager/");}
if(id==106){b.attachURL("http://157.7.139.217/dhtmlxC/dhtmlxGantt/samples/01_initialization/05_connector_xml.html?dhxr1497150585916");}
if(id==107){b.attachURL("http://157.7.139.217/dhtmlxC/dhtmlxGantt/samples/01_initialization/05_connector_xml.html?dhxr1497150585916");}

	});



	var b = main_layout.cells('b');
	b.attachURL('http://157.7.139.217/TRADE/dtb_product_list.php');


	var cell_1 = main_layout.cells('c');
	cell_1.attachURL('http://157.7.139.217/bpmbox/APP_CACHE_VIEW_INDEX_list.php');



	var ribbon_2 = main_layout.attachRibbon({
skin : "dhx_skyblue", icons_path : "./codebase/imgs/", items : [

{id : "block_2", text : "block_2", text_pos : "buttom", type : "block", mode : "cols", list : [

{id : "slider_2", text : "slider_2", isbig : true, type : "slider", size : 150, max : 99, step : 1, margin : 10, vertical : true, enableTooltip : true}

]},
{id : "block_3", text : "block_3", text_pos : "buttom", type : "block", mode : "cols", list : [

{id : "button_1", text : "button_1", isbig : true, type : "button"},
{id : "button_2", text : "button_2", type : "button"}

]},
{id : "block_4", text : "block_4", text_pos : "buttom", type : "block", mode : "cols", list : [

{id : "checkbox_1", text : "checkbox_1", type : "checkbox"},
{id : "group_1", text : "group_1", type : "group", list : [

{id : "button_3", text : "button_3", type : "button"},
{id : "button_4", text : "button_4", type : "button"}

]}

]},
{id : "block_5", text : "block_5", text_pos : "buttom", type : "block", mode : "cols", list : [

{id : "button_5", text : "button_5", type : "button"},
{id : "button_6", text : "button_6", type : "button"}

]},
{id : "block_6", text : "block_6", text_pos : "buttom", type : "block", mode : "cols", list : [

{id : "buttonCombo_1", text : "buttonCombo_1", type : "buttonCombo", width : 140}

]},
{id : "block_7", text : "block_7", text_pos : "buttom", type : "block", mode : "cols", list : [

{id : "buttonSegment_1", text : "buttonSegment_1", type : "buttonSegment"}

]}

]
	});

	ribbon_2.attachEvent('onClick', function(id){
		alert('onClick'+id);
if(id=="button_3"){
b.attachURL(" http://157.7.139.217/dhtmlxC/block/grid/BPMBOXEoc.php?dhxr1499434619118"); 
} else{
b.attachHTMLString('<div class="objId">'+
							'<div style="margin: 5px 8px;">'+
								'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'+
							'</div>'+
						'</div>');
}
if(id=="button_1"){
  
}
	});


	ribbon_2.attachEvent('onSelect', function(id, last_id){
		alert('onSelect');
	});


	ribbon_2.attachEvent('onEnter', function(id, value){
		alert('onEnter');
	});




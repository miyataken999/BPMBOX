window.dhx4.skin = 'dhx_skyblue';
	var main_layout = new dhtmlXLayoutObject(document.body, '3W');

	var a = main_layout.cells('a');
	var tree_1 = a.attachTree();
		tree_1.setImagePath('./codebase/imgs/dhxtree_'+dhx4.skin.replace(/^dhx_/,'')+'/');
		tree_1.load('http://157.7.139.217/dhtmlxC/block/tree/05_save_connector.php', 'xml');
	
	tree_1.attachEvent('onClick', function(id, prewid){
		alert('onClick');
if(id==89){cell_1.attachURL("https://www.blogger.com/blogger.g?blogID=8997235850826793901#allposts/src=sidebar");}

	});






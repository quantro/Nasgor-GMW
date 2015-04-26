var siteUrl="index2.php";

$(function(){
	$("#patTgl").datepicker({
	  showButtonPanel:true,
	  dateFormat:"yy-mm-dd",
	  changeMonth:true,
	  changeYear:true,	  
	});
	$( "#select-ui" ).selectmenu();
});

 	jQuery("#fType").jqGrid(
	{
		url:siteUrl+'?option=com_rs&l=l&t=fields&opt=master',
		datatype: "json",
		colNames:['Kode', 'Nama',],
		colModel:[
			//{name:'id',index:'id', width:55},
			{name:'code',index:'code', width:90},
			{name:'name',index:'name', width:200}, 		
		],
		rowNum:10,
		width:500,
		rowList:[10,20,30],
		pager: '#fType_pager',
		sortname: 'name',
		viewrecords: true,
		sortorder: "asc",
		multiselect: false,
		caption: "MASTER FIELDS",
		onSelectRow: function(ids,stat) 
		{ 
			if(ids == null) {
				ids=0;
				if(jQuery("#fGroup").jqGrid('getGridParam','records') >0 )
				{
					jQuery("#fGroup").jqGrid('setGridParam',{url:siteUrl+"?option=com_rs&l=l&t=fields&opt=group",page:1});
					jQuery("#fGroup").jqGrid('setCaption',"Group Field: "+ids)
					.trigger('reloadGrid');
				}else{}
			} 
			else{
				var ret = jQuery("#fType").jqGrid('getRowData',ids);
				//console.log(ret);
				jQuery("#fGroup").jqGrid('setGridParam',{url:siteUrl+"?option=com_rs&l=l&t=fields&opt=group&id="+ids,page:1});
				jQuery("#fGroup").jqGrid('setCaption',"Group Field: "+ret.name)
				.trigger('reloadGrid');			
			}
		
		}
	}
	);
	
	jQuery("#fType").jqGrid('navGrid','#fType_pager',{add:false,edit:false,del:false});
 
	jQuery("#fGroup").jqGrid({
		height: 100,
		url:siteUrl+'?option=com_rs&l=l&t=fields&opt=group',
		datatype: "json",
		colNames:['No','Field', 'Group', 'Pos','Sub'],
		colModel:[
			{name:'id',index:'g.id', width:55},
			{name:'field',index:'g.type_id', width:80,sortable:false, search:false},
			{name:'name',index:'g.name', width:280, align:"left"},
			{name:'pos',index:'g.pos', width:80, align:"right"},
			{name:'sub',index:'sub_id', width:80, align:"center", sortable:false, search:false}
		],
		rowNum:5,
		rowList:[5,15,30],
		pager: '#fGroup_pager',
		sortname: 'g.id',
		viewrecords: true,
		sortorder: "asc",
		multiselect: false,
		caption:"Group",
		onSelectRow: function(ids) {
			//console.log("id="+ids);
		}
	}).navGrid('#fGroup_pager',{add:false,edit:false,del:false});
	jQuery("#ms1").click( function() {
		var s;
		s = jQuery("#fGroup").jqGrid('getGridParam','selarrrow');
		alert(s);
	});

	function listPasienPage(id){
		//no action here
	}
	
function detailPat(obj){
	patId=$(obj).attr('patid');
	param= "id="+patId;
	var request = $.ajax({
			url: siteUrl+"?option=com_rs&l=l&t=pasienDetail", //"pasien/detail",
			type: "POST",
			data: param,
			dataType: "json"
		});
		request.success(function(res) {
			//console.log('data sudah terkirim');
			$("#dialog div").empty().append(res.message);
			$("#dialog").dialog( "open" );  
		});
		request.error( function(jqXHR,  textStatus  ){
			alert("error :"+textStatus);
			//console.log(textStatus);
			//console.log(jqXHR);
		});
	
	//event.preventDefault();
}

function detailPat2(obj){
patId=$(obj).attr('patid');
	param= "id="+patId;
	url=siteUrl+"?act=pasienMr&id="+patId;//"pasien/detailMr/"+patId;  
			//buka Window baru
	window.open(url,'listMR'); 

}

/*
hanya kumpulan js buatanku.
silakan di coba2
*/
var http = createRequestObject(); 	
	function createRequestObject() {
    	var ie=document.all;
    	if(ie){
    	    return new ActiveXObject('Microsoft.XMLHTTP');
    	} else {
    	    return new XMLHttpRequest();
   		}
	}
	$(".listType").click(function(){
		id= $(".typeTarif").val();
		listTarif(id,111);
	});
	
	function listTarif(type,rand){
		console.log(type);
		data={type:"listTarifByType",id:type};
			link='index2.php?option=com_rs&l=l&t=tarif&type=listTarifByType';
			link=link+'&rand='+rand;
		$.post(link,data,function(res){
			//console.log(res);
			$("#listItem").empty().html(res);
		});
	}
	
	function listTarif1(words){ 
		rand=222;
		data={type:"search",id:words};
			link='index2.php?option=com_rs&l=l&t=tarif&type=search';
			link=link+'&rand='+rand;
		$.post(link,data,function(res){
			//console.log(res);
			$("#listItem").empty().html(res);
		});
	}
	
	function editTarif(id){
		link='index2.php?option=com_rs&l=f&t=tarif&id='+id;
		$.post(link, function(result){
			//console.log(res);
			$("#formEdit").empty().html(result);
		});
	}
//===============PASIEN
$(".popup-bg").click(function(){$(this).slideUp();});
$(".ribbon").each(function(){
	tot=$(this).attr('total');
	width=tot*100+110;
	if(width>900){
		$(this).css('width', width);
	}
});
//=====================jadwal dokters
$("#dialog" ).dialog({
	autoOpen: false,
	width: 800,
	buttons: [
		{
			text: "Ok",
			click: function() {
				$( this ).dialog( "close" );
			}
		},
		{
			text: "Cancel",		
			click: function() {
				$( this ).dialog( "close" );
			}
		}
	]
});

$("#formDialog" ).dialog({
	autoOpen: false,
	width: 800,
	buttons: [
		{
			text: "Ok",
			click: function() {
				data = $("form#formClinic").serialize();
				console.log(data);
				$( this ).dialog( "close" );
			}
		},
		{
			text: "Cancel",		
			click: function() {
				$( this ).dialog( "close" );
			}
		}
	]
});


 
/* editor */
 tinymce.init({
    selector: ".tinyMce",
	 plugins: [
         "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
         "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
         "save paste textcolor"
   ], 
   toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons", 
   style_formats: [
        {title: 'Bold text', inline: 'b'},
        {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
   
        {title: 'Table styles'},
        {title:	 'Table row 1', selector: 'tr', classes: 'tablerow1'}
    ]
 });  	
  
function addData(target,from ){
	str1 = $(from+" :selected").text();
	str0 = $(target).val();
	 
	if(str0==''){
		str0=str1;
	}
	else{ 
		str0=str0+"\n"+str1;
	}
	 
	//console.log($(from));
	//console.log(target);
	
	$(target).val(str0);
}

$( ".datepicker" ).datepicker({ format:'yyy-mm-dd'});
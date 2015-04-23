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
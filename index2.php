<?php 
/*
only show data
*/
$s='';
if(isset($_GET['act'])&&$_GET['act']=='pasienMr'){
	$s='ini hanya contoh menampilkan page baru';
}
if(isset($_GET['opt'])&&$_GET['opt']=='master'){
	$s='{"date":["'.date("H:i:s").'","'.date("d-m-Y").'"],"page":"1","total":1,"records":"4","rows":[{"id":"1","cell":["tmp","contoh"]},{"id":"4","cell":["ph","Farmasi"]},{"id":"3","cell":["inv","Inventory"]},{"id":"2","cell":["mr","Medrec"]}]}';
}

if(isset($_GET['opt'])&&$_GET['opt']=='group'&&isset($_GET['id'])){
$s='{"date":["'.date("H:i:s").'","'.date("d-m-Y").'"],"page":"1","total":2,"records":"7","rows":[{"id":"1","cell":["Tes1","test1a","child"]},{"id":"2","cell":["Test2","Test2a","parent"]}]}';
}

if(isset($_GET['t'])&&$_GET['t']=='pasienDetail'){
	$s='{"message":"show detail here"}';
}
die(str_replace("\n"," ",$s));
<?php 
/***
	file:	menu.php
	created:	2015-04-26 07:38:04
***/
$menus=array(
	'pasien'=>array('icon'=>'venus-mars','title'=>'Pasien'),
	'billing'=>array('icon'=>'money','title'=>'Billing'),
	'report'=>array('icon'=>'print','title'=>'Laporan'),
	'docter'=>array('icon'=>'stethoscope','title'=>'Dokter'),	 
	'aging'=>array('icon'=>'bank','title'=>'Aging'),
	
	'lab'=>array('icon'=>'flask','title'=>'Lab'),
	'ri'=>array('icon'=>'bed','title'=>'Inpatient'),
	'special'=>array('icon'=>'cube','title'=>'My Clinic'),
	'other'=>array('icon'=>'globe','title'=>'Other'), 
	'manage'=>array('icon'=>'dashboard','title'=>'Setting'), 
	);

//==========ADMIN
	$menus['other']['subs'][]=array('icon'=>'linux','title'=>'ICON','url'=>'index2.php?option=com_rs&l=h&t=icon','ok'=>1);
	$menus['other']['subs'][]=array('icon'=>'laptop','title'=>'Fields','url'=>'index2.php?option=com_rs&l=h&t=fields','ok'=>1);
	$menus['other']['subs'][]=array('icon'=>'joomla','title'=>'ui - tab','url'=>'index2.php?option=com_rs&l=h&t=uiTab','ok'=>1);
	$menus['other']['subs'][]=array('icon'=>'joomla','title'=>'Laporan Medrec','url'=>'index2.php?option=com_rs&l=l&t=medrec','ok'=>1);
	$seeAll=1;
//========UNKNOWN
	$menus['special']['subs'][]=array('icon'=>'server','title'=>'Medical Record','url'=>'index.php?option=com_rs&view=mr');
	
	$menus['pasien']['subs'][]=array('icon'=>'eye','title'=>'Cari Pasien','url'=>'index2.php?option=com_rs&l=h&t=pasien','ok'=>1);
	//=====pasien 
	if($seeAll==1 || $arUsrPermit['patientAdd']==1 || $arUsrPermit['patAdd']==1){
		$menus['pasien']['subs'][]=array('icon'=>'user-plus','title'=>'Pasien Baru','url'=>'index2.php?option=com_rs&l=h&t=pasienbaru','ok'=>1); 
	}
	
//=====backup
	if($seeAll==1 ||$arUsrPermit['backupPat']==1){  
		$menus['pasien']['subs'][] =array('icon'=>'male','title'=>'Backup Pasien (baru)','url'=>'index2.php?option=com_rs&l=l&t=back&type=1','ok'=>1);
		$menus['other']['subs'][] =array('icon'=>'male','title'=>'Backup Pasien (baru)','url'=>'index2.php?option=com_rs&l=l&t=back&type=1','ok'=>1);
		$menus['pasien']['subs'][]=array('icon'=>'female','title'=>'Backup Pasien (lama)','url'=>'index2.php?option=com_rs&l=l&t=back&type=2','ok'=>1);
		$menus['other']['subs'][]=array('icon'=>'female','title'=>'Backup Pasien (lama)','url'=>'index2.php?option=com_rs&l=l&t=back&type=2','ok'=>1);
		
	}

	if($seeAll==1 ||$arUsrPermit['billEdit']==1 || $arUsrPermit['billShow']==1 ){
		$menus['billing']['subs'][]=array('icon'=>'list-alt','title'=>'List','url'=>'index.php?option=com_klinik&type=billing');
		$menus['billing']['subs'][]=array('icon'=>'credit-card','title'=>'List Asuransi','url'=>'index2.php?option=com_rs&l=h&t=asuransi&show=home','ok'=>1);
	}
	
	if($seeAll==1 ||$arUsrPermit['rekap']==1){
		$menus['special']['subs'][]=array('icon'=>'list','title'=>'Laporan Rekapitulasi','url'=>'index2.php?option=com_rs&l=h&t=rekap','ok'=>1);
	}
	
	if($seeAll==1 ||$arUsrPermit['viewReport']==1 || $arUsrPermit['printReport']==1){
		$menus['special']['subs'][]=array('icon'=>'sort-amount-desc','title'=>'List Laporan','url'=>'index.php?option=com_klinik&type=report');
		
		$menus['special']['subs'][]=array('icon'=>'list-ol','title'=>'Laporan Asuransi & PT','url'=>'index2.php?option=com_rs&t=reportasuransi&l=h','ok'=>1);
		$menus['special']['subs'][]=array('icon'=>'list-ul','title'=>'Laporan Ekses','url'=>
		'index2.php?option=com_rs&l=h&t=ekses');
		$menus['billing']['subs'][]=array('icon'=>'list-ol','title'=>'Laporan Asuransi & PT','url'=>'index2.php?option=com_rs&t=reportasuransi&l=h','ok'=>1);
		$menus['billing']['subs'][]=array('icon'=>'list-ul','title'=>'Laporan Ekses','url'=>
		'index2.php?option=com_rs&l=h&t=ekses','ok'=>1);
		
	}
	
	if($seeAll==1 ||$arUsrPermit['viewReport']==1 ){			
		$menus['special']['subs'][]=array('icon'=>'briefcase','title'=>'Laporan Asuransi (Aging)','url'=>'index2.php?option=com_rs&l=h&t=reportasuransi','ok'=>1);

	}
	
	if($seeAll==1 ||$arUsrPermit['docAdd']==1||$arUsrPermit['docEdit']==1){
		$menus['manage']['subs'][]=array('icon'=>'stethoscope','title'=>'List Dokter','url'=>'index.php?option=com_klinik&type=docter&act=patientEdit');
	}
	
	$menus['special']['subs'][]=array('icon'=>'table','title'=>'Jadwal Dokter','url'=>'index.php?option=com_klinik&type=docter&act=jadwal');
 
	if($seeAll==1 ||$admin == 1 || $arUsrPermit['userAdd']==1 ||$arUsrPermit['userEdit'] ){
		$menus['manage']['subs'][]=array('icon'=>'user','title'=>'User','url'=>'index.php?option=com_klinik&type=user');
	}
	
	if($seeAll==1 ||$arUsrPermit['tarifNew']==1||$arUsrPermit['tarifEdit']==1){
		$menus['manage']['subs'][]=array('icon'=>'medkit','title'=>'Tarif','url'=>'index2.php?option=com_rs&l=h&t=tarif&layout=home','ok'=>1);
		$menus['manage']['subs'][]=array('icon'=>'cubes','title'=>'Asuransi','url'=>'index.php?option=com_klinik&type=asuransi');
		$menus['manage']['subs'][]=array('icon'=>'simplybuilt','title'=>'Perusahaan','url'=>'index.php?option=com_klinik&type=company');
	}
	
	if($seeAll==1 ||$arUsrPermit['aging']==1){
		$menus['special']['subs'][]=array('icon'=>'briefcase','title'=>'Aging','url'=>'index.php?option=com_finance&view=aging');
	}	
	
	if($seeAll==1 ||$arUsrPermit['lab']==1){
		$menus['special']['subs'][]=array('icon'=>'flask','title'=>'Laboratorium','url'=>'index.php?option=com_lab&l=l&t=lab');
		$menus['special']['subs'][]=array('icon'=>'print','title'=>'Laporan Laboratorium','url'=>'index.php?option=com_lab&l=f&t=rep');
		 
	}

	if( $seeAll==1 ||$arUsrPermit['labExam']==1){
		$menus['special']['subs'][]=array('icon'=>'glass','title'=>'Examination List (Lab)','url'=>'index.php?option=com_lab&view=exam');
	}
	
	if( $seeAll==1 ||$arUsrPermit['labFare']==1){
		$menus['special']['subs'][]=array('icon'=>'glass','title'=>'Fare List.(Lab)','url'=>'index.php?option=com_lab&view=fare');
		$menus['special']['subs'][]=array('icon'=>'flask','title'=>'Fare Baru.(Lab)','url'=>'index.php?option=com_lab&view=fare');
 
	}
	
	if($seeAll==1 ||$arUsrPermit['ri']==1||$arUsrPermit['riRoom']){
		$menus['ri']['subs'][]=array('icon'=>'building','title'=>'Rawat Inap','url'=>'index.php?option=com_rs&view=ri');
		$menus['ri']['subs'][]=array('icon'=>'frown-o','title'=>'Pasien','url'=>'index.php?option=com_rs&view=ri&l=l&t=pat');
			$menus['ri']['subs'][]=array('icon'=>'bed','title'=>'Bangsal','url'=>'index.php?option=com_rs&view=ri&l=l&t=ri');
		$menus['ri']['subs'][]=array('icon'=>'money','title'=>'Billing','url'=>'index.php?option=com_rs&view=ri&l=l&t=bill');
				
		$menus['special']['subs'][]=array('icon'=>'home','title'=>'Home Care','url'=>'index.php?option=com_rs&view=hc');
		
	}
	
?>

<div class="container">
		<div class="row">

<!--tab start-->			
<ul class="nav nav-tabs" id="menuTab">
  <li class="active"><a href="#home" data-toggle="tab">Home <i class="fa fa-home"></i></a></li>
  
  <?php 
	foreach($menus as $name=>$menu){
		if(isset($menu['subs'])){
			$url1=isset($menu['url'])?$menu['url']:'';
			printf('<li><a href="%s#%s" data-toggle="tab">%s <i class="fa %s"></i></a></li>',
			$url1,$name, $menu['title'],"fa-".$menu['icon']);
		}else{
			//printf('<!--%s-->',print_r($menu,1));
		}
	}
?> 
</ul>

<div id="myTabContent" class="tab-content"> 
  <div class="tab-pane active" id="home">
  <div class='ribbon' total=3>
	  <dl>
		<dd><a href='index.php'><button><i class="fa fa-gear fa-spin fa-4x"></i></button></a><p>Halaman Depan</p></dd>
		<dd><a href='index2.php?option=com_rs&l=h&t=jadwal'><button><i class="fa fa-users fa-3x"></i></button></a><p>Jadwal Pasien</p></dd>
	  </dl>
	  <div class='clear'></div> 
  </div></div>
<?php 
$accordion='';
foreach($menus as $name=>$menu){
	if(isset($menu['subs'])){?>
   <div class="tab-pane" id="<?=$name;?>">
	<div class='ribbon' total='<?=count($menu['subs']);?>'>
	  <dl >
<?php
	$accordion.="<h3>{$menu['title']}</h3>\n<div><dl>";
		foreach($menu['subs'] as $sub){?>
		<dd><a href='#'><button><i class="fa fa-<?=$sub['icon'];?> fa-3x"></i></button></a>
		<p><?=isset($sub['ok'])?"<b>{$sub['title']}</b>":$sub['title']."*";?></p></dd>
<?php 
			$accordion.="\n\t<dd><a href='#'><button class='btn btn-default'><i class='fa fa-{$sub['icon']} fa-2x'></i> {$sub['title']} </button></a></dd>"; 
		}		
		$accordion.="\n</dl></div>\n";
?>
		
	  </dl>
	
	  <div class='clear'></div> 
	</div>
  </div>	
<?php
	}else{ }
		
}
?>
<!--
   <?=$accordion;?>
-->
</div>
 
<!--tab end--> 
	</div>
	<div class='clear' style='margin-bottom:20px'></div>
</div> 
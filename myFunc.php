<?php 
function checkFile($files=array(), $create=false, $type='txt'){
	foreach($files as $file){
		$stat=is_file($file);
		if($stat===false){
			if($create==false){
				die('not found:'.$file);
			}
			$created=false;
			$datetime=date("Y-m-d H:i:s");
			$date=date("Y-m-d");
			if($type=='txt'){ $txt=''; $created=true; }
			if($type=='php'){ $txt="<?php \n/***\n\tfile:\t$file\n\tcreated:\t$datetime\n***/"; $created=true; }
			
			if($created==true){
				file_put_contents ( $file, $txt);
				logWrite('info','create:'.$file);
			}else{
				logWrite('error','unknown:'.$type);
				die('unknown type:'.$type);
			}
			
		}
		
	}

}

function logWrite($stat,$text,$file='%s'){
	if($file==''){
		$file='log/'.date("Ymd").".log";
	}
/*	elseif( strpos('%s',$file)===false){
		$file.=".log";
	} */
	else{
		$file=sprintf($file,date("Ymd"));
	}
	
	$time=date("H:i:s");
	
	if(is_array($text)){
		$str=json_encode($text);
	}
	else{ 
		$str=str_replace("\n","\t",$text);
	}
	
	file_put_contents($file,"$time\t$stat\t$str\n");
	
}
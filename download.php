<?php
$f=$_REQUEST['f'];
$t='';
if(is_file($f)){
	$size=filesize($t);
	if(function_exists('mime_content_type')){
		$t=mime_content_type($f);
	}else if(function_exists('finfo_file')){
		$i=finfo_open(FILEINFO_MIME);
		$t=finfo_file($i,$p);
		finfo_close($i);
	}
	if($t==''){
		$t="application/force-download";
	}
	header("Content-Type:$t");
	header("Expires:0");
	header("Cache-Control:must-revalidate,post-check=0,pre-check=0");
	header("Content-Disposition:attachment;filename=".$f);
	header("Content-Transfer-Encoding:binary");
	header("Content-Length:$s");
	readfile($f);
}else{
	die("El archivo no existe.");
}
?>

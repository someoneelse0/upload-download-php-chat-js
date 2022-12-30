<?php 
	$nombre=/*date("y-m-d-H:i:s:U_").*/$_FILES['f']['name'];
	echo $nombre;
	$guardado=$_FILES['f']['tmp_name'];
	if(move_uploaded_file($guardado,"files/".$nombre)){
		echo "done";
	}else{
		echo "error";
	}
?>

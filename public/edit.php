<?php 

require dirname(dirname(__FILE__)).'/inc/config.php';


if(!empty($_POST)){
	if(!empty($_FILES)){
		$currentFileUpload = $_FILES['studentPic'];

		if(!substr($currentFileUpload['name'], -4) == '.php'){
			move_uploaded_file($currentFileUpload['tmp_name'], './files/'.md5(time().getmygid()).'.png')
			echo 'Upload successful. <br>';
			echo 'Size: '.$currentFileUpload['size'];
		}
		
		echo 'Upload failed. <br>';
	}
}



require dirname(__FILE__).'/view/list.php';
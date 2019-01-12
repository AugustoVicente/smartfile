<?php

header('Access-Control-Allow-Origin: *');

$idLaudo     = $_REQUEST['idLaudo'];
$filename    = $idLaudo."/";


if (!is_dir($filename)) 
{
	mkdir($idLaudo."images/", 0700);
	uploadImage($idLaudo);
}
else 
{
	uploadImage($idLaudo);
}



function uploadImage($pIdLaudo){
	if (isset($_FILES['file'])) {
		$name = $_FILES['file']['name'];
		$tmp_name = $_FILES['file']['tmp_name'];
		$laudoFolder = strval($idLaudo);

		$error = $_FILES['file']['error'];
		if ($error !== UPLOAD_ERR_OK) {
			echo 'Erro ao fazer o upload:', $error;
		} elseif (move_uploaded_file($tmp_name, $pIdLaudo."/image/".$name)) {
			echo 'Uploaded';
		}
	} else {
		echo 'Selecione um arquivo para fazer upload';
	}
}
?>
<?php
ob_start();
@session_start();
require ("../../config.php");

$id = $_POST['id'];

if(is_array($id)){
	
	for($i=0; $i<sizeof($id); $i++) {

		$ids = $id[$i];
		
		//APAGA A IMAGEM DAQUELE OBJETO//
		$sel = $db->select("SELECT imagem FROM objetos WHERE id_objeto='$ids' AND imagem!='' LIMIT 1");
		if($db->rows($sel)){
			$line = $db->expand($sel);
			$imagem = $line['imagem'];

			$filepath = '../../'.PASTA_UPLOAD_IMAGENS_OBJETOS.$imagem;
			if(file_exists($filepath)){unlink($filepath);}
		}
		
		$delete = $db->select("DELETE FROM objetos WHERE id_objeto='$ids' LIMIT 1");	
		$delete = $db->select("DELETE FROM respostas WHERE id_objeto='$ids'");

	}

} else {
	


	//APAGA A IMAGEM DAQUELE OBJETO//
	$sel = $db->select("SELECT imagem FROM objetos WHERE id_objeto='$id' AND imagem!='' LIMIT 1");
	if($db->rows($sel)){
		$line = $db->expand($sel);
		$imagem = $line['imagem'];

		$filepath = '../../'.PASTA_UPLOAD_IMAGENS_OBJETOS.$imagem;
		if(file_exists($filepath)){unlink($filepath);}
	}
	
	$delete = $db->select("DELETE FROM objetos WHERE id_objeto='$id' LIMIT 1");	
	$delete = $db->select("DELETE FROM respostas WHERE id_objeto='$id'");

}

echo 1;




?>
<?php
ob_start();
@session_start();
require ("../../config.php");
//INSTANCIA A CLASSE PARA USO de UPLOAD
$Images = new UploadArquivoSis();

if(!empty($prioridade)){
	$update = $db->select("UPDATE os SET prioridade='$prioridade', id_objeto='$id_objeto' WHERE id_os='$id_os' LIMIT 1");	
}


$imagem1 = $Images->Upload('../../'.PASTA_UPLOAD_IMAGENS_OS,'imagem1',1024);
$imagem2 = $Images->Upload('../../'.PASTA_UPLOAD_IMAGENS_OS,'imagem2',1024);
$imagem3 = $Images->Upload('../../'.PASTA_UPLOAD_IMAGENS_OS,'imagem3',1024);

if(!empty($imagem1)){
	$update = $db->select("UPDATE os SET img1='$imagem1' WHERE id_os='$id_os' LIMIT 1");
}

if(!empty($imagem2)){
	$update = $db->select("UPDATE os SET img2='$imagem2' WHERE id_os='$id_os' LIMIT 1");	
}

if(!empty($imagem3)){
	$update = $db->select("UPDATE os SET img3='$imagem3' WHERE id_os='$id_os' LIMIT 1");
}


$_SESSION['session_type'] = 'success';
$_SESSION['session_title'] = 'Sucesso!';
$_SESSION['session_message'] = 'OS aberta com sucesso!';


$query = $db->select("SELECT id_check_realizado FROM os WHERE id_os='$id_os' LIMIT 1");
$result = $db->expand($query);
$id = $result['id_check_realizado'];

if(empty($id)){
	header("location: ../../ordens-servico");
} else {
	header("location: ../../verifica-checklist/$id");	
}


?>
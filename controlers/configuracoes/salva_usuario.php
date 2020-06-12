<?php
ob_start();
@session_start();
require ("../../config.php");
$data = date("Y-m-d H:i:s");

//INSTANCIA A CLASSE PARA USO de UPLOAD
$Images = new UploadArquivoSis();
$arquivo = $Images->Upload('../../'.PASTA_UPLOAD_IMAGENS_USUARIOS,'img_funcionario',1024);



//UPDATE
if(isset($id) && $id!='0'){

	$sql = $db->select("UPDATE usuarios SET id_funcao='$funcao', nome='$nome', telefone='$telefone', email='$email', usuario='$usuario', senha='$senha', whats='$whats', skype='$skype' WHERE id_usuario='$id' LIMIT 1");

	if(!empty($arquivo)){
		$sql = $db->select("UPDATE usuarios SET img_funcionario='$arquivo' WHERE id_usuario='$id' LIMIT 1");		
	}

//INSERT
} else {


	//SALVA O OBJETO
	$sql = $db->select("INSERT INTO usuarios (id_funcao, nome, telefone, email, usuario, senha, data_cadastro, whats, skype, img_funcionario ) VALUES ('$funcao', '$nome', '$telefone', '$email', '$usuario', '$senha', '$data', '$whats', '$skype', '$arquivo' )");
	

}


if(isset($redirect)){

	$_SESSION['session_type'] = 'success';
	$_SESSION['session_title'] = 'Sucesso!';
	$_SESSION['session_message'] = 'Informações alteradas com sucesso!';
	header("location: ../../meus-dados");

} else {

	$_SESSION['session_type'] = 'success';
	$_SESSION['session_title'] = 'Sucesso!';
	$_SESSION['session_message'] = 'Usuário salvo com sucesso!';
	header("location: ../../usuarios-sistema");
	
}



?>
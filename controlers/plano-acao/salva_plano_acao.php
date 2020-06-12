<?php
ob_start();
@session_start();
require ("../../config.php");
$data = date("Y-m-d H:i:s");


//UPDATE
if(isset($id) && $id!='0'){

	$sql = $db->select("UPDATE plano_de_acao SET data_limite='$data_limite', linka_status='$linka_status', solucao='$solucao', responsavel='$responsavel' WHERE id_plano='$id' LIMIT 1");


//INSERT
} else {


	//SALVA O OBJETO
	//$sql = $db->select("INSERT INTO usuarios (id_funcao, nome, telefone, email, usuario, senha, data_cadastro, whats, skype, img_funcionario ) VALUES ('$funcao', '$nome', '$telefone', '$email', '$usuario', '$senha', '$data', '$whats', '$skype', '$arquivo' )");
	

}


if(isset($redirect)){

	$_SESSION['session_type'] = 'success';
	$_SESSION['session_title'] = 'Sucesso!';
	$_SESSION['session_message'] = 'Informações alteradas com sucesso!';
	header("location: ../../plano-acao");

} else {

	$_SESSION['session_type'] = 'success';
	$_SESSION['session_title'] = 'Sucesso!';
	$_SESSION['session_message'] = 'Plano de ação salvo com sucesso!';
	header("location: ../../plano-acao");
	
}



?>
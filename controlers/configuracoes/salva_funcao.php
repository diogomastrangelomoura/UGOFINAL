<?php
ob_start();
@session_start();
require ("../../config.php");
$data = date("Y-m-d H:i:s");

//UPDATE
if(isset($id) && $id!='0'){

	$sql = $db->select("UPDATE funcoes SET funcao='$funcao' WHERE id_funcao='$id' LIMIT 1");

//INSERT
} else {


	//SALVA A FUNCAO
	$sql = $db->select("INSERT INTO funcoes ( funcao ) VALUES ('$funcao' )");
	

}


if(isset($redirect)){

	$_SESSION['session_type'] = 'success';
	$_SESSION['session_title'] = 'Sucesso!';
	$_SESSION['session_message'] = 'Informações alteradas com sucesso!';
	header("location: ../../meus-dados");

} else {

	$_SESSION['session_type'] = 'success';
	$_SESSION['session_title'] = 'Sucesso!';
	$_SESSION['session_message'] = 'Função salva com sucesso!';
	header("location: ../../lista-funcoes");
	
}



?>
<?php
ob_start();
@session_start();
require ("../../config.php");

$sql = $db->select("SELECT id_usuario FROM usuarios WHERE usuario='$usuario' AND senha='$senha' LIMIT 1");
if($db->rows($sql)){
	
	$line = $db->expand($sql);

	$_SESSION['ugo_iduser'] = $line['id_usuario'];

	header("location: ../../home");	

} else {

	$_SESSION['session_type'] = 'danger';
	$_SESSION['session_title'] = '<i class="mdi mdi-alert"></i>';
	$_SESSION['session_message'] = 'Usuário ou senha inválidos!';

	header("location: ../../acesso");	

}


?>
<?php
ob_start();
@session_start();
require ("../../config.php");
$data = date("Y-m-d H:i:s");


	//SALVA A OS
	$sql = $db->select("INSERT INTO os (titulo, subtitulo, descricao, id_check_realizado, id_resposta_check, data_criacao, id_criador, id_objeto) VALUES ('$titulo', '$subtitulo', '$descricao', '$id_check_realizado', '$id_resposta_check', '$data', '$id_usuario_ugo', '$id_objeto')");
	$id = $db->last_id($sql);


header("location: ../../prioridade-ordem-servico/$id");

?>
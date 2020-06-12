<?php
ob_start();
@session_start();
require ("../../config.php");


$cont_geral =0 ;

$bloqueio = isset($bloqueia_objeto) ? 1 : 0;

//UPDATE
if(isset($id_checklist) && $id_checklist!='0'){

	//SALVA O FORMULÁRIO//
	$insert = $db->select("UPDATE checklists SET nome='$titulo', descricao='$descricao', bloqueia_objeto='$bloqueio' WHERE id_checklist='$id_checklist' LIMIT 1");
	
//INSERT
} else {

	//SALVA O FORMULÁRIO//
	$insert = $db->select("INSERT INTO checklists (nome, descricao, bloqueia_objeto) VALUES ('$titulo', '$descricao', '$bloqueio')");
	$id_checklist = $db->last_id($insert);

}





header("location: ../../perguntas-novo-checklist/".$id_checklist."/".normaliza($titulo));

?>
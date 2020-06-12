<?php
ob_start();
@session_start();
require ("../../config.php");

$campo = $_POST['campo']; 
for($i=0; $i<sizeof($campo); $i++) {

	$id_pergunta = $campo[$i];

	$update = $db->select("UPDATE perg_tipo_index SET ordem='$i' WHERE id_pergunta='$id_pergunta' AND id_tipo='$id_formulario' LIMIT 1");

}

$_SESSION['session_type'] = 'success';
$_SESSION['session_title'] = 'Sucesso!';
$_SESSION['session_message'] = 'Formulário salvo com sucesso!';

header("location: ../../config-formularios");

?>
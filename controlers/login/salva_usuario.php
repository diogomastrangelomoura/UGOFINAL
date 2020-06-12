<?php
ob_start();
@session_start();
require ("../../class/class.db.php");
require ("../../class/class.seguranca.php");


//UPDATE NO USUARIO
$sql = $db->select("");







$_SESSION['session_type'] = 'success';
$_SESSION['session_title'] = 'Sucesso!';
$_SESSION['session_message'] = 'Alterações feitas com sucesso!';

header("location: ../../meus-dados");

?>

<?php
ob_start();
@session_start();
require ("../../config.php");

$id = $_POST['id'];

	
	for($i=0; $i<sizeof($id); $i++) {

			$ids =  $id[$i];
      $delete = $db->select("DELETE FROM plano_de_acao WHERE id_plano='$ids' LIMIT 1");
      

$_SESSION['session_type'] = 'success';
$_SESSION['session_title'] = 'Sucesso!';
$_SESSION['session_message'] = 'Plano de ação deletado com sucesso!';

header("location: ../../plano-acao");

	}

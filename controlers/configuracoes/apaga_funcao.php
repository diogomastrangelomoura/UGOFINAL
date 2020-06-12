<?php
ob_start();
@session_start();
require ("../../config.php");

$id = $_POST['id'];

	
	for($i=0; $i<sizeof($id); $i++) {

			$ids =  $id[$i];
			$delete = $db->select("DELETE FROM funcoes WHERE id_funcao='$ids' LIMIT 1");

	}


?>
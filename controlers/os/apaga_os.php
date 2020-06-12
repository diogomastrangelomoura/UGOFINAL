<?php
ob_start();
@session_start();
require ("../../config.php");

$id = $_POST['id'];

if(is_array($id)){
	
	for($i=0; $i<sizeof($id); $i++) {

		$ids = $id[$i];
		
		$delete = $db->select("DELETE FROM os WHERE id_os='$ids' LIMIT 1");	
		
	}

} else {
		
	$delete = $db->select("DELETE FROM os WHERE id_os='$id' LIMIT 1");	

}






?>
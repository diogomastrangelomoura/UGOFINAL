<?php
ob_start();
@session_start();
require ("../../config.php");

$sel = $db->select("SELECT id_objeto FROM objetos WHERE id_tipo='$id'");
while($line = $db->expand($sel)){
	
	$id_objeto = $line['id_objeto'];
	$delete = $db->select("DELETE FROM respostas WHERE id_objeto='$id_objeto'");

}


$delete = $db->select("DELETE FROM perg_tipo_index WHERE id_tipo='$id'");
$delete = $db->select("DELETE FROM objetos WHERE id_tipo='$id'");
$delete = $db->select("DELETE FROM tipo_cadastro WHERE id_tipo='$id'");


echo 1;
?>
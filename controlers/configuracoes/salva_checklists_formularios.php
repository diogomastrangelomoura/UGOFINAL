<?php
ob_start();
@session_start();
require ("../../config.php");


$limpa = $db->select("DELETE FROM check_tipo_index WHERE id_checklist='$id_checklist'");

//USA PERGUNTAS QUE JA EXISTEM NO FORMULARIO
	if(isset($_POST['formularios'])){


		$formularios = $_POST['formularios'];

		for($i=0; $i<sizeof($formularios); $i++) {
			
			$id_form = $formularios[$i];

			$insert_check_form = $db->select("INSERT INTO check_tipo_index (id_checklist, id_tipo) VALUES ('$id_checklist', '$id_form')");
			
		}		
	
	}


$_SESSION['session_type'] = 'success';
$_SESSION['session_title'] = 'Sucesso!';
$_SESSION['session_message'] = 'Checklist vínculado com sucesso!';

header("location: ../../config-checklist");

?>
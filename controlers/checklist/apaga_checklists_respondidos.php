<?php
ob_start();
@session_start();
require ("../../config.php");

$id = 17;

if(is_array($id)){
	
	for($i=0; $i<sizeof($id); $i++) {

		$ids = $id[$i];
		
		$delete = $db->select("DELETE FROM realizados WHERE id_realizado='$ids' LIMIT 1");	


		$sel = $db->select("SELECT respostas_checklists.*, indicadores.tipo 
			FROM respostas_checklists 
			LEFT JOIN indicadores ON respostas_checklists.id_indicador=indicadores.id_indicador
			WHERE respostas_checklists.id_realizado='$ids'");

		if($db->rows($sel)){
			while ($line = $db->expand($sel)) {

				$id_indicador = $line['id_indicador'];
				
				if($line['tipo']=='file' || $line['tipo']=='assinatura'){
										
					$imagem_img = $line['resposta'];

					$filepath = '../../'.PASTA_UPLOAD_IMAGENS_CHECKLIST.$imagem_img;
					if(file_exists($filepath)){unlink($filepath);}	

				}

					
				$delete = $db->select("DELETE FROM respostas_checklists WHERE id_realizado='$ids' AND id_indicador='$id_indicador' LIMIT 1");		

			}
		}

		


	}

} else {
		
	$delete = $db->select("DELETE FROM realizados WHERE id_realizado='$id' LIMIT 1");	
	
	$sel = $db->select("SELECT respostas_checklists.*, indicadores.tipo 
			FROM respostas_checklists 
			LEFT JOIN indicadores ON respostas_checklists.id_indicador=indicadores.id_indicador
			WHERE respostas_checklists.id_realizado='$id'");

		if($db->rows($sel)){
			while ($line = $db->expand($sel)) {	

				$id_indicador = $line['id_indicador'];			
				
				if($line['tipo']=='file' || $line['tipo']=='assinatura'){
						
					$imagem_img = $line['resposta'];

					$filepath = '../../'.PASTA_UPLOAD_IMAGENS_CHECKLIST.$imagem_img;
					if(file_exists($filepath)){unlink($filepath);}	

				}

					
				$delete = $db->select("DELETE FROM respostas_checklists WHERE id_realizado='$id' AND id_indicador='$id_indicador' LIMIT 1");		

			}
		}

}






?>
<?php
ob_start();
@session_start();
require ("../../config.php");
$data = date("Y-m-d H:i:s");

//INSTANCIA A CLASSE PARA USO de UPLOAD
$Images = new UploadArquivoSis();

	//SALVA O CHECKLIST
	$sql = $db->select("INSERT INTO realizados (id_checklist, data_criacao, id_objeto, id_usuario) VALUES ('$id_checklist', '$data', '$id_objeto', '$id_usuario_ugo')");
	$id_checklist_respondido = $db->last_id($sql);


$fotos=1;

	//SALVA RESPOSTAS DAS PERGUNTAS DO CHECKLIST	
	if(isset($_POST['pergunta']) && isset($_POST['resposta']) && isset($_POST['id_pergunta'])){

		$pergunta = $_POST['pergunta']; 
		$resposta = $_POST['resposta']; 
		$id_pergunta = $_POST['id_pergunta']; 
		$tipo_campo = $_POST['tipo_campo']; 
		

		for($i=0; $i<sizeof($pergunta); $i++) {

			$pergunta_insere = $pergunta[$i];
			$resposta_insere = $resposta[$i];
			$id_pergunta_insere = $id_pergunta[$i];
			$tipo = $tipo_campo[$i];


			if($tipo=='file' || $tipo=='assinatura'){

				$arquivo = $Images->Upload('../../'.PASTA_UPLOAD_IMAGENS_CHECKLIST,"resposta",1024,$fotos);		
				
				if(!empty($arquivo)){

					$sql = $db->select("INSERT INTO respostas_checklists (indicador, resposta, id_indicador, id_realizado) VALUES ('$pergunta_insere', '$arquivo', '$id_pergunta_insere', '$id_checklist_respondido')");
				}

				$fotos++;

			} else {

				$sql = $db->select("INSERT INTO respostas_checklists (indicador, resposta, id_indicador, id_realizado) VALUES ('$pergunta_insere', '$resposta_insere', '$id_pergunta_insere', '$id_checklist_respondido')");

			}

			

		}

	}



$_SESSION['session_type'] = 'success';
$_SESSION['session_title'] = 'Sucesso!';
$_SESSION['session_message'] = 'Checklist realizado com sucesso!';

header("location: ../../lista-checklist");

?>
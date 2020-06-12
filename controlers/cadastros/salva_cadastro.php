<?php
ob_start();
@session_start();
require ("../../config.php");
$data = date("Y-m-d H:i:s");






//INSTANCIA A CLASSE PARA USO de UPLOAD
$Images = new UploadArquivoSis();
$arquivo = $Images->Upload('../../'.PASTA_UPLOAD_IMAGENS_OBJETOS,'foto_objeto',1024);


//UPDATE
if(isset($id_objeto) && $id_objeto!='0'){

	$sql = $db->select("UPDATE objetos SET nome='$nome_objeto', ultima_alteracao='$data' WHERE id_objeto='$id_objeto' LIMIT 1");


	if(!empty($arquivo)){
		$sql = $db->select("UPDATE objetos SET imagem='$arquivo' WHERE id_objeto='$id_objeto' LIMIT 1");		
	}


//INSERT
} else {


	//SALVA O OBJETO
	$sql = $db->select("INSERT INTO objetos (id_tipo, data_criacao, nome, imagem) VALUES ('$id_formulario', '$data', '$nome_objeto', '$arquivo')");
	$id_objeto = $db->last_id($sql);

}



	//APAGA FOTO CASO VENHA O CHECKBOX MARCADO//
	if(isset($_POST['apaga_imagem'])){

		$apaga_imagem = $_POST['apaga_imagem']; 
		for($i=0; $i<sizeof($apaga_imagem); $i++) {

			$apaga_imagem_id = $apaga_imagem[$i];

			//APAGA A FOTO//
			$sel_img = $db->select("SELECT resposta FROM respostas WHERE id_objeto='$id_objeto' AND id_pergunta='$apaga_imagem_id' LIMIT 1");
			if($db->rows($sel_img)){
				$line_img = $db->expand($sel_img);
				$imagem_img = $line_img['resposta'];

				$filepath = '../../'.PASTA_UPLOAD_IMAGENS_CHECKLIST.$imagem_img;
				if(file_exists($filepath)){unlink($filepath);}
				
			}
			/////////////////

			$limpa_sql = $db->select("DELETE FROM respostas WHERE id_objeto='$id_objeto' AND id_pergunta='$apaga_imagem_id' LIMIT 1");

		}


	}



$fotos=1;


	//SALVA RESPOSTAS DAS PERGUNTAS DO FORMULARIO RELACIONADAS AO OBJETO	
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


			if($tipo=='file'){
				
				$arquivo = $Images->Upload('../../'.PASTA_UPLOAD_IMAGENS_OBJETOS,"resposta",1024,$fotos);		
				
				if(!empty($arquivo)){
					
					$limpa_sql = $db->select("DELETE FROM respostas WHERE id_objeto='$id_objeto' AND id_pergunta='$id_pergunta_insere' LIMIT 1");

					$sql = $db->select("INSERT INTO respostas (nome_pergunta, resposta, id_objeto, id_pergunta) VALUES ('$pergunta_insere', '$arquivo', '$id_objeto', '$id_pergunta_insere')");							
				}

				$fotos++;

			} else {

				$limpa_sql = $db->select("DELETE FROM respostas WHERE id_objeto='$id_objeto' AND id_pergunta='$id_pergunta_insere' LIMIT 1");

				$sql = $db->select("INSERT INTO respostas (nome_pergunta, resposta, id_objeto, id_pergunta) VALUES ('$pergunta_insere', '$resposta_insere', '$id_objeto', '$id_pergunta_insere')");	

			}


			

		}

	}





$_SESSION['session_type'] = 'success';
$_SESSION['session_title'] = 'Sucesso!';
$_SESSION['session_message'] = 'Cadastro salvo com sucesso!';

header("location: ../../lista-cadastros/".$id_formulario."/".normaliza($nome_formulario));

?>
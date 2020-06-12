<?php
ob_start();
@session_start();
require ("../../config.php");


$cont_geral =0 ;
$limpa = $db->select("UPDATE check_indi_index SET aguarde='0' WHERE id_checklist='$id_checklist'");


	//NOVOS CAMPOS A SEREM CRIADOS
	if(isset($_POST['campo']) && isset($_POST['tipo'])){

		$campo = $_POST['campo']; 
		$tipo = $_POST['tipo']; 

		if(isset($_POST['opcoes'])){
			$opcoes = $_POST['opcoes']; 
		}

		if(isset($_POST['contadoroptions'])){
			$contadoroptions = $_POST['contadoroptions']; 
		}

		for($i=0; $i<sizeof($campo); $i++) {


			//INSERE AS PERGUNTAS//
			$campo_insere = $campo[$i];
			$tipo_insere = $tipo[$i];

			//INSERE AS PERGUNTAS NA TABELA
			$insert_indicador = $db->select("INSERT INTO indicadores (texto, tipo) VALUES ('$campo_insere', '$tipo_insere')");
			$id_indicador = $db->last_id($insert_indicador);


			//LIGA AS PERGUNTAS AO FORMULARIO
			$insert_pergunta_formulario = $db->select("INSERT INTO check_indi_index (id_indicadores, id_checklist, aguarde) VALUES ('$id_indicador', '$id_checklist', '1')");


			if($tipo[$i] == 'select'){

				if($contadoroptions[$i]>0){


					$refaz = $cont_geral;
					$option_insere = '';
					for($x=0; $x<$contadoroptions[$i]; $x++) {

						$option_insere .= $opcoes[$refaz].',';
						
						$refaz++;
					}

					//REMOVE A ULTIMA VIRGULA
					$letrafinal = substr($option_insere, -1);
					if($letrafinal==','){
						$total_letras = strlen($option_insere);
						$option_insere = substr($option_insere, 0,($total_letras-1));
					}

					//INSERE AS OPTIONS NA TABELA//
					$insert_options = $db->select("INSERT INTO multipla_escolha (escolhas) VALUES ('$option_insere')");
					$id_options = $db->last_id($insert_options);

					//UPDATE NA TABELA DE PERGUNTAS COM O ID DAS OPCOES	
					$insert_options = $db->select("UPDATE indicadores SET id_multi='$id_options' WHERE id_indicador='$id_indicador' LIMIT 1");

					$cont_geral = (($cont_geral+$contadoroptions[$i]));

				}

	
			}
			


		}

	}



	//USA PERGUNTAS QUE JA EXISTEM NO FORMULARIO
	if(isset($_POST['perguntas_prontas'])){

		$perguntas_prontas = $_POST['perguntas_prontas'];

		for($i=0; $i<sizeof($perguntas_prontas); $i++) {
			$id_pergunta = $perguntas_prontas[$i];

			//SEL
			$ordem_antiga = '0';
			$selectx = $db->select("SELECT ordem FROM check_indi_index WHERE id_checklist='$id_checklist' AND id_indicadores='$id_pergunta' LIMIT 1"); 
			if($db->rows($selectx)){
				$line = $db->expand($selectx);
				$ordem_antiga = $line['ordem'];
			} else {
				$ordem_antiga = '0';
			}

			//LIGA AS PERGUNTAS AO FORMULARIO
			$insert_pergunta_formulario = $db->select("INSERT INTO check_indi_index (id_indicadores, id_checklist, ordem, aguarde) VALUES ('$id_pergunta', '$id_checklist', '$ordem_antiga', '1')");
		}

		//EXCLUI AS PERGUNTAS ANTIGAS CASO SEJA UPDATE
		$limpa_perguntas_formulario = $db->select("DELETE FROM check_indi_index WHERE id_checklist='$id_checklist' AND aguarde='0'");
	
	}


	$update_perguntas_index = $db->select("UPDATE check_indi_index SET aguarde='0' WHERE id_checklist='$id_formulario' AND aguarde='1'"); 
	

	
	



header("location: ../../confere-novo-checklist/".$id_checklist."/".normaliza($titulo));

?>
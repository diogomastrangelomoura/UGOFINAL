<?php require ("../../includes/topo.php"); ?>
		
<?php
$nome_objeto= '';
$nome_usuario = '';
$sel = $db->select("SELECT realizados.*, objetos.nome, usuarios.nome AS nome_usuario 
	FROM realizados 
	LEFT JOIN objetos ON realizados.id_objeto = objetos.id_objeto
	LEFT JOIN usuarios ON realizados.id_usuario=usuarios.id_usuario
	WHERE realizados.id_realizado='$id' 
	LIMIT 1");
$line = $db->expand($sel);
$id_checklist = $line['id_checklist'];
$data_checklist = $line['data_criacao'];
$id_objeto = $line['id_objeto'];
if(!empty($line['nome'])){$nome_objeto=$line['nome'];}
if(!empty($line['nome_usuario'])){$nome_usuario=$line['nome_usuario'];}

$sel = $db->select("SELECT * FROM checklists WHERE id_checklist='$id_checklist' LIMIT 1");
$line = $db->expand($sel);
$name = $line['nome'];
?>  

	
	<?php require ("../../cabecalhos/cabecalho-checklist.php"); ?>


	<div class="col-md-12 hide-print">
		<div class="card m-b-20 card-body">			
        	<h4 class="mt-0 h4_topo_exibe"><?php echo $line['nome']; ?>

        		
        		<div class="btn-toolbar pull-right" role="toolbar">            
	            <div class="btn-group">
	            	

	            		<button data-return="lista-checklist" data-title="Deseja excluir o checklist?" data-text="A ação não poderá ser desfeita." data-id="<?php echo $id; ?>" data-post="controlers/checklist/apaga_checklists_respondidos.php" type="button" class="btn btn-dark waves-light waves-effect apaga-elemento"><i class="fa fa-trash-o"></i></button>
	            	
	            		<button type="button" class="btn btn-ugo btn-divisor waves-light waves-effect print-page"><i class="mdi mdi-printer"></i></button>
	            

	            </div>
        	</div>

        	</h4> 			
        	<span><b>Responsável:</b> <?php echo $nome_usuario;  ?> em <?php echo data_exibe($data_checklist); ?></span>
    
    	</div>
    </div>

<div class="col-md-12">
	
	<div class="row">

		<div class="col-md-12">

				<?php if(!empty($id_objeto)){ ?>
				<div class="card m-b-10 border-bottom-card">
						<div class="card-body"> 
							<div class="row"> 
								<div class="col-md-12">
						        	<div class="form-group">
						        		<h4 class="mt-0 mbottom-10 header-title">Objeto referenciado</h4>						<?php echo $nome_objeto; ?> 	
						        	</div>
						        </div>
						    </div>  
						</div>
				</div>
				<?php } ?>
				
				
			    <div class="card m-b-20">
					<div class="card-body"> 
						<div class="row">   
					    <?php
							$sel = $db->select("SELECT indicadores.*, check_indi_index.ordem FROM indicadores 
								LEFT JOIN check_indi_index ON indicadores.id_indicador=check_indi_index.id_indicadores			

								WHERE check_indi_index.id_checklist='$id_checklist'
								ORDER BY check_indi_index.ordem, indicadores.texto");
			        		if($db->rows($sel)){
			        			$contador=1;
			            		while($line = $db->expand($sel)){

			            			$id_pergunta = $line['id_indicador'];
			            			$resposta = '';
			            			$line_resposta['OS'] = '';
			            			$sel_resposta = $db->select("SELECT respostas_checklists.id_resposta, respostas_checklists.resposta, os.id_os AS OS 
			            				FROM respostas_checklists 
			            				LEFT JOIN os ON respostas_checklists.id_resposta=os.id_resposta_check
			            				WHERE respostas_checklists.id_realizado='$id' AND respostas_checklists.id_indicador='$id_pergunta' 
			            				LIMIT 1");
				            			if($db->rows($sel_resposta)){
				            				$line_resposta = $db->expand($sel_resposta);
				            				$resposta = $line_resposta['resposta'];
				            			}				            			
			            		
					    ?>
						    <div class="col-md-12" >
			                	<div class="form-group">
			                		<h4 class="mt-0 mbottom-10 header-title"><?php echo $contador.') '.$line['texto']; ?></h4>
			                		<?php
			                			if($line['tipo']=='date'){
			                				echo data_mysql_para_user($resposta);

			                			} else if($line['tipo']=='file' || $line['tipo']=='assinatura'){
			                				
			                				if(!empty($resposta)){
			                					
			                					echo '
			                					<a class="image-popup-vertical-fit" href="'.PASTA_UPLOAD_IMAGENS_CHECKLIST.$resposta.'">
													'.imagens_checklist($resposta).'
												</a>
			                					';

			                				} else {
			                					echo 'Imagem não cadastrada!';
			                				}	 

			                				

			                			} else {
			                				if(empty($resposta)){
			                					echo 'Indicador não respondido.';	
			                				} else {
			                					echo $resposta;	
			                				}
			                				
			                			}
			                		?> 									
								</div>

								<a class="botao-tres-pontos" id="dropdownMenuLink" data-toggle="dropdown">
                                	<i class="mdi mdi-dots-vertical"></i>
                                </a>
            
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                                	<a class="dropdown-item" href="nova-os/<?php echo $id; ?>/<?php echo $line_resposta['id_resposta']; ?>" ><i class="mdi mdi-check-all"></i> Abrir OS</a>
                                </div>

								<?php
									if(!empty($line_resposta['OS'])){
								?>
									<div class="alert alert-warning">
										<i class="mdi mdi-alert-outline"></i> Existe uma OS aberta para este caso. 
										<a href="" class="alert-link">Clique aqui para saber mais.</a>									
									</div>	
								<?php

									}
								?>

								<hr>
			                </div>
					    <?php
					    	$contador++;
					    		}
					        }
					    ?>
					</div>
					</div>	
				</div>

		</div>
		
	</div>			

</div>







<?php require ("../../includes/rodape.php"); ?>
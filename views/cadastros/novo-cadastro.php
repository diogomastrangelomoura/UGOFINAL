<?php require ("../../includes/topo.php"); ?>
		
<?php
$sel = $db->select("SELECT * FROM tipo_cadastro WHERE id_tipo='$id' LIMIT 1");
$line = $db->expand($sel);
$name = 'Novo Cadastro '.$line['nome'];
$class='4';

if(isset($id_objeto)){
	$sel_objeto = $db->select("SELECT * FROM objetos WHERE id_objeto='$id_objeto' LIMIT 1");
	$line_objeto = $db->expand($sel_objeto);
	$name = 'Editando: '.$line_objeto['nome'];
	QRcode::png($id_objeto, "../../assets/images/qrcode/QR_code.png", QR_ECLEVEL_L , 9);
	if(isset($exibicao)){
		$name = $line_objeto['nome'];	
		$class='12';		
	}
}
?>  




	<div class="col-md-12">
		<div class="card m-b-20 card-body">			
        	<h4 class="mt-0 h4_topo_exibe"><?php echo $name; ?>

        	<?php if(isset($id_objeto)){ ?>
        		<div class="btn-toolbar pull-right" role="toolbar">            
	            <div class="btn-group">
	            	

	            		<button data-toggle="tooltip" data-placement="bottom" title="Deletar Objeto" data-return="lista-cadastros/<?php echo $id; ?>/<?php echo normaliza($line['nome']); ?>" data-title="Deseja excluir o cadastro?" data-text="A ação não poderá ser desfeita." data-id="<?php echo $id_objeto; ?>" data-post="controlers/cadastros/apaga_cadastro.php" type="button" class="btn btn-dark waves-light waves-effect apaga-elemento"><i class="fa fa-trash-o"></i></button>
	            	
	            		<button data-toggle="tooltip" data-placement="bottom" title="Imprimir" type="button" class="btn btn-ugo btn-divisor waves-light waves-effect print-page"><i class="mdi mdi-printer"></i></button>

	            		<a href="nova-ordem/<?php echo $id_objeto; ?>/<?php echo normaliza($line['nome']); ?>" data-toggle="tooltip" data-placement="bottom" title="Nova OS" type="button" class="btn btn-ugo btn-divisor waves-light waves-effect"><i class="mdi mdi-file-document"></i></a>

	            		<button data-toggle="tooltip" data-placement="bottom" title="Exibir QRCODE"  type="button" class="btn btn-ugo waves-light waves-effect botao-qrcode" data-id="<?php echo $id_objeto; ?>" data-name="<?php echo $line_objeto['nome']; ?>"><i class="mdi mdi-qrcode-scan"></i></button>



	            </div>
        	</div>

        <?php } ?>

        	</h4> 			

        	

    	</div>
    </div>

<div class="col-md-12">
<form method="post" action="controlers/cadastros/salva_cadastro.php" enctype="multipart/form-data">

	<input type="hidden" name="id_objeto" value="<?php if(isset($id_objeto)){echo $id_objeto;} else {echo '0';} ?>">
	<input type="hidden" name="id_formulario" value="<?php echo $id; ?>">
	<input type="hidden" name="nome_formulario" value="<?php echo $line['nome']; ?>">

	<div class="row">

		<div class="col-md-3 padding-right-0">

			<div class="card m-b-10 padding-20">


				<?php					
					if(isset($id_objeto) && !empty($line_objeto['imagem'])){
						echo foto_objeto($line_objeto['imagem']);
					} else {
						echo foto_objeto('');
					}
				?>
                	
                	<?php if(!isset($exibicao)){ ?>
                    <div class="card-body">
                    	<input name="foto_objeto" type="file" class="filestyle" data-input="false" data-buttonname="btn-ugo-border">                    	
                    </div>
                	<?php } ?>
            </div>

          

		</div>	

		<div class="col-md-9">
				
				<div class="card m-b-10">
					<div class="card-body">    
						<div class="form-group">
							<label class="mbottom-10">Nome</label>
							<input type="text" name="nome_objeto" class="form-control" required value="<?php if(isset($id_objeto)){echo $line_objeto['nome'];}?>" <?php if(isset($exibicao)){echo 'readonly';}?>>
						</div>	
					</div>
				</div>		


			     
					    <?php
							$sel = $db->select("SELECT perguntas.*, perg_tipo_index.ordem FROM perguntas 
								LEFT JOIN perg_tipo_index ON perguntas.id_pergunta=perg_tipo_index.id_pergunta					
								WHERE perg_tipo_index.id_tipo='$id'
								ORDER BY perg_tipo_index.ordem, perguntas.nome");
			        		if($db->rows($sel)){
			            		while($line = $db->expand($sel)){

			            			$id_pergunta = $line['id_pergunta'];
			            			$resposta = '';

			            			if(isset($id_objeto)){
				            			$sel_resposta = $db->select("SELECT resposta FROM respostas WHERE id_objeto='$id_objeto' AND id_pergunta='$id_pergunta' LIMIT 1");
				            			if($db->rows($sel_resposta)){
				            				$line_resposta = $db->expand($sel_resposta);
				            				$resposta = $line_resposta['resposta'];
				            			}
				            		}

					    ?>
					    <div class="card m-b-10">
						<div class="card-body">
						<div class="row">	

						    <div class="col-md-12">
			                	<div class="form-group">
									<label class="mbottom-10"><?php echo $line['nome']; ?></label>
									<input type="hidden" name="tipo_campo[]" value="<?php echo $line['tipo']; ?>">
									<input type="hidden" name="pergunta[]" value="<?php echo $line['nome']; ?>">
									<input type="hidden" name="id_pergunta[]" value="<?php echo $line['id_pergunta']; ?>">
									<?php
										if($line['tipo']=='select'){
											$id_opcao = $line['id_opcao'];

											$sel_opt = $db->select("SELECT opcoes FROM opcoes WHERE id_opcao='$id_opcao' LIMIT 1");
											$opcoes = $db->expand($sel_opt);
									?>
										<select class="form-control" name="resposta[]" <?php if(isset($exibicao)){echo 'disabled';}?>>
											<?php
												if(isset($id_objeto) && $resposta!=''){
													echo '<option value="'.$resposta.'">'.$resposta.'</option>';
												} else {
													echo '<option value="">-- escolha uma opção --</option>';
												}
											?>
											
											<?php
												$ex = explode(',', $opcoes['opcoes']);
												$x=0;
												$y=1;
												while($y<=count($ex)){

													if($ex[$x]!=$resposta){
														echo '<option value="'.$ex[$x].'">'.$ex[$x].'</option>';	
													}
													
													$x++;
													$y++;
												}
											?>	
										</select>

									<?php 
										} else {

											if($line['tipo']=='file'){
									?>			

										
										<div class="row">

											<?php if(!isset($exibicao)){ ?>


													<div class="col-md-<?php if(isset($id_objeto)){ echo 8; } else {echo 12;}?>">
														<input type="<?php echo $line['tipo'] ?>" class="form-control" name="resposta[]" value="<?php if(isset($id_objeto)){echo $resposta;}?>">	

														<?php if(!empty($resposta)){ ?>
														<div class="row">
															<div class="col-md-12 mtop-10">
																Apagar imagem?<br>
								                           		<input  type="checkbox" class="apaga_img" name="apaga_imagem[]" value="<?php echo $line['id_pergunta']; ?>" id="apaga_imagem<?php echo $line['id_pergunta']; ?>"  switch="none" />
								                            	<label  for="apaga_imagem<?php echo $line['id_pergunta']; ?>" data-on-label="Sim" data-off-label="Não" class="apaga_img" ></label>			
								                            </div>	
						                            	</div>
						                            	<?php } ?>

													</div>	

													<div class="col-md-4 <?php if(!isset($id_objeto)){echo 'hide';}?>">
														<div class="col-md-12 border-border text-center">
															<?php if(!empty($resposta)){ ?>
															<a class="image-popup-vertical-fit" href="<?php echo PASTA_UPLOAD_IMAGENS_OBJETOS.$resposta; ?>">
																<?php echo miniatura_imagens_objeto($resposta); ?>
																
															</a>	
															<?php 
																} else { 
																	echo miniatura_imagens_objeto($resposta);
																} 
															?>	
														</div>												
													</div>



											<?php } else { ?>	

												<div class="col-md-12">
												<div class="col-md-12 border-border text-center">
													<?php if(!empty($resposta)){ ?>
													<a class="image-popup-vertical-fit" href="<?php echo PASTA_UPLOAD_IMAGENS_OBJETOS.$resposta; ?>">
														<?php echo foto_objeto($resposta); ?>
														
													</a>	
													<?php 
														} else { 
															echo 'Imagem não cadastrada.';
														} 
													?>	
												</div>												
											</div>

											<?php }  ?>		
											
										</div>	
										
									<?php 
											} else {
									?>

										<input type="<?php echo $line['tipo'] ?>" class="form-control" name="resposta[]" value="<?php if(isset($id_objeto)){echo $resposta;}?>" <?php if(isset($exibicao)){echo 'readonly';}?>>

									<?php
											}				
										} 
									?>
								</div>
			                </div>

			            </div>
			            </div>
			            </div>    
					    <?php
					    		}
					        }
					    ?>
					
				<?php if(!isset($exibicao)){ ?>		    
				<button type="submit" class="btn btn-success waves-effect waves-light btn-block btn-lg">Salvar</button>
				<?php } ?>		    
				
		</div>
		
	</div>			

</form>	
</div>







<?php require ("../../includes/rodape.php"); ?>
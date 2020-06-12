<?php require ("../../includes/topo.php"); ?>
		
<?php
$pesquisas = new PESQUISAS();
$sel = $db->select("SELECT * FROM checklists WHERE id_checklist='$id_checklist' LIMIT 1");
$line = $db->expand($sel);
$name = $line['nome'];
?>  




	<div class="col-md-12">
		<div class="card m-b-20 card-body">			
        	<h4 class="mt-0 h4_topo_exibe"><?php echo $name; ?></h4> 			

        	

    	</div>
    </div>

<div class="col-md-12">
<form method="post" action="controlers/checklist/salva_respostas_checklist.php" enctype="multipart/form-data">

	<input type="hidden" name="id_checklist" value="<?php echo $id_checklist; ?>">
	
	<div class="row">

		<div class="col-md-12">

						<div class="card m-b-10 border-bottom-card">
						<div class="card-body"> 
							<div class="row"> 
								<div class="col-md-12">
						        	<div class="form-group">
						        		<label class="mbottom-10">Referenciar o checklist a um objeto?</label>
						        		<select class="form-control form-control-lg select2" name="id_objeto">
				                            <?php echo $pesquisas->SelectObjetos($id_objeto); ?>
				                        </select> 
						        	</div>
						        </div>
						    </div>  
						</div>
						</div>

				
					    <?php
							$sel = $db->select("SELECT indicadores.*, check_indi_index.ordem FROM indicadores 
								LEFT JOIN check_indi_index ON indicadores.id_indicador=check_indi_index.id_indicadores					
								WHERE check_indi_index.id_checklist='$id_checklist'
								ORDER BY check_indi_index.ordem, indicadores.texto");
			        		if($db->rows($sel)){
			            		while($line = $db->expand($sel)){
			            		
					    ?>

					    <div class="card m-b-10">
						<div class="card-body"> 
						<div class="row"> 
						    <div class="col-md-12">
			                	<div class="form-group">
									<label class="mbottom-10"><?php echo $line['texto']; ?></label>
									<input type="hidden" name="tipo_campo[]" value="<?php echo $line['tipo']; ?>">
									<input type="hidden" name="pergunta[]" value="<?php echo $line['texto']; ?>">
									<input type="hidden" name="id_pergunta[]" value="<?php echo $line['id_indicador']; ?>">
									<?php
										if($line['tipo']=='select'){
											$id_opcao = $line['id_multi'];

											$sel_opt = $db->select("SELECT escolhas FROM multipla_escolha WHERE id_multi='$id_opcao' LIMIT 1");
											$opcoes = $db->expand($sel_opt);
									?>
										<select class="form-control" name="resposta[]" required>
											<?php
												echo '<option value="">-- escolha uma opção --</option>';
												$ex = explode(',', $opcoes['escolhas']);
												$x=0;
												$y=1;
												while($y<=count($ex)){

													echo '<option value="'.$ex[$x].'">'.$ex[$x].'</option>';	
													
													$x++;
													$y++;
												}
											?>	
										</select>

									<?php 
										} else {
											if($line['tipo']=='assinatura'){ $line['tipo'] = 'file';}
									?>		
										<input type="<?php echo $line['tipo'] ?>" class="form-control" name="resposta[]" required>
									<?php 
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
					

				<button type="submit" class="btn btn-success waves-effect waves-light btn-block btn-lg">Salvar</button></a>
				
		</div>
		
	</div>			

</form>	
</div>







<?php require ("../../includes/rodape.php"); ?>
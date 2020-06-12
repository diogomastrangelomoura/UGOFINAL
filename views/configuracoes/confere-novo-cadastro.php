<?php require ("../../includes/topo_alternativo.php"); ?>

<?php
$sel = $db->select("SELECT * FROM tipo_cadastro WHERE id_tipo='$id' LIMIT 1");
$line = $db->expand($sel);
?>

<form method="post" action="controlers/configuracoes/salva_ordem_formulario.php">  
<div class="row">
		
	<input type="hidden" name="id_formulario" value="<?php echo $id; ?>">

	<div class="col-md-12">
		<div class="card m-b-10 card-body">			
        	<h4 class="mt-0 h4_topo_exibe"><?php echo $line['nome']; ?></h4> 			
    	</div>
    </div>

    <div class="col-md-12">
    	<div class="alert alert-info bg-ugo text-white">
    		<i class="mdi mdi-arrow-all"></i> Clique sobre indicador e <b>arraste para cima ou para baixo</b> para ordenar, ao final clique em finalizar.
    	</div>	
    </div>	


  
    <div class="col-md-12">
    <div class="custom-dd dd" id="nestable_list_1">
     	<ol class="dd-list">		
		    <?php
		    	$x=1;
				$sel = $db->select("SELECT perg_tipo_index.id_pergunta AS perg_id, perguntas.* FROM perg_tipo_index 
					LEFT JOIN perguntas ON perg_tipo_index.id_pergunta=perguntas.id_pergunta
					WHERE perg_tipo_index.id_tipo='$id'
					ORDER BY perg_tipo_index.ordem, perguntas.nome");
        		if($db->rows($sel)){
            		while($line = $db->expand($sel)){
		    ?>
			    <li class="dd-item move" data-id="<?php echo $x; ?>">
                	<div class="dd-handle conferencia">
                    	
                		<div class="form-group">
							<label class="mbottom-10 cursor"><?php echo $line['nome']; ?></label>
						    <?php
								if($line['tipo']=='select'){
									$id_opcao = $line['id_opcao'];

									$sel_opt = $db->select("SELECT opcoes FROM opcoes WHERE id_opcao='$id_opcao' LIMIT 1");
									$opcoes = $db->expand($sel_opt);
							?>
								<select class="form-control" readonly name="campo[]">
									<option value="<?php echo $line['id_pergunta']; ?>">-- escolha uma opção --</option>									
								</select>

							<?php 
								} else {
							?>		
								<input type="text" class="form-control" readonly name="campo[]" value="<?php echo $line['id_pergunta']; ?>" style="color:transparent;">
							<?php 
								} 
							?>
						</div>

                    </div>
                </li>                
		     <?php
		     		$x++;
		    		}
		        }
		    ?>
		</ol>
	</div>	
	</div>

		

	<div class="col-md-12 mtop-10 mbottom-50">
		<button type="submit" class="btn btn-success waves-effect waves-light btn-block btn-lg">Finalizar</button>
	</div>	



	<a href="edita-formulario/<?php echo $id; ?>/<?php echo normaliza($line['nome']); ?>">
		<div class="retorna-page-bottom"><i class="mdi mdi-share"></i></div>
	</a>


</div>
</form>

<?php require ("../../includes/rodape.php"); ?>
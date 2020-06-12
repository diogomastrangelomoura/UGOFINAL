<?php require ("../../includes/topo_alternativo.php"); ?>

<?php
$sel = $db->select("SELECT * FROM checklists WHERE id_checklist='$id' LIMIT 1");
$line = $db->expand($sel);
?>

<form method="post" action="controlers/configuracoes/salva_ordem_checklist.php">  
<div class="row">
		
	<input type="hidden" name="id_checklist" value="<?php echo $id; ?>">

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
				$sel = $db->select("SELECT check_indi_index.id_indicadores AS perg_id, indicadores.* FROM check_indi_index 
					LEFT JOIN indicadores ON check_indi_index.id_indicadores=indicadores.id_indicador
					WHERE check_indi_index.id_checklist='$id'
					ORDER BY check_indi_index.ordem, indicadores.texto");
        		if($db->rows($sel)){
            		while($line = $db->expand($sel)){
		    ?>
			    <li class="dd-item move" data-id="<?php echo $x; ?>">
                	<div class="dd-handle conferencia">
                    	
                		<div class="form-group">
							<label class="mbottom-10 cursor"><?php echo $line['texto']; ?></label>
						    <?php
								if($line['tipo']=='select'){
									
							?>
								<select class="form-control" readonly name="campo[]">
									<option value="<?php echo $line['id_indicador']; ?>">-- escolha uma opção --</option>									
								</select>

							<?php 
								} else {
							?>		
								<input type="text" class="form-control" readonly name="campo[]" value="<?php echo $line['id_indicador']; ?>" style="color:transparent;">
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



	<a href="perguntas-novo-checklist/<?php echo $id; ?>/<?php echo normaliza($line['nome']); ?>">
		<div class="retorna-page-bottom"><i class="mdi mdi-share"></i></div>
	</a>


</div>
</form>

<?php require ("../../includes/rodape.php"); ?>
<?php require ("../../includes/topo.php"); ?>
		
	

	<?php
		$sel = $db->select("SELECT id_checklist, nome, descricao FROM checklists ORDER BY nome");
        if($db->rows($sel)){
            while($line = $db->expand($sel)){

            	$id_checklist = $line['id_checklist'];
            	$pesq = $db->select("SELECT COUNT(*) AS total FROM realizados WHERE id_checklist='$id_checklist'");
            	$total = $db->expand($pesq);
	?>		
		<div class="col-md-4">
			<a href="lista-checklist/<?php echo $line['id_checklist']; ?>/<?php echo normaliza($line['nome']); ?>" class="color-none">
			<div class="card m-b-30 card-body">
            	<h3 class="card-title font-20 mt-0 mbottom-0"><?php echo $line['nome']; ?></h3>
                <p class="card-text">
                	<?php echo $line['descricao']; ?>
                </p>
                 <p class="card-text">                	
                	<b>Total de efetuados:</b> <?php echo Numeros($total['total']); ?>
                </p>
				
            </div>
        	</a>
        </div>
    <?php    	   
    	   }
        }
    ?>	    

<?php require ("../../includes/rodape.php"); ?>
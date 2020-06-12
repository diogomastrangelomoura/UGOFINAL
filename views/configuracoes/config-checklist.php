<?php require ("../../includes/topo.php"); ?>
		
	<div class="col-md-4">
		<div class="card m-b-30 card-body">
        	<h3 class="card-title font-20 mt-0">Novo Checklist</h3>
            <p class="card-text">Clique aqui para criar um novo checklist.</p>
			<a href="config-novo-checklist" class="btn btn-ugo waves-effect waves-light"><i class="mdi mdi-plus"></i>&nbsp;Criar Checklist</a>
    	</div>
    </div>


	<?php
		$sel = $db->select("SELECT * FROM checklists ORDER BY nome");
        if($db->rows($sel)){
            while($line = $db->expand($sel)){
	?>		
		<div class="col-md-4">
			<div class="card m-b-30 card-body">
            	<h3 class="card-title font-20 mt-0"><?php echo $line['nome']; ?></h3>
                <p class="card-text"><?php echo $line['descricao']; ?></p>

				<a href="edita-checklist/<?php echo $line['id_checklist']; ?>/<?php echo normaliza($line['nome']); ?>" class="btn btn-dark waves-effect waves-light">Editar Checklist</a>
            </div>
        </div>
    <?php    	   
    	   }
        }
    ?>	    

<?php require ("../../includes/rodape.php"); ?>
<?php require ("../../includes/topo.php"); ?>
		
	<div class="col-md-4">
		<div class="card m-b-30 card-body">
        	<h3 class="card-title font-20 mt-0">Novo Formulário</h3>
            <p class="card-text">Clique aqui para criar um novo formulário.</p>
			<a href="config-novo-formulario" class="btn btn-ugo waves-effect waves-light"><i class="mdi mdi-plus"></i>&nbsp;Criar Formulário</a>
    	</div>
    </div>


	<?php
		$sel = $db->select("SELECT * FROM tipo_cadastro ORDER BY nome");
        if($db->rows($sel)){
            while($line = $db->expand($sel)){
	?>		
		<div class="col-md-4">
			<div class="card m-b-30 card-body">
            	<h3 class="card-title font-20 mt-0"><?php echo $line['nome']; ?></h3>
                <p class="card-text"><?php echo $line['descricao']; ?></p>
				<a href="edita-formulario/<?php echo $line['id_tipo']; ?>/<?php echo normaliza($line['nome']); ?>" class="btn btn-dark waves-effect waves-light">Editar Formulário</a>
            </div>
        </div>
    <?php    	   
    	   }
        }
    ?>	    

<?php require ("../../includes/rodape.php"); ?>
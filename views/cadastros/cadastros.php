<?php require ("../../includes/topo.php"); ?>
		

<?php
  $sel = $db->select("SELECT id_tipo, nome, descricao FROM tipo_cadastro ORDER BY nome");
  if($db->rows($sel)){
      while($line = $db->expand($sel)){
  ?>	
		<div class="col-md-4">
			<div class="card m-b-30 card-body">
            	<h3 class="card-title font-20 mt-0"><?php echo $line['nome']; ?></h3>
                <p class="card-text"><?php echo $line['descricao']; ?></p>
                <a href="lista-cadastros/<?php echo $line['id_tipo']; ?>/<?php echo normaliza($line['nome']); ?>" class="btn btn-dark waves-effect waves-light">Cadastrar/Editar</a>
            </div>
        </div>
    <?php    	   
    	   }
        }
    ?>	    

<?php require ("../../includes/rodape.php"); ?>
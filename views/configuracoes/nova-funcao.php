<?php require ("../../includes/topo.php"); ?>
		
<?php
$name = 'Nova Função';
if(isset($id)){
	$sel_objeto = $db->select("SELECT * FROM funcoes WHERE id_funcao='$id' LIMIT 1");
	$line_objeto = $db->expand($sel_objeto);
	$name = $line_objeto['funcao'];	
}
?>  

	<div class="col-md-12">
		<div class="card m-b-20 card-body">			
        	<h4 class="mt-0 h4_topo_exibe">

        		<span class="exibe_nome_editando"><?php echo $name; ?></span>

        		<div class="btn-toolbar pull-right" role="toolbar">            
	            <div class="btn-group">
	            		<button data-return="lista-funcoes" data-title="Deseja excluir o cadastro?" data-text="A ação não poderá ser desfeita." data-id="<?php echo $id; ?>" data-post="controlers/configuracoes/apaga_funcao.php" type="button" class="btn btn-dark waves-light waves-effect apaga-elemento"><i class="fa fa-trash-o"></i></button>
	            </div>
        	</div>

        	</h4> 			

    	</div>
    </div>

<div class="col-md-12">
<form method="post" action="controlers/configuracoes/salva_funcao.php" >

	<input type="hidden" name="id" value="<?php if(isset($id)){echo $id;} else {echo '0';} ?>">

	<div class="row">

		
		<div class="col-md-12">
				
				<div class="card m-b-10">
					<div class="card-body">    
						
						<div class="form-group">
							<label class="mbottom-10">Função/Cargo</label>
							<input type="text" name="funcao" class="form-control nome_editando" required value="<?php if(isset($id)){echo $line_objeto['funcao'];}?>">
						</div>	

						<div class="row">

							
						</div>	
					</div>
				</div>		


				<button type="submit" class="btn btn-success waves-effect waves-light btn-block btn-lg">Salvar</button></a>
				
		</div>
		
	</div>			

</form>	
</div>







<?php require ("../../includes/rodape.php"); ?>
<?php require ("../../includes/topo.php"); ?>
		
<?php
$pesquisas = new PESQUISAS();
$name = 'Nova Unidade';
if(isset($id)){
	$sel_objeto = $db->select("SELECT * FROM unidades WHERE id_unidade='$id' LIMIT 1");
	$line_objeto = $db->expand($sel_objeto);
	$name = $line_objeto['nome'];	
}
?>  




	<div class="col-md-12">
		<div class="card m-b-20 card-body">			
        	<h4 class="mt-0 h4_topo_exibe">

        		<span class="exibe_nome_editando"><?php echo $name; ?></span>

        		<?php if(isset($id)){ ?>	
        		<div class="btn-toolbar pull-right" role="toolbar">            
	            <div class="btn-group">
	            	

	            		<button data-return="unidades-empresas" data-title="Deseja excluir o cadastro?" data-text="A ação não poderá ser desfeita." data-id="<?php echo $id; ?>" data-post="controlers/unidades/apaga_unidades.php" type="button" class="btn btn-dark waves-light waves-effect apaga-elemento"><i class="fa fa-trash-o"></i></button>
	            	

	            </div>
        		</div>
        		<?php } ?>	

        	</h4> 			

        	

    	</div>
    </div>

<div class="col-md-12">
<form method="post" action="controlers/unidades/salva_unidade.php" >

	<input type="hidden" name="id" value="<?php if(isset($id)){echo $id;} else {echo '0';} ?>">

	<div class="row">

		
		<div class="col-md-12">
				
				<div class="card m-b-10">
					<div class="card-body">    
						
						

						<div class="row">

							<div class="col-md-3">
								<div class="form-group">
									<label class="mbottom-10">CNPJ</label>
									<input type="text" name="cnpj" class="form-control  cnpj" required value="<?php if(isset($id)){echo $line_objeto['cnpj'];}?>">
								</div>	
							</div>	

							<div class="col-md-9">
								<div class="form-group">
									<label class="mbottom-10">Razão Social</label>
									<input type="text" name="razao_social" class="form-control" value="<?php if(isset($id)){echo $line_objeto['email'];}?>">
								</div>	
							</div>	

							<div class="col-md-12">
								<div class="form-group">
									<label class="mbottom-10">Nome Fantasia</label>
									<input type="text" name="nome" class="form-control nome_editando" required value="<?php if(isset($id)){echo $line_objeto['nome'];}?>">
								</div>	
							</div>

						

							<div class="col-md-4">
								<div class="form-group">
									<label class="mbottom-10">Contato Responsável</label>
									<input type="text" name="responsavel" class="form-control"  value="<?php if(isset($id)){echo $line_objeto['responsavel'];}?>">
								</div>	
							</div>

							<div class="col-md-4">
								<div class="form-group">
									<label class="mbottom-10">Telefone</label>
									<input type="text" name="telefone" class="form-control"  value="<?php if(isset($id)){echo $line_objeto['telefone'];}?>">
								</div>	
							</div>

							<div class="col-md-4">
								<div class="form-group">
									<label class="mbottom-10">E-mail</label>
									<input type="text" name="email" class="form-control"  value="<?php if(isset($id)){echo $line_objeto['email'];}?>">
								</div>	
							</div>

							<div class="col-md-5">
								<div class="form-group">
									<label class="mbottom-10">Endereço</label>
									<input type="text" name="endereco" class="form-control"  value="<?php if(isset($id)){echo $line_objeto['endereco'];}?>">
								</div>	
							</div>

							<div class="col-md-2">
								<div class="form-group">
									<label class="mbottom-10">Bairro</label>
									<input type="text" name="bairro" class="form-control"  value="<?php if(isset($id)){echo $line_objeto['bairro'];}?>">
								</div>	
							</div>

							<div class="col-md-3">
								<div class="form-group">
									<label class="mbottom-10">Cidade</label>
									<input type="text" name="cidade" class="form-control"  value="<?php if(isset($id)){echo $line_objeto['cidade'];}?>">
								</div>	
							</div>

							<div class="col-md-2">
								<div class="form-group">
									<label class="mbottom-10">UF</label>
									<select name="estado" class="form-control">
										<?php 
											if(isset($id)){
												echo $pesquisas->EstadosBrasil($line_objeto['estado']);	
											} else {
												echo $pesquisas->EstadosBrasil();
											}
										?>
									</select>	
								</div>	
							</div>

							

						</div>	


					</div>
				</div>		


				<button type="submit" class="btn btn-success waves-effect waves-light btn-block btn-lg">Salvar</button></a>
				
		</div>
		
	</div>			

</form>	
</div>







<?php require ("../../includes/rodape.php"); ?>
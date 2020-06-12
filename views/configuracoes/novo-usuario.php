<?php require ("../../includes/topo.php"); ?>
		
<?php
$name = 'Novo Usuário';
if(isset($id)){
	$sel_objeto = $db->select("SELECT * FROM usuarios WHERE id_usuario='$id' LIMIT 1");
	$line_objeto = $db->expand($sel_objeto);
	$name = $line_objeto['nome'];	
}
?>  

	<div class="col-md-12">
		<div class="card m-b-20 card-body">			
        	<h4 class="mt-0 h4_topo_exibe">

        		<span class="exibe_nome_editando"><?php echo $name; ?></span>

        		<div class="btn-toolbar pull-right" role="toolbar">            
	            <div class="btn-group">
	            		<button data-return="usuarios-sistema" data-title="Deseja excluir o cadastro?" data-text="A ação não poderá ser desfeita." data-id="<?php echo $id; ?>" data-post="controlers/configuracoes/apaga_usuario.php" type="button" class="btn btn-dark waves-light waves-effect apaga-elemento"><i class="fa fa-trash-o"></i></button>
	            </div>
        	</div>

        	</h4> 			

    	</div>
    </div>

<div class="col-md-12">
<form method="post" action="controlers/configuracoes/salva_usuario.php" enctype="multipart/form-data">

	<input type="hidden" name="id" value="<?php if(isset($id)){echo $id;} else {echo '0';} ?>">

	<div class="row">

		
		<div class="col-md-12">
				
				<div class="card m-b-10">
					<div class="card-body">    
						
						<div class="form-group">
							<label class="mbottom-10">Nome</label>
							<input type="text" name="nome" class="form-control nome_editando" required value="<?php if(isset($id)){echo $line_objeto['nome'];}?>">
						</div>	

						<div class="row">

							<div class="col-md-8">
								<div class="form-group">
									<label class="mbottom-10">E-mail</label>
									<input type="text" name="email" class="form-control" required value="<?php if(isset($id)){echo $line_objeto['email'];}?>">
								</div>	
							</div>	

							<div class="col-md-4">
								<div class="form-group">
									<label class="mbottom-10">Telefone</label>
									<input type="text" name="telefone" class="form-control" required value="<?php if(isset($id)){echo $line_objeto['telefone'];}?>">
								</div>	
							</div>

							<div class="col-md-4">
								<div class="form-group">
									<label class="mbottom-10">Função</label>
									<select class="form-control" name="funcao">
										
										<?php
											
											if(isset($id)){
												$id_funcao = $line_objeto['id_funcao'];
												$sel = $db->select("SELECT * FROM funcoes WHERE id_funcao='$id_funcao' LIMIT 1");
												$ln = $db->expand($sel);
												echo '<option value="'.$ln['id_funcao'].'" selected>'.$ln['funcao'].'</option>';
											} else {
												$id_funcao = 0;
												echo '<option value="">-- escolha --</option>';
											}

											$sel = $db->select("SELECT * FROM funcoes WHERE id_funcao!='$id_funcao' ORDER BY funcao");
											while($ln = $db->expand($sel)){
												echo '<option value="'.$ln['id_funcao'].'">'.$ln['funcao'].'</option>';
											}
										?>	
									</select>
								</div>	
							</div>

							<div class="col-md-4">
								<div class="form-group">
									<label class="mbottom-10">Usuário</label>
									<input type="text" name="usuario" class="form-control" required value="<?php if(isset($id)){echo $line_objeto['usuario'];}?>">
								</div>	
							</div>

							<div class="col-md-4">
								<div class="form-group">
									<label class="mbottom-10">Senha</label>
									<input type="password" name="senha" class="form-control" required value="<?php if(isset($id)){echo $line_objeto['senha'];}?>">
								</div>	
							</div>

							<div class="col-md-8">
								<div class="form-group">
									<label class="mbottom-10">Skype</label>
									<input type="text" name="skype" class="form-control" required value="<?php if(isset($id)){echo $line_objeto['skype'];}?>">
								</div>	
							</div>

							<div class="col-md-4">
								<div class="form-group">
									<label class="mbottom-10">WhatsApp</label>
									<input type="text" name="whats" class="form-control" required value="<?php if(isset($id)){echo $line_objeto['whats'];}?>">
								</div>	
							</div>
							
							<div class="card-body">
                  <input name="img_funcionario" type="file" class="filestyle" data-input="false" data-buttonname="btn-ugo-border">                    	
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
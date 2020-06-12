<?php require ("../../includes/topo.php"); ?>


<?php

$sel = $db->select("SELECT usuarios.*, funcoes.funcao FROM usuarios 
    LEFT JOIN funcoes ON usuarios.id_funcao=funcoes.id_funcao
    WHERE usuarios.id_usuario='$id_usuario_ugo' 
    LIMIT 1");
$line = $db->expand($sel);
?>  

	
					<div class="col-lg-4">
                          <div class="card m-b-30">
                                        
                                        <div class="card-body">
                                        
                                            <h4 class="card-title font-20 mtop-20"><?php echo $line['nome']; ?></h4>
                                            <p class="card-text"><?php echo $line['funcao']; ?></p>
                                        </div>
                                        <ul class="list-group list-group-flush m-b-20">
                                            <li class="list-group-item"><b>E-mail:</b> <?php echo $line['email']; ?></li>
                                            <li class="list-group-item"><b>Cadastrado em:</b> <?php echo data_exibe($line['data_cadastro']); ?></li>
                                        </ul>
                                        
                                    </div>
                    </div>




          <div class="col-lg-8">                      	
          	<form method="post" action="controlers/configuracoes/salva_usuario.php" >     

                <input type="hidden" name="id" value="<?php echo $id_usuario_ugo; ?>">
                <input type="hidden" name="redirect" value="1">
  

          		<div class="card m-b-20">
                                        <div class="card-body">
            
                                           
                                            <!-- Nav tabs -->
                                            <ul class="nav nav-tabs" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" data-toggle="tab" href="#home" role="tab">Dados Principais</a>
                                                </li>
                                                
                                            </ul>
            
                                            <!-- Tab panes -->
                                            <div class="tab-content">
                                                <div class="tab-pane active p-3" id="home" role="tabpanel">
                                                    
                                                    <div class="row">	

                                                		<div class="col-md-12">
                                                			<div class="form-group">
																<label>Nome</label>
															    <input type="text" class="form-control" name="nome" value="<?php echo $line['nome']; ?>" required>
															</div>
                                                		</div>

                                                		<div class="col-md-12">
                                                			<div class="form-group">
																<label>E-mail</label>
															    <input type="text" class="form-control" name="email" value="<?php echo $line['email']; ?>" required>
															</div>
                                                		</div>

                                                		<div class="col-md-12">
                                                			<div class="form-group">
																<label>Cargo</label>
															    <select class="form-control" name="funcao" required>
															    	<?php
                                            
                                                                            $id_funcao = $line['id_funcao'];
                                                                            $sel = $db->select("SELECT * FROM funcoes WHERE id_funcao='$id_funcao' LIMIT 1");
                                                                            $ln = $db->expand($sel);
                                                                            echo '<option value="'.$ln['id_funcao'].'" selected>'.$ln['funcao'].'</option>';
                                                                        
                                                                            $sel = $db->select("SELECT * FROM funcoes WHERE id_funcao!='$id_funcao' ORDER BY funcao");
                                                                            while($ln = $db->expand($sel)){
                                                                                echo '<option value="'.$ln['id_funcao'].'">'.$ln['funcao'].'</option>';
                                                                            }
                                                                    ?>
															    </select>	
															</div>
                                                		</div>

                                                		<div class="col-md-6">
                                                			<div class="form-group">
																<label>Usuário</label>
															    <input type="text" required class="form-control" name="usuario" value="<?php echo $line['usuario']; ?>">
															</div>
                                                		</div>	

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Senha</label>
                                                                <input type="password" required class="form-control" name="senha" value="<?php echo $line['senha']; ?>">
                                                            </div>
                                                        </div>  

                                                		

                                                		<div class="col-md-12">
                                                			<button type="submit" class="btn btn-success waves-effect waves-light btn-block mtop-10">Salvar</button>
                                                		</div>	

													</div>

                                                </div>
                                                
                                            </div>
            
                                        </div>
                                    </div>

			</form>                                    
          </div>	


<?php require ("../../includes/rodape.php"); ?>                                
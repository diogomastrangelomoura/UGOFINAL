<?php require ("../../includes/topo.php"); ?>

	<div class="col-12">



		<div class="btn-toolbar" role="toolbar">
            
			 <div class="btn-group ml-1">
            	
            	<a href="nova-os" ><button type="button" class="btn btn-dark waves-light waves-effect"><i class="mdi mdi-plus"></i> Nova OS</button></a>
            </div>
                        
            <div class="btn-group ml-1">
            	<button type="button" class="btn btn-ugo waves-light waves-effect dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                Ações	
                </button>
                    <div class="dropdown-menu">                    	
                        <a class="dropdown-item" href="#"><i class="mdi mdi-printer"></i>&nbsp;Imprimir OS</a>
                        
                        <a class="dropdown-item apaga-elemento" href="javascript:void(0);" data-return="ordens-servico" data-title="Deseja excluir as OS?" data-text="A ação não poderá ser desfeita." data-id="0" data-post="controlers/os/apaga_os.php">
                            <i class="mdi mdi-delete"></i>&nbsp;Excluir OS
                        </a>

                        <a class="dropdown-item" href="#"><i class="mdi mdi-table-large"></i>&nbsp;Exportar Excel</a>
                    </div>
            </div>
        </div>




       	<div class="card m-b-20 mtop-20">
                                        <div class="card-body">
            									
                                            <h4 class="mt-0 header-title">Ordens de Serviço em Aberto</h4>
                                            
            
                                            <div class="table-rep-plugin mtop-20">
                                                <div class="table-responsive b-0" data-pattern="priority-columns">
                                                    <table id="tech-companies-1" class="table  table-striped">
                                                        <thead>
                                                        <tr>
                                                            <th width="35">
                                                            	<label class="container_checkbox">
																  <input  type="checkbox" class="select-checkbox-all" name="">
																  <span class="checkmark"></span>
																</label>
                                                            </th>
                                                            <th>ID</th>
                                                            <th data-priority="1">Data Criação</th>
                                                            <th data-priority="3">Título</th>
                                                            <th data-priority="3">Criador</th>
                                                            <th data-priority="3" width="20"></th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>

                                                        <?php
                                                            $sel = $db->select("SELECT os.id_os, os.titulo, os.data_criacao,
                                                            usuarios.nome 	
				                                            FROM os
				                                            LEFT JOIN usuarios ON os.id_criador=usuarios.id_usuario
															ORDER BY id_os DESC							                                            
				                                            ");
                                                            if($db->rows($sel)){
                                                                while($line = $db->expand($sel)){
                                                        ?>  	
                                                        <tr>
                                                            <th>
                                                            	<label class="container_checkbox">
																  <input  type="checkbox" class="select-checkbox" name="ids" value="<?php echo $line['id_os']; ?>">
																  <span class="checkmark"></span>
																</label>
                                                            </th>
                                                            
                                                            <th><?php echo $line['id_os']; ?></th>
                                                            <th><?php echo data_exibe($line['data_criacao']); ?></th>                                                            
                                                            <th><?php echo trataVazio($line['titulo']); ?></th>
                                                            <th><?php echo trataVazio($line['nome']); ?></th>
                                                            <th>
                                                            	<a href="verifica-os/<?php echo $line['id_os']; ?>">
                                                                    <button type="button" class="btn btn-ugo btn-sm waves-effect"><i class="dripicons-article"></i></button>
                                                                </a>    
                                                        	</th>
                                                        </tr>
                                                        <?php         
                                                               }
                                                            } else {
                                                        ?>

                                                           <tr>
                                                             <th colspan="20"><center>Nenhuma os em aberto.</center></th> 
                                                           </tr>


                                                        <?php         
                                                          }
                                                        ?>
                                                        
                                                        </tbody>
                                                    </table>
                                                </div>
            
                                            </div>
            
                                        </div>
                                    </div>

                                    
                                </div> 


<?php require ("../../includes/rodape.php"); ?>                                
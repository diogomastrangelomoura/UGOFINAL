<?php require ("../../includes/topo.php"); ?>
	
<?php
$info['nome'] = 'Últimos Checklists Realizados';
$query = '';

if(isset($id)){
$sel = $db->select("SELECT * FROM checklists WHERE id_checklist='$id' LIMIT 1");
$info = $db->expand($sel);
$query = " AND realizados.id_checklist='$id'";
} 
?>  


	<div class="col-12">



		<div class="btn-toolbar" role="toolbar">
            

            <div class="btn-group ml-1">
            	
            	<a href="javascript:void(0)" class="button-new-checklist"><button type="button" class="btn btn-dark waves-light waves-effect"><i class="mdi mdi-plus"></i> Realizar Checklist</button></a>
            </div>
                                           
            <div class="btn-group ml-1">
            	<button type="button" class="btn btn-ugo waves-light waves-effect dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                Ações	
                </button>
                    <div class="dropdown-menu">                    	
                        <a class="dropdown-item" href="#"><i class="mdi mdi-printer"></i>&nbsp;Imprimir Checklist(s)</a>
                        
                        <a class="dropdown-item apaga-elemento" href="javascript:void(0);" data-return="lista-checklist" data-title="Deseja excluir os checklists?" data-text="A ação não poderá ser desfeita." data-id="0" data-post="controlers/checklist/apaga_checklists_respondidos.php">
                            <i class="mdi mdi-delete"></i>&nbsp;Excluir Checklist(s)
                        </a>

                        <a class="dropdown-item" href="#"><i class="mdi mdi-table-large"></i>&nbsp;Exportar Excel</a>
                    </div>
            </div>
        </div>




       	<div class="card m-b-20 mtop-20">
                                        <div class="card-body">
            									
                                            <h4 class="mt-0 header-title"><?php echo $info['nome']; ?></h4>
                                            
            
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
                                                            <th data-priority="3">Checklist</th>
                                                            <th data-priority="3">Objeto</th>
                                                            <th data-priority="3" width="20"></th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>

                                                        <?php
                                                            $sel = $db->select("SELECT realizados.id_realizado, realizados.data_criacao,
				                                            checklists.nome, objetos.nome AS nome_objeto
				                                            FROM realizados
				                                            LEFT JOIN checklists ON realizados.id_checklist=checklists.id_checklist  
				                                            LEFT JOIN objetos ON realizados.id_objeto=objetos.id_objeto
				                                            WHERE realizados.id_realizado!=0 $query
				                                            ORDER BY realizados.data_criacao DESC
				                                            LIMIT 20
				                                            ");
                                                            if($db->rows($sel)){
                                                                while($line = $db->expand($sel)){
                                                        ?>  	
                                                        <tr>
                                                            <th>
                                                            	<label class="container_checkbox">
																  <input  type="checkbox" class="select-checkbox" name="ids" value="<?php echo $line['id_realizado']; ?>">
																  <span class="checkmark"></span>
																</label>
                                                            </th>
                                                            
                                                            <th><?php echo $line['id_realizado']; ?></th>
                                                            <th><?php echo data_exibe($line['data_criacao']); ?></th>                                                            
                                                            <th><?php echo trataVazio($line['nome']); ?></th>
                                                            <th><?php echo trataVazio($line['nome_objeto']); ?></th>
                                                            <th>
                                                            	<a href="verifica-checklist/<?php echo $line['id_realizado']; ?>">
                                                                    <button type="button" class="btn btn-ugo btn-sm waves-effect"><i class="mdi mdi-format-list-bulleted"></i></button>
                                                                </a>    
                                                        	</th>
                                                        </tr>
                                                        <?php         
                                                               }
                                                            } else {
                                                        ?>

                                                           <tr>
                                                             <th colspan="20"><center>Nenhum checklist realizado.</center></th> 
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
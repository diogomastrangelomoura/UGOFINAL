<?php 
require ("../../includes/topo_alternativo.php"); 
$pesquisas = new PESQUISAS();
$sel = $db->select("SELECT id_objeto FROM os WHERE id_os='$id' LIMIT 1");
$line = $db->expand($sel);
$id_objeto = $line['id_objeto'];
?>


<div class="row justify-content-md-center">

        <div class="col-md-7">

            
            <div class="card m-b-20 card-body">         
                <h4 class="mt-0 h4_topo_exibe">Ordem de Serviço: #<?php echo $id; ?></h4>             
            </div>

    		<div class="card m-b-20 card-body">
                <form method="post" action="controlers/os/salva_imagens_checklist.php" enctype="multipart/form-data">  
                
                <input type="hidden" name="id_os" value="<?php if(isset($id)){echo $id;} else {echo '0';}?>" >
                    
                <div class="row">    
            	   
                   <div class="col-md-4">      
                        <h4 class="mt-0 header-title">Prioridade</h4>     			
    			        <select class="form-control form-control-lg" name="prioridade">
                            <option value="">--escolha--</option>         
                            <option value="2">Alta</option>         
                            <option value="1">Média</option>         
                            <option value="0">Baixa</option>         
                        </select>
                    </div>    

                    <div class="col-md-8">      
                        <h4 class="mt-0 header-title">Objeto</h4>               
                        <select class="form-control form-control-lg select2" name="id_objeto">
                            <?php echo $pesquisas->SelectObjetos($id_objeto); ?>
                        </select>                                                            
                    </div>    

                    <div class="col-md-12 mtop-20">      
                        <h4 class="mt-0 header-title">Setor Responsável</h4>               
                        <select class="form-control form-control-lg" name="setor">
                            <option value="0">--escolha--</option>         
                                
                        </select>
                    </div> 
                    
                    <div class="col-md-12 mtop-20">  
                        <h4 class="mt-0 header-title">Adicione até 3 imagens</h4>               
                        <input type="file" name="imagem1" class="form-control">
                        <input type="file" name="imagem2" class="form-control mtop-10">
                        <input type="file" name="imagem3" class="form-control mtop-10">
                    </div>    

                    <div class="col-md-12 mtop-20">      
                        <button type="submit" class="btn btn-block btn-success btn-lg">Finalizar</button>
                    </div>    
                              
    		    </div>


                </form>  	  			
        	</div>

        </div>    



</div>




<?php require ("../../includes/rodape.php"); ?>
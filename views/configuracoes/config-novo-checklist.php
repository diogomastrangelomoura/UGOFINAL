<?php require ("../../includes/topo_alternativo.php"); ?>
<?php require ("clones/clones-checklist.php"); ?>

<?php
if(isset($id)){
    $sel = $db->select("SELECT * FROM checklists WHERE id_checklist='$id' LIMIT 1");
    $line = $db->expand($sel);
    $name = $line['nome'];
}
?>

<div class="row justify-content-md-center">

        <div class="col-md-7">
    		<div class="card m-b-20 card-body">
                <form method="post" action="controlers/configuracoes/salva_checklist.php"> 
                
                <input type="hidden" name="id_checklist" value="<?php if(isset($id)){echo $id;} else {echo '0';}?>" >
                    
                <div class="row">    
            	   
                   <div class="col-md-12">      
                        <h4 class="mt-0 header-title">Nome do Checklist</h4>     			
    			        <input type="text" class="form-control form-control-lg" placeholder="Título" name="titulo" required value="<?php if(isset($id)){echo $line['nome'];}?>">
                    </div>    

                    <div class="col-md-12 mtop-20">      
                        <h4 class="mt-0 header-title">Descrição do Checklist</h4>               
                        <input type="text" class="form-control form-control-lg" placeholder="Descrição" name="descricao" required value="<?php if(isset($id)){echo $line['descricao'];}?>">
                    </div>

                    <div class="col-md-12 mtop-20">      
                        
                            <h4 class="mt-0 header-title"> O Checklist será capaz de bloquear a operação de um equipamento?</h4> 
                            <input <?php if(isset($id)){ if($line['bloqueia_objeto']==1){ echo 'checked';}}?> type="checkbox" name="bloqueia_objeto" value="1" id="switch1"  switch="none" />
                            <label for="switch1" data-on-label="Sim" data-off-label="Não"></label>
                           
                          
                        
                    </div>

                    <div class="col-md-12 mtop-20">      
                        <button type="submit" class="btn btn-block btn-success btn-lg">Avançar</button>
                    </div>    

                    <?php if(isset($id)){ ?>
                        <div class="col-md-12 text-center mtop-10">    
                            <hr>  
                            <a href="checklist-objetos/<?php echo $id; ?>/<?php echo normaliza($line['nome']); ?>">
                                <button type="button" class="btn btn-ugo ">Destinar Checklist para Formulários</button>
                            </a>
                        </div>    
                    <?php } ?>     
                              
    		    </div>


                </form>  	  			
        	</div>

        </div>    



</div>



<?php if(isset($id)){ ?>

<a href="javascript:void(0);" class="apaga-elemento" data-return="config-checklist" data-title="Deseja excluir o checklist?" data-text="A ação não poderá ser desfeita" data-id="<?php echo $id; ?>" data-post="controlers/configuracoes/apaga_checklist.php">
    <div class="exclui-page-bottom" data-toggle="tooltip" data-placement="top" title="Excluir Checklist"><i class="mdi mdi-delete-forever"></i></div>
</a>

<?php } ?>	

<?php require ("../../includes/rodape.php"); ?>
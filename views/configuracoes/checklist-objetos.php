<?php require ("../../includes/topo_alternativo.php"); ?>
<?php require ("clones/clones-checklist.php"); ?>

<?php
if(isset($id)){
    $sel = $db->select("SELECT * FROM checklists WHERE id_checklist='$id' LIMIT 1");
    $line = $db->expand($sel);
    $name = $line['nome'];
}
?>


<form method="post" action="controlers/configuracoes/salva_checklists_formularios.php">
<div class="row justify-content-md-center">

     <input type="hidden" name="id_checklist" value="<?php echo $id; ?>" >     

	<div class="col-md-8">
		<div class="card m-b-20 card-body" style="width: 100%">        	
 			<div class="row">
                <div class="col-md-12">
                    <h4 class="mt-0 h4_topo_exibe"><?php if(isset($id)){echo $line['nome'];}?></h4>
                </div>    
                   
            </div>    
    	</div>
    </div>






   <div class="col-lg-8">
        <div class="card m-b-20">
            <div class="card-body">
            
                <h4 class="mt-0 header-title">Formulários Alocados ao Checklist</h4>
                    
                    <div class="custom-dd dd">
                        <ol class="dd-list">
                            <?php
                                $x=1;
                                $sel = $db->select("SELECT * FROM tipo_cadastro ORDER BY nome");
                                if($db->rows($sel)){
                                    while($line = $db->expand($sel)){

                                    $id_tipo = $line['id_tipo'];    
                                    $check='';
                                    if(isset($id)){

                                        $verifica_pergunta = $db->select("SELECT id_tipo FROM check_tipo_index WHERE id_checklist='$id' AND id_tipo='$id_tipo' LIMIT 1");
                                        if($db->rows($verifica_pergunta)){
                                            $check = 'checked';
                                        } else {
                                            $check='';
                                        }

                                    }    
                            ?>
                            <li class="dd-item" data-id="1">
                                <div class="dd-handle">                                 
                                    <input type="checkbox" name="formularios[]" value="<?php echo $line['id_tipo']; ?>" id="switch<?php echo $line['id_tipo']; ?>" <?php echo $check; ?>  switch="none"/>
                                    <label for="switch<?php echo $line['id_tipo']; ?>" data-on-label="Sim" data-off-label="Não"></label>
                                    <a href="javascript:void(0)"><?php echo $line['nome']; ?></a>
                                   
                                </div>

                                   
                            </li>
                            <?php
                                   $x++;
                                   }
                                } else {

                                    echo '<li>';
                                        echo 'Nenhum formulário cencontrado.';
                                    echo '</li>';

                                }
                            ?>
                        </ol>
                    </div>
            
            </div>
        </div>
    </div> 


    <div class="col-md-8">      
                        <button type="submit" class="btn btn-block btn-success btn-lg">Salvar</button>
                    </div>



</div>
</form>



<a href="edita-checklist/<?php echo $id; ?>/<?php echo normaliza($line['nome']); ?>">
        <div class="retorna-page-bottom"><i class="mdi mdi-share"></i></div>
    </a>


<?php require ("../../includes/rodape.php"); ?>
<?php require ("../../includes/topo_alternativo.php"); ?>
<?php require ("clones/clones-checklist.php"); ?>

<?php
if(isset($id)){
    $sel = $db->select("SELECT * FROM checklists WHERE id_checklist='$id' LIMIT 1");
    $line = $db->expand($sel);
    $name = $line['nome'];
}
?>


<form method="post" action="controlers/configuracoes/salva_perguntas_checklist.php">
<div class="row">

     <input type="hidden" name="id_checklist" value="<?php if(isset($id)){echo $id;} else {echo '0';}?>" >
     <input type="hidden" name="titulo" value="<?php if(isset($id)){echo $line['nome'];} ?>" >

	<div class="col-md-12">
		<div class="card m-b-20 card-body" style="width: 100%">        	
 			<div class="row">
                <div class="col-md-9">
                    <h4 class="mt-0 h4_topo_exibe"><?php if(isset($id)){echo $line['nome'];}?></h4>
                </div>    
                <div class="col-md-3 text-right">
                    <button type="submit" class="btn btn-success btn-lg">Avançar</button>
                </div>    
            </div>    
    	</div>
    </div>



    <div class="col-md-7">

        <div class="row">
            <div class="col-md-12 m-b-10">
                <button type="button" class="btn btn-ugo waves-effect waves-light btn_novo_campo btn-block btn-lg"><i class="mdi mdi-plus"></i> Novo Indicador</button> 
            </div>  

            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-10 mtop-5">
                        <span class="text-muted">
                            Deseja utilizar respostas padrões para os indicadores de múltipla escolha?
                            <a href="javascript:void(0);" data-toggle="modal" data-target=".ModalExemploChecklistOptions">&nbsp;<i class="mdi mdi-information"></i></a>
                        </span>
                    </div>
                    <div class="col-md-2 mtop-5 text-right">
                        <input type="checkbox" id="opcoes_padrao" value="1"   switch="none" />
                        <label for="opcoes_padrao" data-on-label="Sim" data-off-label="Não"></label>    
                    </div>    
                </div>  
                <hr>                                  
            </div>    
        </div>

        <div class="create-clone"></div>

        <div class="row esconde-info">
            <div class="col-md-12 mtop-30 text-center"><p class="text-muted">Utilize o botão acima para criar indicadores para o checklist.</p></div>    
        </div>    
            
    </div>


   <div class="col-lg-5">
        <div class="card m-b-20">
            <div class="card-body">
            
                <h4 class="mt-0 header-title">Utilizar indicadores já cadastrados</h4>
                    
                    <div class="custom-dd dd">
                        <ol class="dd-list">
                            <?php
                                $x=1;
                                $sel = $db->select("SELECT * FROM indicadores ORDER BY texto");
                                if($db->rows($sel)){
                                    while($line = $db->expand($sel)){

                                    $id_indicador = $line['id_indicador'];    
                                    $check='';
                                    if(isset($id)){

                                        $verifica_pergunta = $db->select("SELECT ordem FROM check_indi_index WHERE id_indicadores='$id_indicador' AND id_checklist='$id' LIMIT 1");
                                        if($db->rows($verifica_pergunta)){
                                            $check = 'checked';
                                        } else {
                                            $check='';
                                        }

                                    }    
                            ?>
                            <li class="dd-item" data-id="1">
                                <div class="dd-handle">                                 
                                    <input type="checkbox" name="perguntas_prontas[]" value="<?php echo $line['id_indicador']; ?>" id="switch<?php echo $line['id_indicador']; ?>" <?php echo $check; ?>  switch="none"/>
                                    <label for="switch<?php echo $line['id_indicador']; ?>" data-on-label="Sim" data-off-label="Não"></label>
                                    <?php if($line['tipo']=='select'){ ?>
                                        <a href="javascript:void(0)" data-toggle="collapse" data-target="#collapse<?php echo $line['id_indicador']; ?>" aria-expanded="false" aria-controls="collapse<?php echo $line['id_indicador']; ?>"><?php echo $line['texto']; ?>
                                            <span><i class="mdi mdi-swap-vertical"></i></span>
                                        </a>
                                    <?php } else { ?>    
                                        <a href="javascript:void(0)"><?php echo $line['texto']; ?></a>
                                    <?php } ?>            
                                </div>

                                    <?php
                                        if($line['tipo']=='select'){ 
                                        $id_opcao = $line['id_multi'];

                                        $sel_opt = $db->select("SELECT escolhas FROM multipla_escolha WHERE id_multi='$id_opcao' LIMIT 1");
                                        $opcoes = $db->expand($sel_opt);    
                                    ?>
                                        <div class="collapse" id="collapse<?php echo $line['id_indicador']; ?>">                                         
                                            <ol class="dd-list">
                                                <?php
                                                    $ex = explode(',', $opcoes['escolhas']);
                                                    $x=0;
                                                    $y=1;
                                                    while($y<=count($ex)){
                                                        echo '
                                                            <li class="dd-item" data-id="1">
                                                                <div class="dd-handle">                                 
                                                                    <span>'.$ex[$x].'</span>
                                                                </div>
                                                            </li>  
                                                        ';
                                                        $x++;
                                                        $y++;
                                                    }
                                                ?>                                                                  
                                            </ol>

                                        </div>
                                    <?php } ?>    
                            </li>
                            <?php
                                   $x++;
                                   }
                                } else {

                                    echo '<li>';
                                        echo 'Nenhum indicador cadastrado.';
                                    echo '</li>';

                                }
                            ?>
                        </ol>
                    </div>
            
            </div>
        </div>
    </div> 





</div>
</form>



<a href="edita-checklist/<?php echo $id; ?>/<?php echo normaliza($line['nome']); ?>">
        <div class="retorna-page-bottom"><i class="mdi mdi-share"></i></div>
    </a>


<?php require ("../../includes/rodape.php"); ?>
<?php require ("../../includes/topo_alternativo.php"); ?>
<?php require ("clones/clones.php"); ?>

<?php
if(isset($id)){
    $sel = $db->select("SELECT * FROM tipo_cadastro WHERE id_tipo='$id' LIMIT 1");
    $line = $db->expand($sel);
    $name = $line['nome'];
}
?>


<form method="post" action="controlers/configuracoes/salva_formulario.php">

     <input type="hidden" name="id_formulario" value="<?php if(isset($id)){echo $id;} else {echo '0';}?>" >

<div class="row">    

	<div class="col-md-12">
		<div class="card m-b-20 card-body">
        	<h4 class="mt-0 header-title">Nome do Formulário</h4>
 			<div class="input-group mb-3">
			  <input type="text" class="form-control form-control-lg" placeholder="Título" name="titulo" required value="<?php if(isset($id)){echo $line['nome'];}?>">
              <input type="text" class="form-control form-control-lg" placeholder="Descrição" name="descricao" required value="<?php if(isset($id)){echo $line['descricao'];}?>" >
			  <div class="input-group-append">
			    <button type="submit" class="btn btn-success btn-lg">Avançar</button>
			  </div>
			</div>
    	</div>
    </div>
    


    <div class="col-md-7">

    	<div class="row">
			<div class="col-md-12 m-b-10">
				<button type="button" class="btn btn-ugo waves-effect waves-light btn_novo_campo btn-block btn-lg"><i class="mdi mdi-plus"></i> Novo Campo</button>	
			</div>	
		</div>

		<div class="create-clone"></div>

        <div class="row esconde-info">
            <div class="col-md-12 mtop-30 text-center"><p class="text-muted">Utilize o botão acima para criar campos para o formulário.</p></div>

            <div class="col-md-12"> 
                <div class="alert alert-danger text-center">
                   <i class="mdi mdi-alert"></i> Não é necessário criar os campos <b>NOME</b> e <b>IMAGEM</b>, pois já são padrões do formulário.
                </div>   
            </div>    
        </div>    
			
    </div>


    <div class="col-lg-5">
		<div class="card m-b-20">
        	<div class="card-body">
            
            	<h4 class="mt-0 header-title">Utilizar campos já cadastrados</h4>
                	
            		<div class="custom-dd dd">
                    	<ol class="dd-list">
                    		<?php
                                $x=1;
                                $sel = $db->select("SELECT * FROM perguntas ORDER BY nome");
                                if($db->rows($sel)){
                                    while($line = $db->expand($sel)){

                                    $id_pergunta = $line['id_pergunta'];    
                                    $check='';
                                    if(isset($id)){

                                        $verifica_pergunta = $db->select("SELECT ordem FROM perg_tipo_index WHERE id_pergunta='$id_pergunta' AND id_tipo='$id' LIMIT 1");
                                        if($db->rows($verifica_pergunta)){
                                            $check = 'checked';
                                        } else {
                                            $check='';
                                        }

                                    }    
                            ?>
                        	<li class="dd-item" data-id="1">
                            	<div class="dd-handle">                                	
                                	<input type="checkbox" name="perguntas_prontas[]" value="<?php echo $line['id_pergunta']; ?>" id="switch<?php echo $line['id_pergunta']; ?>" <?php echo $check; ?>  switch="none"/>
                                    <label for="switch<?php echo $line['id_pergunta']; ?>" data-on-label="Sim" data-off-label="Não"></label>
                                    <?php if($line['tipo']=='select'){ ?>
                                        <a href="javascript:void(0)" data-toggle="collapse" data-target="#collapse<?php echo $line['id_pergunta']; ?>" aria-expanded="false" aria-controls="collapse<?php echo $line['id_pergunta']; ?>"><?php echo $line['nome']; ?>
                                        	<span><i class="mdi mdi-swap-vertical"></i></span>
                                        </a>
                                    <?php } else { ?>    
                                        <a href="javascript:void(0)"><?php echo $line['nome']; ?></a>
                                    <?php } ?>            
                                </div>

                                    <?php
                                        if($line['tipo']=='select'){ 
                                        $id_opcao = $line['id_opcao'];

                                        $sel_opt = $db->select("SELECT opcoes FROM opcoes WHERE id_opcao='$id_opcao' LIMIT 1");
                                        $opcoes = $db->expand($sel_opt);    
                                    ?>
    									<div class="collapse" id="collapse<?php echo $line['id_pergunta']; ?>">											
    		                                <ol class="dd-list">
    				                    		<?php
                                                    $ex = explode(',', $opcoes['opcoes']);
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


<?php if(isset($id)){ ?>

<a href="javascript:void(0);" class="apaga-elemento" data-return="config-formularios" data-title="Deseja excluir o formulário?" data-text="Todos os objetos cadastrados deste formulário serão apagados." data-id="<?php echo $id; ?>" data-post="controlers/configuracoes/apaga_formulario.php">
    <div class="exclui-page-bottom" data-toggle="tooltip" data-placement="top" title="Excluir formulário"><i class="mdi mdi-delete-forever"></i></div>
</a>

<?php } ?>	

<?php require ("../../includes/rodape.php"); ?>
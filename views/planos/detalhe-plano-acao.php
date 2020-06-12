<?php require ("../../includes/topo.php"); ?>

<?php

$sel = $db->select("SELECT plano_de_acao.*, respostas_checklists.indicador, respostas_checklists.resposta, realizados.id_usuario, realizados.data_criacao, usuarios.nome, tipo_status.nome_status, tipo_status.obs, tipo_status.color 
  FROM plano_de_acao 
  LEFT JOIN respostas_checklists ON respostas_checklists.id_plano=plano_de_acao.id_plano 
  LEFT JOIN realizados ON realizados.id_realizado=respostas_checklists.id_realizado 
  LEFT JOIN usuarios ON realizados.id_usuario=usuarios.id_usuario 
  LEFT JOIN tipo_status ON plano_de_acao.status=tipo_status.id_status 
  WHERE plano_de_acao.id_plano='$id' 
  LIMIT 1");
$line = $db->expand($sel);

?>

	<div class="col-md-12">

		<div class="card m-b-20 card-body">
      			
      <h4 class="mt-0 h4_topo_exibe"><?php echo $line['indicador']; ?></h4> 
        <div class="row">

          <div class="col-md-6">
            <spam class="sub-titulo"> Resposta: </spam> <?php echo $line['resposta']; ?>
          </div>	

          <div class="col-md-6">
            <spam class="sub-titulo"> PA: </spam> <?php echo $line['complemento']; ?>
          </div>	
          
        </div>
    </div>

    <div class="card m-b-20 card-body">
      <div class="row">
        <div class="col-md-5">
          <a class="image-popup-vertical-fit" href="uploads/images/checklists/<?php echo empty($line['img']) ?  'sem-foto.png' : $line['img']; ?>" title="Caption. Can be aligned it to any side and contain any HTML.">
            <img class="img-responsive" alt="" src="uploads/images/checklists/<?php echo empty($line['img']) ?  'sem-foto.png' : $line['img']; ?>"  width="345">
          </a>
        </div>
    
        <div class="col-md-7">
          <div class="row">
            <div class="col-md-6">
              <spam class="sub-titulo2"> Data da avaliação: </spam> <?php echo data_exibe($line['data_criacao']); ?> <br>
            
              <div class="linha"></div>

                <spam class="sub-titulo">Técnico:</spam> <?php echo $line['nome']; ?>
                
                <div class="linha"></div>
                
                <spam class="sub-titulo">Solução:</spam> <?php echo $line['solucao']; ?></spam>
  
            </div>

            <div class="col-md-6">
              <spam class="sub-titulo2"> Data Limite: </spam> <?php echo substr(data_exibe($line['data_limite']),0,10); ?><br>
              <span class="badge <?php echo verificaData($line['data_limite']); ?>">Atrasado</span> 
              <div class="linha"></div>

                <spam class="sub-titulo">Status:</spam>  <span class="badge <?php echo $line['color']; ?> aumentaBadge"><?php echo $line['nome_status']; ?></span>
                
                <div class="linha"></div>
                
                <spam class="sub-titulo">Responsável:</spam><?php echo $line['responsavel']; ?></spam>
  
            </div>
            </div>
          </div>
        </div>	
      </div>

      <div class="card m-b-20 card-body">
      			
            <h6 class="mt-0 h4_topo_exibe">Enviar para:</h6> 
              <div class="row">
      
                <div class="col-md-10">
                <select class="select2 form-control select2-multiple select2-hidden-accessible" multiple="" data-placeholder="Enviar para..." tabindex="-1" aria-hidden="true">
                 <optgroup label="Usuários">
                 <?php 
                 $sel = $db->select("SELECT id_usuario, usuario FROM usuarios ORDER BY nome");
									while($ln = $db->expand($sel)){
                        echo '<option value="'.$ln['id_usuario'].'">'.$ln['usuario'].'</option>';
											}
                 ?>
                 </optgroup>
                  <optgroup label="Empresas">
                  <?php 
                 $sel = $db->select("SELECT id_empresa, usuario FROM usuarios ORDER BY nome");
									while($ln = $db->expand($sel)){
                        echo '<option value="'.$ln['id_usuario'].'">'.$ln['usuario'].'</option>';
											}
                 ?>
                  </optgroup>
                </select>
                </div>	
      
                <div class="col-md-2">
                <button type="button" class="btn btn-purple btn-block">Enviar</button>
                </div>	
                
              </div>
          </div>
    </div>
  </div>

  
  




		
			










<?php require ("../../includes/rodape.php"); ?>
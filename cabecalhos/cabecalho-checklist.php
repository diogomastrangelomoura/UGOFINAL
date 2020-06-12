	
	<div class="col-md-12 mbottom-30 cabecalho-impressao show-only-print">
		 <img src="assets/images/novo_logo.png" height="40" alt="logo">
		 <h4 class="mt-0 h4_topo_exibe"><?php echo $name; ?></h4>
		 <h6><?php echo $line['descricao']; ?></h6>
		 <hr>
		 <div class="row">
			 <div class="col-md-6">
			 	Realizado por: <?php echo $nome_usuario;  ?>
			 </div>
			 <div class="col-md-6 text-right">
			 	Data/Hora: <?php echo data_exibe($data_checklist); ?>
			 </div>	
		 </div>	 
		 <hr>
	</div>	
<?php require ("includes/topo.php"); ?>
						
						
                                    
                                <div class="col-md-12">
                                    <?php
									
									$delete = $db->select("TRUNCATE TABLE objetos");
									$delete = $db->select("TRUNCATE TABLE opcoes");
									$delete = $db->select("TRUNCATE TABLE perguntas");
									$delete = $db->select("TRUNCATE TABLE perg_tipo_index");
									$delete = $db->select("TRUNCATE TABLE respostas");
									$delete = $db->select("TRUNCATE TABLE tipo_cadastro");


									echo '<center><br><br>BASE DE DADOS LIMPA</center>';

									?>
                                </div>

<?php require ("includes/rodape.php"); ?>

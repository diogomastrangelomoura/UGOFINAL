<?php require("../../includes/topo.php"); ?>

<?php
$name = 'Novo Plano';
if (isset($id)) {
	$sel = $db->select("SELECT plano_de_acao.*, respostas_checklists.indicador, respostas_checklists.resposta, realizados.id_usuario, realizados.data_criacao, usuarios.nome, tipo_status.nome_status, tipo_status.obs, tipo_status.color 
  FROM plano_de_acao 
  LEFT JOIN respostas_checklists ON respostas_checklists.id_plano=plano_de_acao.id_plano 
  LEFT JOIN realizados ON realizados.id_realizado=respostas_checklists.id_realizado 
  LEFT JOIN usuarios ON realizados.id_usuario=usuarios.id_usuario 
  LEFT JOIN tipo_status ON plano_de_acao.linka_status=tipo_status.id_status 
  WHERE plano_de_acao.id_plano='$id' 
  LIMIT 1");
	$line = $db->expand($sel);
	$name = $line['indicador'];
}
?>

<div class="col-md-12">
	<div class="card m-b-20 card-body">
		<h4 class="mt-0 h4_topo_exibe">

			<span class="exibe_nome_editando"><?php echo $name; ?></span>

			<div class="btn-toolbar pull-right" role="toolbar">
				<div class="btn-group">
					<button data-return="plano-acao" data-title="Deseja excluir o plano de ação?" data-text="A ação não poderá ser desfeita." data-id="<?php echo $id; ?>" data-post="controlers/plano-acao/apaga_plano_acao.php" type="button" class="btn btn-dark waves-light waves-effect apaga-elemento"><i class="fa fa-trash-o"></i></button>
				</div>
			</div>

		</h4>

	</div>
</div>

<div class="col-md-12">
	<form method="post" action="controlers/plano-acao/salva_plano_acao.php">

		<input type="hidden" name="id" value="<?php if (isset($id)) {
																						echo $id;
																					} else {
																						echo '0';
																					} ?>">

		<div class="row">
			<div class="col-md-12">

				<div class="card m-b-10">
					<div class="card-body">

						<div class="form-group">
							<label class="mbottom-10">Resposta</label>
							<input type="text" name="resposta" class="form-control nome_editando" readonly required value="<?php if (isset($id)) {
																																																								echo $line['resposta'];
																																																							} ?>">
						</div>

						<div class="row">

							<div class="col-md-12">
								<div class="form-group">
									<label class="mbottom-10">Plano de ação</label>
									<input type="text" name="complemento" class="form-control" readonly required value="<?php if (isset($id)) {
																																																				echo $line['complemento'];
																																																			} ?>">
								</div>
							</div>

							<div class="col-md-12">
								<div class="form-group">
									<label class="mbottom-10">Solução apresentada</label>
									<textarea id="textarea" name="solucao" class="form-control" maxlength="225" rows="3" placeholder="Esta área tem um limite de 225 caracteres."><?php if (isset($id)) {
																																																																																	echo $line['solucao'];
																																																																																} ?></textarea>
								</div>
							</div>

							<div class="col-md-5">
								<a class="image-popup-vertical-fit" href="uploads/images/checklists/<?php echo empty($line['img']) ?  'sem-foto.png' : $line['img']; ?>" >
									<img class="img-responsive" alt="" src="uploads/images/checklists/<?php echo empty($line['img']) ?  'sem-foto.png' : $line['img']; ?>" width="345">
								</a>
							</div>

							<div class="col-md-7">
								<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="mbottom-10">Data da avaliação</label>
										<input type="text" name="data_criacao" class="form-control" readonly required value="<?php if (isset($id)) {
																																																						echo data_exibe($line['data_criacao']);
																																																					} ?>">
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label class="mbottom-10">Data limite</label>
										<input type="date" name="data_limite" class="form-control" required value="<?php if (isset($id)) {
																																																	echo $line['data_limite'];
																																																} ?>">
									</div>
								</div>

								<div class="col-md-6">
								<div class="form-group">
									<label class="mbottom-10">Técnico</label>
									<input type="text" name="nome" class="form-control" readonly required value="<?php if (isset($id)) {
																																																	echo $line['nome'];
																																																} ?>">
								</div>
							</div>


							<div class="col-md-6">
								<div class="form-group">
									<label class="mbottom-10">Status</label>
									<select class="form-control" name="linka_status">

										<?php
										if (isset($id)) {
											$pega_status = $line['linka_status'];
											$sel = $db->select("SELECT * FROM tipo_status WHERE id_status='$pega_status' LIMIT 1");
											$ln = $db->expand($sel);
											echo '<option value="' . $ln['id_status'] . '" selected>' . $ln['nome_status'] . '</option>';
										} else {
											$id_funcao = 0;
											echo '<option value="">-- escolha --</option>';
										}

										$sel = $db->select("SELECT * FROM tipo_status WHERE id_status!='$pega_status' ORDER BY id_status");
										while ($ln = $db->expand($sel)) {
											echo '<option value="' . $ln['id_status'] . '">' . $ln['nome_status'] . '</option>';
										}
										?>
									</select>
								</div>
							</div>

							

							<div class="col-md-6">
								<div class="form-group">
									<label class="mbottom-10">Responsável</label>
									<input type="text" name="responsavel" class="form-control" required value="<?php if (isset($id)) {
																																																echo $line['responsavel'];
																																															} ?>">
								</div>
							</div>


								</div>
							</div>
						</div>
					</div>
				</div>


				<button type="submit" class="btn btn-success waves-effect waves-light btn-block btn-lg">Salvar</button></a>

			</div>

		</div>

	</form>
</div>







<?php require("../../includes/rodape.php"); ?>
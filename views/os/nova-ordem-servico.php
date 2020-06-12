<?php require ("../../includes/topo_alternativo.php"); ?>
		
<?php
if(isset($id)){
$sel = $db->select("SELECT * FROM realizados WHERE id_realizado='$id' LIMIT 1");
$line = $db->expand($sel);

$sel2 = $db->select("SELECT * FROM respostas_checklists WHERE id_resposta='$resposta' LIMIT 1");
$line2 = $db->expand($sel2);
}
?>  

<div class="row justify-content-md-center">

<div class="col-md-9">
		<div class="card m-b-20 card-body">			
        	<h4 class="mt-0 h4_topo_exibe">Nova OS</h4> 			
    	</div>
    </div>

<div class="col-md-9">
<form method="post" action="controlers/os/salva_os.php">

	<input type="hidden" name="id_check_realizado" value="<?php if(isset($id)){echo $id;} ?>">
	<input type="hidden" name="id_resposta_check" value="<?php if(isset($id)){echo $resposta;} ?>">
	<input type="hidden" name="id_objeto" value="<?php if(isset($id_objeto)){echo $id_objeto;} ?>">

<div class="card m-b-20">
	<div class="card-body"> 
	<div class="row">   


		<div class="col-md-12">
			<div class="form-group">
				<label class="">Título</label>
				<input type="text" name="titulo" class="form-control" required>
			</div>
			<div class="form-group">
				<label class="">Subtítulo</label>
				<input type="text" name="subtitulo" class="form-control" value="<?php if(isset($id)){echo 'OS baseada no checklist '.$id.' realizado no dia '.data_exibe($line['data_criacao']);} ?>" required>
			</div>
			<div class="form-group">
				<label class="">Descrição</label>
				<textarea required name="descricao" class="form-control" style="height: 200px; resize: none;"><?php if(isset($id)){echo $line2['indicador'].'&#10;'.$line2['resposta'].'&#10;==================<>==================&#10;';} ?></textarea>
			</div>	
		</div>	

		

	</div>
	</div>
</div>
<button type="submit" class="btn btn-success waves-effect waves-light btn-block btn-lg">Avançar</button></a>
</form>
</div>

</div>

<?php require ("../../includes/rodape.php"); ?>
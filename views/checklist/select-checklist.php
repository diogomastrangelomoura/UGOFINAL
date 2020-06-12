<?php
require ("../../config.php");
?>
<center>
<form method="post" action="responde-checklist">
	<select class="form-control form-control-lg" name="id_checklist" required>
		<option value="">--selecione uma opção--</option>
		<?php
			$select = $db->select("SELECT id_checklist, nome FROM checklists ORDER BY nome");
			while($line = $db->expand($select)){
				echo '<option value="'.$line['id_checklist'].'">'.$line['nome'].'</option>';
			}
		?>
	</select>
	<button type="submit" class="btn btn-success waves-effect waves-light btn-block btn-lg mtop-10">Iniciar</button>
</form>
</center>
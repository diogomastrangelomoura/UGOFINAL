
<?php
require ("includes/header.php");

//$sql= new DB();
$x = 1;
while($x<3001){

	

	$sql = $db->select("INSERT INTO objetos (id_tipo, data_criacao, nome, imagem) VALUES ('1', '2020-05-07 15:52:17', 'Teste de Cadastro', 'imagem_45e00iqldwdbdxealmgn9kpr.jpg')");

	$x++;
}
	
?>

<?php require ("includes/rodape.php"); ?>
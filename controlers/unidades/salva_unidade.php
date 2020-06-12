<?php
ob_start();
@session_start();
require ("../../config.php");
$data = date("Y-m-d");


//UPDATE
if(isset($id) && $id!='0'){

	$sql = $db->select("UPDATE unidades SET nome='$nome', endereco='$endereco', cnpj='$cnpj', bairro='$bairro', responsavel='$responsavel', cidade='$cidade', razao_social='$razao_social', telefone='$telefone', estado='$estado', email='$email' WHERE id_unidade='$id' LIMIT 1");


//INSERT
} else {


	$sql = $db->select("INSERT INTO unidades (nome, endereco, cnpj, bairro, responsavel, cidade, razao_social, telefone, estado, email, data_criacao) VALUES ('$nome', '$endereco', '$cnpj', '$bairro', '$responsavel', '$cidade', '$razao_social', '$telefone', '$estado', '$email', '$data')");


}


$_SESSION['session_type'] = 'success';
$_SESSION['session_title'] = 'Sucesso!';
$_SESSION['session_message'] = 'Cadastro salvo com sucesso!';

header("location: ../../unidades-empresas");

?>
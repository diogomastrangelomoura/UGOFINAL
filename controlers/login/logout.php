<?php
@session_start();

unset($_SESSION['ugo_iduser']);

$_SESSION['session_type'] = 'success';
$_SESSION['session_title'] = '<i class="mdi mdi-check-all"></i>';
$_SESSION['session_message'] = 'Logout efetuado com sucesso!';

header("location: acesso");	

?>
<?php
@session_start();
date_default_timezone_set("America/Fortaleza");

//LOCALHOST//
if($_SERVER['HTTP_HOST']=='localhost' || $_SERVER['HTTP_HOST']=='127.0.0.1'){	
	
	define("PATH", 'http://'.$_SERVER['HTTP_HOST'].'/ugo2/');

	ini_set("display_errors", "1");
	ini_set("display_errors", "On");	
	ini_set('max_execution_time', 0);
	
	///BANCO DE DADOS///	
	define("HOST", "localhost");
	define("DBNAME", "ugo");
	define("USER", "root");
	define("PASSWORD", "");


//WEB//	
} else {	

	define("PATH", 'http://'.$_SERVER['HTTP_HOST'].'/ugo/');

	ini_set("display_errors", "1");
	ini_set("display_errors", "On");	
	ini_set('max_execution_time', 0);

	///BANCO DE DADOS///	
	define("HOST", "localhost");
	define("DBNAME", "sistecno_ugo");
	define("USER", "sistecno_ugo");
	define("PASSWORD", "kaca123!@#");

}


define('ROOT_DIR', dirname(__FILE__).'/' );
define("PASTA_UPLOAD_IMAGENS_OBJETOS", 'uploads/images/objetos/');
define("PASTA_UPLOAD_IMAGENS_USUARIOS", 'uploads/images/usuarios/');
define("PASTA_UPLOAD_IMAGENS_CHECKLIST", 'uploads/images/checklists/');
define("PASTA_UPLOAD_IMAGENS_OS", 'uploads/images/os/');



require_once(ROOT_DIR."class/class.db.php");
require_once(ROOT_DIR."class/class.seguranca.php");

require_once(ROOT_DIR."class/qrcode/qrlib.php");
require_once(ROOT_DIR."class/class_images.php");
require_once(ROOT_DIR."class/class.upload.php");
require_once(ROOT_DIR."class/class.funcoes.php");
require_once(ROOT_DIR."class/class.pesquisas.php");


if(isset($_SESSION['ugo_iduser'])){
	$id_usuario_ugo = $_SESSION['ugo_iduser'];
} 


?>
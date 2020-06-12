<?php

function foto_objeto($imagem,$miniatura=''){
	
	if($miniatura!=''){
		$miniatura = 'style="max-width:100%;"';
	}

	if(!empty($imagem)){

		if(file_exists('../../'.PASTA_UPLOAD_IMAGENS_OBJETOS.$imagem)){
			$img = '<img src="'.PASTA_UPLOAD_IMAGENS_OBJETOS.$imagem.'" class="card-img-top img-fluid" alt="Foto Objeto" '.$miniatura.'>';
		} else {
			$img = '<img  src="assets/images/sem-foto.png" alt="Sem Imagem" class="card-img-top img-fluid" '.$miniatura.'>';	
		}	

	} else {
		$img = '<img  src="assets/images/sem-foto.png" alt="Sem Imagem" class="card-img-top img-fluid" '.$miniatura.'>';
	}

	return $img;
                                                                    
}


function miniatura_imagens_objeto($imagem){
	

	if(!empty($imagem)){
		if(file_exists('../../'.PASTA_UPLOAD_IMAGENS_OBJETOS.$imagem)){
			$img = '<img src="'.PASTA_UPLOAD_IMAGENS_OBJETOS.$imagem.'" class="img-obj" alt="Foto Objeto">';	
		} else {
			$img = '<img class="img-obj" src="assets/images/sem-foto.png" alt="Sem Imagem">';	
		}
		
	} else {
		$img = '<img class="img-obj" src="assets/images/sem-foto.png" alt="Sem Imagem">';
	}

	return $img;
                                                                    
}


function imagens_checklist($imagem,$miniatura=''){
	
	if($miniatura!=''){
		$miniatura = 'style="max-width:100%;"';
	}

	if(!empty($imagem)){

		if(file_exists('../../'.PASTA_UPLOAD_IMAGENS_CHECKLIST.$imagem)){
			$img = '<img src="'.PASTA_UPLOAD_IMAGENS_CHECKLIST.$imagem.'" class="img-fluid" alt="Foto Objeto" '.$miniatura.'>';
		} else {
			$img = '<img  src="assets/images/sem-foto.png" alt="Sem Imagem" class="img-fluid" '.$miniatura.'>';	
		}	

	} else {
		$img = '<img  src="assets/images/sem-foto.png" alt="Sem Imagem" class="img-fluid " '.$miniatura.'>';
	}

	return $img;
                                                                    
}



function Numeros($numero){
	if($numero<10){
		$numero = '0'.$numero;
	}
	return $numero;
}


function statusObjeto($obj){

	if($obj=='0000-00-00 00:00:00'){
		return '<span class="badge badge-success">OK</span>';
	} else {
		return '<span class="badge badge-danger">Bloqueado</span>';
	}

}

?>
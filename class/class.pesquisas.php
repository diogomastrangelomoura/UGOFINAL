<?php
	
class PESQUISAS{


	public function EstadosBrasil($estado=''){

		$options ='';
		if(empty($estado)){
			$options ='<option value="">---</option>';
		}
		

		$estadosBrasileiros = array(
		'AC'=>'AC',
		'AL'=>'AL',
		'AP'=>'AP',
		'AM'=>'AM',
		'BA'=>'BA',
		'CE'=>'CE',
		'DF'=>'DF',
		'ES'=>'ES',
		'GO'=>'GO',
		'MA'=>'MA',
		'MT'=>'MT',
		'MS'=>'MS',
		'MG'=>'MG',
		'PA'=>'PA',
		'PB'=>'PB',
		'PR'=>'PR',
		'PE'=>'PE',
		'PI'=>'PI',
		'RJ'=>'RJ',
		'RN'=>'RN',
		'RS'=>'RS',
		'RO'=>'RO',
		'RR'=>'RR',
		'SC'=>'SC',
		'SP'=>'SP',
		'SE'=>'SE',
		'TO'=>'TO'
		);

		foreach ($estadosBrasileiros as $uf => $estado) {
			$selected  = $uf == $myUF ?"selected":"";
			$options  .= "<option $selected value=\"$uf\">$estado</option>";
		}

		return $options;

	}

	public function SelectObjetos($id=0){

		$db = new DB();  	

		if($id!=0){
			$pesquisa = $db->select("SELECT id_objeto, nome FROM objetos WHERE id_objeto='$id' LIMIT 1");
			$row = $db->expand($pesquisa);
			$var .=  '<option value="'.$row['id_objeto'].'" selected>'.$row['nome'].'</option>';
			
		} else {
			$var = '<option>--escolha--</option>';				
		}
		
		
		$sel = $db->select("SELECT id_tipo, nome 
			FROM tipo_cadastro
			ORDER BY nome
			");
		while($line = $db->expand($sel)){

			$id_tipo = $line['id_tipo'];
			$pesquisa = $db->select("SELECT id_objeto, nome FROM objetos WHERE id_tipo='$id_tipo' AND nome!='' AND id_objeto!='$id' ORDER BY nome");
			if($db->rows($pesquisa)){

				$var .= '<optgroup label="'.$line['nome'].'">';	
				while($row = $db->expand($pesquisa)){
					$var .=  '<option value="'.$row['id_objeto'].'">'.$row['nome'].'</option>';
				}
				$var .=  '</optgroup>';	

			}
		

		}

		return $var;
		
	}



}


?>
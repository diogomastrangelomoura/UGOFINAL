<?php
	
class DB{
    private $link;

	public function connect(){
		$this->link = new mysqli(HOST, USER, PASSWORD, DBNAME);
		mysqli_set_charset($this->link,"utf8");
        if( mysqli_connect_errno() ){
            echo "FALHA: ", mysqli_connect_error();
            exit();
        }
	}
	     
    public function __construct(){
	   $this->connect(); 
	}
	
	public function disconnect(){
		mysqli_close( $this->link );
	}
	
	
	public function __destruct(){
		$this->disconnect();
	}
	
	
	public function select($query,$erro=1){	
		error_reporting(1);
		//$this->link->query("SET GLOBAL sql_mode=''");
		if(!$result = $this->link->query($query)){
			if($erro==1){
				echo("<b>Erro MYSQL</b>:<br>" . mysqli_error($this->link))."<br><br>";
			}			
		} else {
			return $result;		
		}		
	}
	
	
	public function rows($query){	
		return mysqli_num_rows($query);
		
	}
	
	
	public function expand($query){	
		return mysqli_fetch_array($query,MYSQLI_BOTH);
	}
	
	
	public function last_id($query){	
		return mysqli_insert_id($this->link);
	}
	

	public function escape($var){
		$result = $this->link->real_escape_string($var);
		return $result;		
	}
	
}
?>

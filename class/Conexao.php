<?php

class Conexao

{

	


	private $host    = 'localhost';
	private $banco   = '#';
	private $usuario = '#';
	private $senha   = '#';

	public $id_tabela;
	public $id_usuario;
	public $data;
	public $acao;
	public $tabela;
	



	function conexao()
	{

		$mysqli = new mysqli($this->host, $this->usuario, $this->senha, $this->banco);

		if ($mysqli->connect_error) 

		{
    		die('Connect Error (' . $mysqli->connect_errno . ') '
            . $mysqli->connect_error);
		}
		

		return $mysqli;
	}

	
	

	






}

?>
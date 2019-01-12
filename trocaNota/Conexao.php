<?php
//Definindo os parametros de conexao
	class Conexao 
	{
		private $hn;
		private $un;
		private $pwd;  
		private $db;
		private $cs;
		
		public function getHN()
		{
			return $this->hn;
		}
		public function getUN()
		{
			return $this->un;
		}
		public function getPWD()
		{
			return $this->pwd;
		}
		public function getDB()
		{
			return $this->db;
		}
		function __construct()
		{
			$this->hn      = 'mysql.sbr-smartfile.com.br';
			$this->un      = 'sbrsmartfile02';
			$this->pwd     = 'smartfile17';  
			$this->db      = 'sbrsmartfile02';
			$this->cs      = 'utf8';
		}
		public function AbreConexao()
		{
			try
			{
				// Montando a query de conexao do mysql
				$dsn  = "mysql:host=".$this->hn.";port=3306;dbname=".$this->db.";charset=".$this->cs;
				$opt  = array(
					PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
					PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
					PDO::ATTR_EMULATE_PREPARES   => true,
				);
				// Instanciando a conexao
				global $pdo;
				$pdo  = new PDO($dsn, $this->un, $this->pwd, $opt);
			}
			catch(PDOException $e)
			{
				echo $e->getMessage();
			}
		}
		public function FechaConexao()
		{
			global $pdo;
			$pdo = null;
		}
	}
?>
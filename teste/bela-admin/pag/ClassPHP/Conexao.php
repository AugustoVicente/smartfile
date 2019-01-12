	<?php
    //Define database connection parameters
    class Conexao 
	{
		private $hn      = 'mysql.sbr-smartfile.com.br';
		private $un      = 'sbrsmartfile01';
		private $pwd     = 'smartfile17';  
		private $db      = 'sbrsmartfile01';
		private $cs      = 'utf8';
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
            if(!class_exists('AlertaUsuario'))
            {
                include 'alerta.php';
            }
            global $alerta;
            $alerta = new AlertaUsuario();
		}
		public function AbreConexao()
		{
            global $alerta;
            try
            {
                // Set up the PDO parameters
                $dsn  = "mysql:host=".$this->hn.";port=3306;dbname=".$this->db.";charset=".$this->cs;
                $opt  = array(
                    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
                    PDO::ATTR_EMULATE_PREPARES   => true,
                );
                // Create a PDO instance (connect to the database)
                global $pdo;
                $pdo  = new PDO($dsn, $this->un, $this->pwd, $opt);
            }
			catch(PDOException $e)
            {
                $_SESSION['erro'] = addslashes($e->getMessage());
                $alerta->voltaPagina();
            }
		}
		public function FechaConexao()
		{
			global $pdo;
			$pdo = null;
		}
	}
?>
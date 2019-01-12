<?php    
    class Usuario 
    {
        private $BD;
        function __construct()
        {
            if(!class_exists('AlertaUsuario'))
            {
                include 'Alerta.php';
                $alerta = new AlertaUsuario();
            }
            if(!class_exists('Conexao'))
            {
                include 'Conexao.php';
                $conexao = new Conexao();
            }
            $this->BD = new Conexao();
            global $alerta;
            $alerta = new AlertaUsuario();
        }
        public function buscarUsuario($idUsuario)
        {
            $this->BD->AbreConexao();
            global $pdo;
            global $alerta;
            $usuario = array();
            // Attempt to query database table and retrieve data
            try
            {
                $stmt = $pdo->query("select * from usuario where idUsuario = $idUsuario");
                while($row  = $stmt->fetch(PDO::FETCH_OBJ))
                {
                    // Assign each row of data to associative array
                    $usuario[] = $row;
                }
                return $usuario[0];
            }
            catch(PDOException $e)
            {
                $_SESSION['erro'] = addslashes($e->getMessage());
                $alerta->voltaPagina();
            }
            $this->BD->FechaConexao();
        }   
        public function buscarUsuarioUnidade($login)
        {
            $this->BD->AbreConexao();
            global $pdo;
            global $alerta;
            $usuario = array();
            // Attempt to query database table and retrieve data
            try
            {
                $stmt = $pdo->query("select * from usuario where login = '".$login."'");
                while($row  = $stmt->fetch(PDO::FETCH_OBJ))
                {
                    // Assign each row of data to associative array
                    $usuario[] = $row;
                }
                return $usuario[0];
            }
            catch(PDOException $e)
            {
                $_SESSION['erro'] = addslashes($e->getMessage());
                $alerta->voltaPagina();
            }
            $this->BD->FechaConexao();
        }        
        public function buscarTipoUsuario()
        {
            $this->BD->AbreConexao();
            global $pdo;
            global $alerta;
            $tipos = array();
            try
            {
                $stmt = $pdo->query("select * from tipo_usuario");
                while($row  = $stmt->fetch(PDO::FETCH_OBJ))
                {
                    $tipos[] = $row;
                }
                return $tipos;
            }
            catch(PDOException $e)
            {
                $_SESSION['erro'] = addslashes($e->getMessage());
                $alerta->voltaPagina();
            }
            $this->BD->FechaConexao();
        }    
        public function buscarUsuario2($login)
        {
            $this->BD->AbreConexao();
            global $pdo;
            global $alerta;
            $usuario = array();
            // Attempt to query database table and retrieve data
            try
            {
                $stmt = $pdo->query("select * from usuario where login = \"$login\"");
                while($row  = $stmt->fetch(PDO::FETCH_OBJ))
                {
                    // Assign each row of data to associative array
                    $usuario[] = $row;
                }
                return $usuario[0];
            }
            catch(PDOException $e)
            {
                $_SESSION['erro'] = addslashes($e->getMessage());
                $alerta->voltaPagina();
            }
            $this->BD->FechaConexao();
        }                       
        public function buscarNomeUsuario($login)
        {
            $this->BD->AbreConexao();
            global $pdo;
            global $alerta;
            $usuario = array();
            // Attempt to query database table and retrieve data
            try
            {
                $stmt = $pdo->query("select u.nome from usuario u where login = \"$login\"");
                while($row  = $stmt->fetch(PDO::FETCH_OBJ))
                {
                    // Assign each row of data to associative array
                    $usuario[] = $row;
                }
                return $usuario[0];
            }
            catch(PDOException $e)
            {
                $_SESSION['erro'] = addslashes($e->getMessage());
                $alerta->voltaPagina();
            }
            $this->BD->FechaConexao();
        }                                        
    }
?>
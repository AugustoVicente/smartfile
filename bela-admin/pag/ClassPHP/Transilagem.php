<?php    
    class Transilagem 
    {
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
            global $alerta;
            $alerta = new AlertaUsuario();
        }
        public function buscarTransilagem()
        {
            $BD = new Conexao();
            $BD -> AbreConexao();
            global $pdo;
            global $alerta;
            $unidades = array();
            try
            {
                $stmt = $pdo->query("SELECT * FROM dados_transilagens");
                while($row  = $stmt->fetch(PDO::FETCH_OBJ))
                {
                    $unidades[] = $row;
                }
                return $unidades;
            }
            catch(PDOException $e)
            {
                $_SESSION['erro'] = addslashes($e->getMessage());
                $alerta->voltaPagina();
            }            
            $BD->FechaConexao();
        }  
        public function buscarTransilagemUnidade($idUnidade)
        {
            $BD = new Conexao();
            $BD -> AbreConexao();
            global $pdo;
            global $alerta;
            $unidades = array();
            try
            {
                $stmt = $pdo->query("SELECT * FROM dados_transilagens where idUnidade = $idUnidade");
                while($row  = $stmt->fetch(PDO::FETCH_OBJ))
                {
                    $unidades[] = $row;
                }
                return $unidades;
            }
            catch(PDOException $e)
            {
                $_SESSION['erro'] = addslashes($e->getMessage());
                $alerta->voltaPagina();
            }            
            $BD->FechaConexao();
        }                           
    }
?>
<?php    
    class Inseticida 
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
        public function buscarInseticida()
        {
            $BD = new Conexao();
            $BD->AbreConexao();
            global $pdo;
            global $alerta;
            $inseticidas = array();
            try
            {
                $stmt = $pdo->query("SELECT * FROM Inseticida");
                while($row  = $stmt->fetch(PDO::FETCH_OBJ))
                {
                    $inseticidas[] = $row;
                }
                return $inseticidas;
            }
            catch(PDOException $e)
            {
                $_SESSION['erro'] = addslashes($e->getMessage());
                $alerta->voltaPagina();
            }                       
            $BD->FechaConexao();
        }    
        public function buscarInseticidaAltera($id)
        {
            $BD = new Conexao();
            $BD->AbreConexao();
            global $pdo;
            global $alerta;
            $inseticidas = array();
            try
            {
                $stmt = $pdo->query("SELECT * FROM Inseticida where idInseticida = $id");
                while($row  = $stmt->fetch(PDO::FETCH_OBJ))
                {
                    $inseticidas[] = $row;
                }
                return $inseticidas[0];
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
<?php    
    class ControleEstoque 
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
        public function buscarControleEstoqueUnidade($idUnidade)
        {
            global $alerta;
            $BD = new Conexao();
            $BD->AbreConexao();
            global $pdo;
            $unidades = array();
            try
            {
                $stmt = $pdo->query("call busca_dados_historico($idUnidade)");
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
        public function buscarControleEstoque()
        {
            global $alerta;
            $BD = new Conexao();
            $BD->AbreConexao();
            global $pdo;
            $unidades = array();
            try
            {
                $stmt = $pdo->query("SELECT * FROM dados_controle_estoque WHERE statusAtual = 1 ");
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
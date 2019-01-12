<?php    
    class Produto 
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
        public function buscarProduto()
        {
            $BD = new Conexao();
            $BD -> AbreConexao();
            global $pdo;
            global $alerta;
            $unidades = array();
            // Attempt to query database table and retrieve data
            try
            {
                $stmt = $pdo->query("select * from produto");
                while($row  = $stmt->fetch(PDO::FETCH_OBJ))
                {
                    // Assign each row of data to associative array
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
        public function buscarProdutoUnico($idProduto)
        {
            $BD = new Conexao();
            $BD -> AbreConexao();
            global $pdo;
            global $alerta;
            $unidades = array();
            // Attempt to query database table and retrieve data
            try
            {
                $stmt = $pdo->query("select * from produto where idProduto = $idProduto");
                while($row  = $stmt->fetch(PDO::FETCH_OBJ))
                {
                    // Assign each row of data to associative array
                    $unidades[] = $row;
                }
                return $unidades[0];
            }
            catch(PDOException $e)
            {
                $_SESSION['erro'] = addslashes($e->getMessage());
                $alerta->voltaPagina();
            }
            $BD->FechaConexao();
        } 
        public function buscarHistoricoAtual($idUnidade)
        {
            $BD = new Conexao();
            $BD -> AbreConexao();
            global $pdo;
            global $alerta;
            $historicos = array();
            // Attempt to query database table and retrieve data
            try
            {
                $stmt = $pdo->query("call busca_dados_historico($idUnidade)");
                while($row  = $stmt->fetch(PDO::FETCH_OBJ))
                {
                    // Assign each row of data to associative array
                    $historicos[] = $row;
                }
                return $historicos;
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
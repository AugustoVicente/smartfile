<?php 
    class Safra 
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
        public function buscarSafras($idSilo)
        {
        	$BD = new Conexao();
            $BD -> AbreConexao();
            global $pdo;
            global $alerta;
            $safras = array();
            try
            {
            	$stmt = $pdo->query("SELECT * FROM historico where idSilo = $idSilo");
                while($row  = $stmt->fetch(PDO::FETCH_OBJ))
                {
                    $safras[] = $row;
                }
                return $safras;
            }
            catch(PDOException $e)
            {
                $_SESSION['erro'] = addslashes($e->getMessage());
                $alerta->voltaPagina();
            }            
            $BD->FechaConexao();
        }
        public function buscarTrocaSafras($idHistorico)
        {
        	$BD = new Conexao();
            $BD -> AbreConexao();
            global $pdo;
            global $alerta;
            $safras = array();
            try
            {
            	$stmt = $pdo->query("SELECT *FROM registro_troca_safra  WHERE idHistoricoAlterado =$idHistorico;");
                while($row  = $stmt->fetch(PDO::FETCH_OBJ))
                {
                    $safras[] = $row;
                }
                return $safras[0];
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
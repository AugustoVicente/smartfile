<?php    
    class Unidade 
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
        }
        public function buscarUnidadeUnica($idUnidade)
        {
            $BD = new Conexao();
            $BD -> AbreConexao();
            global $pdo;
            global $alerta;
            $unidade = array();
            // Attempt to query database table and retrieve data
            try
            {
                $stmt = $pdo->query("select * from unidade where idUnidade = $idUnidade");
                while($row  = $stmt->fetch(PDO::FETCH_OBJ))
                {
                    // Assign each row of data to associative array
                    $unidade[] = $row;
                }
                return $unidade[0];
            }
            catch(PDOException $e)
            {
                $_SESSION['erro'] = addslashes($e->getMessage());
                $alerta->voltaPagina();
            }
            $BD->FechaConexao();
        }   
        public function buscarUnidade()
        {
            $BD = new Conexao();
            $BD -> AbreConexao();
            global $pdo;
            global $alerta;
            $unidades = array();
            // Attempt to query database table and retrieve data
            try
            {
                $stmt = $pdo->query("select * from unidade");
                while($row  = $stmt->fetch(PDO::FETCH_OBJ))
                {
                    // Assign each row of data to associative array
                    $unidades[] = $row;
                }
                return $unidades;
            }
            catch(PDOException $e)
            {/*
                $_SESSION['erro'] = addslashes($e->getMessage());
                $alerta->voltaPagina();*/
                echo $e->getMessage();
            }
            $BD->FechaConexao();
        }
        public function buscarDadosUnidade($idUnidade)
        {
            $BD = new Conexao();
            $BD -> AbreConexao();
            global $pdo;
            global $alerta;
            $unidades = array();
            // Attempt to query database table and retrieve data
            try
            {
                $stmt = $pdo->query("CALL dados_unidade($idUnidade);");
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
        //Dados de todas as unidades
        public function buscarAeracaoUnidade($idUnidade,$mes,$ano)
        {
            $BD = new Conexao();
            $BD -> AbreConexao();
            global $pdo;
            global $alerta;
            $aeracao = array();
            try
            {
                $stmt = $pdo->query("SELECT *FROM dados_aeracaoUnidade WHERE idUnidade=$idUnidade AND  MONTH(data) =\"$mes\" and YEAR(data)=\"$ano\" ; ");
                while($row  = $stmt->fetch(PDO::FETCH_OBJ))
                {
                    // Assign each row of data to associative array
                    $aeracao[] = $row;
                }
                return $aeracao;
            }
            catch(PDOException $e)
            {
                $_SESSION['erro'] = addslashes($e->getMessage());
                $alerta->voltaPagina();
            }
            $BD->FechaConexao();
        }
        public function buscarEstoqueUnidade($idUnidade,$mes,$ano)
        {
            $BD = new Conexao();
            $BD -> AbreConexao();
            global $pdo;
            global $alerta;
            $estoque = array();

            try
            {
                $stmt = $pdo->query("SELECT *FROM dados_estoqueUnidade WHERE idUnidade=$idUnidade  AND  MONTH(data) =\"$mes\" and YEAR(data)=\"$ano\"; ");
                while($row  = $stmt->fetch(PDO::FETCH_OBJ))
                {
                    // Assign each row of data to associative array
                    $estoque[] = $row;
                }
                return $estoque;
            }
            catch(PDOException $e)
            {
                $_SESSION['erro'] = addslashes($e->getMessage());
                $alerta->voltaPagina();
            }
            $BD->FechaConexao();
        } 
        public function buscarExpurgoUnidade($idUnidade,$mes,$ano)
        {
            $BD = new Conexao();
            $BD -> AbreConexao();
            global $pdo;
            global $alerta;
            $expurgo = array();

            try
            {
                $stmt = $pdo->query("SELECT *FROM  dados_expurgoUnidade WHERE idUnidade=$idUnidade  AND  MONTH(data) =\"$mes\" and YEAR(data)=\"$ano\" ; ");
                while($row  = $stmt->fetch(PDO::FETCH_OBJ))
                {
                    // Assign each row of data to associative array
                    $expurgo[] = $row;
                }
                return $expurgo;
            }
            catch(PDOException $e)
            {
                $_SESSION['erro'] = addslashes($e->getMessage());
                $alerta->voltaPagina();
            }
            $BD->FechaConexao();
        }
        public function buscarNebulizacaoUnidade($idUnidade,$mes,$ano)
        {
            $BD = new Conexao();
            $BD -> AbreConexao();
            global $pdo;
            global $alerta;
            $nebulizacao = array();

            try
            {
                $stmt = $pdo->query("SELECT *FROM dados_nebulizacaoUnidade WHERE idUnidade=$idUnidade  AND  MONTH(data) =\"$mes\" and YEAR(data)=\"$ano\"; ");
                while($row  = $stmt->fetch(PDO::FETCH_OBJ))
                {
                    // Assign each row of data to associative array
                    $nebulizacao[] = $row;
                }
                return $nebulizacao;
            }
            catch(PDOException $e)
            {
                $_SESSION['erro'] = addslashes($e->getMessage());
                $alerta->voltaPagina();
            }
            $BD->FechaConexao();
        }
        public function buscarPulverizacaoUnidade($idUnidade,$mes,$ano)
        {
            $BD = new Conexao();
            $BD -> AbreConexao();
            global $pdo;
            global $alerta;
            $pulverizacao = array();

            try
            {
                $stmt = $pdo->query("SELECT *FROM dados_pulverizacaoUnidade WHERE idUnidade=$idUnidade  AND  MONTH(data) =\"$mes\" and YEAR(data)=\"$ano\"; ");
                while($row  = $stmt->fetch(PDO::FETCH_OBJ))
                {
                    // Assign each row of data to associative array
                    $pulverizacao[] = $row;
                }
                return $pulverizacao;
            }
            catch(PDOException $e)
            {
                $_SESSION['erro'] = addslashes($e->getMessage());
                $alerta->voltaPagina();
            }
            $BD->FechaConexao();
        }
        public function buscarRastelagemUnidade($idUnidade,$mes,$ano)
        {
            $BD = new Conexao();
            $BD -> AbreConexao();
            global $pdo;
            global $alerta;
            $rastelagem = array();

            try
            {
                $stmt = $pdo->query("SELECT *FROM dados_rastelagemUnidade WHERE idUnidade=$idUnidade  AND  MONTH(data) =\"$mes\" and YEAR(data)=\"$ano\"; ");
                while($row  = $stmt->fetch(PDO::FETCH_OBJ))
                {
                    // Assign each row of data to associative array
                    $rastelagem[] = $row;
                }
                return $rastelagem;
            }
            catch(PDOException $e)
            {
                $_SESSION['erro'] = addslashes($e->getMessage());
                $alerta->voltaPagina();
            }
            $BD->FechaConexao();
        }
        public function buscarRemaquinacaoUnidade($idUnidade,$mes,$ano)
        {
            $BD = new Conexao();
            $BD -> AbreConexao();
            global $pdo;
            global $alerta;
            $remaquinacao = array();

            try
            {
                $stmt = $pdo->query("SELECT *FROM dados_remaquinacoesUnidade WHERE idUnidade=$idUnidade  AND  MONTH(data) =\"$mes\" and YEAR(data)=\"$ano\" ");
                while($row  = $stmt->fetch(PDO::FETCH_OBJ))
                {
                    // Assign each row of data to associative array
                    $remaquinacao[] = $row;
                }
                return $remaquinacao;
            }
            catch(PDOException $e)
            {
                $_SESSION['erro'] = addslashes($e->getMessage());
                $alerta->voltaPagina();
            }
            $BD->FechaConexao();
        }
        public function buscarSondagemUnidade($idUnidade,$mes,$ano)
        {
            $BD = new Conexao();
            $BD -> AbreConexao();
            global $pdo;
            global $alerta;
            $Sondagem = array();

            try
            {
                $stmt = $pdo->query("SELECT *FROM dados_sondagemUnidade WHERE idUnidade=$idUnidade  AND  MONTH(data) =\"$mes\" and YEAR(data)=\"$ano\"; ");
                while($row  = $stmt->fetch(PDO::FETCH_OBJ))
                {
                    // Assign each row of data to associative array
                    $Sondagem[] = $row;
                }
                return $Sondagem;
            }
            catch(PDOException $e)
            {
                $_SESSION['erro'] = addslashes($e->getMessage());
                $alerta->voltaPagina();
            }
            $BD->FechaConexao();
        }
        public function buscarTermometriaUnidade($idUnidade,$mes,$ano)
        {
            $BD = new Conexao();
            $BD -> AbreConexao();
            global $pdo;
            global $alerta;
            $termometria = array();

            try
            {
                $stmt = $pdo->query("SELECT *FROM  dados_termometriaUnidade WHERE idUnidade=$idUnidade  AND  MONTH(data) =\"$mes\" and YEAR(data)=\"$ano\"; ");
                while($row  = $stmt->fetch(PDO::FETCH_OBJ))
                {
                    // Assign each row of data to associative array
                    $termometria[] = $row;
                }
                return $termometria;
            }
            catch(PDOException $e)
            {
                $_SESSION['erro'] = addslashes($e->getMessage());
                $alerta->voltaPagina();
            }
            $BD->FechaConexao();
        }
        public function buscarTransilagemUnidade($idUnidade,$mes,$ano)
        {
            $BD = new Conexao();
            $BD -> AbreConexao();
            global $pdo;
            global $alerta;
            $Transilagem = array();

            try
            {
                $stmt = $pdo->query("SELECT *FROM dados_transilagemUnidade WHERE idUnidade=$idUnidade  AND  MONTH(data) =\"$mes\" and YEAR(data)=\"$ano\"; ");
                while($row  = $stmt->fetch(PDO::FETCH_OBJ))
                {
                    // Assign each row of data to associative array
                    $Transilagem[] = $row;
                }
                return $Transilagem;
            }
            catch(PDOException $e)
            {
                $_SESSION['erro'] = addslashes($e->getMessage());
                $alerta->voltaPagina();
            }
            $BD->FechaConexao();
        }
        public function buscarTratamentoFitaUnidade($idUnidade,$mes,$ano)
        {
            $BD = new Conexao();
            $BD -> AbreConexao();
            global $pdo;
            global $alerta;
            $TratamentoFita = array();
            try
            {
                $stmt = $pdo->query("SELECT *FROM dados_tratamentoFitaUnidade WHERE idUnidade=$idUnidade  AND  MONTH(data) =\"$mes\" and YEAR(data)=\"$ano\"; ");
                while($row  = $stmt->fetch(PDO::FETCH_OBJ))
                {
                    // Assign each row of data to associative array
                    $TratamentoFita[] = $row;
                }
                return $TratamentoFita;
            }
            catch(PDOException $e)
            {
                $_SESSION['erro'] = addslashes($e->getMessage());
                $alerta->voltaPagina();
            }
            $BD->FechaConexao();
        }
        public function buscarNomeUnidade($idUnidade)
        {
            $BD = new Conexao();
            $BD -> AbreConexao();
            global $pdo;
            global $alerta;
            try
            {
                $stmt = $pdo->query("SELECT u.nome FROM unidade u WHERE u.idUnidade = $idUnidade");
                while($row  = $stmt->fetch(PDO::FETCH_OBJ))
                {
                    // Assign each row of data to associative array
                    $nome = $row->nome;
                }
                return $nome;
            }
            catch(PDOException $e)
            {
                $_SESSION['erro'] = addslashes($e->getMessage());
                $alerta->voltaPagina();
            }
            $BD->FechaConexao();
        }
        public function buscarNomeUnidadeSilo($idSilo)
        {
            $BD = new Conexao();
            $BD -> AbreConexao();
            global $pdo;
            global $alerta;
            try
            {
                $stmt = $pdo->query("SELECT u.nome FROM silo s inner join unidade u on u.idUnidade = s.idUnidade WHERE s.idSilo = $idSilo");
                while($row  = $stmt->fetch(PDO::FETCH_OBJ))
                {
                    // Assign each row of data to associative array
                    $nome = $row->nome;
                }
                return $nome;
            }
            catch(PDOException $e)
            {
                $_SESSION['erro'] = addslashes($e->getMessage());
                $alerta->voltaPagina();
            }
            $BD->FechaConexao();
        }
        public function buscarUnidadeLider($login)
        {
            $BD = new Conexao();
            $BD -> AbreConexao();
            global $pdo;
            global $alerta;
            $unidades = array();
            // Attempt to query database table and retrieve data
            try
            {
                $stmt = $pdo->query("select un.idUnidade,un.nome from unidade un INNER JOIN usuario u ON u.idUnidade = un.idUnidade  WHERE u.login=\"$login\" and u.idTipo_Usuario = 6");
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
        public function buscarUnidadeLiderCadastro($login)
        {
            $BD = new Conexao();
            $BD -> AbreConexao();
            global $pdo;
            global $alerta;
            $unidades = array();
            // Attempt to query database table and retrieve data
            try
            {
                $stmt = $pdo->query("select un.idUnidade,un.nome from unidade un INNER JOIN usuario u ON u.idUnidade = un.idUnidade  WHERE u.login=\"$login\" and u.idTipo_Usuario = 6");
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
    }
?>
<?php    
    class Armazenagem 
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
        public function buscarArmazenagemTeste($idUnidade,$tipo)
        {
            $BD = new Conexao();
            $BD -> AbreConexao();
            global $pdo;
            global $alerta;
            $armazenagem = array();
            // Attempt to query database table and retrieve data
            try
            {
                $stmt = $pdo->query("CALL buscarArmazenagem($idArmazenagem,'$tipo')");  
                while($row  = $stmt->fetch(PDO::FETCH_OBJ))
                {
                    // Assign each row of data to associative array
                    $armazenagem[] = $row;
                }
                return $armazenagem[0];
            }
            catch(PDOException $e)
            {
                $_SESSION['erro'] = addslashes($e->getMessage());
                $alerta->voltaPagina();
            }
            $BD->FechaConexao();
        }
        public function CalcularOperacaoEstoque($idSilo,$idEstoque)
        {
            $BD = new Conexao();
            $BD -> AbreConexao();
            global $pdo;
            global $alerta;

            try
            {
                $stmt = $pdo->query("SELECT qtdEstoqueOperacao($idSilo,$idEstoque) as total");  
                while($row  = $stmt->fetch(PDO::FETCH_OBJ))
                {
                    // Assign each row of data to associative array
                    $resultado = $row;
                }
                return $resultado;
            }
            catch(PDOException $e)
            {
                $_SESSION['erro'] = addslashes($e->getMessage());
                $alerta->voltaPagina();
            }
            $BD->FechaConexao();
        }
        public function CalcularOperacaoEstoqueSaida($idEstoque)
        {
            $BD = new Conexao();
            $BD -> AbreConexao();
            global $pdo;
            global $alerta;

            try
            {
                $stmt = $pdo->query("SELECT qtd_final   FROM estoque e INNER JOIN registro_estoque re ON re.idRegistro_Estoque = e.idRegistroAtual WHERE e.idEstoque = $idEstoque;");  
                while($row  = $stmt->fetch(PDO::FETCH_OBJ))
                {
                    // Assign each row of data to associative array
                    $resultado = $row;
                }
                return $resultado;
            }
            catch(PDOException $e)
            {
                $_SESSION['erro'] = addslashes($e->getMessage());
                $alerta->voltaPagina();
            }
            $BD->FechaConexao();
        }
        public function buscarArmazenagem()
        {
            $BD = new Conexao();
            $BD -> AbreConexao();
            global $pdo;
            global $alerta;
            $armazenagem = array();
            // Attempt to query database table and retrieve data
            try
            {
                $stmt = $pdo->query("SELECT s.idSilo, s.nome, s.capacidade, u.idUnidade, u.nome as nomeUnidade, ts.nome as nomeArmazem FROM silo s INNER JOIN tipo_silo ts ON ts.idTipo_Silo = s.idTipo_Silo INNER JOIN unidade u on u.idUnidade = s.idUnidade");  
                while($row  = $stmt->fetch(PDO::FETCH_OBJ))
                {
                    // Assign each row of data to associative array
                    $armazenagem[] = $row;
                }
                return $armazenagem;
            }
            catch(PDOException $e)
            {
                $_SESSION['erro'] = addslashes($e->getMessage());
                $alerta->voltaPagina();
            }
            $BD->FechaConexao();
        }
        public function buscarSilo($idSilo)
        {
            $BD = new Conexao();
            $BD -> AbreConexao();
            global $pdo;
            global $alerta;
            $armazenagem = array();
            // Attempt to query database table and retrieve data
            try
            {
                $stmt = $pdo->query("SELECT s.*, p.idProduto FROM silo s inner join historico h on
                s.idSilo = h.idSilo inner join produto p on h.idProduto = p.idProduto 
                WHERE h.statusAtual = 1 and s.idSilo = $idSilo");  
                while($row  = $stmt->fetch(PDO::FETCH_OBJ))
                {
                    // Assign each row of data to associative array
                    $armazenagem[] = $row;
                }
                return $armazenagem;
            }
            catch(PDOException $e)
            {
                $_SESSION['erro'] = addslashes($e->getMessage());
                $alerta->voltaPagina();
            }
            $BD->FechaConexao();
        }
        public function buscarSafraUnica($idHistorico)
        {
            $BD = new Conexao();
            $BD -> AbreConexao();
            global $pdo;
            global $alerta;
            $armazenagem = array();
            // Attempt to query database table and retrieve data
            try
            {
                $stmt = $pdo->query("SELECT * FROM registro_troca_safra WHERE idregistro_troca_safra=$idHistorico");  
                while($row  = $stmt->fetch(PDO::FETCH_OBJ))
                {
                    // Assign each row of data to associative array
                    $armazenagem[] = $row;
                }
                return $armazenagem;
            }
            catch(PDOException $e)
            {
                $_SESSION['erro'] = addslashes($e->getMessage());
                $alerta->voltaPagina();
            }
            $BD->FechaConexao();
        }
        public function buscarArmazenagemUnidade($idUnidade)
        {
            $BD = new Conexao();
            $BD -> AbreConexao();
            global $pdo;
            global $alerta;
            $armazenagem = array();
            try
            {
                $stmt = $pdo->query("SELECT s.idSilo, s.nome, s.capacidade, u.idUnidade,u.nome as nomeUnidade,ts.nome as nomeArmazem FROM silo s INNER JOIN tipo_silo ts ON ts.idTipo_Silo = s.idTipo_Silo INNER JOIN unidade u on u.idUnidade = s.idUnidade WHERE idUnidade = $idUnidade");  
                while($row  = $stmt->fetch(PDO::FETCH_OBJ))
                {
                    // Assign each row of data to associative array
                    $armazenagem[] = $row;
                }
                return $armazenagem;
            }
            catch(PDOException $e)
            {
                $_SESSION['erro'] = addslashes($e->getMessage());
                $alerta->voltaPagina();
            }
            $BD->FechaConexao();
        }
        //Buscar Silo


        //Aeração
        public function buscarAeracaoSiloMensal($idSilo,$mes,$ano)
        {
            $BD = new Conexao();
            $BD -> AbreConexao();
            global $pdo;
            global $alerta;
            $aeracao = array();
            try
            {
                $stmt = $pdo->query("SELECT * FROM dados_aeracaounidade WHERE idSilo = $idSilo AND MONTH(data) = \"$mes\" and YEAR(data) = \"$ano\";");
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
        public function buscarAeracaoSiloDiario($idSilo,$data)
        {
            $BD = new Conexao();
            $BD -> AbreConexao();
            global $pdo;
            global $alerta;
            $aeracao = array();
            try
            {
                $stmt = $pdo->query("SELECT * FROM dados_aeracaounidade WHERE idSilo = $idSilo AND data = \"$data\"");
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
        public function buscarAeracaoSiloAnual($idSilo,$ano)
        {
            $BD = new Conexao();
            $BD -> AbreConexao();
            global $pdo;
            global $alerta;
            $aeracao = array();
            try
            {
                $stmt = $pdo->query("SELECT * FROM dados_aeracaounidade WHERE idSilo = $idSilo  and YEAR(data) = \"$ano\";");
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
        public function buscarAeracaoSiloSafra($idHistorico)
        {
            $BD = new Conexao();
            $BD -> AbreConexao();
            global $pdo;
            global $alerta;
            $aeracao = array();
            try
            {
                $stmt = $pdo->query("SELECT * FROM dados_aeracaounidade WHERE idHistorico = $idHistorico ;");
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
        public function buscarAeracaoSiloSafraDuplo($idHistorico,$idHistoricoNovo)
        {
            $BD = new Conexao();
            $BD -> AbreConexao();
            global $pdo;
            global $alerta;
            $aeracao = array();
            try
            {
                $stmt = $pdo->query("SELECT * FROM dados_aeracaounidade WHERE idHistorico = $idHistorico  or idHistorico =$idHistoricoNovo;");
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
        /*
        public function buscarAeracaoSiloSafraAltera($idHistorico)
        {
            $BD = new Conexao();
            $BD -> AbreConexao();
            global $pdo;
            global $alerta;
            $aeracao = array();
            try
            {
                $stmt = $pdo->query("SELECT * FROM dados_aeracaounidade WHERE idSilo = $idSilo  and YEAR(data) = \"$ano\";");
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
        }*/



        public function buscarEstoqueSilo($idSilo,$mes,$ano)
        {
            $BD = new Conexao();
            $BD -> AbreConexao();
            global $pdo;
            global $alerta;
            $estoque = array();

            try
            {
                $stmt = $pdo->query("SELECT *FROM dados_estoqueunidade WHERE idSilo = $idSilo  AND  MONTH(data) =\"$mes\" and YEAR(data)=\"$ano\"; ");
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


        //Estoque + Termometria + Padrao
        public function buscarETPMensal($idSilo,$mes,$ano)
        {
            $BD = new Conexao();
            $BD -> AbreConexao();
            global $pdo;
            global $alerta;
            $estoque = array();

            try
            {
                $stmt = $pdo->query("SELECT *FROM dados_estoque_transilagem_pp WHERE idSilo = $idSilo  AND  MONTH(data) =\"$mes\" and YEAR(data)=\"$ano\"; ");
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
        public function buscarETPAnual($idSilo,$ano)
        {
            $BD = new Conexao();
            $BD -> AbreConexao();
            global $pdo;
            global $alerta;
            $estoque = array();

            try
            {
                $stmt = $pdo->query("SELECT *FROM dados_estoque_transilagem_pp WHERE idSilo = $idSilo  AND   YEAR(data)=\"$ano\"; ");
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
        public function buscarETPDiario($idSilo,$data)
        {
            $BD = new Conexao();
            $BD -> AbreConexao();
            global $pdo;
            global $alerta;
            $estoque = array();

            try
            {
                $stmt = $pdo->query("SELECT *FROM dados_estoque_transilagem_pp WHERE idSilo = $idSilo  AND data =\"$data\"; ");
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
        public function buscarETPSafra($idHistorico)
        {
            $BD = new Conexao();
            $BD -> AbreConexao();
            global $pdo;
            global $alerta;
            $estoque = array();

            try
            {
                $stmt = $pdo->query("SELECT *FROM dados_estoque_transilagem_pp WHERE idHistorico = $idHistorico; ");
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
        public function buscarETPSafraDuplo($idHistorico,$idHistoricoNovo)
        {
            $BD = new Conexao();
            $BD -> AbreConexao();
            global $pdo;
            global $alerta;
            $estoque = array();

            try
            {
                $stmt = $pdo->query("SELECT *FROM dados_estoque_transilagem_pp WHERE idHistorico = $idHistorico or idHistorico = $idHistoricoNovo; ");
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
        /*public function buscarETPDiarioSafraAltera($idHistorico)
        {
            $BD = new Conexao();
            $BD -> AbreConexao();
            global $pdo;
            global $alerta;
            $estoque = array();

            try
            {
                $stmt = $pdo->query("SELECT *FROM dados_estoque_transilagem_pp WHERE idSilo = $idSilo  AND data =\"$data\"; ");
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
        }*/


        //Estoque
        public function buscarRegistroEstoqueMensal($idSilo,$mes,$ano)
        {
            $BD = new Conexao();
            $BD -> AbreConexao();
            global $pdo;
            global $alerta;
            $estoque = array();

            try
            {
                $stmt = $pdo->query("SELECT *FROM dados_Registro_Estoque WHERE idSilo = $idSilo  AND  MONTH(data) =\"$mes\" and YEAR(data)=\"$ano\"; ");
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
        public function buscarRegistroEstoqueAnual($idSilo,$ano)
        {
            $BD = new Conexao();
            $BD -> AbreConexao();
            global $pdo;
            global $alerta;
            $estoque = array();

            try
            {
                $stmt = $pdo->query("SELECT *FROM dados_Registro_Estoque WHERE idSilo = $idSilo  AND   YEAR(data)=\"$ano\"; ");
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
        public function buscarRegistroEstoqueDiario($idSilo,$data)
        {
            $BD = new Conexao();
            $BD -> AbreConexao();
            global $pdo;
            global $alerta;
            $estoque = array();

            try
            {
                $stmt = $pdo->query("SELECT *FROM dados_Registro_Estoque WHERE idSilo = $idSilo  AND  data =\"$data\" ; ");
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
        public function buscarRegistroEstoqueSafra($idHistorico)
        {
            $BD = new Conexao();
            $BD -> AbreConexao();
            global $pdo;
            global $alerta;
            $estoque = array();

            try
            {
                $stmt = $pdo->query("SELECT *FROM dados_Registro_Estoque WHERE idHistorico = $idHistorico   ; ");
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
        public function buscarRegistroEstoqueSafraDuplo($idHistorico,$idHistoricoNovo)
        {
            $BD = new Conexao();
            $BD -> AbreConexao();
            global $pdo;
            global $alerta;
            $estoque = array();

            try
            {
                $stmt = $pdo->query("SELECT *FROM dados_Registro_Estoque WHERE idHistorico = $idHistorico or idHistorico =$idHistoricoNovo; ");
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
        /*public function buscarRegistroEstoqueSafraAltera($idHistorico)
        {
            $BD = new Conexao();
            $BD -> AbreConexao();
            global $pdo;
            global $alerta;
            $estoque = array();

            try
            {
                $stmt = $pdo->query("SELECT *FROM dados_Registro_Estoque WHERE idHistorico = $idHistorico; ");
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
        }*/

        //Termometria + Aeracao + Transilagem
        public function buscarTermometriaAeraTransMensal($idSilo,$mes,$ano)
        {
            $BD = new Conexao();
            $BD -> AbreConexao();
            global $pdo;
            global $alerta;
            $estoque = array();

            try
            {
                $stmt = $pdo->query("SELECT *FROM dados_Termometria_Aera_Trans WHERE idSilo = $idSilo  AND  MONTH(data) =\"$mes\" and YEAR(data)=\"$ano\"; ");
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
        public function buscarTermometriaAeraTransDiario($idSilo,$data)
        {
            $BD = new Conexao();
            $BD -> AbreConexao();
            global $pdo;
            global $alerta;
            $estoque = array();

            try
            {
                $stmt = $pdo->query("SELECT *FROM dados_Termometria_Aera_Trans WHERE idSilo = $idSilo  AND  data =\"$data\"; ");
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
        public function buscarTermometriaAeraTransAnual($idSilo,$ano)
        {
            $BD = new Conexao();
            $BD -> AbreConexao();
            global $pdo;
            global $alerta;
            $estoque = array();

            try
            {
                $stmt = $pdo->query("SELECT *FROM dados_Termometria_Aera_Trans WHERE idSilo = $idSilo  AND  YEAR(data)=\"$ano\"; ");
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
        public function buscarTermometriaAeraTransSafra($idHistorico)
        {
            $BD = new Conexao();
            $BD -> AbreConexao();
            global $pdo;
            global $alerta;
            $estoque = array();

            try
            {
                $stmt = $pdo->query("SELECT *FROM dados_Termometria_Aera_Trans WHERE idHistorico = $idHistorico; ");
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
        public function buscarTermometriaAeraTransSafraDuplo($idHistorico,$idHistoricoNovo)
        {
            $BD = new Conexao();
            $BD -> AbreConexao();
            global $pdo;
            global $alerta;
            $estoque = array();

            try
            {
                $stmt = $pdo->query("SELECT *FROM dados_Termometria_Aera_Trans WHERE idHistorico = $idHistorico or idHistorico =$idHistoricoNovo; ");
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
        /*public function buscarTermometriaAeraTransSafraAltera($idHistorico)
        {
            $BD = new Conexao();
            $BD -> AbreConexao();
            global $pdo;
            global $alerta;
            $estoque = array();

            try
            {
                $stmt = $pdo->query("SELECT *FROM dados_Termometria_Aera_Trans WHERE idSilo = $idSilo  AND  YEAR(data)=\"$ano\"; ");
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
        }*/

        //Expurgo

        public function buscarExpurgoSiloMensal($idSilo,$mes,$ano)
        {
            $BD = new Conexao();
            $BD -> AbreConexao();
            global $pdo;
            global $alerta;
            $expurgo = array();

            try
            {
                $stmt = $pdo->query("SELECT *FROM  dados_expurgounidade WHERE idSilo = $idSilo  AND  MONTH(data) =\"$mes\" and YEAR(data)=\"$ano\"; ");
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
        public function buscarExpurgoSiloAnual($idSilo,$ano)
        {
            $BD = new Conexao();
            $BD -> AbreConexao();
            global $pdo;
            global $alerta;
            $expurgo = array();

            try
            {
                $stmt = $pdo->query("SELECT *FROM  dados_expurgounidade WHERE idSilo = $idSilo   and YEAR(data)=\"$ano\"; ");
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
        public function buscarExpurgoSiloDiario($idSilo,$data)
        {
            $BD = new Conexao();
            $BD -> AbreConexao();
            global $pdo;
            global $alerta;
            $expurgo = array();

            try
            {
                $stmt = $pdo->query("SELECT *FROM  dados_expurgounidade WHERE idSilo = $idSilo  AND  data =\"$data\"; ");
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
        public function buscarExpurgoSiloSafra($idHistorico)
        {
            $BD = new Conexao();
            $BD -> AbreConexao();
            global $pdo;
            global $alerta;
            $expurgo = array();

            try
            {
                $stmt = $pdo->query("SELECT *FROM  dados_expurgounidade WHERE idHistorico = $idHistorico ; ");
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
        public function buscarExpurgoSiloSafraDuplo($idHistorico,$idHistoricoNovo)
        {
            $BD = new Conexao();
            $BD -> AbreConexao();
            global $pdo;
            global $alerta;
            $expurgo = array();

            try
            {
                $stmt = $pdo->query("SELECT *FROM  dados_expurgounidade WHERE idHistorico = $idHistorico or idHistorico=$idHistoricoNovo ; ");
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
        /*public function buscarExpurgoSiloSafraAltera($idHistorico)
        {
            $BD = new Conexao();
            $BD -> AbreConexao();
            global $pdo;
            global $alerta;
            $expurgo = array();

            try
            {
                $stmt = $pdo->query("SELECT *FROM  dados_expurgounidade WHERE idSilo = $idSilo  AND  data =\"$data\"; ");
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
        }*/


        // Nebulizacao
        public function buscarNebulizacaoSiloMensal($idSilo,$mes,$ano)
        {
            $BD = new Conexao();
            $BD -> AbreConexao();
            global $pdo;
            global $alerta;
            $nebulizacao = array();

            try
            {
                $stmt = $pdo->query("SELECT *FROM dados_nebulizacaounidade WHERE idSilo=$idSilo  AND  MONTH(data) =\"$mes\" and YEAR(data)=\"$ano\"; ");
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
        public function buscarNebulizacaoSiloAnual($idSilo,$ano)
        {
            $BD = new Conexao();
            $BD -> AbreConexao();
            global $pdo;
            global $alerta;
            $nebulizacao = array();

            try
            {
                $stmt = $pdo->query("SELECT *FROM dados_nebulizacaounidade WHERE idSilo=$idSilo  and YEAR(data)=\"$ano\"; ");
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
        public function buscarNebulizacaoSiloDiario($idSilo,$data)
        {
            $BD = new Conexao();
            $BD -> AbreConexao();
            global $pdo;
            global $alerta;
            $nebulizacao = array();

            try
            {
                $stmt = $pdo->query("SELECT *FROM dados_nebulizacaounidade WHERE idSilo=$idSilo  AND  data =\"$data\" ; ");
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
        public function buscarNebulizacaoSiloSafra($idHistorico)
        {
            $BD = new Conexao();
            $BD -> AbreConexao();
            global $pdo;
            global $alerta;
            $nebulizacao = array();

            try
            {
                $stmt = $pdo->query("SELECT *FROM dados_nebulizacaounidade WHERE idHistorico=$idHistorico  ; ");
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
        public function buscarNebulizacaoSiloSafraDuplo($idHistorico,$idHistoricoNovo)
        {
            $BD = new Conexao();
            $BD -> AbreConexao();
            global $pdo;
            global $alerta;
            $nebulizacao = array();

            try
            {
                $stmt = $pdo->query("SELECT *FROM dados_nebulizacaounidade WHERE idHistorico=$idHistorico or idHistorico =$idHistoricoNovo ; ");
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
        /*public function buscarNebulizacaoSiloSafraAltera($idHistorico)
        {
            $BD = new Conexao();
            $BD -> AbreConexao();
            global $pdo;
            global $alerta;
            $nebulizacao = array();

            try
            {
                $stmt = $pdo->query("SELECT *FROM dados_nebulizacaounidade WHERE idSilo=$idSilo  AND  data =\"$data\" ; ");
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
        }*/


        //Pulverizacao
        public function buscarPulverizacaoSiloMensal($idSilo,$mes,$ano)
        {
            $BD = new Conexao();
            $BD -> AbreConexao();
            global $pdo;
            global $alerta;
            $pulverizacao = array();

            try
            {
                $stmt = $pdo->query("SELECT *FROM dados_pulverizacaounidade WHERE idSilo=$idSilo  AND  MONTH(data) =\"$mes\" and YEAR(data)=\"$ano\"; ");
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
        public function buscarPulverizacaoSiloAnual($idSilo,$ano)
        {
            $BD = new Conexao();
            $BD -> AbreConexao();
            global $pdo;
            global $alerta;
            $pulverizacao = array();

            try
            {
                $stmt = $pdo->query("SELECT *FROM dados_pulverizacaounidade WHERE idSilo=$idSilo  and YEAR(data)=\"$ano\"; ");
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
        public function buscarPulverizacaoSiloDiario($idSilo,$data)
        {
            $BD = new Conexao();
            $BD -> AbreConexao();
            global $pdo;
            global $alerta;
            $pulverizacao = array();

            try
            {
                $stmt = $pdo->query("SELECT *FROM dados_pulverizacaounidade WHERE idSilo=$idSilo  AND  data =\"$data\" ; ");
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
        public function buscarPulverizacaoSiloSafra($idHistorico)
        {
            $BD = new Conexao();
            $BD -> AbreConexao();
            global $pdo;
            global $alerta;
            $pulverizacao = array();

            try
            {
                $stmt = $pdo->query("SELECT *FROM dados_pulverizacaounidade WHERE idHistorico=$idHistorico ; ");
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
        public function buscarPulverizacaoSiloSafraDuplo($idHistorico,$idHistoricoNovo)
        {
            $BD = new Conexao();
            $BD -> AbreConexao();
            global $pdo;
            global $alerta;
            $pulverizacao = array();

            try
            {
                $stmt = $pdo->query("SELECT *FROM dados_pulverizacaounidade WHERE idHistorico=$idHistorico or idHistorico =$idHistoricoNovo; ");
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
        /*public function buscarPulverizacaoSiloSafraAltera($idHistorico)
        {
            $BD = new Conexao();
            $BD -> AbreConexao();
            global $pdo;
            global $alerta;
            $pulverizacao = array();

            try
            {
                $stmt = $pdo->query("SELECT *FROM dados_pulverizacaounidade WHERE idSilo=$idSilo  AND  data =\"$data\" ; ");
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
        }*/


        //Rastelagem
        public function buscarRastelagemSiloMensal($idSilo,$mes,$ano)
        {
            $BD = new Conexao();
            $BD -> AbreConexao();
            global $pdo;
            global $alerta;
            $rastelagem = array();

            try
            {
                $stmt = $pdo->query("SELECT *FROM dados_rastelagemunidade WHERE idSilo=$idSilo  AND  MONTH(data) =\"$mes\" and YEAR(data)=\"$ano\"; ");
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
        public function buscarRastelagemSiloAnual($idSilo,$ano)
        {
            $BD = new Conexao();
            $BD -> AbreConexao();
            global $pdo;
            global $alerta;
            $rastelagem = array();

            try
            {
                $stmt = $pdo->query("SELECT *FROM dados_rastelagemunidade WHERE idSilo=$idSilo  AND  YEAR(data)=\"$ano\"; ");
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
        public function buscarRastelagemSiloDiario($idSilo,$data)
        {
            $BD = new Conexao();
            $BD -> AbreConexao();
            global $pdo;
            global $alerta;
            $rastelagem = array();

            try
            {
                $stmt = $pdo->query("SELECT *FROM dados_rastelagemunidade WHERE idSilo=$idSilo  AND  data =\"$data\" ; ");
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
        public function buscarRastelagemSiloSafra($idHistorico)
        {
            $BD = new Conexao();
            $BD -> AbreConexao();
            global $pdo;
            global $alerta;
            $rastelagem = array();

            try
            {
                $stmt = $pdo->query("SELECT *FROM dados_rastelagemunidade WHERE idHistorico=$idHistorico  ; ");
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
        public function buscarRastelagemSiloSafraDuplo($idHistorico,$idHistoricoNovo)
        {
            $BD = new Conexao();
            $BD -> AbreConexao();
            global $pdo;
            global $alerta;
            $rastelagem = array();

            try
            {
                $stmt = $pdo->query("SELECT *FROM dados_rastelagemunidade WHERE idHistorico=$idHistorico or idHistorico=$idHistoricoNovo ; ");
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
        /*public function buscarRastelagemSiloSafraAltera($idHistorico)
        {
            $BD = new Conexao();
            $BD -> AbreConexao();
            global $pdo;
            global $alerta;
            $rastelagem = array();
            try
            {
                $stmt = $pdo->query("SELECT *FROM dados_rastelagemunidade WHERE idSilo=$idSilo  AND  data =\"$data\" ; ");
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
        }*/

        //Remaquinação
        public function buscarRemaquinacaoSiloMensal($idSilo,$mes,$ano)
        {
            $BD = new Conexao();
            $BD -> AbreConexao();
            global $pdo;
            global $alerta;
            $remaquinacao = array();

            try
            {
                $stmt = $pdo->query("SELECT *FROM dados_remaquinacoesunidade WHERE idSilo=$idSilo  AND  MONTH(data) =\"$mes\" and YEAR(data)=\"$ano\"; ");
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
        public function buscarRemaquinacaoSiloAnual($idSilo,$ano)
        {
            $BD = new Conexao();
            $BD -> AbreConexao();
            global $pdo;
            global $alerta;
            $remaquinacao = array();

            try
            {
                $stmt = $pdo->query("SELECT *FROM dados_remaquinacoesunidade WHERE idSilo=$idSilo  and YEAR(data)=\"$ano\"; ");
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
        public function buscarRemaquinacaoSiloDiario($idSilo,$data)
        {
            $BD = new Conexao();
            $BD -> AbreConexao();
            global $pdo;
            global $alerta;
            $remaquinacao = array();

            try
            {
                $stmt = $pdo->query("SELECT *FROM dados_remaquinacoesunidade WHERE idSilo=$idSilo  AND  data =\"$data\"; ");
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
        public function buscarRemaquinacaoSiloSafra($idHistorico)
        {
            $BD = new Conexao();
            $BD -> AbreConexao();
            global $pdo;
            global $alerta;
            $remaquinacao = array();

            try
            {
                $stmt = $pdo->query("SELECT *FROM dados_remaquinacoesunidade WHERE idHistorico=$idHistorico ; ");
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
        public function buscarRemaquinacaoSiloSafraDuplo($idHistorico,$idHistoricoNovo)
        {
            $BD = new Conexao();
            $BD -> AbreConexao();
            global $pdo;
            global $alerta;
            $remaquinacao = array();

            try
            {
                $stmt = $pdo->query("SELECT *FROM dados_remaquinacoesunidade WHERE idHistorico=$idHistorico or idHistorico=$idHistoricoNovo; ");
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
        /*public function buscarRemaquinacaoSiloSafraAltera($idHistorico)
        {
            $BD = new Conexao();
            $BD -> AbreConexao();
            global $pdo;
            global $alerta;
            $remaquinacao = array();

            try
            {
                $stmt = $pdo->query("SELECT *FROM dados_remaquinacoesunidade WHERE idSilo=$idSilo  AND  data =\"$data\"; ");
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
        }*/



       /* public function buscarSondagemSilo($idSilo,$mes,$ano)
        {
            $BD = new Conexao();
            $BD -> AbreConexao();
            global $pdo;
            global $alerta;
            $Sondagem = array();

            try
            {
                $stmt = $pdo->query("SELECT *FROM dados_sondagemunidade WHERE idSilo=$idSilo  AND  MONTH(data) =\"$mes\" and YEAR(data)=\"$ano\"; ");
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
        }*/

        //Sondagem Padrao
        public function buscarSondagem_PadraoMensal($idSilo,$mes,$ano)
        {
            $BD = new Conexao();
            $BD -> AbreConexao();
            global $pdo;
            global $alerta;
            $SondagemPP = array();

            try
            {
                $stmt = $pdo->query("SELECT *FROM dados_sondagem_padrao WHERE idSilo=$idSilo  AND  MONTH(data) =\"$mes\" and YEAR(data)=\"$ano\"; ");
                while($row  = $stmt->fetch(PDO::FETCH_OBJ))
                {
                    // Assign each row of data to associative array
                    $SondagemPP[] = $row;
                }
                return $SondagemPP;
            }
            catch(PDOException $e)
            {
                $_SESSION['erro'] = addslashes($e->getMessage());
                $alerta->voltaPagina();
            }
            $BD->FechaConexao();
        }
        public function buscarSondagem_PadraoAnual($idSilo,$ano)
        {
            $BD = new Conexao();
            $BD -> AbreConexao();
            global $pdo;
            global $alerta;
            $SondagemPP = array();

            try
            {
                $stmt = $pdo->query("SELECT *FROM dados_sondagem_padrao WHERE idSilo=$idSilo  and YEAR(data)=\"$ano\"; ");
                while($row  = $stmt->fetch(PDO::FETCH_OBJ))
                {
                    // Assign each row of data to associative array
                    $SondagemPP[] = $row;
                }
                return $SondagemPP;
            }
            catch(PDOException $e)
            {
                $_SESSION['erro'] = addslashes($e->getMessage());
                $alerta->voltaPagina();
            }
            $BD->FechaConexao();
        }
        public function buscarSondagem_PadraoDiario($idSilo,$data)
        {
            $BD = new Conexao();
            $BD -> AbreConexao();
            global $pdo;
            global $alerta;
            $SondagemPP = array();

            try
            {
                $stmt = $pdo->query("SELECT *FROM dados_sondagem_padrao WHERE idSilo=$idSilo  AND  data=\"$data\"; ");
                while($row  = $stmt->fetch(PDO::FETCH_OBJ))
                {
                    // Assign each row of data to associative array
                    $SondagemPP[] = $row;
                }
                return $SondagemPP;
            }
            catch(PDOException $e)
            {
                $_SESSION['erro'] = addslashes($e->getMessage());
                $alerta->voltaPagina();
            }
            $BD->FechaConexao();
        }
        public function buscarSondagem_PadraoSafra($idHistorico)
        {
            $BD = new Conexao();
            $BD -> AbreConexao();
            global $pdo;
            global $alerta;
            $SondagemPP = array();

            try
            {
                $stmt = $pdo->query("SELECT *FROM dados_sondagem_padrao WHERE idHistorico=$idHistorico ; ");
                while($row  = $stmt->fetch(PDO::FETCH_OBJ))
                {
                    // Assign each row of data to associative array
                    $SondagemPP[] = $row;
                }
                return $SondagemPP;
            }
            catch(PDOException $e)
            {
                $_SESSION['erro'] = addslashes($e->getMessage());
                $alerta->voltaPagina();
            }
            $BD->FechaConexao();
        }
        public function buscarSondagem_PadraoSafraDuplo($idHistorico,$idHistoricoNovo)
        {
            $BD = new Conexao();
            $BD -> AbreConexao();
            global $pdo;
            global $alerta;
            $SondagemPP = array();

            try
            {
                $stmt = $pdo->query("SELECT *FROM dados_sondagem_padrao WHERE idHistorico=$idHistorico or idHistorico=$idHistoricoNovo ; ");
                while($row  = $stmt->fetch(PDO::FETCH_OBJ))
                {
                    // Assign each row of data to associative array
                    $SondagemPP[] = $row;
                }
                return $SondagemPP;
            }
            catch(PDOException $e)
            {
                $_SESSION['erro'] = addslashes($e->getMessage());
                $alerta->voltaPagina();
            }
            $BD->FechaConexao();
        }  
        /*public function buscarSondagem_PadraoSafraAltera($idHistorico)
        {
            $BD = new Conexao();
            $BD -> AbreConexao();
            global $pdo;
            global $alerta;
            $SondagemPP = array();

            try
            {
                $stmt = $pdo->query("SELECT *FROM dados_sondagem_padrao WHERE idSilo=$idSilo  AND  data=\"$data\"; ");
                while($row  = $stmt->fetch(PDO::FETCH_OBJ))
                {
                    // Assign each row of data to associative array
                    $SondagemPP[] = $row;
                }
                return $SondagemPP;
            }
            catch(PDOException $e)
            {
                $_SESSION['erro'] = addslashes($e->getMessage());
                $alerta->voltaPagina();
            }
            $BD->FechaConexao();
        }  */  

        //Sondagem Termometria
        public function buscarSondagem_TermometriaMensal($idSilo,$mes,$ano)
        {
            $BD = new Conexao();
            $BD -> AbreConexao();
            global $pdo;
            global $alerta;
            $Sondagem = array();

            try
            {
                $stmt = $pdo->query("SELECT *FROM dados_sondagem_termometria WHERE idSilo=$idSilo  AND  MONTH(data) =\"$mes\" and YEAR(data)=\"$ano\"; ");
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
        public function buscarSondagem_TermometriaAnual($idSilo,$ano)
        {
            $BD = new Conexao();
            $BD -> AbreConexao();
            global $pdo;
            global $alerta;
            $Sondagem = array();

            try
            {
                $stmt = $pdo->query("SELECT *FROM dados_sondagem_termometria WHERE idSilo=$idSilo and YEAR(data)=\"$ano\"; ");
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
        public function buscarSondagem_TermometriaDiario($idSilo,$data)
        {
            $BD = new Conexao();
            $BD -> AbreConexao();
            global $pdo;
            global $alerta;
            $Sondagem = array();

            try
            {
                $stmt = $pdo->query("SELECT *FROM dados_sondagem_termometria WHERE idSilo=$idSilo   and data=\"$data\"; ");
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
        public function buscarSondagem_TermometriaSafra($idHistorico)
        {
            $BD = new Conexao();
            $BD -> AbreConexao();
            global $pdo;
            global $alerta;
            $Sondagem = array();

            try
            {
                $stmt = $pdo->query("SELECT *FROM dados_sondagem_termometria WHERE idHistorico=$idHistorico ; ");
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
        public function buscarSondagem_TermometriaSafraDuplo($idHistorico,$idHistoricoNovo)
        {
            $BD = new Conexao();
            $BD -> AbreConexao();
            global $pdo;
            global $alerta;
            $Sondagem = array();

            try
            {
                $stmt = $pdo->query("SELECT *FROM dados_sondagem_termometria WHERE idHistorico=$idHistorico or idHistorico=$idHistoricoNovo ; ");
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
        /*public function buscarSondagem_TermometriaSafraAltera($idSilo,$data)
        {
            $BD = new Conexao();
            $BD -> AbreConexao();
            global $pdo;
            global $alerta;
            $Sondagem = array();

            try
            {
                $stmt = $pdo->query("SELECT *FROM dados_sondagem_termometria WHERE idSilo=$idSilo   and data=\"$data\"; ");
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
        }*/

        //Termometria
        public function buscarTermometriaSiloMensal($idSilo,$mes,$ano)
        {
            $BD = new Conexao();
            $BD -> AbreConexao();
            global $pdo;
            global $alerta;
            $termometria = array();

            try
            {
                $stmt = $pdo->query("SELECT *FROM  dados_termometriaunidade WHERE idSilo=$idSilo  AND  MONTH(data) =\"$mes\" and YEAR(data)=\"$ano\"; ");
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
        public function buscarTermometriaSiloAnual($idSilo,$ano)
        {
            $BD = new Conexao();
            $BD -> AbreConexao();
            global $pdo;
            global $alerta;
            $termometria = array();

            try
            {
                $stmt = $pdo->query("SELECT *FROM  dados_termometriaunidade WHERE idSilo=$idSilo   and YEAR(data)=\"$ano\"; ");
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
        public function buscarTermometriaSiloSafra($idHistorico)
        {
            $BD = new Conexao();
            $BD -> AbreConexao();
            global $pdo;
            global $alerta;
            $termometria = array();

            try
            {
                $stmt = $pdo->query("SELECT *FROM  dados_termometriaunidade WHERE idHistorico=$idHistorico ");
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
        public function buscarTermometriaSiloSafraDuplo($idHistorico,$idHistoricoNovo)
        {
            $BD = new Conexao();
            $BD -> AbreConexao();
            global $pdo;
            global $alerta;
            $termometria = array();

            try
            {
                $stmt = $pdo->query("SELECT *FROM  dados_termometriaunidade WHERE idHistorico=$idHistorico or idHistorico = $idHistoricoNovo; ");
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
        public function buscarTermometriaSiloDiario($idSilo,$data)
        {
            $BD = new Conexao();
            $BD -> AbreConexao();
            global $pdo;
            global $alerta;
            $termometria = array();

            try
            {
                $stmt = $pdo->query("SELECT *FROM  dados_termometriaunidade WHERE idSilo=$idSilo  AND  data =\"$data\"; ");
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
        
        //Tratamento Fita
        public function buscarTratamentoFitaSiloMensal($idSilo,$mes,$ano)
        {
            $BD = new Conexao();
            $BD -> AbreConexao();
            global $pdo;
            global $alerta;
            $TratamentoFita = array();

            try
            {
                $stmt = $pdo->query("SELECT *FROM dados_tratamentofitaunidade WHERE idSilo=$idSilo  AND  MONTH(data) =\"$mes\" and YEAR(data)=\"$ano\"; ");
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
        public function buscarTratamentoFitaSiloDiario($idSilo,$data)
        {
            $BD = new Conexao();
            $BD -> AbreConexao();
            global $pdo;
            global $alerta;
            $TratamentoFita = array();

            try
            {
                $stmt = $pdo->query("SELECT *FROM dados_tratamentofitaunidade WHERE idSilo=$idSilo  AND  data =\"$data\"; ");
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
        public function buscarTratamentoFitaSiloAnual($idSilo,$ano)
        {
            $BD = new Conexao();
            $BD -> AbreConexao();
            global $pdo;
            global $alerta;
            $TratamentoFita = array();

            try
            {
                $stmt = $pdo->query("SELECT *FROM dados_tratamentofitaunidade WHERE idSilo=$idSilo  and YEAR(data)=\"$ano\"; ");
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
        public function buscarTratamentoFitaSiloSafra($idHistorico)
        {
            $BD = new Conexao();
            $BD -> AbreConexao();
            global $pdo;
            global $alerta;
            $TratamentoFita = array();

            try
            {
                $stmt = $pdo->query("SELECT *FROM dados_tratamentofitaunidade WHERE idHistorico = $idHistorico ; ");
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
        public function buscarTratamentoFitaSiloSafraDuplo($idHistorico,$idHistoricoNovo)
        {
            $BD = new Conexao();
            $BD -> AbreConexao();
            global $pdo;
            global $alerta;
            $TratamentoFita = array();

            try
            {
                $stmt = $pdo->query("SELECT *FROM dados_tratamentofitaunidade WHERE idHistorico = $idHistorico or idHistorico=$idHistoricoNovo ; ");
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

        //Transilagem
        public function buscarTransilagemSiloAnual($idSilo,$ano)
        {
            $BD = new Conexao();
            $BD -> AbreConexao();
            global $pdo;
            global $alerta;
            $Transilagem = array();

            try
            {
                $stmt = $pdo->query("SELECT *FROM dados_transilagemunidade WHERE idSilo=$idSilo and YEAR(data)=\"$ano\"; ");
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
        public function buscarTransilagemSiloDiario($idSilo,$data)
        {
            $BD = new Conexao();
            $BD -> AbreConexao();
            global $pdo;
            global $alerta;
            $Transilagem = array();

            try
            {
                $stmt = $pdo->query("SELECT *FROM dados_transilagemunidade WHERE idSilo=$idSilo  and data=\"$data\"; ");
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
        public function buscarTransilagemSiloMensal($idSilo,$mes,$ano)
        {
            $BD = new Conexao();
            $BD -> AbreConexao();
            global $pdo;
            global $alerta;
            $Transilagem = array();

            try
            {
                $stmt = $pdo->query("SELECT *FROM dados_transilagemunidade WHERE idSilo=$idSilo  AND  MONTH(data) =\"$mes\" and YEAR(data)=\"$ano\"; ");
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
        public function buscarTransilagemSiloSafra($idHistorico)
        {
            $BD = new Conexao();
            $BD -> AbreConexao();
            global $pdo;
            global $alerta;
            $Transilagem = array();

            try
            {
                $stmt = $pdo->query("SELECT *FROM dados_transilagemunidade WHERE idHistorico=$idHistorico ; ");
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
        public function buscarTransilagemSiloSafraDuplo($idHistorico,$idHistoricoNovo)
        {
            $BD = new Conexao();
            $BD -> AbreConexao();
            global $pdo;
            global $alerta;
            $Transilagem = array();

            try
            {
                $stmt = $pdo->query("SELECT *FROM dados_transilagemunidade WHERE idHistorico=$idHistorico or idHistorico =$idHistoricoNovo ; ");
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
        



        public function carregarArmazenagem($idSilo)
        {
            $BD = new Conexao();
            $BD -> AbreConexao();
            global $pdo;
            global $alerta;
            $silo = array();
            // Attempt to query database table and retrieve data
            try
            {
                $stmt = $pdo->query("select s.nome, s.idtipo_silo, s.numCabos from silo s where s.idSilo = $idSilo");
                while($row  = $stmt->fetch(PDO::FETCH_OBJ))
                {
                    // Assign each row of data to associative array
                    $silo[] = $row;
                }
                return $silo[0];
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
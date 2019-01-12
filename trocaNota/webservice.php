<?php
    header('Access-Control-Allow-Origin: *');

    include 'Conexao.php';
    include 'persistencia.php';

    $persist = new Persistencia();
    $conexao = new Conexao();


    $conexao->AbreConexao();
    global $pdo;
    $acao = $_REQUEST['acao'];

    switch ($acao) 
    {
        // Case usado para fazer login de parametro vem o login ea senha mandados do app para o webService 
        case 'login':

            $login    = $_REQUEST['login'];
            $senha    = $_REQUEST['senha'];
            $tipoUser = '';

            try 
            {
                // Construção da query 
                $stmt = $pdo->query("CALL ValidarLogin(\"$login\",\"$senha\")");
                while ($row = $stmt->fetch(PDO::FETCH_OBJ)) 
                {
                    $infoUser["idUsuario"] = $row->idUsuario;
                    $infoUser["nome"] = $row->nome;
                    $infosUser[] = $infoUser;
                }

                if ($infosUser == null) {

                    echo json_encode("erro");
                }
                else{
                    // Valor retornado ao app, infosUser é uma JSON que vai preenchida com o id e nome do usuario
                    echo json_encode($infosUser);
                }
            }
            catch (PDOException $e) {
                echo $e->getMessage();
            }
            $pdo = null;
        break;
        
        // Case para buscar os produtos nao utiliza nenhum parametro
        case 'buscarProdutos':
            
            try {
                // Construção da query 
                $stmt = $pdo->query("select * from produto");
                while ($row = $stmt->fetch(PDO::FETCH_OBJ)) {

                    $produto["idproduto"]   = $row->idproduto;
                    $produto["nome"] = $row->nome;
                    $produto["constante_quebra"] = $row->constante_quebra;
                    $produtos[]      = $produto;
                    
                }
                // Valor retornado ao app, produtos é uma JSON que vai preenchida com o id, nome e constante de quebra do produto
                echo json_encode($produtos);
                
            }

            catch (PDOException $e) {
                echo $e->getMessage();
            }
            $pdo = null;
        break;

        // Case para buscar os fatores é utilizado o id do produto para buscar os fatores, esse id vem do app
        case 'buscarFatores':
            
            $idProduto    = $_REQUEST['idProduto'];

            try {
                // Construção da query 
                $stmt = $pdo->query("CALL BuscarFatores($idProduto)");
                while ($row = $stmt->fetch(PDO::FETCH_OBJ)) {

                    $fatorNome["idFator"]   = $row->idfator;
                    $fatorNome["nome"]      = $row->nome;
                    $fatorNome["padrao"]    = $row->padrao;
                    $fatorNomes[]           = $fatorNome;
                }
                // Valor retornado ao app, fatorNomes é uma JSON que vai preenchida com o id, nome e padrao do fator
                echo json_encode($fatorNomes);
                
            }

            catch (PDOException $e) {
                echo $e->getMessage();
            }
            $pdo = null;
        break;
        
        // Case para gravar um laudo no banco de dados
        case 'enviarLaudo':

            $infoTransporte     = $_REQUEST['infoTransporte'];
            $infoClassificacao  = $_REQUEST['infoClassificacao'];

            try 
            {
                // Construção da query 
                $stmt = $pdo->query($persist->ChamarProcedimentoJsonLaudo($infoTransporte,'EnviarLaudo',$last_id));
                while ($row = $stmt->fetch(PDO::FETCH_OBJ)) 
                {
                    $idLaudo = $row->idLaudo;
                }
                $stmt->closeCursor();
                $stmt = $pdo->query($persist->ChamarProcedimentoJsonFator($infoClassificacao,'EnviarFator'));
                // Valor retornado ao app, é retornado o id do laudo gerado acima 
                echo json_encode($idLaudo);
            }

            catch (PDOException $e) {
                echo $e->getMessage();
            }
            $pdo = null;
        break;

        // Case para buscar os laudos gerados pelo usuario
        case 'buscarLaudo':
            
            $idUser    = $_REQUEST['idUser'];

            try 
            {
                // Construção da query 
                $stmt = $pdo->query("CALL BuscarLaudo($idUser)");
                while ($row = $stmt->fetch(PDO::FETCH_OBJ)) 
                {

                    $laudo["idlaudo"]         = $row->idlaudo;
                    $laudo["idTransporte"]    = $row->idTransporte;
                    $laudo["data"]            = $row->data;
                    $laudo["cliente"]         = $row->cliente;
                    $laudo["tipo_acao"]       = $row->tipo_acao;
                    $laudo["os"]              = $row->numOs;
                    $laudo["nome"]            = $row->nome;
                    $laudos[]                 = $laudo;
                }
                // Valor retornado ao app, laudos é uma JSON que vai preenchida com o id, id do transporte, data, id do cliente,
                // tipo da acao (despacho ou recebimento), numero da ordem de serviço e nome do cliente do laudo
                echo json_encode($laudos);
            }
            catch (PDOException $e) 
            {
                echo $e->getMessage();
            }
            $pdo = null;
        break;
        
        // Case para buscar os clientes do usuario
        case 'buscarClientes':
            try 
            {
                // Construção da query 
                $stmt = $pdo->query("CALL BuscarClientes()");
                while ($row = $stmt->fetch(PDO::FETCH_OBJ)) 
                {

                    $cliente["idlaudo"]         = $row->idUsuario;
                    $cliente["nome"]            = $row->nome;
                    $clientes[]                 = $cliente;
                }
                // Valor retornado ao app, clientes é uma JSON que vai preenchida com o id do laudo e nome do cliente
                echo json_encode($clientes);
            }
            catch (PDOException $e) 
            {
                echo $e->getMessage();
            }
            $pdo = null;
        break;

        // Case para buscar as ordens de servico
        case 'buscarTodasOS':
            try 
            {
                // Construção da query 
                $stmt = $pdo->query("CALL buscarTodasOs()");
                while ($row = $stmt->fetch(PDO::FETCH_OBJ)) 
                {
                    $osu["id"]           = $row->idOs ;
                    $osu["cliente"]      = $row->cliente;
                    $osu["numOS"]        = $row->numOs;
                    $osu["clienteNome"]  = $row->clienteNome;
                    $osu["cpf"]          = $row->cpf;
                    $osu["cidade"]       = $row->cidade;
                    $osu["estado"]       = $row->estado;
                    $osu["furos"]       = $row->furos;
                    $os[]              = $osu;
                }
                // Valor retornado ao app, os é uma JSON que vai preenchida com o id do orden de serviço, id do cliente, numero da orden de serviço,
                // nome do cliente, cpf do cliente, cidade e estado do cliente
                echo json_encode($os);
            }
            catch (PDOException $e) 
            {
                echo $e->getMessage();
            }
            $pdo = null;
        break;
    }
?>
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
        case 'login':

            $login    = $_REQUEST['login'];
            $senha    = $_REQUEST['senha'];
            $tipoUser = '';
            try 
            {
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
                    echo json_encode($infosUser);
                }
            }
            catch (PDOException $e) {
                echo $e->getMessage();
            }
            $pdo = null;
        break;

        case 'enviarLaudo':
            $infoTransporte     = $_REQUEST['infoTransporte'];
            try 
            {
                $stmt = $pdo->query($persist->ChamarProcedimentoJsonLaudo($infoTransporte,'EnviarLaudoDepot'));
                while ($row = $stmt->fetch(PDO::FETCH_OBJ)) 
                {
                    $idLaudo = $row->id;
                }
                $stmt->closeCursor();
                echo json_encode($idLaudo);
            }

            catch (PDOException $e) {
                echo $e->getMessage();
            }
            $pdo = null;
        break;

        case 'buscarLaudo':
            try 
            {
                $idUser    = $_REQUEST['idUser'];
                $stmt = $pdo->query("CALL BuscarLaudo($idUser)");
                while ($row = $stmt->fetch(PDO::FETCH_OBJ)) 
                {

                    $produto["idlaudo"]         = $row->idlaudo;
                    $produto["idTransporte"]    = $row->idTransporte;
                    $produto["data"]            = $row->data;
                    $produto["cliente"]         = $row->cliente;
                    $produto["tipo_acao"]       = $row->tipo_acao;
                    $produto["os"]              = $row->numOs;
                    $produto["nome"]            = $row->nome;
                    $produtos[]                 = $produto;
                }
                echo json_encode($produtos);
            }
            catch (PDOException $e) 
            {
                echo $e->getMessage();
            }
            $pdo = null;
        break;
    }
?>
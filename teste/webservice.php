<?php
    if (session_status() == PHP_SESSION_NONE) 
    {
        session_start();
    }
    if(!class_exists('Conexao'))
    {
        include 'bela-admin/pag/ClassPHP/Conexao.php';
        $conexao = new Conexao();
    }
    if(!class_exists('AlertaUsuario'))
    {
        include 'bela-admin/pag/ClassPHP/Alerta.php';
        $alerta = new AlertaUsuario();
    }
    global $conexao;
    $conexao = new Conexao();
    $conexao->AbreConexao();
    global $pdo;
    if(isset($_REQUEST['web']))
    {
        $acao = $_REQUEST['acao'];
        // filter functions.
        switch ($acao) 
        {
            case 'login':
                // getting parameters
                $login = $_POST['login'];
                $senha = sha1($_POST['senha']);
                $_SESSION['login'] = $login; 
                $_SESSION['senha'] = $senha; 
                $nome = '';
                // Attempt to query database table and retrieve data
                try
                {
                    $stmt = $pdo->query("CALL ValidarLogin(\"$login\",\"$senha\")");
                    while($row  = $stmt->fetch(PDO::FETCH_OBJ))
                    {
                        // Assign each row of data to associative array
                        $nome = $row->tipo;
                        if($row->turno != null)
                        {
                            $_SESSION['turno'] = $row->turno;
                        }
                    }
                    // checking if there is any account with that data
                    if($nome === '')
                    {
                        $_SESSION['erro'] = "Login ou senha erradas";
                        $alerta->voltaPagina();
                    } 
                    else
                    {
                        // checking if the user can acess this aplication
                        if($nome === 'Operador')
                        {
                            $_SESSION['tipo'] = $nome;
                            $_SESSION['logado'] = true;
                            header("Location:bela-admin/pag/apontamentos.php?usuario=operador");
                        }
                        else if($nome === 'Analista')
                        {
                            //Return data as JSON
                            $_SESSION['tipo'] = $nome;
                            $_SESSION['logado'] = true;
                            header("Location:bela-admin/pag/index.php?usuario=analista");
                        }
                        else if($nome === 'Gerente')
                        {
                            //Return data as JSON
                            $_SESSION['tipo'] = $nome;
                            $_SESSION['logado'] = true;
                            header("Location:bela-admin/pag/index.php?usuario=gerente");
                        }
                        else if($nome === 'Coordenador')
                        {
                            //Return data as JSON
                            $_SESSION['tipo'] = $nome;
                            $_SESSION['logado'] = true;
                            header("Location:bela-admin/pag/index.php?usuario=coordenador");
                        }
                        else if($nome === 'Lider Operacional')
                        {
                            //Return data as JSON
                            $_SESSION['tipo'] = $nome;
                            $_SESSION['logado'] = true;
                            header("Location:bela-admin/pag/indexLider.php?usuario=tecnico");
                        }
                        else
                        {
                            //Return data as JSON
                            $_SESSION['tipo'] = $nome;
                            $_SESSION['logado'] = true;
                            header("Location:bela-admin/pag/index.php?usuario=moderador");
                        }
                    }
                }
                catch(PDOException $e)
                {
                    $_SESSION['erro'] = addslashes($e->getMessage());
                    $alerta->voltaPagina();
                }
                $conexao->FechaConexao();
                break;
            case 'logout':
                unset($_SESSION['login']); 
                unset($_SESSION['senha']); 
                unset($_SESSION['logado']); 
                header("Location:login.php");
                break;    
            case 'recuperaSenha':
                try
                {
                    $login = $_POST['login'];
                    $email = $_POST['email'];
                    $id = "";
                    $stmt = $pdo->query("CALL RecuperarSenha(\"$login\",\"$email\")");
                    while($row  = $stmt->fetch(PDO::FETCH_OBJ))
                    {
                        // Assign each row of data to associative array
                        $id = $row->idchave_recuperacao;
                    }
                    if($id === "")
                    {
                        $_SESSION['erro'] = "Login ou email não cadastrados!";
                        $alerta->voltaPagina();
                    }
                    else 
                    {
                        $link    = "sbr-smartfile.com.br/modificarSenha.php?token=".base64_encode($id);
                        $to      = $email;
                        $subject = 'Recuperação de Senha da sua conta SmartFile';
                        $message = '<html>
                            <head>Olá, foi solicitado a recuperação de senha para sua conta SmartFile "'.$login.'".</head>
                            <body>
                                Para recuperar a senha <a href=\''.$link.'\'>clique aqui</a> ou entre no link: '.$link.' e cadastre sua nova senha.<br/> 
                                Favor não responder este email. <br/>
                                A SBR agradece sua compreensão. <br/><br/><br/>
                                Atenciosamente, equipe SmartFile.<br/>
                            </body>
                        </html>';
                        $headers  = 'MIME-Version: 1.0' . "\r\n";
                        $headers .= 'Content-type: text/html; charset=utf-8'."\r\n";
                        $headers .= 'From: contato@sbr-smartfile.com.br' . "\r\n" .
                        'Reply-To: contato@sbr-smartfile.com.br' . "\r\n" .
                        'X-Mailer: PHP/' . phpversion();
                        $enviaremail = mail($to, $subject, $message, $headers);
                        if($enviaremail)
                        {
                            header("Location:confirmaRecuperacao.php");
                        }
                        else
                        {
                            $_SESSION['erro'] = "Não foi possível enviar o email.";
                            $alerta->voltaPagina();
                        }
                    }
                }
                catch(PDOException $e)
                {
                    $_SESSION['erro'] = "Login ou email não cadastrados!";
                    $alerta->voltaPagina();
                }
                $conexao->FechaConexao();
                break;    
            case 'validarToken':
                try
                {
                    $token = $_REQUEST['token'];
                    global $id;
                    $id = "";
                    $verifica = false;
                    $stmt = $pdo->query("select idUsuario from chave_recuperacao where status = 0 and idchave_recuperacao = $token");
                    while($row  = $stmt->fetch(PDO::FETCH_OBJ))
                    {
                        // Assign each row of data to associative array
                        $id = $row->idUsuario;
                        $verifica = true;
                    }
                }
                catch(PDOException $e)
                {
                    $_SESSION['erro'] = "Token inválido";
                    $alerta->voltaPagina();
                }
                $conexao->FechaConexao();
                break;   
            case 'alteraSenha':
                try
                {
                    $senhaNova = sha1($_POST['senha']);
                    $id = $_REQUEST['id'];
                    $token = $_REQUEST['token'];
                    $verifica = false;
                    $stmt = $pdo->query("update usuario set senha = \"".$senhaNova."\" where idUsuario = ".$id.";");
                    $stmt = $pdo->query("update chave_recuperacao set status = 1 where idchave_recuperacao = ".$token.";");
                    header("Location:confirmaAlteracao.php");
                }
                catch(PDOException $e)
                {
                    $_SESSION['erro'] = "Falha na alteração";
                    $alerta->voltaPagina();
                }
                $conexao->FechaConexao();
                break;     
            case 'InserirUsuario' :
                $nome        = $_POST['nome'];
                $cpf         = $_POST['cpf'];
                $email       = $_POST['email'];
                $login       = $_POST['login'];
                $senha       = sha1($_POST['senha']);
                $tel         = $_POST['telefone'];
                $cel         = $_POST['celular'];
                $cep         = $_POST['cep'];
                $endereco    = $_POST['endereco'];
                $estado      = $_POST['estado'];
                $cidade      = $_POST['cidade'];
                $obs         = $_POST['obs'];
                $tipo        = $_POST['tipo'];
                $dataNasc    = $_POST['dataNasc'];
                $idUnidade   = $_POST['unidade'];
                $status      = 1;
                // Attempt to query database table and retrieve data
                try
                {
                    $stmt = $pdo->query("call InserirUsuario(\"$nome\", \"$cpf\", \"$dataNasc\",\"$tel\", \"$cep\", \"$cel\",$tipo,\"$login\",\"$senha\",\"$status\",\"$obs\",\"$email\",\"$endereco\",\"$cidade\",\"$estado\")");
                    header("Location:bela-admin/pag/Cadastro/CadastroUsuario.php");
                }
                catch(PDOException $e)
                {
                    if(strpos($e->getMessage(), "SQLSTATE[23000]") !== false)
                    {
                        $_SESSION['erro'] = "Login já existente! Tente outro.";
                        $alerta->voltaPagina();
                    }
                    else
                    {
                        $_SESSION['erro'] = addslashes($e->getMessage());
                        $alerta->voltaPagina();
                    }
                }
                $conexao->FechaConexao();
                break;
            case 'InserirInseticida' :
                $nome           = $_POST['nome'];
                $dosagemPadrao  = $_POST['dosagemPadrao'];
                $unidadeMedida  = $_POST['unidadeMedida'];
                $codigo         = $_POST['codigo'];
                // Attempt to query database table and retrieve data
                try
                {
                    $stmt = $pdo->query("insert into Inseticida (nome, dosagem_padrao, unidade_medida, codigo) 
                    values (\"$nome\", $dosagemPadrao, \"$unidadeMedida\", \"$codigo\");");
                    header("Location:bela-admin/pag/Cadastro/CadastroInseticida.php");
                }
                catch(PDOException $e)
                {
                    $_SESSION['erro'] = addslashes($e->getMessage());
                    $alerta->voltaPagina();
                }
                $conexao->FechaConexao();
                break;
            case 'AlterarInseticida' :
                $nome           = $_POST['nome'];
                $dosagemPadrao  = $_POST['dosagemPadrao'];
                $unidadeMedida  = $_POST['unidadeMedida'];
                $codigo         = $_POST['codigo'];
                $id             = $_REQUEST['id'];
                // Attempt to query database table and retrieve data
                try
                {
                    $stmt = $pdo->query("update Inseticida set nome = \"$nome\", dosagem_padrao = $dosagemPadrao,
                    unidade_medida = \"$unidadeMedida\", codigo = \"$codigo\" where idInseticida = $id;");
                    header("Location:bela-admin/pag/Cadastro/CadastroInseticida.php");
                }
                catch(PDOException $e)
                {
                    $_SESSION['erro'] = addslashes($e->getMessage());
                    $alerta->voltaPagina();
                }
                $conexao->FechaConexao();
                break;
            case 'InserirUsuarioOperador' :
                $nome        = $_POST['nome'];
                $cpf         = $_POST['cpf'];
                $email       = $_POST['email'];
                $login       = $_POST['login'];
                $senha       = sha1($_POST['senha']);
                $tel         = $_POST['telefone'];
                $cel         = $_POST['celular'];
                $cep         = $_POST['cep'];
                $endereco    = $_POST['endereco'];
                $estado      = $_POST['estado'];
                $cidade      = $_POST['cidade'];
                $obs         = $_POST['obs'];
                $tipo        = $_POST['tipo'];
                $dataNasc    = $_POST['dataNasc'];
                $idUnidade   = $_POST['unidade'];
                $turno       = $_POST['turno'];
                if($tipo =="Operador")
                {
                    $numTipo = 3;
                }
                $status      = 1;
                // Attempt to query database table and retrieve data
                try
                {
                    $stmt = $pdo->query("call InserirUsuarioOperador(\"$nome\", \"$cpf\", \"$dataNasc\",\"$tel\", \"$cep\", \"$cel\",$numTipo,\"$login\",\"$senha\",\"$status\",\"$obs\",\"$email\",\"$endereco\",$idUnidade,\"$cidade\",\"$estado\",$turno)");
                    header("Location:bela-admin/pag/Cadastro/CadastroUsuarioOperador.php");
                }
                catch(PDOException $e)
                {
                    if(strpos($e->getMessage(), "SQLSTATE[23000]") !== false)
                    {
                        $_SESSION['erro'] = "Login já existente! Tente outro.";
                        $alerta->voltaPagina();
                    }
                    else
                    {
                        $_SESSION['erro'] = addslashes($e->getMessage());
                        $alerta->voltaPagina();
                    }
                }
                $conexao->FechaConexao();
                break;
            case 'InserirUsuarioLider' :
                $nome        = $_POST['nome'];
                $cpf         = $_POST['cpf'];
                $email       = $_POST['email'];
                $login       = $_POST['login'];
                $senha       = sha1($_POST['senha']);
                $tel         = $_POST['telefone'];
                $cel         = $_POST['celular'];
                $cep         = $_POST['cep'];
                $endereco    = $_POST['endereco'];
                $estado      = $_POST['estado'];
                $cidade      = $_POST['cidade'];
                $obs         = $_POST['obs'];
                $tipo        = 6;
                $dataNasc    = $_POST['dataNasc'];
                $idUnidade   = $_POST['unidade'];
                if($tipo =="Lider Operacional")
                {
                    $numTipo = 6;
                }
                $status      = 1;
                // Attempt to query database table and retrieve data
                try
                {
                    $stmt = $pdo->query("call InserirUsuario(\"$nome\", \"$cpf\", \"$dataNasc\",\"$tel\", \"$cep\", \"$cel\",$tipo,\"$login\",\"$senha\",\"$status\",\"$obs\",\"$email\",\"$endereco\",\"$cidade\",\"$estado\")");
                    header("Location:bela-admin/pag/Cadastro/CadastroUsuarioLider.php");
                }
                catch(PDOException $e)
                {
                    if(strpos($e->getMessage(), "SQLSTATE[23000]") !== false)
                    {
                        $_SESSION['erro'] = "Login já existente! Tente outro.";
                        $alerta->voltaPagina();
                    }
                    else
                    {
                        $_SESSION['erro'] = addslashes($e->getMessage());
                        $alerta->voltaPagina();
                    }
                }
                $conexao->FechaConexao();
                break;   
            case 'AlterarUsuario' :
                $nome       = $_POST['nome'];
                $cpf        = $_POST['cpf'];
                $email      = $_POST['email'];
                $login      = $_POST['login'];
                $tel        = $_POST['telefone'];
                $cel        = $_POST['celular'];
                $cep        = $_POST['cep'];
                $endereco   = $_POST['endereco'];
                $estado     = $_POST['estado'];
                $cidade     = $_POST['cidade'];
                $obs        = $_POST['obs'];
                $tipo       = $_POST['tipo'];
                $dataNasc   = $_POST['dataNasc'];
                $idUsuario  = $_REQUEST['idUsuario'];
                $status     = $_POST['status'];
                $idUnidade  = $_POST['unidade'];
                // Attempt to query database table and retrieve data
                try
                {
                    $stmt = $pdo->query("call AlterarUsuario($idUsuario,\"$nome\",\"$cpf\",\"$dataNasc\",\"$tel\", \"$cep\", \"$cel\", $tipo,\"$login\",\"$status\",\"$obs\",\"$email\",\"$endereco\",$idUnidade)");
                    header("Location:bela-admin/pag/Cadastro/CadastroUsuario.php");
                }
                catch(PDOException $e)
                {
                    if(strpos($e->getMessage(), "SQLSTATE[23000]") !== false)
                    {
                        $_SESSION['erro'] = "Login já existente! Tente outro.";
                        $alerta->voltaPagina();
                    }
                    else
                    {
                        $_SESSION['erro'] = addslashes($e->getMessage());
                        $alerta->voltaPagina();
                    }
                }
                $conexao->FechaConexao();
                break;
            case 'AlterarUsuarioLider' :
                $nome       = $_POST['nome'];
                $cpf        = $_POST['cpf'];
                $email      = $_POST['email'];
                $login      = $_POST['login'];
                $tel        = $_POST['telefone'];
                $cel        = $_POST['celular'];
                $cep        = $_POST['cep'];
                $endereco   = $_POST['endereco'];
                $estado     = $_POST['estado'];
                $cidade     = $_POST['cidade'];
                $obs        = $_POST['obs'];
                $tipo       = 6;
                $dataNasc   = $_POST['dataNasc'];
                $idUsuario  = $_REQUEST['idUsuario'];
                $status     = $_POST['status'];
                $idUnidade  = $_POST['unidade'];
                // Attempt to query database table and retrieve data
                try
                {
                    $stmt = $pdo->query("call AlterarUsuario($idUsuario,\"$nome\",\"$cpf\",\"$dataNasc\",\"$tel\", \"$cep\", \"$cel\", $tipo,\"$login\",\"$status\",\"$obs\",\"$email\",\"$endereco\",$idUnidade)");
                    header("Location:bela-admin/pag/Cadastro/CadastroUsuarioLider.php"); }
                catch(PDOException $e)
                {
                    if(strpos($e->getMessage(), "SQLSTATE[23000]") !== false)
                    {
                        $_SESSION['erro'] = "Login já existente! Tente outro.";
                        $alerta->voltaPagina();
                    }
                    else
                    {
                        $_SESSION['erro'] = addslashes($e->getMessage());
                        $alerta->voltaPagina();
                    }
                }
                $conexao->FechaConexao();
                break;
            case 'AlterarUsuarioOperador' :
                $nome       = $_POST['nome'];
                $cpf        = $_POST['cpf'];
                $email      = $_POST['email'];
                $login      = $_POST['login'];
                $tel        = $_POST['telefone'];
                $cel        = $_POST['celular'];
                $cep        = $_POST['cep'];
                $endereco   = $_POST['endereco'];
                $estado     = $_POST['estado'];
                $cidade     = $_POST['cidade'];
                $obs        = $_POST['obs'];
                $tipo       = 3;
                $dataNasc   = $_POST['dataNasc'];
                $idUsuario  = $_REQUEST['idUsuario'];
                $status     = $_POST['status'];
                $turno      = $_POST['turno'];
                $idUnidade  = $_POST['unidade'];
                // Attempt to query database table and retrieve data
                try
                {
                    $stmt = $pdo->query("call AlterarUsuarioOperador($idUsuario,\"$nome\",\"$cpf\",\"$dataNasc\",\"$tel\", \"$cep\", \"$cel\", $tipo,\"$login\",\"$status\",\"$obs\",\"$email\",\"$endereco\",$idUnidade,$turno)");
                    header("Location:bela-admin/pag/Cadastro/CadastroUsuarioOperador.php");
                }
                catch(PDOException $e)
                {
                    if(strpos($e->getMessage(), "SQLSTATE[23000]") !== false)
                    {
                        $_SESSION['erro'] = "Login já existente! Tente outro.";
                        $alerta->voltaPagina();
                    }
                    else
                    {
                        $_SESSION['erro'] = addslashes($e->getMessage());
                        $alerta->voltaPagina();
                    }
                }
                $conexao->FechaConexao();
                break;
            case 'AlterarTurno' :
                $idUsuario = $_REQUEST['idUsuario'];
                $turno = $_POST['turno'];
                // Attempt to query database table and retrieve data
                try
                {
                    $stmt = $pdo->query("UPDATE usuario SET  turno=$turno where idUsuario =$idUsuario");
                    header("Location:bela-admin/pag/Cadastro/CadastroUsuarioOperador.php");
                }
                catch(PDOException $e)
                {
                    $_SESSION['erro'] = addslashes($e->getMessage());
                    $alerta->voltaPagina();
                }
                $conexao->FechaConexao();
                break;
            case 'buscarUsuarios' :
                $usuarios = array();
                // Attempt to query database table and retrieve data
                try
                {
                    $stmt = $pdo->query("select * from usuario");
                    while($row  = $stmt->fetch(PDO::FETCH_OBJ))
                    {
                        // Assign each row of data to associative array
                        $usuarios[] = $row;
                    }
                }
                catch(PDOException $e)
                {
                    $_SESSION['erro'] = addslashes($e->getMessage());
                    $alerta->voltaPagina();
                }
                $conexao->FechaConexao();
                break;
            case 'buscarUsuariosOperador' :
                $usuarios = array();
                $idUnidade = $_REQUEST['idUnidadeLider'];
                // Attempt to query database table and retrieve data
                try
                {
                    $stmt = $pdo->query("select * from usuario where idTipo_Usuario = 3");
                    while($row  = $stmt->fetch(PDO::FETCH_OBJ))
                    {
                        // Assign each row of data to associative array
                        $usuarios[] = $row;
                    }
                }
                catch(PDOException $e)
                {
                    $_SESSION['erro'] = addslashes($e->getMessage());
                    $alerta->voltaPagina();
                }
                $conexao->FechaConexao();
                break;
            case 'buscarUsuariosOperadorTurno' :
                $usuarios = array();
                $idUnidade = $_REQUEST['idUnidadeLider'];
               
                // Attempt to query database table and retrieve data
                try
                {
                    $stmt = $pdo->query("select * from usuario where idTipo_Usuario = 3 and idUnidade= $idUnidade");
                    while($row  = $stmt->fetch(PDO::FETCH_OBJ))
                    {
                        // Assign each row of data to associative array
                        $usuarios[] = $row;
                    }
                }
                catch(PDOException $e)
                {
                    $_SESSION['erro'] = addslashes($e->getMessage());
                    $alerta->voltaPagina();
                }
                $conexao->FechaConexao();
                break;
            case 'buscarUsuariosLider' :
                $usuarios = array();
                // Attempt to query database table and retrieve data
                try
                {
                    $stmt = $pdo->query("select * from usuario where idTipo_Usuario = 6");
                    while($row  = $stmt->fetch(PDO::FETCH_OBJ))
                    {
                        // Assign each row of data to associative array
                        $usuarios[] = $row;
                    }
                }
                catch(PDOException $e)
                {
                    $_SESSION['erro'] = addslashes($e->getMessage());
                    $alerta->voltaPagina();
                }
                $conexao->FechaConexao();
                break;
            case 'AlterarUnidade':
                $nome = $_POST['nome'];
                $tel1 = $_POST['telefone1'];
                $tel2 = $_POST['telefone2'];
                $cep = $_POST['cep'];
                $estado = $_POST['estado'];
                $cidade = $_POST['cidade'];
                $id= $_REQUEST['idUnidade'];
                $status = 1;
                // Attempt to query database table and retrieve data
                try
                {
                    $stmt = $pdo->query("call AlterarUnidade($id,\"$nome\",\"$tel1\", \"$tel2\",\"$cep\", \"$cidade\",$status,\"$estado\")");
                    header("Location:bela-admin/pag/Cadastro/CadastroUnidade.php");
                }
                catch(PDOException $e)
                {
                    $_SESSION['erro'] = addslashes($e->getMessage());
                    $alerta->voltaPagina();
                }
                $conexao->FechaConexao();
                break; 
            case 'InserirUnidade' :
                $nome = $_POST['nome'];
                $tel1 = $_POST['telefone1'];
                $tel2 = $_POST['telefone2'];
                $cep = $_POST['cep'];
                $estado = $_POST['estado'];
                $cidade = $_POST['cidade'];
                $endereco = $_POST['endereco'];
                $filial = $_POST['filial'];
                $status = 1;
                // Attempt to query database table and retrieve data
                try
                {
                    $stmt = $pdo->query("call InserirUnidade( \"$nome\",\"$tel1\", \"$tel2\",\"$cep\", \"$cidade\",$status,\"$estado\",\"$endereco\", $filial)");
                    header("Location:bela-admin/pag/Cadastro/CadastroUnidade.php");
                }
                catch(PDOException $e)
                {
                    $_SESSION['erro'] = addslashes($e->getMessage());
                    $alerta->voltaPagina();
                }
                $conexao->FechaConexao();
                break; 
            case 'InserirArmazenagem' :
              $alerta = new AlertaUsuario();
              $nome = $_POST['nome'];
              $tipo = $_POST['tipo'];
              $idUnidade = $_POST['unidade'];
              $capacidade = $_POST['capacidade'];
              $numCabos = $_POST['numCabos'];
              if($numCabos == "")
              {
                  $numCabos = "null";
              }
              $status = 1;
              // Attempt to query database table and retrieve data
              try
              {
                  echo "call InserirSilo(\"$nome\", $idUnidade, \"$capacidade\", \"$tipo\", $numCabos)";
                  $stmt = $pdo->query("call InserirSilo(\"$nome\", $idUnidade, \"$capacidade\", \"$tipo\", $numCabos)");
                  header("Location:bela-admin/pag/Cadastro/CadastroArmazenagem.php");
              }
              catch(PDOException $e)
              {
                  $_SESSION['erro'] = addslashes($e->getMessage());
               //    $alerta->voltaPagina();
              }
              $conexao->FechaConexao();
              break;
            case 'AlterarArmazenagem' :
               $alerta = new AlertaUsuario();
               $nome = $_POST['nome'];
               $numCabos = $_POST['numCabos'];
               $id = $_REQUEST['id'];
               // Attempt to query database table and retrieve data
               try
               {
                   $stmt = $pdo->query("update silo set nome = \"$nome\", numCabos = $numCabos where idSilo = $id");
                   header("Location:bela-admin/pag/Cadastro/CadastroArmazenagem.php");
               }
               catch(PDOException $e)
               {
                   $_SESSION['erro'] = addslashes($e->getMessage());
                   $alerta->voltaPagina();
               }
               $conexao->FechaConexao();
               break;
            case 'buscarArmazenagem' :
                $silos = array();
                $login = $_REQUEST['login'];
                $idUser = 0;
                // Attempt to query database table and retrieve data
                try
                {
                    $stmt = $pdo->query("select u.nome as nomeUnidade, s.nome, s.capacidade, s.idSilo, ts.nome as tipoSilo, ts.idtipo_silo 
                    from tipo_silo ts inner join silo s on ts.idtipo_Silo = s.idtipo_Silo INNER JOIN unidade u 
                    on s.idUnidade = u.idUnidade inner join usuario us on u.idUnidade = us.idUnidade inner join historico h 
                    on h.idSilo = s.idSilo where us.login = \"$login\" and h.statusAtual = 1 and h.dataFim is null");
                    while($row  = $stmt->fetch(PDO::FETCH_OBJ))
                    {
                        // Assign each row of data to associative array
                        $silos[] = $row;
                    }
                }
                catch(PDOException $e)
                {
                    $_SESSION['erro'] = addslashes($e->getMessage());
                    $alerta->voltaPagina();
                }
                $pdo = null;;
                break;     
            case 'buscarArmazenagemEstoque' :
                $silos = array();
                $login = $_REQUEST['login'];
                $id = $_REQUEST['idProduto'];
                $idUser = 0;
                // Attempt to query database table and retrieve data
                try
                {
                    $stmt = $pdo->query("select u.nome as nomeUnidade, s.nome, s.capacidade, s.idSilo, ts.nome 
                    as tipoSilo, ts.idtipo_silo, re.qtd_final as toneladas, (SELECT estoqueQuantidadeInsercao
                    (s.capacidade,re.qtd_final)) AS insercao from tipo_silo ts inner join silo s 
                    on ts.idtipo_Silo = s.idtipo_Silo INNER JOIN unidade u 
                    on s.idUnidade = u.idUnidade inner join usuario us on u.idUnidade = us.idUnidade 
                    inner join historico h on h.idSilo = s.idSilo inner join produto pd on pd.idProduto = h.idProduto
                    inner join estoque es on s.idSilo = es.idSilo left join registro_estoque re
                    on re.idRegistro_Estoque = es.idRegistroAtual where us.login = \"$login\" 
                    and h.statusAtual = 1 and h.dataFim is null and pd.idProduto = $id");
                    while($row  = $stmt->fetch(PDO::FETCH_OBJ)) 
                    {
                        // Assign each row of data to associative array
                        $silos[] = $row;
                    }
                }
                catch(PDOException $e)
                {
                    $_SESSION['erro'] = addslashes($e->getMessage());
                    $alerta->voltaPagina();
                }
                $pdo = null;;
                break;   
            case 'buscarArmazenagemEstoqueUnico' :
                $silos = array();
                $login = $_REQUEST['login'];
                $idSilo = $_REQUEST['idSilo'];
                $idUser = 0;
                // Attempt to query database table and retrieve data
                try
                {
                    $stmt = $pdo->query("select u.nome as nomeUnidade, s.nome, s.capacidade, s.idSilo, ts.nome as tipoSilo, ts.idtipo_silo, 
                    re.qtd_final as toneladas , (SELECT estoqueQuantidadeInsercao(s.capacidade,re.qtd_final)) AS insercao from tipo_silo ts inner join silo s on ts.idtipo_Silo = s.idtipo_Silo INNER JOIN unidade u 
                    on s.idUnidade = u.idUnidade inner join usuario us on u.idUnidade = us.idUnidade inner join historico h
                    on h.idSilo = s.idSilo inner join estoque es on s.idSilo = es.idSilo left join registro_estoque re
                    on re.idRegistro_Estoque = es.idRegistroAtual where s.idSilo = $idSilo group by s.idSilo");
                    while($row  = $stmt->fetch(PDO::FETCH_OBJ)) 
                    {
                        // Assign each row of data to associative array
                        $silos[] = $row;
                    }
                }
                catch(PDOException $e)
                {
                    $_SESSION['erro'] = addslashes($e->getMessage());
                    $alerta->voltaPagina();
                }
                $pdo = null;;
                break;      
            case 'InserirAeracao' :
                global $logado;
                $idSilo = $_POST['silo'];
                $numHorasDia = $_POST['numHoraDia'];
                $Temperatura = $_POST['temperatura'];
                $Umidade = $_POST['umidade'];
                $data = $_POST['data'];
                $logado = $_REQUEST['login'];
                try
                {
                    $stmt = $pdo->query("select h.idHistorico into @id from silo s inner join historico h 
                    on h.idSilo = s.idSilo where s.idSilo = $idSilo and h.statusAtual = 1;
                    select idUsuario into @idU from usuario u where u.login = '$logado';
                    insert into aeracao (data, numHoraDia, temperatura, umidade, idUsuario, idHistorico) 
                    values (\"$data\", $numHorasDia, $Temperatura, $Umidade, @idU, @id);
                    call InserirAeracao(\"$data\", $numHorasDia, @id)");
                    header("Location:bela-admin/pag/Apontamento/aeracaoDados.php");
                }
                catch(PDOException $e)
                {
                    $_SESSION['erro'] = addslashes($e->getMessage());
                    $alerta->voltaPagina();
                }
                $pdo = null;
                break;
            case 'InserirControleEstoque' :
                $idEstoque  = $_REQUEST['idEstoque'];
                $tipo       = $_POST['tipo'];
                try
                {
                    if($tipo == 0)
                    {   
                        $data       = $_POST['data'];
                        $umidade    = $_POST['umidade'];
                        $impureza   = $_POST['impureza'];
                        $ardido     = $_POST['ardido'];
                        $ph         = $_POST['ph'];
                        $avariado   = $_POST['avariado'];
                        $esverdiado = $_POST['esverdiado'];
                        $triguilho  = $_POST['triguilho'];
                        $logado     = $_REQUEST['login'];
                        $idSilo     = $_POST['silo'];
                        $quantidade = $_POST['quantidade'];
                        $stmt = $pdo->query("call entradaEstoque($idEstoque, $quantidade, \"$logado\", \"$data\", 
                        $umidade, $impureza, $ardido, $ph, $avariado, $esverdiado, $triguilho, $idSilo)");
                        header("Location:bela-admin/pag/Apontamento/controleEstoqueDados.php");
                    }
                    else if($tipo == 1)
                    {
                        $idSilo     = $_POST['silo'];
                        $data       = $_POST['data'];
                        $logado     = $_REQUEST['login'];
                        $quantidade = $_POST['quantidade']; 
                        $stmt = $pdo->query("call saidaEstoque($idEstoque, $quantidade, $idSilo, \"$logado\", \"$data\")");
                        header("Location:bela-admin/pag/Apontamento/controleEstoqueDados.php");
                    }
                }
                catch(PDOException $e)
                {
                    $_SESSION['erro'] = addslashes($e->getMessage());
                    $alerta->voltaPagina();
                }
                $pdo = null;
                break; 
            case 'InserirEstoque' :
                global $logado;
                $idSilo = $_POST['silo'];
                $ocorrencia = $_POST['ocorrencia'];
                $toneladas = $_POST['Toneladas'];
                $data = $_POST['data'];
                $logado = $_REQUEST['login'];
                try
                {
                    $stmt = $pdo->query("select h.idHistorico into @id from silo s inner join historico h 
                    on h.idSilo = s.idSilo where s.idSilo = $idSilo and h.statusAtual = 1;
                    select idUsuario into @idU from usuario u where u.login = '$logado';
                    insert into estoque (data, ocorrido, toneladas, idUsuario, idHistorico) 
                    values (\"$data\", \"$ocorrencia\", $toneladas, @idU, @id)");
                    header("Location:bela-admin/pag/Apontamento/estoqueDados.php");
                }
                catch(PDOException $e)
                {
                    $_SESSION['erro'] = addslashes($e->getMessage());
                    $alerta->voltaPagina();
                }
                $pdo = null;
                break;
            case 'InserirProduto' :
                $nome   = $_POST['nome'];
                $codigo = $_POST['codigo'];
                // Attempt to query database table and retrieve data
                try
                {
                    $stmt = $pdo->query("INSERT INTO produto(nome,codigo)VALUES(\"$nome\",\"$codigo\")");
                    header("Location:bela-admin/pag/Cadastro/CadastroProduto.php");
                }
                catch(PDOException $e)
                {
                    $_SESSION['erro'] = addslashes($e->getMessage());
                    $alerta->voltaPagina();
                }
                $conexao->FechaConexao();
                break;
            case 'AlterarProduto' :
                $nome   = $_POST['nome'];
                $codigo = $_POST['codigo'];
                $id     = $_REQUEST['idProduto'];
                // Attempt to query database table and retrieve data
                try
                {
                    $stmt = $pdo->query("update produto set nome = \"$nome\", codigo = \"$codigo\" where idProduto = $id");
                    header("Location:bela-admin/pag/Cadastro/CadastroProduto.php");
                }
                catch(PDOException $e)
                {
                    $_SESSION['erro'] = addslashes($e->getMessage());
                    $alerta->voltaPagina();
                }
                $conexao->FechaConexao();
                break;
            case 'InserirSondagem' :
                global $logado;
                $idSilo = $_POST['silo'];
                $numSondagem = $_POST['sondagens'];
                $data = $_POST['data'];
                $logado = $_REQUEST['login'];
                $umidade         = $_POST['umidade'];
                $impureza        = $_POST['impureza'];
                $ardido          = $_POST['ardido'];
                $ph              = $_POST['ph'];
                $avariado        = $_POST['avariado'];
                $esverdiado      = $_POST['esverdiado'];
                $triguilho       = $_POST['triguilho'];
                $tempAmbiente = $_POST['tempAmbiente'];
                $tempMaxima = $_POST['tempMaxima'];
                $numPontosAcima = $_POST['numPontosAcima'];
                $termometria        = $_POST['operacao1'];
                $padrao      = $_POST['operacao2'];
                // Attempt to query database table and retrieve data
                try
                {
                    if($termometria == "Termometria" && $padrao == "Padrao")
                    {
                        $stmt = $pdo->query("select h.idHistorico into @id from silo s inner join historico h 
                        on h.idSilo = s.idSilo where s.idSilo = $idSilo and h.statusAtual = 1;
                        select idUsuario into @idU from usuario u where u.login = '$logado';
                        insert into sondagem (data, idUsuario, idHistorico) 
                        values (\"$data\", @idU, @id);
                        select last_insert_id() into @sondagem;
                        insert into termometria_sondagem (TempAmb, TempMax, upto29, idSondagem) 
                        values ($tempAmbiente, $tempMaxima, $numPontosAcima, @sondagem);
                        insert into padrao_produto_sondagem (data, umidade,impureza,ardido,ph, avariado,esverdiado,triguilho, idSondagem) 
                        values (\"".$data."\", ".$umidade.", ".$impureza.",".$ardido.",".$ph.",".$avariado.",".$esverdiado.",".$triguilho.",@sondagem);");
                    }
                    else if($termometria == "Termometria")
                    {
                        $stmt = $pdo->query("select h.idHistorico into @id from silo s inner join historico h 
                        on h.idSilo = s.idSilo where s.idSilo = $idSilo and h.statusAtual = 1;
                        select idUsuario into @idU from usuario u where u.login = '$logado';
                        insert into sondagem (data, idUsuario, idHistorico) 
                        values (\"$data\", @idU, @id);
                        select last_insert_id() into @sondagem;
                        insert into termometria_sondagem (TempAmb, TempMax, upto29, idSondagem) 
                        values ($tempAmbiente, $tempMaxima, $numPontosAcima, @sondagem);");
                    }
                    else if($padrao == "Padrao")
                    {
                        $stmt = $pdo->query("select h.idHistorico into @id from silo s inner join historico h 
                        on h.idSilo = s.idSilo where s.idSilo = $idSilo and h.statusAtual = 1;
                        select idUsuario into @idU from usuario u where u.login = '$logado';
                        insert into sondagem (data, idUsuario, idHistorico) 
                        values (\"$data\", @idU, @id);
                        select last_insert_id() into @sondagem;
                        insert into padrao_produto_sondagem (data, umidade,impureza,ardido,ph, avariado,esverdiado,triguilho, idSondagem) 
                        values (\"".$data."\", ".$umidade.", ".$impureza.",".$ardido.",".$ph.",".$avariado.",".$esverdiado.",".$triguilho.",@sondagem);");
                    }
                    header("Location:bela-admin/pag/Apontamento/sondagemDados.php");
                }
                catch(PDOException $e)
                {
                    $_SESSION['erro'] = addslashes($e->getMessage());
                    $alerta->voltaPagina();
                }
                $conexao->FechaConexao();
                break;
            case 'InserirTermometria' :
                global $logado;
                $idSilo = $_POST['silo'];
                $tempAmbiente = $_POST['tempAmbiente'];
                $tempMaxima = $_POST['tempMaxima'];
                $numPontosAcima = $_POST['numPontosAcima'];
                $data = $_POST['data'];
                $logado = $_REQUEST['login'];
                // Attempt to query database table and retrieve data
                try
                {
                    $stmt = $pdo->query("select h.idHistorico into @id from silo s inner join historico h 
                    on h.idSilo = s.idSilo where s.idSilo = $idSilo and h.statusAtual = 1;
                    select idUsuario into @idU from usuario u where u.login = '$logado';
                    insert into termometria (data, TempAmb, TempMax, upto29, idUsuario, idHistorico) 
                    values (\"$data\", $tempAmbiente, $tempMaxima, $numPontosAcima, @idU, @id)");
                    header("Location:bela-admin/pag/Apontamento/termometriaDados.php");
                }
                catch(PDOException $e)
                {
                    $_SESSION['erro'] = addslashes($e->getMessage());
                    $alerta->voltaPagina();
                }
                $conexao->FechaConexao();
                break;
                
            case 'InserirTratamentoFita' :
               global $logado;
               $end = " ";
               $idSilo = $_POST['silo'];
               $InseticidaUm = $_POST['inseticidaUm'];
               $pos1 = strpos($_POST['DosagemUm'], $end);
               $DosagemUm = substr($_POST['DosagemUm'], 0, $pos1);
               $InseticidaDois = $_POST['inseticidaDois'];
               $pos2 = strpos($_POST['DosagemDois'], $end);
               $DosagemDois = substr($_POST['DosagemDois'], 0, $pos2);
               $InseticidaTres = $_POST['inseticidaTres'];
               $pos3 = strpos($_POST['DosagemTres'], $end);
               $DosagemTres = substr($_POST['DosagemTres'], 0, $pos3);
               $totalparcial = $_POST['totalparcial'];
               $data = $_POST['data'];
               $logado = $_REQUEST['login'];
               // Attempt to query database table and retrieve data
               try
               {
                   if($InseticidaTres == "")
                   {
                       if($InseticidaDois == "")
                       {
                           $stmt = $pdo->query("select h.idHistorico into @id from silo s inner join historico h
                           on h.idSilo = s.idSilo where s.idSilo = $idSilo and h.statusAtual = 1;
                           select idUsuario into @idU from usuario u where u.login = '$logado';
                           insert into tratamento_fita (data, total_parcial, idUsuario, idHistorico)
                           values (\"$data\", \"$totalparcial\", @idU, @id);
                           select LAST_INSERT_ID() into @idtf;
                           insert into inseticida_utilizado (idInseticida, idtratamento_fita, qtd_total) values ($InseticidaUm, @idtf , $DosagemUm);");
                       }
                       else
                       {
                           $stmt = $pdo->query("select h.idHistorico into @id from silo s inner join historico h
                           on h.idSilo = s.idSilo where s.idSilo = $idSilo and h.statusAtual = 1;
                           select idUsuario into @idU from usuario u where u.login = '$logado';
                           insert into tratamento_fita (data, total_parcial, idUsuario, idHistorico)
                           values (\"$data\", \"$totalparcial\", @idU, @id);
                           select LAST_INSERT_ID() into @idtf;
                           insert into inseticida_utilizado (idInseticida, idtratamento_fita, qtd_total) values ($InseticidaUm, @idtf, $DosagemUm);
                           insert into inseticida_utilizado (idInseticida, idtratamento_fita, qtd_total) values ($InseticidaDois, @idtf, $DosagemDois);");
                       }
                   }
                   else
                   {
                       $stmt = $pdo->query("select h.idHistorico into @id from silo s inner join historico h
                       on h.idSilo = s.idSilo where s.idSilo = $idSilo and h.statusAtual = 1;
                       select idUsuario into @idU from usuario u where u.login = '$logado';
                       insert into tratamento_fita (data, total_parcial, idUsuario, idHistorico)
                       values (\"$data\", \"$totalparcial\", @idU, @id);
                       select LAST_INSERT_ID() into @idtf;
                       insert into inseticida_utilizado (idInseticida, idtratamento_fita, qtd_total) values ($InseticidaUm, @idtf, $DosagemUm);
                       insert into inseticida_utilizado (idInseticida, idtratamento_fita, qtd_total) values ($InseticidaDois, @idtf, $DosagemDois);
                       insert into inseticida_utilizado (idInseticida, idtratamento_fita, qtd_total) values ($InseticidaTres, @idtf, $DosagemTres);");    
                   }
                   header("Location:bela-admin/pag/Apontamento/tratamentofitaDados.php");
               }
               catch(PDOException $e)
               {
                   $_SESSION['erro'] = addslashes($e->getMessage());
                   $alerta->voltaPagina();
               }
               $conexao->FechaConexao();
               break;
            case 'InserirPulverizacao' :
                global $logado;
                $idSilo = $_POST['silo'];
                $Inseticida = $_POST['inseticida'];
                $data = $_POST['data'];
                $logado = $_REQUEST['login'];
                // Attempt to query database table and retrieve data
                try
                {
                    $stmt = $pdo->query("select h.idHistorico into @id from silo s inner join historico h 
                    on h.idSilo = s.idSilo where s.idSilo = $idSilo and h.statusAtual = 1;
                    select idUsuario into @idU from usuario u where u.login = '$logado';
                    insert into pulverizacoes (data, inseticida, idUsuario, idHistorico) 
                    values (\"$data\", \"$Inseticida\", @idU, @id)");
                    header("Location:bela-admin/pag/Apontamento/pulverizacaoDados.php");
                }
                catch(PDOException $e)
                {
                    $_SESSION['erro'] = addslashes($e->getMessage());
                    $alerta->voltaPagina();
                }
                $conexao->FechaConexao();
                break;
            case 'InserirNebulizacao' :
                global $logado;
                $idSilo = $_POST['silo'];
                $Inseticida = $_POST['inseticida'];
                $data = $_POST['data'];
                $logado = $_REQUEST['login'];
                // Attempt to query database table and retrieve data
                try
                {
                    $stmt = $pdo->query("select h.idHistorico into @id from silo s inner join historico h 
                    on h.idSilo = s.idSilo where s.idSilo = $idSilo and h.statusAtual = 1;
                    select idUsuario into @idU from usuario u where u.login = '$logado';
                    insert into nebulizacao (data, inseticida, idUsuario, idHistorico) 
                    values (\"$data\", \"$Inseticida\", @idU, @id)");
                    header("Location:bela-admin/pag/Apontamento/nebulizacaoDados.php");
                }
                catch(PDOException $e)
                {
                    $_SESSION['erro'] = addslashes($e->getMessage());
                    $alerta->voltaPagina();
                }
                $conexao->FechaConexao();
                break;
            case 'InserirRastelagem' :
                global $logado;
                $idSilo = $_POST['silo'];
                $data = $_POST['data'];
                $logado = $_REQUEST['login'];
                // Attempt to query database table and retrieve data
                try
                {
                    $stmt = $pdo->query("select h.idHistorico into @id from silo s inner join historico h 
                    on h.idSilo = s.idSilo where s.idSilo = $idSilo and h.statusAtual = 1;
                    select idUsuario into @idU from usuario u where u.login = '$logado';
                    insert into rastelagem (data, idUsuario, idHistorico) 
                    values (\"$data\", @idU, @id)");
                    header("Location:bela-admin/pag/Apontamento/rastelagemDados.php");
                }
                catch(PDOException $e)
                {
                    $_SESSION['erro'] = addslashes($e->getMessage());
                    $alerta->voltaPagina();
                }
                $conexao->FechaConexao();
                break;
            case 'InserirExpurgo' :
                global $logado;
                $idSilo = $_POST['silo'];
                $numReceituario = $_POST['numReceituario'];
                $data = $_POST['data'];
                $logado = $_REQUEST['login'];
                // Attempt to query database table and retrieve data
                try
                {
                    $stmt = $pdo->query("select h.idHistorico into @id from silo s inner join historico h 
                    on h.idSilo = s.idSilo where s.idSilo = $idSilo and h.statusAtual = 1;
                    select idUsuario into @idU from usuario u where u.login = '$logado';
                    insert into expurgo (data, numReceituario, idUsuario, idHistorico) 
                    values (\"$data\", $numReceituario, @idU, @id)");
                    header("Location:bela-admin/pag/Apontamento/expurgoDados.php");
                }
                catch(PDOException $e)
                {
                    $_SESSION['erro'] = addslashes($e->getMessage());
                    $alerta->voltaPagina();
                }
                $conexao->FechaConexao();
                break;
            case 'InserirOcorrencia' :
                global $logado;
                $idSilo    = $_POST['silo'];
                $tipo      = $_POST['cb_ocorrencia'];
                $descricao = $_POST['descricao'];
                $data      = $_POST['data'];
                $logado    = $_REQUEST['login'];
                // Attempt to query database table and retrieve data
                try
                {
                    $stmt = $pdo->query("select h.idHistorico into @id from silo s inner join historico h 
                    on h.idSilo = s.idSilo where s.idSilo = $idSilo and h.statusAtual = 1;
                    select idUsuario into @idU from usuario u where u.login = '$logado';
                    insert into ocorrencia (data, tipo,descricao,idSilo, idUsuario, idHistorico) 
                    values (\"$data\",\"$tipo\",\"$descricao\",$idSilo, @idU, @id)");
                    header("Location:bela-admin/pag/Apontamento/ocorrenciaDados.php");
                }
                catch(PDOException $e)
                {
                    $_SESSION['erro'] = addslashes($e->getMessage());
                    $alerta->voltaPagina();
                }
                $conexao->FechaConexao();
                break;
            case 'InserirTransilagem' :
                global $logado;
                $idSilo         = $_POST['silo'];
                $idSiloDestino  = $_POST['siloDestino'];
                $quantidade     = $_POST['quantidade'];
                $data           = $_POST['data'];
                $logado         = $_REQUEST['login'];
                // Attempt to query database table and retrieve data
                try
                {
                    $stmt = $pdo->query("call calculoTransilagem($idSilo,$idSiloDestino,$quantidade,\"$data\",\"$logado\")");
                    header("Location:bela-admin/pag/Apontamento/controleEstoqueDados.php");
                }
                catch(PDOException $e)
                {
                    $_SESSION['erro'] = addslashes($e->getMessage());
                    $alerta->voltaPagina();
                }
                $conexao->FechaConexao();
                break;
            case 'InserirRemaquinacao' :
                global $logado;
                $idSilo = $_POST['silo'];
                $data = $_POST['data'];
                $logado = $_REQUEST['login'];
                // Attempt to query database table and retrieve data
                try
                {
                    $stmt = $pdo->query("select h.idHistorico into @id from silo s inner join historico h 
                    on h.idSilo = s.idSilo where s.idSilo = $idSilo and h.statusAtual = 1;
                    select idUsuario into @idU from usuario u where u.login = '$logado';
                    insert into remaquinacoes (data, idUsuario, idHistorico) 
                    values (\"$data\", @idU, @id)");
                    header("Location:bela-admin/pag/Apontamento/remaquinacaoDados.php");
                }
                catch(PDOException $e)
                {
                    $_SESSION['erro'] = addslashes($e->getMessage());
                    $alerta->voltaPagina();
                }
                $conexao->FechaConexao();
                break;
            case 'NovoProduto' :
                $idSilo = $_REQUEST['idSilo'];
                $data = $_POST['data'];
                $produto = $_POST['produto'];
                $nome = $_POST['nome'];
                // Attempt to query database table and retrieve data
                try
                {
                    $stmt = $pdo->query("update historico set statusAtual = 0 where statusAtual = 1 and idSilo = $idSilo;
                                        insert into historico (dataInicial, idSilo, idProduto, statusAtual, nomeSafra) 
                                        values (\"$data\", $idSilo, $produto, 1, \"$nome\");
                                        UPDATE estoque set idRegistroAtual = null , idPadraoAtual=null WHERE idSilo =$idSilo;");
                    header("Location:bela-admin/pag/Apontamento/controleEstoqueDados.php");
                }
                catch(PDOException $e)
                {
                    $_SESSION['erro'] = addslashes($e->getMessage());
                    $alerta->voltaPagina();
                }
                $conexao->FechaConexao();
                break;
            case 'EncerrarProduto' :
                $idHistorico = $_REQUEST['idHistorico'];
                $data = $_POST['data'];
                // Attempt to query database table and retrieve data
                try
                {
                    $stmt = $pdo->query("update historico set dataFim = \"$data\" where idHistorico = $idHistorico;");
                    header("Location:bela-admin/pag/Apontamento/controleEstoqueDados.php");
                }
                catch(PDOException $e)
                {
                    $_SESSION['erro'] = addslashes($e->getMessage());
                    $alerta->voltaPagina();
                }
                $conexao->FechaConexao();
                break;
            case 'AlterarSafra' :
                $idHistorico = $_REQUEST['idHistorico'];
                $data = $_POST['data'];
                $idSilo =$_REQUEST['idSilo'];
                $nomeSafra =$_POST['nomeSafra'];
                global $logado;
                $logado         = $_REQUEST['login'];
                // Attempt to query database table and retrieve data
                try
                {
                    $stmt = $pdo->query("CALL alterarSafra($idHistorico,\"$data\",\"$logado\",\"$nomeSafra\")");

                    header("Location:bela-admin/pag/filtroUnidade.php");
                }
                catch(PDOException $e)
                {
                    $_SESSION['erro'] = addslashes($e->getMessage());
                    $alerta->voltaPagina();
                }
                $conexao->FechaConexao();
                break;
        }
    } 
?>
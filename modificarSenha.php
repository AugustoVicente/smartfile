<!DOCTYPE html>
<html>
    <head>
        <?php
            session_start();
            include "bela-admin/pag/ClassPHP/alerta.php";
            $alerta = new AlertaUsuario();
            if(isset($_SESSION['erro']) && $_SESSION['erro'] != null)
            {
                $alerta->alerta($_SESSION['erro']);
                $_SESSION['erro'] = null;
            }
            $token = base64_decode($_REQUEST['token']);
            $_REQUEST['web'] = true;
            $_REQUEST['token'] = $token;
            $_REQUEST['acao'] = "validarToken";
            include "webservice.php";
            if($verifica != true)
            {
                $_SESSION['erro'] = "Token inválido ou expirado!";
                header('location:login.php');
            }
        ?>
        <script>
            function verifica()
            {
                if(document.getElemntById("novaSenha").value != document.getElemntById("senha").value)
                {
                    alert("As senhas precisam ser iguais");
                    return false;
                }
            }
        </script>
        <meta charset="UTF-8">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="icon" type="image/png" sizes="36x36" href="bela-admin/plugins/images/iconSBR.png">
        <title>SmartFile</title>
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel="stylesheet" type='text/css'>
        <link href="@Url.Content("~/Scripts/plugins/jquery-ui/jquery-ui.css ")" rel="stylesheet" type="text/css"/>            
        <link rel="stylesheet" href="~/font-awesome/css">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body class="row wrapper border-bottom white-bg page-heading" style="background:url('bela-admin/plugins/images/bela.jpg')  no-repeat center center fixed;background-size: cover;-webkit-background-size: cover ">
        <div class="login-page">
            <div class="form">
                <img src="bela-admin/plugins/images/SBRLogin.png" style="height: 50%; width: 100%;">
                <br/>
                <br/>
                <br/>
                <?php
                    echo '<form class="login-form" onsubmit="return verifica()" method="POST" action="webservice.php?web=true&acao=alteraSenha&id='.$id.'&token='.$token.'">';
                ?>
                    <input type="password" placeholder="Nova senha" name="senha" id="senha"/>
                    <input type="password" placeholder="Confirme a nova senha" name="novaSenha" id="novaSenha"/>
                    <input type="submit" class="botao" value="Recuperar"/>
                </form>
            </div>
        </div>
        <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
        <script src="js/index.js"></script>
    </body>
</html>
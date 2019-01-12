<!DOCTYPE html>
<html>
    <head>
        <?php
            session_start();
            include "bela-admin/pag/ClassPHP/alerta.php";
            $alerta = new AlertaUsuario();
            $modo = "recuperação";
            if(isset($_SESSION['erro']) && $_SESSION['erro'] != null)
            {
                $alerta->alerta($_SESSION['erro']);
                $_SESSION['erro'] = null;
            }
            if(isset($_SESSION['logado']) && $_SESSION['logado'])
            {
                $modo = "modificação";
                $_SESSION['login'] = null; 
                $_SESSION['senha'] = null; 
                $_SESSION['logado'] = false;
            }
        ?>
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
                    echo "<h3>Orientações para a ".$modo." da senha foram enviadas no email cadastrado.<br/>
                        Obrigado pela compreensão.
                    </h3>";
                ?>
                <a href="login.php">Voltar</a>
            </div>
        </div>
        <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
        <script src="js/index.js"></script>
    </body>
</html>
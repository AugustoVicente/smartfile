<!DOCTYPE html>
<html>
    <head>
        <script>
            function verifica()
            {
                if(document.getElemntById("email").value == "")
                {
                    alert("Preencha o email por favor!");
                    return false;
                }
                if(document.getElemntById("login").value == "")
                {
                    alert("Preencha o login por favor!");
                    return false;
                }
            }
        </script>
        <?php
            session_start();
            include "bela-admin/pag/ClassPHP/alerta.php";
            $alerta = new AlertaUsuario();
            if(isset($_SESSION['erro']) && $_SESSION['erro'] != null)
            {
                $alerta->alerta($_SESSION['erro']);
                $_SESSION['erro'] = null;
            }
            if(isset($_SESSION['logado']) && $_SESSION['logado'])
            {
                header('location:bela-admin/pag/index.php');
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
                <form class="login-form" method="POST" onsubmit="return verifica()" action="webservice.php?web=true&acao=recuperaSenha">
                    <input type="text" placeholder="Usuário" name="login" id="login" value=""/>
                    <input type="email" placeholder="e-mail" name="email" id="email" value=""/>
                    <input type="submit" class="botao" value="Recuperar"/>
                    <a href="login.php">Lembrei da senha</a>
                </form>
            </div>
        </div>
        <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
        <script src="js/index.js"></script>
    </body>
</html>
<?php 
    class Layout 
    {
        function __construct()
        {
            echo "<!DOCTYPE html>
            <html lang='pt-br'>";
        }
        public function Cabecalho()
        {
            echo "<head>";
            session_start();
            include "ClassPHP/alerta.php";
            $alerta = new AlertaUsuario();
            if(isset($_SESSION['erro']) && $_SESSION['erro'] != null)
            {
                $alerta->alerta($_SESSION['erro']);
                $_SESSION['erro'] = null;
            }
            if(!isset($_SESSION['logado']) || !$_SESSION['logado'])
            {
                unset($_SESSION['login']);
                unset($_SESSION['senha']);
                header('location:../../login.php');
            }
            if($_SESSION['tipo'] == "Moderador")
            {
                header('location:Cadastro.php');
            }
            else if($_SESSION['tipo'] == "Operador")
            {
                header('location:apontamentos.php');
            }
            global $logado;
            $logado = $_SESSION['login'];
            echo "<meta charset=1'utf-8'>
                <meta http-equiv='X-UA-Compatible' content='IE=edge'>
                <meta name='viewport' content='width=device-width, initial-scale=1'>
                <meta name='description'>
                <meta name='author'>
                <link rel='icon' type='image/png' sizes='36x36' href='../plugins/images/iconSBR.png'>
                <title>SmartFile</title>
                <link href='bootstrap/dist/css/bootstrap.min.css' rel='stylesheet'>
                <link href='../plugins/bower_components/morrisjs/morris.css' rel='stylesheet'>
                <link rel='stylesheet' href='../plugins/bower_components/chartist-js/dist/chartist.min.css'>
                <script src='../plugins/bower_components/chartist-js/dist/chartist.min.js'></script>
                <link href='../plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css' rel='stylesheet'>
                <link href='css/animate.css' rel='stylesheet'>
                <link href='css/style.css' rel='stylesheet'>
                <link href='css/custom.css' rel='stylesheet'>
                <link href='css/colors/default.css' id='theme' rel='stylesheet'>
            </head>";
        }
        public function CabecalhoIndexLider()
        {
            echo "<head>";
            session_start();
            include "ClassPHP/alerta.php";
            $alerta = new AlertaUsuario();
            if(isset($_SESSION['erro']) && $_SESSION['erro'] != null)
            {
                $alerta->alerta($_SESSION['erro']);
                $_SESSION['erro'] = null;
            }
            if(!isset($_SESSION['logado']) || !$_SESSION['logado'])
            {
                unset($_SESSION['login']);
                unset($_SESSION['senha']);
                header('location:../../login.php');
            }
            if($_SESSION['tipo'] == "Moderador")
            {
                header('location:Cadastro.php');
            }
            else if($_SESSION['tipo'] == "Operador")
            {
                header('location:apontamentos.php');
            }
            global $logado;
            $logado = $_SESSION['login'];
            echo "<meta charset=1'utf-8'>
                <meta http-equiv='X-UA-Compatible' content='IE=edge'>
                <meta name='viewport' content='width=device-width, initial-scale=1'>
                <meta name='description'>
                <meta name='author'>
                <link rel='icon' type='image/png' sizes='36x36' href='../plugins/images/iconSBR.png'>
                <title>SmartFile</title>
                <link href='bootstrap/dist/css/bootstrap.min.css' rel='stylesheet'>
                <link href='../plugins/bower_components/morrisjs/morris.css' rel='stylesheet'>
                <link rel='stylesheet' href='../plugins/bower_components/chartist-js/dist/chartist.min.css'>
                <script src='../plugins/bower_components/chartist-js/dist/chartist.min.js'></script>
                <link href='../plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css' rel='stylesheet'>
                <link href='css/animate.css' rel='stylesheet'>
                <link href='css/style.css' rel='stylesheet'>
                <link href='css/custom.css' rel='stylesheet'>
                <link href='css/colors/default.css' id='theme' rel='stylesheet'>
            </head>";
        }
        public function CabecalhoIndex()
        {
            echo "<head>";
            session_start();
            include "ClassPHP/alerta.php";
            $alerta = new AlertaUsuario();
            if(isset($_SESSION['erro']) && $_SESSION['erro'] != null)
            {
                $alerta->alerta($_SESSION['erro']);
                $_SESSION['erro'] = null;
            }
            if(!isset($_SESSION['logado']) || !$_SESSION['logado'])
            {
                unset($_SESSION['login']);
                unset($_SESSION['senha']);
                header('location:../../login.php');
            }
            if($_SESSION['tipo'] == "Moderador")
            {
                header('location:Cadastro.php');
            }
            else if($_SESSION['tipo'] == "Operador")
            {
                header('location:apontamentos.php');
            }
            if($_SESSION['tipo'] == "Lider Operacional")
            {
                header('location:indexLider.php');
            }
            global $logado;
            $logado = $_SESSION['login'];
            echo "<meta charset=1'utf-8'>
                <meta http-equiv='X-UA-Compatible' content='IE=edge'>
                <meta name='viewport' content='width=device-width, initial-scale=1'>
                <meta name='description'>
                <meta name='author'>
                <link rel='icon' type='image/png' sizes='36x36' href='../plugins/images/iconSBR.png'>
                <title>SmartFile</title>
                <link href='bootstrap/dist/css/bootstrap.min.css' rel='stylesheet'>
                <link href='../plugins/bower_components/morrisjs/morris.css' rel='stylesheet'>
                <link rel='stylesheet' href='../plugins/bower_components/chartist-js/dist/chartist.min.css'>
                <script src='../plugins/bower_components/chartist-js/dist/chartist.min.js'></script>
                <link href='../plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css' rel='stylesheet'>
                <link href='css/animate.css' rel='stylesheet'>
                <link href='css/style.css' rel='stylesheet'>
                <link href='css/custom.css' rel='stylesheet'>
                <link href='css/colors/default.css' id='theme' rel='stylesheet'>
            </head>";
        }
        public function CabecalhoPerfil()
        {
            echo "<head>";
            session_start();
            include "ClassPHP/alerta.php";
            $alerta = new AlertaUsuario();
            if(isset($_SESSION['erro']) && $_SESSION['erro'] != null)
            {
                $alerta->alerta($_SESSION['erro']);
                $_SESSION['erro'] = null;
            }
            if(!isset($_SESSION['logado']) || !$_SESSION['logado'])
            {
                unset($_SESSION['login']);
                unset($_SESSION['senha']);
                header('location:../../login.php');
            }
            global $logado;
            $logado = $_SESSION['login'];
            echo "<meta charset=1'utf-8'>
                <meta http-equiv='X-UA-Compatible' content='IE=edge'>
                <meta name='viewport' content='width=device-width, initial-scale=1'>
                <meta name='description'>
                <meta name='author'>
                <link rel='icon' type='image/png' sizes='36x36' href='../plugins/images/iconSBR.png'>
                <title>SmartFile</title>
                <link href='bootstrap/dist/css/bootstrap.min.css' rel='stylesheet'>
                <link href='../plugins/bower_components/morrisjs/morris.css' rel='stylesheet'>
                <link rel='stylesheet' href='../plugins/bower_components/chartist-js/dist/chartist.min.css'>
                <script src='../plugins/bower_components/chartist-js/dist/chartist.min.js'></script>
                <link href='../plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css' rel='stylesheet'>
                <link href='css/animate.css' rel='stylesheet'>
                <link href='css/style.css' rel='stylesheet'>
                <link href='css/custom.css' rel='stylesheet'>
                <link href='css/colors/default.css' id='theme' rel='stylesheet'>
            </head>";
        }
        public function CabecalhoCadastro()
        {
            echo"<head>";
            session_start();
            include "ClassPHP/alerta.php";
            $alerta = new AlertaUsuario();
            if(isset($_SESSION['erro']) && $_SESSION['erro'] != null)
            {
                $alerta->alerta($_SESSION['erro']);
                $_SESSION['erro'] = null;
            }
            if(!isset($_SESSION['logado']) || !$_SESSION['logado'])
            {
                unset($_SESSION['login']);
                unset($_SESSION['senha']);
                header('location:../../login.php');
            }
            global $logado;
            $logado = $_SESSION['login'];
            if($_SESSION['tipo'] != "Moderador" )
            {
                header('location:../index.php');
            }
            echo "<meta charset=1'utf-8'>
                <meta http-equiv='X-UA-Compatible' content='IE=edge'>
                <meta name='viewport' content='width=device-width, initial-scale=1'>
                <meta name='description'>
                <meta name='author'>
                <link rel='icon' type='image/png' sizes='36x36' href='../plugins/images/iconSBR.png'>
                <title>SmartFile</title>
                <link href='bootstrap/dist/css/bootstrap.min.css' rel='stylesheet'>
                <link href='../plugins/bower_components/morrisjs/morris.css' rel='stylesheet'>
                <link rel='stylesheet' href='../plugins/bower_components/chartist-js/dist/chartist.min.css'>
                <script src='../plugins/bower_components/chartist-js/dist/chartist.min.js'></script>
                <link href='../plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css' rel='stylesheet'>
                <link href='css/animate.css' rel='stylesheet'>
                <link href='css/style.css' rel='stylesheet'>
                <link href='css/custom.css' rel='stylesheet'>
                <link href='css/colors/default.css' id='theme' rel='stylesheet'>
            </head>";
        }
        public function CabecalhoCadastroLider()
        {
            echo"<head>";
            session_start();
            include "ClassPHP/alerta.php";
            $alerta = new AlertaUsuario();
            if(isset($_SESSION['erro']) && $_SESSION['erro'] != null)
            {
                $alerta->alerta($_SESSION['erro']);
                $_SESSION['erro'] = null;
            }
            if(!isset($_SESSION['logado']) || !$_SESSION['logado'])
            {
                unset($_SESSION['login']);
                unset($_SESSION['senha']);
                header('location:../../login.php');
            }
            global $logado;
            $logado = $_SESSION['login'];
            if($_SESSION['tipo'] != "Lider Operacional")
            {
                header('location:../index.php');
            }
            echo "<meta charset=1'utf-8'>
                <meta http-equiv='X-UA-Compatible' content='IE=edge'>
                <meta name='viewport' content='width=device-width, initial-scale=1'>
                <meta name='description'>
                <meta name='author'>
                <link rel='icon' type='image/png' sizes='36x36' href='../plugins/images/iconSBR.png'>
                <title>SmartFile</title>
                <link href='bootstrap/dist/css/bootstrap.min.css' rel='stylesheet'>
                <link href='../plugins/bower_components/morrisjs/morris.css' rel='stylesheet'>
                <link rel='stylesheet' href='../plugins/bower_components/chartist-js/dist/chartist.min.css'>
                <script src='../plugins/bower_components/chartist-js/dist/chartist.min.js'></script>
                <link href='../plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css' rel='stylesheet'>
                <link href='css/animate.css' rel='stylesheet'>
                <link href='css/style.css' rel='stylesheet'>
                <link href='css/custom.css' rel='stylesheet'>
                <link href='css/colors/default.css' id='theme' rel='stylesheet'>
            </head>";
        }
        public function CabecalhoCadastros()
        {
            echo"<head>";
            session_start();
            include "../ClassPHP/alerta.php";
            $alerta = new AlertaUsuario();
            if(isset($_SESSION['erro']) && $_SESSION['erro'] != null)
            {
                $alerta->alerta($_SESSION['erro']);
                $_SESSION['erro'] = null;
            }
            if(!isset($_SESSION['logado']) || !$_SESSION['logado'])
            {
                unset($_SESSION['login']);
                unset($_SESSION['senha']);
                header('location:../../../login.php');
            }
            global $logado;
            $logado = $_SESSION['login'];
            if($_SESSION['tipo'] != "Moderador")
            {
                header('location:../index.php');
            }
            echo "<meta charset=1'utf-8'>
                <meta http-equiv='X-UA-Compatible' content='IE=edge'>
                <meta name='viewport' content='width=device-width, initial-scale=1'>
                <meta name='description'>
                <meta name='author'>
                <link rel='icon' type='image/png' sizes='36x36' href='../../plugins/images/iconSBR.png'>
                <title>SmartFile</title>
                <link href='../bootstrap/dist/css/bootstrap.min.css' rel='stylesheet'>  
                <link href='../../plugins/bower_components/morrisjs/morris.css' rel='stylesheet'>
                <link rel='stylesheet' href='../../plugins/bower_components/chartist-js/dist/chartist.min.css'>
                <script src='../../plugins/bower_components/chartist-js/dist/chartist.min.js'></script>
                <link href='../../plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css' rel='stylesheet'>
                <link href='../css/animate.css' rel='stylesheet'>
                <link href='../css/style.css' rel='stylesheet'>
                <link href='../css/custom.css' rel='stylesheet'>
                <link href='../css/colors/default.css' id='theme' rel='stylesheet'>
            </head>";
        }
        public function CabecalhoCadastrosLider()
        {
            echo"<head>";
            session_start();
            include "../ClassPHP/alerta.php";
            $alerta = new AlertaUsuario();
            if(isset($_SESSION['erro']) && $_SESSION['erro'] != null)
            {
                $alerta->alerta($_SESSION['erro']);
                $_SESSION['erro'] = null;
            }
            if(!isset($_SESSION['logado']) || !$_SESSION['logado'])
            {
                unset($_SESSION['login']);
                unset($_SESSION['senha']);
                header('location:../../../login.php');
            }
            global $logado;
            $logado = $_SESSION['login'];
            if($_SESSION['tipo'] != "Lider Operacional" && $_SESSION['tipo'] != "Moderador")
            {
                header('location:../index.php');
            }
            echo "<meta charset=1'utf-8'>
                <meta http-equiv='X-UA-Compatible' content='IE=edge'>
                <meta name='viewport' content='width=device-width, initial-scale=1'>
                <meta name='description'>
                <meta name='author'>
                <link rel='icon' type='image/png' sizes='36x36' href='../../plugins/images/iconSBR.png'>
                <title>SmartFile</title>
                <link href='../bootstrap/dist/css/bootstrap.min.css' rel='stylesheet'>  
                <link href='../../plugins/bower_components/morrisjs/morris.css' rel='stylesheet'>
                <link rel='stylesheet' href='../../plugins/bower_components/chartist-js/dist/chartist.min.css'>
                <script src='../../plugins/bower_components/chartist-js/dist/chartist.min.js'></script>
                <link href='../../plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css' rel='stylesheet'>
                <link href='../css/animate.css' rel='stylesheet'>
                <link href='../css/style.css' rel='stylesheet'>
                <link href='../css/custom.css' rel='stylesheet'>
                <link href='../css/colors/default.css' id='theme' rel='stylesheet'>
            </head>";
        }
        public function CabecalhoCadastrosCoordenador()
        {
            echo"<head>";
            session_start();
            include "../ClassPHP/alerta.php";
            $alerta = new AlertaUsuario();
            if(isset($_SESSION['erro']) && $_SESSION['erro'] != null)
            {
                $alerta->alerta($_SESSION['erro']);
                $_SESSION['erro'] = null;
            }
            if(!isset($_SESSION['logado']) || !$_SESSION['logado'])
            {
                unset($_SESSION['login']);
                unset($_SESSION['senha']);
                header('location:../../../login.php');
            }
            global $logado;
            $logado = $_SESSION['login'];
            if($_SESSION['tipo'] != 'Coordenador')
            {
                header('location:../index.php');
            }
            echo "<meta charset=1'utf-8'>
                <meta http-equiv='X-UA-Compatible' content='IE=edge'>
                <meta name='viewport' content='width=device-width, initial-scale=1'>
                <meta name='description'>
                <meta name='author'>
                <link rel='icon' type='image/png' sizes='36x36' href='../../plugins/images/iconSBR.png'>
                <title>SmartFile</title>
                <link href='../bootstrap/dist/css/bootstrap.min.css' rel='stylesheet'>  
                <link href='../../plugins/bower_components/morrisjs/morris.css' rel='stylesheet'>
                <link rel='stylesheet' href='../../plugins/bower_components/chartist-js/dist/chartist.min.css'>
                <script src='../../plugins/bower_components/chartist-js/dist/chartist.min.js'></script>
                <link href='../../plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css' rel='stylesheet'>
                <link href='../css/animate.css' rel='stylesheet'>
                <link href='../css/style.css' rel='stylesheet'>
                <link href='../css/custom.css' rel='stylesheet'>
                <link href='../css/colors/default.css' id='theme' rel='stylesheet'>
            </head>";
        }
        public function CabecalhoApontamento()
        {
            echo"<head>";
            session_start();
            include "ClassPHP/alerta.php";
            $alerta = new AlertaUsuario();
            if(isset($_SESSION['erro']) && $_SESSION['erro'] != null)
            {
                $alerta->alerta($_SESSION['erro']);
                $_SESSION['erro'] = null;
            }
            if(!isset($_SESSION['logado']) || !$_SESSION['logado'])
            {
                unset($_SESSION['login']);
                unset($_SESSION['senha']);
                header('location:../../login.php');
            }
            if($_SESSION['tipo'] == "Moderador")
            {
                header('location:Cadastro.php');
            }
            else if($_SESSION['tipo'] != "Operador" && $_SESSION['tipo'] != "Lider Operacional")
            {
                header('location:index.php');
            }
            global $logado;
            $logado = $_SESSION['login'];
            echo "<meta charset=1'utf-8'>
                <meta http-equiv='X-UA-Compatible' content='IE=edge'>
                <meta name='viewport' content='width=device-width, initial-scale=1'>
                <meta name='description'>
                <meta name='author'>
                <link rel='icon' type='image/png' sizes='36x36' href='../plugins/images/iconSBR.png'>
                <title>SmartFile</title>
                <link href='bootstrap/dist/css/bootstrap.min.css' rel='stylesheet'>
                <link href='../plugins/bower_components/morrisjs/morris.css' rel='stylesheet'>
                <link rel='stylesheet' href='../plugins/bower_components/chartist-js/dist/chartist.min.css'>
                <script src='../plugins/bower_components/chartist-js/dist/chartist.min.js'></script>
                <link href='../plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css' rel='stylesheet'>
                <link href='css/animate.css' rel='stylesheet'>
                <link href='css/style.css' rel='stylesheet'>
                <link href='css/custom.css' rel='stylesheet'>
                <link href='css/colors/default.css' id='theme' rel='stylesheet'>
            </head>";
        }
        public function CabecalhoApontamentos()
        {
            $horaAtual = date('H:i');
            echo"<head>";
            session_start();
            include "../ClassPHP/alerta.php";
            $alerta = new AlertaUsuario();
            if(isset($_SESSION['erro']) && $_SESSION['erro'] != null)
            {
                $alerta->alerta($_SESSION['erro']);
                $_SESSION['erro'] = null;
            }
            if(!isset($_SESSION['logado']) || !$_SESSION['logado'])
            {
                unset($_SESSION['login']);
                unset($_SESSION['senha']);
                header('location:../../../login.php');
            }
            if($_SESSION['tipo'] == "Moderador")
            {
                header('location:../Cadastro.php');
            }
            else if($_SESSION['tipo'] != "Operador" && $_SESSION['tipo'] != "Lider Operacional")
            {
                header('location:../index.php');
            }
            else if($_SESSION['tipo'] == "Operador")
            { 
                if($_SESSION['turno'] == 1)
                {
                    if($horaAtual <= "07:00" || $horaAtual >= "15:00")
                    {
                        $_SESSION['erro'] = "Não é possível acessar os apontamentos, você está fora de seu turno.";
                        $alerta->voltaPagina();
                    }
                }
                else if($_SESSION['turno'] == 2)
                {
                    if($horaAtual <= "15:00" || $horaAtual >= "23:00")
                    {
                        $_SESSION['erro'] = "Não é possível acessar os apontamentos, você está fora de seu turno.";
                        $alerta->voltaPagina();
                    }
                }
                else if($_SESSION['turno'] == 3)
                {
                    if(($horaAtual <= "23:00" && $horaAtual >= "07:00"))
                    {
                        $_SESSION['erro'] = "Não é possível acessar os apontamentos, você está fora de seu turno.";
                        $alerta->voltaPagina();
                    }
                }
                else if($_SESSION['turno'] == 4)
                {
                    if($horaAtual <= "08:00" || $horaAtual >= "18:00")
                    {
                        $_SESSION['erro'] = "Não é possível acessar os apontamentos, você está fora de seu turno.";
                        $alerta->voltaPagina();
                    }
                }
            }
            global $logado;
            $logado = $_SESSION['login'];
            echo "<meta charset=1'utf-8'>
                <meta http-equiv='X-UA-Compatible' content='IE=edge'>
                <meta name='viewport' content='width=device-width, initial-scale=1'>
                <meta name='description'>
                <meta name='author'>
                <link rel='icon' type='image/png' sizes='36x36' href='../../plugins/images/iconSBR.png'>
                <title>SmartFile</title>
                <link href='../bootstrap/dist/css/bootstrap.min.css' rel='stylesheet'>
                <link href='../../plugins/bower_components/morrisjs/morris.css' rel='stylesheet'>
                <link rel='stylesheet' href='../../plugins/bower_components/chartist-js/dist/chartist.min.css'>
                <script src='../../plugins/bower_components/chartist-js/dist/chartist.min.js'></script>
                <link href='../../plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css' rel='stylesheet'>
                <link href='../css/animate.css' rel='stylesheet'>
                <link href='../css/style.css' rel='stylesheet'>
                <link href='../css/custom.css' rel='stylesheet'>
                <link href='../css/colors/default.css' id='theme' rel='stylesheet'>
            </head>";
        }
        public function CabecalhoApontamentosOperador()
        {
            echo"<head>";
            session_start();
            include "../ClassPHP/alerta.php";
            $alerta = new AlertaUsuario();
            if(isset($_SESSION['erro']) && $_SESSION['erro'] != null)
            {
                $alerta->alerta($_SESSION['erro']);
                $_SESSION['erro'] = null;
            }
            if(!isset($_SESSION['logado']) || !$_SESSION['logado'])
            {
                unset($_SESSION['login']);
                unset($_SESSION['senha']);
                header('location:../../../login.php');
            }
            if($_SESSION['tipo'] == "Moderador")
            {
                header('location:../Cadastro.php');
            }
            else if($_SESSION['tipo'] != "Operador" && $_SESSION['tipo'] != "Lider Operacional" &&  $_SESSION['tipo'] != "Coordenador")
            {
                header('location:../index.php');
            }
            global $logado;
            $logado = $_SESSION['login'];
            echo "<meta charset=1'utf-8'>
                <meta http-equiv='X-UA-Compatible' content='IE=edge'>
                <meta name='viewport' content='width=device-width, initial-scale=1'>
                <meta name='description'>
                <meta name='author'>
                <link rel='icon' type='image/png' sizes='36x36' href='../../plugins/images/iconSBR.png'>
                <title>SmartFile</title>
                <link href='../bootstrap/dist/css/bootstrap.min.css' rel='stylesheet'>
                <link href='../../plugins/bower_components/morrisjs/morris.css' rel='stylesheet'>
                <link rel='stylesheet' href='../../plugins/bower_components/chartist-js/dist/chartist.min.css'>
                <script src='../../plugins/bower_components/chartist-js/dist/chartist.min.js'></script>
                <link href='../../plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css' rel='stylesheet'>
                <link href='../css/animate.css' rel='stylesheet'>
                <link href='../css/style.css' rel='stylesheet'>
                <link href='../css/custom.css' rel='stylesheet'>
                <link href='../css/colors/default.css' id='theme' rel='stylesheet'>
            </head>";
        }
        public function AbreBody()
        {
            echo "<body class='fix-header' onload='load()'>";
        }
        public function Load()
        {
            echo "<div class='preloader'>
                <svg class='circular' viewBox='25 25 50 50'>
                    <circle class='path' cx='50' cy='50' r='20' fill='none' stroke-width='2' stroke-miterlimit='10'/>
                </svg>
                <h1>Processando...</h1>
            </div>";
        }
        public function AbreWrapper()
        {
            echo "<div id='wrapper'>";
        }
        public function TopBar()
        {
            global $logado;
            echo "<nav class='navbar navbar-default navbar-static-top m-b-0'>
                <div class='navbar-header'>
                    <div style='float: left; margin-left: 2%' class='nav navbar-top-links navbar-left pull-left btn-alert'>
                        <img src='../plugins/images/logo.png' alt='home' class='dark-logo' style='width: 50%; height: 100%;'/> 
                    </div>
                    <ul class='nav navbar-top-links navbar-right pull-right btn-alert'>
                        <li> 
                            <a class='profile-pic' href='../../webservice.php?web=true&acao=logout'>
                                <b class='hidden-xs'>
                                    <i class='fa  fa-sign-out fa-fw' aria-hidden='true'></i>
                                    Sair
                                </b>
                            </a>
                        </li>
                    </ul>
                    <ul class='nav navbar-top-links navbar-right pull-right'>
                        <li> 
                            <a class='profile-pic' href='profile.php'>
                                <b class='hidden-xs'>
                                    <i class='fa fa-user fa-fw' aria-hidden='true'></i>
                                    ". $logado ."
                                </b>
                            </a>
                        </li>
                    </ul>";
                    if($_SESSION['tipo'] == 'Moderador')
                    {
                        echo "<ul class='nav navbar-top-links navbar-right pull-right'>
                        <li>
                            <a href='Cadastro.php' class='waves-effect'>
                                <i class='fa fa-pencil fa-fw' aria-hidden='true'></i>
                                Cadastro
                            </a>
                        </li>
                        </ul>";
                    }
                    else if($_SESSION['tipo'] == 'Operador')
                    {
                        echo "<ul class='nav navbar-top-links navbar-right pull-right'>
                        <li>
                            <a href='apontamentos.php' class='waves-effect'>
                                <i class='fa fa-pencil fa-fw' aria-hidden='true'></i>
                                Apontamentos
                            </a>
                        </li>
                        </ul>";
                    }
                    else if($_SESSION['tipo'] == 'Lider Operacional')
                    {
                        echo "<ul class='nav navbar-top-links navbar-right pull-right'>
                            <li>
                                <a href='Cadastro/CadastroUsuarioOperador.php' class='waves-effect'>
                                    <i class='fa fa-briefcase fa-fw' aria-hidden='true'></i>
                                    Gerenciar Operadores
                                </a>
                            </li>
                        </ul>
                        <ul class='nav navbar-top-links navbar-right pull-right'>
                            <li>
                                <a href='index.php' class='waves-effect'>
                                    <i class='fa fa-book fa-fw' aria-hidden='true'></i>
                                    Relatórios
                                </a>
                            </li>
                        </ul>
                        <ul class='nav navbar-top-links navbar-right pull-right'>
                            <li>
                                <a href='apontamentos.php' class='waves-effect'>
                                    <i class='fa fa-pencil fa-fw' aria-hidden='true'></i>
                                    Apontamentos
                                </a>
                            </li>
                        </ul>";
                    }
                    else if($_SESSION['tipo'] == 'Coordenador')
                    {
                        echo "<ul class='nav navbar-top-links navbar-right pull-right'>
                            <li>
                                <a href='Cadastro/CadastroInseticida.php' class='waves-effect'>
                                    <i class='fa fa-briefcase fa-fw' aria-hidden='true'></i>
                                    Gerenciar Inseticidas
                                </a>
                            </li>
                        </ul>
                        <ul class='nav navbar-top-links navbar-right pull-right'>
                            <li>
                                <a href='index.php' class='waves-effect'>
                                    <i class='fa fa-book fa-fw' aria-hidden='true'></i>
                                    Relatórios
                                </a>
                            </li>
                        </ul>
                        <ul class='nav navbar-top-links navbar-right pull-right'>
                            <li>
                                <a href='filtroUnidade.php' class='waves-effect'>
                                    <i class='fa fa-pencil fa-fw' aria-hidden='true'></i>
                                    Estoque
                                </a>
                            </li>
                        </ul>";
                    }
                    else
                    {
                        echo "<ul class='nav navbar-top-links navbar-right pull-right'>
                            <li>
                                <a href='index.php' class='waves-effect'>
                                    <i class='fa fa-book fa-fw' aria-hidden='true'></i>
                                    Relatórios
                                </a>
                            </li>
                        </ul>";
                    }
                    echo "</div>
                </nav>";
        }  
        public function TopBarCadastros()
        {
            global $logado;
            echo "<nav class='navbar navbar-default navbar-static-top m-b-0'>
                <div class='navbar-header'>
                    <div style='float: left; margin-left: 2%' class='nav navbar-top-links navbar-left pull-left btn-alert'>
                        <img src='../../plugins/images/logo.png' alt='home' class='dark-logo' style='width: 50%; height: 100%;'/> 
                    </div>
                    <ul class='nav navbar-top-links navbar-right pull-right btn-alert'>
                        <li> 
                            <a class='profile-pic' href='../../../webservice.php?web=true&acao=logout'>
                                <b class='hidden-xs'>
                                    <i class='fa  fa-sign-out fa-fw' aria-hidden='true'></i>
                                    Sair
                                </b>
                            </a>
                        </li>
                    </ul>
                    <ul class='nav navbar-top-links navbar-right pull-right'>
                        <li> 
                            <a class='profile-pic' href='../profile.php'>
                                <b class='hidden-xs'>
                                    <i class='fa fa-user fa-fw' aria-hidden='true'></i>
                                    ". $logado ."
                                </b>
                            </a>
                        </li>
                    </ul>";
                    if($_SESSION['tipo'] == 'Moderador')
                    {
                        echo "<ul class='nav navbar-top-links navbar-right pull-right'>
                        <li>
                            <a href='../Cadastro.php' class='waves-effect'>
                                <i class='fa fa-pencil fa-fw' aria-hidden='true'></i>
                                Cadastro
                            </a>
                        </li>
                        </ul>";
                    }
                    else if($_SESSION['tipo'] == 'Operador')
                    {
                        echo "<ul class='nav navbar-top-links navbar-right pull-right'>
                        <li>
                            <a href='../apontamentos.php' class='waves-effect'>
                                <i class='fa fa-pencil fa-fw' aria-hidden='true'></i>
                                Apontamentos
                            </a>
                        </li>
                        </ul>";
                    }
                    else if($_SESSION['tipo'] == 'Lider Operacional')
                    {
                        echo "<ul class='nav navbar-top-links navbar-right pull-right'>
                            <li>
                                <a href='../Cadastro/CadastroUsuarioOperador.php' class='waves-effect'>
                                    <i class='fa fa-briefcase fa-fw' aria-hidden='true'></i>
                                    Gerenciar Operadores
                                </a>
                            </li>
                        </ul>
                        <ul class='nav navbar-top-links navbar-right pull-right'>
                            <li>
                                <a href='../index.php' class='waves-effect'>
                                    <i class='fa fa-book fa-fw' aria-hidden='true'></i>
                                    Relatórios
                                </a>
                            </li>
                        </ul>
                        <ul class='nav navbar-top-links navbar-right pull-right'>
                            <li>
                                <a href='../apontamentos.php' class='waves-effect'>
                                    <i class='fa fa-pencil fa-fw' aria-hidden='true'></i>
                                    Apontamentos
                                </a>
                            </li>
                        </ul>";
                    }
                    else if($_SESSION['tipo'] == 'Coordenador')
                    {
                        echo "<ul class='nav navbar-top-links navbar-right pull-right'>
                            <li>
                                <a href='CadastroInseticida.php' class='waves-effect'>
                                    <i class='fa fa-briefcase fa-fw' aria-hidden='true'></i>
                                    Gerenciar Inseticidas
                                </a>
                            </li>
                        </ul>
                        <ul class='nav navbar-top-links navbar-right pull-right'>
                            <li>
                                <a href='../index.php' class='waves-effect'>
                                    <i class='fa fa-book fa-fw' aria-hidden='true'></i>
                                    Relatórios
                                </a>
                            </li>
                        </ul>
                        <ul class='nav navbar-top-links navbar-right pull-right'>
                            <li>
                                <a href='../filtroUnidade.php' class='waves-effect'>
                                    <i class='fa fa-pencil fa-fw' aria-hidden='true'></i>
                                    Estoque
                                </a>
                            </li>
                        </ul>";
                    }
                    else
                    {
                        echo "<ul class='nav navbar-top-links navbar-right pull-right'>
                            <li>
                                <a href='../index.php' class='waves-effect'>
                                    <i class='fa fa-pencil fa-fw' aria-hidden='true'></i>
                                    Início
                                </a>
                            </li>
                        </ul>";
                    }
                    echo "</div>
                </nav>";
        }
        public function AbreContent()
        {
            echo "<div id='page-wrapper'>";
        }
        public function Titulo($titulo)
        {
            echo "<div class='row bg-title'>
                <div class='col-lg-3 col-md-4 col-sm-4 col-xs-12'>
                    <h4 class='page-title'>$titulo</h4> 
                </div>
            </div>";
        }
        public function Footer()
        {
            echo "<footer class='footer text-center'> 
                &copy; SBR-SMARTFILE 
            </footer>";
        }
        public function FechaContent()
        {
            echo "</div>";
        }
        public function FechaWrapper()
        {
            echo "</div>";
        }
        public function Scripts()
        {
            echo "<script src='../plugins/bower_components/jquery/dist/jquery.min.js'></script>
            <script src='bootstrap/dist/js/bootstrap.min.js'></script>
            <script src='js/jquery.slimscroll.js'></script>
            <script src='js/waves.js'></script>
            <script src='../plugins/bower_components/waypoints/lib/jquery.waypoints.js'></script>
            <script src='../plugins/bower_components/counterup/jquery.counterup.min.js'></script>
            <script src='../plugins/bower_components/chartist-js/dist/chartist.min.js'></script>
            <script src='../plugins/bower_components/chartist-js/dist/chartist.min.css'></script>
            <script src='../plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js'></script>
            <script src='../plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js'></script>
            <script src='js/custom.js'></script>
            <script src='js/custom2.js'></script>
            <script src='js/custom4.js'></script>
            <script src='js/dashboard.js'></script>
            <script src='../plugins/bower_components/toast-master/js/jquery.toast.js'></script>
            <script src='../vendors/datatables.net/js/jquery.dataTables.js'></script>
            <script src='../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js'></script>
            <script src='../vendors/datatables.net-buttons/js/dataTables.buttons.min.js'></script>
            <script src='../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js'></script>
            <script src='../vendors/datatables.net-buttons/js/buttons.flash.min.js'></script>
            <script src='../vendors/datatables.net-buttons/js/buttons.html5.min.js'></script>
            <script src='../vendors/datatables.net-buttons/js/buttons.print.min.js'></script>
            <script src='../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js'></script>
            <script src='../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js'></script>
            <script src='../vendors/datatables.net-responsive/js/dataTables.responsive.min.js'></script>
            <script src='../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js'></script>
            <script src='../vendors/datatables.net-scroller/js/dataTables.scroller.min.js'></script>
            <script src='../vendors/jszip/dist/jszip.min.js'></script>
            <script src='../vendors/pdfmake/build/pdfmake.min.js'></script>
            <script src='../vendors/pdfmake/build/vfs_fonts.js'></script>";
        }
        public function ScriptsCadastros()
        {
            echo "<script src='../../plugins/bower_components/jquery/dist/jquery.min.js'></script>
            <script src='../bootstrap/dist/js/bootstrap.min.js'></script>
            <script src='../js/jquery.slimscroll.js'></script>
            <script src='../js/waves.js'></script>
            <script src='../../plugins/bower_components/waypoints/lib/jquery.waypoints.js'></script>
            <script src='../../plugins/bower_components/counterup/jquery.counterup.min.js'></script>
            <script src='../../plugins/bower_components/chartist-js/dist/chartist.min.js'></script>
            <script src='../../plugins/bower_components/chartist-js/dist/chartist.min.css'></script>
            <script src='../../plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js'></script>
            <script src='../../plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js'></script>
            <script src='../js/custom.js'></script>
            <script src='../js/custom2.js'></script>
            <script src='../js/custom4.js'></script>
            <script src='../js/dashboard.js'></script>
            <script src='../../plugins/bower_components/toast-master/js/jquery.toast.js'></script>
            <script src='../../vendors/datatables.net/js/jquery.dataTables.js'></script>
            <script src='../../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js'></script>
            <script src='../../vendors/datatables.net-buttons/js/dataTables.buttons.min.js'></script>
            <script src='../../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js'></script>
            <script src='../../vendors/datatables.net-buttons/js/buttons.flash.min.js'></script>
            <script src='../../vendors/datatables.net-buttons/js/buttons.html5.min.js'></script>
            <script src='../../vendors/datatables.net-buttons/js/buttons.print.min.js'></script>
            <script src='../../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js'></script>
            <script src='../../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js'></script>
            <script src='../../vendors/datatables.net-responsive/js/dataTables.responsive.min.js'></script>
            <script src='../../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js'></script>
            <script src='../../vendors/datatables.net-scroller/js/dataTables.scroller.min.js'></script>
            <script src='../../vendors/jszip/dist/jszip.min.js'></script>
            <script src='../../vendors/pdfmake/build/pdfmake.min.js'></script>
            <script src='../../vendors/pdfmake/build/vfs_fonts.js'></script>";
        }
        public function FechaBody()
        {
            echo "</body>";
        }
        public function FechaPag()
        {
            echo "</html>";
        }
    }
?>
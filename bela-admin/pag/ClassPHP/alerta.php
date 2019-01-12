<?php    
    class AlertaUsuario
    {
        function __construct()
        {
        }
        public function alerta($mensagem)
        {
            echo "<script>alert('$mensagem')</script>";
        }    
        public function voltaPagina()
        {
            echo "<script>javascript:history.back(-1)</script>";
        }  
    }
?>
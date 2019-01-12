<?php
    include 'ClassPHP/Layout.php';
    include("../plugins/dompdf/autoload.inc.php");
    use Dompdf\Dompdf;
    session_start();
    $nomeUsuario = $_REQUEST['nome'];
    $nome = $_REQUEST['nomeUnidade'];
    //Separa Mes e ano da String
    $dados = $_SESSION['param'];
    //buscar dados de cada apontamento
    /*-----------------------------------Metodos-------------------------------*/
    function stringRelatorio($dados, $NomeUnidade, $nomeUsuario)
    {
        $data = date('d/m/Y');
        $historico = "<html>
        <link rel='stylesheet' href='css/estilo.css' type='text/css'/>
        <body>
        <h1>Relatório de Rastreabilidade - ".$data."</h1>
        <h2>Belagrícola</h2>
        <h2>Unidade: ".$NomeUnidade."</h2>
        <p>Por: ".$nomeUsuario."</p>
        ";
        foreach ($dados as $dado)
        {
            $historico .= "<h3>$dado[2]</h3>
                <table>
                    <tr class='title'>";
                        foreach ($dado[0] as $coluna) 
                        {
                            $historico .= "<td>$coluna</td>";
                        }
                    $historico .= "</tr>";
                    foreach ($dado[1] as $linha) 
                    {
                        $historico .= "<tr>";
                            foreach ($linha as $coluna) 
                            {
                                $historico .= "<td>$coluna</td>";
                            }
                        $historico .= "</tr>";
                    }
                $historico .= "</table>";
        }
        $historico .= "</body>
            </html>";
        return $historico;
    } 
    $dompdf = new DOMPDF();
    $dompdf->load_html(stringRelatorio($dados, $nome, $nomeUsuario));
    $dompdf->set_paper('A4','portrait');
    $dompdf->render();
    $dompdf->stream("relatorio.pdf");
?>
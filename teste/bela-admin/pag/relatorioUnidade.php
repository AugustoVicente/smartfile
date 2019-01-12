<!-- Abertura -->
<?php
    include 'ClassPHP/Layout.php';
    $layout = new Layout();
    $layout->Cabecalho();
    $layout->AbreBody();
    $layout->Load();
    $layout->AbreWrapper();
    $layout->TopBar();
    $layout->AbreContent();
?>
<!-- CONTEUDO -->
<div class="container-fluid">
    <?php
        $layout->titulo("Relatório");
        /*-----------------------------------Classes-------------------------------*/
        include 'ClassPHP/Unidade.php';
        include 'ClassPHP/dateParse.php';
        include 'ClassPHP/Unidade.php';
        $ClasseUnidade = new Unidade();
        $nomeUnidade = $ClasseUnidade->buscarNomeUnidade($idSilo);
        $dt = new DateConverter();
        $ClasseUnidade = new Unidade();
        $idUnidade     = $_REQUEST['idUnidade'];
        $data          = $_POST['data'];


        //Separa Mes e ano da String
        $haystack      = $data;
        $needle        = '-';
        $lenFinal      = strlen($data);
        $pos           = strripos($haystack, $needle);
        $ano           = substr($data,0,$pos);
        $mes           = substr($data,$pos+1,$lenFinal);
        
        //buscar dados de cada apontamento
        /*-----------------------------------Metodos-------------------------------*/
        $aeracoes      = $ClasseUnidade->buscarAeracaoUnidade($idUnidade,$mes,$ano);
        $estoques      = $ClasseUnidade->buscarEstoqueUnidade($idUnidade,$mes,$ano);
        $expurgos      = $ClasseUnidade->buscarExpurgoUnidade($idUnidade,$mes,$ano);
        $nebulizacoes  = $ClasseUnidade->buscarNebulizacaoUnidade($idUnidade,$mes,$ano);
        $pulverizacoes = $ClasseUnidade->buscarPulverizacaoUnidade($idUnidade,$mes,$ano);
        $rastelagens   = $ClasseUnidade->buscarRastelagemUnidade($idUnidade,$mes,$ano);
        $remaquinacoes = $ClasseUnidade->buscarRemaquinacaoUnidade($idUnidade,$mes,$ano);
        $sondagens     = $ClasseUnidade->buscarSondagemUnidade($idUnidade,$mes,$ano);
        $termometrias  = $ClasseUnidade->buscarTermometriaUnidade($idUnidade,$mes,$ano);
        $transilagens  = $ClasseUnidade->buscarTransilagemUnidade($idUnidade,$mes,$ano);
        $tratamentos   = $ClasseUnidade->buscarTratamentoFitaUnidade($idUnidade,$mes,$ano);

        //Verifica se existe algo nos apontamentos e cria uma tabela com os mesmos
        if(isset($aeracoes))
        {
            $info = "Aerações registrados:";
            $title = array("Data", "Horas/dia", "Temperatura", "Umidade", "Responsável", "Silo", "Horas Acumuladas");
            $content = array();
            $TodosDados = array();
            echo '<div class="col-lg-12 col-sm-4">
                        <div class="panel panel-inverse">
                            <div class="panel-heading">Aerações
                                <div class="pull-right">
                                    <a href="#" data-perform="panel-collapse">
                                        <i class="ti-plus"></i>
                                    </a> 
                                    <a href="#" data-perform="panel-dismiss">
                                        <i class="ti-close"></i>
                                    </a> 
                                </div>
                            </div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body">
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Data</th>
                                                <th>Horas/dia</th>
                                                <th>Temperatura</th>
                                                <th>Umidade</th>
                                                <th>Responsável</th>
                                                <th>Silo</th>
                                                <th>Horas Acumuladas</th>
                                            </tr>
                                        </thead>';
                                                foreach ($aeracoes as $aeracao)
                                                {
                                                    $Dt          =$aeracao->data;
                                                    $Data        =$dt->getdate($Dt);
                                                    $HoraDia     =$aeracao->numHoraDia;
                                                    $Temperatura =$aeracao->temperatura;
                                                    $Umidade     =$aeracao->umidade;
                                                    $Responsavel =$aeracao->Responsavel;
                                                    $Silo        =$aeracao->nome;
                                                    $acumulado   =$aeracao->acumulado;
                                                    echo'<tbody>
                                                        <td>'.$Data.'</td>
                                                        <td>'.$HoraDia.'</td>
                                                        <td>'.$Temperatura.'</td>
                                                        <td>'.$Umidade.'</td>
                                                        <td>'.$Responsavel.'</td>
                                                        <td>'.$Silo.'</td>
                                                        <td>'.$acumulado.'</td>
                                                        </tbody>';
                                                        $coluna = array($Data, $HoraDia, $Temperatura, $Umidade, $Responsavel, $Silo, $acumulado);
                                                        $content[] = $coluna;
                                                }
                                                $dados = array($title, $content, $info);
                                                $TodosDados[] = $dados;
                                     echo '</table>    
                                </div>
                            </div>
                        </div>
                    </div>';
        }
        else if(isset($estoques))
        {
            $info = "Estoques registrados:";
            $title = array("Data", "O/I", "Toneladas", "Responsável", "Silo");
            $content = array();
            echo '<div class="col-lg-12 col-sm-4">
                        <div class="panel panel-inverse">
                            <div class="panel-heading">Aerações
                                <div class="pull-right">
                                    <a href="#" data-perform="panel-collapse">
                                        <i class="ti-plus"></i>
                                    </a> 
                                    <a href="#" data-perform="panel-dismiss">
                                        <i class="ti-close"></i>
                                    </a> 
                                </div>
                            </div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body">
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Data</th>
                                                <th>O/I</th>
                                                <th>Toneladas</th>
                                                <th>Responsável</th>
                                                <th>Silo</th>
                                            </tr>
                                        </thead>';
                                        foreach ($estoques as $estoque)
                                        {
                                            
                                            $Data        =$estoque->data;
                                            $Ocorrido    =$estoque->Ocorrido;
                                            $Toneladas   =$estoque->Toneladas;
                                            $Responsavel =$estoque->Responsavel;
                                            $Silo        =$estoque->nome;
                                            echo'<tbody>
                                            <td>'.$Data.'</td>
                                            <td>'.$Ocorrido.'</td>
                                            <td>'.$Toneladas.'</td>
                                            <td>'.$Responsavel.'</td>
                                            <td>'.$Silo.'</td>
                                            </tbody>';
                                            $coluna = array($Data, $Ocorrido, $Toneladas, $Responsavel, $Silo);
                                            $content[] = $coluna;             
                                        }
                                        $dados = array($title, $content, $info);
                                        $TodosDados[] = $dados;
                             echo '</table>    
                                </div>
                            </div>
                        </div>
                    </div>';
        }
        else if(isset($expurgos))
        {
            $info = "Expurgos registrados:";
            $title = array("Data", "Número Receituario", "Responsável", "Silo");
            $content = array();
            echo '<div class="col-lg-12 col-sm-4">
                        <div class="panel panel-inverse">
                            <div class="panel-heading">Aerações
                                <div class="pull-right">
                                    <a href="#" data-perform="panel-collapse">
                                        <i class="ti-plus"></i>
                                    </a> 
                                    <a href="#" data-perform="panel-dismiss">
                                        <i class="ti-close"></i>
                                    </a> 
                                </div>
                            </div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body">
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Data</th>
                                                <th>Número Receituario</th>
                                                <th>Responsável</th>
                                                <th>Silo</th>
                                            </tr>
                                        </thead>';
                                        foreach ($expurgos as $expurgo)
                                        {
                                            $Data           =$expurgo->silo;
                                            $NumReceituario =$expurgo->numReceituario;
                                            $Responsavel    =$expurgo->Responsavel;
                                            $Silo           =$expurgo->nome;
                                            echo'<tbody>
                                            <td>'.$Data.'</td>
                                            <td>'.$NumReceituario.'</td>
                                            <td>'.$Responsavel.'</td>
                                            <td>'.$Silo.'</td>
                                            </tbody>';
                                            $coluna = array($Data, $NumReceituario, $Responsavel, $Silo);
                                            $content[] = $coluna;                
                                        }
                                        $dados = array($title, $content, $info);
                                        $TodosDados[] = $dados;
                              echo '</table>    
                                </div>
                            </div>
                        </div>
                    </div>';
        }
        else if(isset($nebulizacoes))
        {
            $info = "Nebulizações registrados:";
            $title = array("Data", "Inseticida", "Responsável", "Silo");
            $content = array();
            echo '<div class="col-lg-12 col-sm-4">
                        <div class="panel panel-inverse">
                            <div class="panel-heading">Aerações
                                <div class="pull-right">
                                    <a href="#" data-perform="panel-collapse">
                                        <i class="ti-plus"></i>
                                    </a> 
                                    <a href="#" data-perform="panel-dismiss">
                                        <i class="ti-close"></i>
                                    </a> 
                                </div>
                            </div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body">
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Data</th>
                                                <th>Inseticida</th>
                                                <th>Responsável</th>
                                                <th>Silo</th>
                                            </tr>
                                        </thead>';
                                        foreach ($nebulizacoes as $nebulizacao)
                                        {
                                            $Data        =$nebulizacao->data;
                                            $Inseticida  =$nebulizacao->Inseticida;
                                            $Responsavel =$nebulizacao->Responsavel;
                                            $Silo        =$nebulizacao->nome;
                                            echo'<tbody>
                                            <td>'.$Data.'</td>
                                            <td>'.$Inseticida.'</td>
                                            <td>'.$Responsavel.'</td>
                                            <td>'.$Silo.'</td>
                                            </tbody>';
                                            $coluna = array($Data, $Inseticida, $Responsavel, $Silo);
                                            $content[] = $coluna;               
                                        }
                                        $dados = array($title, $content, $info);
                                        $TodosDados[] = $dados;
                                echo '</table>    
                                </div>
                            </div>
                        </div>
                    </div>';
        }
        else if(isset($pulverizacoes))
        {
            $info = "Pulverizações registrados:";
            $title = array("Data", "Inseticida", "Responsável", "Silo");
            $content = array();
            echo '<div class="col-lg-12 col-sm-4">
                        <div class="panel panel-inverse">
                            <div class="panel-heading">Aerações
                                <div class="pull-right">
                                    <a href="#" data-perform="panel-collapse">
                                        <i class="ti-plus"></i>
                                    </a> 
                                    <a href="#" data-perform="panel-dismiss">
                                        <i class="ti-close"></i>
                                    </a> 
                                </div>
                            </div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body">
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Data</th>
                                                <th>Inseticida</th>
                                                <th>Responsável</th>
                                                <th>Silo</th>
                                            </tr>
                                        </thead>';
                                        foreach ($pulverizacoes as $pulverizacao)
                                        {
                                            $Data        =$pulverizacao->data;
                                            $Inseticida  =$pulverizacao->inseticida;
                                            $Responsavel =$pulverizacao->Responsavel;
                                            $Silo        =$pulverizacao->nome;
                                            echo'<tbody>
                                            <td>'.$Data.'</td>
                                            <td>'.$Inseticida.'</td>
                                            <td>'.$Responsavel.'</td>
                                            <td>'.$Silo.'</td>
                                            </tbody>';                                
                                            $coluna = array($Data, $Inseticida, $Responsavel, $Silo);
                                            $content[] = $coluna;                          
                                        }
                                        $dados = array($title, $content, $info);
                                        $TodosDados[] = $dados;
                                    echo '</table>    
                                </div>
                            </div>
                        </div>
                    </div>';
        }
        else if(isset($rastelagens))
        {
            $info = "Rastelagens registrados:";
            $title = array("Data", "Responsável", "Silo");
            $content = array();
            echo '<div class="col-lg-12 col-sm-4">
                    <div class="panel panel-inverse">
                        <div class="panel-heading">Aerações
                            <div class="pull-right">
                                <a href="#" data-perform="panel-collapse">
                                    <i class="ti-plus"></i>
                                </a> 
                                <a href="#" data-perform="panel-dismiss">
                                    <i class="ti-close"></i>
                                </a> 
                            </div>
                        </div>
                        <div class="panel-wrapper collapse in" aria-expanded="true">
                            <div class="panel-body">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Data</th>
                                            <th>Responsável</th>
                                            <th>Silo</th>
                                        </tr>
                                    </thead>';
                                    foreach ($rastelagens as $rastelagem)
                                    {
                                        $Data        =$rastelagem->silo;
                                        $Responsavel =$rastelagem->Responsavel;
                                        $Silo        =$rastelagem->nome;
                                        echo'<tbody>
                                        <td>'.$Data.'</td>
                                        <td>'.$Responsavel.'</td>
                                        <td>'.$Silo.'</td>
                                        </tbody>';    
                                        $coluna = array($Data, $Responsavel, $Silo);
                                        $content[] = $coluna;
                                    }             
                                    $dados = array($title, $content, $info);
                                    $TodosDados[] = $dados;               
                                echo '</table>    
                            </div>
                        </div>
                    </div>
                </div>';
        }
        else if(isset($remaquinacoes))
        {
            $info = "Remaquinações registrados:";
            $title = array("Data", "Responsável", "Silo");
            $content = array();
            echo '<div class="col-lg-12 col-sm-4">
                        <div class="panel panel-inverse">
                            <div class="panel-heading">Aerações
                                <div class="pull-right">
                                    <a href="#" data-perform="panel-collapse">
                                        <i class="ti-plus"></i>
                                    </a> 
                                    <a href="#" data-perform="panel-dismiss">
                                        <i class="ti-close"></i>
                                    </a> 
                                </div>
                            </div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body">
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Data</th>>
                                                <th>Responsável</th>
                                                <th>Silo</th>
                                            </tr>
                                        </thead>';
                                        foreach ($remaquinacoes as $remaquinacao)
                                        {
                                            $Data         =$remaquinacao->data;
                                            $Responsavel  =$remaquinacao->Responsavel;
                                            $Silo         =$remaquinacao->nome;
                                            echo'<tbody>
                                            <td>'.$Data.'</td>
                                            <td>'.$Responsavel.'</td>
                                            <td>'.$Silo.'</td>
                                            </tbody>';                                
                                            $coluna = array($Data, $Responsavel, $Silo);
                                            $content[] = $coluna;                   
                                        } 
                                        $dados = array($title, $content, $info);
                                        $TodosDados[] = $dados;
                            echo '</table>    
                        </div>
                    </div>
                </div>
            </div>';
        }
        else if(isset($sondagens))
        {
            $info = "Sondagens registrados:";
            $title = array("Data", "Sondagem Realizadas", "Responsável", "Silo");
            $content = array();
            echo '<div class="col-lg-12 col-sm-4">
                        <div class="panel panel-inverse">
                            <div class="panel-heading">Aerações
                                <div class="pull-right">
                                    <a href="#" data-perform="panel-collapse">
                                        <i class="ti-plus"></i>
                                    </a> 
                                    <a href="#" data-perform="panel-dismiss">
                                        <i class="ti-close"></i>
                                    </a> 
                                </div>
                            </div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body">
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Data</th>
                                                <th>Sondagem Realizadas</th>
                                                <th>Responsável</th>
                                                <th>Silo</th>
                                            </tr>
                                        </thead>';
                                        foreach ($sondagens as $sondagem)
                                        {
                                            $Data        =$sondagem->data;
                                            $SondRea     =$sondagem->SondagemRealizada;
                                            $Responsavel =$sondagem->Responsavel;
                                            $Silo        =$sondagem->nome;
                                            echo'<tbody>
                                            <td>'.$Data.'</td>
                                            <td>'.$SondRea.'</td>
                                            <td>'.$Responsavel.'</td>
                                            <td>'.$Silo.'</td>
                                            </tbody>';    
                                            $coluna = array($Data, $SondRea, $Responsavel, $Silo);
                                            $content[] = $coluna;                   
                                        }
                                        $dados = array($title, $content, $info);
                                        $TodosDados[] = $dados;
                                echo '</table>    
                            </div>
                        </div>
                    </div>
                </div>';
        }
        else if(isset($termometrias))
        {
            $info = "Termometrias registrados:";
            $title = array("Data", "Temperatura Ambiente", "Temperatura Máxima", "Número de pontos acima de 29°C", "Responsável", "Silo");
            $content = array();
            echo '<div class="col-lg-12 col-sm-4">
                        <div class="panel panel-inverse">
                            <div class="panel-heading">Aerações
                                <div class="pull-right">
                                    <a href="#" data-perform="panel-collapse">
                                        <i class="ti-plus"></i>
                                    </a> 
                                    <a href="#" data-perform="panel-dismiss">
                                        <i class="ti-close"></i>
                                    </a> 
                                </div>
                            </div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body">
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Data</th>
                                                <th>Temperatura Ambiente</th>
                                                <th>Temperatura Máxima</th>
                                                <th>Número de pontos acima de 29°C</th>
                                                <th>Responsável</th>
                                                <th>Silo</th>
                                            </tr>
                                        </thead>';
                                        foreach ($termometrias as $termometria)
                                        {
                                            $Data        =$termometria->data;
                                            $TempMax     =$termometria->TempMax;
                                            $TempAmb     =$termometria->TempAmb;
                                            $upto29      =$termometria->upto29;
                                            $Responsavel =$termometria->Responsavel;
                                            $Silo        =$termometria->nome;
                                            echo'<tbody>
                                            <td>'.$Data.'</td>
                                            <td>'.$TempAmb.'°C</td>
                                            <td>'.$TempMax.'°C</td>
                                            <td>'.$upto29.'</td>
                                            <td>'.$Responsavel.'</td>
                                            <td>'.$Silo.'</td>
                                            </tbody>';                                
                                            $coluna = array($Data, $TempAmb, $TempMax, $upto29, $Responsavel, $Silo);
                                            $content[] = $coluna;         
                                        }
                                        $dados = array($title, $content, $info);
                                        $TodosDados[] = $dados;
                                echo '</table>    
                                </div>
                            </div>
                        </div>
                    </div>';
        }
        else if(isset($transilagens))
        {
            $info = "Transilagens registradas:";
            $title = array("Data", "Quantidade Aprox.", "Número Célula Receptora", "Responsável");
            $content = array();
            echo '<div class="col-lg-12 col-sm-4">
                        <div class="panel panel-inverse">
                            <div class="panel-heading">Aerações
                                <div class="pull-right">
                                    <a href="#" data-perform="panel-collapse">
                                        <i class="ti-plus"></i>
                                    </a> 
                                    <a href="#" data-perform="panel-dismiss">
                                        <i class="ti-close"></i>
                                    </a> 
                                </div>
                            </div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body">
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Data</th>
                                                <th>Quantidade Aprox.</th>
                                                <th>Número Célula Receptora</th>
                                                <th>Responsável</th>
                                            </tr>
                                        </thead>';
                                        foreach ($transilagens as $transilagem)
                                        {
                                            $Data        =$transilagem->data;
                                            $qtdAprox    =$transilagem->quantidadeAprox;
                                            $numCelula   =$transilagem->numCelularReceptora;
                                            $Responsavel =$transilagem->Responsavel;
                                            $Silo        =$transilagem->nome;
                                            echo'<tbody>
                                            <td>'.$Data.'</td>
                                            <td>'.$qtdAprox.'</td>
                                            <td>'.$numCelula.'</td>
                                            <td>'.$Responsavel.'</td>
                                            <td>'.$Silo.'</td>
                                            </tbody>'; 
                                            $coluna = array($Data, $qtdAprox, $numCelula, $Responsavel, $Silo);
                                            $content[] = $coluna;                            
                                        }
                                        $dados = array($title, $content, $info);
                                        $TodosDados[] = $dados;
                                echo '</table>    
                                </div>
                            </div>
                        </div>
                    </div>';
        }
        else if(isset($tratamentos))
        {
            $info = "Tratamentos de fita registrados:";
            $title = array("Data", "Inseticida", "Dosagem", "Total/Parcial", "Responsável");
            $content = array();
            echo '<div class="col-lg-12 col-sm-4">
                        <div class="panel panel-inverse">
                            <div class="panel-heading">Aerações
                                <div class="pull-right">
                                    <a href="#" data-perform="panel-collapse">
                                        <i class="ti-plus"></i>
                                    </a> 
                                    <a href="#" data-perform="panel-dismiss">
                                        <i class="ti-close"></i>
                                    </a> 
                                </div>
                            </div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body">
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Data</th>
                                                <th>Inseticida</th>
                                                <th>Dosagem</th>
                                                <th>Total/Parcial</th>
                                                <th>Responsável</th>
                                                <th>Silo</th>
                                            </tr>
                                        </thead>';
                                        foreach ($tratamentos as $tratamento)
                                        {
                                            $Data        =$tratamento->data;
                                            $Inseticida  =$tratamento->inseticida;
                                            $Dosagem     =$tratamento->dosagem;
                                            $Total       =$tratamento->total_parcial;
                                            $Responsavel  =$tratamento->Responsavel;
                                            $Silo        =$tratamento->nome;
                                            echo'<tbody>
                                            <td>'.$Data.'</td>
                                            <td>'.$Inseticida.'</td>
                                            <td>'.$Dosagem.'</td>
                                            <td>'.$Total.'</td>
                                            <td>'.$Responsavel.'</td>
                                            <td>'.$Silo.'</td>
                                            </tbody>';
                                            $coluna = array($Data, $Inseticida, $Dosagem, $Total, $Responsavel, $Silo);
                                            $content[] = $coluna;
                                        }
                                        $dados = array($title, $content, $info);
                                        $TodosDados[] = $dados;
                                echo '</table>    
                                </div>
                            </div>
                        </div>
                    </div>';
        }
        $_SESSION['param'] = $TodosDados;
        echo "<button class='btn btn-success'onclick='location = \"pdf.php\"' style='float: right'>Gerar PDF</button>";
    ?>
</div>
<!-- fechamento -->
<?php
    $layout->Footer();
    $layout->FechaContent();
    $layout->FechaWrapper();
    $layout->Scripts();
    $layout->FechaBody();
    $layout->FechaPag();
?>
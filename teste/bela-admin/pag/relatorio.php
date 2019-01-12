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

<!-- Carrega JS para minimizar Tabela -->
<script src="js/min-table.js"></script>
<!-- *********************************** -->

<!-- JS Para minimizar e maximizar tabelas do relatorio -->
<script src="js/relatorio.js"></script>
<!-- ******************************************************* -->



<div class="container-fluid">
    <?php
        /*------------------------------Classes-------------------------------*/
        $layout->titulo("Relatório");
        include 'ClassPHP/Armazenagem.php';
        include 'ClassPHP/dateParse.php';
        include 'ClassPHP/Unidade.php';
        include 'ClassPHP/Usuario.php';
        $ClasseUsuario      = new Usuario();
        global $logado;
        $nomeUsuario        = $ClasseUsuario->buscarNomeUsuario($logado);
        $ClasseUnidade      = new Unidade();
        $idSilo             = $_REQUEST['idSilo'];
        $nomeUnidade        = $ClasseUnidade->buscarNomeUnidadeSilo($idSilo);
        $TodosDados         = array();
        $dt                 = new DateConverter();
        $ClasseArmazenagem  = new Armazenagem();
        $periodo            = $_POST['cb_periodo'];

        
        /*------------------------------Metodos-------------------------------*/
        if(isset($periodo))
        {
            if($periodo =="Diario")
            {
                $data                           = $_POST['dataDiario'];
                $estoque_transilagem_pp         = $ClasseArmazenagem->buscarETPDiario($idSilo,$data);
                $registroEstoque                = $ClasseArmazenagem->buscarRegistroEstoqueDiario($idSilo,$data);
                $dados_Termometria_Aera_Trans   = $ClasseArmazenagem->buscarTermometriaAeraTransDiario($idSilo,$data);

                $aeracoes                       = $ClasseArmazenagem->buscarAeracaoSiloDiario($idSilo,$data);
                
                $expurgos                       = $ClasseArmazenagem->buscarExpurgoSiloDiario($idSilo,$data);
                $nebulizacoes                   = $ClasseArmazenagem->buscarNebulizacaoSiloDiario($idSilo,$data);
                $pulverizacoes                  = $ClasseArmazenagem->buscarPulverizacaoSiloDiario($idSilo,$data);
                $rastelagens                    = $ClasseArmazenagem->buscarRastelagemSiloDiario($idSilo,$data);
                $remaquinacoes                  = $ClasseArmazenagem->buscarRemaquinacaoSiloDiario($idSilo,$data);
                $sondagem_termometria           = $ClasseArmazenagem->buscarSondagem_TermometriaDiario($idSilo,$data);
                $sondagem_padrao                = $ClasseArmazenagem->buscarSondagem_PadraoDiario($idSilo,$data);
                $termometrias                   = $ClasseArmazenagem->buscarTermometriaSiloDiario($idSilo,$data);
                $transilagens                   = $ClasseArmazenagem->buscarTransilagemSiloDiario($idSilo,$data);
                $tratamentos                    = $ClasseArmazenagem->buscarTratamentoFitaSiloDiario($idSilo,$data);
            }
            else if($periodo =="Mensal")
            {
                $data          = $_POST['dataMes'];
                //Separa Mes e ano da String
                $haystack      = $data;
                $needle        = '-';
                $lenFinal      = strlen($data);
                $pos           = strripos($haystack, $needle);
                $ano           = substr($data,0,$pos);
                $mes           = substr($data,$pos+1,$lenFinal);

                $estoque_transilagem_pp         = $ClasseArmazenagem->buscarETPMensal($idSilo,$mes,$ano);
                $registroEstoque                = $ClasseArmazenagem->buscarRegistroEstoqueMensal($idSilo,$mes,$ano);
                $dados_Termometria_Aera_Trans   = $ClasseArmazenagem->buscarTermometriaAeraTransMensal($idSilo,$mes,$ano);

                $aeracoes                       = $ClasseArmazenagem->buscarAeracaoSiloMensal($idSilo,$mes,$ano);
                $expurgos                       = $ClasseArmazenagem->buscarExpurgoSiloMensal($idSilo,$mes,$ano);
                $nebulizacoes                   = $ClasseArmazenagem->buscarNebulizacaoSiloMensal($idSilo,$mes,$ano);
                $pulverizacoes                  = $ClasseArmazenagem->buscarPulverizacaoSiloMensal($idSilo,$mes,$ano);
                $rastelagens                    = $ClasseArmazenagem->buscarRastelagemSiloMensal($idSilo,$mes,$ano);
                $remaquinacoes                  = $ClasseArmazenagem->buscarRemaquinacaoSiloMensal($idSilo,$mes,$ano);
                $sondagem_termometria           = $ClasseArmazenagem->buscarSondagem_TermometriaMensal($idSilo,$mes,$ano);
                $sondagem_padrao                = $ClasseArmazenagem->buscarSondagem_PadraoMensal($idSilo,$mes,$ano);
                $termometrias                   = $ClasseArmazenagem->buscarTermometriaSiloMensal($idSilo,$mes,$ano);
                $transilagens                   = $ClasseArmazenagem->buscarTransilagemSiloMensal($idSilo,$mes,$ano);
                $tratamentos                    = $ClasseArmazenagem->buscarTratamentoFitaSiloMensal($idSilo,$mes,$ano);
            }
            else if($periodo =="Anual")
            {
                $data          = $_POST['dataAnual'];
                //Separa Mes e ano da String
                $haystack      = $data;
                $needle        = '-';
                $lenFinal      = strlen($data);
                $pos           = strripos($haystack, $needle);
                $ano           = substr($data,0,$pos);
                $mes           = substr($data,$pos+1,$lenFinal);

                $estoque_transilagem_pp         = $ClasseArmazenagem->buscarETPAnual($idSilo,$ano);
                $registroEstoque                = $ClasseArmazenagem->buscarRegistroEstoqueAnual($idSilo,$ano);
                $dados_Termometria_Aera_Trans   = $ClasseArmazenagem->buscarTermometriaAeraTransAnual($idSilo,$ano);

                $aeracoes                       = $ClasseArmazenagem->buscarAeracaoSiloAnual($idSilo,$ano);
                $expurgos                       = $ClasseArmazenagem->buscarExpurgoSiloAnual($idSilo,$mes,$ano);
                $nebulizacoes                   = $ClasseArmazenagem->buscarNebulizacaoSiloAnual($idSilo,$ano);
                $pulverizacoes                  = $ClasseArmazenagem->buscarPulverizacaoSiloAnual($idSilo,$ano);
                $rastelagens                    = $ClasseArmazenagem->buscarRastelagemSiloAnual($idSilo,$ano);
                $remaquinacoes                  = $ClasseArmazenagem->buscarRemaquinacaoSiloAnual($idSilo,$ano);
                $sondagem_termometria           = $ClasseArmazenagem->buscarSondagem_TermometriaAnual($idSilo,$ano);
                $sondagem_padrao                = $ClasseArmazenagem->buscarSondagem_PadraoAnual($idSilo,$ano);
                $termometrias                   = $ClasseArmazenagem->buscarTermometriaSiloAnual($idSilo,$ano);
                $transilagens                   = $ClasseArmazenagem->buscarTransilagemSiloAnual($idSilo,$ano);
                $tratamentos                    = $ClasseArmazenagem->buscarTratamentoFitaSiloAnual($idSilo,$ano);
            }
            else if($periodo =="Safra")
            {
                
                
                $tipoSafra  = $_POST['inSafra'];
                if($tipoSafra)
                {
                    $idH   = $_POST['cb_safra']; 
                    $idHistorico=substr($idH, 1); 

                    $registro                       = $ClasseArmazenagem->buscarSafraUnica($idHistorico);

                    $idHistoricoAlterado            = $registro->idHistoricoAlterado;
                    $idHistoricoNovo                = $registro->idHistoricoNovo;
                    foreach ($registro as $value) 
                    {
                        $idHistoricoAlterado            = $value->idHistoricoAlterado;
                        $idHistoricoNovo                = $value->idHistoricoNovo;
                        
                        $estoque_transilagem_pp         = $ClasseArmazenagem->buscarETPSafraDuplo($idHistoricoAlterado,$idHistoricoNovo);
                        $registroEstoque                = $ClasseArmazenagem->buscarRegistroEstoqueSafraDuplo($idHistoricoAlterado,$idHistoricoNovo);
                        $dados_Termometria_Aera_Trans   = $ClasseArmazenagem->buscarTermometriaAeraTransSafraDuplo($idHistoricoAlterado,$idHistoricoNovo);
                        $aeracoes                       = $ClasseArmazenagem->buscarAeracaoSiloSafraDuplo($idHistoricoAlterado,$idHistoricoNovo);
                        $expurgos                       = $ClasseArmazenagem->buscarExpurgoSiloSafraDuplo($idHistoricoAlterado,$idHistoricoNovo);
                        $nebulizacoes                   = $ClasseArmazenagem->buscarNebulizacaoSiloSafraDuplo($idHistoricoAlterado,$idHistoricoNovo);
                        $pulverizacoes                  = $ClasseArmazenagem->buscarPulverizacaoSiloSafraDuplo($idHistoricoAlterado,$idHistoricoNovo);
                        $rastelagens                    = $ClasseArmazenagem->buscarRastelagemSiloSafraDuplo($idHistoricoAlterado,$idHistoricoNovo);
                        $remaquinacoes                  = $ClasseArmazenagem->buscarRemaquinacaoSiloSafraDuplo($idHistoricoAlterado,$idHistoricoNovo);
                        $sondagem_termometria           = $ClasseArmazenagem->buscarSondagem_TermometriaSafraDuplo($idHistoricoAlterado,$idHistoricoNovo);
                        $sondagem_padrao                = $ClasseArmazenagem->buscarSondagem_PadraoSafraDuplo($idHistoricoAlterado,$idHistoricoNovo);
                        $termometrias                   = $ClasseArmazenagem->buscarTermometriaSiloSafraDuplo($idHistoricoAlterado,$idHistoricoNovo);
                        $transilagens                   = $ClasseArmazenagem->buscarTransilagemSiloSafraDuplo($idHistoricoAlterado,$idHistoricoNovo);
                        $tratamentos                    = $ClasseArmazenagem->buscarTratamentoFitaSiloSafraDuplo($idHistoricoAlterado,$idHistoricoNovo);
                    }
                }
                else 
                {
                    $idH   = $_POST['cb_safra']; 
                    $idHistorico=substr($idH, 1);
                    $estoque_transilagem_pp         = $ClasseArmazenagem->buscarETPSafra($idHistorico);
                    $registroEstoque                = $ClasseArmazenagem->buscarRegistroEstoqueSafra($idHistorico);
                    $dados_Termometria_Aera_Trans   = $ClasseArmazenagem->buscarTermometriaAeraTransSafra($idHistorico);
                    $aeracoes                       = $ClasseArmazenagem->buscarAeracaoSiloSafra($idHistorico);
                    $expurgos                       = $ClasseArmazenagem->buscarExpurgoSiloSafra($idHistorico);
                    $nebulizacoes                   = $ClasseArmazenagem->buscarNebulizacaoSiloSafra($idHistorico);
                    $pulverizacoes                  = $ClasseArmazenagem->buscarPulverizacaoSiloSafra($idHistorico);
                    $rastelagens                    = $ClasseArmazenagem->buscarRastelagemSiloSafra($idHistorico);
                    $remaquinacoes                  = $ClasseArmazenagem->buscarRemaquinacaoSiloSafra($idHistorico);
                    $sondagem_termometria           = $ClasseArmazenagem->buscarSondagem_TermometriaSafra($idHistorico);
                    $sondagem_padrao                = $ClasseArmazenagem->buscarSondagem_PadraoSafra($idHistorico);
                    $termometrias                   = $ClasseArmazenagem->buscarTermometriaSiloSafra($idHistorico);
                    $transilagens                   = $ClasseArmazenagem->buscarTransilagemSiloSafra($idHistorico);
                    $tratamentos                    = $ClasseArmazenagem->buscarTratamentoFitaSiloSafra($idHistorico);
                }
            }
        }
        
        //Verifica se existe algo nos apontamentos e cria uma tabela com os mesmos

        //Se Existir, carrega informações dos apontamentos na tabela;
        if($aeracoes != null)
        {
            $info = "Aerações registrados:";
            $title = array("Data", "Horas/dia", "Temperatura", "Umidade", "Responsável", "Silo", "Horas Acumuladas");
            $content = array();
            $TodosDados = array();
            echo '<div class="col-lg-12 col-sm-4">
                        <div class="panel panel-inverse">
                            <div class="panel-heading">Aerações
                                <div class="pull-right">
                                    <div class="pull-right">
                                        <button class="btn btn-round btn-default" id="btnAeracao">-</button>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body">
                                    <table id="tabelaAeracao" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Silo</th>
                                                <th>Data</th>
                                                <th>Horas/dia</th>
                                                <th>Temperatura</th>
                                                <th>Umidade</th>
                                                <th>Horas Acumuladas</th>
                                                <th>Responsável</th>
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
                                                    $Silo        =$aeracao->silo;
                                                    $acumulado   =$aeracao->acumulado;
                                                    echo'<tbody>
                                                        <td>'.$Silo.'</td>
                                                        <td>'.$Data.'</td>
                                                        <td>'.$HoraDia.'</td>
                                                        <td>'.$Temperatura.'°C</td>
                                                        <td>'.$Umidade.'%</td>
                                                        <td>'.$acumulado.'</td>
                                                        <td>'.$Responsavel.'</td>
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
        if($estoque_transilagem_pp != null)//
        {
            $info = "Estoque + Transilgem + Padrão registrados:";
            $title = array("Data", "Armazem", "Quantidade", "Armazem Destino", "Padrão Anterior","Padrão Final","Responsavel");
            $content = array();
            echo '<div class="col-lg-12 col-sm-4">
                        <div class="panel panel-inverse">
                                <div class="panel-heading">Estoque - Transilagem - Padrão
                                    <div class="pull-right">
                                        <button class="btn btn-round btn-default" id="btnETP">-</button>
                                    </div>
                                </div>
                                <div class="panel-wrapper collapse in" aria-expanded="true">
                                    <div class="panel-body">
                                        <table id="tabelaETP" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Armazém Origem</th>
                                                    <th>Data</th>
                                                    <th>Quantidade Transilagem</th>
                                                    <th>Armazém Destino</th>
                                                    <th>Padrão Anterior</th>
                                                    <th>Padrão Final</th>
                                                    <th>Responsável</th>
                                                </tr>
                                            </thead>';
                                            foreach ($estoque_transilagem_pp as $estoque)
                                            {
                                                $Dt             =$estoque->data;
                                                $Data           =$dt->getDateFromDate($Dt);
                                                $Armazem        =$estoque->nomeSilo;
                                                $Quantidade     =$estoque->quantidade;
                                                $ArmazemDestino =$estoque->nomeSiloSaida;
                                                $PadraoAlterado =$estoque->padraoAlterado;
                                                $PadraoFinal    =$estoque->padraoFinal;
                                                $Responsavel    =$estoque->responsavel;
                                                echo'<tbody>
                                                <td>'.$Armazem.'</td>
                                                <td>'.$Data.'</td>
                                                <td>'.$Quantidade.'</td>
                                                <td>'.$ArmazemDestino.'</td>
                                                <td>'.round($PadraoAlterado, 1).'</td>
                                                <td>'.round($PadraoFinal, 1).'</td>
                                                <td>'.$Responsavel.'</td>
                                                </tbody>';
                                                $coluna = array($Data, $Armazem, $Quantidade, $ArmazemDestino, $PadraoAlterado,$PadraoFinal,$Responsavel);
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
        if($registroEstoque != null)
        {
            $info = "Registro Estoque registrado:";
            $title = array("Data", "Armazem",  "Tipo", "Qtd. Alterada","qtd. Final","Safra","Responsavel");
            $content = array();
            echo '<div class="col-lg-12 col-sm-4">
                        <div class="panel panel-inverse">
                                <div class="panel-heading">Registro Estoque
                                    <div class="pull-right">
                                        <button class="btn btn-round btn-default" id="btnRegistroEstoque">-</button>
                                    </div>
                                </div>
                                <div class="panel-wrapper collapse in" aria-expanded="true">
                                    <div class="panel-body">
                                        <table id="tabelaRegistroEstoque" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Armazém</th>
                                                    <th>Data</th>
                                                    <th>Tipo</th>
                                                    <th>Quantidade Anterior</th>
                                                    <th>Quantidade Final</th>
                                                    <th>Safra</th>
                                                    <th>Responsável</th>
                                                </tr>
                                            </thead>';
                                            foreach ($registroEstoque as $estoque)
                                            {
                                                
                                                $Dt             =$estoque->data;
                                                $Data           =$dt->getDateFromDate($Dt);
                                                $Armazem        =$estoque->nome;
                                                $Quantidade     =$estoque->quantidade;
                                                $tipoE          =$estoque->tipo;
                                                $safra          =$estoque->nomeSafra;
                                                if($tipoE== 1)
                                                {
                                                    $tipo ="Entrada";
                                                }
                                                else
                                                {
                                                    $tipo ="Saída";
                                                }
                                                $qtdAlterado    =$estoque->qtdAlterada;
                                                $qtdFinal       =$estoque->qtd_final;
                                                $Responsavel    =$estoque->responsavel;
                                                echo'<tbody>
                                                <td>'.$Armazem.'</td>
                                                <td>'.$Data.'</td>
                                                <td>'.$tipo.'</td>
                                                <td>'.$qtdAlterado.'</td>
                                                <td>'.$qtdFinal.'</td>
                                                <td>'.$safra.'</td>
                                                <td>'.$Responsavel.'</td>
                                                </tbody>';
                                                $coluna = array($Data, $Armazem, $tipo, $qtdAlterado,$qtdFinal,$safra,$Responsavel);
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
        if($dados_Termometria_Aera_Trans != null)
        {
            $info = "Termometria + Aerações + Transilagem registrado:";
            $title = array("Data", "Armazem","Temp. Ambiente", "Temp. Máxima", "Pontos acima de 29ºC","Umidade A.","Temperatura A.","Transilagem","Responsavel");
            $content = array();
            echo '<div class="col-lg-12 col-sm-4">
                        <div class="panel panel-inverse">
                                <div class="panel-heading">Termometria + Aeração + Transilagem
                                    <div class="pull-right">
                                        <button class="btn btn-round btn-default" id="btnTAT">-</button>
                                    </div>
                                </div>
                                <div class="panel-wrapper collapse in" aria-expanded="true">
                                    <div class="panel-body">
                                        <table id="tabelaTAT" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Armazém</th>
                                                    <th>Data</th>
                                                    <th>Temp. Ambiente</th>
                                                    <th>Temp. Máxima </th>
                                                    <th>Pontos acima de 29°C</th>
                                                    <th>Umidade Aeração</th>
                                                    <th>Temperatura Aeração</th>
                                                    <th>Transilagem</th>
                                                    <th>Responsável</th>
                                                </tr>
                                            </thead>';
                                            foreach ($dados_Termometria_Aera_Trans as $estoque)
                                            {
                                                
                                                $Armazem        =$estoque->nome;
                                                $Dt             =$estoque->data;
                                                $Data           =$dt->getdateFromDate($Dt);
                                                $TempAmb        =$estoque->TempAmb;
                                                $TempMax        =$estoque->TempMax;
                                                $upto29         =$estoque->upto29;
                                                $umidade        =$estoque->umidade;
                                                $temperatura    =$estoque->temperatura;
                                                $trasilagem     =$estoque->idTransilagens;
                                                //Verifica se foi feita alguma transilagem, caso tenha feito, carregar informação "Sim", caso não, carrega informação "Não"
                                                if(isset($transilagem))
                                                {
                                                    $trans ="Sim";
                                                }
                                                else
                                                {
                                                    $trans="Não";
                                                }

                                                $Responsavel    =$estoque->responsavel;
                                                echo'<tbody>
                                                <td>'.$Armazem.'</td>
                                                <td>'.$Data.'</td>
                                                <td>'.$TempAmb.'°C</td>
                                                <td>'.$TempMax.'°c</td>
                                                <td>'.$upto29.'</td>
                                                <td>'.$umidade.'%</td>
                                                <td>'.$temperatura.'°C</td>
                                                <td>'.$trans.'</td>
                                                <td>'.$Responsavel.'</td>
                                                </tbody>';
                                                $coluna = array($Data, $Armazem, $TempAmb, $TempMax, $upto29,$umidade,$temperatura,$trans,$Responsavel);
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
        if($expurgos != null)
        {
            $info = "Expurgos registrados:";
            $title = array("Data", "Número Receituario", "Responsável", "Silo");
            $content = array();
            echo '<div class="col-lg-12 col-sm-4">
                        <div class="panel panel-inverse">
                            <div class="panel-heading">Expurgos
                                <div class="pull-right">
                                    <div class="pull-right">
                                        <button class="btn btn-round btn-default" id="btnExpurgo">-</button>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body">
                                    <table id="tabelaExpurgo" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Silo</th>
                                                <th>Data</th>
                                                <th>Número Receituario</th>
                                                <th>Responsável</th>
                                            </tr>
                                        </thead>';
                                        foreach ($expurgos as $expurgo)
                                        {
                                            $Silo           =$expurgo->nomeSilo;
                                            $Dt             =$expurgo->data;
                                            $Data           =$dt->getDateFromDate($Dt);
                                            $NumReceituario =$expurgo->numReceituario;
                                            $Responsavel    =$expurgo->Responsavel;
                                            echo'<tbody>
                                            <td>'.$Silo.'</td>
                                            <td>'.$Data.'</td>
                                            <td>'.$NumReceituario.'</td>
                                            <td>'.$Responsavel.'</td>
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
        if($nebulizacoes != null)
        {
            $info = "Nebulizações registrados:";
            $title = array("Data", "Inseticida", "Responsável", "Silo");
            $content = array();
            echo '<div class="col-lg-12 col-sm-4">
                        <div class="panel panel-inverse">
                            <div class="panel-heading">Nebulizações
                                <div class="pull-right">
                                    <div class="pull-right">
                                        <button class="btn btn-round btn-default" id="btnNebulizacao">-</button>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body">
                                    <table id="tabelaNebulizacao" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Silo</th>
                                                <th>Data</th>
                                                <th>Inseticida</th>
                                                <th>Responsável</th>
                                            </tr>
                                        </thead>';
                                        foreach ($nebulizacoes as $nebulizacao)
                                        {
                                            
                                            $Dt          =$nebulizacao->data;
                                            $Data        =$dt->getDateFromDate($Dt);
                                            $Inseticida  =$nebulizacao->inseticida;
                                            $Responsavel =$nebulizacao->Responsavel;
                                            $Silo        =$nebulizacao->nomeSilo;
                                            echo'<tbody>
                                            <td>'.$Silo.'</td>
                                            <td>'.$Data.'</td>
                                            <td>'.$Inseticida.'</td>
                                            <td>'.$Responsavel.'</td>
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
        if($pulverizacoes != null)
        {
            $info = "Pulverizações registrados:";
            $title = array("Data", "Inseticida", "Responsável", "Silo");
            $content = array();
            echo '<div class="col-lg-12 col-sm-4">
                        <div class="panel panel-inverse">
                            <div class="panel-heading">Pulverizações
                                <div class="pull-right">
                                    <div class="pull-right">
                                        <button class="btn btn-round btn-default" id="btnPulverizacao">-</button>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body">
                                    <table id="tabelaPulverizacao" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Silo</th>
                                                <th>Data</th>
                                                <th>Inseticida</th>
                                                <th>Responsável</th>
                                            </tr>
                                        </thead>';
                                        foreach ($pulverizacoes as $pulverizacao)
                                        {
                                            $Dt          =$pulverizacao->data;
                                            $Data        =$dt->getDateFromDate($Dt);
                                            $Inseticida  =$pulverizacao->inseticida;
                                            $Responsavel =$pulverizacao->Responsavel;
                                            $Silo        =$pulverizacao->nomeSilo;
                                            echo'<tbody>
                                            <td>'.$Silo.'</td>
                                            <td>'.$Data.'</td>
                                            <td>'.$Inseticida.'</td>
                                            <td>'.$Responsavel.'</td>
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
        if($rastelagens != null)
        {
            $info = "Rastelagens registrados:";
            $title = array("Data", "Responsável", "Silo");
            $content = array();
            echo '<div class="col-lg-12 col-sm-4">
                    <div class="panel panel-inverse">
                        <div class="panel-heading">Rastelagem
                            <div class="pull-right">
                                <div class="pull-right">
                                        <button class="btn btn-round btn-default" id="btnRastelagem">-</button>
                                    </div>
                            </div>
                        </div>
                        <div class="panel-wrapper collapse in" aria-expanded="true">
                            <div class="panel-body">
                                <table id="tabelaRastelagem" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Silo</th>
                                            <th>Data</th>
                                            <th>Responsável</th>
                                        </tr>
                                    </thead>';
                                    foreach ($rastelagens as $rastelagem)
                                    {
                                        $Silo        =$rastelagem->nomeSilo;
                                        $Dt          =$rastelagem->data;
                                        $Data        =$dt->getDateFromDate($Dt);
                                        $Responsavel =$rastelagem->Responsavel;
                                        echo'<tbody>
                                        <td>'.$Silo.'</td>
                                        <td>'.$Data.'</td>
                                        <td>'.$Responsavel.'</td>
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
        if($remaquinacoes != null)
        {
            $info = "Remaquinações registrados:";
            $title = array("Data", "Responsável", "Silo");
            $content = array();
            echo '<div class="col-lg-12 col-sm-4">
                        <div class="panel panel-inverse">
                            <div class="panel-heading">Remaquinações
                                <div class="pull-right">
                                    <div class="pull-right">
                                        <button class="btn btn-round btn-default" id="btnRemaquinacao">-</button>
                                    </div> 
                                </div>
                            </div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body">
                                    <table id="tabelaRemaquinacao" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Silo</th>
                                                <th>Data</th>
                                                <th>Responsável</th>
                                            </tr>
                                        </thead>';
                                        foreach ($remaquinacoes as $remaquinacao)
                                        {
                                            $Dt           =$remaquinacao->data;
                                            $Data         =$dt->getDateFromDate($Dt);
                                            $Responsavel  =$remaquinacao->Responsavel;
                                            $Silo         =$remaquinacao->nomeSilo;
                                            echo'<tbody>
                                            <td>'.$Silo.'</td>
                                            <td>'.$Data.'</td>
                                            <td>'.$Responsavel.'</td>
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
        /*if(isset($sondagens))
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
        */
        if($sondagem_termometria != null)
        {
            $info = "Sondagens registradas:";
            $title = array("Data", "Temperatura Ambiente", "Temperatura Máxima", "Número de pontos acima de 29°C", "Responsável", "Silo");
            $content = array();
            echo '<div class="col-lg-12 col-sm-4">
                        <div class="panel panel-inverse">
                            <div class="panel-heading">Sondagem + Termometria
                                <div class="pull-right">
                                    <div class="pull-right">
                                        <button class="btn btn-round btn-default" id="btnSondagemTermometria">-</button>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body">
                                    <table id="tabelaSondagemTermometria" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Silo</th>
                                                <th>Data</th>
                                                <th>Temperatura Ambiente</th>
                                                <th>Temperatura Máxima</th>
                                                <th>Número de pontos acima de 29°C</th>
                                                <th>Responsável</th>
                                            </tr>
                                        </thead>';
                                        foreach ($sondagem_termometria as $sondagem)
                                        {
                                            
                                            $Dt          =$sondagem->data;
                                            $Data        =$dt->getDateFromDate($Dt);
                                            $TempMax     =$sondagem->tempMax;
                                            $TempAmb     =$sondagem->tempAmb;
                                            $upto29      =$sondagem->upto29;
                                            $Responsavel =$sondagem->Responsavel;
                                            $Silo        =$sondagem->nomeSilo;
                                            echo'<tbody>
                                            <td>'.$Silo.'</td>
                                            <td>'.$Data.'</td>
                                            <td>'.$TempAmb.'°C</td>
                                            <td>'.$TempMax.'°C</td>
                                            <td>'.$upto29.'</td>
                                            <td>'.$Responsavel.'</td>
                                            </tbody>';    
                                            $coluna = array($Silo,$Data, $TempAmb, $TempMax, $upto29, $Responsavel);
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
        if($sondagem_padrao != null)
        {
            $info = "Sondagens registradas:";
            $title = array("Silo","Data","Umidade","Impureza","Ardido","Ph","Avariado","Esverdeado","Triguilho", "Responsável");
            $content = array();
            echo '<div class="col-lg-12 col-sm-4">
                        <div class="panel panel-inverse">
                            <div class="panel-heading">Sondagem + Padrão do Produto
                                <div class="pull-right">
                                    <div class="pull-right">
                                        <button class="btn btn-round btn-default" id="btnSondagemPadrao">-</button>
                                    </div> 
                                </div>
                            </div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body">
                                    <table id="tabelaSondagemPadrao" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Silo </th>
                                                <th>Data</th>
                                                <th>Umidade</th>
                                                <th>Impureza</th>
                                                <th>Ardido</th>
                                                <th>PH</th>
                                                <th>Avariado</th>
                                                <th>Esverdeado</th>
                                                <th>Triguilho</th>
                                                <th>Responsável</th>
                                            </tr>
                                        </thead>';
                                        foreach ($sondagem_padrao as $sondagemPadrao)
                                        {
                                            $Silo            = $sondagemPadrao->nomeSilo;
                                            $Dt              = $sondagemPadrao->data;
                                            $Data            = $dt->getDate($Dt);
                                            $SondRea         = $sondagemPadrao->SondagemRealizada;
                                            $Responsavel     = $sondagemPadrao->Responsavel;
                                            $Umidade         = $sondagemPadrao->umidade;
                                            $Impureza        = $sondagemPadrao->impureza;
                                            $Ardido          = $sondagemPadrao->ardido;
                                            $PH              = $sondagemPadrao->ph;
                                            $Avariado        = $sondagemPadrao->avariado;
                                            $Esverdiado      = $sondagemPadrao->esverdiado;
                                            $Triguilho       = $sondagemPadrao->triguilho;
                                            echo'<tbody>
                                            <td>'.$Silo.'</td>
                                            <td>'.$Data.'</td>
                                            <td>'.$Umidade.'%</td>
                                            <td>'.$Impureza.'%</td>
                                            <td>'.$Ardido.'%</td>
                                            <td>'.$PH.' %</td>
                                            <td>'.$Avariado.'%</td>
                                            <td>'.$Esverdiado.' %</td>
                                            <td>'.$Triguilho.' %</td>
                                            <td>'.$Responsavel.'</td>
                                            </tbody>';    
                                            $coluna = array($Silo,$Data,$Umidade,$Impureza,$Ardido,$Ph,$Avariado,$Esverdiado,$Triguilho, $Responsavel);
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
        
        if($transilagens!= null)
        {
            $info = "Transilagens registradas:";
            $title = array("Armazem ","Data","Quantidade", "Armazem Destino", "Responsável");
            $content = array();
            echo '<div class="col-lg-12 col-sm-4">
                        <div class="panel panel-inverse">
                            <div class="panel-heading">Transilagens
                                <div class="pull-right">
                                    <div class="pull-right">
                                        <button class="btn btn-round btn-default" id="btnTransilagem">-</button>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body">
                                    <table id="tabelaTransilagem" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Armazém Origem</th>
                                                <th>Data</th>
                                                <th>Quantidade</th>
                                                <th>Armazém Destino</th>
                                                <th>Responsável</th>
                                            </tr>
                                        </thead>';
                                        foreach ($transilagens as $transilagem)
                                        {
                                            
                                            $Dt          =$transilagem->data;
                                            $Data        =$dt->getDateFromDate($Dt);
                                            $Responsavel =$transilagem->Responsavel;
                                            $quantidade  =$transilagem->quantidade;
                                            $Silo        =$transilagem->nomeSaida;
                                            $SiloEntrada =$transilagem->nomeEntrada;
                                            echo'<tbody>
                                            <td>'.$Silo.'</td>
                                            <td>'.$Data.'</td>
                                            <td>'.$quantidade.'</td>
                                            <td>'.$SiloEntrada.'</td>
                                            <td>'.$Responsavel.'</td>
                                            </tbody>'; 
                                            $coluna = array( $Silo,$Data,$quantidade,$SiloEntrada,$Responsavel);
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
        if($tratamentos != null)
        {
            $info = "Tratamentos de fita registrados:";
            $title = array("Silo","Data", "Total/Parcial", "Responsável");
            $content = array();
            echo '<div class="col-lg-12 col-sm-4">
                        <div class="panel panel-inverse">
                            <div class="panel-heading">Tratamento Fita
                                <div class="pull-right">
                                    <div class="pull-right">
                                        <button class="btn btn-round btn-default" id="btnTratamento">-</button>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body">
                                    <table id="tabelaTratamento" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Silo</th>
                                                <th>Data</th>
                                                <th>Total/Parcial</th>
                                                <th>Responsável</th>
                                            </tr>
                                        </thead>';
                                        foreach ($tratamentos as $tratamento)
                                        {
                                            
                                            $Dt          =$tratamento->data;
                                            $Data        =$dt->getDateFromDate($Dt);
                                            $Total       =$tratamento->total_parcial;
                                            $Responsavel =$tratamento->Responsavel;
                                            $Silo        =$tratamento->nomeSilo;
                                            echo'<tbody>
                                            <td>'.$Silo.'</td>
                                            <td>'.$Data.'</td>
                                            <td>'.$Total.'</td>
                                            <td>'.$Responsavel.'</td>
                                            </tbody>';
                                            $coluna = array( $Silo,$Data, $Total, $Responsavel);
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
        if($termometrias != null)
        {
            $info = "Termometrias registradas:";
            $title = array("Silo","Data", "Temperatura Ambiente", "Temperatura Máxima", "Número de pontos acima de 29°C", "Responsável" );
            $content = array();
            echo '<div class="col-lg-12 col-sm-4">
                        <div class="panel panel-inverse">
                            <div class="panel-heading">Termometria
                                <div class="pull-right">
                                    <div class="pull-right">
                                        <button class="btn btn-round btn-default" id="btnTermometria">-</button>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body">
                                    <table id="tabelaTermometria" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Silo</th>
                                                <th>Data</th>
                                                <th>Temperatura Ambiente</th>
                                                <th>Temperatura Máxima</th>
                                                <th>Número de pontos acima de 29°C</th>
                                                <th>Responsável</th>
                                            </tr>
                                        </thead>';
                                        foreach ($termometrias as $termometria)
                                        {
                                            $Dt          =$termometria->data;
                                            $Data        =$dt->getDateFromDate($Dt);
                                            $TempMax     =$termometria->TempMax;
                                            $TempAmb     =$termometria->TempAmb;
                                            $upto29      =$termometria->upto29;
                                            $Responsavel =$termometria->Responsavel;
                                            $Silo        =$termometria->nomeSilo;
                                            echo'<tbody>
                                            <td>'.$Silo.'</td>
                                            <td>'.$Data.'</td>
                                            <td>'.$TempAmb.'°C</td>
                                            <td>'.$TempMax.'°C</td>
                                            <td>'.$upto29.'</td>
                                            <td>'.$Responsavel.'</td>
                                            </tbody>';                                
                                            $coluna = array($Silo,$Data, $TempAmb, $TempMax, $upto29, $Responsavel);
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
        echo "<button class='btn btn-success'onclick='location = \"pdf.php?nomeUnidade=".$nomeUnidade."&nome=".
        $nomeUsuario->nome."\"' style='float: right'>Gerar PDF</button>";
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
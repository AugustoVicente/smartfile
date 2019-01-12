<!-- Abertura -->
<?php
    include '../ClassPHP/Layout.php';
    $layout = new Layout();
    $layout->CabecalhoApontamentos();
    $layout->AbreBody();
    $layout->Load();
    $layout->AbreWrapper();
    $layout->TopBarCadastros();
    $layout->AbreContent();
?>
<!-- Conteúdo -->
<link rel="stylesheet" href="css/aeracaoDados.css"></link>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Registros de aerações:</h2>
                <ul class="nav navbar-right panel_toolbox">
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <table id="datatable-buttons" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Unidade</th>
                            <th>Armazém</th>
                            <th>Data</th>
                            <th>Nº de Hr./dia</th>
                            <th>Temperatura Ambiente</th>
                            <th>Umidade Relativa</th>
                            <th>Responsável</th>
                            <th>Acumulado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            include '../ClassPHP/dateParse.php';
                            $dt = new DateConverter();
                            $_REQUEST['web'] = true;
                            include '../ClassPHP/aeracao.php';
                            $ClasseAeracao = new Aeracao();
                            if($_SESSION['tipo'] == 'Gerente' || $_SESSION['tipo'] == 'Coordenador' || $_SESSION['tipo'] == 'Analista' || $_SESSION['tipo'] == 'Moderador')
                            {
                                $unidades = $ClasseAeracao->buscarAeracao();
                            }
                            else 
                            {
                                include '../ClassPHP/Usuario.php';
                                global $logado;
                                $usuario = new Usuario();
                                $u = $usuario->buscarUsuarioUnidade($logado);
                                $idUnidade = $u->idUnidade;
                                $unidades = $ClasseAeracao->buscarAeracaoUnidade($idUnidade);
                            }
                            //Preenchendo campos dos Silos
                            foreach ($unidades as $unidade) 
                            {
                                $Unidade         = $unidade->unidade;
                                $Armazem         = $unidade->silo;
                                $Data            = $unidade->data;
                                $DataFinal       = $dt->getDateFromDate($Data);
                                $NumHorasDia     = $unidade->numHoraDia;
                                $TemperaturaAmb  = $unidade->temperatura;
                                $UmidadeRelativa = $unidade->umidade;
                                $Responsavel     = $unidade->nome;
                                $acumulado     = $unidade->acumulado;
                                echo "<tr>
                                    <td>$Unidade</td>
                                    <td>$Armazem</td>
                                    <td>$DataFinal</td>
                                    <td>$NumHorasDia</td>
                                    <td>$TemperaturaAmb °C</td>
                                    <td>$UmidadeRelativa %</td>
                                    <td>$Responsavel</td>
                                    <td>$acumulado</td>
                                </tr>";
                            }
                        ?> 
                    </tbody>
                </table>
            </div>
            <button type="button" class="btn btn-round btn-default" onclick="location.href = 'aeracao.php'" id="btnSubmit">Inserir Novo</button>
        </div>
    </div>
</div>
<!-- fechamento -->
<?php
    $layout->Footer();
    $layout->FechaContent();
    $layout->FechaWrapper();
    $layout->ScriptsCadastros();
    $layout->FechaBody();
    $layout->FechaPag();
?>
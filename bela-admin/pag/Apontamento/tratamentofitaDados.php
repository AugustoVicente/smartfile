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
<link rel="stylesheet" href="css/tratamentofitaDados.css"></link>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Registros de tratamentos da fita:</h2>
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
                            <th>Inseticida</th>
                            <th>Dosagem</th>
                            <th>Total ou Parcial</th>
                            <th>Responsável</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            include '../ClassPHP/dateParse.php';
                            $dt = new DateConverter();
                            $_REQUEST['web'] = true;
                            include '../ClassPHP/TratamentoFita.php';
                            $ClasseTratamentoFita = new TratamentoFita();
                            if($_SESSION['tipo'] == 'Gerente' || $_SESSION['tipo'] == 'Coordenador' || $_SESSION['tipo'] == 'Analista' || $_SESSION['tipo'] == 'Moderador')
                            {
                                $unidades = $ClasseTratamentoFita->buscarTratamentoFita();
                            }
                            else 
                            {
                                include '../ClassPHP/Usuario.php';
                                global $logado;
                                $usuario = new Usuario();
                                $u = $usuario->buscarUsuarioUnidade($logado);
                                $idUnidade = $u->idUnidade;
                                $unidades = $ClasseTratamentoFita->buscarTratamentoFitaUnidade($idUnidade);
                            }
                            //Preenchendo campos dos Silos
                            foreach ($unidades as $unidade) 
                            {
                                $Unidade          = $unidade->unidade;
                                $Armazem          = $unidade->silo;
                                $Data             = $unidade->data;
                                $DataFinal        = $dt->getDateFromDate($Data);
                                $Inseticida       = $unidade->inseticida;
                                $codigo       = $unidade->codigo;
                                $Dosagem          = $unidade->dosagem;
                                $UnidadeMedida    = $unidade->unidadeMedida;
                                $pos = strpos($UnidadeMedida, "/");
                                $UnidadeMedida = substr($UnidadeMedida, 0, $pos);
                                $Total_Parcial    = $unidade->total_parcial;
                                $Responsavel      = $unidade->responsavel;
                                echo "<tr>
                                    <td>$Unidade</td>
                                    <td>$Armazem</td>
                                    <td>$DataFinal</td>
                                    <td>$codigo - $Inseticida</td>
                                    <td>$Dosagem $UnidadeMedida</td>
                                    <td>$Total_Parcial</td>
                                    <td>$Responsavel</td>
                                </tr>";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
            <button type="button" class="btn btn-round btn-default" id="btnNovo" onclick="location.href = 'tratamentofita.php'">Inserir Novo</button>
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
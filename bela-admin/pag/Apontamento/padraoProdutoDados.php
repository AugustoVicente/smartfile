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
<link rel="stylesheet" href="css/padraoProdutoDados.css"></link>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Registros de Produto:</h2>
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
                            <th>Umidade</th>
                            <th>Impureza</th>
                            <th>Ardido</th>
                            <th>PH</th>
                            <th>Avariado</th>
                            <th>Esverdeado</th>
                            <th>Triguilho</th>
                            <th>Responsavel</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            include '../ClassPHP/dateParse.php';
                            $dt = new DateConverter();
                            $_REQUEST['web'] = true;
                            include '../ClassPHP/padraoProduto.php';
                            $ClassePadrao = new PadraoProduto();
                            if($_SESSION['tipo'] == 'Gerente' || $_SESSION['tipo'] == 'Coordenador' || $_SESSION['tipo'] == 'Analista' || $_SESSION['tipo'] == 'Moderador')
                            {
                                $unidades = $ClassePadrao->buscarPadraoProduto();
                            }
                            else 
                            {
                                include '../ClassPHP/Usuario.php';
                                global $logado;
                                $usuario = new Usuario();
                                $u = $usuario->buscarUsuarioUnidade($logado);
                                $idUnidade = $u->idUnidade;
                                $unidades = $ClassePadrao->buscarPadraoProdutoUnidade($idUnidade);
                            }
                            //Preenchendo campos dos Silos
                            foreach ($unidades as $unidade) 
                            {
                                $Unidade         = $unidade->nomeUnidade;
                                $Armazem         = $unidade->nome;
                                $Data            = $unidade->data;
                                $DataFinal       = $dt->getDateFromDate($Data);
                                $Umidade         = $unidade->umidade;
                                $Impureza        = $unidade->impureza;
                                $Ardido          = $unidade->ardido;
                                $PH              = $unidade->ph;
                                $Avariado        = $unidade->avariado;
                                $Esverdiado      = $unidade->esverdiado;
                                $Triguilho       = $unidade->triguilho;
                                $Responsavel     = $unidade->responsavel;
                                echo "<tr>
                                    <td>$Unidade</td>
                                    <td>$Armazem</td>
                                    <td>$DataFinal</td>
                                    <td>$Umidade %</td>
                                    <td>$Impureza %</td>
                                    <td>$Ardido %</td>
                                    <td>$PH %</td>
                                    <td>$Avariado %</td>
                                    <td>$Esverdiado %</td>
                                    <td>$Triguilho %</td>
                                    <td>$Responsavel </td>
                                </tr>";
                            }
                        ?> 
                    </tbody>
                </table>
            </div>
            <button type="button" class="btn btn-round btn-default" id="btnNovo" onclick="location.href = 'padraoProduto.php'">Inserir Novo</button>
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
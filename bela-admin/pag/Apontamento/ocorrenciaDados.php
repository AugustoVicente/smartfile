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
<link rel="stylesheet" href="css/expurgoDados.css"></link>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Registro de Ocorrências:</h2>
                <ul class="nav navbar-right panel_toolbox">
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <table id="datatable-buttons" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Unidade</th>
                            <th>Armazém</th>
                            <th>Data</th>
                            <th>Tipo Ocorrência</th>
                            <th>Descrição</th>
                            <th>Responsavel</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            include '../ClassPHP/dateParse.php';
                            $dt = new DateConverter();
                            $_REQUEST['web'] = true;
                            include '../ClassPHP/Ocorrencia.php';
                            $ClasseOcorrencia = new Ocorrencia();
                            if($_SESSION['tipo'] == 'Gerente' || $_SESSION['tipo'] == 'Coordenador' || $_SESSION['tipo'] == 'Analista' || $_SESSION['tipo'] == 'Moderador')
                            {
                                $unidades = $ClasseOcorrencia->buscarOcorrencia();
                            }
                            else 
                            {
                                include '../ClassPHP/Usuario.php';
                                global $logado;
                                $usuario    = new Usuario();
                                $u          = $usuario->buscarUsuarioUnidade($logado);
                                $idUnidade  = $u->idUnidade;
                                $unidades   = $ClasseOcorrencia->buscarOcorrenciaUnidade($idUnidade);
                            }
                             //Preenchendo campos dos Silos
                            foreach ($unidades as $unidade) 
                            {
                                $Codigo          = $unidade->codigo;
                                $Unidade         = $unidade->nomeUnidade;
                                $Armazem         = $unidade->nomeSilo;
                                $Data            = $unidade->data;
                                $DataFinal       = $dt->getDateFromDate($Data);
                                $Tipo            = $unidade->tipo;
                                $Descricao       = $unidade->descricao;
                                $Responsavel     = $unidade->responsavel;
                                echo "<tr>
                                    <td>$Codigo</td>
                                    <td>$Unidade</td>
                                    <td>$Armazem</td>
                                    <td>$DataFinal</td>
                                    <td>$Tipo</td>
                                    <td>$Descricao</td>
                                    <td>$Responsavel</td>
                                </tr>";
                            }
                        ?> 
                    </tbody>
                </table>
            </div>
            <button type="button" class="btn btn-round btn-default" id="btnNovo" onclick="location.href = 'ocorrencia.php'">Inserir Novo</button>
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
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
<link rel="stylesheet" href="css/estoqueDados.css"></link>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Registros do estoque:</h2>
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
                            <th>Ocorrência</th>
                            <th>Toneladas</th>
                            <th>Data</th>
                            <th>Responsável</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            include '../ClassPHP/dateParse.php';
                            $dt = new DateConverter();
                            $_REQUEST['web'] = true;
                            include '../ClassPHP/Estoque.php';
                            $ClasseEstoque = new Estoque();
                            if($_SESSION['tipo'] == 'Gerente' || $_SESSION['tipo'] == 'Coordenador' || $_SESSION['tipo'] == 'Analista' || $_SESSION['tipo'] == 'Moderador')
                            {
                                $unidades = $ClasseEstoque->buscarEstoque();
                            }
                            else 
                            {
                                include '../ClassPHP/Usuario.php';
                                global $logado;
                                $usuario = new Usuario();
                                $u = $usuario->buscarUsuarioUnidade($logado);
                                $idUnidade = $u->idUnidade;
                                $unidades = $ClasseEstoque->buscarEstoqueUnidade($idUnidade);
                            }
                            //Preenchendo campos dos Silos
                            foreach ($unidades as $unidade) 
                            {
                                $Unidade         = $unidade->unidade;
                                $Armazem         = $unidade->silo;
                                $ocorrencia      = $unidade->ocorrido;
                                $toneladas       = $unidade->toneladas;
                                $data            = $dt->getDateFromDate($unidade->data);
                                $Responsavel     = $unidade->nome;
                                echo "<tr>
                                    <td>$Unidade</td>
                                    <td>$Armazem</td>
                                    <td>$ocorrencia</td>
                                    <td>$toneladas</td>
                                    <td>$data</td>
                                    <td>$Responsavel</td>
                                </tr>";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
            <button type="button" class="btn btn-round btn-default" id="btnNovo" onclick="location.href = 'estoque.php'">Inserir Novo</button>
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
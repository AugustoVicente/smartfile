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
<link rel="stylesheet" href="css/sondagemDados.css"></link>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Registros de Sondagens:</h2>
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
                            <th>Ações realizadas</th>
                            <th>Data</th>
                            <th>Responsável</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            include '../ClassPHP/dateParse.php';
                            $dt = new DateConverter();
                            $_REQUEST['web'] = true;
                            include '../ClassPHP/Sondagem.php';
                            $ClasseSondagem = new Sondagem();
                            if($_SESSION['tipo'] == 'Gerente' || $_SESSION['tipo'] == 'Coordenador' || $_SESSION['tipo'] == 'Analista' || $_SESSION['tipo'] == 'Moderador')
                            {
                                $unidades = $ClasseSondagem->buscarSondagem();
                            }
                            else 
                            {
                                include '../ClassPHP/Usuario.php';
                                global $logado;
                                $usuario = new Usuario();
                                $u = $usuario->buscarUsuarioUnidade($logado);
                                $idUnidade = $u->idUnidade;
                                $unidades = $ClasseSondagem->buscarSondagemUnidade($idUnidade);
                            }
                            //Preenchendo campos dos Silos
                            foreach ($unidades as $unidade) 
                            {
                                $Unidade         = $unidade->unidade;
                                $Armazem         = $unidade->silo;
                                $acoes = "";
                                if($unidade->idpadrao_produto_sondagem && $unidade->idtermometria_sondagem)
                                {
                                    $acoes .= "Verificou padrão de produto e a termometria";
                                }
                                else if($unidade->idpadrao_produto_sondagem)
                                {
                                    $acoes .= "Verificou padrão de produto.";
                                }
                                else if($unidade->idtermometria_sondagem)
                                {
                                    $acoes .= "Verificou termometria.";
                                }
                                $Responsavel     = $unidade->responsavel;
                                $data            = $dt->getDateFromDate($unidade->data);
                                echo "<tr>
                                    <td>$Unidade</td>
                                    <td>$Armazem</td>
                                    <td>$acoes</td>
                                    <td>$data</td>
                                    <td>$Responsavel</td>
                                </tr>";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
            <button type="button" class="btn btn-round btn-default" id="btnNovo" onclick="location.href = 'sondagem.php'">Inserir Novo</button>
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
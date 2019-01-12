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
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Registros de transilagens:</h2>
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
                            <th>Quantidade Aproximada</th>
                            <th>Nº da Célula Receptora</th>
                            <th>Responsável</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <?php
                            include '../ClassPHP/dateParse.php';
                            $dt = new DateConverter();
                            $_REQUEST['web'] = true;
                            include '../ClassPHP/Transilagem.php';
                            $ClasseTransilagem = new Transilagem();
                            if($_SESSION['tipo'] == 'Gerente' || $_SESSION['tipo'] == 'Coordenador' || $_SESSION['tipo'] == 'Analista' || $_SESSION['tipo'] == 'Moderador')
                            {
                                $unidades = $ClasseTransilagem->buscarTransilagem();
                            }
                            else 
                            {
                                include '../ClassPHP/Usuario.php';
                                global $logado;
                                $usuario = new Usuario();
                                $u = $usuario->buscarUsuarioUnidade($logado);
                                $idUnidade = $u->idUnidade;
                                $unidades=$ClasseTransilagem->buscarTransilagemUnidade($idUnidade);
                            }
                            //Preenchendo campos dos Silos

                            foreach ($unidades as $unidade) 
                            {
                                $Unidade          = $unidade->unidade;
                                $Armazem          = $unidade->armazem;
                                $Data             = $unidade->data;
                                $DataFinal        = $dt->getdate($Data);
                                $QntAprox         = $unidade->responsavel;
                                $numCelularRecep  = $unidade->responsavel;
                                $Responsavel      = $unidade->responsavel;
                                echo "<tr>
                                    <td>$Unidade</td>
                                    <td>$Armazem</td>
                                    <td>$DataFinal</td>
                                    <td>$QntAprox</td>
                                    <td>$numCelularRecep</td>
                                    <td>$Responsavel</td>
                                </tr>";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
            <button type="button" class="btn btn-round btn-default" style="float: right" onclick="location.href = 'transilagem.php'">Inserir Novo</button>
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
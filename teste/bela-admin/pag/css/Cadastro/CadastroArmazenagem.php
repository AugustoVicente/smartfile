<!-- Abertura -->
<?php
include '../ClassPHP/Layout.php';
$layout = new Layout();
$layout->CabecalhoCadastros();
$layout->AbreBody();
$layout->Load();
$layout->AbreWrapper();
$layout->TopBarCadastros();
$layout->LeftBarCadastros();
$layout->AbreContent();
?>
<!-- Conteúdo -->
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Silos Armazenadores cadastrados:</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <table id="datatable-buttons" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Capacidade</th>
                            <th>Tipo</th>
                            <th>Unidade</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            include '../ClassPHP/dateParse.php';
                            $dt = new DateConverter();
                            $_REQUEST['web'] = true;
                            include '../ClassPHP/Armazenagem.php';
                            $ClasseArmazenagem = new Armazenagem();
                            if($_SESSION['tipo'] == 'Gerente' || $_SESSION['tipo'] == 'Coordenador' || $_SESSION['tipo'] == 'Analista' || $_SESSION['tipo'] == 'Moderador')
                            {
                                $unidades = $ClasseArmazenagem->buscarArmazenagem();
                            }
                            else 
                            {
                                include '../ClassPHP/Usuario.php';
                                global $logado;
                                $usuario = new Usuario();
                                $u = $usuario->buscarUsuarioUnidade($logado);
                                $idUnidade = $u->idUnidade;
                                $unidades = $ClasseArmazenagem->buscarArmazenagemUnidade($idUnidade);
                            }
                            //Preenchendo campos dos Silos
                            foreach ($unidades as $unidade) 
                            {
                                $id         = $unidade->idSilo;
                                $nome       = $unidade->nome;
                                $capacidade = $unidade->capacidade;
                                $tipo       = $unidade->nomeArmazem;
                                $unidade    = $unidade->nomeUnidade;
                                echo "<tr>
                                    <td>$nome</td>
                                    <td>$capacidade</td>
                                    <td>$tipo</td>
                                    <td>$unidade</td>
                                    <td>
                                        <i class='fa fa-edit fa-fw' aria-hidden='true' onclick=\"location.href = 'CadastroArmazemAltera.php?idUnidade=$id'\"></i> 
                                    </td>
                                </tr>";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
            <button type="button" class="btn btn-round btn-default" style="float: right" onclick="location.href = 'CadastroArmazenagemNovo.php'">Inserir Novo</button>
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
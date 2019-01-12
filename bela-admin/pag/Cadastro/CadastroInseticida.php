<!-- Abertura -->
<?php
    include '../ClassPHP/Layout.php';
    $layout = new Layout();
    $layout->CabecalhoCadastrosCoordenador();
    $layout->AbreBody();
    $layout->Load();
    $layout->AbreWrapper();
    $layout->TopBarCadastros();
    $layout->AbreContent();
?>
<!-- Conteúdo -->
<div class="container-fluid">
    <div class="row">
        <div class="x_panel">
            <div class="x_title">
                <h2>Inseticidas cadastrados:</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <table id="datatable-buttons" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Nome</th>
                            <th>Dosagem padrão</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            include '../ClassPHP/inseticida.php';
                            $ClasseInseticida = new Inseticida();
                            $inseticidas = $ClasseInseticida->buscarInseticida();
                            //Preenchendo campos dos Silos
                            foreach ($inseticidas as $inseticida) 
                            {
                                $id            = $inseticida->idInseticida;
                                $nome          = $inseticida->nome;
                                $codigo        = $inseticida->codigo;
                                $dosagemPadrao = $inseticida->dosagem_padrao;
                                $unidadeMedida = $inseticida->unidade_medida;
                                echo "<tr>
                                    <td>$codigo</td>
                                    <td>$nome</td>
                                    <td>$dosagemPadrao $unidadeMedida</td>
                                    <td>
                                        <i class='fa fa-edit fa-fw' aria-hidden='true' onclick=\"location.href = 'CadastroInseticidaAltera.php?idInseticida=$id'\"></i>
                                    </td>
                                </tr>";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
            <button type="button" class="btn btn-round btn-default" style="float: right" onclick="location.href = 'CadastroInseticidaNovo.php'">Inserir Novo</button>
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
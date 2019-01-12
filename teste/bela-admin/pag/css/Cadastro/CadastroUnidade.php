<!-- Abertura -->
<?php
    include '../ClassPHP/Layout.php';
    $layout = new Layout();
    $layout->CabecalhoCadastros();
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
                <h2>Unidades cadastradas:</h2>
                <ul class="nav navbar-right panel_toolbox">
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <table id="datatable-buttons" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Cidade</th>
                            <th>Estado</th>
                            <th>CEP</th>
                            <th>Telefone</th>
                            <th>Telefone</th>
                            <th>Status</th>
                            <th> </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                            include '../ClassPHP/Unidade.php';
                            $classeUnidade = new Unidade();
                            $unidades = $classeUnidade->buscarUnidade();
                            foreach ($unidades as $unidade) 
                            {
                                $nome = $unidade->nome;
                                $cidade = $unidade->cidade;
                                $estado = $unidade->estado;
                                $cep = $unidade->cep;
                                $telefone1 = $unidade->tel1;
                                $telefone2 = $unidade->tel2;
                                $id = $unidade->idUnidade;
                                if($unidade->status == 1)
                                {
                                    $status = "Ativo";
                                }
                                else
                                {
                                    $status = "Inativo";
                                }
                                echo "<tr>
                                    <td>$nome</td>
                                    <td>$cidade</td>
                                    <td>$estado</td>
                                    <td>$cep</td>
                                    <td>$telefone1</td>
                                    <td>$telefone2</td>
                                    <td>$status</td>
                                    <td>
                                        <i class='fa fa-edit fa-fw' aria-hidden='true' onclick=\"location.href = 'CadastroUnidadeAltera.php?idUnidade=$id'\"></i>
                                        <i class='fa fa-minus-square fa-fw' aria-hidden='true'></i>
                                    </td>
                                </tr>";
                            } 
                        ?>
                    </tbody>
                </table>
            </div>
            <button type="button" class="btn btn-success" style="float: right" onclick="location.href = 'CadastroUnidadeNovo.php'">Inserir Novo</button>
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
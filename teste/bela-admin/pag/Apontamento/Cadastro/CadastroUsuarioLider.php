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
                <h2>Líderes Operacionais cadastrados:</h2>
                <ul class="nav navbar-right panel_toolbox">
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <table id="datatable-buttons" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>CPF</th>
                            <th>E-Mail</th>
                            <th>Celular</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $_REQUEST['web'] = true;
                            $_REQUEST['acao'] = "buscarUsuariosLider";
                            include '../../../webservice.php';
                            foreach ($usuarios as $usuario) 
                            {
                                $nome    = $usuario->nome;
                                $cpf     = $usuario->cpf;
                                $email   = $usuario->email;
                                $celular = $usuario->cel;
                                echo "<tr>
                                    <td>$nome</td>
                                    <td>$cpf</td>
                                    <td>$email</td>
                                    <td>$celular</td>
                                    <td>
                                        <i class='fa fa-edit fa-fw' aria-hidden='true' onclick=\"location.href = 'CadastroUsuarioLiderAltera.php?id=$usuario->idUsuario'\"></i>
                                    </td>
                                </tr>";
                            } 
                        ?>
                    </tbody>
                </table>
            </div>
            <button type="button" class="btn btn-round btn-default" style="float: right" onclick="location.href = 'CadastroUsuarioLiderNovo.php'">Inserir Novo</button>
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
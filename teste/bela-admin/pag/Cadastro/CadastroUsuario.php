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
                <h2>Outros Usuários cadastrados:</h2>
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
                            <th>Tipo</th>
                            <th>E-Mail</th>
                            <th>Celular</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $_REQUEST['web'] = true;
                            $_REQUEST['acao'] = "buscarUsuarios";
                            include '../../../webservice.php';
                            foreach ($usuarios as $usuario) 
                            {
                                if($usuario->idTipo_Usuario != 3 && $usuario->idTipo_Usuario != 6)
                                {
                                    $nome = $usuario->nome;
                                    $cpf = $usuario->cpf;
                                    $email = $usuario->email;
                                    $celular = $usuario->cel;
                                    if($usuario->status == 1)
                                    {
                                        $status = "Ativo";
                                    }
                                    else
                                    {
                                        $status = "Inativo";
                                    }
                                    if($usuario->idTipo_Usuario == 1)
                                    {
                                        $tipo = "Moderador";
                                    }
                                    else if($usuario->idTipo_Usuario == 2)
                                    {
                                        $tipo = "Coordenador";
                                    } 
                                    else if($usuario->idTipo_Usuario == 4)
                                    {
                                        $tipo = "Analista";
                                    }
                                    else if($usuario->idTipo_Usuario == 5)
                                    {
                                        $tipo = "Gerente";
                                    }
                                    echo "<tr>
                                        <td>$nome</td>
                                        <td>$cpf</td>
                                        <td>$tipo</td>
                                        <td>$email</td>
                                        <td>$celular</td>
                                        <td>$status</td>
                                        <td>
                                            <i class='fa fa-edit fa-fw' aria-hidden='true' onclick=\"location.href = 'CadastroUsuarioAltera.php?id=$usuario->idUsuario'\"></i>
                                        </td>
                                    </tr>";   
                                }
                            } 
                        ?>
                    </tbody>
                </table>
            </div>
            <button type="button" class="btn btn-round btn-default" style="float: right" onclick="location.href = 'CadastroUsuarioNovo.php'">Inserir Novo</button>
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
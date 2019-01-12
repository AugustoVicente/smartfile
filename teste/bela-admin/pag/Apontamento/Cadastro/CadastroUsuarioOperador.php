<!-- Abertura -->
<?php
    include '../ClassPHP/Layout.php';
    $layout = new Layout();
    $layout->CabecalhoCadastrosLider();
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
                <h2>Operadores cadastrados:</h2>
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
                            <th>Turno</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if($_SESSION['tipo'] == 'Moderador')
                            {
                                $_REQUEST['web'] = true;
                                $_REQUEST['acao'] = "buscarUsuariosOperador";
                                include '../../../webservice.php';
                                $valor ="CadastroUsuarioOperadorAltera";
                            }
                            else if($_SESSION['tipo'] == 'Lider Operacional')   
                            {
                                include '../ClassPHP/Unidade.php';
                                $ClasseUnidade              = new Unidade();
                                $unidade                    = $ClasseUnidade->buscarUnidadeLiderCadastro($logado);
                                $idUnidadeLider             = $unidade->idUnidade;
                                $_REQUEST['idUnidadeLider'] = $idUnidadeLider;
                                $valor ="CadastroTurnoAltera";
                                $_REQUEST['web']            = true;
                                $_REQUEST['acao']           = "buscarUsuariosOperadorTurno";
                                include '../../../webservice.php';
                            }       
                            foreach ($usuarios as $usuario) 
                            {
                                $nome    = $usuario->nome;
                                $cpf     = $usuario->cpf;
                                $email   = $usuario->email;
                                $celular = $usuario->cel;
                                if($usuario->turno == 1)
                                {
                                    $turno = "7h-15h";
                                }
                                else if($usuario->turno == 2)
                                {
                                    $turno = "15h-23h";
                                }
                                else if($usuario->turno == 3)
                                {
                                    $turno = "23h-7h";
                                }
                                else if($usuario->turno == 4)
                                {
                                    $turno = "8h-18h";
                                }
                                echo "<tr>
                                    <td>$nome</td>
                                    <td>$cpf</td>
                                    <td>$email</td>
                                    <td>$celular</td>
                                    <td>$turno</td>
                                    <td>
                                        <i class='fa fa-edit fa-fw' aria-hidden='true' onclick=\"location.href = '".$valor.".php?id=$usuario->idUsuario'\"></i>
                                    </td>
                                </tr>";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
            <?php
                if($_SESSION['tipo'] != 'Lider Operacional')   
                {
                    echo'<button type="button" class="btn btn-round btn-default" style="float: right" onclick="location.href = \'CadastroUsuarioOperadorNovo.php\'">Inserir Novo</button>';
                }
            ?>
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
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
<div class="container-fluid">
    <?php
        $layout->titulo("Inserir Usuário");
        include '../ClassPHP/Usuario.php';
        $idUsuario = $_REQUEST['id'];
        $ClasseUsuario = new Usuario();
        $usuario = $ClasseUsuario->buscarUsuario($idUsuario);
        include '../ClassPHP/Unidade.php';
        $unidade = new Unidade();
        $unidades = $unidade->buscarUnidade();
            //Var Usuario
        $nome           =$usuario->nome;
        $cpf            =$usuario->cpf;
        $turno          =$usuario->turno;
    ?>
    <script src="js/CadastroTurnoAltera.js"></script>
    <div class="row">
        <div class="white-box">
            <?php
                echo'<form class="form-horizontal form-material" onsubmit="return verifica()" method="POST" action="../../../webservice.php?web=true&acao=AlterarTurno&idUsuario='.$idUsuario.'">';
            ?>
            <div class="form-group">
                <div class="row">
                    <label class="col-md-2">Nome Completo</label>
                    <div class="col-md-3">
                        <?php
                            echo'<input type="text" placeholder="Insira o nome" readonly="readonly" value="'.$nome.'" class="form-control form-control-line" name="nome" id="nome">';
                        ?>
                    </div>
                    <h3 class="col-md-1 text-center">|</h3>
                    <label class="col-md-3">CPF</label>
                    <div class="col-md-3">
                        <?php
                            echo'<input type="text" placeholder="Insira o CPF" readonly="readonly" value="'.$cpf.'" maxlength="11" class="form-control form-control-line" name="cpf" id="cpf">';
                        ?>
                    </div>
                </div>  
                <div class="row">      
                    <label class="col-md-2">Nome Completo</label>
                    <div class="col-md-3">
                        <select class="form-control form-control-line" name="turno">
                            <?php
                                if($turno == '1')
                                {
                                    echo'<option selected value="1">7h-15h</option>';
                                    echo'<option value="2">15h-23h</option>
                                        <option value="3">23h-7h</option>
                                        <option value="4">8h-18h</option>';
                                }
                                else if($turno == '2')
                                {
                                    echo'<option value="1">7h-15h</option>';
                                    echo'<option selected value="2">15h-23h</option>';
                                    echo'<option value="3">23h-7h</option>
                                        <option value="4">8h-18h</option>';
                                }
                                else if($turno == '3')
                                {
                                    echo'
                                    <option value="1">7h-15h</option>
                                    <option value="2">15h-23h</option>';
                                    echo'<option  selected value="3">23h-7h</option>';
                                    echo'<option value="4">8h-18h</option>';
                                }
                                else if($turno == '4')
                                {
                                    echo'
                                    <option value="1">7h-15h</option>
                                    <option value="2">15h-23h</option>
                                    <option value="3">23h-7h</option>';
                                    echo'<option selected value="4">8h-18h</option>';
                                }
                                else
                                {
                                    echo'<option>Selecione o Turno</option>
                                        <option value="1">7h-15h</option>
                                        <option value="2">15h-23h</option>
                                        <option value="3">23h-7h</option>
                                        <option value="4">8h-18h</option>';
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-sm-3">
                    <button class="btn btn-success" type="submit" value="Submit">Salvar</button>
                </div>
            </form>    
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
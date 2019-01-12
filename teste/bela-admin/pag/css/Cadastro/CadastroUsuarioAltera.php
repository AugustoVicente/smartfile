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
<div class="container-fluid">
    <?php
        $layout->titulo("Inserir Usuário");
        include '../ClassPHP/Usuario.php';
        $idUsuario  = $_REQUEST['id'];
        $Usuario    =new Usuario();
        $un         =$Usuario->buscarUsuario($idUsuario);
        $nome       =$un->nome;
        $cpf        =$un->cpf;
        $telefone   =$un->tel;
        $cel        =$un->cel;
        $email      =$un->email;
        $cep        =$un->cep;
        $status     =$un->status;
        $endereco   =$un->endereco;
        $login      =$un->login;
        $cidade     =$un->cidade;
        $obs        =$un->obs;
        $dataNasc   =$un->dataNasc;
        $idUnidade  =$un->idUnidade;
        $estado     =$un->estado;
    ?>
    <div class="row">
        <div class="white-box">
            <form class="form-horizontal form-material" method="POST" action="../../../webservice.php?web=true&acao=AlterarUsuario">
                <div class="form-group">
                <div class="row">
                    <label class="col-md-2">Nome Completo</label>
                    <div class="col-md-3">
                        <?php
                            echo'<input type="text" placeholder="Insira o nome"  value="'.$nome.'" class="form-control form-control-line" name="nome">';
                        ?>
                    </div>
                    <h3 class="col-md-1 text-center">|</h3>
                    <label class="col-md-3">CPF</label>
                    <div class="col-md-3">
                        <?php
                            echo'<input type="text" placeholder="Insira o CPF" value="'.$cpf.'" maxlength="11" class="form-control form-control-line" name="cpf">';
                        ?>
                    </div>
                </div>        
                <div class="row">
                    <label class="col-md-2">Login</label>
                    <div class="col-md-3">
                        <?php
                            echo'<input type="text" placeholder="Insira o login" value="'.$login.'" size="50px" class="form-control form-control-line" name="login">';
                        ?>
                    </div>
                    <h3 class="col-md-1 text-center">|</h3>
                    <label class="col-md-3">Senha</label>
                    <div class="col-md-3">
                        <?php
                            echo'<input type="password" placeholder="Insira a senha" value="" size="50px" class="form-control form-control-line" name="senha">';
                        ?>
                    </div>
                </div>
                <div class="row">
                    <label for="example-email" class="col-md-2">E-mail</label>
                    <div class="col-md-3">
                        <?php
                            echo'<input type="email" placeholder="exemple@admin.com" value="'.$email.'" class="form-control form-control-line" name="email">';
                        ?>
                    </div>
                    <h3 class="col-md-1 text-center">|</h3>
                    <label class="col-md-3">Tipo de usuário</label>
                    <div class="col-md-3">
                        <?php
                            $_REQUEST['web'] = true; 
                            $_REQUEST['acao'] = "buscarTiposUsuario";
                            include '../../../webservice.php';
                            echo "<select class='form-control form-control-line' name='tipo'>
                            <option disabled selected>Selecione</option>";
                            foreach ($tipos as $tipo) 
                            {
                                $id = $tipo->idTipo_Usuario;
                                $nome = $tipo->tipo;
                                echo "<option value='$id'>$nome</option>";
                            }
                            echo "</select>"; 
                        ?> 
                    </div>
                </div>
                <div class="row">
                    <label class="col-md-2">Telefone</label>
                    <div class="col-md-3">
                        <?php
                            echo '<input type="text" placeholder="Insira o telefone" value="'.$telefone.'" class="form-control form-control-line" name="telefone">';
                        ?>
                    </div>
                    <h3 class="col-md-1 text-center">|</h3>
                    <label class="col-md-3">Celular</label>
                    <div class="col-md-3">
                        <?php
                            echo'<input type="text" placeholder="Insira o celular" value="'.$cel.'" class="form-control form-control-line" name="celular">';
                        ?>
                    </div>
                </div>    
                <div class="row">
                    <label class="col-md-2">CEP</label>
                    <div class="col-md-3">
                        <?php
                            echo '<input type="text" placeholder="Insira o CEP" value="'.$cep.'" class="form-control form-control-line" name="cep">'; 
                        ?>  
                    </div>
                    <h3 class="col-md-1 text-center">|</h3>
                    <label class="col-md-3">Endereço</label>
                    <div class="col-md-3">
                        <?php
                            echo '<input type="text" placeholder="Insira o Endereço"  value="'.$endereco.'" class="form-control form-control-line" name="endereco">';
                        ?>
                    </div>
                </div>
                <div class="row">
                    <label class="col-md-2">Estado</label>
                    <div class="col-md-3">
                        <?php
                            echo '<input type="text" placeholder="Insira o UF" maxlength="2" value="'.$estado.'" class="form-control form-control-line" name="estado">';
                        ?>
                    </div>
                    <h3 class="col-md-1 text-center">|</h3>
                    <label class="col-md-3">Cidade</label>
                    <div class="col-md-3">
                        <?php
                            echo '<input type="text" placeholder="Insira a cidade" value="'.$cidade.'" class="form-control form-control-line" name="cidade">';
                        ?>
                    </div>
                </div>
                <div class="row">
                    <label class="col-md-2">Observação</label>
                    <div class="col-md-3">
                        <?php
                            echo '<input type="text" placeholder="Insira a Observação" value="'.$obs.'" class="form-control form-control-line" name="obs">';
                        ?>
                    </div>
                    <h3 class="col-md-1 text-center">|</h3>
                    <label class="col-md-3">Data Nascimento</label>
                    <div class="col-md-3">
                        <?php
                            echo '<input type="date" value="'.$dataNasc.'" class="form-control form-control-line" name="dataNasc">';
                        ?>
                    </div>
                </div>
                <div class="row">
                    <label class="col-md-2">Unidade</label>
                    <div class="col-md-3">
                        <?php
                            $_REQUEST['web'] = true; 
                            $_REQUEST['acao'] = "buscarUnidades";
                            include '../../../webservice.php';
                            echo "<select class='form-control form-control-line' name='unidade' >";
                            foreach ($unidades as $unidade) 
                            {
                                $id = $unidade->idUnidade;
                                $nome = $unidade->nome;
                                if($nome == $unidade)
                                {
                                    echo "<option selected value='$id'>$nome</option>";
                                }
                                else
                                {
                                    echo "<option value='$id'>$nome</option>";    
                                }
                            }
                            echo "</select>"; 
                        ?> 
                    </div>
                    <h3 class="col-md-1 text-center">|</h3>
                    <label class="col-md-3">Status</label>
                    <div class="col-md-3">
                        <select class="form-control form-control-line" name="status">
                            <option  value="0">Inativo </option>
                            <option selected value="1">Ativo</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-3">
                    <button class="btn btn-success " type="submit"  value="Submit">Salvar</button>
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
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
        $layout->titulo("Editar Usuário");
        include '../ClassPHP/Usuario.php';
        $idUsuario  = $_REQUEST['id'];
        $ClasseUsuario    =new Usuario();
        $usuario    =$ClasseUsuario->buscarUsuario($idUsuario);
        include '../ClassPHP/Unidade.php';
        $unidade = new Unidade();
        $unidades = $unidade->buscarUnidade();
        //Var Usuario
        $nome           =$usuario->nome;
        $cpf            =$usuario->cpf;
        $telefone       =$usuario->tel;
        $cel            =$usuario->cel;
        $email          =$usuario->email;
        $cep            =$usuario->cep;
        $status         =$usuario->status;
        $endereco       =$usuario->endereco;
        $login          =$usuario->login;
        $cidade         =$usuario->cidade;
        $obs            =$usuario->obs;
        $dataNasc       =$usuario->dataNasc;
        $idUnidade      =$usuario->idUnidade;
        $idUsuario      =$usuario->idUsuario;
        $idTipo_Usuario =$usuario->idTipo_Usuario;
        $estado         =$usuario->estado;
    ?>
    <script src="js/CadastroUsuarioAltera.js"></script>
    <div class="row">
        <div class="white-box">
            <?php
                echo'<form class="form-horizontal form-material" onsubmit="return verifica()" method="POST" action="../../../webservice.php?web=true&acao=AlterarUsuario&idUsuario='.$idUsuario.'">';
            ?>
                <div class="form-group">
                    <div class="row">
                        <label class="col-md-2">Nome Completo</label>
                        <div class="col-md-3">
                            <?php
                                echo'<input type="text" placeholder="Insira o nome" value="'.$nome.'" class="form-control form-control-line" name="nome" id="nome">';
                            ?>
                        </div>
                        <h3 class="col-md-1 text-center">|</h3>
                        <label class="col-md-3">CPF</label>
                        <div class="col-md-3">
                            <?php
                                echo'<input type="text" placeholder="Insira o CPF" value="'.$cpf.'" maxlength="11" class="form-control form-control-line" name="cpf" id="cpf">';
                            ?>
                        </div>
                    </div>        
                    <div class="row">
                        <label class="col-md-2">Login</label>
                        <div class="col-md-3">
                            <?php
                                echo'<input type="text" placeholder="Insira o login" value="'.$login.'" size="50px" class="form-control form-control-line" name="login" id="login">';
                            ?>
                        </div>
                        <h3 class="col-md-1 text-center">|</h3>
                        <label class="col-md-3">Senha</label>
                        <div class="col-md-3">
                            <?php
                                echo'<input type="password" placeholder="Insira a senha" value="password" readonly="readonly" size="50px" class="form-control form-control-line" name="senha" id="senha">';
                            ?>
                        </div>
                    </div>
                    <div class="row">
                        <label for="example-email" class="col-md-2">E-mail</label>
                        <div class="col-md-3">
                            <?php
                                echo'<input type="email" placeholder="exemple@admin.com" value="'.$email.'" class="form-control form-control-line" name="email" id="email">';
                            ?>
                        </div>
                        <h3 class="col-md-1 text-center">|</h3>
                        <label class="col-md-3">Tipo de usuário</label>
                        <div class="col-md-3">
                            <select class='form-control form-control-line' name='tipo' id='tipo'>
                            <?php
                                if($idTipo_Usuario == 2)
                                {
                                echo'
                                    <option  selected value="2" >Coordenador</option>
                                    <option value="4">Analista</option>
                                    <option value="5">Gerente</option>';
                                }
                                else if($idTipo_Usuario == 4)
                                {
                                echo'
                                    <option value="2" >Coordenador</option>
                                    <option selected value="4">Analista</option>
                                    <option value="5">Gerente</option>';
                                }
                                else if($idTipo_Usuario == 5)
                                {
                                echo'
                                    <option value="2" >Coordenador</option>
                                    <option value="4">Analista</option>
                                    <option selected value="5">Gerente</option>';
                                }
                                else
                                {
                                    echo'
                                    <option value="2" >Coordenador</option>
                                    <option value="4">Analista</option>
                                    <option value="5">Gerente</option>';
                                }
                            ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-md-2">Telefone</label>
                        <div class="col-md-3">
                            <?php
                                echo '<input type="text" placeholder="Insira o telefone" value="'.$telefone.'" class="form-control form-control-line" name="telefone" id="telefone">';
                            ?>
                        </div>
                        <h3 class="col-md-1 text-center">|</h3>
                        <label class="col-md-3">Celular</label>
                        <div class="col-md-3">
                            <?php
                                echo '<input type="text" placeholder="Insira o celular" value="'.$cel.'" class="form-control form-control-line" name="celular" id="celular">';
                            ?>
                        </div>
                    </div>    
                    <div class="row">
                        <label class="col-md-2">CEP</label>
                        <div class="col-md-3">
                            <?php
                                echo '<input type="text" placeholder="Insira o CEP" value="'.$cep.'" class="form-control form-control-line" name="cep" id="cep">'; 
                            ?>  
                        </div>
                        <h3 class="col-md-1 text-center">|</h3>
                        <label class="col-md-3">Endereço</label>
                        <div class="col-md-3">
                            <?php
                                echo '<input type="text" placeholder="Insira o Endereço"  value="'.$endereco.'" class="form-control form-control-line" name="endereco" id="endereco">';
                            ?>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-md-2">Estado</label>
                        <div class="col-md-3">
                            <?php 
                                if($estado == "PR")
                                {
                                    echo'<select class="form-control form-control-line" name="estado" id="estado">
                                        <option selected value="PR">Paraná</option>
                                        <option value="SP">São Paulo</option>
                                        <option value="SC">Santa Catarina</option>
                                    </select>';
                                }
                                else if($estado == "SP")
                                {
                                    echo'<select class="form-control form-control-line" name="estado" id="estado">
                                        <option value="PR">Paraná</option>
                                        <option selected value="SP">São Paulo</option>
                                        <option value="SC">Santa Catarina</option>
                                    </select>';
                                }
                                else if($estado == "SC")
                                {
                                    echo'<select class="form-control form-control-line" name="estado" id="estado">
                                        <option value="PR">Paraná</option>
                                        <option value="SP">São Paulo</option>
                                        <option selected value="SC">Santa Catarina</option>
                                    </select>';
                                }
                            ?> 
                        </div>
                        <h3 class="col-md-1 text-center">|</h3>
                        <label class="col-md-3">Cidade</label>
                        <div class="col-md-3">
                            <?php
                                echo '<input type="text" placeholder="Insira a cidade" value="'.$cidade.'" class="form-control form-control-line" name="cidade" id="cidade">';
                            ?>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-md-2">Observação</label>
                        <div class="col-md-3">
                            <?php
                                echo '<input type="text" placeholder="Insira a Observação" value="'.$obs.'" class="form-control form-control-line" name="obs" id="obs">';
                            ?>
                        </div>
                        <h3 class="col-md-1 text-center">|</h3>
                        <label class="col-md-3">Data Nascimento</label>
                        <div class="col-md-3">
                            <?php
                                echo '<input type="date" value="'.$dataNasc.'" class="form-control form-control-line" name="dataNasc" id="dataNasc">';
                            ?>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-md-2">Unidade</label>
                        <div class="col-md-3">
                            <?php
                                echo "<select class='form-control form-control-line' name='unidade' id='unidade' disable >";
                                    foreach ($unidades as $unidade) 
                                    {
                                        $id = $unidade->idUnidade;
                                        $nome = $unidade->nome;
                                        echo "<option value='$id'>$nome</option>";
                                    }
                                echo "</select>"; 
                            ?> 
                        </div>
                        <h3 class="col-md-1 text-center">|</h3>
                        <label class="col-md-3">Status</label>
                        <div class="col-md-3">
                            <select class="form-control form-control-line" name="status" id="status">
                                <option value="0">Inativo </option>
                                <option selected value="1">Ativo</option>
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
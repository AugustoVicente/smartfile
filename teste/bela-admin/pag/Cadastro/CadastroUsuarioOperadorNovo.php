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
    include '../ClassPHP/Usuario.php';
    $usuario = new Usuario();
    include '../ClassPHP/Unidade.php';
    $unidade = new Unidade();
    $unidades = $unidade->buscarUnidade();
?>
<!-- Conteúdo -->
<script src="js/CadastroUsuarioOperadorNovo.js"></script>
<div class="container-fluid">
    <?php
        $layout->titulo("Inserir Usuários");
    ?>
    <div class="row">
        <div class="white-box">
            <form class="form-horizontal form-material" method="POST" onsubmit="return verifica()" action="../../../webservice.php?web=true&acao=InserirUsuarioOperador">
                <div class="form-group">
                    <div class="row">
                        <label class="col-md-2">Nome Completo</label>
                        <div class="col-md-3">
                            <input type="text" placeholder="Insira o nome"  value="" class="form-control form-control-line" name="nome" id="nome">
                        </div>
                        <h3 class="col-md-1 text-center">|</h3>
                        <label class="col-md-3">CPF</label>
                        <div class="col-md-3">
                            <input type="text" placeholder="Insira o CPF" value="" maxlength="11" class="form-control form-control-line" name="cpf" id="cpf">
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-md-2">Login</label>
                        <div class="col-md-3">
                            <input type="text" placeholder="Insira o login" value="" size="50px" class="form-control form-control-line" name="login" id="login">
                        </div>
                        <h3 class="col-md-1 text-center">|</h3>
                        <label class="col-md-3">Senha</label>
                        <div class="col-md-3">
                            <input type="password" placeholder="Insira a senha" value="" size="50px" class="form-control form-control-line" name="senha" id="senha">
                        </div>
                    </div>
                    <div class="row">
                            <label for="example-email" class="col-md-2">E-mail</label>
                            <div class="col-md-3">
                            <input type="email" placeholder="exemple@admin.com" value=""class="form-control form-control-line" name="email" id="email">
                        </div>
                        <h3 class="col-md-1 text-center">|</h3>
                        <label class="col-md-3">Tipo de usuário</label>
                        <div class="col-md-3">
                                <input type="text"  value="Operador" readonly="readonly" class="form-control form-control-line" name="tipo" id="tipo">
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-md-2">Telefone</label>
                        <div class="col-md-3">
                            <input type="text"  placeholder="Insira o telefone" value="" class="form-control form-control-line" name="telefone" id="telefone">
                        </div>
                        <h3 class="col-md-1 text-center">|</h3>
                        <label class="col-md-3">Celular</label>
                        <div class="col-md-3">
                            <input type="text" placeholder="Insira o celular" value="" data-mask="(00) 0000-0000" data-mask-selectonfocus="true" class="form-control form-control-line" name="celular" id="celular">
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-md-2">CEP</label>
                        <div class="col-md-3">
                            <input type="text" placeholder="Insira o CEP" value="" class="form-control form-control-line" name="cep" id="cep">   
                        </div>
                        <h3 class="col-md-1 text-center">|</h3>
                        <label class="col-md-3">Endereço</label>
                        <div class="col-md-3">
                            <input type="text" placeholder="Insira o Endereço"  value="" class="form-control form-control-line" name="endereco" id="endereco">
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-md-2">Estado</label>
                    <div class="col-md-3">
                        <select class="form-control form-control-line" name="estado" id="estado" id="estado">
                            <option selected disabled value="">Selecione o estado</option>
                            <option value="PR">Paraná</option>
                            <option value="SP">São Paulo</option>
                            <option value="SC">Santa Catarina</option>
                        </select>
                    </div>
                        <h3 class="col-md-1 text-center">|</h3>
                        <label class="col-md-3">Cidade</label>
                        <div class="col-md-3">
                            <input type="text" placeholder="Insira a cidade" value="" class="form-control form-control-line" name="cidade" id="cidade">
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-md-2">Observação</label>
                        <div class="col-md-3">
                            <input type="text" placeholder="Insira a Observação" value="" class="form-control form-control-line" name="obs" id="obs">
                        </div>
                        <h3 class="col-md-1 text-center">|</h3>
                        <label class="col-md-3">Data Nascimento</label>
                        <div class="col-md-3">
                            <input type="date" value="" maxlength="10" class="form-control form-control-line" name="dataNasc" id="dataNasc">
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-md-2">Unidade</label>
                        <div class="col-md-3">
                            <?php
                                echo "<select class='form-control form-control-line' name='unidade' id='unidade' >
                                <option value='' disabled selected>Selecione</option>";
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
                        <label class="col-md-3">Turno</label>
                        <div class="col-md-3">
                            <select class="form-control form-control-line" name="turno" id="turno">
                                <option selected disabled value=''>Selecione o Turno</option>
                                <option value="1">7h-15h</option>
                                <option value="2">15h-23h</option>
                                <option value="3">23h-7h</option>
                                <option value="4">8h-18h</option>
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
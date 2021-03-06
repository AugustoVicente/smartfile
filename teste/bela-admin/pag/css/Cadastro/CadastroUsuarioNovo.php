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
    include '../ClassPHP/usuario.php';
    $usuario = new Usuario();
    include '../ClassPHP/Unidade.php';
    $unidade = new Unidade();
    $unidades = $unidade->buscarUnidade();

?>
<!-- Conteúdo -->
<script type="text/javascript">
    jQuery("input.telefone")
        .mask("(99) 9999-9999?9")
        .focusout(function (event) 
            {  
                var target, phone, element;  
                target = (event.currentTarget) ? event.currentTarget : event.srcElement;  
                phone = target.value.replace(/\D/g, '');
                element = $(target);  
                element.unmask();  
                if(phone.length > 10) 
                {  
                    element.mask("(99) 99999-999?9");  
                } 
                else 
                {  
                    element.mask("(99) 9999-9999?9");  
                }  
            }
        );
</script>
<div class="container-fluid">
    <?php
        $layout->titulo("Inserir Usuários");
    ?>
    <div class="row">
        <div class="white-box">
            <form class="form-horizontal form-material" method="POST" action="../../../webservice.php?web=true&acao=InserirUsuario">
                <div class="form-group">
                    <div class="row">
                        <label class="col-md-2">Nome Completo</label>
                        <div class="col-md-3">
                            <input type="text" placeholder="Insira o nome"  value="" class="form-control form-control-line" name="nome">
                        </div>
                        <h3 class="col-md-1 text-center">|</h3>
                        <label class="col-md-3">CPF</label>
                        <div class="col-md-3">
                            <input type="text" placeholder="Insira o CPF" value="" maxlength="11" class="form-control form-control-line" name="cpf">
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-md-2">Login</label>
                        <div class="col-md-3">
                            <input type="text" placeholder="Insira o login" value="" size="50px" class="form-control form-control-line" name="login">
                        </div>
                        <h3 class="col-md-1 text-center">|</h3>
                        <label class="col-md-3">Senha</label>
                        <div class="col-md-3">
                            <input type="password" placeholder="Insira a senha" value="" size="50px" class="form-control form-control-line" name="senha">
                        </div>
                    </div>
                    <div class="row">
                        <label for="example-email" class="col-md-2">E-mail</label>
                        <div class="col-md-3">
                        <input type="email" placeholder="exemple@admin.com" value=""class="form-control form-control-line" name="email">
                    </div>
                    <h3 class="col-md-1 text-center">|</h3>
                    <label class="col-md-3">Tipo de usuário</label>
                    <div class="col-md-3">
                        <?php
                           
                            $tipos = $usuario->buscarTipoUsuario();
                            echo "<select class='form-control form-control-line' name='tipo' >
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
                        <input type="text"  placeholder="Insira o telefone" value="" class="form-control form-control-line" name="telefone">
                    </div>
                    <h3 class="col-md-1 text-center">|</h3>
                    <label class="col-md-3">Celular</label>
                    <div class="col-md-3">
                        <input type="text" placeholder="Insira o celular" value="" data-mask="(00) 0000-0000" data-mask-selectonfocus="true" class="form-control form-control-line" name="celular">
                    </div>
                </div>
                <div class="row">
                    <label class="col-md-2">CEP</label>
                    <div class="col-md-3">
                        <input type="text" placeholder="Insira o CEP" value="" class="form-control form-control-line" name="cep">   
                    </div>
                    <h3 class="col-md-1 text-center">|</h3>
                    <label class="col-md-3">Endereço</label>
                    <div class="col-md-3">
                        <input type="text" placeholder="Insira o Endereço"  value="" class="form-control form-control-line" name="endereco">
                    </div>
                </div>
                <div class="row">
                    <label class="col-md-2">Estado</label>
                    <div class="col-md-3">
                        <input type="text" placeholder="Insira o UF" value="" class="form-control form-control-line" name="estado">
                    </div>
                    <h3 class="col-md-1 text-center">|</h3>
                    <label class="col-md-3">Cidade</label>
                    <div class="col-md-3">
                        <input type="text" placeholder="Insira a cidade" value="" class="form-control form-control-line" name="cidade">
                    </div>
                </div>
                <div class="row">
                    <label class="col-md-2">Observação</label>
                    <div class="col-md-3">
                        <input type="text" placeholder="Insira a Observação" value="" class="form-control form-control-line" name="obs">
                    </div>
                    <h3 class="col-md-1 text-center">|</h3>
                    <label class="col-md-3">Data Nascimento</label>
                    <div class="col-md-3">
                        <input type="date" value="" maxlength="10" class="form-control form-control-line" name="dataNasc">
                    </div>
                </div>
                <div class="row">
                    <label class="col-md-2">Unidade</label>
                    <div class="col-md-3">
                        <?php
                            echo "<select class='form-control form-control-line' name='unidade' >
                            <option disabled selected>Selecione</option>";
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
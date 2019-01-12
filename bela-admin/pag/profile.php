<!-- Abertura -->
<?php
    include 'ClassPHP/Layout.php';
    $layout = new Layout();
    $layout->CabecalhoPerfil();
    $layout->AbreBody();
    $layout->Load();
    $layout->AbreWrapper();
    $layout->TopBar();
    $layout->AbreContent();
?>
<!-- Conteúdo -->
<div class="container-fluid">
    <?php
        $layout->titulo("Perfil");
    ?>
    <script src="js/profile.js"></script>
    <div class="col-md-12 col-xs-12 white-box">
        <div class="white-box">
            <form class="form-horizontal form-material" method="POST" onsubmit="return alteraSenha()" action="../../webservice.php?web=true&acao=recuperaSenha">
                <?php
                    global $logado;
                    include_once('ClassPHP/Usuario.php');
                    $user = new Usuario();
                    $perfil =  $user->buscarUsuario2($logado);                                        
                ?>
                <div class="row form-group">
                    <label class="col-md-2">Nome Completo</label>
                    <div class="col-md-3">
                        <?php
                            echo'<input type="text" placeholder="Insira o nome"  readonly="readonly" value= '.$perfil->nome.' class="form-control form-control-line">';
                        ?>
                    </div>
                    <div class="col-md-1">|</div>
                    <label class="col-md-3">Login</label>
                    <div class="col-md-3">
                        <?php
                            echo '<input type="text" name="login" id="login" readonly="readonly" value="'.$logado.'" class="form-control form-control-line">' ;
                        ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="example-email" class="col-md-2">Email</label>
                    <div class="col-md-3">
                        <?php
                            echo'<input type="email" readonly="readonly" value="'.$perfil->email.'"class="form-control form-control-line" name="email" id="email">';
                        ?>  
                    </div>
                    <div class="col-md-1">|</div>
                    <label class="col-md-3">Senha</label>
                    <div class="col-md-1">
                        <input type="password" size="50px" class="form-control form-control-line" readonly="readonly" value="email@email.com">
                    </div>
                    <div class="col-md-2">
                        <input type="submit" class="btn btn-info" value="Alterar Senha"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2">Telefone</label>
                    <div class="col-md-3">
                        <?php
                            echo'<input type="text" placeholder="Insira o telefone" readonly="readonly" value="'.$perfil->tel.'" class="form-control form-control-line">';
                        ?>
                    </div>
                    <div class="col-md-1">|</div>
                    <label class="col-md-3">Celular</label>
                    <div class="col-md-3">
                        <?php
                            echo'<input type="text" placeholder="Insira o celular" readonly="readonly" value="'.$perfil->cel.'" class="form-control form-control-line">';
                        ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2">CEP</label>
                    <div class="col-md-3">
                        <?php
                            echo'<input type="text" placeholder="Insira o CEP" readonly="readonly" value="'.$perfil->cep.'" class="form-control form-control-line">';
                        ?>                                           
                    </div>
                    <div class="col-md-1">|</div>
                    <label class="col-md-3">Endereço</label>
                    <div class="col-md-3">
                        <?php
                            echo'<input type="text" placeholder="Insira o email"  readonly="readonly" value="'.$perfil->endereco.'" class="form-control form-control-line">';
                        ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2">Estado</label>
                    <div class="col-md-3">
                        <?php
                            echo'<input type="text" placeholder="Insira o UF" readonly="readonly" value="'.$perfil->estado.'" class="form-control form-control-line">';
                        ?>
                    </div>
                    <div class="col-md-1">|</div>
                    <label class="col-md-3">Cidade</label>
                    <div class="col-md-3">
                        <?php
                            echo'<input type="text" placeholder="Insira a cidade" readonly="readonly" value="'.$perfil->cidade.'" class="form-control form-control-line">';
                        ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2">CPF</label>
                    <div class="col-md-3">
                        <?php
                            echo '<input type="text" placeholder="Insira o CPF" readonly="readonly" value="'.$perfil->cpf.'" class="form-control form-control-line">' ;
                        ?>
                    </div>
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
    $layout->Scripts();
    $layout->FechaBody();
    $layout->FechaPag();
?>
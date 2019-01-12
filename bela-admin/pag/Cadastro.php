<!-- Abertura -->
<?php
    include 'ClassPHP/Layout.php';
    $layout = new Layout();
    $layout->CabecalhoCadastro();
    $layout->AbreBody();
    $layout->Load();
    $layout->AbreWrapper();
    $layout->TopBar();
    $layout->AbreContent();
?>
<!-- Conteúdo -->
<div class="container-fluid">
    <?php
        $layout->titulo("Cadastro");
    ?>
    <div class="row white-box">
        <div class="col-sm-4" style="padding: 0 10% 0;" onclick="location.href = 'Cadastro/CadastroTipoUsuario.php'">
            <div style="padding: 45px 45px 0;" class="row">
                <img src="../plugins/images/users.png" alt="home" class="dark-logo" /> 
            </div>
            <div style="padding: 0 75px 0;">
                <h1 class="waves-effect" >Usuários</h1>
            </div>
        </div>
        <div class="col-sm-4" style="padding: 0 7% 0;" onclick="location.href = 'Cadastro/CadastroUnidade.php'">
            <div style="padding: 45px 20px 0;">
                <img src="../plugins/images/Granja.png" alt="home" class="dark-logo" /> 
            </div>
            <div style="padding: 0 50px 0;">
                <h1 class="waves-effect" >Unidades</h1>
            </div>
        </div>
        <div class="col-sm-4" style="padding: 0 5% 0;" onclick="location.href = 'Cadastro/CadastroArmazenagem.php'">
            <div style="padding: 45px 15px 0;">
                <img src="../plugins/images/silo.png" alt="home" class="dark-logo" /> 
            </div>
            <div style="padding: 0 30px 0;">
                <h1 class="waves-effect" >Armazenagem</h1>
            </div>
        </div>
        <div class="col-sm-4" style="padding: 0 10% 0;" onclick="location.href = 'Cadastro/CadastroProduto.php'">
            <div style="padding: 45px 15px 0;">
                <img src="../plugins/images/grain.png" alt="home" class="dark-logo" /> 
            </div>
            <div style="padding: 0 75px 0;">
                <h1 class="waves-effect">Produto</h1>
            </div>
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

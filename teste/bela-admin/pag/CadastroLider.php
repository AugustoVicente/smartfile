<!-- Abertura -->
<?php
    include 'ClassPHP/Layout.php';
    $layout = new Layout();
    $layout->CabecalhoCadastroLider();
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
        <div class="col-sm-4" style="padding: 0 10% 0;" onclick="location.href = 'Cadastro/CadastroUsuarioOperador.php'">
            <div style="padding: 45px 45px 0;" class="row">
                <img src="../plugins/images/operador.png" alt="home" class="dark-logo" /> 
            </div>
            <div style="padding: 0 75px 0;">
                <h1 class="waves-effect" >Operador</h1>
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

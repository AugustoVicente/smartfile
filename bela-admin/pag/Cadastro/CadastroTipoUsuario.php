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
<link rel="stylesheet" href="css/cadastroTipoUsuario.css"></link>
<div class="container-fluid">
    <?php
        $layout->titulo("Cadastro");
    ?>
    <div class="row white-box">
        <div id="operador" class="col-sm-4" onclick="location.href = 'CadastroUsuarioOperador.php'">
            <div id="imgOperador" class="row">
                <img src="../../plugins/images/operador.png" alt="home" class="dark-logo"/> 
            </div>
            <div id="letraOperador">
                <h1 class="waves-effect">Operador</h1>
            </div>
        </div>
        <div id="lider" class="col-sm-4" onclick="location.href = 'CadastroUsuarioLider.php'">
            <div id="imgLider">
                <img src="../../plugins/images/liderOperacional.png" alt="home" class="dark-logo"/> 
            </div>
            <div id="letraLider">
                <h1 class="waves-effect">Lider Operacional</h1>
            </div>
        </div>
        <div id="outros" class="col-sm-4" onclick="location.href = 'CadastroUsuario.php'">
            <div id="imgOutros">
                <img src="../../plugins/images/outros.png" alt="home" class="dark-logo"/> 
            </div>
            <div id="letraOutros">
                <h1 class="waves-effect">Outros</h1>
            </div>
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
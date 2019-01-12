<!-- Abertura -->
<?php
    include 'ClassPHP/Layout.php';
    $layout = new Layout();
    $layout->CabecalhoApontamento();
    $layout->AbreBody();
    $layout->Load();
    $layout->AbreWrapper();
    $layout->TopBar();
    $layout->AbreContent();
?>
<!-- Conteúdo -->
<div class="container-fluid">
    <?php
        $layout->titulo("Apontamentos");
    ?>
    <div class="row white-box">
        <div class="row">
            <div class="col-sm-4 text-center" style="padding: 0 5% 0;" onclick="location.href = 'Apontamento/controleEstoqueDados.php'">
                <div style="padding: 45px 15px 0;">
                    <img src="../plugins/images/estoque.png" alt="home" class="dark-logo"/> 
                </div>
                <div style="padding: 0 30px 0;">
                    <h1 class="waves-effect">Controle de estoque</h1>
                </div>
            </div>
            <div class="col-sm-4 text-center" style="padding: 0 10% 0;" onclick="location.href = 'Apontamento/aeracaoDados.php'">
                <div style="padding:45px 15px 0;" class="row">
                    <img src="../plugins/images/wind.png" alt="home" class="dark-logo" /> 
                </div>
                <div style="padding:  0 30px 0;">
                    <h1 class="waves-effect">Aerações</h1>
                </div>
            </div>
            <div class="col-sm-4 text-center" style="padding: 0 7% 0;" onclick="location.href = 'Apontamento/sondagemDados.php'">
                <div style="padding: 45px 15px 0;">
                    <img src="../plugins/images/binoculars.png" alt="home" class="dark-logo"/> 
                </div>
                <div style="padding: 0 45px 0;">
                    <h1 class="waves-effect">Sondagens</h1>
                </div>
            </div>
        </div> 
        <div class="row">
            <div class="col-sm-4 text-center" style="padding: 0 5% 0;" onclick="location.href = 'Apontamento/tratamentofitaDados.php'">
                <div style="padding: 45px 15px 0;">
                    <img src="../plugins/images/fita.png" alt="home" class="dark-logo" /> 
                </div>
                <div style="padding: 0 30px 0;">
                    <h1 class="waves-effect">Tratamento Fita</h1>
                </div>
            </div>
            <div class="col-sm-4 text-center" style="padding: 0 5% 0;" onclick="location.href = 'Apontamento/pulverizacaoDados.php'">
                <div style="padding: 45px 15px 0;">
                    <img src="../plugins/images/pulverizador.png" alt="home" class="dark-logo" /> 
                </div>
                <div style="padding: 0 30px 0;">
                    <h1 class="waves-effect">Pulverizações Superficiais</h1>
                </div>
            </div>
            <div class="col-sm-4 text-center" style="padding: 0 5% 0;" onclick="location.href = 'Apontamento/nebulizacaoDados.php'">
                <div style="padding: 45px 15px 0;">
                    <img src="../plugins/images/nebuliza.png" alt="home" class="dark-logo" /> 
                </div>
                <div style="padding: 0 30px 0;">
                    <h1 class="waves-effect" >Nebulização</h1>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4 text-center" style="padding: 0 5% 0;" onclick="location.href ='Apontamento/rastelagemDados.php'">
                <div style="padding: 45px 15px 0;">
                    <img src="../plugins/images/rastelar.png" alt="home" class="dark-logo" /> 
                </div>
                <div style="padding: 0 30px 0;">
                    <h1 class="waves-effect">Rastelagens</h1>
                </div>
            </div>
            <div class="col-sm-4 text-center" style="padding: 0 5% 0;" onclick="location.href = 'Apontamento/expurgoDados.php'">
                <div style="padding: 45px 15px 0;">
                    <img src="../plugins/images/expurgos.png" alt="home" class="dark-logo"/> 
                </div>
                <div style="padding: 0 30px 0;">
                    <h1 class="waves-effect">Expurgos</h1>
                </div>
            </div>
            <div class="col-sm-4 text-center" style="padding: 0 5% 0;" onclick="location.href = 'Apontamento/remaquinacaoDados.php'">
                <div style="padding: 45px 15px 0;">
                    <img src="../plugins/images/maquinacao.png" alt="home" class="dark-logo"/> 
                </div>
                <div style="padding: 0 30px 0;">
                    <h1 class="waves-effect">Remaquinações</h1>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4 text-center" style="padding: 0 5% 0;" onclick="location.href = 'Apontamento/termometriaDados.php'">
                <div style="padding: 45px 15px 0;">
                    <img src="../plugins/images/thermostat.png" alt="home" class="dark-logo"/> 
                </div>
                <div style="padding: 0 30px 0;">
                    <h1 class="waves-effect">Termometria</h1>
                </div>
            </div>
            <div class="col-sm-4 text-center" style="padding: 0 5% 0;" onclick="location.href = 'Apontamento/ocorrenciaDados.php'">
                <div style="padding: 45px 15px 0;">
                    <img src="../plugins/images/ocorrencia.png" alt="home" class="dark-logo"/> 
                </div>
                <div style="padding: 0 30px 0;">
                    <h1 class="waves-effect">Ocorrências</h1>
                </div>
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


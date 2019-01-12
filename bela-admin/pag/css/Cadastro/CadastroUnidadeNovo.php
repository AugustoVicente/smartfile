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
        $layout->titulo("Inserir Unidades");
    ?>
    <div class="row">
        <div class="white-box">
            <form class="form-horizontal form-material" method="POST" action="../../../webservice.php?web=true&acao=InserirUnidade">
                <div class="row">
                    <label class="col-md-2">Nome</label>
                    <div class="col-md-3">
                        <input type="text" placeholder="Insira o nome"  value="" class="form-control form-control-line" name="nome">
                    </div>
                    <h3 class="col-md-1 text-center">|</h3>
                    <label class="col-md-3">Estado</label>
                    <div class="col-md-3">
                        <input type="text" placeholder="Insira o UF" value="" class="form-control form-control-line" name="estado">   
                    </div>
                </div>
                <div class="row">
                    <label class="col-md-2">Telefone</label>
                    <div class="col-md-3">
                        <input type="text" placeholder="Insira o telefone" value="" class="form-control form-control-line" name="telefone1">
                    </div>
                    <h3 class="col-md-1 text-center">|</h3>
                    <label class="col-md-3">Telefone 2</label>
                    <div class="col-md-3">
                        <input type="text" placeholder="Insira o telefone" value="" class="form-control form-control-line" name="telefone2">
                    </div>
                </div>
                <div class="row">
                    <label class="col-md-2">CEP</label>
                    <div class="col-md-3">
                        <input type="text" placeholder="Insira o CEP"  maxlength="8" value="" class="form-control form-control-line" name="cep">   
                    </div>
                    <h3 class="col-md-1 text-center">|</h3>
                    <label class="col-md-3">Cidade</label>
                    <div class="col-md-3">
                        <input type="text" placeholder="Insira a cidade" value="" class="form-control form-control-line" name="cidade">
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
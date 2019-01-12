<?php
    include '../ClassPHP/Layout.php';
    $layout = new Layout();
    $layout->CabecalhoCadastrosCoordenador();
    $layout->AbreBody();
    $layout->Load();
    $layout->AbreWrapper();
    $layout->TopBarCadastros();
    $layout->AbreContent();
    include '../ClassPHP/Unidade.php';
    $unidade = new Unidade();
    $unidades = $unidade->buscarUnidade();
?>
<!-- Conteúdo -->
<div class="container-fluid">
    <?php
        $layout->titulo("Inserir Inseticida");
    ?>
    <script src="js/CadastroInseticidaNovo.js"></script>
    <div class="row">
        <div class="white-box">
            <form class="form-horizontal form-material" onsubmit="return verifica()" method="POST" action="../../../webservice.php?web=true&acao=InserirInseticida">
                <div class="row">
                    <label class="col-md-2">Nome</label>
                    <div class="col-md-3">
                        <input type="text" placeholder="Insira o nome" value="" id="nome" class="form-control form-control-line" name="nome">
                    </div>
                    <h3 class="col-md-1 text-center">|</h3>
                    <label class="col-md-2">Código Inseticida</label>
                    <div class="col-md-3">
                        <input type="number" placeholder="Insira o código" value="" id="codigo" class="form-control form-control-line" name="codigo">
                    </div>
                </div>
                <div class="row">
                    <label class="col-md-2">Dosagem Padrão</label>
                    <div class="col-md-3">
                        <input type="number" min="0" placeholder="Insira a dosagem padrão" value="" id="dosagemPadrao" class="form-control form-control-line" name="dosagemPadrao">   
                    </div>
                    <h3 class="col-md-1 text-center">|</h3>
                    <label class="col-md-2">Unidade de medida</label>
                    <div class="col-md-3">
                        <select class='form-control form-control-line' name='unidadeMedida' id='unidadeMedida'>
                            <option value='' disabled selected>Selecione a unidade de medida</option>";
                            <option value='g/ton'>g/ton</option>
                            <option value='ml/ton'>ml/ton</option>
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
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
        $layout->titulo("Inserir Usuários");
    ?>
    <script src="js/CadastroProdutoNovo.js"></script>
    <div class="row">
        <div class="white-box">
            <form class="form-horizontal form-material" onsubmit="return verifica()" method="POST" action="../../../webservice.php?web=true&acao=InserirProduto">
                <div class="form-group">
                    <div class="row">
                        <label class="col-md-2">Nome do Produto</label>
                        <div class="col-md-3">
                            <input type="text" placeholder="Insira o nome"  value="" class="form-control form-control-line" name="nome" id="nome">
                        </div>
                        <h3 class="col-md-1 text-center">|</h3>
                        <label class="col-md-3">Codigo do Produto</label>
                        <div class="col-md-3">
                            <input type="text" placeholder="Insira o codigo"  value="" class="form-control form-control-line" name="codigo" id="codigo">
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <button class="btn btn-success" type="submit" value="Submit">Salvar</button>
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
    $layout->ScriptsCadastros();
    $layout->FechaBody();
    $layout->FechaPag();
?>
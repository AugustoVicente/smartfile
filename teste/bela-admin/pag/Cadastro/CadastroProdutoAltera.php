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
        $layout->titulo("Editar Produto");
        $id = $_REQUEST['idProduto'];
        include '../ClassPHP/Produto.php';
        $classeProduto = new Produto();
        $produto = $classeProduto->buscarProdutoUnico($id);
    ?>
    <script src="js/CadastroProdutoNovo.js"></script>
    <div class="row">
        <div class="white-box">
            <?php
                echo '<form class="form-horizontal form-material" onsubmit="return verifica()" method="POST" action="../../../webservice.php?web=true&acao=AlterarProduto&idProduto='.$id.'">';
            ?>
                <div class="form-group">
                    <div class="row">
                        <label class="col-md-2">Nome do Produto</label>
                        <div class="col-md-3">
                            <?php
                                echo '<input type="text" placeholder="Insira o nome" value="'.$produto->nome.'" class="form-control form-control-line" name="nome" id="nome">';
                            ?>
                        </div>
                        <h3 class="col-md-1 text-center">|</h3>
                        <label class="col-md-3">Codigo do Produto</label>
                        <div class="col-md-3">
                            <?php
                                echo '<input type="text" placeholder="Insira o codigo" value="'.$produto->codigo.'" class="form-control form-control-line" name="codigo" id="codigo">';
                            ?>
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
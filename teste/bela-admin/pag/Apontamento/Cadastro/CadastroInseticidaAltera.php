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
        $layout->titulo("Alterar Inseticida");
        $id = $_REQUEST['idInseticida'];
        include '../ClassPHP/inseticida.php';
        $ClasseInseticida = new Inseticida();
        $inseticida = $ClasseInseticida->buscarInseticidaAltera($id);
    ?>
    <script src="js/CadastroInseticidaAltera.js"></script>
    <div class="row">
        <div class="white-box">
            <?php
                echo '<form class="form-horizontal form-material" onsubmit="return verifica()" method="POST" action="../../../webservice.php?web=true&acao=AlterarInseticida&id='.$id.'">';
            ?>
                <div class="row">
                    <label class="col-md-2">Nome</label>
                    <div class="col-md-3">
                        <?php
                            echo '<input type="text" placeholder="Insira o nome" value="'.$inseticida->nome.'" id="nome" class="form-control form-control-line" name="nome">';
                        ?>
                    </div>
                    <h3 class="col-md-1 text-center">|</h3>
                    <label class="col-md-3">Dosagem Padrão</label>
                    <div class="col-md-3">
                        <?php
                            echo '<input type="number" min="0" placeholder="Insira a dosagem padrão" value="'.$inseticida->dosagem_padrao.'" id="dosagemPadrao" class="form-control form-control-line" name="dosagemPadrao">';
                        ?>   
                    </div>
                </div>
                <div class="row">
                    <label class="col-md-2">Unidade de medida</label>
                    <div class="col-md-3">
                        <select class='form-control form-control-line' name='unidadeMedida' id='unidadeMedida'>
                            <?php
                                if($inseticida->unidade_medida == "g/ton")
                                {
                                    echo "<option selected value='g/ton'>g/ton</option>
                                    <option value='ml/ton'>ml/ton</option>";
                                }
                                else
                                {
                                    echo "<option selected value='ml/ton'>ml/ton</option>
                                    <option value='g/ton'>g/ton</option>";
                                }
                            ?>
                        </select>
                    </div>
                    <h3 class="col-md-1 text-center">|</h3>
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
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
    include '../ClassPHP/Unidade.php';
    $unidade = new Unidade();
    $unidades = $unidade->buscarUnidade();
?>
<!-- Conteúdo -->
<div class="container-fluid">
    <?php
        $layout->titulo("Inserir Armazenagem");
        include '../ClassPHP/Armazenagem.php';
        $idSilo = $_REQUEST['idSilo'];
        $silo = new Armazenagem();
        /*-----------------------Metodos-----------------------*/
        $sl          = $silo->carregarArmazenagem($idSilo);
        $nome        = $sl->nome;
        $tipo        = $sl->idtipo_silo;
        $numCabos    = $sl->numCabos;
    ?>
    <script src="js/CadastroArmazenagemAltera.js"></script>
    <div class="row">
        <div class="white-box">
            <?php
                echo '<form class="form-horizontal form-material" onsubmit="return verifica()" method="POST" action="../../../webservice.php?web=true&acao=AlterarArmazenagem&id='.$idSilo.'">';
            ?>
                <div class="row">
                    <label class="col-md-2">Nome</label>
                    <div class="col-md-3">
                        <?php
                            echo '<input type="text" placeholder="Insira o nome" value="'.$nome.'" id="nome" class="form-control form-control-line" name="nome">';
                        ?>
                    </div>
                    <h3 class="col-md-1 text-center">|</h3>
                    <?php
                        if($tipo == 1)
                        {
                            echo '<label class="col-md-3">Número de cabos no silo</label>
                            <div class="col-md-3">
                                <input type="number" value="'.$numCabos.'" min="0" max="50" placeholder="Insira o número de cabos" id="numCabos" class="form-control form-control-line" name="numCabos">   
                            </div>';
                        }
                    ?>    
                </div>
                <div class="row">
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
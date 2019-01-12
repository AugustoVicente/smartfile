<!-- Abertura -->
<?php
    include '../ClassPHP/Layout.php';
    $layout = new Layout();
    $layout->CabecalhoApontamentosOperador();
    $layout->AbreBody();
    $layout->Load();
    $layout->AbreWrapper();
    $layout->TopBarCadastros();
    $layout->AbreContent();
?>
<!-- Conteúdo -->
<div class="container-fluid">
    <?php
        $layout->titulo("Nebulização");
    ?>
    <script src="js/nebulizacao.js"></script>
    <div class="row">
        <div class="white-box">
            <?php
                global $logado;
                echo '<form class="form-horizontal form-material" onsubmit="return verifica()" method="POST" action="../../../webservice.php?web=true&acao=InserirNebulizacao&login='.$logado.'">';
            ?>
                <div class="form-group white-box">
                    <div class="row">
                        <label class="col-md-2">Armazém</label>
                        <div class="col-md-3">
                            <?php
                                $_REQUEST['web'] = true; 
                                $_REQUEST['acao'] = "buscarArmazenagem";
                                $_REQUEST['login'] = $logado;
                                include '../../../webservice.php';
                                echo "<select class='form-control form-control-line' name='silo' id='silo'>
                                <option value='' disabled selected>Selecione</option>";
                                foreach ($silos as $silo) 
                                {
                                    if($silo->idtipo_silo == 1)
                                    {
                                        $id = $silo->idSilo;
                                        $nome = $silo->nome;
                                        echo "<option value='$id'>$nome</option>";
                                    }
                                }
                                echo "</select>"; 
                            ?> 
                        </div>
                        <h3 class="col-md-1 text-center">|</h3>
                        <label class="col-md-3">Data</label>
                        <div class="col-md-3">
                            <?php
                                $data = date('Y-m-d');
                                echo '<input type="date" maxlength="11" class="form-control form-control-line" readonly="readonly" name="data" id="data" value="'.$data.'">';
                            ?>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-md-2">Inseticida Utilizado</label>
                        <div class="col-md-3">
                            <select class='form-control form-control-line' name='inseticida' id='inseticida'>
                                <option value='' disabled selected>Selecione</option>
                                <?php
                                    include '../ClassPHP/inseticida.php';
                                    $ClasseInseticida = new Inseticida();
                                    $inseticidas = $ClasseInseticida->buscarInseticida();
                                    //Preenchendo campos dos Silos
                                    foreach ($inseticidas as $inseticida) 
                                    {
                                        $id         = $inseticida->idInseticida;
                                        $nome       = $inseticida->nome;
                                        $codigo     = $inseticida->codigo;
                                        echo "<option value='$id'>$codigo - $nome</option>";
                                    }
                                ?>
                            </select>
                        </div>
                        <h3 class="col-md-1 text-center">|</h3> 
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
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
        $layout->titulo("Padrão Produto");
    ?>
    <script src="js/padraoProduto.js"></script>
    <div class="row">
        <div class="white-box">
            <?php
                global $logado;
                echo '<form class="form-horizontal form-material" method="POST" onsubmit="return verifica()" action="../../../webservice.php?web=true&acao=InserirPadrao&login='.$logado.'">';
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
                                <option disabled selected>Selecione</option>";
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
                        <label class="col-md-2">Umidade</label>
                        <div class="col-md-3">
                            <input type="number" placeholder="Insira a umidade em porcentagem" class="form-control form-control-line" name="umidade" step="0.01" id="umidade">
                        </div>
                        <h3 class="col-md-1 text-center">|</h3>
                        <label class="col-md-3">Impureza</label>
                        <div class="col-md-3">
                            <input type="number" min="0" placeholder="Insira a impureza em porcentagem" size="50px" class="form-control form-control-line" name="impureza" step="0.01" id="impureza">
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-md-2">Ardido</label>
                        <div class="col-md-3">
                            <input type="number" placeholder="Insira a ardido em porcentagem" step="0.01" class="form-control form-control-line" name="ardido" id="ardido">
                        </div>
                        <h3 class="col-md-1 text-center">|</h3>
                        <label class="col-md-3">PH</label>
                        <div class="col-md-3">
                            <input type="number" min="0" placeholder="Insira o ph em porcentagem" step="0.01" size="50px" class="form-control form-control-line" name="ph" id="ph">
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-md-2">Avariado</label>
                        <div class="col-md-3">
                            <input type="number" placeholder="Insira o avariado em porcentagem"  step="0.01" class="form-control form-control-line" name="avariado" id="avariado">
                        </div>
                        <h3 class="col-md-1 text-center">|</h3>
                        <label class="col-md-3">Esverdiado</label>
                        <div class="col-md-3">
                            <input type="number" min="0" placeholder="Insira o esverdeado em porcentagem" step="0.01" size="50px" class="form-control form-control-line" name="esverdiado" id="esverdiado">
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-md-2">Triguilho</label>
                        <div class="col-md-3">
                            <input type="number" placeholder="Insira o triguilho em porcentagem" step="0.01" class="form-control form-control-line" name="triguilho" id="triguilho">
                        </div>
                        <h3 class="col-md-1 text-center">|</h3>
                    </div>
                </div>
                <div class="col-sm-3">
                    <button class="btn btn-success" type="submit"  value="Submit">Salvar</button>
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
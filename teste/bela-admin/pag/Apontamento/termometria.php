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
        $layout->titulo("Termometria");
    ?>
    <script src="js/termometria.js"></script>
    <div class="row">
        <div class="white-box">
            <?php
                global $logado;
                echo '<form class="form-horizontal form-material" onsubmit="return verifica()" method="POST" action="../../../webservice.php?web=true&acao=InserirTermometria&login='.$logado.'">';
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
                        <label class="col-md-2">Temperatura Ambiente</label>
                        <div class="col-md-3">
                            <input type="number" placeholder="Insira a temperatura ambiente" min="0" size="50px" class="form-control form-control-line" name="tempAmbiente" id="tempAmbiente">
                        </div>
                        <h3 class="col-md-1 text-center">|</h3>
                        <label class="col-md-3">Temperatura Máxima </label>
                        <div class="col-md-3">
                            <input type="number" placeholder="Insira a temperatura máxima" min="0" size="50px" class="form-control form-control-line" name="tempMaxima" id="tempMaxima">
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-md-2">Nº de pontos acima de 29°C</label>
                        <div class="col-md-3">
                            <input type="number" placeholder="Insira" size="50px" class="form-control form-control-line" name="numPontosAcima" id="numPontosAcima">
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
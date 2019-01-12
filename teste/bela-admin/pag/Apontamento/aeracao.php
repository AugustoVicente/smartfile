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
        $layout->titulo("Aeração");
    ?>
    <script src='js/aeracao.js'></script>
    <div class="row">
        <div class="white-box">
            <?php
                global $logado;
                echo '<form class="form-horizontal form-material" method="POST" onsubmit="return verifica()" action="../../../webservice.php?web=true&acao=InserirAeracao&login='.$logado.'">';
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
                        <label class="col-md-2">Nº de hora./dia</label>
                        <div class="col-md-3">
                            <input type="number" min="0" placeholder="Insira o número de horas por dia" size="50px" class="form-control form-control-line" name="numHoraDia" id="numHoraDia">
                        </div>
                        <h3 class="col-md-1 text-center">|</h3>
                        <label class="col-md-3">Temperatura</label>
                        <div class="col-md-3">
                            <input type="number" min="0" placeholder="Insira a temperatura em graus celsius" size="50px" class="form-control form-control-line" name="temperatura" id="temperatura">
                        </div>
                    </div>
                    <div class="row">
                        <label for="example-email" class="col-md-2">Umidade</label>
                        <div class="col-md-3">
                            <input type="number" placeholder="Insira a umidade em porcentagem" class="form-control form-control-line" name="umidade" id="umidade">
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
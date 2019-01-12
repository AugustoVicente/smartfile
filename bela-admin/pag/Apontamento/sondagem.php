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
<script src="js/sondagem.js"></script>
<link rel="stylesheet" href="css/sondagem.css"></link>
<div class="container-fluid">
    <?php
        $layout->titulo("Sondagem");
    ?>
    <div class="row">
        <div class="white-box">
            <?php
                global $logado;
                echo '<form class="form-horizontal form-material" onsubmit="return verifica()" method="POST" action="../../../webservice.php?web=true&acao=InserirSondagem&login='.$logado.'">';
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
                        <label class="col-md-2">Ações realizadas</label>
                        <div class="col-md-2">
                            <input type="checkbox" name="operacao1" id="Etermometria" value="Termometria" onclick="selecionaAcao()">Termometria
                        </div>
                        <div class="col-md-2">
                            <input type="checkbox" name="operacao2" value="Padrao" id="Epadrao" onclick="selecionaAcao()">Padrão de produto
                        </div>
                    </div>
                    <br/>
                    <div id="termometria">
                        <label class="col-md-2">Termometria</label>
                        <div class="col-md-10 white-box">
                            <div class="row">
                                <label class="col-md-2">Temperatura Ambiente</label>
                                <div class="col-md-3">
                                    <input value="" type="number" placeholder="Insira a temperatura ambiente" min="0" size="50px" class="form-control form-control-line" name="tempAmbiente" id="tempAmbiente">
                                </div>
                                <h3 class="col-md-1 text-center">|</h3>
                                <label class="col-md-3">Temperatura Máxima</label>
                                <div class="col-md-3">
                                    <input value="" type="number" placeholder="Insira a temperatura máxima" min="0" size="50px" class="form-control form-control-line" name="tempMaxima" id="tempMaxima">
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-2">Nº de pontos acima de 29°C</label>
                                <div class="col-md-3">
                                    <input value="" type="number" placeholder="Insira" size="50px" class="form-control form-control-line" name="numPontosAcima" id="numPontosAcima">
                                </div>
                                <h3 class="col-md-1 text-center">|</h3>
                            </div>
                        </div>
                    </div>
                    <br/>
                    <div id="padrao">
                        <label class="col-md-2">Padrão do produto</label>
                        <div class="col-md-10 white-box">
                            <div class="row">
                                <label class="col-md-2">Umidade</label>
                                <div class="col-md-3">
                                    <input type="number" min="0" value="" placeholder="Insira a umidade em porcentagem" class="form-control form-control-line" name="umidade" step="0.01" id="umidade">
                                </div>
                                <h3 class="col-md-1 text-center">|</h3>
                                <label class="col-md-3">Impureza</label>
                                <div class="col-md-3">
                                    <input type="number" min="0" value="" placeholder="Insira a impureza em porcentagem" size="50px" class="form-control form-control-line" name="impureza" step="0.01" id="impureza">
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-2">Ardido</label>
                                <div class="col-md-3">
                                    <input type="number" min="0" value="" placeholder="Insira a ardido em porcentagem" step="0.01" class="form-control form-control-line" name="ardido" id="ardido">
                                </div>
                                <h3 class="col-md-1 text-center">|</h3>
                                <label class="col-md-3">PH</label>
                                <div class="col-md-3">
                                    <input type="number" min="0" value="" placeholder="Insira o ph em porcentagem" step="0.01" size="50px" class="form-control form-control-line" name="ph" id="ph">
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-2">Avariado</label>
                                <div class="col-md-3">
                                    <input type="number" min="0" value="" placeholder="Insira o avariado em porcentagem" step="0.01" class="form-control form-control-line" name="avariado" id="avariado">
                                </div>
                                <h3 class="col-md-1 text-center">|</h3>
                                <label class="col-md-3">Esverdiado</label>
                                <div class="col-md-3">
                                    <input type="number" min="0" value="" placeholder="Insira o esverdeado em porcentagem" step="0.01" size="50px" class="form-control form-control-line" name="esverdiado" id="esverdiado">
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-2">Triguilho</label>
                                <div class="col-md-3">
                                    <input type="number" value="" min="0" placeholder="Insira o triguilho em porcentagem" step="0.01" class="form-control form-control-line" name="triguilho" id="triguilho">
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
                        </div>
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
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
<script src='js/tratamentoFita.js'></script>
<link rel="stylesheet" href="css/tratamentofita.css"></link>
<div class="container-fluid">
    <?php
        $layout->titulo("Tratamento da fita");
    ?>
    <div class="row">
        <div class="white-box">
            <?php
                global $logado;
                echo '<form class="form-horizontal form-material" onsubmit="return verifica()" method="POST" action="../../../webservice.php?web=true&acao=InserirTratamentoFita&login='.$logado.'">';
            ?>
                <div class="form-group white-box">
                    <div class="row">
                        <label class="col-md-2">Armazém</label>
                        <div class="col-md-3">
                            <?php
                                $_REQUEST['web'] = true; 
                                $_REQUEST['acao'] = "buscarArmazenagemEstoque";
                                $_REQUEST['login'] = $logado;
                                include '../../../webservice.php';
                                echo "<select class='form-control form-control-line' name='silo' id='silo' onchange='selecionaSilo()'>
                                <option value='' disabled selected>Selecione</option>";
                                foreach ($silos as $silo) 
                                {
                                    if($silo->idtipo_silo == 1)
                                    {
                                        if($silo->toneladas != 0)
                                        {
                                            $id = $silo->idSilo;
                                            $nome = $silo->nome;
                                            $toneladas = $silo->toneladas;
                                            echo "<option value='$id'>$nome - ($toneladas toneladas)</option>";
                                        }
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
                    <br/>
                    <div id="fatores">
                        <div class="row">
                            <label class="col-md-2">Total ou Parcial</label>
                            <div class="col-md-3">
                                <select class='form-control form-control-line' name='totalparcial' id='totalparcial' onchange="qtdTratado()">
                                    <option selected value='Total'>Total</option>
                                    <option value='Parcial'>Parcial</option>
                                </select>
                            </div>
                            <h3 class="col-md-1 text-center">|</h3>
                            <div id="qtdParcial">
                                <label class="col-md-3">Quantidade <small>(Toneladas)</small></label>
                                <div class="col-md-3">
                                    <input class="form-control form-control-line" value='' onchange="mudaToneladas()" min="1" readonly="readonly" type="number" min="0" placeholder="Insira a quantidade em toneladas" size="50px" name="qtdToneladas" id="qtdToneladas">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-2">Quantidade de inseticidas</label>
                            <div class="col-md-2">
                                <input type="radio" onclick="spawnInseticida()" checked="checked" name="inseticida" id="um" value="1"><label>1</label>
                            </div>
                            <div class="col-md-2">
                                <input type="radio" onclick="spawnInseticida()" id="dois" name="inseticida" value="2"><label>2</label>  
                            </div>
                            <div class="col-md-2">
                                <input type="radio" onclick="spawnInseticida()" id="tres" name="inseticida" value="3"><label>3</label>
                            </div>
                        </div>
                        <br/>
                        <div class="row" id="divinseticidaUm">
                            <label class="col-md-2">1) Inseticida</label>
                            <div class="col-md-3">
                                <select class='form-control form-control-line' name='inseticidaUm' onchange="escolheInseticidaUm()" id='inseticidaUm'>
                                    <option value='' disabled selected>Selecione</option>
                                    <?php
                                        include '../ClassPHP/inseticida.php';
                                        $ClasseInseticida = new Inseticida();
                                        $inseticidas = $ClasseInseticida->buscarInseticida();
                                        //Preenchendo campos dos Silos
                                        foreach ($inseticidas as $inseticida) 
                                        {
                                            $id             = $inseticida->idInseticida;
                                            $nome           = $inseticida->nome;
                                            $unidadeMedida  = $inseticida->unidade_medida;
                                            $dosagemPadrao  = $inseticida->dosagem_padrao;
                                            $codigo  = $inseticida->codigo;
                                            echo "<option value='$id'>$codigo - $nome ($dosagemPadrao $unidadeMedida)</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                            <h3 class="col-md-1 text-center">|</h3>
                            <label class="col-md-3">1) Consumo Total</label>
                            <div class="col-md-3">
                                <input value='' type="text" min="0" placeholder="Insira a dosagem" readonly="readonly" size="50px" class="form-control form-control-line" name="DosagemUm" id="DosagemUm">
                            </div>
                        </div>
                        <div class="row" id="divinseticidaDois">
                            <label class="col-md-2">2) Inseticida</label>
                            <div class="col-md-3">
                                <select class='form-control form-control-line' name='inseticidaDois' onchange="escolheInseticidaDois()" readonly="readonly" id='inseticidaDois'>
                                    <option value='' disabled selected>Selecione</option>
                                    <?php
                                        foreach ($inseticidas as $inseticida) 
                                        {
                                            $id             = $inseticida->idInseticida;
                                            $nome           = $inseticida->nome;
                                            $unidadeMedida  = $inseticida->unidade_medida;
                                            $dosagemPadrao  = $inseticida->dosagem_padrao;
                                            $codigo  = $inseticida->codigo;
                                            echo "<option value='$id'>$codigo - $nome ($dosagemPadrao $unidadeMedida)</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                            <h3 class="col-md-1 text-center">|</h3>
                            <label class="col-md-3">2) Consumo Total</label>
                            <div class="col-md-3">
                                <input value='' type="text" min="0" placeholder="Insira a dosagem" readonly="readonly" size="50px" class="form-control form-control-line" name="DosagemDois" id="DosagemDois">
                            </div>
                        </div>
                        <div class="row" id="divinseticidaTres">
                            <label class="col-md-2">3) Inseticida</label>
                            <div class="col-md-3">
                                <select class='form-control form-control-line' name='inseticidaTres' onchange="escolheInseticidaTres()" id='inseticidaTres'>
                                    <option value='' disabled selected>Selecione</option>
                                    <?php
                                        foreach ($inseticidas as $inseticida) 
                                        {
                                            $id             = $inseticida->idInseticida;
                                            $nome           = $inseticida->nome;
                                            $unidadeMedida  = $inseticida->unidade_medida;
                                            $dosagemPadrao  = $inseticida->dosagem_padrao;
                                            $codigo  = $inseticida->codigo;
                                            echo "<option value='$id'>$codigo - $nome ($dosagemPadrao $unidadeMedida)</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                            <h3 class="col-md-1 text-center">|</h3>
                            <label class="col-md-3">3) Consumo Total</label>
                            <div class="col-md-3">
                                <input value='' type="text" min="0" placeholder="Insira a dosagem" readonly="readonly" size="50px" class="form-control form-control-line" name="DosagemTres" id="DosagemTres">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <button class="btn btn-success" type="submit" value="Submit">Salvar</button>
                        </div>
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
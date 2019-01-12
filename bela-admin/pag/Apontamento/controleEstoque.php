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
<script src='js/controleEstoque.js'></script>
<link rel="stylesheet" href="css/controleEstoque.css"></link>
<div class="container-fluid">
    <?php
        $layout->titulo("Controle de Estoque");
    ?>
    <div class="row">
        <div class="white-box">
            <?php
                global $logado;
                /*Atributos*/
                $idEstoque            = $_REQUEST['idEstoque'];
                $idSilo               = $_REQUEST['idSilo'];
                /*CLASSE*/
                include '../ClassPHP/Armazenagem.php';
                $ClasseArmazenagem    = new Armazenagem();
                /*--------*/
                /* CHAMANDO função php para calcular qual dever ser o maximo de entrada e saida*/
                $unidades             = $ClasseArmazenagem->buscarSilo($idSilo);
                $resultado            = $ClasseArmazenagem->CalcularOperacaoEstoque($idSilo,$idEstoque);
                $resultadoSaida       = $ClasseArmazenagem->CalcularOperacaoEstoqueSaida($idEstoque);
                $_SESSION['max']      = $resultado->total;
                $_SESSION['maxSaida'] = $resultadoSaida->quantidade;
                /*--------------------------------------------------*/ 
                echo '<form onsubmit="return verifica()" class="form-horizontal form-material" method="POST" action="../../../webservice.php?web=true&acao=InserirControleEstoque&idEstoque='.$idEstoque.'&&login='.$logado.'">';
                echo'<input type="text" value="'.$resultado->total.'" id="resultado">';
                echo'<input type="text" value="'.$resultadoSaida->quantidade.'" id="resultadoSaida">';
            ?>
                <div class="form-group white-box">
                    <div class="row">
                        <label class="col-md-2">Armazém</label>
                        <div class="col-md-3">
                            <?php
                                $_REQUEST['web'] = true; 
                                $_REQUEST['acao'] = "buscarArmazenagemEstoqueUnico";
                                $_REQUEST['idSilo'] = $idSilo;
                                $_REQUEST['login'] = $logado;
                                include '../../../webservice.php';
                                echo "<select class='form-control form-control-line' name='silo' id='silo' onchange='selecionaSilo()'>";
                                foreach ($silos as $silo) 
                                {
                                    $id = $silo->idSilo;
                                    $nome = $silo->nome;
                                    if($silo->toneladas == null)
                                    {
                                        $toneladas = 0;
                                    }
                                    else
                                    {
                                        $toneladas = $silo->toneladas;
                                    }
                                    $capacidade = $silo->capacidade;
                                    echo "<option selected value='$id'>$nome - ($toneladas/$capacidade toneladas)</option>";
                                }
                                echo "</select>"; 
                            ?> 
                        </div>
                        <h3 class="col-md-1 text-center">|</h3>
                        <label class="col-md-3">Ocorrência</label>
                        <div class="col-md-3">
                            <select class='form-control form-control-line' name='tipo' id="tipo" onchange="tipoEstoque()">
                                <option value="" selected>Selecione</option>
                                <option value="0" id="entrada">Entrada</option>
                                <option value="1" id="saida">Saída</option>
                            </select>
                        </div>
                    </div>
                    <div id="divQuantidade">
                        <div class="row" >
                            <label class="col-md-2">Quantidade <small>(Toneladas)</small></label>
                            <div class="col-md-3">
                                <input type="number" value="1" placeholder="Insira a quantidade em toneladas" class="form-control form-control-line" name="quantidade" min='1' id="quantidade">
                            </div>
                            <h3 class="col-md-1 text-center">|</h3>
                        </div>
                    </div>
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
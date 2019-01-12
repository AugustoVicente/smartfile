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
        $layout->titulo("Transilagem");
    ?>
    <script src="js/transilagem.js"></script>
    <link rel="stylesheet" href="css/transilagem.css"></link>
    <div class="row">
        <div class="white-box">
            <?php
                global $logado;
                $idSilo     = $_REQUEST['idSilo'];
                $idEstoque  = $_REQUEST['idEstoque'];
                /*CLASSE*/
                include '../ClassPHP/Armazenagem.php';
                $ClasseArmazenagem    = new Armazenagem();
                /*--------*/
                /* CHAMANDO função php para calcular qual dever ser o maximo de entrada e saida*/
                $unidades             = $ClasseArmazenagem->buscarSilo($idSilo);
                $resultadoSaida       = $ClasseArmazenagem->CalcularOperacaoEstoqueSaida($idEstoque);
                echo '<form class="form-horizontal form-material" onsubmit="return verifica()" method="POST" action="../../../webservice.php?web=true&acao=InserirTransilagem&login='.$logado.'">';
            ?>
                <div class="form-group white-box">
                    <div class="row">
                        <label class="col-md-2">Armazém</label>
                        <div class="col-md-3">
                            <?php
                                echo "<select class='form-control form-control-line' name='silo' id='silo' onchange='mostraQuantidade()'  >";
                                foreach ($unidades as $unidade) 
                                {
                                    $id = $unidade->idSilo;
                                    $nome = $unidade->nome;
                                    $idProduto = $unidade->idProduto;
                                    echo "<option value='$id'>$nome</option>";
                                }
                                echo "</select>"; 
                            ?>  
                        </div>
                        <h3 class="col-md-1 text-center">|</h3>
                        <label class="col-md-2">Armazém de destino</label>
                        <div class="col-md-4">
                            <?php
                                $_REQUEST['web'] = true; 
                                $_REQUEST['acao'] = "buscarArmazenagemEstoque";
                                $_REQUEST['login'] = $logado;
                                $_REQUEST['idProduto'] = $idProduto;
                                include '../../../webservice.php';
                                echo "<select class='form-control form-control-line' name='siloDestino' id='siloDestino' onchange='mostraQuantidade()'>
                                <option value='' disabled selected>Selecione</option>";
                                foreach ($silos as $silo) 
                                {
                                    if($silo->idtipo_silo == 1)
                                    {
                                        if($silo->idSilo != $idSilo)
                                        {
                                            $id = $silo->idSilo;
                                            $nome = $silo->nome;
                                            if($silo->insercao == null)
                                            {
                                                $insercao = $silo->capacidade;
                                            }
                                            else
                                            {
                                                $insercao = $silo->insercao;
                                            }
                                            echo "<option value='$id'>$nome - ($insercao toneladas livres para inserção)</option>";
                                        }
                                    }
                                }
                                echo "</select>"; 
                            ?>  
                        </div>
                    </div>
                    <div id="divQuantidade" class="row">
                        <label class="col-md-2">Quantidade</label>
                        <div class="col-md-3">
                            <?php
                                echo '<input type="number" placeholder="Insira a quantidade em toneladas" class="form-control 
                                form-control-line" name="quantidade" value="1" id="quantidade" max="'.$resultadoSaida->qtd_final.'">';
                            ?>
                        </div>
                        <h3 class="col-md-1 text-center">|</h3>
                        <label class="col-md-2">Data</label>
                        <div class="col-md-2">
                            <?php
                                $data = date('Y-m-d');
                                echo '<input type="date" maxlength="11" class="form-control form-control-line" readonly="readonly" name="data" id="data" value="'.$data.'">';
                            ?>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <button class="btn btn-success" type="submit" value="Submit">Realizar transilagem</button>
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
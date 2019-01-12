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
<!-- Conteudo -->
<link rel="stylesheet" href="css/controleProduto.css"></link>
<script src="js/controleProduto.js"></script>
<div class="container-fluid">
    <?php
        $layout->titulo("Controle de produtos");
        if(isset($_REQUEST['idHistorico']))
        {
            $idHistorico = $_REQUEST['idHistorico'];    
        }
        $idSilo = $_REQUEST['idSilo'];
        if($_REQUEST['acao'] == "finalizar")
        {
            global $logado;
            echo "<form class='form-horizontal form-material white-box' method='POST' action='../../../webservice.php?web=true&acao=EncerrarProduto&idHistorico=".$idHistorico."'>
                <div class='form-group white-box'> 
                    <div class='row'>
                        <label class='col-md-1'>Data</label>
                        <div class='col-md-3'>";
                            $data = date('Y-m-d');
                            echo "<input type='date' class='form-control form-control-line' readonly='readonly' name='data' id='data' value='".$data."'>
                        </div>
                        <div class='col-sm-5'>|</div>
                        <div class='col-sm-3' id='divBtn'>
                            <button class='btn btn-success' onsubmit='submitFim()' type='submit' value='Submit'>Confirmar fim de produto!</button>
                        </div>
                    </div>
                </div>
            </form>";
        }
        else if($_REQUEST['acao'] == "iniciar")
        {
            global $logado;
            echo "<form class='form-horizontal form-material' onsubmit='return submitInicio()' method='POST' action='../../../webservice.php?web=true&acao=NovoProduto&idSilo=".$idSilo."'>
                <div class='form-group white-box'> 
                    <div class='row'>
                        <label class='col-md-2'>Data</label>
                        <div class='col-md-3'>";
                            $data = date('Y-m-d');
                            echo "<input type='date' class='form-control form-control-line' readonly='readonly' name='data' id='data' value='".$data."'>
                        </div>
                        <div class='col-sm-1'>|</div>
                        <label class='col-md-2'>Produto</label>
                        <div class='col-md-3'>";
                            include '../ClassPHP/Produto.php';
                            $classeProduto = new Produto();
                            $produtos = $classeProduto->buscarProduto();
                            echo "<select class='form-control form-control-line' name='produto' id='produto'>
                                <option value='' disabled selected>Selecione</option>";
                                foreach ($produtos as $produto) 
                                {
                                    $nome =$produto->nome;
                                    $id = $produto->idProduto;
                                    echo "<option value='$id'>$nome</option>";
                                }
                            echo "</select>
                        </div>
                    </div>
                    <br/>
                    <div class='row'>
                        <label class='col-md-2'>Nome Safra Nova</label>
                        <div class='col-md-3'>
                            <input type='text' class='form-control form-control-line' name='nome' id='nome' value=''>
                        </div>
                        <div class='col-sm-5'>|</div>
                    </div>
                    <div class='col-sm-2' id='divBtn'>
                        <button class='btn btn-success' type='submit' value='Submit'>Confirmar início de produto!</button>
                    </div>
                </div>
            </form>";
        }
        else if($_REQUEST['acao'] == "alterar")
        {
            global $logado;
            $idHistorico =$_REQUEST['idHistorico'];
            echo "<form class='form-horizontal form-material' onsubmit='return submitAlterar()' method='POST' action='../../../webservice.php?web=true&acao=AlterarSafra&idSilo=".$idSilo."&idHistorico=".$idHistorico."&login=".$logado."'>
                <div class='form-group white-box'> 
                    <div class='row white-box'>
                        <label class='col-md-2'>Data</label>
                        <div class='col-md-3'>";
                            $data = date('Y-m-d');
                            echo "<input type='date' class='form-control form-control-line' name='data' id='data' value='".$data."'>
                        </div>
                        <div class='col-sm-1'>|</div>
                        <label class='col-md-2'>Nome Safra</label>
                        <div class='col-md-3'>
                            <input type='text' class='form-control form-control-line' name='nomeSafra' placeholder='Insira o nome da safra' id='nomeSafra' value=''> 
                        </div>
                    </div>
                    <div class='col-sm-2' id='divBtn'>
                        <button class='btn btn-success' type='submit' value='Submit'>Confirmar início de produto!</button>
                    </div>
                </div>
            </form>";
        }
    ?>
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
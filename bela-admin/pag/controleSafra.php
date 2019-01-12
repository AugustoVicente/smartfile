<?php
    include 'ClassPHP/Layout.php';
    $layout = new Layout();
    $layout->Cabecalho();
    $layout->AbreBody();
    $layout->Load();
    $layout->AbreWrapper();
    $layout->TopBar();
    $layout->AbreContent();
?>
<!-- Conteúdo -->
<div class="row">
    <link rel="stylesheet" href="Apontamento/css/controleEstoqueDados.css"></link>
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Controle do produto:</h2>
                <ul class="nav navbar-right panel_toolbox">
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <table id="datatable-buttons" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Unidade</th>
                            <th>Armazém</th>
                            <th>Safra</th>
                            <th></th>
                        </tr>
                    </thead>
                    <?php
                        global $logado;
                        include 'ClassPHP/dateParse.php';
                        $dt = new DateConverter();
                        $_REQUEST['web'] = true;
                        include 'ClassPHP/controleEstoque.php';
                        $ClasseEstoque = new ControleEstoque();
                        $coorde =$_REQUEST['tipo'];
                        $idUnidade = $_POST['cb_Unidade'];
                        $unidades = $ClasseEstoque->buscarControleEstoqueUnidade($idUnidade);
                    
                        //Preenchendo campos dos Silos
                        foreach ($unidades as $unidade) 
                        {
                            $Unidade         = $unidade->unidade;
                            $idHistorico     = $unidade->idHistorico;
                            $idUnidade       = $unidade->idUnidade;
                            $idEstoque       = $unidade->idEstoque;
                            $idSilo          = $unidade->idSilo;
                            $Armazem         = $unidade->silo;
                            $quantidade      = $unidade->qtdFinal;
                            $total           = $unidade->capacidade;
                            $padrao          = $unidade->umidade;
                            $safra           = $unidade->safra;
                            $dataIn          = $dt->getdate($unidade->dataIn);

                             if($unidade->safra == null)
                            {
                                echo "<tbody>
                                    <tr>
                                        <td>$Unidade</td>
                                        <td>$Armazem</td>
                                        <td>Não há</td>   
                                        <td>
                                            
                                        </td>
                                    </tr>
                                </tbody>";
                            }
                            else
                            {
                                echo "<tbody>
                                    <tr>
                                        <td>$Unidade</td>
                                        <td>$Armazem</td>
                                        <td>$safra</td>
                                        <td>
                                            <button type='button' id='btnAct' class='btn btn-round btn-info' onclick=\"location.href='Apontamento/controleProduto.php?acao=alterar&idSilo=".$idSilo."&idHistorico=".$idHistorico."'\">
                                                Alterar Safra
                                            </button>
                                    </tr>
                                </tbody>";
                            }

                        }
                            

                        
                    ?>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- fechamento -->
<?php
    $layout->Footer();
    $layout->FechaContent();
    $layout->FechaWrapper();
    $layout->Scripts();
    $layout->FechaBody();
    $layout->FechaPag();
?>
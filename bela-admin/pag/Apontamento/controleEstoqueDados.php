<!-- Abertura -->
<?php
    include '../ClassPHP/Layout.php';
    $layout = new Layout();
    $layout->CabecalhoApontamentos();
    $layout->AbreBody();
    $layout->Load();
    $layout->AbreWrapper();
    $layout->TopBarCadastros();
    $layout->AbreContent();
?>
<!-- Conteúdo -->
<div class="row">
    <link rel="stylesheet" href="css/controleEstoqueDados.css"></link>
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
                            <th>Quantidade</th>
                            <th>Umidade</th>
                            <th>Safra</th>
                            <th>Produto</th>
                            <th></th>
                        </tr>
                    </thead>
                    <?php
                        include '../ClassPHP/dateParse.php';
                        $dt = new DateConverter();
                        $_REQUEST['web'] = true;
                        include '../ClassPHP/controleEstoque.php';
                        $ClasseEstoque = new ControleEstoque();

                        if($_SESSION['tipo'] == 'Gerente' || $_SESSION['tipo'] == 'Coordenador' || $_SESSION['tipo'] == 'Analista' || $_SESSION['tipo'] == 'Moderador')
                        {
                            $unidades = $ClasseEstoque->buscarControleEstoque();
                        }
                        else 
                        {
                            include '../ClassPHP/Usuario.php';
                            global $logado;
                            $usuario = new Usuario();
                            $u = $usuario->buscarUsuarioUnidade($logado);
                            $idUnidade = $u->idUnidade;
                            $unidades = $ClasseEstoque->buscarControleEstoqueUnidade($idUnidade);
                        }
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
                            $produto           = $unidade->produto;
                            $dataIn          = $dt->getDateFromDate($unidade->dataIn);

                            if($unidade->status == 0 || $unidade->dataFim != null || $unidade->status == null)
                            {
                                echo "<tbody>
                                    <tr>
                                        <td>$Unidade</td>
                                        <td>$Armazem</td>
                                        <td>0/$total ton</td>
                                        <td>0%</td>
                                        <td>Não há</td>   
                                        <td>Não há</td>   
                                        <td>
                                            <button type='button' id='btnAct' class='btn btn-round btn-success'  onclick=\"location.href='controleProduto.php?acao=iniciar&idHistorico=".$idHistorico."&idSilo=".$idSilo."'\">
                                                Iniciar Safra
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>";
                            }
                            else if($unidade->status == 1)
                            {
                                if($padrao == null && $quantidade == null)
                                {
                                    echo "<tbody>
                                        <tr>
                                            <td>$Unidade</td>
                                            <td>$Armazem</td>
                                            <td>0/$total ton</td>
                                            <td>0%</td>
                                            <td>$safra</td>
                                            <td>$produto</td>
                                            <td>
                                                <button type='button' id='btnAct' class='btn btn-round btn-info' onclick=\"location.href='controleEstoque.php?idSilo=".$idSilo."&idEstoque=".$idEstoque."'\">
                                                    Entrada/Saida
                                                </button>
                                                <button type='button' id='btnAct' class='btn btn-round btn-alert' onclick=\"location.href='controleProduto.php?acao=finalizar&idHistorico=".$idHistorico."&idSilo=".$idSilo."'\">
                                                    Encerrar Safra
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>";
                                }
                                else if($quantidade == 0)
                                {
                                    echo "<tbody>
                                        <tr>
                                            <td>$Unidade</td>
                                            <td>$Armazem</td>
                                            <td>0/$total ton</td>
                                            <td>0%</td>
                                            <td>$safra</td>
                                            <td>$produto</td>
                                            <td>
                                                <button type='button' id='btnAct' class='btn btn-round btn-info'  onclick=\"location.href='controleEstoque.php?idSilo=".$idSilo."&idEstoque=".$idEstoque."'\">
                                                    Entrada/Saida
                                                </button>
                                                <button type='button' id='btnAct' class='btn btn-round btn-alert'  onclick=\"location.href='controleProduto.php?acao=finalizar&idHistorico=".$idHistorico."&idSilo=".$idSilo."'\">
                                                    Encerrar Safra
                                                </button>
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
                                            <td>$quantidade/$total ton</td>
                                            <td>".round($padrao, 1)."%</td>
                                            <td>$safra</td>
                                            <td>$produto</td>
                                            <td>
                                                <button type='button' id='btnAct' class='btn btn-round btn-info' onclick=\"location.href='controleEstoque.php?idSilo=".$idSilo."&idEstoque=".$idEstoque."'\">
                                                    Entrada/Saida
                                                </button>
                                                <button type='button' id='btnAct' class='btn btn-round btn-success' onclick=\"location.href='transilagem.php?idSilo=".$idSilo."&idEstoque=".$idEstoque."'\">
                                                    Transilagem
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>";
                                }
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
    $layout->ScriptsCadastros();
    $layout->FechaBody();
    $layout->FechaPag();
?>
<!-- Abertura -->
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
<div class="container-fluid">
    <?php
        $layout->titulo("Unidade");
        include 'ClassPHP/Unidade.php';
        $ClasseUnidade  = new Unidade();
        $pidUnidade     = $_POST['cb_Unidade'];
        $unidades       = $ClasseUnidade->buscarUnidadeUnica($pidUnidade);
        $Cidade     =$unidades->cidade;
        $Estado     =$unidades->estado;
        $link       =$unidades->link;
        /*<button type="button" class="btn btn-success"  onclick=\'location.href="filtro.php?id='.$pidUnidade.'&tipo=Unidade"\'">Relatório</button>*/
        echo'<div class="col-lg-12 col-sm-4">
            <div class="panel panel-inverse">
                <div class="panel-heading">'.$Cidade.'-'.$Estado.'&nbsp &nbsp
                    <div class="pull-right">
                        <a data-perform="panel-collapse">
                            <i class="ti-plus"></i>
                        </a> 
                        <a data-perform="panel-dismiss">
                            <i class="ti-close"></i>
                        </a> 
                    </div>
                </div>
                <div class="panel-wrapper collapse in" aria-expanded="true">
                    <div class="panel-body">
                        <table id="" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Silo</th>
                                    <th>Tipo</th>
                                    <th>Produto</th>
                                    <th>Lider</th>
                                    <th></th>
                                </tr>
                            </thead>';
                            $dados_unidades = $ClasseUnidade->buscarDadosUnidade($pidUnidade);
                            foreach ($dados_unidades as $dados_unidade) 
                            {
                                $Silo           =$dados_unidade->silo;
                                $nome           =$dados_unidade->nome;
                                $Produto        =$dados_unidade->produto;
                                $Lider          =$dados_unidade->lider;
                                $idSilo         =$dados_unidade->idSilo;
                                $idTipo_Usuario =$dados_unidade->idTipo_Usuario;
                                echo'<tbody>
                                <td>'.$Silo.'</td>
                                <td>'.$nome.'</td>
                                <td>'.$Produto.'</td>
                                <td>'.$Lider.'</td>
                                <td>
                                    <button type="button" class="btn btn-success" style="float: right" onclick=\'location.href="filtro.php?id='.$idSilo.'&tipo=Silo"\'">Relatório</button>
                                    
                                </td>
                                </tbody>';
                            }
                        echo'</table>    
                    </div>
                </div>
            </div>
        </div>';
    ?>
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
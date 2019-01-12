<!-- Abertura -->
<?php
    include 'ClassPHP/Layout.php';
    $layout = new Layout();
    $layout->Cabecalho();
    $layout->AbreBody();
    $layout->Load();
    $layout->AbreWrapper();
    $layout->TopBar();
    $layout->LeftBar();
    $layout->AbreContent();
?>
<!-- Conteudo -->
<div class="container-fluid">
	<?php
	    $layout->titulo("Dashboard");
        include 'ClassPHP/Unidade.php';
        $ClasseUnidade = new Unidade();
        $unidades = $ClasseUnidade->buscarUnidadesAnalise();
        foreach ($unidades as $unidade)
        {
            $Silo       =$unidade->silo;
            $Produto    =$unidade->produto;
            $Lider      =$unidade->lider;
            $Cidade     =$unidade->cidade;
            $Estado     =$unidade->estado;
            $idUnidade  =$unidade->idUnidade;
            $idSilo  =$unidade->idSilo;
            echo'<div class="col-lg-12 col-sm-4">
                    <div class="panel panel-inverse">
                        <div class="panel-heading">'.$Cidade.'-'.$Estado.'
                            <small>
                                <a href="http://www.belagricola.com.br/nossa-empresa/area-de-atuacao/insumos/'.$Cidade.'-'.$Estado.'">
                                    &nbsp; ver &nbsp; 
                                </a>
                            </small>
                            <button type="button" class="btn btn-success" style="float: right" onclick=\'location.href="Relatorio.php?idSilo='.$idSilo.'"\'">
                                Relatório
                            </button>
                            <button type="button" class="btn btn-success" style="float: right" onclick=\'location.href="Relatorio.php?idSilo='.$idSilo.'"\'">
                                <i class="fa fa-bar-chart-o fa-fw" aria-hidden="true"></i>Monitorar
                            </button>
                            <div class="pull-right">
                                <a href="#" data-perform="panel-collapse">
                                    <i class="ti-plus"></i>
                                </a> 
                                <a href="#" data-perform="panel-dismiss">
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
                                            <th>Produto</th>
                                            <th>Lider</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <td>'.$Silo.'</td>
                                        <td>'.$Produto.'</td>
                                        <td>'.$Lider.'</td>
                                        <td>
                                            <button type="button" class="btn btn-success" style="float: right" onclick=\'location.href="Relatorio.php?idSilo='.$idSilo.'"\'">Relatório</button>
                                            <div>
                                                <button type="button" class="btn btn-round btn-info" style="float: right" onclick=\'location.href="monitorar.php?idSilo='.$idSilo.'"\'">
                                                <i class="fa fa-bar-chart-o fa-fw" aria-hidden="true"></i>Monitorar
                                                </button>
                                            </div>
                                        </td>
                                    </tbody>
                                </table>    
                            </div>
                        </div>
                    </div>
                </div>';
        }
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
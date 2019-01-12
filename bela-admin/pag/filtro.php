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
<script src="js/filtro.js"></script>
<div class="container-fluid">
    <?php
        $layout->titulo("Filtro");
        $tipo =$_REQUEST['tipo'];
        $id   =$_REQUEST['id'];
    ?>
    <div class="row">
        <?php  
            if($tipo == "Unidade")
            {
                echo'<form class="white-box" action="relatorioUnidade.php?idUnidade='.$id.'" method="POST" onsubmit="return verifica()">';
            }
            else
            {
                echo'<form class="white-box" action="relatorio.php?idSilo='.$id.'" method="POST" onsubmit="return verifica()">';            
            }
        ?>
        <div class="row">
            <label class="col-sm-12" id="foo" href="#" >Selecione o período do relatório</label>
            <div class="col-sm-12">
                <select name="cb_periodo" id="cb_periodo" class="form-control" onchange="carregaSelect()"> 
                    <option> Selecione o Periodo</option>
                    <option value="Diario">Diario</option>
                    <option value="Mensal">Mensal</option>
                    <option value="Anual">Anual</option>
                    <option value="Safra">Safra</option>
                </select> 
                <p></p>
                <p></p>
            </div>
            <div class="clearfix"></div> 
            <div class="col-sm-12" id="divInputPeriodo">
            </div>
        </div>
        <div class="row">       
            <div id="divSemestre" style="display : none" class="col-sm-12">
                <label class="col-sm-12" id="foo" href="#" >Selecione o período do semestre</label>
                <div class="col-sm-12" >
                    <select name="semestre" id="semestre" class="form-control" onchange="carregaSelect()"> 
                        <option> Selecione o Periodo</option>
                        <option value="1">Janeiro-Junho</option>
                        <option value="2">Julho-Dezembro</option>
                    </select>
                </div> 
            </div>
        </div>
        <div class="row">       
            <div id="divSafra" style="display : none" class="col-sm-12">
                <label class="col-sm-12" id="foo" href="#" >Selecione a safra </label>
                <div class="col-sm-12" >
                    <select name="cb_safra" id="cb_safra" class="form-control" onchange="tipoSafra()" > 
                        <option>Selecione a Safra</option>
                        <?php
                            include 'ClassPHP/safra.php';
                            $ClasseSafra = new Safra();
                            $safras       =$ClasseSafra->buscarSafras($id);
                            foreach ($safras as $safra) 
                            {
                                
                                if($safra->statusTroca == 1)
                                {
                                    $alteraSafra =$ClasseSafra->buscarTrocaSafras($safra->idHistorico);
                                    echo'<option   value="u'.$safra->idHistorico.'">'.$safra->nomeSafra.'</option>';
                                    echo'<option value="d'.$alteraSafra->idregistro_troca_safra.'">'.$alteraSafra->nomeSafra.'</option>';
                                }
                                else if($safra->statusTroca == 0)
                                {
                                    echo'<option   value="u'.$safra->idHistorico.'">'.$safra->nomeSafra.'</option>';
                                }
                                
                            }
                        ?>
                    </select>
                </div> 
            </div>
        </div>
           <input style="display : none" type="text" id="inSafra" name="inSafra"> 
               
            <input type="submit"  value="Gerar Relatório" class="btn btn-round btn-default" style="float: right"> 
        </form>
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
<!-- Abertura -->
<?php
    include 'ClassPHP/Layout.php';
    $layout = new Layout();
    $layout->CabecalhoIndexLider();
    $layout->AbreBody();
    $layout->Load();
    $layout->AbreWrapper();
    $layout->TopBar();
    $layout->AbreContent();
    global $logado;
?>
<!-- Conteúdo -->
<div class="container-fluid">
    <?php
        $layout->titulo("Seleção de Unidade");
    ?>
    <script src="js/indexLider.js"></script>
    <div class="x_panel">
        <div class="x_title">
            <h2>Unidade:   
                <small>Selecione a unidade</small>
            </h2>
            <div class="clearfix"></div>
        </div>
        <form method="POST" action="informacoesUnidade.php" onsubmit="return verifica()">
            <div class="x_content">
                <div class="form-group">
                    <div class="col-sm-12">
                        <select name="cb_Unidade" id="cb_Unidade" class="form-control"> 
                            <option selected disabled> Selecione a Unidade</option>
                            <?php
                                $layout->titulo("Dashboard");
                                include 'ClassPHP/Unidade.php';
                                $ClasseUnidade = new Unidade();
                                $unidades = $ClasseUnidade->buscarUnidadeLider($logado);
                                foreach ($unidades as $unidade)
                                {
                                    $id   = $unidade->idUnidade;
                                    $nome = $unidade->nome;
                                    echo'<option value="'.$id.'">'.$nome.'</option>';
                                }
                            ?>
                        </select> 
                        <p></p>
                        <p></p>
                    </div>
                    <div class="clearfix"></div>   
                </div>
                <input type="submit"  value="Selecionar" class="btn btn-round btn-success"  style="float: right">
            </div>
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
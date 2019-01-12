<!-- Abertura -->
<?php
    include '../ClassPHP/Layout.php';
    $layout = new Layout();
    $layout->CabecalhoCadastros();
    $layout->AbreBody();
    $layout->Load();
    $layout->AbreWrapper();
    $layout->TopBarCadastros();
    $layout->AbreContent();
    include '../ClassPHP/Unidade.php';
    $unidade = new Unidade();
    $unidades = $unidade->buscarUnidade();
?>
<!-- Conteúdo -->
<div class="container-fluid">
    <?php
        $layout->titulo("Inserir Armazenagem");
    ?>
    <script src="js/cadastroArmazenagemNovo.js"></script>
    <div class="row">
        <div class="white-box">
            <form class="form-horizontal form-material" onsubmit="return verifica()" method="POST" action="../../../webservice.php?web=true&acao=InserirArmazenagem">
                <div class="row">
                    <label class="col-md-2">Nome</label>
                    <div class="col-md-3">
                        <input type="text" placeholder="Insira o nome" value="" id="nome" class="form-control form-control-line" name="nome">
                    </div>
                    <h3 class="col-md-1 text-center">|</h3>
                    <label class="col-md-3">Capacidade</label>
                    <div class="col-md-3">
                        <input type="number" min="0" placeholder="Insira a capacidade em toneladas" value="" id="capacidade" class="form-control form-control-line" name="capacidade">   
                    </div>
                </div>
                <div class="row">
                    <label class="col-md-2">Unidade</label>
                    <div class="col-md-3">
                        <?php
                            echo "<select class='form-control form-control-line' name='unidade' id='unidade'>
                                <option value='' disabled selected>Selecione a unidade</option>";
                                foreach ($unidades as $unidade) 
                                {
                                    $id = $unidade->idUnidade;
                                    $nome = $unidade->nome;
                                    echo "<option value='$id'>$nome</option>";
                                }
                            echo "</select>"; 
                        ?> 
                    </div>
                    <h3 class="col-md-1 text-center">|</h3>
                    <label class="col-md-3">Tipo do Armazém</label>
                    <div class="col-md-3">
                        <select class="form-control form-control-line" id="tipo" name="tipo" onchange="filtraSilo()">
                            <option value="" disabled selected>Selecione o tipo</option>
                            <option value='1'>Silo Armazenador</option>
                            <option value='2'>Silo Pulmão</option>
                            <option value='3'>Moega</option>
                            <option value='4'>Secador</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div id="divCabo">
                        <label class="col-md-2">Número de cabos no silo</label>
                        <div class="col-md-3">
                            <input type="number" value="" min="0" max="50" placeholder="Insira o número de cabos" id="numCabos" class="form-control form-control-line" name="numCabos">   
                        </div>
                        <h3 class="col-md-1 text-center">|</h3>
                    </div>
                    <div class="col-sm-3">
                        <button class="btn btn-success" type="submit" value="Submit">Salvar</button>
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
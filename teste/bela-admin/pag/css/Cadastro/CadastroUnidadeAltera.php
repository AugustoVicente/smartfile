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
?>
<!-- Conteúdo -->
<div class="container-fluid">
    <?php
        include '../ClassPHP/Unidade.php';
        $layout->titulo("Editar Unidade");
        $idUnidade = $_REQUEST['idUnidade'];
        $Unidade = new Unidade();
        $un = $Unidade->buscarUnidade($idUnidade);
        $nome=$un->nome;
        $estado =$un->estado;
        $telefone1 =$un->tel1;
        $telefone2 =$un->tel2;
        $cep =$un->cep;
        $cidade =$un->cidade;
    ?>
    <div class="row">
        <div class="white-box">
            <?php
                echo'<form class="form-horizontal form-material" method="POST" action="../../../webservice.php?web=true&acao=AlterarUnidade&idUnidade='.$idUnidade.'">';
            ?>
                <div class="row">
                    <label class="col-md-2">Nome</label>
                    <div class="col-md-3">
                        <?php
                            echo'<input type="text" placeholder="Insira o nome"  value="'.$nome.'" class="form-control form-control-line" name="nome">';
                        ?>
                    </div>
                    <h3 class="col-md-1 text-center">|</h3>
                    <label class="col-md-3">Estado</label>
                    <div class="col-md-3">
                        <?php 
                            echo'<input type="text" placeholder="Insira o UF" value="'.$estado.'" class="form-control form-control-line" name="estado">';
                        ?> 
                    </div>
                </div>
                <div class="row">
                    <label class="col-md-2">Telefone</label>
                    <div class="col-md-3">
                        <?php                                                 
                            echo'<input type="text" placeholder="Insira o telefone" value="'.$telefone1.'" class="form-control form-control-line" name="telefone1">';
                        ?>
                    </div>
                    <h3 class="col-md-1 text-center">|</h3>
                    <label class="col-md-3">Telefone 2</label>
                    <div class="col-md-3">
                        <?php  
                            echo'<input type="text" placeholder="Insira o telefone" value="'.$telefone2.'" class="form-control form-control-line" name="telefone2">';
                        ?>
                    </div>
                </div>
                <div class="row">
                    <label class="col-md-2">CEP</label>
                    <div class="col-md-3">
                        <?php  
                            echo'<input type="text" placeholder="Insira o CEP"  maxlength="8" value="'.$cep.'" class="form-control form-control-line" name="cep">';  
                        ?>
                    </div>
                    <h3 class="col-md-1 text-center">|</h3>
                    <label class="col-md-3">Cidade</label>
                    <div class="col-md-3">
                        <?php  
                            echo'<input type="text" placeholder="Insira a cidade" value="'.$cidade.'" class="form-control form-control-line" name="cidade">';
                        ?>
                    </div>
                </div>
                <div class="col-sm-3">
                    <button class="btn btn-success " type="submit"  value="Submit">Salvar</button>
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
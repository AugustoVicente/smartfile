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
        $layout->titulo("Apontamentos");
        $idArmazem = $_REQUEST['idArmazem'];
        $tipo = $_REQUEST['tipo'];
        include '../ClassPHP/Armazenagem.php';
        $Armazenagem = new Armazenagem();
        $un = $Armazenagem->buscarArmazenagem($idArmazem,$tipo);
        $nome=$un->nome;
        $capacidade =$un->capacidade;
        $unidade =$un->nomeUnidade;
    ?>
    <div class="row">
        <div class="white-box">
            <?php
                echo'<form class="form-horizontal form-material" method="POST" action="../../../webservice.php?web=true&acao=AlterarArmazenagem&id='.$idArmazem.'&tipo='.$tipo.'">';
            ?>
                <div class="row">
                    <label class="col-md-2">Nome</label>
                    <div class="col-md-3">
                        <?php
                            echo'<input type="text" placeholder="Insira o nome"  value="'.$nome.'" class="form-control form-control-line" name="nome">';
                        ?>
                    </div>
                    <h3 class="col-md-1 text-center">|</h3>
                    <label class="col-md-3">Capacidade</label>
                    <div class="col-md-3">
                        <?php
                            echo'<input type="text" placeholder="Insira a capacidade" value="'.$capacidade.'" class="form-control form-control-line" name="capacidade">';   
                        ?>
                    </div>
                </div>
                <div class="row">
                    <label class="col-md-2">Unidade</label>
                    <div class="col-md-3">
                        <?php
                            $_REQUEST['web'] = true; 
                            $_REQUEST['acao'] = "buscarUnidades";
                            include '../../../webservice.php';
                            echo "<select class='form-control form-control-line' name='unidade' >";
                            foreach ($unidades as $unidade) 
                            {
                                $id = $unidade->idUnidade;
                                $nome = $unidade->nome;
                                if($nome == $unidade)
                                {
                                    echo "<option selected value='$id'>$nome</option>";
                                }
                                else
                                {
                                    echo "<option value='$id'>$nome</option>";    
                                }
                            }
                            echo "</select>"; 
                        ?> 
                    </div>
                    <h3 class="col-md-1 text-center">|</h3>
                    <label class="col-md-3">Tipo Armazem</label>
                    <div class="col-md-3">
                        <select class="form-control form-control-line" disabled name="tipo">
                            <?php
                            if($tipo === "Silo")
                            {
                                echo'<option selected value="Silo">Silo </option>
                                <option value="Silo_Pulmao">Silo Pulmão</option>
                                <option value="Moega">Moega</option>
                                <option value="Secador">Secador</option>';
                            }
                            else if($tipo === "pulmao" )
                            {
                                echo'<option value="Silo">Silo </option>
                                <option selected value="Silo_Pulmao">Silo Pulmão</option>
                                <option value="Moega">Moega</option>
                                <option value="Secador">Secador</option>';
                            }
                            else if($tipo ==="secador" )
                            {
                                echo'<option value="Silo">Silo </option>
                                <option  value="Silo_Pulmao">Silo Pulmão</option>
                                <option value="Moega">Moega</option>
                                <option selected value="Secador">Secador</option>';
                            }
                            else if($tipo ==="Moega" )
                            {
                                echo'<option value="Silo">Silo </option>
                                <option value="Silo_Pulmao">Silo Pulmão</option>
                                <option selected value="Moega">Moega</option>
                                <option value="Secador">Secador</option>';
                            }
                            ?>
                        </select>
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
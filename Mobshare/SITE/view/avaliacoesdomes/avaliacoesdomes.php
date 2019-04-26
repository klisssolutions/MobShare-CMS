<?php

@session_start();
@$_SESSION["importInclude"] = $_SERVER["DOCUMENT_ROOT"] . "/Mobshare/include.php";
require_once($_SESSION["importInclude"]); 

require_once(IMPORT_VEICULO);
require_once(IMPORT_VEICULO_CONTROLLER);

require_once(IMPORT_FOTO_VEICULO_CONTROLLER);
require_once(IMPORT_FOTO_VEICULO);

require_once(IMPORT_MODELO_CONTROLLER);
require_once(IMPORT_MODELO);

require_once(IMPORT_MARCA_CONTROLLER);
require_once(IMPORT_MARCA);

require_once(IMPORT_AVALIACAO_VEICULO_CONTROLLER);
require_once(IMPORT_AVALIACAO_VEICULO);

require_once(IMPORT_AVALIACAO_CONTROLLER);
require_once(IMPORT_AVALIACAO);

$controllerVeiculo = new controllerVeiculo();
$controllerFoto_veiculo = new controllerFoto_Veiculo();
$controllerMarca = new controllerMarca();
$controllerModelo = new controllerModelo();
$controllerAvaliacaoVeiculo = new controllerAvaliacaoVeiculo();
$controllerAvaliacao = new controllerAvaliacao();


$veiculos[] = new Veiculo();
$marcas[] = new Marca();
$modelos[] = new Modelo();
$avaliacaoVeiculos[] = new AvaliacaoVeiculo();
$avaliacao[] = new Avaliacao();


$marcas = $controllerMarca->listarMarcas();
$veiculos = $controllerVeiculo->listarVeiculos();
$modelos = $controllerModelo->listarModelos();
$avaliacaoVeiculos = $controllerAvaliacaoVeiculo->listarAvaliacaoVeiculos();
$avaliacao = $controllerAvaliacao->listarAvaliacao();

?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="shortcut icon" href="../images/anuncios.png" />
    <title>Avaliações | Mob'Share</title>
</head>
<body>
    <!-- HEADER DO MENU-->
    <?php require_once(HEADER);?>
    <!-- CAIXA QUE SEGURA O CONTEÚDO EMBAIXO DO MENU -->
    <section class="content">
        <div class="box-avaliacoes">
            <div class="avaliacoes">
                <div class="titulo-av">
                    <h1>Melhores do mês!</h1>
                </div>
                <div class="box-avaliacao">
                    <div class="caixa-avaliacao">
                        <!-- INICIO BOX -->
                        <?php
                            if($avaliacaoVeiculos != null){
                                $i = 0;

                                while($i < count($avaliacaoVeiculos)){
                                    $foto_veiculo = new Foto_Veiculo();
                                    $marca = new Marca();
                                    $modelo = new Modelo();
                                    $avaliacaoVeiculo = new AvaliacaoVeiculo();
                                    $avaliacao = new Avaliacao();

                                    $foto_veiculo = $controllerFoto_veiculo->listarFotoFrontal($avaliacaoVeiculos[$i]->getIdVeiculo());
                                    $avaliacaoVeiculo = $controllerAvaliacaoVeiculo->pegarAvaliacaoPorVeiculo($avaliacaoVeiculos[$i]->getIdVeiculo());

                                    if($avaliacaoVeiculo->getNota()== 4 || $avaliacaoVeiculo->getNota()== 5){
                            
                                

                                                    
                        ?>
                        <div class="box-av">
                            <div class="img-avaliacao">
                                <img src="<?php echo("/Mobshare/arquivos/".$foto_veiculo->getFotoVeiculo()) ?>" width="400" height="230" alt="<?php echo($modelo->getNomeModelo()) ?>">
                            </div>
                            <div class="titulo-veiculo">
                                <h2>  <?php echo($avaliacaoVeiculo->getNomeModelo()) ?></h2>
                            </div>
                            <div class="texto-av">
                              <h2>Marca: <?php echo($avaliacaoVeiculo->getNomeMarca()) ?> </h2>
                            </div>
                            <div class="texto-av">
                                <h2>Região: Capital</h2>
                            </div>
                            <div class="texto-av">
                            <?php 
                                if($avaliacaoVeiculo->getNota() == 1){
                            ?>
                                <h2> <img src="../images/1estrela.png" width="160" height="30"  alt="MobShare"><h2>
                            <?php 
                                }
                                else if($avaliacaoVeiculo->getNota() == 2){
                            ?>
                                <h2> <img src="../images/2estrelas.png" width="160" height="30"  alt="MobShare"><h2>
                            <?php 
                                }
                                else if($avaliacaoVeiculo->getNota() == 3){
                            ?>
                                <h2> <img src="../images/3estrelas.png" width="160" height="30"  alt="MobShare"><h2>
                            <?php 
                                }
                                else if($avaliacaoVeiculo->getNota() == 4){ 
                            ?>
                                <h2> <img src="../images/4estrelas.png" width="160" height="30"  alt="MobShare"><h2>
                            <?php }
                                else if($avaliacaoVeiculo->getNota() == 5){ 
                            ?>
                                 <h2> <img src="../images/5estrelas.png" width="160" height="30"  alt="MobShare"><h2>
                                <?php } ?>

                            </div>
                            <div class="botao-avaliacao">
                                <button class="btn-av">Ver mais</button>
                            </div>
                        </div>
                        <!-- FINAL BOX-->
                        <?php
                                $i++;
                                    }
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>

        </div>

    </section>
    <!-- RODAPÉ-->
    <?php require_once(FOOTER);?>

</body>

</html>
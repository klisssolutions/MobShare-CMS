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

$controllerVeiculo = new controllerVeiculo();
$controllerFoto_veiculo = new controllerFoto_Veiculo();
$controllerMarca = new controllerMarca();
$controllerModelo = new controllerModelo();



$veiculos[] = new Veiculo();
$marcas[] = new Marca();
$modelos[] = new Modelo();


$marcas = $controllerMarca->listarMarcas();
$veiculos = $controllerVeiculo->listarVeiculos();
$modelos = $controllerModelo->listarModelos();

if(isset($_GET["btnFiltro"])){
    if($_GET["btnFiltro"]){
        $veiculos = $controllerVeiculo->filtrarVeiculos();
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="shortcut icon" href="images/anuncios.png" />
    <title>Veículos | Mob'Share</title>

</head>
<body>
    <!-- HEADER DO MENU-->
    <?php require_once(HEADER);?>
    <!-- CAIXA QUE SEGURA O CONTEÚDO EMBAIXO DO MENU -->
    <div class="content">
        
        <div class="box-anuncios">
            <div class="box-pesquisa-anucios">
                <input type="text" class="anuncios-pesquisa" placeholder="Digite o que procura!"> 
            </div>
            <div class="box-anuncios-veiculos">



                <form action="anuncios.php" method="GET" id="formFiltroVeiculos">
                    <div class="box-filtros">
                        <div class="filtros">
                            <h1>Marca:</h1>
                            <select class="select" name="cbMarca">
                            <option value="0">Selecione</option>
                                <?php
                                    foreach($marcas as $marca){
                                        
                                    
                                ?>
                                <option value="<?php echo($marca->getIdMarca())?>"><?php echo($marca->getNomeMarca())?></option>  
                                <?php
                                    }
                                ?>                          
                            </select>
                        </div>
                        <div class="filtros">
                            <h1>Modelo:</h1>
                            <select class="select" name="cbModelo">
                                <option value="0">Selecione</option>
                                <?php
                                    foreach($modelos as $modelo){
                                        
                                    
                                ?>
                                <option value="<?php echo($modelo->getIdModelo())?>"><?php echo($modelo->getNomeModelo())?></option>  
                                <?php
                                    }
                                ?> 
                            </select>
    
                        </div>
                        <div class="filtros">
                            <h1>Cor:</h1>
                            <select class="select" name="cbCor">
                                <option>Fiat</option>
                                <option>BMW</option>
                                <option>Chevrolet</option>
                            </select>
                        </div>
                        <div class="filtros">
                            <h1>KM:</h1>
                            <select class="select" name="cbKM">                                
                                <option value="padrao">Selecione</option>
                                <option value="0">0 KM</option>
                                <option value="10000">Abaixo de 10.000 KM</option>
                                <option value="50000">Abaixo de 50.000 KM</option>
                                <option value="100000">Abaixo de 100.000 KM</option>
                                <option value="400000">Abaixo de 400.000 KM</option>
                                <option value="500000">Acima de 500.000 KM</option>
                            </select>
                        </div>
                        <div class="filtros">
                            <h1>Região:</h1>
                            <select class="select" name="cbRegiao">
                                <option>Fiat</option>
                                <option>BMW</option>
                                <option>Chevrolet</option>
                            </select>
                        </div>
                        <div class="filtros" name="cbAvaliacao">
                            <h1>Avaliação:</h1>
                            <select class="select" name="cbAvaliacao">
                                <option value="#">Selecione</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                        <!-- <div class="botao-filtrar">
                            Filtrar
                        </div> -->
                        <input type="submit" class="botao-filtrar" value="Filtrar" name="btnFiltro">
                    </div>

                </form>




                <div class="box-veiculos">
                    <?php
                        //foreach($veiculos as $veiculo){
                        if($veiculos != null){

                        
                            $i = 0;
                            while($i < count($veiculos)){

                                $foto_veiculo = new Foto_Veiculo();
                                $marca = new Marca();
                                $modelo = new Modelo();


                                $modelo = $controllerModelo->buscarModelo($veiculos[$i]->getIdModelo());
                                //$marca = $controllerMarca->buscarMarca();
                                $foto_veiculo = $controllerFoto_veiculo->listarFotoFrontal($veiculos[$i]->getIdVeiculo());

                        
                    ?>
                    <div class="box-veiculo-anuncio">
                        <div class="imagem-anuncio">
                                <img src="<?php echo("/Mobshare/arquivos/".$foto_veiculo->getFotoVeiculo()) ?>" width="400" height="225" alt="veiculo">
                                
                        </div>
                         <div class="texto-modelo">
                             <?php echo($modelo->getNomeModelo()) ?>
                        </div>
                         <div class="texto-km">
                             <?php echo($veiculos[$i]->getQuilometragem()." km") ?>
                        </div>
                        <div class="texto-regiao">
                        Capital
                        </div>
                        <div class="texto-avaliacao">
                        *****
                        </div>
                        <div class="botao-veja">
                            Alugar
                        </div>
                    </div>

                    <?php
                                $i++;
                            }
                        }

                    ?>

                </div>
            </div>

        </div>

    </div>
    <!-- RODAPÉ-->
    <?php require_once(FOOTER);?>

</body>

</html>
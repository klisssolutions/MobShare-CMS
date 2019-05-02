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

require_once(IMPORT_BANNER_CONTROLLER);
require_once(IMPORT_BANNER);

$controllerVeiculo = new controllerVeiculo();
$controllerFoto_veiculo = new controllerFoto_Veiculo();
$controllerMarca = new controllerMarca();
$controllerModelo = new controllerModelo();
$controllerBanner = new controllerBanner();

$veiculos[] = new Veiculo();

$banners[] = new Banner();

$banners = $controllerBanner->listarBanners();
$veiculos = $controllerVeiculo->listarVeiculos();

?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="shortcut icon" href="images/anuncios.png" />
    <title>Home | Mob'Share</title>
</head>

<body>
    <!-- HEADER DO MENU-->
    <?php require_once(HEADER);?>
    <!-- CAIXA QUE SEGURA O CONTEÚDO EMBAIXO DO MENU -->
    <div class="content">
        <div class="caixa-pesquisa-imagem">
            <input type="text" class="caixa-pesquisa-home">
        </div>
        <div class="caixa-veiculos-home">
            <div class="caixa-itens-home">
                <nav class="menu-veiculos">
                    <a class="clicado">Em Destaque</a>
                </nav>
            </div>
            <div class="caixa-veiculos">
                <?php
                $i= 0;
                 while($i < count($veiculos)){

                    $foto_veiculo = new Foto_Veiculo();
                    $marca = new Marca();
                    $modelo = new Modelo();


                    $modelo = $controllerModelo->buscarModelos($veiculos[$i]->getIdModelo());
                    //$marca = $controllerMarca->buscarMarca();
                    $foto_veiculo = $controllerFoto_veiculo->listarFotoFrontal($veiculos[$i]->getIdVeiculo());
                      
            ?>


                <!-- caixa onde fica a informaçao do veiculo -->
                <div class="box-veiculo">
                    <div class="img-veiculo">
                        <img src="<?php echo('/Mobshare/arquivos/'.$foto_veiculo->getFotoVeiculo()) ?>" width="320" height="225" alt="veiculo">
                    </div>
                    <div class="texto-modelo">

                    </div>
                    <div class="texto-km">
                        <?php echo($veiculos[$i]->getQuilometragem())?>
                    </div>
                    <div class="texto-regiao">
                        Capital
                    </div>
                    <div class="texto-avaliacao">
                        *****
                    </div>
                    <div class="botao-veiculo">
                        Veja mais
                    </div>
                </div>

                <?php
                
                    $i++;

                }

                ?>

            </div>
           
                <?php
            $i = 0;
            while($i < count($banners)){
                if($i%2){

        ?>
 <div class="caixa-como-funciona">

                <div class="texto-como-funciona">
                    <h1><?php echo($banners[$i]->getTitulo())?></h1>
                    <p><?php echo($banners[$i]->getTexto())?></p>
                    <a href="<?php echo($banners[$i]->getHref())?>">
                        <h2><?php echo($banners[$i]->getNomeBotao())?></h2>
                    </a>
                </div>
                <div class="img-como-funciona">

                    <img src="<?php echo('/Mobshare/arquivos/'.$banners[$i]->getImagem())?>" width="650" height="600" alt="App da MobShare">

                </div>
</div>

                <?php
                $i++;
            }else{
        ?>
      <div class="caixa-como-funciona">
                <div class="img-como-funciona">

                    <img src="<?php echo('/Mobshare/arquivos/'.$banners[$i]->getImagem())?>" width="650" height="600" alt="App da MobShare">

                </div>
                <div class="texto-como-funciona">
                    <h1><?php echo($banners[$i]->getTitulo())?></h1>
                    <p><?php echo($banners[$i]->getTexto())?></p>
                    <a href="<?php echo($banners[$i]->getHref())?>">
                        <h2><?php echo($banners[$i]->getNomeBotao())?></h2>
                    </a>
                </div>
                
</div>
                
                <?php
                $i++;
            }
            }
        ?>
            
        </div>
    </div>

    <!-- RODAPÉ-->
    <?php require_once(FOOTER);?>

</body>

</html>

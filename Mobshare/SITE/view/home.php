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
    <header>
        <!-- onde fica o login-->
        <div class="logotipo">
            <div class="img-logotipo">
                    <a href="index.html"><img src="images/logo.png" width="364" height="150"  alt="MobShare"></a>
            </div>
        </div>
        <!-- menu de navegação do cabeçalho -->
        <div class="menu-header">
            <nav class="menu-item">
                <a href="anuncios/anuncios.php">Anuncios</a>
                <a href="comofunciona.html">Como funciona</a>
                <a href="avaliacoesdomes.html">Melhores do Mês</a>
            </nav>
        </div>
        <!-- caixa onde ficará o botão de login-->
        <div class="box-login">
            <div class="botao-login">
                   Login
            </div>
            <div class="texto-cadastrar">
                <h1>ou faça seu Cadastro!</h1>
            </div>
        </div>    
    </header>
    <!-- CAIXA QUE SEGURA O CONTEÚDO EMBAIXO DO MENU -->
    <div class="content">
        <div class="caixa-pesquisa-imagem">
            <input type="text" class="caixa-pesquisa-home" >
        </div>
        <div class="caixa-veiculos-home">
            <div class="caixa-itens-home">
                <nav class="menu-veiculos">
                    <a class="clicado">Em Destaque</a>
                </nav>
            </div>

            <?php
                $i= 0;
                 while($i < count($veiculos)){

                    $foto_veiculo = new Foto_Veiculo();
                    $marca = new Marca();
                    $modelo = new Modelo();


                    $modelo = $controllerModelo->buscarModelo($veiculos[$i]->getIdModelo());
                    //$marca = $controllerMarca->buscarMarca();
                    $foto_veiculo = $controllerFoto_veiculo->listarFotoFrontal($veiculos[$i]->getIdVeiculo());
                     
                 
            ?>

            <div class="caixa-veiculos">
                <!-- caixa onde fica a informaçao do veiculo -->
                <div class="box-veiculo">
                    <div class="img-veiculo">
                        <img src="<?php echo('/Mobshare/arquivos/'.$foto_veiculo->getFotoVeiculo()) ?>" width="400" height="225" alt="veiculo">
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

                
        ?>
        <div class="caixa-como-funciona">
            
            <div class="texto-como-funciona">
                    <h1><?php echo($banners[$i]->getTitulo())?></h1>
                    <p><?php echo($banners[$i]->getTexto())?></p>
                    <a href="<?php echo($banners[$i]->getHref())?>"><h2><?php echo($banners[$i]->getNomeBotao())?></h2></a>
            </div>
            <div class="img-como-funciona">
            
            
                    <img src="<?php echo('/Mobshare/'.$banners[$i]->getImagem())?>" width="650" height="600"  alt="App da MobShare">
                    
            </div>
        </div> 

        <?php
        
                $i++;
            }
        ?>
    </div>
    <!-- RODAPÉ-->
    <footer>
    <div class="rodape">
        <div class="menu-rodape">
            <!--PAGINAS DO RODAPÉ-->
            <div class="titulo-menu-rodape">
                <h1>Páginas:</h1>
            </div>
            <nav class="menu-rodape-item">
                    <a href="termosdeuso.html">Termos de Uso</a>
                    <a href="duvidasfreq.html">Duvidas Frequentes</a>
                    <a href="parceiros.html">Parceiros</a>
                    <a href="faleconosco.html">Fale Conosco</a>
            </nav>
        </div>
        <div class="logotipo-rodape">
            <!-- LOGOTIPO NO RODAPÉ-->
            <div class="img-logo-rodape">
                    <img src="images/logo.png" width="340" height="150"  alt="MobShare">
            </div>
            <!-- IMAGENS DAS REDES SOCIAIS-->
            <div class="img-redes-sociais">
                    <img src="images/facebook-logo-button (1).png" width="30" height="30" alt="icone de rede social">
                    <img src="images/google-plus-logo-button.png" width="30" height="30"  alt="icone de rede social">
                    <img src="images/instagram-logo (1).png" width="30" height="30" alt="icone de rede social">
                    <img src="images/twitter-logo-button (1).png" width="30" height="30" alt="icone de rede social">
                    <img src="images/linkedin-logo-button.png" width="30" height="30" alt="icone de rede social">
            </div>

        </div>
        <!-- LISTA DE INFORMAÇÕES PARA CONTATO-->
        <div class="contato-rodape">
                <div class="contato-menu-rodape">
                    <h1>Contato:</h1>
                </div>
                <nav class="contato-rodape-item">
                    <a>
                        <img src="images/map.png" width="20" height="20"  alt="icone de endereço">
                         Av Felippo Holt, 543 - São Paulo</a>
                    <a>
                        <img src="images/phone-call.png" width="20" height="20"  alt="icone de telefone">
                         (11) 5464-6757</a>
                    <a>
                        <img src="images/envelope.png" width="20" height="20"  alt="icone de email">
                         mobshare@gmail.com</a>
                </nav>
        </div>
    </div>
        <!-- TEXTO SOBRE OS DIREITOS AUTORAIS, NÃO MEXER NO CSS-->
        <div class="texto-direitos">
            <h1>© Todos os Direitos Resevados - 2019 | Desenvolvido por Kliss Solutions</h1>
        </div>

    </footer>

</body>

</html>
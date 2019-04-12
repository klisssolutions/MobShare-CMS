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




//var_dump($foto_veiculo);



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
                <a href="anuncios.html">Anuncios</a>
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
                        <input type="submit" value="Filtrar" name="btnFiltro">
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
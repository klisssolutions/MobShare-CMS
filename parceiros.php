<?php 

    @session_start();
    @$_SESSION["importInclude"] = $_SERVER["DOCUMENT_ROOT"] . "/Mobshare/CMS/include.php";
    require_once($_SESSION["importInclude"]); 
    require_once(IMPORT_PARCEIRO);
    require_once(IMPORT_PARCEIRO_CONTROLLER);

    $controllerParceiro = new controllerParceiro();

    $parceiros[] = new Parceiro();
    $parceiros = $controllerParceiro->listarParceiro();

?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="shortcut icon" href="../images/anuncios.png" />
    <script type="text/javascript" src="../js/jquery.js"></script>
    <script type="text/javascript" src="../js/slider.js"></script>
    <script type="text/javascript" src="../js/banner.js"></script>
    <title>Home | Mob'Share</title>
</head>
<body>
    <!-- HEADER DO MENU-->
    <header>
        <!-- onde fica o login-->
        <div class="logotipo">
            <div class="img-logotipo">
                    <a href="../index.html"><img src="../images/logo.png" width="364" height="150"  alt="MobShare"></a>
            </div>
        </div>
        <!-- menu de navegação do cabeçalho -->
        <div class="menu-header">
            <nav class="menu-item">
                <a href="../anuncios/anuncios.html">Anuncios</a>
                <a href="../comofunciona/comofunciona.php">Como funciona</a>
                <a href="../avaliacoesdomes/avaliacoesdomes.html">Melhores do Mês</a>
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
    <section class="content">
       <div class="box-parceiros">
            
            <div class="box-parceiro">
                <div class="slider-parceiros">
                <div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:0px;width:980px;height:380px;overflow:hidden;visibility:hidden;">
        <!-- Loading Screen -->
        <div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
            <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="../svg/loading/static-svg/spin.svg" />
        </div>
        <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:980px;height:380px;overflow:hidden;">
            <?php
                foreach($parceiros as $parceiro){ ?>    
                <div>
                    <img data-u="image" src="<?php echo("/Mobshare/arquivos/".$parceiro->getLogo()); ?>" />
                </div>
                <?php
                } ?>    
                
        </div>
        <!-- Bullet Navigator -->
        <div data-u="navigator" class="jssorb052" style="position:absolute;bottom:12px;right:12px;" data-autocenter="1" data-scale="0.5" data-scale-bottom="0.75">
            <div data-u="prototype" class="i" style="width:16px;height:16px;">
                <svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                    <circle class="b" cx="8000" cy="8000" r="5800"></circle>
                </svg>
            </div>
        </div>
        <!-- Arrow Navigator -->
        <div data-u="arrowleft" class="jssora053" style="width:55px;height:55px;top:0px;left:25px;" data-autocenter="2" data-scale="0.75" data-scale-left="0.75">
            <svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                <polyline class="a" points="11040,1920 4960,8000 11040,14080 "></polyline>
            </svg>
        </div>
        <div data-u="arrowright" class="jssora053" style="width:55px;height:55px;top:0px;right:25px;" data-autocenter="2" data-scale="0.75" data-scale-right="0.75">
            <svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                <polyline class="a" points="4960,1920 11040,8000 4960,14080 "></polyline>
            </svg>
        </div>
    </div>
                </div>
                <div class="txt-slider-parceiros">
                    <h1>Nossos Parceiros</h1>
                </div>
                
            </div>
             <?php
                    $cont = 0;
                    foreach($parceiros as $parceiro){
                        if($parceiro->getAtivo()){
                            if($cont%2){
            ?>
            <div class="box-parceiro">
           
                                    <div class="box-texto-imagem">
                                        <div class="img-parceiro">
                                            <img src="<?php echo("/Mobshare/arquivos/".$parceiro->getLogo());?>" width="471" height="277"  alt="App da MobShare">
                                        </div>
                                    </div>
                                    <div class="box-texto-imagem">
                                        <div class="txt-parceiro">
                                            <h1><?php echo($parceiro->getNome());?></h1>
                                            <p><?php echo($parceiro->getDescricao());?></p>
                                        </div>
                                    </div>
                                    <?php 
                                $cont++;
                            }else{
                        ?>
                                
                        
                                <div class="box-parceiro">
                                    <div class="box-texto-imagem">
                                        <div class="txt-parceiro">
                                            <h1><?php echo($parceiro->getNome());?></h1>
                                            <p><?php echo($parceiro->getDescricao());?></p>
                                        </div>
                                    </div>
                                    <div class="box-texto-imagem">
                                        <div class="img-parceiro">
                                            <img src="<?php echo("/Mobshare/arquivos/".$parceiro->getLogo());?>" width="471" height="277"  alt="App da MobShare">
                                        </div>
                                    </div>
                                </div>
                <?php
                                $cont++;   
                            }
                        }
                    }
                ?>
            </div>
       </div>
    </section>
    <!-- RODAPÉ-->
    <footer>
        <div class="rodape">
            <div class="menu-rodape">
                <!--PAGINAS DO RODAPÉ-->
                <div class="titulo-menu-rodape">
                    <h1>Páginas:</h1>
                </div>
                <nav class="menu-rodape-item">
                        <a href="../termosdeuso/termosdeuso.html">Termos de Uso</a>
                        <a href="../duvidasfreq/duvidasfreq.html">Duvidas Frequentes</a>
                        <a href="../parceiros/parceiros.html">Parceiros</a>
                        <a href="../faleconosco/faleconosco.html">Fale Conosco</a>
                </nav>
            </div>
            <div class="logotipo-rodape">
                <!-- LOGOTIPO NO RODAPÉ-->
                <div class="img-logo-rodape">
                        <img src="../images/logo.png" width="340" height="150"  alt="MobShare">
                </div>
                <!-- IMAGENS DAS REDES SOCIAIS-->
                <div class="img-redes-sociais">
                        <img src="../images/facebook-logo-button (1).png" width="30" height="30" alt="icone de rede social">
                        <img src="../images/google-plus-logo-button.png" width="30" height="30"  alt="icone de rede social">
                        <img src="../images/instagram-logo (1).png" width="30" height="30" alt="icone de rede social">
                        <img src="../images/twitter-logo-button (1).png" width="30" height="30" alt="icone de rede social">
                        <img src="../images/linkedin-logo-button.png" width="30" height="30" alt="icone de rede social">
                </div>
    
            </div>
            <!-- LISTA DE INFORMAÇÕES PARA CONTATO-->
            <div class="contato-rodape">
                    <div class="contato-menu-rodape">
                        <h1>Contato:</h1>
                    </div>
                    <nav class="contato-rodape-item">
                        <a>
                            <img src="../images/map.png" width="20" height="20"  alt="icone de endereço">
                             Av Felippo Holt, 543 - São Paulo</a>
                        <a>
                            <img src="../images/phone-call.png" width="20" height="20"  alt="icone de telefone">
                             (11) 5464-6757</a>
                        <a>
                            <img src="../images/envelope.png" width="20" height="20"  alt="icone de email">
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
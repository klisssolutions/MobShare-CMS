<?php
@session_start();
@$_SESSION["importInclude"] = $_SERVER["DOCUMENT_ROOT"] . "/Mobshare/include.php";
require_once($_SESSION["importInclude"]); 

require_once(IMPORT_TERMOS);
require_once(IMPORT_TERMOS_CONTROLLER);


$controllerTermos = new controllerTermos();
$termos[] = new Termos();
$termos = $controllerTermos->listarTermos();
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="shortcut icon" href="../images/anuncios.png" />
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
                <a href="../comofunciona/comofunciona.html">Como funciona</a>
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
        <div class="box-termos">
            <div class="image-termos">
                <div class="texto-sob-imagem">
                    <h1>Termos de Uso</h1>
                </div>
            </div>
            <div class="texto-termos">
            <?php
                foreach($termos as $termo){
                    if($termo->getAtivo()== 1){
            ?>
                <div class="termo">
                    <p> 
                    <?php echo($termo->getTexto());?> 
                    </p>
                </div>
            <?php }} ?> 
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
</html>
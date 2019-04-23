<?php
@session_start();
require_once($_SESSION["importInclude"]); 

//$router = "router('FALE_CONOSCO','inserir','0')";
$router = PASTA_PROJETO."/SITE/router.php?controller=FALE_CONOSCO&modo=inserir&id=0";

?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="shortcut icon" href="../images/anuncios.png" />

<!--    <script type="text/javascript" src="../../js/ajax.js"></script>-->
    <script type="text/javascript" src="../js/ajax.js"></script>
    <script type="text/javascript" src="../js/jquery.js"></script>
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
        <div class="box-fale-conosco">
        <div class="fale-conosco">
            <!-- FORMULÁRIO DO FALE CONOSCO -->
            <form id="form" method="post" action="<?php echo($router)?>">
                <div class="titulo-fale-conosco">
                    <h1>Fale Conosco:</h1>
                </div>
                <div class="nome-fale-conosco">
                    <h1>Nome:</h1>
                    <input type="text" class="txt-fale-conosco" name="txtNome"/>
                </div>
                <div class="email-fale-conosco">
                    <h1>E-mail:</h1>
                    <input type="text" class="txt-fale-conosco" name="txtEmail"/>
                </div>
                <div class="assunto-fale-conosco">
                     <h1>Assunto:</h1>
                    <input type="text" class="txt-fale-conosco" name="txtAssunto"/>
                </div>
                <div class="mensagem-fale-conosco">
                        <h1>Mensagem:</h1>
                        <textarea  class="msg-fale-conosco" name="txtMensagem"></textarea>
                </div>
                <div class="botao-fale-conosco">
                    <input type="submit" class="btn-fale-conosco" value="Enviar">
                </div>
            </form>
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
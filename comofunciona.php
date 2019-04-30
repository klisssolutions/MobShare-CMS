<?php 

    @session_start();
    @$_SESSION["importInclude"] = $_SERVER["DOCUMENT_ROOT"] . "/Mobshare/CMS/include.php";
    require_once($_SESSION["importInclude"]); 
    require_once(IMPORT_FUNCIONAMENTO);
    require_once(IMPORT_FUNCIONAMENTO_CONTROLLER);

    $controllerFuncionamento = new controllerFuncionamento();

    $funcionamentos[] = new Funcionamento();
    $funcionamentos = $controllerFuncionamento->listarFuncionamento();

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
        <?php
            $cont = 0;
                foreach($funcionamentos as $funcionamento){
                    if($funcionamento->getAtivo()){
                        if($cont%2){
        ?>
        
        <div class="box-como-funciona-segundo">
            <div class="image-como-funciona2">
                    <img src="<?php echo("/Mobshare/arquivos/".$funcionamento->getFoto());?>" width="700" height="400"  alt="App da MobShare">
            </div>
            <div class="texto-como-funciona2">
                    <h1><?php echo($funcionamento->getTitulo());?></h1>
                    <p><?php echo($funcionamento->getDescricao());?></p>
                   
            </div>
        </div>
                        <?php $cont++; }else{?>
        <div class="box-como-funciona-quarto">
            
            <div class="texto-como-funciona4">
                    <h1><?php echo($funcionamento->getTitulo());?></h1>
                    <p><?php echo($funcionamento->getDescricao());?></p>
                
                    
            </div>
            <div class="image-como-funciona4">
                <img src="<?php echo("/Mobshare/arquivos/".$funcionamento->getFoto());?>" width="700" height="400"  alt="App da MobShare">

        </div>
</div>
                    <?php 
                $cont++;    
                }
                    }
                }?>
        
        
        
        
        
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
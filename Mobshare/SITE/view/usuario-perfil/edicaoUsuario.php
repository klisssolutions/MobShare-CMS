<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../css/dashboard.css">
    <meta http-equiv="Content-Type" content="view/text/html; charset=utf-8" />
    <link rel="shortcut icon" href="../images/user.png" />
    <title>Painel do Usuário </title>
</head>
<body>
    <!-- HEADER DO MENU-->
    <header>
        <!-- onde fica o login-->
        <div class="logotipo">
            <div class="img-logotipo">
                    <a href="index.html"><img src="../images/logo.png" width="364" height="150"  alt="MobShare"></a>
            </div>
        </div>
        <!-- menu de navegação do cabeçalho -->
        <div class="menu-header">
            <nav class="menu-item">
                <a href="anuncios/anuncios.html">Anuncios</a>
                <a href="comofunciona/comofunciona.html">Como funciona</a>
                <a href="avaliacoesdomes/avaliacoesdomes.html">Melhores do Mês</a>
            </nav>
        </div>
        <!-- caixa onde ficará o botão de login-->
        <div class="box-login">
            <a href="index.php?destroy">
                <div class="botao-login">
                    Login
                </div>
            </a>
            <div class="texto-cadastrar">
                <h1>ou faça seu Cadastro!</h1>
            </div>
        </div>    
    </header>
    <!-- CAIXA QUE SEGURA O CONTEÚDO EMBAIXO DO MENU -->
    <div class="content">
        <div class="box-painel-usuario">
            <div class="menu-lateral-usuario">
                <div class="img-usuario-menu">
                    <div class="imagem-usuario">
                        <img src="../images/jon.jpg" width="180" height="180"  alt="Usuário">
                    </div>
                    <div class="nome-usuario-menu">
                        <h1>Johnny Depp</h1>
                    </div>
                </div>
                <div class="nav-menu-usuario-clicado">
                    
                    <h2> <img src="../images/black-male-user-symbol.png" width="28" height="28"  alt="Usuário">Meu perfil</h2>
                </div>
                <div class="nav-menu-usuario">
                    <h2> <img src="../images/coupon.png" width="28" height="28"  alt="Usuário">Endereços</h2>
                </div>
                <div class="nav-menu-usuario">
                    <h2><img src="../images/car (1).png" width="28" height="28"  alt="Usuário">Meus veículos</h2>
                </div>
                <div class="nav-menu-usuario">
                    <h2><img src="../images/tag.png" width="28" height="28"  alt="Usuário">Vendas</h2>
                </div>
                <div class="nav-menu-usuario">
                    <h2> <img src="../images/script.png" width="28" height="28"  alt="Usuário">Meus históricos</h2>
                </div>
                <div class="nav-menu-usuario">
                    <h2> <img src="../images/coupon.png" width="28" height="28"  alt="Usuário">Cupons</h2>
                </div>
                <div class="nav-menu-usuario-button">
                    <h3>Sair</h3>
                </div>
            </div>
            <div class="conteudo-usuario">
                <section class="edit-usuario">
                    <div class="info-perfil">
                        <div class="titulo-perfil">
                            Meus dados do perfil
                        </div>
                        <div class="foto-perfil">
                            <img src="../images/jon.jpg" width="310" height="310"  alt="Usuário">
                        </div>
                    </div>
                    <div class="info-perfil">
                        <div class="dados-perfil">
                            <div class="dados">
                                <h1>Nome completo:</h1>
                                <input type="text" class="input-usuario" name="txtnome">
                            </div>
                            <div class="dados">
                                <h1>CPF:</h1>
                                <input type="text"class="input-usuario" name="txtnome" placeholder="xxx.xxx.xxx-xx">
                            </div>
                        </div>
                        <div class="dados-perfil">
                            <div class="dados">
                                <h1>Sexo:</h1>
                                <select class="input-usuario" >
                                        <option value="volvo">Selecione</option>
                                        <option value="volvo">Feminino</option>
                                        <option value="saab">Masculino</option>
                                </select>
                            </div>
                            <div class="dados">
                                <h1>Data:</h1>
                                <input type="date" class="input-usuario" name="txtnome" placeholder="xxx.xxx.xxx-xx">
                            </div>
                        </div>
                        <div class="dados-perfil">
                            <div class="dados">
                                <h1>Numero da CNH:</h1>
                                <input type="text"class="input-usuario" name="txtnome">
                            </div>
                            <div class="dados">
                                <h1>Tipo de CNH:</h1>
                                <select class="input-usuario" >
                                    <option value="volvo">Tipo A</option>
                                    <option value="saab">Tipo B</option>
                                </select>
                            </div>
                        </div>
                        <div class="dados-perfil">
                            <div class="dados">
                                <input class="btn-usuario-canc" type="button" name="btnCancelar" value="Cancelar">
                            </div>
                            <div class="dados">
                                 <input class="btn-usuario" type="submit" name="btnSalvar" value="Salvar">
                            </div>
                        </div>
                    </div>
                </section>
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
                    <a href="termosdeuso/termosdeuso.html">Termos de Uso</a>
                    <a href="duvidasfreq/duvidasfreq.html">Duvidas Frequentes</a>
                    <a href="parceiros/parceiros.html">Parceiros</a>
                    <a href="faleconosco/faleconosco.html">Fale Conosco</a>
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
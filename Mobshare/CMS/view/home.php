<?php
   

?>
<html>

<head>
    <meta charset="utf-8">
    <title>
        CMS
    </title>
    <link rel="stylesheet" type="text/css" href="view/css/style.css">
    <script type="text/javascript" src="view/js/jquery.js"></script>
    <script type="text/javascript" src="view/js/ajax.js"></script>
</head>

<body>
    <div class="principal" id="principal">
        <div class="cabecalho">

            <div class="logo"><img src="view/imagens/logo.png" class="logo"></div>

            <div class="administrador">
                <div class="texto">Administrador</div>
                <div class="icone"><img src="view/imagens/user.png"></div>
            </div>
            <a href="#">
                <div class="visualizar">
                    <div class="texto">Visualizar Site</div>
                    <div class="icone"><img src="view/imagens/web.png"></div>
                </div>
            </a>
        </div>
        <div class="conteudo">

            <nav>

                <a href="#" onclick="gerenciarFuncionario();">
                    <div class="link">
                        Gerenciamento de Funcionarios
                    </div>
                </a>
                <a href="#" onclick="emailMarketing();">
                    <div class="link" >
                        Gerenciamento de E-mail Marketing
                    </div>
                </a>
                <a href="#" onclick="historicoLocacao();">
                    <div class="link">
                        Gerenciamento Histórico de Locação
                    </div>
                </a>
                <a href="#" onclick="admPaginas();">
                    <div class="link">
                        Administração das Paginas do Site
                    </div>
                </a>
                <a href="#" onclick="aprovacao();">
                    <div class="link" >
                        Aprovação de Cadastro
                    </div>
                </a>
                <a href="#" onclick="faleConosco();">
                    <div class="link">
                        Fale Conosco
                    </div>
                </a>
                <a href="#" onclick="relatorio();">
                    <div class="link">
                        Relatório
                    </div>
                </a>
                <div class="botao">
                    <input type="submit" value="Logout" id="logout">
                </div>
            </nav>
            <div class="usuario">

                <div class="infoUsuario">
                
                    <div class="foto"><img src="view/imagens/leo.jpg" class="foto"></div>
                    <div class="user">
                        <div class="nomeUser">
                            Olá Leonardo DiCaprio
                        </div>
                        <div class="emailUser">
                            leonardo@holly.com
                        </div>
                        <div class="gerenciamento">
                            <a href="index.php?destroy">Sair</a>
                        </div>
                    </div>
                
                </div>

            </div>

            <div class="menu" id="menu">

                <div class="informacao" id="informacao">
                    <p>SEJA BEM VINDO</p>
                    <p>ESCOLHA A OPÇÃO AO LADO</p>
                </div>

            </div>

        </div>
        <div class="rodape">

            <div class="texto2">2019 Kliss.solutions Todos os direitos reservados</div>

        </div>
    </div>
</body>

</html>

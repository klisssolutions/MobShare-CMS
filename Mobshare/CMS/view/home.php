<?php
   

?>
<html>

<head>
    <meta charset="utf-8">
    <title>
        Administração do Conteúdo
    </title>
    <link rel="stylesheet" type="text/css" href="view/css/style.css">
    <script type="text/javascript" src="view/js/jquery.js"></script>
    <script type="text/javascript" src="view/js/ajax.js"></script>
    <link rel="shortcut icon" href="view/imagens/settings.png" />
</head>

<body>
    <div class="principal" id="principal">
        <div class="cabecalho">

            <div class="logo">
                <a href="#">
                    <img src="view/imagens/logo.png" class="logo" heigth="150" width="200">
                </a>
            </div>

            <div class="administrador">
            <div class="icone"><img src="view/imagens/settings.png" heigth="32" width="32"></div>
                <div class="texto">
                    <h1>Leonardo Cavalcante</h1>
                    <p>Administrador</p>
                </div>
                
            </div>
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
                    <a href="index.php?destroy"><input class="btn-sair" type="button" value="Logout" id="logout"></a>
                </div>
            </nav>
            <div class="menu" id="menu">
                <div class="informacao" id="informacao">
                    <div class="texto-bem-vindo">
                        <img src="view/imagens/settings.png" heigth="150" width="150">
                        <h1>Administração de Conteúdo</h1>
                        <p>Selecione as opções no menu ao lado!</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="rodape">
            <div class="texto-rodape"> 
                Todos os direitos reservados 2019 © Desenvolvido por Kliss Solutions.
            </div>
        </div>
    </div>
</body>

</html>

<?php
    @session_start();
    require_once($_SESSION["importInclude"]);
    require_once(IMPORT_FUNCIONARIO);
    require_once(IMPORT_NIVEL);
    require_once(IMPORT_FUNCIONARIO_CONTROLLER);
    require_once(IMPORT_NIVEL_CONTROLLER);

    $funcionario = new Funcionario();
    $nivel = new Nivel();
    $funcionarioController = new controllerFuncionario();
    $nivelController = new controllerNivel();

    $_GET["id"] = $_SESSION['idFuncionario'];
    $funcionario = $funcionarioController->buscarFuncionario();
    $_GET["id"] = $funcionario->getIdNivel();
    $nivel = $nivelController->buscarNivel();
    $permissoes = $nivel->getPermissoes();
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
                    <h1><?php echo($funcionario->getNome());?></h1>
                    <p><?php echo($nivel->getNome());?></p>
                </div>
                
            </div>
        </div>
        <div class="conteudo">
            <nav>
                <?php if(acessoModulo($permissoes, MODULO_FUNCIONARIO)){?>
                    <a href="#" onclick="gerenciarFuncionario();">
                        <div class="link">
                            Gerenciamento de Funcionarios
                        </div>
                    </a>
                <?php }?>
                <?php if(acessoModulo($permissoes, MODULO_MARKETING)){?>
                    <a href="#" onclick="emailMarketing();">
                        <div class="link" >
                            E-mail Marketing
                        </div>
                    </a>
                <?php }?>
                <?php if(acessoModulo($permissoes, MODULO_LOCACAO)){?>
                    <a href="#" onclick="historicoLocacao();">
                        <div class="link">
                            Histórico de Locação
                        </div>
                    </a>
                <?php }?>
                <?php if(acessoModulo($permissoes, MODULO_PAGINA)){?>
                    <a href="#" onclick="admPaginas();">
                        <div class="link" >
                        Administração das Paginas do Site
                        </div>
                    </a>
                <?php }?>
                <?php if(acessoModulo($permissoes, MODULO_APROVACAO)){?>
                    <a href="#" onclick="aprovacao();">
                        <div class="link">
                            Aprovação de Cadastro
                        </div>
                    </a>
                <?php }?>
                <?php if(acessoModulo($permissoes, MODULO_CANCELAMENTO)){?>
                    <a href="#" onclick="aprovacaoCancelamento();">
                        <div class="link">
                            Aprovação de Cancelamento
                        </div>
                    </a>
                <?php }?>
                <?php if(acessoModulo($permissoes, MODULO_MODELO)){?>
                    <a href="#" onclick="marcaModelo();">
                        <div class="link">
                            Marcas e Modelos
                        </div>
                    </a>
                <?php }?>                   
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

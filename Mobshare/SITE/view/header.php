<header>
    <!-- onde fica o login-->
    <div class="logotipo">
        <div class="img-logotipo">
            <a href="<?php echo(LINK_SITE_HOME); ?>">
                <img src="<?php echo(LINK_IMAGEM_LOGO); ?>" width="364" height="150"  alt="MobShare">
            </a>
        </div>
    </div>
    <!-- menu de navegação do cabeçalho -->
    <div class="menu-header">
        <nav class="menu-item">
            <a href="<?php echo(LINK_SITE_ANUNCIO); ?>">Anuncios</a>
            <a href="<?php echo(LINK_SITE_FUNCIONA); ?>">Como funciona</a>
            <a href="<?php echo(LINK_SITE_MES); ?>">Melhores do Mês</a>
        </nav>
    </div>
    <!-- caixa onde ficará o botão de login-->
    <div class="box-login">
        <?php if(!(isset($_SESSION['idCliente']))){ ?>
            <a href="<?php echo(LINK_SITE_LOGIN); ?>">
                <div class="botao-login">
                    Login
                </div>
            </a>
            <div class="texto-cadastrar">
                <h1>ou faça seu Cadastro!</h1>
            </div>
        <?php }else{ 
            require_once(IMPORT_CLIENTE);
            require_once(IMPORT_CLIENTE_CONTROLLER);

            $cliente = new Cliente();
            $clienteController = new controllerCliente();

            $_GET["id"] = $_SESSION['idCliente']['idCliente'];
            $cliente = $clienteController->buscarCliente();
            
            ?>
            <a href="<?php echo(LINK_SITE_SAIR); ?>">
                <div class="botao-login">
                    Sair
                </div>
            </a>
            <div class="texto-cadastrar">
                <a href="usuario-inicio/inicioUsuario.php"><h1><?php echo($cliente->getNome()); ?></h1></a>
            </div>
        <?php } ?>
    </div>    
</header>
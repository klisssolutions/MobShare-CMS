<?php
@session_start();
@$_SESSION["importInclude"] = $_SERVER["DOCUMENT_ROOT"] . "/Mobshare/include.php";
require_once($_SESSION["importInclude"]); 

require_once(IMPORT_V_HISTORICO_LOCACAO);
require_once(IMPORT_LOCACAO_CONTROLLER);

require_once(IMPORT_CLIENTE);
require_once(IMPORT_CLIENTE_CONTROLLER);

$controllerCliente = new controllerCliente();
$controllerLocacao = new controllerLocacao();

$_GET["id"] = $_SESSION['idCliente']['idCliente'];

$locacoes = $controllerLocacao->listarHistoricoLocacaoPorLocador();

?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="../css/dashboard.css">
    <meta http-equiv="Content-Type" content="view/text/html; charset=utf-8" />
    <link rel="shortcut icon" href="../images/user.png" />
    <script type="text/javascript" src="../js/link.js"></script>
    <title>Painel do Usuário </title>
</head>

<body>
    <!-- HEADER DO MENU-->
    <?php require_once(HEADER);?>
    <!-- CAIXA QUE SEGURA O CONTEÚDO EMBAIXO DO MENU -->
    <div class="content">
        <div class="box-painel-usuario">
            <div class="menu-lateral-usuario">
                <div class="img-usuario-menu">
                    <div class="imagem-usuario">
                        <img src="../images/jon.jpg" width="180" height="180" alt="Usuário">
                    </div>
                    <div class="nome-usuario-menu">
                        <h1>Johnny Depp</h1>
                    </div>
                </div>
                <div class="nav-menu-usuario">

                    <h2> <img src="../images/black-male-user-symbol.png" width="28" height="28" alt="Usuário">Meu perfil</h2>
                </div>
                <div class="nav-menu-usuario">
                    <h2> <img src="../images/coupon.png" width="28" height="28" alt="Usuário">Endereços</h2>
                </div>
                <a href="../usuario-veiculo/usuarioVeiculo.php">
                    <div class="nav-menu-usuario-clicado">
                        <h2><img src="../images/car (1).png" width="28" height="28" alt="Usuário">Meus veículos</h2>
                    </div>
                </a>
                <div class="nav-menu-usuario">
                    <h2><img src="../images/tag.png" width="28" height="28" alt="Usuário">Vendas</h2>
                </div>
                <a href="historicoVeic.php">
                    <div class="nav-menu-usuario">
                        <h2> <img src="../images/script.png" width="28" height="28" alt="Usuário">Meus históricos</h2>
                    </div>
                </a>
                <div class="nav-menu-usuario">
                    <h2> <img src="../images/coupon.png" width="28" height="28" alt="Usuário">Cupons</h2>
                </div>
                <div class="nav-menu-usuario-button">
                    <h3>Sair</h3>
                </div>
            </div>
            <div class="conteudo-usuario">
                <div class="titulo-lista">VEICULOS</div>
            <?php
                foreach($locacoes as $locacao):    
            ?>

                <div class="box-veiculo">
                    <div class="texto-modelo">
                        <label class="negrito">Veiculo: </label><?php echo($modelo->getNomeModelo() . " " . $marca->getNomeMarca())?>
                    </div>

                    <div class="texto-ano">
                        <input type="button" value="Recebido">
                    </div>

                </div>

                 <?php 
                    endforeach;
                 ?>


            </div>
        </div>
    </div>
    <!-- RODAPÉ-->
    <?php require_once(FOOTER);?>

</body>

</html>
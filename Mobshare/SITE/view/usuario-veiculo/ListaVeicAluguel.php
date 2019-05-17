<?php
@session_start();
@$_SESSION["importInclude"] = $_SERVER["DOCUMENT_ROOT"] . "/Mobshare/include.php";
require_once($_SESSION["importInclude"]); 

require_once(IMPORT_VEICULO);
require_once(IMPORT_VEICULO_CONTROLLER);

require_once(IMPORT_FOTO_VEICULO_CONTROLLER);
require_once(IMPORT_FOTO_VEICULO);

require_once(IMPORT_MODELO_CONTROLLER);
require_once(IMPORT_MODELO);

require_once(IMPORT_MARCA_CONTROLLER);
require_once(IMPORT_MARCA);



$controllerVeiculo = new controllerVeiculo();
$controllerFoto_veiculo = new controllerFoto_Veiculo();
$controllerMarca = new controllerMarca();
$controllerModelo = new controllerModelo();

$veiculos[] = new Veiculo();

$veiculos = $controllerVeiculo->listarVeiculosCliente();


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
                <div class="nav-menu-usuario">
                    <h2> <img src="../images/script.png" width="28" height="28" alt="Usuário">Meus históricos</h2>
                </div>
                <div class="nav-menu-usuario">
                    <h2> <img src="../images/coupon.png" width="28" height="28" alt="Usuário">Cupons</h2>
                </div>
                <div class="nav-menu-usuario-button">
                    <h3>Sair</h3>
                </div>
            </div>
            <div class="conteudo-usuario">
                <div class="titulo-lista">VEICULOS</div>

                <div class="botoes-dash">

                    <input type="button" value="Novo" class="btn-dash" onclick="cadastrarAluguel();">
                    <input type="button" value="Voltar" class="btn-dash" onclick="veiculo();">

                </div>
<?php
                $i= 0;
                 while($i < count($veiculos)){

                    $foto_veiculo = new Foto_Veiculo();
                    $marca = new Marca();
                    $modelo = new Modelo();

                    $_GET["id"] = $veiculos[$i]->getIdModelo();
                    $modelo = $controllerModelo->buscarModelos();

                    $_GET["id"] = $modelo->getIdMarca();
                    $marca = $controllerMarca->buscarMarcas();

                    $foto_veiculo = $controllerFoto_veiculo->listarFotoFrontal($veiculos[$i]->getIdVeiculo());
                      
            ?>

                <div class="box-veiculo">
                    <div class="img-veiculo">
                        <img src="<?php echo('/Mobshare/arquivos/'.$foto_veiculo->getFotoVeiculo()) ?>" width="320" height="225" alt="veiculo">
                    </div>
                    <div class="texto-modelo">
                        <label class="negrito">Modelo: </label><?php echo($modelo->getNomeModelo())?>
                    </div>
                    <div class="texto-marca">
                        <label class="negrito">Marca: </label> <?php echo($marca->getNomeMarca())?>
                    </div>
                    <div class="texto-ano">
                        
                        <label class="negrito">Ano: </label> <?php echo($veiculos[$i]->getAno())?>

                    </div>

                    <div class="opcao">


                        <a href="#">
                            <img src="../images/pencil.png" width="25" heigth="28">
                        </a>

                        <a href="#">
                            <img src="../images/trash.png" width="25" heigth="28">
                        </a>


                    </div>

                </div>

                 <?php 
                    $i++;
                    }
                 ?>


            </div>
        </div>
    </div>
    <!-- RODAPÉ-->
    <?php require_once(FOOTER);?>

</body>

</html>

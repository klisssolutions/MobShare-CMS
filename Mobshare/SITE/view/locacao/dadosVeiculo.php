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

require_once(IMPORT_SOLICITACAO_LOCACAO_CONTROLLER);
require_once(IMPORT_SOLICITACAO_LOCACAO);

if(isset($_GET["alugar"])){
    $_GET["id"] = $_SESSION['idVeiculo'];

    $controllerSolicitacao = new controllerSolicitacao_Locacao();
    $_GET["idCliente"] = $_SESSION['idCliente']['idCliente'];
    $_GET["idVeiculo"] = $_SESSION['idVeiculo'];
    $_GET["txtHorarioInicio"] = $_GET["diaInicio"] . " " . $_GET["horaInicio"];
    $_GET["txtHorarioFim"] = $_GET["diaTermino"] . " " . $_GET["horaTermino"];

    $controllerSolicitacao->inserirSolicitacao_Locacao();
}

$controllerVeiculo = new controllerVeiculo();
$controllerFoto_veiculo = new controllerFoto_Veiculo();
$controllerMarca = new controllerMarca();
$controllerModelo = new controllerModelo();

$veiculo = new Veiculo();

$id = $_GET["id"];
$_SESSION['idVeiculo'] = $id;

$veiculo = $controllerVeiculo->buscarVeiculo();
$foto_veiculo = new Foto_Veiculo();
$marca = new Marca();
$modelo = new Modelo();
$modelo = $controllerModelo->buscarModelo($veiculo->getIdModelo());
$_GET["id"] = $modelo->getIdMarca();
$marca = $controllerMarca->buscarMarcas();
$foto_veiculo = $controllerFoto_veiculo->listarFotoFrontal($veiculo->getIdVeiculo());

?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="shortcut icon" href="images/anuncios.png" />
    <title><?php echo($marca->getNomeMarca() . " " . $modelo->getNomeModelo());?> | Mob'Share</title>
</head>

<body>
    <!-- HEADER DO MENU-->
    <?php require_once(HEADER);?>
    <!-- CAIXA QUE SEGURA O CONTEÚDO EMBAIXO DO MENU -->
    <div class="content">
        <div class="caixa-pesquisa-imagem">
            <input type="text" class="caixa-pesquisa-home">
        </div>
        <div class="caixa-veiculos-home">
            <div class="caixa-itens-home">
                <nav class="menu-veiculos">
                    <a class="clicado"><?php echo($marca->getNomeMarca() . " " . $modelo->getNomeModelo());?></a>
                </nav>
            </div>
            <div class="caixa-veiculos">
                <form method="GET">
                <div class="dadosVeiculo">
                    <table>
                        <tr>
                            <td>
                                <img src="<?php echo('/Mobshare/arquivos/'.$foto_veiculo->getFotoVeiculo()) ?>" width="320" height="225" alt="veiculo">
                            </td>
                        </tr>   
                        <tr>
                            <td>
                                Marca
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <?php echo($marca->getNomeMarca()); ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Modelo
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <?php echo($modelo->getNomeModelo()); ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Início locação:
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="date" name="diaInicio" required><input type="time" name="horaInicio" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Término locação:
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="date" name="diaTermino" required><input type="time" name="horaTermino" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="submit" value="Alugar" name="alugar">
                            </td>
                        </tr>
                    </table>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- RODAPÉ-->
    <?php require_once(FOOTER);?>

</body>

</html>

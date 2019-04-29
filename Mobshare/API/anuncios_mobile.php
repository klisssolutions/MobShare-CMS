<?php

header("Content-Type: application/json; charset=UTF-8");
@session_start();
$_SESSION["importInclude"] = $_SERVER["DOCUMENT_ROOT"] . "/Mobshare/include.php";

//Require das constantes
require_once($_SESSION["importInclude"]);

//Require das controller
require_once(IMPORT_VEICULO_CONTROLLER);
require_once(IMPORT_MODELO_CONTROLLER);
require_once(IMPORT_MARCA_CONTROLLER);
require_once(IMPORT_FOTO_VEICULO_CONTROLLER);

//Pegar as variáveis da url
$modo = (isset($_GET["modo"]) ? strtoupper($_GET["modo"]) : null);
$id = (isset($_GET["id"]) ? strtoupper($_GET["id"]) : null);

//Inicia a controller
$veiculoController = new controllerVeiculo();
$modeloController = new controllerModelo();
$marcaController = new controllerMarca();
$foto_veiculoController = new ControllerFoto_Veiculo();



?>
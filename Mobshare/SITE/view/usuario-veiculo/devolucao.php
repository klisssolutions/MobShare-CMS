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

$idLocacao = $_GET["id"];
$modo = $_GET["modo"];

if($modo == "devolver"){
    $controllerLocacao->devolver();
    echo("<script>alert('Veículo devolvido.');</script>");
}else{
    $controllerLocacao->receber();
    echo("<script>alert('Veículo recebido.');</script>");
}

echo("<script>window.location.replace('" . LINK_SITE_HISTORICO . "');</script>");


?>
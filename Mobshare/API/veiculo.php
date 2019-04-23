<?php

header("Content-Type: application/json; charset=UTF-8");
@session_start();
$_SESSION["importInclude"] = $_SERVER["DOCUMENT_ROOT"] . "/Mobshare/include.php";

//Require das constantes
require_once($_SESSION["importInclude"]);

//Require da classe funcionário
require_once(IMPORT_VEICULO_CONTROLLER);

//Pegar as variáveis da url
$modo = (isset($_GET["modo"]) ? strtoupper($_GET["modo"]) : null);
$id = (isset($_GET["id"]) ? strtoupper($_GET["id"]) : null);

//Inicia a controller
$veiculoController = new controllerVeiculo();

if($modo == "LISTA"){
    $veiculos = $veiculoController->listarVeiculos();

    $result = array();
    $result["veiculos"] = array();

    foreach($veiculos as $veiculo){
        $array = array(
            "idVeiculo" => $veiculo->getIdVeiculo(),
            "idCategoriaVeiculo" => $veiculo->getIdCategoriaVeiculo(),
            "idCliente" => $veiculo->getIdCliente(),
            "idModelo" => $veiculo->getIdModelo(),
            "cor" => $veiculo->getCor(),
            "altura" => $veiculo->getAltura(),
            "comprimento" => $veiculo->getComprimento(),
            "largura" => $veiculo->getLargura(),
            "valorHora" => $veiculo->getValorHora(),
            "ano" => $veiculo->getAno(),
            "quilometragem" => $veiculo->getQuilometragem(),
            "valorVenda" => $veiculo->getValorVenda(),
            "idEndereco" => $veiculo->getIdEndereco()
        );

        array_push($result["veiculos"], $array);
    }

}else if($modo == "BUSCAR"){
    $veiculo = $veiculoController->buscarVeiculo();

        $array = array(
            "idVeiculo" => $veiculo->getIdVeiculo(),
            "idCategoriaVeiculo" => $veiculo->getIdCategoriaVeiculo(),
            "idCliente" => $veiculo->getIdCliente(),
            "idModelo" => $veiculo->getIdModelo(),
            "cor" => $veiculo->getCor(),
            "altura" => $veiculo->getAltura(),
            "comprimento" => $veiculo->getComprimento(),
            "largura" => $veiculo->getLargura(),
            "valorHora" => $veiculo->getValorHora(),
            "ano" => $veiculo->getAno(),
            "quilometragem" => $veiculo->getQuilometragem(),
            "valorVenda" => $veiculo->getValorVenda(),
            "idEndereco" => $veiculo->getIdEndereco()
        );

        $result = (object) $array;

}else if($modo == "COMPRA"){
    $erro = $veiculoController->excluirVeiculo();
    if($erro){
        $result["mensagem"] = "Erro ao excluir veículo.";
    }else{
        $result["mensagem"] = "Veículo ".$id." excluído.";
    }
}else if($modo == "EXCLUIR"){
    $erro = $veiculoController->excluirVeiculo();
    if($erro){
        $result["mensagem"] = "Erro ao excluir veículo.";
    }else{
        $result["mensagem"] = "Veículo ".$id." excluído.";
    }
}else{
    $result["mensagem"] = "Modo inválido.";
}

echo(json_encode($result));

?>
<?php

header("Content-Type: application/json; charset=UTF-8");
@session_start();
$_SESSION["importInclude"] = $_SERVER["DOCUMENT_ROOT"] . "/Mobshare/include.php";

//Require das constantes
require_once($_SESSION["importInclude"]);

//Require da classe funcionário
require_once(IMPORT_MARCA_CONTROLLER);

//Pegar as variáveis da url
$modo = (isset($_GET["modo"]) ? strtoupper($_GET["modo"]) : null);

//Inicia a controller
$controllerMarca = new controllerMarca();

$result = array(
    "Mensagem" => "Modo Inexistente"
);

if($modo == "LISTA"){
    $marcas = $controllerMarca->listarMarcas();

    $result = array();

    $arrayPadrao = array(
        "idMarca" => 0,
        "nomeMarca" => "Selecione"
    );

    array_push($result, $arrayPadrao);

    foreach($marcas as $marca){
        $array = array(
            "idMarca" => $marca->getIdMarca(),
            "nomeMarca" => $marca->getNomeMarca()
        );

        array_push($result, $array);
    }

}
//Converter para o JSON a variavel result q é gerada pelas ações
echo(json_encode($result));

?>
<?php

header("Content-Type: application/json; charset=UTF-8");
@session_start();
$_SESSION["importInclude"] = $_SERVER["DOCUMENT_ROOT"] . "/Mobshare/include.php";

//Require das constantes
require_once($_SESSION["importInclude"]);

//Require da classe funcionário
require_once(IMPORT_MODELO_CONTROLLER);

//Pegar as variáveis da url
$modo = (isset($_GET["modo"]) ? strtoupper($_GET["modo"]) : null);

//Inicia a controller
$controllerModelo = new controllerModelo();

$result = array(
    "Mensagem" => "Modo Inexistente"
);

if($modo == "LISTA"){
    $modelos = $controllerModelo->listarModelos();

    $result = array();

    $arrayPadrao = array(
        "idModelo" => 0,
        "nomeModelo" => "Selecione"
    );

    array_push($result, $arrayPadrao);


    foreach($modelos as $modelo){
        $array = array(
            "idModelo" => $modelo->getIdModelo(),
            "nomeModelo" => $modelo->getNomeModelo()
        );

        array_push($result, $array);
    }

}
//Converter para o JSON a variavel result q é gerada pelas ações
echo(json_encode($result));

?>
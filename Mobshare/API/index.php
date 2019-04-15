<?php
header("Content-Type: application/json; charset=UTF-8");

@session_start();
$_SESSION["importInclude"] = $_SERVER["DOCUMENT_ROOT"] . "/Mobshare/include.php";

//Require das constantes
require_once($_SESSION["importInclude"]);

//Require da classe funcionário
require_once(IMPORT_FUNCIONARIO_CONTROLLER);

$funcionarioController = new controllerFuncionario();

$funcionarios = $funcionarioController->listarFuncionario();

$result = array();
$result["funcionarios"] = array();

foreach($funcionarios as $funcionario){
    $array = array(
        "id" => $funcionario->getIdUsuarioWeb(),
        "email" => $funcionario->getEmail(),
        "nome" => $funcionario->getNome(),
        "idNivel" => $funcionario->getIdNivel()
    );

    array_push($result["funcionarios"], $array);
}

echo (json_encode($result));
?>
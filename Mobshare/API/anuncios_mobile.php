<?php

header("Content-Type: application/json; charset=UTF-8");
@session_start();
$_SESSION["importInclude"] = $_SERVER["DOCUMENT_ROOT"] . "/Mobshare/include.php";

//Require das constantes
require_once($_SESSION["importInclude"]);

//Require das controller
require_once(IMPORT_ANUNCIOS_CONTROLLER);

//Pegar as variáveis da url
$modo = (isset($_GET["modo"]) ? strtoupper($_GET["modo"]) : null);
$id = (isset($_GET["id"]) ? strtoupper($_GET["id"]) : null);

//Inicia a controller
$anunciosController = new controllerAnuncios();


//
if($modo == "LISTA"){
    $anuncios = $anunciosController->listarAnuncio();

    $result = array();
    

    foreach($anuncios as $anuncio){
        $array = array(
            "idVeiculo" => $anuncio->getIdVeiculo(),
            "nomeModelo" => $anuncio->getNomeModelo(),
            "nomeMarca" => $anuncio->getNomeMarca(),
            "fotoVeiculo" => $anuncio->getFotoVeiculo()
        );

        array_push($result, $array);
    }

}else if($modo == "FILTRAR"){
    
    

    $result= array();

    $anunciosController = new controllerAnuncios();

    $anuncios = $anunciosController->filtrarAnuncios();

    foreach($anuncios as $anuncio){
        $array = array(
            "idVeiculo" => $anuncio->getIdVeiculo(),
            "nomeModelo" => $anuncio->getNomeModelo(),
            "nomeMarca" => $anuncio->getNomeMarca(),
            "fotoVeiculo" => $anuncio->getFotoVeiculo()
        );

        array_push($result, $array);        
    }



}else if($modo == "BUSCAR"){
    $anuncios = $anunciosController->buscarAnuncio();

        $array = array(
            "idVeiculo" => $anuncios->getIdVeiculo(),
            "nomeModelo" => $anuncios->getNomeModelo(),
            "nomeMarca" => $anuncios->getNomeMarca(),
            "fotoVeiculo" => $anuncios->getFotoVeiculo()
        );

        $result = (object) $array;

}else{
    $result["mensagem"] = "Modo inválido.";
}

echo(json_encode($result));




?>
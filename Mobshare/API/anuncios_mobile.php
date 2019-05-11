<?php

header("Content-Type: application/json; charset=UTF-8");
@session_start();
$_SESSION["importInclude"] = $_SERVER["DOCUMENT_ROOT"] . "/Mobshare/include.php";

//Require das constantes
require_once($_SESSION["importInclude"]);

//Require das controller
require_once(IMPORT_ANUNCIOS_CONTROLLER);
require_once(IMPORT_ACESSORIO_CONTROLLER);
require_once(IMPORT_FOTO_VEICULO_CONTROLLER);

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
    $controllerFoto_Veiculo = new controllerFoto_Veiculo();
    $controllerAcessorio = new controllerAcessorio();

    $anuncios = $anunciosController->buscarAnuncio($id);
    $fotos = $controllerFoto_Veiculo->listarFotosPorVeiculo($anuncios->getIdVeiculo());
    $acessorios = $controllerAcessorio->listarAcessorioPorVeiculo($anuncios->getIdVeiculo());

    $array_fotos = array();
    $array_acessorios = array();
    $result= array();

    foreach($fotos as $foto){
        array_push($array_fotos,  $foto->getFotoVeiculo());        
    }

    foreach($acessorios as $acessorio){
    
        array_push($array_acessorios, $acessorio->getQuantidade()." ".$acessorio->getNomeAcessorio());        
    }    



    $result = array(
        "idVeiculo" => $anuncios->getIdVeiculo(),
        "nomeModelo" => $anuncios->getNomeModelo(),
        "nomeMarca" => $anuncios->getNomeMarca(),
        "valor" => $anuncios->getValor(),
        "ano" => $anuncios->getAno(),
        "cor" => $anuncios->getCor(),
        "nota" => $anuncios->getNota(),
        "fotos" => $array_fotos,
        "acessorios" => $array_acessorios
    );

    //array_push($result, $array);   

       

}else{
    $result["mensagem"] = "Modo inválido.";
}

echo(json_encode($result));






?>
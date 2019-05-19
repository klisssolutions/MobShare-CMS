<?php

header("Content-Type: application/json; charset=UTF-8");
@session_start();
$_SESSION["importInclude"] = $_SERVER["DOCUMENT_ROOT"] . "/Mobshare/include.php";

//Require das constantes
require_once($_SESSION["importInclude"]);

//Require das controller
require_once(IMPORT_SOLICITACAO_LOCACAO_CONTROLLER);
require_once(IMPORT_SOLICITACAO_LOCACAO);
require_once(IMPORT_VSOLICITACAO_LOCACAO);


//Pegar as variáveis da url
$modo = (isset($_GET["modo"]) ? strtoupper($_GET["modo"]) : null);
$id = (isset($_GET["id"]) ? strtoupper($_GET["id"]) : null);

//Inicia a controller
$solicitacao_Locacao = new Solicitacao_Locacao();
$controllerSolicitacao_Locacao = new controllerSolicitacao_Locacao();


//
if($modo == "INSERIR"){
    $status = $controllerSolicitacao_Locacao->inserirSolicitacao_Locacao();

    $result = array(
        "status" => $status
    );

}else if($modo == "LISTAR"){
    
    

    $result= array();

    
    $controllerSolicitacao_Locacao = new controllerSolicitacao_Locacao();   


    $solicitacoes_Locacao = $controllerSolicitacao_Locacao->listarSolicitacaoLocacaoPorLocador();



    foreach($solicitacoes_Locacao as $solicitacao_Locacao){
        $array = array(

            "idSolicitacaoLocacao" => $solicitacao_Locacao->getIdSolicitacao_Locacao(),
            "idCliente" => $solicitacao_Locacao->getIdCliente(),
            "nomeCliente" => $solicitacao_Locacao->getNomeCliente(),
            "veiculo" => $solicitacao_Locacao->getVeiculo(),
            "horarioInicio" => $solicitacao_Locacao->getHorarioInicio(),
            "horarioFim" => $solicitacao_Locacao->getHorarioFim(),
            "motivoRecusa" => $solicitacao_Locacao->getMotivoRecusa()
            
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

}else if($modo == "ACEITAR"){
    
    $status = $controllerSolicitacao_Locacao->aceitarSolicitacao($id);

    $result = array(
        "status" => $status
    );  

}else if($modo == "RECUSAR"){

    $status = $controllerSolicitacao_Locacao->recusarSolicitacao($id);

    $result = array(
        "status" => $status
    );  

}else{
    $result["mensagem"] = "Modo inválido.";
}

echo(json_encode($result));

?>
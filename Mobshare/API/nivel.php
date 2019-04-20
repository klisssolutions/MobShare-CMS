<?php

header("Content-Type: application/json; charset=UTF-8");
@session_start();
$_SESSION["importInclude"] = $_SERVER["DOCUMENT_ROOT"] . "/Mobshare/include.php";

//Require das constantes
require_once($_SESSION["importInclude"]);

//Require da classe funcionário
require_once(IMPORT_NIVEL_CONTROLLER);

//Pegar as variáveis da url
$modo = (isset($_GET["modo"]) ? strtoupper($_GET["modo"]) : null);
$id = (isset($_GET["id"]) ? strtoupper($_GET["id"]) : null);

//Inicia a controller
$nivelController = new controllerNivel();


if($modo == "INSERIR"){
    //Usa os dados do get e post para inserir
    $erro = $nivelController->inserirNivel();

    //Trata o erro que vem lá da DAO
    if($erro){
        $result["mensagem"] = MSG_INSERIR_NIVEL_ERRO;
    }else{
        $result["mensagem"] = MSG_INSERIR_NIVEL_SUCESSO;
    }
}else if($modo == "ATUALIZAR"){
    //Usa os dados do get e post para atualizar
    $erro = $nivelController->atualizarNivel();
    if($erro){
        $result["mensagem"] = MSG_ATUALIZAR_NIVEL_ERRO;
    }else{
        $result["mensagem"] = MSG_ATUALIZAR_NIVEL_SUCESSO;
    }
}else if($modo == "LISTA"){
    $niveis = $nivelController->listarNiveis();

    //Cria uma array com nome para o JSON
    $result["niveis"] = array();

    //Popula a array com os dados do banco para retornar os objetos no JSON
    foreach($niveis as $nivel){
        $jsonObject = $nivel->_toJson();

        array_push($result["niveis"], $jsonObject);
    }

}else if($modo == "BUSCAR"){
    $nivel = $nivelController->buscarNivel();

    //Retorna o objeto convertido para json
    $result = $nivel->_toJson();

}else if($modo == "EXCLUIR"){
    $erro = $nivelController->excluirNivel();

    if($erro){
        $result["mensagem"] = MSG_EXCLUIR_NIVEL_ERRO;
    }else{
        $result["mensagem"] = MSG_EXCLUIR_NIVEL_SUCESSO;
    }

}else{
    //Mensagem de erro caso use o modo errado
    $result["mensagem"] = MSG_MODO_ERRO;
}

//Converter para o JSON a variavel result q é gerada pelas ações
echo(json_encode($result));

?>
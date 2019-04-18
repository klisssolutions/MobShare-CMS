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
        $result["mensagem"] = "Erro ao inserir nível.";
    }else{
        $result["mensagem"] = "Nível inserido";
    }
}else if($modo == "ATUALIZAR"){
    //Usa os dados do get e post para atualizar
    $erro = $nivelController->atualizarNivel();
    if($erro){
        $result["mensagem"] = "Erro ao atualizar nível.";
    }else{
        $result["mensagem"] = "Nível atualizado";
    }
}else if($modo == "LISTA"){
    $niveis = $nivelController->listarNiveis();

    $result = array();
    //Cria uma array com nome para o JSON
    $result["niveis"] = array();

    //Popula a array com os dados do banco para retornar os objetos no JSON
    foreach($niveis as $nivel){
        $array = array(
            "idNivel" => $nivel->getIdNivel(),
            "nome" => $nivel->getNome(),
            "descricao" => $nivel->getdescricao(),
            "permissoes" => $nivel->getPermissoes()
        );

        array_push($result["niveis"], $array);
    }

}else if($modo == "BUSCAR"){
    $nivel = $nivelController->buscarNivel();

        //Cria uma array para converter em objeto e mostrar o JSON corretamente
        $array = array(
            "idNivel" => $nivel->getIdNivel(),
            "nome" => $nivel->getNome(),
            "descricao" => $nivel->getdescricao(),
            "permissoes" => $nivel->getPermissoes()
        );

        $result = (object) $array;

}else{
    //Mensagem de erro caso use o modo errado
    $result["mensagem"] = "Modo inválido.";
}

//Converter para o JSON a variavel result q é gerada pelas ações
echo(json_encode($result));

?>
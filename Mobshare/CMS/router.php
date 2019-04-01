<?php
/*
    Projeto: Mobshare
    Autor: Igor
    Data Criação: 23/03/2019
    Data Modificação:28/03/2019
    Conteudo Modificação: Uso do arquivo de constantes
    Autor da Modificação:Igor
    Objetivo: Arquivo de rota que realiza ações
*/

$controller = null;
$modo = null;
$id = null;

//Import da classe de constantes
@session_start();
require_once($_SESSION["importInclude"]); 

if(isset($_GET["controller"])){
    //Sempre serão enviadas pela view
    $controller = strtoupper($_GET["controller"]);
    $modo = strtoupper($_GET["modo"]);

    switch($controller){
        case "NIVEIS":
            //Import da controller de nivel
            require_once(IMPORT_NIVEL_CONTROLLER);
                    
            //Instancia da controller de nivel
            $controllerNivel = new controllerNivel();

            switch($modo){
                case "INSERIR":
                    //Chamando o método de inserir um novo nivel
                    $controllerNivel->inserirNivel();

                    //Encaminha para a pagina de nivel
                    echo("<script>nivel();</script>");
                    break;
                case "ATUALIZAR":
                    //Chamando o método de atualizar nivel
                    $controllerNivel->atualizarNivel();

                    //Encaminha para a pagina de nivel
                    echo("<script>nivel();</script>");
                    break;
                case "EXCLUIR":
                    //Chama o método para excluir o nivel
                    $controllerNivel->excluirNivel();

                    //Encaminha para a pagina de nivel
                    echo("<script>nivel();</script>");
                    break;
                case "BUSCAR":
                    //Chama o método para pegar o nível escolhido
                    $nivel = $controllerNivel->buscarNivel();

                    //Pega a pagina de cadastro de niveis para editar o nivel escolhido
                    require_once(IMPORT_CADASTRO_NIVEL);
                    break;
            }
            break;

        case "FUNCIONARIOS":

            //Import da controller de nivel
            require_once(IMPORT_FUNCIONARIO_CONTROLLER);
                    
            //Instancia da controller de nivel
            $controllerFuncionario = new controllerFuncionario();

            switch($modo){
                case "INSERIR":
                    //Chamando o método de inserir um novo funcionario
                    $controllerFuncionario->inserirFuncionario();

                    //Encaminha para a pagina de funcionario
                    echo("<script>funcionario();</script>");
                    break;

                case "EXCLUIR":
                    //Chama o método para excluir o funcionario
                    $controllerFuncionario->excluirFuncionario();

                    //Encaminha para a pagina de funcionario
                    echo("<script>funcionario();</script>");
                    break;

                case "BUSCAR":
                    $funcionario = $controllerFuncionario->buscarFuncionario();

                    require_once(IMPORT_CADASTRO_FUNCIONARIO);

                    break;

                case "ATUALIZAR":
                    $controllerFuncionario->atualizarFuncionario();

                    echo("<script>funcionario();</script>");
                    break;


                case "LOGAR":
                    $idFuncionario = $controllerFuncionario->logar();
                    //Verifica se retornou um funcionário corretamente para mostrar um erro
                    if(!$idFuncionario){
                        echo("<script>alert('Login ou senha inválidos.');</script>");
                    }

                    require_once(IMPORT_INDEX);

                    break;

            }
            break;
    }
}
?>
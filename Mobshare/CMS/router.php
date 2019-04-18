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
                    $erro = $controllerNivel->inserirNivel();

                    //Mostra mensagem de erro ou sucesso
                    if($erro){
                        echo("<script>alert('Não foi possível criar o nível.');</script>");
                    }else{
                        echo("<script>alert('Nível adicionado.');</script>");
                    }

                    //Encaminha para a pagina de nivel
                    echo("<script>nivel();</script>");
                    break;
                case "ATUALIZAR":
                    //Chamando o método de atualizar nivel
                    $erro = $controllerNivel->atualizarNivel();

                    //Mostra mensagem de erro ou sucesso
                    if($erro){
                        echo("<script>alert('Não foi possível atualizar o nível.');</script>");
                    }else{
                        echo("<script>alert('Nível atualizado.');</script>");
                    }

                    //Encaminha para a pagina de nivel
                    echo("<script>nivel();</script>");
                    break;
                case "EXCLUIR":
                    //Chama o método para excluir o nivel
                    $erro = $controllerNivel->excluirNivel();

                    //Mostra mensagem de erro ou sucesso
                    if($erro){
                        echo("<script>alert('Não foi possível apagar o nível. Existe um funcionário associado ao nível.');</script>");
                    }else{
                        echo("<script>alert('Nível apagado.');</script>");
                    }

                    //Encaminha para a pagina de nivel
                    echo("<script>nivel();</script>");
                    break;
                case "BUSCAR":
                    //Chama o método para pegar o nível escolhido
                    $nivel = $controllerNivel->buscarNivel();

                    //Pega a pagina de cadastro de niveis para editar o nivel escolhido
                    require_once(IMPORT_CMS_CADASTRO_NIVEL);
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
                    $erro = $controllerFuncionario->inserirFuncionario();

                    if($erro){
                        echo("<script>alert('Não foi possível criar o Funcionário.');</script>");
                    }else{
                        echo("<script>alert('Funcionário criado.');</script>");
                    }

                    //Encaminha para a pagina de funcionario
                    echo("<script>funcionario();</script>");
                    break;

                case "EXCLUIR":
                    //Chama o método para excluir o funcionario
                    $erro = $controllerFuncionario->excluirFuncionario();

                    if($erro){
                        echo("<script>alert('Não foi possível excluir o funcionário.');</script>");
                    }else{
                        echo("<script>alert('Funcionário apagado.');</script>");
                    }

                    //Encaminha para a pagina de funcionario
                    echo("<script>funcionario();</script>");
                    break;

                case "BUSCAR":
                    $funcionario = $controllerFuncionario->buscarFuncionario();

                    require_once(IMPORT_CMS_CADASTRO_FUNCIONARIO);
                    break;

                case "ATUALIZAR":
                    $erro = $controllerFuncionario->atualizarFuncionario();

                    if($erro){
                        echo("<script>alert('Não foi possível atualizar o funcionário.');</script>");
                    }else{
                        echo("<script>alert('Funcionário atualizado.');</script>");
                    }

                    echo("<script>funcionario();</script>");
                    break;

                case "LOGAR":
                    $idFuncionario = $controllerFuncionario->logar();
                    //Verifica se retornou um funcionário corretamente para mostrar um erro
                    if(!$idFuncionario){
                        echo("<script>alert('Login ou senha inválidos.');</script>");
                    }

                    require_once(IMPORT_CMS_INDEX);
                    break;

            }
            break;
            case "PARCEIROS":

            require_once(IMPORT_PARCEIRO_CONTROLLER);

            $controllerParceiro = new controllerParceiro();

            switch ($modo){
                case "INSERIR":
                    //Chamando o método de inserir um novo funcionario
                    $erro = $controllerParceiro->inserirParceiro();

                    if($erro){
                        echo("<script>alert('Não foi possível adicionar o parceiro.');</script>");
                    }else{
                        echo("<script>alert('Parceiro adicionado.');</script>");
                    }

                    //Encaminha para a pagina de funcionario
                    echo("<script>parceiro();</script>");
                break;

                case "EXCLUIR":
                    //Chama o método para excluir o funcionario
                    $erro = $controllerParceiro->excluirParceiro();

                    if($erro){
                        echo("<script>alert('Não foi possível excluir o parceiro.');</script>");
                    }else{
                        echo("<script>alert('Parceiro apagado.');</script>");
                    }

                    //Encaminha para a pagina de funcionario
                    echo("<script>parceiro();</script>");
                break;

                case "BUSCAR":
                    $parceiro = $controllerParceiro->buscarParceiro();

                    require_once(IMPORT_CMS_CADASTRO_PARCEIRO);

                break;

                case "ATUALIZAR":
                    $erro = $controllerParceiro->atualizarParceiro();

                    if($erro){
                        echo("<script>alert('Não foi possível atualizar o parceiro.');</script>");
                    }else{
                        echo("<script>alert('Parceiro atualizado.');</script>");
                    }

                    echo("<script>parceiro();</script>");
                break;
            }

            break;
            

        case "FUNCIONAMENTO":

            require_once(IMPORT_FUNCIONAMENTO_CONTROLLER);

            $controllerFuncionamento = new controllerFuncionamento();

            switch ($modo){
                case "INSERIR":
                    //Chamando o método de inserir um novo funcionario
                    $erro = $controllerFuncionamento->inserirFuncionamento();

                    if($erro){
                        echo("<script>alert('Não foi possível adicionar o funcionamento.');</script>");
                    }else{
                        echo("<script>alert('Funcionamento adicionado.');</script>");
                    }

                    //Encaminha para a pagina de funcionario
                    echo("<script>comoFunciona();</script>");
                break;

                case "EXCLUIR":
                    //Chama o método para excluir o funcionario
                    $erro = $controllerFuncionamento->excluirFuncionamento();

                    if($erro){
                        echo("<script>alert('Não foi possível excluir o funcionamento.');</script>");
                    }else{
                        echo("<script>alert('Funcionamento apagado.');</script>");
                    }

                    //Encaminha para a pagina de funcionario
                    echo("<script>comoFunciona();</script>");
                break;

                case "BUSCAR":
                    $funcionamento = $controllerFuncionamento->buscarFuncionamento();

                    require_once(IMPORT_CMS_CADASTRO_FUNCIONAMENTO);

                break;

                case "ATUALIZAR":
                    $erro = $controllerFuncionamento->atualizarFuncionamento();

                    if($erro){
                        echo("<script>alert('Não foi possível atualizar o funcionamento.');</script>");
                    }else{
                        echo("<script>alert('Funcionamento atualizado.');</script>");
                    }

                    echo("<script>comoFunciona();</script>");
                break;
            }       
         break;

        case "PENDENCIAUSUARIO":

            require_once(IMPORT_PENDENCIA_CONTROLLER);

            $controllerPendencia = new controllerPendencia();

            switch ($modo){
                case "BUSCAR":
                    $pendencia = $controllerPendencia->buscarPendencia("USUARIO");

                    require_once(IMPORT_CMS_CADASTRO_PENDENCIA_USUARIO);

                break;

                case "ATUALIZAR":
                    $erro = $controllerPendencia->atualizarPendencia("USUARIO");

                    if($erro){
                        echo("<script>alert('Não foi possível atualizar a pendência.');</script>");
                    }else{
                        echo("<script>alert('Pendência atualizada.');</script>");
                    }

                    echo("<script>aprovacaoUsuario();</script>");
                break;
            }       
        break;

        case "PENDENCIAVEICULO":

            require_once(IMPORT_PENDENCIA_CONTROLLER);

            $controllerPendencia = new controllerPendencia();

            switch ($modo){
                case "BUSCAR":
                    $pendencia = $controllerPendencia->buscarPendencia("VEICULO");

                    require_once(IMPORT_CMS_CADASTRO_PENDENCIA_VEICULO);

                break;

                case "ATUALIZAR":
                    $erro = $controllerPendencia->atualizarPendencia("VEICULO");

                    if($erro){
                        echo("<script>alert('Não foi possível atualizar a pendência.');</script>");
                    }else{
                        echo("<script>alert('Pendência atualizada.');</script>");
                    }

                    echo("<script>aprovacaoVeiculo();</script>");
                break;
            }       
        break;
    }
}
?>
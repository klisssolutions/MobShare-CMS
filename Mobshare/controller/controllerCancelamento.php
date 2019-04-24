<?php
/*
    Projeto: MobShare
    Autor: Leonardo
    Data Criação: 03/02/2019
    Data Modificação:
    Conteudo Modificação: 
    Autor da Modificação: 
    Objetivo da classe: Controller de veiculos
*/

(@session_start());
require_once($_SESSION["importInclude"]);

class controllerCancelamento{

    public function __construct(){
        //Import da classe nivel
        require_once(IMPORT_CANCELAMENTO);

        //Import da classe nivelDAO, para inserir no BD
        require_once(IMPORT_CANCELAMENTO_DAO);
    }


    public function listarCancelamentosNaoConfirmados(){
        require_once(IMPORT_VVISUALIZACAO_CANCELAMENTO_DAO);
        //Instancia do DAO
        $vvisualizacao_cancelamentoDAO = new vvisualizacao_cancelamentoDAO();

        //Pega o ID para realizar a busca
        //$idMarca = $_GET["id"];

        return $vvisualizacao_cancelamentoDAO->listarNaoConfirmados();
    }    

    public function aceitarCancelamento(){
        //Instancia do DAO
        $cancelamentoDAO = new cancelamentoDAO();

        
        $idCancelamento = $_GET["id"];
        
        return $cancelamentoDAO->confirmarCancelamento($idCancelamento);
    }      
    
    public function recusarCancelamento(){
        //Instancia do DAO
        $cancelamentoDAO = new cancelamentoDAO();

        $idCancelamento = $_GET["id"];

        return $cancelamentoDAO->recusarCancelamento($idCancelamento);
    }    
}
?>
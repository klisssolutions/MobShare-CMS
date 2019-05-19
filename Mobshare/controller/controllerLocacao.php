<?php
/*
    Projeto: MobShare
    Autor: Leonardo
    Data Criação: 06/05/2019
    Data Modificação:
    Conteudo Modificação:
    Autor da Modificação:
    Objetivo da classe:
*/

(@session_start());
require_once($_SESSION["importInclude"]);

class controllerLocacao{

    public function __construct(){
        //Import da classe nivel
        require_once(IMPORT_SOLICITACAO_LOCACAO);

        //Import da classe nivelDAO, para inserir no BD
        require_once(IMPORT_SOLICITACAO_LOCACAO_DAO);
    }

    public function listarLocacaoPorLocador(){
        
        $idLocador = $_GET['id'];
        //Instancia do DAO
        $solicitacao_locacaoDAO = new solicitacao_locacaoDAO();
        return($solicitacao_locacaoDAO->selectAllPorLocador($idLocador));

    }

}
?>
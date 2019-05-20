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
        require_once(IMPORT_V_HISTORICO_LOCACAO);

        //Import da classe nivelDAO, para inserir no BD
        require_once(IMPORT_V_HISTORICO_LOCACAO_DAO);
    }

    public function listarHistoricoLocacaoPorLocador(){
        
        $idLocador = $_GET['id'];
        //Instancia do DAO
        $vhistorico_locacaoDAO = new vhistorico_locacaoDAO();
        return($vhistorico_locacaoDAO->selecionarHistoricoLocacoes($idLocador));

    }

    public function receber(){
        
        $idLocacao = $_GET['id'];
        //Instancia do DAO
        $vhistorico_locacaoDAO = new vhistorico_locacaoDAO();
        return($vhistorico_locacaoDAO->receber($idLocacao));

    }


    public function devolver(){
        
        $idLocacao = $_GET['id'];
        //Instancia do DAO
        $vhistorico_locacaoDAO = new vhistorico_locacaoDAO();
        return($vhistorico_locacaoDAO->devolver($idLocacao));

    }

}
?>
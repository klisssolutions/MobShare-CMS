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

class controllerV_detalhes_locacao{

    public function __construct(){
        
        require_once(IMPORT_V_DETALHES_LOCACAO);

        
        require_once(IMPORT_V_DETALHES_LOCACAO_DAO);
    }

    public function listarLocacoes(){
        //Instancia do DAO
        $v_detalhes_locacaoDAO = new v_detalhes_locacaoDAO();
        return($v_detalhes_locacaoDAO->selectAll());
    }

    public function buscarBanner(){
        //Instancia do DAO
        $bannerDAO = new bannerDAO();

        //Pega o ID para realizar a busca
        $id = $_GET["id"];
        
        return $bannerDAO->selectById($id);
    }
}
?>
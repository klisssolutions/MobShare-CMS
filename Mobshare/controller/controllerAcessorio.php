<?php
/*
    Projeto: MobShare
    Autor: Emanuelly
    Data Criação: 29/04/2019
    Data Modificação:
    Conteudo Modificação: 
    Autor da Modificação: 
    Objetivo da classe: Controller da API para Anuncios
*/

@session_start();
require_once($_SESSION["importInclude"]); 

class controllerAcessorio{

    public function __construct(){
        //Import da classe funcionario
        require_once(IMPORT_ACESSORIO);

        //Import da classe funcionarioDAO, para inserir no BD
        require_once(IMPORT_ACESSORIO_DAO);
    }


    public function listarAcessorioPorVeiculo(){
        $idVeiculo = $_GET['id'];
        $acessorioDAO = new acessorioDAO();
        return($acessorioDAO->selectByVeiculo($idVeiculo));
    }



}
?>
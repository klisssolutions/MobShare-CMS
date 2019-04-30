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

class controllerAnuncios{

    public function __construct(){
        //Import da classe funcionario
        require_once(IMPORT_ANUNCIOS);

        //Import da classe funcionarioDAO, para inserir no BD
        require_once(IMPORT_ANUNCIOS_DAO);
    }


    public function listarAnuncio(){
        //Instancia do DAO criado para ser usado em todos os outros métodos
        $anunciosDAO = new anunciosDAO();
        return($anunciosDAO->selectAll());
    }



    public function buscarAnuncio(){
        $id = $_GET["id"];

        $anunciosDAO = new anunciosDAO();

        return $anunciosDAO->selectById($id);

    
    }
}
?>
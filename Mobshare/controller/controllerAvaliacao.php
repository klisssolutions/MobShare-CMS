<?php
/*
    Projeto: MobShare
    Autor: Emanuelly
    Data Criação: 10/04/2019
    Data Modificação:
    Conteudo Modificação: 
    Autor da Modificação: 
    Objetivo da classe: Controller da página Avaliação
*/

@session_start();
require_once($_SESSION["importInclude"]); 

class controllerAvaliacao{

    public function __construct(){
        //Import da classe avakiacaoVeiculo
        require_once(IMPORT_AVALIACAO);

        //Import da classe DAO, para inserir no BD
        require_once(IMPORT_AVALIACAO_DAO);
    }

    public function inserirAvaliacao(){
        //Instancia do DAO criado para ser usado em todos os outros métodos
        $avaliacaoDAO = new avaliacaoDAO();
        
        //Verifica qual metodo esta sendo requisitado do formulario(POST ou GET)
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $nota = $_POST["sltNota"];
            $depoimento = $_POST["txtDepoimento"];
            $idLocacao = $_POST["sltLocacao"];


            //Instancia da classe
            $avaliacao = new Avaliacao();

            //Guardando os dados do post no objeto da classe
            $avaliacao->setNota($nota);
            $avaliacao->setDepoimento($depoimento);
            $avaliacao->setIdLocacao($idLocacao);

            /* Chamada para o metodo de inserir no BD, passando como parâmetro o objeto
            contatoClass que tem todos os dados que serão inseridos no banco de dados */
            return $avaliacaoDAO->insert($avaliacao);
        }
    }

    public function listarAvaliacao(){
        //Instancia do DAO criado para ser usado em todos os outros métodos
        $avaliacaoDAO = new avaliacaoDAO();
        return($avaliacaoDAO->selectAll());
    }

    public function buscarAvaliacao(){
        $id = $_GET["id"];

        $avaliacaoDAO = new avaliacaoDAO();

        return $avaliacaoDAO->selectById($id);
    }
}

?>
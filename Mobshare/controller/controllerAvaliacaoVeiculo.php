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

class controllerAvaliacaoVeiculo{

    public function __construct(){
        //Import da classe avakiacaoVeiculo
        require_once(IMPORT_AVALIACAO_VEICULO);

        //Import da classe DAO, para inserir no BD
        require_once(IMPORT_AVALIACAO_VEICULO_DAO);
    }

    public function listarAvaliacaoVeiculos(){
        //Instancia do DAO criado para ser usado em todos os outros métodos
        $avaliacaoVeiculoDAO = new avaliacaoVeiculoDAO();
        return($avaliacaoVeiculoDAO->selectAll());
    }


    public function pegarAvaliacaoPorVeiculo($id){
        //Instancia do DAO criado para ser usado em todos os outros métodos
        
      // $id = $_GET["id"];

        $avaliacaoVeiculoDAO = new avaliacaoVeiculoDAO();

        return($avaliacaoVeiculoDAO->selectByVeiculo($id));
    }

    /*public function buscarAvaliacaoVeiculos(){
        $id = $_GET["id"];

        $avaliacaoVeiculoDAO = new avaliacaoVeiculoDAO();

        return $avaliacaoVeiculoDAO->selectById($id);
    }*/
}

?>
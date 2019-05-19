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

class controllerSolicitacao_Locacao{

    public function __construct(){
        //Import da classe nivel
        require_once(IMPORT_SOLICITACAO_LOCACAO);

        //Import da classe nivelDAO, para inserir no BD
        require_once(IMPORT_SOLICITACAO_LOCACAO_DAO);
    }

    public function inserirSolicitacao_Locacao(){
        //Instancia do DAO
        $solicitacao_locacaoDAO = new solicitacao_locacaoDAO();

        //Verifica qual metodo esta sendo requisitado do formulario(POST ou GET)
     

        //Instancia da classe
        $solicitacao_Locacao = new Solicitacao_Locacao();


        //Mudar para POST futuramente
        $idCliente = $_GET["idCliente"];
        $idVeiculo = $_GET["idVeiculo"];
        $horarioInicio = $_GET["txtHorarioInicio"];
        $horarioFim = $_GET["txtHorarioFim"];

    
        //Guardando os dados do post no objeto da classe
        $solicitacao_Locacao->setIdCliente($idCliente);
        $solicitacao_Locacao->setIdVeiculo($idVeiculo);
        $solicitacao_Locacao->setHorarioInicio($horarioInicio);
        $solicitacao_Locacao->setHorarioFim($horarioFim);
        

        /* Chamada para o metodo de inserir no BD, passando como parâmetro o objeto
        contatoClass que tem todos os dados que serão inseridos no banco de dados */
        return $solicitacao_locacaoDAO->insert($solicitacao_Locacao);
        
    }

    public function aceitarSolicitacao(){

        $idSolicitacao = $_GET['id'];
        //Instancia do DAO
        $solicitacao_locacaoDAO = new solicitacao_locacaoDAO();
        return($solicitacao_locacaoDAO->aceitar($idSolicitacao));
    }

    public function recusarSolicitacao(){

        $idSolicitacao = $_GET['id'];
        //Instancia do DAO
        $solicitacao_locacaoDAO = new solicitacao_locacaoDAO();
        return($solicitacao_locacaoDAO->recusar($idSolicitacao));
    }

    public function listarSolicitacaoLocacaoPorLocador(){
        
        $idLocador = $_GET['id'];
        //Instancia do DAO
        $solicitacao_locacaoDAO = new solicitacao_locacaoDAO();
        return($solicitacao_locacaoDAO->selectAllPorLocador($idLocador));

    }

}
?>
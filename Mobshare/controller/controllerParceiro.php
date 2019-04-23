<?php
/*
    Projeto: MobShare
    Autor: Kaio
    Data Criação: 02/04/2019
    Data Modificação:
    Conteudo Modificação:
    Autor da Modificação:
    Objetivo da classe: Controller de Parceiro
*/

(@session_start());
require_once($_SESSION["importInclude"]);

class controllerParceiro{

    public function __construct(){
        //Import da classe parceiro
        require_once(IMPORT_PARCEIRO);

        //Import da classe parceiroDAO, para inserir no BD
        require_once(IMPORT_PARCEIRO_DAO);   
    }

    public function inserirParceiro(){
        //Instancia do DAO
        $parceiroDAO = new parceiroDAO();

        //Verifica qual metodo esta sendo requisitado do formulario(POST ou GET)
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $nome = $_POST["txtNome"];
            $email = $_POST["txtEmail"];
            $site = $_POST["txtSite"];
            $descricao = $_POST["txtDescricao"];
            $logo = enviarImagem($_FILES['imgLogo']);
            $ativo = $_POST["sltAtivo"];
            
            //Instancia da classe
            $parceiro = new Parceiro();

            //Guardando os dados do post no objeto da classe
            $parceiro->setNome($nome);
            $parceiro->setEmail($email);
            $parceiro->setSite($site);
            $parceiro->setDescricao($descricao);
            $parceiro->setLogo($logo);
            $parceiro->setAtivo($ativo);

            /* Chamada para o metodo de inserir no BD, passando como parâmetro o objeto
            contatoClass que tem todos os dados que serão inseridos no banco de dados */
            return $parceiroDAO->insert($parceiro);
        }
    }

    public function excluirParceiro(){
        //Instancia do DAO
        $parceiroDAO = new parceiroDAO();
        //Esse id foi enviado pela view no href, o arquivo de rota é quem chamou este método
        $id = $_GET["id"];

        //Chamada para o método de excluir um parceiro
        return $parceiroDAO->delete($id);
    }

    public function atualizarParceiro(){
        //Instancia do DAO
        $parceiroDAO = new parceiroDAO();

        //Verifica qual metodo esta sendo requisitado do formulario(POST ou GET)
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $id = $_GET["id"];
            $nome = $_POST["txtNome"];
            $email = $_POST["txtEmail"];
            $site = $_POST["txtSite"];
            $logo = ($_FILES['imgLogo']["size"] ? enviarImagem($_FILES['imgLogo']) : null);
            $descricao = $_POST["txtDescricao"];
            $ativo = $_POST["sltAtivo"];

           
            //Instancia da classe
            $parceiro = new Parceiro();

            //Guardando os dados do post no objeto da classe
            $parceiro->setIdParceiro($id);
            $parceiro->setNome($nome);
            $parceiro->setEmail($email);
            $parceiro->setSite($site);
            $parceiro->setDescricao($descricao);
            $parceiro->setLogo($logo);
            $parceiro->setAtivo($ativo);

            /* Chamada para o metodo de inserir no BD, passando como parâmetro o objeto
            contatoClass que tem todos os dados que serão inseridos no banco de dados */
            return $parceiroDAO->update($parceiro);
        }
    }

    public function listarParceiro(){
        //Instancia do DAO
        $parceiroDAO = new parceiroDAO();
        return($parceiroDAO->selectAll());
    }

    public function buscarParceiro(){
        //Instancia do DAO
        $parceiroDAO = new parceiroDAO();

        //Pega o ID para realizar a busca
        $id = $_GET["id"];

        $parceiro = new Parceiro();
        $parceiro = $parceiroDAO->selectById($id);
        return $parceiro;
    }
}
?>
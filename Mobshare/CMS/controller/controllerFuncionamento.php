<?php
/*
    Projeto: MobShare
    Autor: Kaio
    Data Criação: 05/04/2019
    Data Modificação:
    Conteudo Modificação:
    Autor da Modificação:
    Objetivo da classe:
*/

(@session_start());
require_once($_SESSION["importInclude"]);

class controllerFuncionamento{

    public function __construct(){
        //Import da classe nivel
        require_once(IMPORT_FUNCIONAMENTO);

        //Import da classe nivelDAO, para inserir no BD
        require_once(IMPORT_FUNCIONAMENTO_DAO);
    }

    public function inserirFuncionamento(){
        //Instancia do DAO
        $funcionamentoDAO = new funcionamentoDAO();

        require_once('function.php');

        //Verifica qual metodo esta sendo requisitado do formulario(POST ou GET)
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $titulo = $_POST["txtTitulo"];
            $descricao = $_POST["txtDescricao"];
            $foto = imagens($_FILES['imgFoto']);

            //Instancia da classe
            $funcionamento = new Funcionamento();

            //Guardando os dados do post no objeto da classe
            $funcionamento->setTitulo($titulo);
            $funcionamento->setDescricao($descricao);
            $funcionamento->setFoto($foto);

            /* Chamada para o metodo de inserir no BD, passando como parâmetro o objeto
            contatoClass que tem todos os dados que serão inseridos no banco de dados */
            $funcionamentoDAO->insert($funcionamento);
        }
    }

    public function excluirFuncionamento(){
        //Instancia do DAO
        $funcionamentoDAO = new funcionamentoDAO();
        //Esse id foi enviado pela view no href, o arquivo de rota é quem chamou este método
        $id = $_GET["id"];

        //Chamada para o método de excluir um nivel
        $funcionamentoDAO->delete($id);
    }

    public function atualizarFuncionamento(){
        $funcionamentoDAO = new funcionamentoDAO();

        require_once('function.php');

        //Verifica qual metodo esta sendo requisitado do formulario(POST ou GET)
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $id = $_GET["id"];
            $titulo = $_POST["txtTitulo"];
            $foto = ($_FILES['imgFoto']["size"] ? imagens($_FILES['imgFoto']) : null);
            $descricao = $_POST["txtDescricao"];

           
            //Instancia da classe
            $funcionamento = new Funcionamento();

            //Guardando os dados do post no objeto da classe
            $funcionamento->setIdFuncionamento($id);
            $funcionamento->setTitulo($titulo);
            $funcionamento->setDescricao($descricao);
            $funcionamento->setFoto($foto);

            /* Chamada para o metodo de inserir no BD, passando como parâmetro o objeto
            contatoClass que tem todos os dados que serão inseridos no banco de dados */
            $funcionamentoDAO->update($funcionamento);
        }
        
    }

    public function listarFuncionamento(){
        //Instancia do DAO
        $funcionamentoDAO = new funcionamentoDAO();
        return($funcionamentoDAO->selectAll());
    }

    public function buscarFuncionamento(){
        //Instancia do DAO
        $funcionamentoDAO = new funcionamentoDAO();

        //Pega o ID para realizar a busca
        $id = $_GET["id"];

        $funcionamento = new Funcionamento();
        $funcionamento = $funcionamentoDAO->selectById($id);
        return $funcionamento;
    }
}
?>
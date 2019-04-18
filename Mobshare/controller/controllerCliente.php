<?php
/*
    Projeto: MobShare
    Autor: Igor
    Data Criação: 03/04/2019
    Data Modificação:
    Conteudo Modificação: 
    Autor da Modificação: 
    Objetivo da classe: Controller de Niveis
*/

(@session_start());
require_once($_SESSION["importInclude"]);

class controllerCliente{

    public function __construct(){
        //Import da classe nivel
        require_once(IMPORT_CLIENTE);

        //Import da classe nivelDAO, para inserir no BD
        require_once(IMPORT_CLIENTE_DAO);
    }

    public function logar(){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $clienteDAO = new clienteDAO();

            $email = $_POST["txtemail"];
            $senha = $_POST["txtsenha"];

            return($clienteDAO->logar($email, $senha));
        }

    }

    public function inserirNivel(){
        //Instancia do DAO
        $clienteDAO = new clienteDAO();

        //Verifica qual metodo esta sendo requisitado do formulario(POST ou GET)
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $nome = $_POST["txtnome"];
            $descricao = $_POST["txtdescricao"];
            $permissoes = 0;

            //Instancia da classe
            $nivel = new Nivel();

            //Guardando os dados do post no objeto da classe
            $nivel->setNome($nome);
            $nivel->setDescricao($descricao);
            $nivel->setPermissoes($permissoes);

            /* Chamada para o metodo de inserir no BD, passando como parâmetro o objeto
            contatoClass que tem todos os dados que serão inseridos no banco de dados */
            return $nivelDAO->insert($nivel);
        }
    }

    public function excluirNivel(){
        //Instancia do DAO
        $nivelDAO = new nivelDAO();
        //Esse id foi enviado pela view no href, o arquivo de rota é quem chamou este método
        $id = $_GET["id"];

        //Chamada para o método de excluir um nivel
        return $nivelDAO->delete($id);
    }

    public function atualizarNivel(){
        //Instancia do DAO
        $nivelDAO = new nivelDAO();

        //Verifica qual metodo esta sendo requisitado do formulario(POST ou GET)
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $id = $_GET["id"];
            $nome = $_POST["txtnome"];
            $descricao = $_POST["txtdescricao"];
            $permissoes = 0;

            //Instancia da classe
            $nivel = new Nivel();

            //Guardando os dados do post no objeto da classe
            $nivel->setIdNivel($id);
            $nivel->setNome($nome);
            $nivel->setDescricao($descricao);
            $nivel->setPermissoes($permissoes);

            /* Chamada para o metodo de inserir no BD, passando como parâmetro o objeto
            contatoClass que tem todos os dados que serão inseridos no banco de dados */
            return $nivelDAO->update($nivel);
        }
    }

    public function listarNiveis(){
        //Instancia do DAO
        $nivelDAO = new nivelDAO();
        return($nivelDAO->selectAll());
    }

    public function buscarNivel(){
        //Instancia do DAO
        $nivelDAO = new nivelDAO();

        //Pega o ID para realizar a busca
        $id = $_GET["id"];

        $nivel = new Nivel();
        $nivel = $nivelDAO->selectById($id);
        return $nivel;
    }
}
?>
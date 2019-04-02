<?php
/*
    Projeto: MobShare
    Autor: Igor
    Data Criação: 27/03/2019
    Data Modificação:29/03/2019
    Conteudo Modificação: Uso das constantes de import
    Autor da Modificação: Leonardo
    Objetivo da classe: Controller de Funcionarios
*/

@session_start();
require_once($_SESSION["importInclude"]); 

class controllerFuncionario{

    public function __construct(){
        //Import da classe funcionario
        require_once(IMPORT_FUNCIONARIO);

        //Import da classe funcionarioDAO, para inserir no BD
        require_once(IMPORT_FUNCIONARIO_DAO);
    }



    public function logar(){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $funcionarioDAO = new funcionarioDAO();

            $nome = $_POST["txtnome"];
            $senha = $_POST["txtsenha"];

            return($funcionarioDAO->logar($nome, $senha));
        }

    }

    public function inserirFuncionario(){
        //Instancia do DAO criado para ser usado em todos os outros métodos
        $funcionarioDAO = new funcionarioDAO();
        
        //Verifica qual metodo esta sendo requisitado do formulario(POST ou GET)
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $nome = $_POST["txtnome"];
            $senha = $_POST["txtsenha"];
            $nivel = $_POST["cbbnivel"];


            //Instancia da classe
            $funcionario = new Funcionario();

            //Guardando os dados do post no objeto da classe
            $funcionario->setNome($nome);
            $funcionario->setSenha($senha);
            $funcionario->setIdNivel($nivel);

            //Itens não alteráveis pelo CMS
            $funcionario->setEmail("sdasd@dsad");

            /* Chamada para o metodo de inserir no BD, passando como parâmetro o objeto
            contatoClass que tem todos os dados que serão inseridos no banco de dados */
            $funcionarioDAO->insert($funcionario);
        }
    }

    public function excluirFuncionario(){
        //Instancia do DAO criado para ser usado em todos os outros métodos
        $funcionarioDAO = new funcionarioDAO();

        //Esse id foi enviado pela view no href, o arquivo de rota é quem chamou este método
        $id = $_GET["id"];

        //Chamada para o método de excluir um contato
        $funcionarioDAO->delete($id);
    }

    public function atualizarFuncionario(){
        if($_SERVER["REQUEST_METHOD"] == "POST"){

            $id = $_GET["id"];
            $nome = $_POST["txtnome"];
            $senha = $_POST["txtsenha"];
            $idNivel = $_POST["cbbnivel"];
         

            //Instancia da classe
            $funcionario = new Funcionario();
            $funcionarioDAO = new FuncionarioDAO();

            //Guardando os dados do post no objeto da classe
            $funcionario->setIdUsuarioWeb($id);
            $funcionario->setNome($nome);
            $funcionario->setSenha($senha);
            $funcionario->setIdNivel($idNivel);
            
            $funcionario->setEmail("sdasd@dsad");
            
            /* Chamada para o metodo de inserir no BD, passando como parâmetro o objeto
            contatoClass que tem todos os dados que serão inseridos no banco de dados */
            $funcionarioDAO->update($funcionario);
        }
    }

    public function listarFuncionario(){
        //Instancia do DAO criado para ser usado em todos os outros métodos
        $funcionarioDAO = new funcionarioDAO();
        return($funcionarioDAO->selectAll());
    }

    public function buscarFuncionario(){
        $id = $_GET["id"];

        $funcionarioDAO = new funcionarioDAO();

        return $funcionarioDAO->selectById($id);

    
    }
}
?>
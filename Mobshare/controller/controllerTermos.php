<?php
/*
    Projeto: MobShare
    Autor: Manu
    Data Criação: 27/03/2019
    Data Modificação:29/03/2019
    Conteudo Modificação: 
    Autor da Modificação: 
    Objetivo da classe: Controller da página Termos
*/

@session_start();
require_once($_SESSION["importInclude"]); 

class controllerTermos{

    public function __construct(){
        //Import da classe funcionario
        require_once(IMPORT_TERMOS);

        //Import da classe funcionarioDAO, para inserir no BD
        require_once(IMPORT_TERMOS_DAO);
    }

    public function inserirTermos(){
        //Instancia do DAO criado para ser usado em todos os outros métodos
        $termosDAO = new termosDAO();
        
        //Verifica qual metodo esta sendo requisitado do formulario(POST ou GET)
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $titulo = $_POST["txtTitulo"];
            $texto = $_POST["txtTexto"];
            $sltAtivo = $_POST["sltAtivo"];


            //Instancia da classe
            $termos = new Termos();

            //Guardando os dados do post no objeto da classe
            $termos->setTitulo($titulo);
            $termos->setTexto($texto);
            $termos->setAtivo($sltAtivo);

            /* Chamada para o metodo de inserir no BD, passando como parâmetro o objeto
            contatoClass que tem todos os dados que serão inseridos no banco de dados */
            return $termosDAO->insert($termos);
        }
    }

    public function listarTermos(){
        //Instancia do DAO criado para ser usado em todos os outros métodos
        $termosDAO = new termosDAO();
        return($termosDAO->selectAll());
    }

    public function excluirTermos(){
        //Instancia do DAO criado para ser usado em todos os outros métodos
        $termosDAO = new termosDAO();

        //Esse id foi enviado pela view no href, o arquivo de rota é quem chamou este método
        $id = $_GET["id"];

        //Chamada para o método de excluir um contato
        return $termosDAO->delete($id);
    }

    public function atualizarTermos(){
        if($_SERVER["REQUEST_METHOD"] == "POST"){

            $id = $_GET["id"];
            $titulo = $_POST["txtTitulo"];
            $texto = $_POST["txtTexto"];
            $sltAtivo = $_POST["sltAtivo"];
         
            //Instancia da classe
            $termos = new Termos();
            $termosDAO = new TermosDAO();

            //Guardando os dados do post no objeto da classe
            $termos->setIdTermo($id);
            $termos->setTitulo($titulo);
            $termos->setTexto($texto);
            $termos->setAtivo($sltAtivo);
            
            
            /* Chamada para o metodo de inserir no BD, passando como parâmetro o objeto
            contatoClass que tem todos os dados que serão inseridos no banco de dados */
            return $termosDAO->update($termos);
        }
    }


    public function buscarTermo(){
        $id = $_GET["id"];

        $termosDAO = new termosDAO();

        return $termosDAO->selectById($id);
    }
}
?>
<?php
/*
    Projeto: MobShare
    Autor: Kaio
    Data Criação: 07/05/2019
    Data Modificação:
    Conteudo Modificação:
    Autor da Modificação:
    Objetivo da classe: Controller de categorias
*/

(@session_start());
require_once($_SESSION["importInclude"]);

class controllerCategoria{

    public function __construct(){
        //Import da classe nivel
        require_once(IMPORT_CATEGORIA);

        //Import da classe nivelDAO, para inserir no BD
        require_once(IMPORT_CATEGORIA_DAO);
    }

    public function inserirCategorias(){
        //Instancia do DAO criado para ser usado em todos os outros métodos
        $modeloDAO = new modeloDAO();
        
        //Verifica qual metodo esta sendo requisitado do formulario(POST ou GET)
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $nomeModelo = $_POST["txtModelo"];
            $marca = $_POST["cbbMarca"];

            //Instancia da classe
            $modelo = new Modelo();

            //Guardando os dados do post no objeto da classe
            $modelo->setNomeModelo($nomeModelo);
            $modelo->setIdMarca($marca);

            /* Chamada para o metodo de inserir no BD, passando como parâmetro o objeto
            marcaClass que tem todos os dados que serão inseridos no banco de dados */
            return $modeloDAO->insert($modelo);
        }
    }

    public function excluirCategorias(){
        //Instancia do DAO
        $modeloDAO = new modeloDAO();
        //Esse id foi enviado pela view no href, o arquivo de rota é quem chamou este método
        $id = $_GET["id"];

        //Chamada para o método de excluir um nivel
        return $modeloDAO->delete($id);
    }


    public function atualizarCategorias(){
        if($_SERVER["REQUEST_METHOD"] == "POST"){

            $id = $_GET["id"];
            $nomeModelo = $_POST["txtModelo"];
            $idMarca = $_POST["cbbMarca"];

            //Instancia da classe
            $modelo = new Modelo();
            $modeloDAO = new modeloDAO();

            //Guardando os dados do post no objeto da classe
            $modelo->setIdModelo($id);
            $modelo->setNomeModelo($nomeModelo);
            $modelo->setIdMarca($idMarca);
            
            
            /* Chamada para o metodo de inserir no BD, passando como parâmetro o objeto
            contatoClass que tem todos os dados que serão inseridos no banco de dados */
            return $modeloDAO->update($modelo);
        }
    }

    public function buscarCategorias(){
        //ARRUMAR A BUSCA para a pagina inicial
        $id = 1;

        $modeloDAO = new modeloDAO();
        
        return $modeloDAO->selectById($id);
    }

    public function buscarModelo($idModelo){
        //Instancia do DAO
        $modeloDAO = new modeloDAO();

        //Pega o ID para realizar a busca
       // $idModelo = $_GET["id"];

        
        return $modeloDAO->selectById($idModelo);
    }    

    public function listarCategorias(){
        //Instancia do DAO
        $categoriaDAO = new categoriaDAO();
        return $categoriaDAO->selectAll();
    }
}
?>
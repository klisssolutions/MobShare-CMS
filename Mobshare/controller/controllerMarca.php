<?php
/*
    Projeto: MobShare
    Autor: Leonardo
    Data Criação: 03/02/2019
    Data Modificação: 16/04/2019
    Conteudo Modificação: inserindo mais funcões
    Autor da Modificação: Emanuelly
    Objetivo da classe: Controller da Marca
*/

(@session_start());
require_once($_SESSION["importInclude"]);

class controllerMarca{

    public function __construct(){
        //Import da classe nivel
        require_once(IMPORT_MARCA);

        //Import da classe nivelDAO, para inserir no BD
        require_once(IMPORT_MARCA_DAO);
    }

    public function inserirMarcas(){
        //Instancia do DAO criado para ser usado em todos os outros métodos
        $marcaDAO = new marcaDAO();
        
        //Verifica qual metodo esta sendo requisitado do formulario(POST ou GET)
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $nomeMarca = $_POST["txtMarca"];

            //Instancia da classe
            $marca = new Marca();

            //Guardando os dados do post no objeto da classe
            $marca->setNomeMarca($nomeMarca);

            /* Chamada para o metodo de inserir no BD, passando como parâmetro o objeto
            marcaClass que tem todos os dados que serão inseridos no banco de dados */
            return $marcaDAO->insert($marca);
        }
    }

    public function excluirMarcas(){
        //Instancia do DAO
        $marcaDAO = new marcaDAO();
        //Esse id foi enviado pela view no href, o arquivo de rota é quem chamou este método
        $id = $_GET["id"];

        //Chamada para o método de excluir um nivel
        return $marcaDAO->delete($id);
    }


    public function atualizarMarcas(){
        if($_SERVER["REQUEST_METHOD"] == "POST"){

            $id = $_GET["id"];
            $nomeMarca = $_POST["txtMarca"];
         

            //Instancia da classe
            $marcas = new Marca();
            $marcaDAO = new MarcaDAO();
            

            //Guardando os dados do post no objeto da classe
            $marcas->setIdMarca($id);
            $marcas->setNomeMarca($nomeMarca);
            
            
            /* Chamada para o metodo de inserir no BD, passando como parâmetro o objeto
            contatoClass que tem todos os dados que serão inseridos no banco de dados */
            return $marcaDAO->update($marcas);
        }
    }



    public function buscarMarcas(){

        //Pega o ID para realizar a busca
        $id = $_GET["id"];
        //Instancia do DAO
        $marcaDAO = new marcaDAO();
        
        return $marcaDAO->selectById($id);
    }

    public function listarMarcas(){
        //Instancia do DAO
        $marcaDAO = new marcaDAO();
        return $marcaDAO->selectAll();
    }    
}
?>
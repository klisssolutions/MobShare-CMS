<?php
/*
    Projeto: MobShare
    Autor: Kaio
    Data Criação: 06/04/2019
    Data Modificação:
    Conteudo Modificação:
    Autor da Modificação:
    Objetivo da classe: Controller para pendencias de usuario
*/

(@session_start());
require_once($_SESSION["importInclude"]);

class controllerPendencia{

    public function __construct(){
        //Import da classe nivel
        require_once(IMPORT_PENDENCIA);

        //Import da classe nivelDAO, para inserir no BD
        require_once(IMPORT_PENDENCIA_DAO);
    }

    public function atualizarPendencia($tipoPendencia){
        //Instancia do DAO
        $pendenciaDAO = new pendenciaDAO();

        //Verifica qual metodo esta sendo requisitado do formulario(POST ou GET)
        if($_SERVER["REQUEST_METHOD"] == "POST"){

            //Instancia da classe
            $pendencia = new Pendencia();

            $id = $_GET["id"];
            $motivo = $_POST["txtmotivo"];
            $aberto = 0;
            //Checa se a permissoes de contato foi marcada
            if(isset($_POST['chkaberto'])){
                $aberto += PENDENCIA_ABERTA;
            }
            //Guardando os dados do post no objeto da classe
            $pendencia->setIdPendencia($id);
            $pendencia->setMotivo($motivo);
            $pendencia->setAberto($aberto);

            /* Chamada para o metodo de inserir no BD, passando como parâmetro o objeto
            contatoClass que tem todos os dados que serão inseridos no banco de dados */
            return $pendenciaDAO->update($pendencia, strtoupper($tipoPendencia));
        }
    }

    public function listarPendencia($tipoPendencia){
        //Instancia do DAO
        $pendenciaDAO = new pendenciaDAO();
        return($pendenciaDAO->selectAll(strtoupper($tipoPendencia)));
    }

    public function buscarPendencia($tipoPendencia){
        //Instancia do DAO
        $pendenciaDAO = new pendenciaDAO();

        //Pega o ID para realizar a busca
        $id = $_GET["id"];

        $pendencia = new Pendencia();
        $pendencia = $pendenciaDAO->selectById($id, strtoupper($tipoPendencia));
        return $pendencia;
    }
}
?>
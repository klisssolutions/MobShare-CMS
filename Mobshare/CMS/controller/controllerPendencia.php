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

    public function atualizarPendencia(){
        //Instancia do DAO
        $pendenciaDAO = new pendenciaDAO();

        //Verifica qual metodo esta sendo requisitado do formulario(POST ou GET)
        if($_SERVER["REQUEST_METHOD"] == "POST"){

            // pessoa veiculo aberto motivo foto rg cpf placa idpendencia idVeiculo idUsuario


            //Instancia da classe
            $pendencia = new Pendencia();

            //Guardando os dados do post no objeto da classe
            $nivel->setIdNivel($id);
            $nivel->setNome($nome);
            $nivel->setDescricao($descricao);
            $nivel->setPermissoes($permissoes);

            /* Chamada para o metodo de inserir no BD, passando como parâmetro o objeto
            contatoClass que tem todos os dados que serão inseridos no banco de dados */
            $nivelDAO->update($nivel);
        }
    }

    public function listarPendencia(){
        //Instancia do DAO
        $pendenciaDAO = new pendenciaDAO();
        return($pendenciaDAO->selectAll());
    }

    public function buscarPendencia(){
        //Instancia do DAO
        $pendenciaDAO = new pendenciaDAO();

        //Pega o ID para realizar a busca
        $id = $_GET["id"];

        $pendencia = new Pendencia();
        $pendencia = $pendenciaDAO->selectById($id);
        return $pendencia;
    }
}
?>
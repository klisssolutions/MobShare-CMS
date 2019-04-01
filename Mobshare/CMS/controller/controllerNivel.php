<?php
/*
    Projeto: MobShare
    Autor: Igor
    Data Criação: 23/03/2019
    Data Modificação:28/03/2019
    Conteudo Modificação: Uso das constantes de import
    Autor da Modificação: Igor
    Objetivo da classe: Controller de Niveis
*/

(@session_start());
require_once($_SESSION["importInclude"]);

class controllerNivel{

    public function __construct(){
        //Import da classe nivel
        require_once(IMPORT_NIVEL);

        //Import da classe nivelDAO, para inserir no BD
        require_once(IMPORT_NIVEL_DAO);
    }

    public function inserirNivel(){
        //Instancia do DAO
        $nivelDAO = new nivelDAO();

        //Verifica qual metodo esta sendo requisitado do formulario(POST ou GET)
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $nome = $_POST["txtnome"];
            $descricao = $_POST["txtdescricao"];
            $permissao = 0;

            //Checa se a permissao de funcionario foi marcada
            if(isset($_POST['chkfuncionario'])){
                $permissao += MODULO_FUNCIONARIO;
            }

            //Checa se a permissao de marketing foi marcada
            if(isset($_POST['chkmarketing'])){
                $permissao += MODULO_MARKETING;
            }

            //Checa se a permissao de locacao foi marcada
            if(isset($_POST['chklocacao'])){
                $permissao += MODULO_LOCACAO;
            }

            //Checa se a permissao de pagina foi marcada
            if(isset($_POST['chkpagina'])){
                $permissao += MODULO_PAGINA;
            }

            //Checa se a permissao de aprovacao foi marcada
            if(isset($_POST['chkaprovacao'])){
                $permissao += MODULO_APROVACAO;
            }

            //Checa se a permissao de contato foi marcada
            if(isset($_POST['chkcontato'])){
                $permissao += MODULO_CONTATO;
            }

            //Checa se a permissao de relatorio foi marcada
            if(isset($_POST['chkrelatorio'])){
                $permissao += MODULO_RELATORIO;
            }

            //Instancia da classe
            $nivel = new Nivel();

            //Guardando os dados do post no objeto da classe
            $nivel->setNome($nome);
            $nivel->setDescricao($descricao);
            $nivel->setPermissao($permissao);

            /* Chamada para o metodo de inserir no BD, passando como parâmetro o objeto
            contatoClass que tem todos os dados que serão inseridos no banco de dados */
            $nivelDAO->insert($nivel);
        }
    }

    public function excluirNivel(){
        //Instancia do DAO
        $nivelDAO = new nivelDAO();
        //Esse id foi enviado pela view no href, o arquivo de rota é quem chamou este método
        $id = $_GET["id"];

        //Chamada para o método de excluir um nivel
        $nivelDAO->delete($id);
    }

    public function atualizarNivel(){
        //Instancia do DAO
        $nivelDAO = new nivelDAO();

        //Verifica qual metodo esta sendo requisitado do formulario(POST ou GET)
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $id = $_GET["id"];
            $nome = $_POST["txtnome"];
            $descricao = $_POST["txtdescricao"];
            $permissao = 0;

            //Checa se a permissao de funcionario foi marcada
            if(isset($_POST['chkfuncionario'])){
                $permissao += MODULO_FUNCIONARIO;
            }

            //Checa se a permissao de marketing foi marcada
            if(isset($_POST['chkmarketing'])){
                $permissao += MODULO_MARKETING;
            }

            //Checa se a permissao de locacao foi marcada
            if(isset($_POST['chklocacao'])){
                $permissao += MODULO_LOCACAO;
            }

            //Checa se a permissao de pagina foi marcada
            if(isset($_POST['chkpagina'])){
                $permissao += MODULO_PAGINA;
            }

            //Checa se a permissao de aprovacao foi marcada
            if(isset($_POST['chkaprovacao'])){
                $permissao += MODULO_APROVACAO;
            }

            //Checa se a permissao de contato foi marcada
            if(isset($_POST['chkcontato'])){
                $permissao += MODULO_CONTATO;
            }

            //Checa se a permissao de relatorio foi marcada
            if(isset($_POST['chkrelatorio'])){
                $permissao += MODULO_RELATORIO;
            }

            //Instancia da classe
            $nivel = new Nivel();

            //Guardando os dados do post no objeto da classe
            $nivel->setIdNivel($id);
            $nivel->setNome($nome);
            $nivel->setDescricao($descricao);
            $nivel->setPermissao($permissao);

            /* Chamada para o metodo de inserir no BD, passando como parâmetro o objeto
            contatoClass que tem todos os dados que serão inseridos no banco de dados */
            $nivelDAO->update($nivel);
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
<?php
/*
    Projeto: MobShare
    Autor: Leonardo
    Data Criação: 03/02/2019
    Data Modificação:
    Conteudo Modificação: 
    Autor da Modificação: 
    Objetivo da classe: Controller de veiculos
*/

(@session_start());
require_once($_SESSION["importInclude"]);

class controllerVeiculo{

    public function __construct(){
        //Import da classe nivel
        require_once(IMPORT_VEICULO);

        //Import da classe nivelDAO, para inserir no BD
        require_once(IMPORT_VEICULO_DAO);
    }

    public function inserirNivel(){
        //Instancia do DAO
        $nivelDAO = new nivelDAO();

        //Verifica qual metodo esta sendo requisitado do formulario(POST ou GET)
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $nome = $_POST["txtnome"];
            $descricao = $_POST["txtdescricao"];
            $permissoes = 0;

            //Checa se a permissoes de funcionario foi marcada
            if(isset($_POST['chkfuncionario'])){
                $permissoes += MODULO_FUNCIONARIO;
            }

            //Checa se a permissoes de marketing foi marcada
            if(isset($_POST['chkmarketing'])){
                $permissoes += MODULO_MARKETING;
            }

            //Checa se a permissoes de locacao foi marcada
            if(isset($_POST['chklocacao'])){
                $permissoes += MODULO_LOCACAO;
            }

            //Checa se a permissoes de pagina foi marcada
            if(isset($_POST['chkpagina'])){
                $permissoes += MODULO_PAGINA;
            }

            //Checa se a permissoes de aprovacao foi marcada
            if(isset($_POST['chkaprovacao'])){
                $permissoes += MODULO_APROVACAO;
            }

            //Checa se a permissoes de contato foi marcada
            if(isset($_POST['chkcontato'])){
                $permissoes += MODULO_CONTATO;
            }

            //Checa se a permissoes de relatorio foi marcada
            if(isset($_POST['chkrelatorio'])){
                $permissoes += MODULO_RELATORIO;
            }

            //Instancia da classe
            $nivel = new Nivel();

            //Guardando os dados do post no objeto da classe
            $nivel->setNome($nome);
            $nivel->setDescricao($descricao);
            $nivel->setPermissoes($permissoes);

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
            $permissoes = 0;

            //Checa se a permissoes de funcionario foi marcada
            if(isset($_POST['chkfuncionario'])){
                $permissoes += MODULO_FUNCIONARIO;
            }

            //Checa se a permissoes de marketing foi marcada
            if(isset($_POST['chkmarketing'])){
                $permissoes += MODULO_MARKETING;
            }

            //Checa se a permissoes de locacao foi marcada
            if(isset($_POST['chklocacao'])){
                $permissoes += MODULO_LOCACAO;
            }

            //Checa se a permissoes de pagina foi marcada
            if(isset($_POST['chkpagina'])){
                $permissoes += MODULO_PAGINA;
            }

            //Checa se a permissoes de aprovacao foi marcada
            if(isset($_POST['chkaprovacao'])){
                $permissoes += MODULO_APROVACAO;
            }

            //Checa se a permissoes de contato foi marcada
            if(isset($_POST['chkcontato'])){
                $permissoes += MODULO_CONTATO;
            }

            //Checa se a permissoes de relatorio foi marcada
            if(isset($_POST['chkrelatorio'])){
                $permissoes += MODULO_RELATORIO;
            }

            //Instancia da classe
            $nivel = new Nivel();

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

    public function listarVeiculos(){
        //Instancia do DAO
        $veiculoDAO = new veiculoDAO();
        return($veiculoDAO->selectAll());
    }

    public function buscarVeiculo(){
        //Instancia do DAO
        $veiculoDAO = new veiculoDAO();

        //Pega o ID para realizar a busca
        $id = $_GET["id"];

        $veiculo = new Veiculo();
        $veiculo = $veiculoDAO->selectById($id);
        return $veiculo;
    }


    public function filtrarVeiculos(){
        
        $marca = $_GET['cbMarca'];
        $modelo = $_GET['cbModelo'];
        $KM = $_GET['cbKM'];
        $avaliacao = $_GET['cbAvaliacao'];

        
        $veiculoDAO = new veiculoDAO();
       return($veiculoDAO->filtrarVeiculos($marca, $modelo, $KM, $avaliacao));
    }



}
?>
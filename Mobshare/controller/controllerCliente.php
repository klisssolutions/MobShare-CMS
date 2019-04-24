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
        
            $clienteDAO = new clienteDAO();

            $email = $_POST["txtemail"];
            $senha = $_POST["txtsenha"];

            return($clienteDAO->logar($email, $senha));
        }
    

    public function inserir($tipoInsercao){
        //Instancia do DAO
        $clienteDAO = new clienteDAO();

        //Verifica qual metodo esta sendo requisitado do formulario(POST ou GET)
        if($_SERVER["REQUEST_METHOD"] == "POST"){

            //Instancia da classe
            $cliente = new Cliente();            

            if($tipoInsercao == 1){

            }else{
                $nome = $_POST["txtnome"];
                $cpf = $_POST["txtcpf"];            
                $cnh = $_POST["txtcnh"];
                $categoriacnh = $_POST["txtcategoriacnh"];
                $email = $_POST["txtemail"];
                $senha = $_POST["txtsenha"];
                $datacadastro = $_POST["txtdatacadastro"];

                //Guardando os dados do post no objeto da classe
                $cliente->setNome($nome);
                $cliente->setCpf($cpf);                
                $cliente->setCnh($cnh);
                $cliente->setCategoriaCnh($categoriacnh);
                $cliente->setEmail($email);
                $cliente->setSenha($senha);
                $cliente->setDataCadastro($datacadastro);
           
                               
            }

            

            $clienteDAO = new clienteDAO();


            

            /* Chamada para o metodo de inserir no BD, passando como parâmetro o objeto
            contatoClass que tem todos os dados que serão inseridos no banco de dados */
            return $clienteDAO->insert($cliente, $tipoInsercao);
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
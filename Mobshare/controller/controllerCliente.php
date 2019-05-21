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
    

    public function inserirCliente($tipoInsercao){
        //Instancia do DAO
        $clienteDAO = new clienteDAO();

        //Verifica qual metodo esta sendo requisitado do formulario(POST ou GET)
        if($_SERVER["REQUEST_METHOD"] == "POST"){

            //Instancia da classe
            $cliente = new Cliente();            

            if($tipoInsercao == 1){
                $nome = $_POST["txtnome"];
                $cpf = $_POST["txtcpf"]; 
                $dtNasc = $_POST["txtdtnasc"];
                $cnh = $_POST["txtcnh"];
                $categoriacnh = $_POST["txtCategoriaCnh"];
                $email = $_POST["txtemail"];
                $senha = $_POST["txtsenha"];
                //Verificar Foto
                $fotoPerfil = enviarImagem($_FILES['imgPerfil']);
                

                //Guardando os dados do post no objeto da classe
                $cliente->setNome($nome);
                $cliente->setCpf($cpf);
                $cliente->setDtNasc($dtNasc);                
                $cliente->setCnh($cnh);
                $cliente->setCategoriaCnh($categoriacnh);
                $cliente->setEmail($email);
                $cliente->setSenha($senha);
                //Verificar Foto
                $cliente->setFotoPerfil($fotoPerfil);
                $cliente->setDataCadastro(date('Y-m-d'));

            }else{
                $nome = $_POST["txtnome"];
                $cpf = $_POST["txtcpf"]; 
                //$dtNasc = $_POST["txtdtnasc"];
                $cnh = $_POST["txtcnh"];
                $categoriacnh = $_POST["txtcategoriacnh"];
                $email = $_POST["txtemail"];
                $senha = $_POST["txtsenha"];
                //Verificar Foto
                //$fotoPerfil = $_POST["txtfotoperfil"];
                $datacadastro = $_POST["txtdatacadastro"];

                //Guardando os dados do post no objeto da classe
                $cliente->setNome($nome);
                $cliente->setCpf($cpf);
                //$cliente->setDtNasc($dtNasc);                
                $cliente->setCnh($cnh);
                $cliente->setCategoriaCnh($categoriacnh);
                $cliente->setEmail($email);
                $cliente->setSenha($senha);
                //Verificar Foto
                //$cliente->setFotoPerfil($fotoPerfil);
                $cliente->setDataCadastro(date('Y-m-d'));
             
            }

            $clienteDAO = new clienteDAO();

            /* Chamada para o metodo de inserir no BD, passando como parâmetro o objeto
            contatoClass que tem todos os dados que serão inseridos no banco de dados */
            return $clienteDAO->insert($cliente, $tipoInsercao);
        }
    }

    public function excluirCliente(){
        //Instancia do DAO
        $clienteDAO = new clienteDAO();
        //Esse id foi enviado pela view no href, o arquivo de rota é quem chamou este método
        $id = $_GET["id"];

        //Chamada para o método de excluir um cliente
        return $clienteDAO->delete($id);
    }

    public function atualizarCliente(){
        //Instancia do DAO
        $clienteDAO = new clienteDAO();
        $id = $_GET["id"];
        //Verifica qual metodo esta sendo requisitado do formulario(POST ou GET)
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $nome = $_POST["txtnome"];
            $cpf = $_POST["txtcpf"]; 
            $dtNasc = $_POST["txtdtnasc"];
            $cnh = $_POST["txtcnh"];
            $categoriacnh = $_POST["cbcategoriacnh"];
            $email = $_POST["txtemail"];
            $senha = $_POST["txtsenha"];
            //Verificar Foto
            $fotoPerfil = ($_FILES['imgPerfil']["size"] ? enviarImagem($_FILES['imgPerfil']) :  null);

            //Instancia da classe
            $cliente = new Cliente();


            //Guardando os dados do post no objeto da classe
            $cliente->setNome($nome);
            $cliente->setCpf($cpf);
            $cliente->setDtNasc($dtNasc);                
            $cliente->setCnh($cnh);
            $cliente->setCategoriaCnh($categoriacnh);
            $cliente->setEmail($email);
            $cliente->setSenha($senha);
            $cliente->setIdCliente($id);
            //Verificar Foto
            $cliente->setFotoPerfil($fotoPerfil);

            /* Chamada para o metodo de inserir no BD, passando como parâmetro o objeto
            contatoClass que tem todos os dados que serão inseridos no banco de dados */
            return $clienteDAO->update($nivel);
        }
    }

    public function listarClientes(){
        //Instancia do DAO
        $clienteDAO = new clienteDAO();
        return($clienteDAO->selectAll());
    }

    public function buscarCliente(){
        //Instancia do DAO
        $clienteDAO = new clienteDAO();

        //Pega o ID para realizar a busca
        $id = $_SESSION['idCliente']['idCliente'];

        $cliente = new Cliente();
        $cliente = $clienteDAO->selectById($id);
        return $cliente;
    }
}
?>
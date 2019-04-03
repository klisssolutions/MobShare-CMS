<?php
/*
    Projeto: Mobshare
    Autor: Igor
    Data Criação: 23/03/2019
    Data Modificação: 28/03/2019
    Conteudo Modificação: Mudar as constantes para outro arquivo
    Autor da Modificação: Igor
    Objetivo da classe: CRUD da classe de Nivel
*/

//Import do arquivo de constantes
@session_start();
require_once($_SESSION["importInclude"]); 

class clienteDAO{
    private $conex;

    public function __construct(){
        //Import da classe do banco para todos os métodos
        require_once(IMPORT_CONEXAO);

        //Instancia da classe conexão
        $this->conex = new conexaoMySQL();
    }

    //Inserir um registro no banco de dados.
    public function insert(Cliente $cliente){
        $sql = INSERT . TABELA_CLIENTE . " 
        (nome, cpf, dtnasc, cnh, categoriaCnh, email, senha, fotoPerfil, dataCadastro)
        VALUES (
        '".$cliente->getNome()."',
        '".$cliente->getCpf()."',
        '".$cliente->getDtNasc()."',
        '".$cliente->getCnh()."',
        '".$cliente->getCategoriaCnh()."',
        '".$cliente->getEmail()."',
        '".$cliente->getSenha()."',
        '".$cliente->getFotoPerfil()."',
        '".$cliente->getDataCadastro()."')";

        //Abrindo conexão com o BD
        $PDO_conex = $this->conex->connectDataBase();

        //Executa no BD o script Insert e retorna verdadeiro/falso
        if($PDO_conex->query($sql)){
            //echo(SUCESSO_SCRIPT);
            echo("<script>alert('Cliente inserido com sucesso.');</script>");
        }else{
            //echo(ERRO_SCRIPT);
            //echo($sql);
        }

        //Fecha a conexão com o BD
        $this->conex->closeDataBase();
    }

    //Deletar um registro no banco de dados.
    public function delete($id){
        $sql = DELETE . TABELA_CLIENTE . " where idCliente =".$id;

        //Abrindo conexão com o BD
        $PDO_conex = $this->conex->connectDataBase();

        //Executa no BD o script Insert e retorna verdadeiro/falso
        if($PDO_conex->query($sql)){
            echo("<script>alert('Cliente deletado com sucesso.');</script>");
            //echo(SUCESSO_SCRIPT);
        }else{
            //echo(ERRO_SCRIPT);
            //echo($sql);
        }

        //Fecha a conexão com o BD
        $this->conex->closeDataBase();
    }

    //Atualiza um registro no banco de dados.
    public function update(Cliente $cliente){
        $sql = UPDATE . TABELA_CLIENTE . " 
        SET nome = '".$cliente->getNome()."',
            cpf = '".$cliente->getCpf()."',
            dtNasc = '".$cliente->getDtNasc()."',
            cnh = '".$cliente->getCnh()."',
            categoriaCnh = '".$cliente->getCategoriaCnh()."',
            email = '".$cliente->getemail()."',
            senha = '".$cliente->getSenha()."',
            fotoPerfil = '".$cliente->getFotoPerfil()."',
            dataCadastro = '".$cliente->getDataCadastro()."'
        WHERE idNivel = '".$cliente->getIdCliente()."';";

        //Abrindo conexão com o BD
        $PDO_conex = $this->conex->connectDataBase();

        //Executa no BD o script Insert e retorna verdadeiro/falso
        if($PDO_conex->query($sql)){
            //echo(SUCESSO_SCRIPT);
            //echo($sql);
            echo("<script>alert('Cliente atualizado com sucesso.');</script>");
        }else{
            //echo(ERRO_SCRIPT);
            //echo($sql);
        }

        //Fecha a conexão com o BD
        $this->conex->closeDataBase();
    }

    //Lista todos os registros do banco de dados.
    public function selectAll(){
        $sql = SELECT.TABELA_CLIENTE;

        //Abrindo conexão com o BD
        $PDO_conex = $this->conex->connectDataBase();

        //executa o script de select no bd
        $select = $PDO_conex->query($sql);
        $cont = 0;
        
        /* $select->fetch no formado pdo retorna os dados do BD
        também retorna com característica do PDO como o fetch
        é necessário especificar o modelo de conversão.
        EX: PDO::FETCH_ASSOC, PDO::FETCH_ARRAY etc. */
        while($rsClientes=$select->fetch(PDO::FETCH_ASSOC)){
            $listClientes[] = new Nivel();
            $listClientes[$cont]->setIdCliente($rsClientes["idCliente"]);
            $listClientes[$cont]->setNome($rsClientes["nome"]);
            $listClientes[$cont]->setCpf($rsClientes["cpf"]);
            $listClientes[$cont]->setDtNasc($rsClientes["dtNasc"]);
            $listClientes[$cont]->setCnh($rsClientes["cnh"]);
            $listClientes[$cont]->setCategoriaCnh($rsClientes["categoriaCnh"]);
            $listClientes[$cont]->setEmail($rsClientes["email"]);
            $listClientes[$cont]->setSenha($rsClientes["senha"]);
            $listClientes[$cont]->setFotoPerfil($rsClientes["fotoPerfil"]);
            $listClientes[$cont]->setDataCadastro($rsClientes["dataCadastro"]);
            
            $cont++;
        }

        $this->conex->closeDataBase();

        return($listClientes);

    }

    //Seleciona um registro pelo ID.
    public function selectById($id){
        $sql = SELECT . TABELA_CLIENTE . " WHERE idCliente=".$id;

        //Abrindo conexão com o BD
        $PDO_conex = $this->conex->connectDataBase();

        //executa o script de select no bd
        $select = $PDO_conex->query($sql);

        /* $select->fetch no formado pdo retorna os dados do BD
        também retorna com característica do PDO como o fetch
        é necessário especificar o modelo de conversão.
        EX: PDO::FETCH_ASSOC, PDO::FETCH_ARRAY etc. */
        if($rsCliente=$select->fetch(PDO::FETCH_ASSOC)){
            $cliente = new Cliente();
            $cliente->setIdCliente($rsCliente["idCliente"]);
            $cliente->setNome($rsCliente["nome"]);
            $cliente->setCpf($rsCliente["cpf"]);
            $cliente->setDtNasc($rsCliente["dtNasc"]);
            $cliente->setCnh($rsCliente["cnh"]);
            $cliente->setCategoriaCnh($rsCliente["categoriaCnh"]);
            $cliente->setEmail($rsCliente["email"]);
            $cliente->setSenha($rsCliente["senha"]);
            $cliente->setFotoPerfil($rsCliente["fotoPerfil"]);
            $cliente->setDataCadastro($rsCliente["dataCadastro"]);
        }

        $this->conex->closeDataBase();

        return($cliente);
    }

    public function logar($email, $senha){
        $idCliente = null;

        $sql = "SELECT idCliente FROM " . TABELA_CLIENTE . " WHERE email='".$email."' and senha = '".$senha."'";

        //Abrindo conexão com o BD
        $PDO_conex = $this->conex->connectDataBase();

        //executa o script de select no bd
        $select = $PDO_conex->query($sql);

        if($rsId=$select->fetch(PDO::FETCH_ASSOC)){
            $idCliente = $rsId['idCliente'];            
        }

        return($idCliente);
    }
}
?>
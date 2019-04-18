<?php
/*
    Projeto: Mobshare
    Autor: Igor
    Data Criação: 23/03/2019
    Data Modificação: 01/04/2019
    Conteudo Modificação: Mudança da tabela
    Autor da Modificação: Igor
    Objetivo da classe: CRUD da classe de Funcionario
*/

//Import do arquivo de constantes
@session_start();
require_once($_SESSION["importInclude"]); 

class funcionarioDAO{

    private $conex;

    public function __construct(){
        //Import da classe do banco para todos os métodos
        require_once(IMPORT_CONEXAO);

        //Instancia da classe conexão
        $this->conex = new conexaoMySQL();
    }

    //Inserir um registro no banco de dados.
    public function insert(Funcionario $funcionario){
        $sql = INSERT . TABELA_FUNCIONARIO . " 
        (email, nome, senha, idNivel)
        VALUES (
        '".$funcionario->getEmail()."',
        '".$funcionario->getNome()."',
        '".$funcionario->getSenha()."',
        '".$funcionario->getIdNivel()."')";

        //Abrindo conexão com o BD
        $PDO_conex = $this->conex->connectDataBase();

        //Executa no BD o script Insert e retorna verdadeiro/falso
        if($PDO_conex->query($sql)){
            $erro = false;
        }else{
            $erro = true;
        }
        //Fecha a conexão com o BD
        $this->conex->closeDataBase();
        return $erro;
    }

    //Deletar um registro no banco de dados.
    public function delete($id){
        $sql = DELETE . TABELA_FUNCIONARIO . " where idUsuario_Web =".$id;

        //Abrindo conexão com o BD
        $PDO_conex = $this->conex->connectDataBase();

        //Executa no BD o script Insert e retorna verdadeiro/falso
        if($PDO_conex->query($sql)){
            $erro = false;
        }else{
            $erro = true;
        }
        //Fecha a conexão com o BD
        $this->conex->closeDataBase();
        return $erro;
    }

    //Atualiza um registro no banco de dados.
    public function update(Funcionario $funcionario){
        $sql = UPDATE . TABELA_FUNCIONARIO . " 
        SET email = '".$funcionario->getEmail()."',
            nome = '".$funcionario->getNome()."',
            senha = '".$funcionario->getSenha()."',
            idNivel = '".$funcionario->getIdNivel()."'
        WHERE idUsuario_Web = '".$funcionario->getidUsuarioWeb()."';";

        //Abrindo conexão com o BD
        $PDO_conex = $this->conex->connectDataBase();

        //Executa no BD o script Insert e retorna verdadeiro/falso
        if($PDO_conex->query($sql)){
            $erro = false;
        }else{
            $erro = true;
        }
        //Fecha a conexão com o BD
        $this->conex->closeDataBase();
        return $erro;
    }

    //Lista todos os registros do banco de dados.
    public function selectAll(){
        $sql = SELECT.TABELA_FUNCIONARIO;

        //Abrindo conexão com o BD
        $PDO_conex = $this->conex->connectDataBase();

        //executa o script de select no bd
        $select = $PDO_conex->query($sql);
        $cont = 0;
        
        /* $select->fetch no formado pdo retorna os dados do BD
        também retorna com característica do PDO como o fetch
        é necessário especificar o modelo de conversão.
        EX: PDO::FETCH_ASSOC, PDO::FETCH_ARRAY etc. */
        while($rsFuncionarios=$select->fetch(PDO::FETCH_ASSOC)){
            $listFuncionarios[] = new Funcionario();
            $listFuncionarios[$cont]->setIdUsuarioWeb($rsFuncionarios["idUsuario_Web"]);
            $listFuncionarios[$cont]->setEmail($rsFuncionarios["email"]);
            $listFuncionarios[$cont]->setNome($rsFuncionarios["nome"]);
            $listFuncionarios[$cont]->setSenha($rsFuncionarios["senha"]);
            $listFuncionarios[$cont]->setIdNivel($rsFuncionarios["idNivel"]);
            
            $cont++;
        }

        $this->conex->closeDataBase();

        return($listFuncionarios);
    }

    //Seleciona um registro pelo ID.
    public function selectById($id){
        $sql = SELECT . TABELA_FUNCIONARIO . " WHERE idUsuario_Web=".$id;

        //Abrindo conexão com o BD
        $PDO_conex = $this->conex->connectDataBase();

        //executa o script de select no bd
        $select = $PDO_conex->query($sql);

        /* $select->fetch no formado pdo retorna os dados do BD
        também retorna com característica do PDO como o fetch
        é necessário especificar o modelo de conversão.
        EX: PDO::FETCH_ASSOC, PDO::FETCH_ARRAY etc. */
        if($rsFuncionario=$select->fetch(PDO::FETCH_ASSOC)){
            $funcionario = new Funcionario();
            $funcionario->setidUsuarioWeb($rsFuncionario["idUsuario_Web"]);
            $funcionario->setEmail($rsFuncionario["email"]);
            $funcionario->setNome($rsFuncionario["nome"]);
            $funcionario->setSenha($rsFuncionario["senha"]);
            $funcionario->setIdNivel($rsFuncionario["idNivel"]);
        }

        $this->conex->closeDataBase();

        return($funcionario);
    }


    public function logar($email, $senha){

        $idFuncionario = null;

        $sql = "SELECT idUsuario_Web FROM " . TABELA_FUNCIONARIO . " WHERE email='".$email."' and senha = '".$senha."'";

        //Abrindo conexão com o BD
        $PDO_conex = $this->conex->connectDataBase();

        //executa o script de select no bd
        $select = $PDO_conex->query($sql);

        if($rsId=$select->fetch(PDO::FETCH_ASSOC)){
            $idFuncionario = $rsId['idUsuario_Web'];            
        }

        return($idFuncionario);
    }

}
?>
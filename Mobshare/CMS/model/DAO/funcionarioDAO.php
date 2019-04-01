<?php
/*
    Projeto: Mobshare
    Autor: Igor
    Data Criação: 23/03/2019
    Data Modificação:29/03/2019
    Conteudo Modificação: Fazer login
    Autor da Modificação:Leonardo
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
        (email, nome, cpf, rg, senha, dataAdmissao, dataDemissao, salario, cargo, setor, idNivel, permissoesDesktop)
        VALUES (
        '".$funcionario->getEmail()."',
        '".$funcionario->getNome()."',
        '".$funcionario->getCpf()."',
        '".$funcionario->getRg()."',
        '".$funcionario->getSenha()."',
        '".$funcionario->getDataAdmissao()."',
        '".$funcionario->getDataDemissao()."',
        '".$funcionario->getSalario()."',
        '".$funcionario->getCargo()."',
        '".$funcionario->getSetor()."',
        '".$funcionario->getIdNivel()."',
        '".$funcionario->getPermissoesDesktop()."')";

        //Abrindo conexão com o BD
        $PDO_conex = $this->conex->connectDataBase();

        //Executa no BD o script Insert e retorna verdadeiro/falso
        if($PDO_conex->query($sql)){
            echo(SUCESSO_SCRIPT);
            echo("<script>alert('Funcionário adicionado com sucesso.');</script>");
        }else{
            echo(ERRO_SCRIPT);
            echo($sql);
        }

        //Fecha a conexão com o BD
        $this->conex->closeDataBase();
    }

    //Deletar um registro no banco de dados.
    public function delete($id){
        $sql = DELETE . TABELA_FUNCIONARIO . " where idFuncionario =".$id;

        //Abrindo conexão com o BD
        $PDO_conex = $this->conex->connectDataBase();

        //Executa no BD o script Insert e retorna verdadeiro/falso
        if($PDO_conex->query($sql)){
            echo(SUCESSO_SCRIPT);
            echo("<script>alert('Funcionário excluído com sucesso.');</script>");
        }else{
            echo(ERRO_SCRIPT);
            echo($sql);
        }

        //Fecha a conexão com o BD
        $this->conex->closeDataBase();
    }

    //Atualiza um registro no banco de dados.
    public function update(Funcionario $funcionario){
        $sql = UPDATE . TABELA_FUNCIONARIO . " 
        SET email = '".$funcionario->getEmail()."',
            nome = '".$funcionario->getNome()."',
            cpf = '".$funcionario->getCpf()."',
            rg = '".$funcionario->getRg()."',
            senha = '".$funcionario->getSenha()."',
            dataAdmissao = '".$funcionario->getDataAdmissao()."',
            dataDemissao = '".$funcionario->getDataDemissao()."',
            salario = '".$funcionario->getSalario()."',
            cargo = '".$funcionario->getCargo()."',
            setor = '".$funcionario->getSetor()."',
            idNivel = '".$funcionario->getIdNivel()."',
            permissoesDesktop = '".$funcionario->getPermissoesDesktop()."'
        WHERE idFuncionario = '".$funcionario->getIdFuncionario()."';";

        //Abrindo conexão com o BD
        $PDO_conex = $this->conex->connectDataBase();

        //Executa no BD o script Insert e retorna verdadeiro/falso
        if($PDO_conex->query($sql)){
            echo(SUCESSO_SCRIPT);
            echo($sql);
            echo("<script>alert('Funcionário atualizado com sucesso.');</script>");
        }else{
            echo(ERRO_SCRIPT);
            echo($sql);
        }

        //Fecha a conexão com o BD
        $this->conex->closeDataBase();
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
            $listFuncionarios[$cont]->setIdFuncionario($rsFuncionarios["idFuncionario"]);
            $listFuncionarios[$cont]->setEmail($rsFuncionarios["email"]);
            $listFuncionarios[$cont]->setNome($rsFuncionarios["nome"]);
            $listFuncionarios[$cont]->setCpf($rsFuncionarios["cpf"]);
            $listFuncionarios[$cont]->setRg($rsFuncionarios["rg"]);
            $listFuncionarios[$cont]->setSenha($rsFuncionarios["senha"]);
            $listFuncionarios[$cont]->setDataAdmissao($rsFuncionarios["dataAdmissao"]);
            $listFuncionarios[$cont]->setDataDemissao($rsFuncionarios["dataDemissao"]);
            $listFuncionarios[$cont]->setSalario($rsFuncionarios["salario"]);
            $listFuncionarios[$cont]->setCargo($rsFuncionarios["cargo"]);
            $listFuncionarios[$cont]->setSetor($rsFuncionarios["setor"]);
            $listFuncionarios[$cont]->setIdNivel($rsFuncionarios["idNivel"]);
            $listFuncionarios[$cont]->setPermissoesDesktop($rsFuncionarios["permissoesDesktop"]);
            
            $cont++;
        }

        $this->conex->closeDataBase();

        return($listFuncionarios);

    }

    //Seleciona um registro pelo ID.
    public function selectById($id){
        $sql = SELECT . TABELA_FUNCIONARIO . " WHERE idFuncionario=".$id;

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
            $funcionario->setIdFuncionario($rsFuncionario["idFuncionario"]);
            $funcionario->setEmail($rsFuncionario["email"]);
            $funcionario->setNome($rsFuncionario["nome"]);
            $funcionario->setCpf($rsFuncionario["cpf"]);
            $funcionario->setRg($rsFuncionario["rg"]);
            $funcionario->setSenha($rsFuncionario["senha"]);
            $funcionario->setDataAdmissao($rsFuncionario["dataAdmissao"]);
            $funcionario->setDataDemissao($rsFuncionario["dataDemissao"]);
            $funcionario->setSalario($rsFuncionario["salario"]);
            $funcionario->setCargo($rsFuncionario["cargo"]);
            $funcionario->setSetor($rsFuncionario["setor"]);
            $funcionario->setIdNivel($rsFuncionario["idNivel"]);
            $funcionario->setPermissoesDesktop($rsFuncionario["permissoesDesktop"]);
        }

        $this->conex->closeDataBase();

        return($funcionario);
    }


    public function logar($nome, $senha){

        $idFuncionario = null;

        $sql = "SELECT idFuncionario FROM " . TABELA_FUNCIONARIO . " WHERE nome='".$nome."' and senha = '".$senha."'";

        //Abrindo conexão com o BD
        $PDO_conex = $this->conex->connectDataBase();

        //executa o script de select no bd
        $select = $PDO_conex->query($sql);

        if($rsId=$select->fetch(PDO::FETCH_ASSOC)){
            $idFuncionario = $rsId['idFuncionario'];            
        }

        return($idFuncionario);
    }

}
?>
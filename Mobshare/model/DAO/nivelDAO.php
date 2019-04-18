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

class nivelDAO{
    private $conex;

    public function __construct(){
        //Import da classe do banco para todos os métodos
        require_once(IMPORT_CONEXAO);

        //Instancia da classe conexão
        $this->conex = new conexaoMySQL();
    }

    //Inserir um registro no banco de dados.
    public function insert(Nivel $nivel){
        $sql = INSERT . TABELA_NIVEL . " 
        (nome, descricao, permissoes)
        VALUES (
        '".$nivel->getNome()."',
        '".$nivel->getDescricao()."',
        '".$nivel->getPermissoes()."')";

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
        $sql = DELETE . TABELA_NIVEL . " where idNivel =".$id;

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
    public function update(Nivel $nivel){
        $sql = UPDATE . TABELA_NIVEL . " 
        SET nome = '".$nivel->getNome()."',
            descricao = '".$nivel->getDescricao()."',
            permissoes = '".$nivel->getPermissoes()."'
        WHERE idNivel = '".$nivel->getIdNivel()."';";

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
        $sql = SELECT.TABELA_NIVEL;

        //Abrindo conexão com o BD
        $PDO_conex = $this->conex->connectDataBase();

        //executa o script de select no bd
        $select = $PDO_conex->query($sql);
        $cont = 0;
        
        /* $select->fetch no formado pdo retorna os dados do BD
        também retorna com característica do PDO como o fetch
        é necessário especificar o modelo de conversão.
        EX: PDO::FETCH_ASSOC, PDO::FETCH_ARRAY etc. */
        while($rsNiveis=$select->fetch(PDO::FETCH_ASSOC)){
            $listNiveis[] = new Nivel();
            $listNiveis[$cont]->setIdNivel($rsNiveis["idNivel"]);
            $listNiveis[$cont]->setNome($rsNiveis["nome"]);
            $listNiveis[$cont]->setDescricao($rsNiveis["descricao"]);
            $listNiveis[$cont]->setPermissoes($rsNiveis["permissoes"]);
            
            $cont++;
        }
        $this->conex->closeDataBase();
        return($listNiveis);
    }

    //Seleciona um registro pelo ID.
    public function selectById($id){
        $sql = SELECT . TABELA_NIVEL . " WHERE idNivel=".$id;

        //Abrindo conexão com o BD
        $PDO_conex = $this->conex->connectDataBase();

        //executa o script de select no bd
        $select = $PDO_conex->query($sql);

        /* $select->fetch no formado pdo retorna os dados do BD
        também retorna com característica do PDO como o fetch
        é necessário especificar o modelo de conversão.
        EX: PDO::FETCH_ASSOC, PDO::FETCH_ARRAY etc. */
        if($rsNivel=$select->fetch(PDO::FETCH_ASSOC)){
            $nivel = new Nivel();
            $nivel->setIdNivel($rsNivel["idNivel"]);
            $nivel->setNome($rsNivel["nome"]);
            $nivel->setDescricao($rsNivel["descricao"]);
            $nivel->setPermissoes($rsNivel["permissoes"]);
        }
        $this->conex->closeDataBase();
        return($nivel);
    }
}
?>
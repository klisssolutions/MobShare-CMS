<?php
/*
    Projeto: MobShare
    Autor: Emanuelly
    Data Criação: 02/04/2019
    Data Modificação:
    Conteudo Modificação:
    Autor da Modificação:
    Objetivo da classe: Classe de Termos
*/
//Import do arquivo de constantes
@session_start();
require_once($_SESSION["importInclude"]); 
 

class termosDAO{
    private $conex;

    public function __construct(){
        //Import da classe do banco para todos os métodos
        require_once(IMPORT_CONEXAO);

        //Instancia da classe conexão
        $this->conex = new conexaoMySQL();
    }

    public function insert(Termos $termos){
        $sql = INSERT . TABELA_TERMOS . " 
        (titulo, texto, ativo)
        VALUES (
        '".$termos->getTitulo()."',
        '".$termos->getTexto()."',
        '".$termos->getAtivo()."')";

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
        $sql = DELETE . TABELA_TERMOS . " where idTermo =".$id;

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
    public function update(Termos $termos){
        $sql = UPDATE . TABELA_TERMOS . " 
        SET titulo = '".$termos->getTitulo()."',
            texto = '".$termos->getTexto()."',
            ativo = '".$termos->getAtivo()."'
             WHERE idTermo = '".$termos->getIdTermo()."';";

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

    public function selectAll(){
        $sql = SELECT.TABELA_TERMOS;

        //Abrindo conexão com o BD
        $PDO_conex = $this->conex->connectDataBase();

        //executa o script de select no bd
        $select = $PDO_conex->query($sql);
        $cont = 0;
        
        /* $select->fetch no formado pdo retorna os dados do BD
        também retorna com característica do PDO como o fetch
        é necessário especificar o modelo de conversão.
        EX: PDO::FETCH_ASSOC, PDO::FETCH_ARRAY etc. */
        $listTermos[] = new Termos();
        $listTermos = null;
        while($rsTermos=$select->fetch(PDO::FETCH_ASSOC)){
            $termos= new Termos();
            $termos->setIdTermo($rsTermos["idTermo"]);
            $termos->setTitulo($rsTermos["titulo"]);
            $termos->setTexto($rsTermos["texto"]);
            $termos->setAtivo($rsTermos["ativo"]);

            $listTermos[$cont] = $termos;
            $cont++;
        }

        $this->conex->closeDataBase();

        return($listTermos);

    }

       //Seleciona um registro pelo ID.
       public function selectById($id){
        $sql = SELECT . TABELA_TERMOS . " WHERE idTermo=".$id;

        //Abrindo conexão com o BD
        $PDO_conex = $this->conex->connectDataBase();

        //executa o script de select no bd
        $select = $PDO_conex->query($sql);

        /* $select->fetch no formado pdo retorna os dados do BD
        também retorna com característica do PDO como o fetch
        é necessário especificar o modelo de conversão.
        EX: PDO::FETCH_ASSOC, PDO::FETCH_ARRAY etc. */
        if($rsTermos=$select->fetch(PDO::FETCH_ASSOC)){
            $termos = new Termos();
            $termos->setIdTermo($rsTermos["idTermo"]);
            $termos->setTitulo($rsTermos["titulo"]);
            $termos->setTexto($rsTermos["texto"]);
            $termos->setAtivo($rsTermos["ativo"]);
        }

        $this->conex->closeDataBase();

        return($termos);
    }
}
?>
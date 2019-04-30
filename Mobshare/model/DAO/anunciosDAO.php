<?php
/*
    Projeto: MobShare
    Autor: Emanuelly
    Data Criação: 29/04/2019
    Data Modificação:
    Conteudo Modificação:
    Autor da Modificação:
    Objetivo da classe: DAO para a API
*/
//Import do arquivo de constantes
@session_start();
require_once($_SESSION["importInclude"]); 
 

class anunciosDAO{
    private $conex;

    public function __construct(){
        //Import da classe do banco para todos os métodos
        require_once(IMPORT_CONEXAO);

        //Instancia da classe conexão
        $this->conex = new conexaoMySQL();
    }


    public function selectAll(){
        $sql = SELECT.VIEW_ANUNCIOS;

        //Abrindo conexão com o BD
        $PDO_conex = $this->conex->connectDataBase();

        //executa o script de select no bd
        $select = $PDO_conex->query($sql);
        $cont = 0;
        
        /* $select->fetch no formado pdo retorna os dados do BD
        também retorna com característica do PDO como o fetch
        é necessário especificar o modelo de conversão.
        EX: PDO::FETCH_ASSOC, PDO::FETCH_ARRAY etc. */
        $listAnuncios[] = new anuncios();
        $listAnuncios = null;
        while($rsAnuncios=$select->fetch(PDO::FETCH_ASSOC)){
            $anuncios = new Anuncios();
            $anuncios->setIdVeiculo($rsAnuncios["idVeiculo"]);
            $anuncios->setNomeModelo($rsAnuncios["nomeModelo"]);
            $anuncios->setNomeMarca($rsAnuncios["nomeMarca"]);
            $anuncios->setFotoVeiculo($rsAnuncios["fotoVeiculo"]);

            $listAnuncios[$cont] = $anuncios;
            $cont++;
        }

        $this->conex->closeDataBase();

        return($listAnuncios);

    }

       //Seleciona um registro pelo ID.
       public function selectById($id){
        $sql = SELECT . VIEW_ANUNCIOS . " WHERE idVeiculo=".$id;

        //Abrindo conexão com o BD
        $PDO_conex = $this->conex->connectDataBase();

        //executa o script de select no bd
        $select = $PDO_conex->query($sql);

        /* $select->fetch no formado pdo retorna os dados do BD
        também retorna com característica do PDO como o fetch
        é necessário especificar o modelo de conversão.
        EX: PDO::FETCH_ASSOC, PDO::FETCH_ARRAY etc. */
        if($rsAnuncios=$select->fetch(PDO::FETCH_ASSOC)){
            $anuncios = new anuncios();
            $anuncios->setIdVeiculo($rsAnuncios["idVeiculo"]);
            $anuncios->setNomeModelo($rsAnuncios["nomeModelo"]);
            $anuncios->setNomeMarca($rsAnuncios["nomeMarca"]);
            $anuncios->setFotoVeiculo($rsAnuncios["fotoVeiculo"]);
        }

        $this->conex->closeDataBase();

        return($anuncios);
    }
}
?>
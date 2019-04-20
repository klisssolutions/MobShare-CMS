<?php
/*
    Projeto: Mobshare
    Autor: Emanuelly
    Data Criação: 10/04/2019
    Data Modificação: 
    Conteudo Modificação: 
    Autor da Modificação: 
    Objetivo da classe: Select da Classe de Avaliação
*/

//Import do arquivo de constantes
@session_start();
require_once($_SESSION["importInclude"]); 

class avaliacaoVeiculoDAO{

    private $conex;

    public function __construct(){
        //require_once(IMPORT_AVALIACAO_VEICULO);

        //Import da classe DAO, para inserir no BD
        //require_once(IMPORT_AVALIACAO_VEICULO_DAO);
        //Import da classe do banco para todos os métodos
        require_once(IMPORT_CONEXAO);

        //Instancia da classe conexão
        $this->conex = new conexaoMySQL();
    }

    /*Inserir um registro no banco de dados.
    public function insert(AvaliacaoVeiculo $avaliacaoVeiculo){
        $sql = INSERT . TABELA_AVALIACAO_VEICULO . " 
        (nomeModelo, nomeMarca, idAvaliacao)
        VALUES (
        '".$avaliacaoVeiculo->getIdAvaliacao_Veiculo()."',
        '".$avaliacaoVeiculo->getIdVeiculo()."',
        '".$avaliacaoVeiculo->getIdAvaliacao()."')";

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
        $sql = DELETE . TABELA_AVALIACAO_VEICULO . " where idAvaliacao_Veiculo =".$id;

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
    }*/



    //Lista todos os registros do banco de dados.
    public function selectAll(){
        $sql = SELECT.VIEW_AVALIACAO_VEICULO;

        //Abrindo conexão com o BD
        $PDO_conex = $this->conex->connectDataBase();

        //executa o script de select no bd
        $select = $PDO_conex->query($sql);
        $cont = 0;
        
        /* instaciar antes do while serve para não dá erro
        quando não houver nenhum registro*/
        $listAvaliacaoVeiculos[] = new AvaliacaoVeiculo();

        $listAvaliacaoVeiculos = null;
        while($rsAvalicaoVeiculo=$select->fetch(PDO::FETCH_ASSOC)){
            $avaliacaoVeiculo = new AvaliacaoVeiculo();
            $avaliacaoVeiculo->setIdVeiculo($rsAvalicaoVeiculo["idVeiculo"]);
            $avaliacaoVeiculo->setNomeModelo($rsAvalicaoVeiculo["nomeModelo"]);
            $avaliacaoVeiculo->setNomeMarca($rsAvalicaoVeiculo["nomeMarca"]);
            $avaliacaoVeiculo->setDepoimento($rsAvalicaoVeiculo["depoimento"]);
            $avaliacaoVeiculo->setNota($rsAvalicaoVeiculo["nota"]);


            $listAvaliacaoVeiculos[$cont] = $avaliacaoVeiculo;
            $cont++;
        }

        $this->conex->closeDataBase();

        return($listAvaliacaoVeiculos);

    }

    public function selectByVeiculo($id){
        $sql = SELECT . VIEW_AVALIACAO_VEICULO . " where idVeiculo =".$id;

        //Abrindo conexão com o BD
        $PDO_conex = $this->conex->connectDataBase();

        //executa o script de select no bd
        $select = $PDO_conex->query($sql);

        /* $select->fetch no formado pdo retorna os dados do BD
        também retorna com característica do PDO como o fetch
        é necessário especificar o modelo de conversão.
        EX: PDO::FETCH_ASSOC, PDO::FETCH_ARRAY etc. */
        if($rsAvalicaoVeiculo=$select->fetch(PDO::FETCH_ASSOC)){
            $avaliacaoVeiculo = new AvaliacaoVeiculo();
            $avaliacaoVeiculo->setIdVeiculo($rsAvalicaoVeiculo["idVeiculo"]);
            $avaliacaoVeiculo->setNomeModelo($rsAvalicaoVeiculo["nomeModelo"]);
            $avaliacaoVeiculo->setNomeMarca($rsAvalicaoVeiculo["nomeMarca"]);
            $avaliacaoVeiculo->setDepoimento($rsAvalicaoVeiculo["depoimento"]);
            $avaliacaoVeiculo->setNota($rsAvalicaoVeiculo["nota"]);
            
        }else{
            $avaliacaoVeiculo = null;
        }

        $this->conex->closeDataBase();

        return($avaliacaoVeiculo);
    }

}

?>
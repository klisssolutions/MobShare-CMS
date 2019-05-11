<?php
/*
    Projeto: MobShare
    Autor: Leonardo
    Data Criação: 29/04/2019
    Data Modificação:
    Conteudo Modificação:
    Autor da Modificação:
    Objetivo da classe: DAO para a API
*/
//Import do arquivo de constantes
@session_start();
require_once($_SESSION["importInclude"]); 
 

class acessorioDAO{
    private $conex;

    public function __construct(){
        //Import da classe do banco para todos os métodos
        require_once(IMPORT_CONEXAO);

        //Instancia da classe conexão
        $this->conex = new conexaoMySQL();
    }



    public function selectByVeiculo($idVeiculo
    ){
        $sql = "select a.idAcessorio, a.idTipo_Veiculo, a.nomeAcessorio, av.qtdAcessorio from Acessorio as a join Acessorio_Veiculo as av 
        on av.idAcessorio = a.idAcessorio join Veiculo as v on 
        av.idVeiculo = v.idVeiculo where v.idVeiculo = ".$idVeiculo;

        //Abrindo conexão com o BD
        $PDO_conex = $this->conex->connectDataBase();

        //executa o script de select no bd
        $select = $PDO_conex->query($sql);
        $cont = 0;
        
        /* $select->fetch no formado pdo retorna os dados do BD
        também retorna com característica do PDO como o fetch
        é necessário especificar o modelo de conversão.
        EX: PDO::FETCH_ASSOC, PDO::FETCH_ARRAY etc. */
        $listAcessorios[] = new Acessorio();
        $listAcessorios = null;
        while($rsAcessorio=$select->fetch(PDO::FETCH_ASSOC)){
            $acessorio = new Acessorio();
            $acessorio->setIdAcessorio($rsAcessorio["idAcessorio"]);
            $acessorio->setIdTipoVeiculo($rsAcessorio["idTipo_Veiculo"]);
            $acessorio->setNomeAcessorio($rsAcessorio["nomeAcessorio"]);
            $acessorio->setQuantidade($rsAcessorio["qtdAcessorio"]);
            

            $listAcessorios[$cont] = $acessorio;
            $cont++;
        }

        $this->conex->closeDataBase();

        return($listAcessorios);

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
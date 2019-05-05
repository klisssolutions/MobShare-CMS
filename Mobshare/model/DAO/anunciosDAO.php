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

    public function filtrarAnuncios($marca, $modelo, $KM, $avaliacao){
        $sql = "SELECT distinct v.idVeiculo, mo.nomeModelo, ma.nomeMarca, ft.fotoVeiculo FROM veiculo as v
        join modelo as mo on v.idModelo = mo.idModelo join Marca as ma on ma.idMarca = mo.idMarca join 
        foto_veiculo as ft on ft.idVeiculo = v.idVeiculo join avaliacao_veiculo as av 
        on av.idVeiculo = v.idVeiculo join avaliacao as a on a.idAvaliacao = av.idAvaliacao ";

        if($modelo != "0"){
            $sql = $sql . " where mo.idModelo =" . $modelo  ;    
        }else{
            $sql = $sql . " where mo.idModelo <>" . $modelo ;
        }
        if($marca != "0"){
            $sql = $sql . " and mo.idModelo in(select mo.idModelo from modelo where mo.idMarca = ".$marca.")"  ;    
        }

        if($KM != "padrao"){
            if($KM == "500000"){
                $sql = $sql . " and quilometragem > ".$KM  ;
            }else if($KM == "0"){
                $sql = $sql . " and quilometragem = ".$KM  ;   
            }else{
                $sql = $sql . " and quilometragem < ".$KM  ;
            }
            //echo($KM);
        }    
        
        $sql = $sql . " and v.idveiculo in (select v.idVeiculo from avaliacao as a join avaliacao_veiculo as av on av.idAvaliacao = a.idAvaliacao
        join veiculo as v on v.idVeiculo = av.idVeiculo group by(v.idVeiculo) having avg(a.nota) = ".$avaliacao.")";

       //echo($sql);
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
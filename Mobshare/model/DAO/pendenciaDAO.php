<?php
/*
    Projeto: Mobshare
    Autor: Igor
    Data Criação: 06/04/2019
    Data Modificação:
    Conteudo Modificação:
    Autor da Modificação:
    Objetivo da classe:
*/

//Import do arquivo de constantes
@session_start();
require_once($_SESSION["importInclude"]); 

class pendenciaDAO{

    private $conex;

    public function __construct(){
        //Import da classe do banco para todos os métodos
        require_once(IMPORT_CONEXAO);

        //Instancia da classe conexão
        $this->conex = new conexaoMySQL();
    }

    //Atualiza um registro no banco de dados.
    public function update(Pendencia $pendencia, $tipoPendencia){
        if($tipoPendencia == "USUARIO"){
            $sql = UPDATE . VIEW_USUARIO . " 
                SET motivo = '".$pendencia->getMotivo()."',
                    aberto = '".$pendencia->getAberto()."'
                WHERE idPendencia = '".$pendencia->getIdPendencia()."';";
        }else{
            $sql = UPDATE . VIEW_VEICULO . " 
                SET motivo = '".$pendencia->getMotivo()."',
                    aberto = '".$pendencia->getAberto()."'
                WHERE idPendencia = '".$pendencia->getIdPendencia()."';";
        }
        
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
    public function selectAll($tipoPendencia){
        $sql = ($tipoPendencia == "USUARIO" ? SELECT.VIEW_USUARIO : SELECT.VIEW_VEICULO);

        //Abrindo conexão com o BD
        $PDO_conex = $this->conex->connectDataBase();

        //executa o script de select no bd
        $select = $PDO_conex->query($sql);
        $cont = 0;
        
        /* $select->fetch no formado pdo retorna os dados do BD
        também retorna com característica do PDO como o fetch
        é necessário especificar o modelo de conversão.
        EX: PDO::FETCH_ASSOC, PDO::FETCH_ARRAY etc. */
        $listPendencias[] = new Pendencia();
        $listPendencias = null;
        while($rsPendencias=$select->fetch(PDO::FETCH_ASSOC)){
            $pendencia = new Pendencia();
            $pendencia->setIdPendencia($rsPendencias["idPendencia"]);
            $pendencia->setNome($rsPendencias["nome"]);
            $pendencia->setId($rsPendencias["id"]);
            $pendencia->setMotivo($rsPendencias["motivo"]);
            $pendencia->setAberto($rsPendencias["aberto"]);
            
            $listPendencias[$cont] = $pendencia;

            $cont++;
        }

        $this->conex->closeDataBase();
        return($listPendencias);
    }

    //Seleciona um registro pelo ID.
    public function selectById($id, $tipoPendencia){
        if($tipoPendencia == "USUARIO"){
            $sql = SELECT . VIEW_USUARIO . " WHERE idPendencia=".$id;
        }else{
            $sql = SELECT . VIEW_VEICULO . " WHERE idPendencia=".$id;
        }
        //Abrindo conexão com o BD
        $PDO_conex = $this->conex->connectDataBase();

        //executa o script de select no bd
        $select = $PDO_conex->query($sql);

        /* $select->fetch no formado pdo retorna os dados do BD
        também retorna com característica do PDO como o fetch
        é necessário especificar o modelo de conversão.
        EX: PDO::FETCH_ASSOC, PDO::FETCH_ARRAY etc. */
        if($rsPendencia=$select->fetch(PDO::FETCH_ASSOC)){
            $pendencia = new Pendencia();
            $pendencia->setIdPendencia($rsPendencia["idPendencia"]);
            $pendencia->setNome($rsPendencia["nome"]);
            $pendencia->setId($rsPendencia["id"]);
            $pendencia->setMotivo($rsPendencia["motivo"]);
            $pendencia->setAberto($rsPendencia["aberto"]);
        }

        $this->conex->closeDataBase();
        return($pendencia);
    }
}
?>
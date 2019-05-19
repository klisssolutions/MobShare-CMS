<?php
/*
    Projeto: MobShare
    Autor: leonardo
    Data Criação: 08/05/2019
    Data Modificação:
    Conteudo Modificação:
    Autor da Modificação:
    Objetivo da classe: 
*/
//Import do arquivo de constantes
@session_start();
require_once($_SESSION["importInclude"]); 
 

class solicitacao_locacaoDAO{
    private $conex;

    public function __construct(){
        //Import da classe do banco para todos os métodos
        require_once(IMPORT_CONEXAO);

        //Instancia da classe conexão
        $this->conex = new conexaoMySQL();
    }

    public function insert(Solicitacao_Locacao $solicitacao_locacao){
        $sql = INSERT . TABELA_SOLICITACAO_LOCACAO . " 
        (idCliente, idVeiculo, horarioInicio, horarioFim)
        VALUES (
        ".$solicitacao_locacao->getIdCliente().",
        ".$solicitacao_locacao->getIdVeiculo().",
        '".$solicitacao_locacao->getHorarioInicio()."',
        '".$solicitacao_locacao->getHorarioFim()."')";

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


    public function aceitar($idSolicitacaoLocacao){
        $sql = UPDATE . TABELA_SOLICITACAO_LOCACAO . " 
        set confirmLocador = 1 where idSolicitacao_Locacao = ".$idSolicitacaoLocacao;

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
    
    public function recusar($idSolicitacaoLocacao){
        $sql = UPDATE . TABELA_SOLICITACAO_LOCACAO . " 
        set confirmLocador = 0 where idSolicitacao_Locacao = ".$idSolicitacaoLocacao;

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
        $sql = UPDATE . TABELA_SOLICITACAO_LOCACAO . " 
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

    public function selectAllPorLocador($id){
        $sql = SELECT." vsolicitacao_locacao where idDono = ".$id;

        
        //Abrindo conexão com o BD
        $PDO_conex = $this->conex->connectDataBase();

        //executa o script de select no bd
        $select = $PDO_conex->query($sql);
        $cont = 0;
        
        /* $select->fetch no formado pdo retorna os dados do BD
        também retorna com característica do PDO como o fetch
        é necessário especificar o modelo de conversão.
        EX: PDO::FETCH_ASSOC, PDO::FETCH_ARRAY etc. */
        $listSolicitacoes[] = new VSolicitacao_Locacao();
        $listSolicitacoes = null;
        while($rsSolicitacoes=$select->fetch(PDO::FETCH_ASSOC)){
            $vSolicitacao_Locacao = new VSolicitacao_Locacao();
            $vSolicitacao_Locacao->setIdSolicitacao_Locacao($rsSolicitacoes["idSolicitacao_Locacao"]);
            $vSolicitacao_Locacao->setIdCliente($rsSolicitacoes["idCliente"]);
            $vSolicitacao_Locacao->setNomeCliente($rsSolicitacoes["nomeCliente"]);
            $vSolicitacao_Locacao->setIdDono($rsSolicitacoes["idDono"]);
            $vSolicitacao_Locacao->setVeiculo($rsSolicitacoes["veiculo"]);
            $vSolicitacao_Locacao->setHorarioInicio($rsSolicitacoes["horarioInicio"]);
            $vSolicitacao_Locacao->setHorarioFim($rsSolicitacoes["horarioFim"]);
            
            
            

            $listSolicitacoes[$cont] = $vSolicitacao_Locacao;
            $cont++;
        }

        

        $this->conex->closeDataBase();

        return($listSolicitacoes);

    }

       //Seleciona um registro pelo ID.
       public function selectById($id){
        $sql = SELECT . TABELA_SOLICITACAO_LOCACAO . " WHERE idTipo_Veiculo=".$id;

        //Abrindo conexão com o BD
        $PDO_conex = $this->conex->connectDataBase();

        //executa o script de select no bd
        $select = $PDO_conex->query($sql);

        /* $select->fetch no formado pdo retorna os dados do BD
        também retorna com característica do PDO como o fetch
        é necessário especificar o modelo de conversão.
        EX: PDO::FETCH_ASSOC, PDO::FETCH_ARRAY etc. */
        if($rsTipo=$select->fetch(PDO::FETCH_ASSOC)){
            $tipos = new Tipo();
            $tipos->setIdTipo_Veiculo($rsTipo["idTipo_Veiculo"]);
            $tipos->setNomeTipo($rsTipo["nomeTipo"]);
            $tipos->setFotos($rsTipo["foto"]);
        }

        $this->conex->closeDataBase();

        return($tipos);
    }
}
?>
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
 

class vhistorico_locacaoDAO{
    private $conex;

    public function __construct(){
        //Import da classe do banco para todos os métodos
        require_once(IMPORT_CONEXAO);

        //Instancia da classe conexão
        $this->conex = new conexaoMySQL();
    }

    public function receber($idLocacao){
        
        $sql = UPDATE . TABELA_LOCACAO . " 
        SET recebido = 1 WHERE idLocacao = ".$idLocacao;

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
    
    public function devolver($idLocacao){
        
        $sql = UPDATE . TABELA_LOCACAO . " 
        SET devolvido = 1 WHERE idLocacao = ".$idLocacao;

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

    public function selecionarHistoricoLocacoes($id){
        $sql = SELECT." vhistorico_locacao where idDono = ".$id." or idCliente =".$id;

        
        //Abrindo conexão com o BD
        $PDO_conex = $this->conex->connectDataBase();

        //executa o script de select no bd
        $select = $PDO_conex->query($sql);
        $cont = 0;
        
        /* $select->fetch no formado pdo retorna os dados do BD
        também retorna com característica do PDO como o fetch
        é necessário especificar o modelo de conversão.
        EX: PDO::FETCH_ASSOC, PDO::FETCH_ARRAY etc. */
        $listHistorico_locacoes[] = new vhistorico_locacao();
        $listHistorico_locacoes = null;
        while($rsSolicitacoes=$select->fetch(PDO::FETCH_ASSOC)){
            $vhistorico_locacao = new vhistorico_locacao();
            $vhistorico_locacao->setIdLocacao($rsSolicitacoes["idLocacao"]);
            $vhistorico_locacao->setIdCliente($rsSolicitacoes["idCliente"]);
            $vhistorico_locacao->setNomeCliente($rsSolicitacoes["nomeCliente"]);
            $vhistorico_locacao->setIdDono($rsSolicitacoes["idDono"]);
            $vhistorico_locacao->setVeiculo($rsSolicitacoes["veiculo"]);
            $vhistorico_locacao->setHorarioInicio($rsSolicitacoes["horarioInicio"]);
            $vhistorico_locacao->setHorarioFim($rsSolicitacoes["horarioFim"]);
            $vhistorico_locacao->setDevolvido($rsSolicitacoes["devolvido"]);
            $vhistorico_locacao->setRecebido($rsSolicitacoes["recebido"]);
            $vhistorico_locacao->setValor($rsSolicitacoes["valor"]);
            
            
            

            $listHistorico_locacoes[$cont] = $vhistorico_locacao;
            $cont++;
        }

        

        $this->conex->closeDataBase();

        return($listHistorico_locacoes);

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
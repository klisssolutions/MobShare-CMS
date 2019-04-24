<?php
@session_start();
require_once($_SESSION["importInclude"]); 

class duvidasFrequentesDAO{

    private $conex;

    public function __construct(){
        //Import da classe do banco para todos os métodos
        require_once(IMPORT_CONEXAO);

        //Instancia da classe conexão
        $this->conex = new conexaoMySQL();
    }

    //Inserir um registro no banco de dados.
    public function insert(DuvidasFrequentes $duvidasFrequentes){
        $sql = INSERT.TABELA_DUVIDAS_FREQUENTES. " 
        (pergunta,resposta,ativo)
        VALUES(
        '".$duvidasFrequentes->getPerguntas()."',
        '".$duvidasFrequentes->getResposta()."',
        '".$duvidasFrequentes->getAtivo()."')";

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
    
      
    //APAGAR REGISTRO
    public function delete($id){
        $sql = DELETE .TABELA_DUVIDAS_FREQUENTES." where idPergunta=".$id;
    
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
    
    //LISTA TODOS OS REGISTRO
        public function selectAll(){
            
        $sql = "select * from pergunta_frequente";
        
             //Abrindo a conexao com o banco de dados 
           $PDO_conex = $this -> conex->connectDatabase();
            
            //Executa o Script de SELECT no banco de dados 
            $select = $PDO_conex ->query($sql);
            
            $cont = 0;
            
            
            $duvidasFrequentes[]= new duvidasFrequentes();
            $duvidasFrequentes = null;              
            while($rsDuvidasFrequentes=$select->fetch(PDO::FETCH_ASSOC)){
               
                $duvidaFrequente = new duvidasFrequentes();
                
                $duvidaFrequente->setIdPerguntas($rsDuvidasFrequentes["idPergunta"]);
                $duvidaFrequente->setPerguntas($rsDuvidasFrequentes["pergunta"]);
                $duvidaFrequente->setResposta($rsDuvidasFrequentes["resposta"]);
                $duvidaFrequente->setAtivo($rsDuvidasFrequentes["ativo"]);
                
                $duvidasFrequentes[$cont]  = $duvidaFrequente;

                $cont++;
            }
    
            // Fecha a conexão com o banco de dados
            $this->conex->closeDatabase();
                    
            return ($duvidasFrequentes);
        }
    
    // Seleciona pelo ID 
    public function selectById($id){
        
        $sql = SELECT. TABELA_DUVIDAS_FREQUENTES . " where idPergunta=".$id;
        //Abrindo conexão com o BD
        $PDO_conex = $this->conex->connectDataBase();

        //executa o script de select no bd
        $select = $PDO_conex->query($sql);
        
        
        if($rsDuvida=$select->fetch(PDO::FETCH_ASSOC)){
             
            $duvida = new duvidasFrequentes();
            
            $duvida -> setIdPerguntas($rsDuvida["idPergunta"]);
            $duvida -> setPerguntas($rsDuvida["pergunta"]);
            $duvida -> setResposta($rsDuvida["resposta"]);
            $duvida -> setAtivo($rsDuvida["ativo"]);
        }
        
        
        $this->conex->closeDataBase();

        return($duvida);
        
    }

    public function update(DuvidasFrequentes $duvidasFrequentes){
        $sql = UPDATE . TABELA_DUVIDAS_FREQUENTES . " 
        SET pergunta = '".$duvidasFrequentes->getPerguntas()."',
            resposta = '".$duvidasFrequentes->getResposta()."',
            ativo = '".$duvidasFrequentes->getAtivo()."'
        WHERE idPergunta = '".$duvidasFrequentes->getIdPergunta()."';";
        
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
    
    public function listarDuvidas(){
        $duvidasFrequentesDAO = new duvidasFrequentesDAO();
        return($duvidasFrequentesDAO->selectAll());
    }
    
     public function buscarFuncionario(){
        $id = $_GET["id"];
        $duvidasFrequentesDAO = new duvidasFrequentesDAO();
        return $duvidasFrequentesDAO->selectById($id);
    
     }
}
?>
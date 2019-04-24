<?php
@session_start();
require_once($_SESSION["importInclude"]); 

class faleConoscoDAO{
    private $conex;

        public function __construct(){
    //Import da classe do banco para todos os métodos
    require_once(IMPORT_CONEXAO);
    //Instacia da Classe Conexão
    $this->conex = new conexaoMySQL();
    }

    //Inserir um registro no banco da dados.
    public function insert(FaleConosco $faleConosco){
        $sql = INSERT.TABELA_FALE_CONOSCO."(nome,email,assunto,mensagem) VALUES(
            '".$faleConosco->getNome()."',
            '".$faleConosco->getEmail()."',
            '".$faleConosco->getAssunto()."',
            '".$faleConosco->getMensagem()."')";

        //Abrindo conexão com o Banco de Dados 
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
        $sql = DELETE.TABELA_FALE_CONOSCO." where idFale_Conosco= ".$id;
    
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

    // Selecionar o Registro pelo ID 
    public function selectById($id){
            
        $sql = SELECT. TABELA_FALE_CONOSCO ." where idFale_Conosco=".$id;
        //Abrindo conexão com o BD
        $PDO_conex = $this->conex->connectDataBase();

        //executa o script de select no bd
        $select = $PDO_conex->query($sql);

        if($rsFaleConosco=$select->fetch(PDO::FETCH_ASSOC)){
                
            $faleConosco = new FaleConosco();
            
            $faleConosco->setNome($rsFaleConosco["nome"]);
            $faleConosco->setEmail($rsFaleConosco["email"]);
            $faleConosco->setAssunto($rsFaleConosco["assunto"]);
            $faleConosco->setMensagem($rsFaleConosco["mensagem"]);
        }
        
        $this->conex->closeDataBase();

        return($faleConosco);
    }


    //LISTA TODOS OS REGISTRO
    public function selectAll(){
            
        $sql = SELECT.TABELA_FALE_CONOSCO;
  
        //Abrindo a conexao com o banco de dados 
        $PDO_conex = $this -> conex->connectDatabase();
        
        //Executa o Script de SELECT no banco de dados 
        $select = $PDO_conex ->query($sql);
        
        $cont = 0;
        
        $listaFaleConosco[]=new FaleConosco();   
        $faleConosco=null;
        while($rsFaleConosco=$select->fetch(PDO::FETCH_ASSOC)){

            $faleConosco =new FaleConosco();   
            
            $faleConosco->setIdFale_Conosco($rsFaleConosco["idFale_Conosco"]);
            $faleConosco->setNome($rsFaleConosco["nome"]);
            $faleConosco->setEmail($rsFaleConosco["email"]);
            $faleConosco->setAssunto($rsFaleConosco["assunto"]);
            $faleConosco->setMensagem($rsFaleConosco["mensagem"]);


            $listaFaleConosco[$cont] =  $faleConosco;

            $cont++;
        }
        
        // Fecha a conexão com o banco de dados
        $this->conex->closeDatabase();
                                
        return ($listaFaleConosco);
    }

    public function update(FaleConosco  $faleConosco){
        $sql = UPDATE . TABELA_DUVIDAS_FREQUENTES . " 
        SET nome = '". $faleConosco->getNome()."',
            email = '". $faleConosco->getEmail()."'
            Assunto = '". $faleConosco->getAssunto()."'
            mensagem = '". $faleConosco->getMensagem()."'
        WHERE idFale_Conosco = '". $faleConosco->getIdFale_Conosco()."';";
        
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

}
?>
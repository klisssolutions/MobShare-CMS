<?php


@session_start();
require_once($_SESSION["importInclude"]);

class controllerDuvidasFrequentes{
    
    public function __construct(){
        
        require_once(IMPORT_DUVIDAS_FREQUENTES);
        
        require_once(IMPORT_DUVIDAS_FREQUENTES_DAO);
        
    }
    
    
    // Inserir um novo registro.
    public function inserirDuvida(){
        
        $duvidasFrequentesDAO = new duvidasFrequentesDAO();
                
        //VERIFICA QUAL METHODO ESTA SENDO REQUISITADO NO FORMULARIO(POST ou GET)
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $perguntas = $_POST["txtPerguntas"];
            $resposta = $_POST["txtResposta"];
            $ativo = $_POST["ativo"];
             //INSTANCIA DA CLASSE CONTATO
            $duvidas = new duvidasFrequentes();
            
            //GUARDANDO OS DADOS DO POST NO OBJETO DA CLASSE CONTATO
            $duvidas->setPerguntas($perguntas);
            $duvidas->setResposta($resposta);
            $duvidas->setAtivo($ativo);
            
        
        }
             // Fazendo a Chamada do metodo de inserir no banco de dados,E passando como parametro o objeto $duvidasFrequentesClass que tem todos os dados que seram inseridos no banco de dados. 
            return $duvidasFrequentesDAO->insert($duvidas);


  
    }
    public function excluirDuvida(){
        $duvidasFrequentesDAO = new duvidasFrequentesDAO();
                
        
        //FOI ENVIADO PELA VIEW NO HREF,O ARQUIVO DE ROTA É QUEM CHAMOU ESSE METODO
        $id = $_GET["id"];
 
        //Chamada para o metodo de excluir uma duvida
        return $duvidasFrequentesDAO->delete($id);
        
    }
    
     // Atualizar um Registro existente.
        public function atualizarLista(){
            
            if($_SERVER["REQUEST_METHOD"] == "POST"){
            $id = $_GET["id"];
            $perguntas = $_POST["txtPerguntas"];
            $resposta = $_POST["txtResposta"];
            $ativo = $_POST["ativo"];
                 
               //INSTANCIA DA CLASSE CONTATO   
            $duvidas = new duvidasFrequentes();
            $duvidasFrequentesDAO = new duvidasFrequentesDAO();   
                
                
             //GUARDANDO OS DADOS DO POST NO OBJETO DA CLASSE CONTATO  
            $duvidas->setIdPerguntas($id);
            $duvidas->setPerguntas($perguntas);
            $duvidas->setResposta($resposta);
            $duvidas->setAtivo($ativo);    
              // Fazendo a Chamada do metodo de inserir no banco de dados,E passando como parametro o objeto $duvidasFrequentesClass que tem todos os dados que seram inseridos no banco de dados   
            return $duvidasFrequentesDAO->update($duvidas);
             }
        }
    
    
        // Listar todos os registro.
        public function listarDuvidas(){
            $duvidasFrequentesDAO = new duvidasFrequentesDAO();
         // Chamada para o metodo de listar todos os registro.   
            return ($duvidasFrequentesDAO->selectAll());
            
        }
    
          public function buscarDuvidas(){
              
             $duvidasFrequentesDAO = new duvidasFrequentesDAO();

              //FOI ENVIADO PELA VIEW NO HREF,O ARQUIVO DE ROTA É QUEM CHAMOU ESSE METODO
            $id = $_GET['id'];
              
            $duvidas = new duvidasFrequentes();
              
            $duvidas = $duvidasFrequentesDAO->selectById($id);

              
              return($duvidas);

             }
      }
    
    
    


?>
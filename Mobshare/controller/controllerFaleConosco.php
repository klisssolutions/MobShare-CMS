<?php


//Import do arquivo de constantes
@session_start();
require_once($_SESSION["importInclude"]); 

class controllerFaleConosco{

    public function __construct(){
        
        //Import da classe do fale conosco 
        require_once(IMPORT_FALE_CONOSCO);
       
        //IMPORT DO FALECONOSCODAO
        require_once(IMPORT_FALE_CONOSCO_DAO);
        
    }

// Inserir um novo registro
public function inserirFaleConosco(){
    $faleConoscoDAO = new faleConoscoDAO();

    //VERIFICA QUAL METHODO ESTA SENDO REQUISITADO NO FORMULARIO(POST ou GET)

    if($_SERVER["REQUEST_METHOD"]== "POST"){
        $nome = $_POST["txtNome"];
        $email = $_POST["txtEmail"];
        $assunto = $_POST["txtAssunto"];
        $mensagem = $_POST["txtMensagem"];

        //INSTANCIA DA CLASSE CONTATO
        $faleConosco = new faleConosco();
        //GUARDANDO OS DADOS DO POST NO OBJETO DA CLASSE CONTATO
        $faleConosco->setNome($nome);
        $faleConosco->setEmail($email);
        $faleConosco->setAssunto($assunto);
        $faleConosco->setMensagem($mensagem);
    }

    // Fazendo a Chamada do metodo de inserir no banco de dados,E passando como parametro o objeto $duvidasFrequentesClass que tem todos os dados que seram inseridos no banco de dados. 
    return $faleConoscoDAO->insert($faleConosco);

}

    public function excluirFaleConosco(){
    $faleConoscoDAO = new faleConoscoDAO();
                
        
        //FOI ENVIADO PELA VIEW NO HREF,O ARQUIVO DE ROTA É QUEM CHAMOU ESSE METODO
        $id = $_GET["id"];
        
        
        //Chamada para o metodo de excluir uma duvida
        return $faleConoscoDAO->delete($id);
    }
    
        //Atualizar um Registro existente 
    public function atualizarFaleConosco(){
     if($_SERVER["REQUEST_METHOD"] == "POST"){

            $id = $_GET["id_Fale_Conosco"];
            $nome = $_POST["txtnome"];
            $email = $_POST["txtemail"];
            $assunto = $_POST["assunto"];
            $mensagem = $_POST["txtmensagem"];
            
        // Instancia de classes 
        $faleConosco = new faleConosco();
        $faleConosco = new faleConoscoDAO();

        //Guardando os dados no objeto da classe
        $faleConosco->setnome($nome);
        $faleConosco->setemail($email);
        $faleConosco->setassunto($assunto);
        $faleConosco->setmensagem($mensagem);
         
        //Chamada ao metodo de inserir no banco passando como parametro o objeto.
        return $faleConoscoDAO->update($faleConosco);
        }
    }
    
    // Listar todos os registro.
    public function listarFaleConosco(){
                
        $faleConoscoDAO = new faleConoscoDAO();
        // Chamada para o metodo de listar todos os registro.   
        return $faleConoscoDAO->selectAll();
    }

  public function buscarFaleConosco(){
    $faleConoscoDAO = new faleConoscoDAO();

    //FOI ENVIADO PELA VIEW NO HREF,O ARQUIVO DE ROTA É QUEM CHAMOU ESSE METODO
    $id = $_GET["id"];
    $faleConosco = new faleConosco();
    $faleConosco = $faleConoscoDAO->selectById($id);

    return $faleConosco;
    }
}   
?>
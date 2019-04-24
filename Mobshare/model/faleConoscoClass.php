<?php


class FaleConosco{

//Criação dos Atributos da Classe
    private $idFale_Conosco;
    private $nome;
    private $email;
    private $assunto;
    private $mensagem;

    //Metodo Construtor 
    public function __construct(){    
    }

    //------------Começo dos GETTERS e SETTERS------------
    
    //Pegar a informção e enviar para a view
    public function getIdFale_Conosco()
    {
        // retorna o valor do atributo do objeto        
        return $this->idFale_Conosco; 
    }
    
     //Recebe a informação da view e envia para o objeto
    public function setIdFale_Conosco($idFale_Conosco)
    {
        //Guarda o valor enviado como parametro do metodo 
        //no atributo do objeto
        $this->idFale_Conosco = $idFale_Conosco; 
    }
    
    
    
    //Pegar a informção e enviar para a view
    public function getNome()
    {
        // retorna o valor do atributo do objeto        
        return $this->nome; 
    }
    
    
     //Recebe a informação da view e envia para o objeto
    public function setNome($nome)
    {
        //Guarda o valor enviado como parametro do metodo 
        //no atributo do objeto
        $this->nome = $nome; 
    }
    
    
    
    //Pegar a informção e enviar para a view
    public function getEmail()
    {
        // retorna o valor do atributo do objeto        
        return $this->email; 
    }
    
    
     //Recebe a informação da view e envia para o objeto
    public function setEmail($email)
    {
        //Guarda o valor enviado como parametro do metodo 
        //no atributo do objeto
        $this->email = $email; 
    }
    
    
    
    //Pegar a informção e enviar para a view
    public function getAssunto()
    {
        // retorna o valor do atributo do objeto        
        return $this->assunto; 
    }
    
    
     //Recebe a informação da view e envia para o objeto
    public function setAssunto($assunto)
    {
        //Guarda o valor enviado como parametro do metodo 
        //no atributo do objeto
        $this->assunto = $assunto; 
    }
    
    
    
        //Pegar a informção e enviar para a view
    public function getMensagem()
    {
        // retorna o valor do atributo do objeto        
        return $this->mensagem; 
    }
    
    
     //Recebe a informação da view e envia para o objeto
    public function setMensagem($Mensagem)
    {
        //Guarda o valor enviado como parametro do metodo 
        //no atributo do objeto
        $this->mensagem = $Mensagem; 
    }

    //------------Fim dos GETTERS e SETTERS------------

    //Funções para converter o objeto em um formato compatível com JSON
    public function getProperties(){
        return get_object_vars($this);
    }

    public function _toJson(){
        $properties = $this->getProperties();
        $object = new StdClass();
        foreach ($properties as $name => $value) {
            $object->$name = $value;
        }
        return $object;
    }
    
}

?>
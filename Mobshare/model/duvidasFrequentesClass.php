<?php

class duvidasFrequentes{
    private $idPergunta;
    private $perguntas;
    private $resposta;
    private $ativo;
    
public function __construct(){
    
}

    //------------Começo dos GETTERS e SETTERS------------
      public function getIdPergunta(){
        return $this->idPergunta;
    }
    

    public function setIdPerguntas($idPergunta){
        $this->idPergunta = $idPergunta;
    }
    
  
    public function getPerguntas(){
        return $this->perguntas;
    }
    
    public function setPerguntas($perguntas){
        $this->perguntas = $perguntas;
    }
    
    public function getResposta(){
        return $this->resposta;
    }
    
    public function setResposta($resposta){
        $this->resposta = $resposta;
    }
    
    public function getAtivo(){
        return $this->ativo;
    }
    public function setAtivo($ativo){
        $this->ativo = $ativo;
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
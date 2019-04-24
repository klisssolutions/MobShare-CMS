<?php
/*
    Projeto: MobShare
    Autor: leonardo
    Data Criação: 02/04/2019
    Data Modificação:
    Conteudo Modificação:
    Autor da Modificação:
    Objetivo da classe: Classe de modelo
*/
class Cancelamento{
    private $idCancelamento;
    private $idLocacao;
    private $idCliente;
    private $confirmacao;
    private $motivo;



    public function __construct(){    
    }
    
    //------------Começo dos GETTERS e SETTERS------------

    public function getIdCancelamento(){
        return $this->idCancelamento;
    }

    public function setIdCancelamento($idCancelamento){
        $this->idCancelamento = $idCancelamento;
    }

    public function getIdLocacao(){
        return $this->idLocacao;
    }

    public function setIdLocacao($idLocacao){
        $this->idLocacao = $idLocacao;
    }

    public function getIdCliente(){
        return $this->idCliente;
    }

    public function setIdCliente($idCliente){
        $this->idCliente = $idCliente;
    }
    
    public function getConfirmacao(){
    
        return $this->confirmacao;
    }

    public function setConfirmacao($confirmacao){
        $this->confirmacao = $confirmacao;
    }
    
    public function getMotivo(){
        return $this->motivo;
    }

    public function setMotivo($motivo){
        $this->motivo = $motivo;
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
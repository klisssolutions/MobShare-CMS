<?php
/*
    Projeto: MobShare
    Autor: leonardo
    Data Criação: 02/04/2019
    Data Modificação:
    Conteudo Modificação: 
    Autor da Modificação: 
    Objetivo da classe: Classe de solicitacao locacao
*/
class Solicitacao_Locacao{
    private $idSolicitacao_Locacao;
    private $idCliente;
    private $idVeiculo;
    private $confirmLocador;
    private $horarioInicio;
    private $horarioFim;
    private $motivoRecusa;

    public function __construct(){ 
      
    }
    
    //------------Começo dos GETTERS e SETTERS------------
    public function getIdSolicitacao_Locacao(){
        return $this->idSolicitacao_Locacao;
    }

    public function setIdSolicitacao_Locacao($idSolicitacao_Locacao){
        $this->idSolicitacao_Locacao = $idSolicitacao_Locacao;
    }

    public function getIdCliente(){
        return $this->idCliente;
    }

    public function setIdCliente($idCliente){
        $this->idCliente = $idCliente;

    }


    public function getIdVeiculo(){
        return $this->idVeiculo;
    }

    public function setIdVeiculo($idVeiculo){
        $this->idVeiculo = $idVeiculo;

    }

    public function getConfirmLocador(){
        return $this->confirmLocador;
    }

    public function setConfirmLocador($confirmLocador){
        $this->confirmLocador = $confirmLocador;

    }

    public function getHorarioInicio(){
        return $this->horarioInicio;
    }

    public function setHorarioInicio($horarioInicio){
        $this->horarioInicio = $horarioInicio;

    }    


    public function getHorarioFim(){
        return $this->horarioFim;
    }

    public function setHorarioFim($horarioFim){
        $this->horarioFim = $horarioFim;

    }  

    public function getMotivoRecusa(){
        return $this->motivoRecusa;
    }

    public function setMotivoRecusa($motivoRecusa){
        $this->motivoRecusa = $motivoRecusa;

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
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
class vhistorico_locacao{
    private $idLocacao;
    private $valor;
    private $devolvido;
    private $recebido;
    private $idCliente;
    private $nomeCliente;
    private $idDono;
    private $veiculo;
    private $horarioInicio;
    private $horarioFim;





    public function __construct(){    
        
    }
    

    public function getIdLocacao(){
        return $this->idLocacao;
    }

    public function setIdLocacao($idLocacao){
        $this->idLocacao = $idLocacao;
    }

    public function getValor(){
        return $this->valor;
    }   

    public function setValor($valor){
        $this->valor = $valor;
    }    


    public function getDevolvido(){
        return $this->devolvido;
    }

    public function setDevolvido($devolvido){
        $this->devolvido = $devolvido;
    }  


    public function getRecebido(){
        return $this->recebido;
    }

    public function setRecebido($recebido){
        $this->recebido = $recebido;
    }  


    public function getIdCliente(){
        return $this->idCliente;
    }

    public function setIdCliente($idCliente){
        $this->idCliente = $idCliente;
    } 
    
    
    public function getNomeCliente(){
        return $this->nomeCliente;
    }

    public function setNomeCliente($nomeCliente){
        $this->nomeCliente = $nomeCliente;
    } 


    public function getIdDono(){
        return $this->idDono;
    }

    public function setIdDono($idDono){
        $this->idDono = $idDono;
    } 

    public function getVeiculo(){
        return $this->veiculo;
    }

    public function setVeiculo($veiculo){
        $this->veiculo = $veiculo;
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
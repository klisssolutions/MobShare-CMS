<?php
/*
    Projeto: MobShare
    Autor: leonardo
    Data Criação: 08/04/2019
    Data Modificação:
    Conteudo Modificação:
    Autor da Modificação:
    Objetivo da classe: Classe de modelo
*/
class V_detalhes_locacao{
    private $idLocacao;
    private $locatario;
    private $locador;
    private $veiculo;
    private $inicio;
    private $fim;
    private $valorTotal;

    public function __construct(){    
    }
    
    //------------Começo dos GETTERS e SETTERS------------
    public function getIdLocacao(){
        return $this->idLocacao;
    }

    public function setIdLocacao($idLocacao){
        $this->idLocacao = $idLocacao;
    }

    public function getLocatario(){
        return $this->locatario;
    }

    public function setLocatario($locatario){
        $this->locatario = $locatario;
    }
 
    public function getLocador(){
        return $this->locador;
    }

    public function setLocador($locador){
        $this->locador = $locador;
    }

    public function getVeiculo(){
        return $this->veiculo;
    }

    public function setVeiculo($veiculo){
        $this->veiculo = $veiculo;
    }

    public function getInicio(){
        return $this->inicio;
    }

    public function setInicio($inicio){
        $this->inicio = $inicio;
    }

    public function getFim(){
        return $this->fim;
    }

    public function setFim($fim){
        $this->fim = $fim;
    }   

    public function getValorTotal(){
        return $this->valorTotal;
    }

    public function setValorTotal($valorTotal){
        $this->valorTotal = $valorTotal;
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

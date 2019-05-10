<?php
/*
    Projeto: MobShare
    Autor: Kaio
    Data Criação: 08/05/2019
    Data Modificação: 
    Conteudo Modificação: 
    Autor da Modificação: 
    Objetivo da classe: Classe de Tipo de Veiculo
*/
class Tipo{
    private $idTipo_Veiculo;
    private $nomeTipo;
    private $fotos;

    public function __construct(){    
    }
    
    //------------Começo dos GETTERS e SETTERS------------
    public function getIdTipo_Veiculo(){
        return $this->idTipo_Veiculo;
    }

    public function setIdTipo_Veiculo($idTipo_Veiculo){
        $this->idTipo_Veiculo = $idTipo_Veiculo;
    }

    public function getNomeTipo(){
        return $this->nomeTipo;
    }

    public function setNomeTipo($nomeTipo){
        $this->nomeTipo = $nomeTipo;
    }

    public function getFotos(){
        return $this->fotos;
    }

    public function setFotos($fotos){
        $this->fotos = $fotos;
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
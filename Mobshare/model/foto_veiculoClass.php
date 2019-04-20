<?php
/*
    Projeto: MobShare
    Autor: leonardo
    Data Criação: 02/04/2019
    Data Modificação: 20/04/2019
    Conteudo Modificação: Método de converter para arquivo JSON
    Autor da Modificação: Igor
    Objetivo da classe: Classe de Veiculo
*/
class Foto_Veiculo{
    private $idFoto_Veiculo;
    private $idVeiculo;
    private $fotoVeiculo;
    private $perfil;

    public function __construct(){    
    }
    
    //------------Começo dos GETTERS e SETTERS------------
    public function getIdFoto_Veiculo(){
        return $this->idFoto_Veiculo;
    }

    public function setIdFoto_Veiculo($idFoto_Veiculo){
        $this->idFoto_Veiculo = $idFoto_Veiculo;
    }

    public function getIdVeiculo(){
        return $this->idVeiculo;
    }

    public function setIdVeiculo($idVeiculo){
        $this->idVeiculo = $idVeiculo;
    }

    public function getFotoVeiculo(){
        return $this->fotoVeiculo;
    }

    public function setFotoVeiculo($fotoVeiculo){
        $this->fotoVeiculo = $fotoVeiculo;
    }

    public function getPerfil(){
        return $this->perfil;
    }

    public function setPerfil($perfil){
        $this->perfil = $perfil;
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
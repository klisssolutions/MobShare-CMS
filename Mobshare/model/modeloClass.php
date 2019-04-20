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
class Modelo{
    private $idModelo;
    private $idMarca;
    private $nomeModelo;

    public function __construct(){    
    }
    
    //------------Começo dos GETTERS e SETTERS------------
    public function getIdModelo(){
        return $this->idModelo;
    }

    public function setIdModelo($idModelo){
        $this->idModelo = $idModelo;
    }

    public function getIdMarca(){
        return $this->idMarca;
    }

    public function setIdMarca($idMarca){
        $this->idMarca = $idMarca;
    }

    public function getNomeModelo(){
        return $this->nomeModelo;
    }

    public function setNomeModelo($nomeModelo){
        $this->nomeModelo = $nomeModelo;
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
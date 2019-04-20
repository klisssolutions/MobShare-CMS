<?php
/*
    Projeto: MobShare
    Autor: leonardo
    Data Criação: 02/04/2019
    Data Modificação: 20/04/2019
    Conteudo Modificação: Método de converter para arquivo JSON
    Autor da Modificação: Igor
    Objetivo da classe: Classe de modelo
*/
class Marca{
    private $idMarca;
    private $nomeMarca;

    public function __construct(){    
    }
    
    //------------Começo dos GETTERS e SETTERS------------
    public function getIdMarca(){
        return $this->idMarca;
    }

    public function setIdMarca($idMarca){
        $this->idMarca = $idMarca;
    }

    public function getNomeMarca(){
        return $this->nomeMarca;
    }

    public function setNomeMarca($nomeMarca){
        $this->nomeMarca = $nomeMarca;
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
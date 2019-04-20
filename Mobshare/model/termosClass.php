<?php
/*
    Projeto: MobShare
    Autor: Emanuelly
    Data Criação: 02/04/2019
    Data Modificação: 20/04/19
    Conteudo Modificação: Metodo de conversao JSON
    Autor da Modificação: Igor
    Objetivo da classe: Classe de Termos
*/
class Termos{
    private $idTermo;
    private $titulo;
    private $texto;
    private $ativo;

    public function __construct(){    
    }
    
    //------------Começo dos GETTERS e SETTERS------------
    public function getIdTermo(){
        return $this->IdTermo;
    }

    public function setIdTermo($IdTermo){
        $this->IdTermo = $IdTermo;
    }

    public function getTitulo(){
        return $this->titulo;
    }

    public function setTitulo($titulo){
        $this->titulo = $titulo;
    }

    public function getTexto(){
        return $this->texto;
    }

    public function setTexto($texto){
        $this->texto = $texto;
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
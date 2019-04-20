<?php
/*
    Projeto: MobShare
    Autor: Emanuelly
    Data Criação: 11/04/2019
    Data Modificação: 20/04/19
    Conteudo Modificação: Metodo de conversao JSON
    Autor da Modificação: Igor
    Objetivo da classe: Classe da Avaliacao
*/
class Avaliacao{
    private $idAvaliacao;
    private $nota;
    private $depoimento;
    private $idLocacao;

    //------------Começo dos GETTERS e SETTERS------------
    public function getIdAvaliacao(){
        return $this->idAvaliacao;
    }

    public function setIdAvaliacao($idAvaliacao){
        $this->idAvaliacao = $idAvaliacao;
    }

    public function getNota(){
        return $this->nota;
    }

    public function setNota($nota){
        $this->nota = $nota;
    }

    public function getDepoimento(){
        return $this->depoimento;
    }

    public function setDepoimento($depoimento){
        $this->depoimento = $depoimento;
    }

    public function getIdLocacao(){
        return $this->idLocacao;
    }

    public function setIdLocacao($idLocacao){
        $this->idLocacao = $idLocacao;
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
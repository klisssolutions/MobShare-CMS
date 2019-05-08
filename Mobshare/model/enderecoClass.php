<?php
/*
    Projeto: MobShare
    Autor: Kaio
    Data Criação: 07/05/2019
    Data Modificação: 
    Conteudo Modificação:
    Autor da Modificação:
    Objetivo da classe: Classe de Categoria
*/
class Endereco{
    private $idEndereco;
    private $cidade;
    private $uf;
    private $numero;
    private $complemento;
    private $rua;

    public function __construct(){
    }

    //------------Começo dos GETTERS e SETTERS------------
    public function getIdEndereco(){
        return $this->idEndereco;
    }

    public function setIdEndereco($idEndereco){
        $this->idEndereco = $idEndereco;
    }

    public function getCidade(){
        return $this->cidade;
    }

    public function setCidade($cidade){
        $this->cidade = $cidade;
    }

    public function getUf(){
        return $this->uf;
    }

    public function setUf($uf){
        $this->uf = $uf;
    }

    public function getNumero(){
        return $this->numero;
    }

    public function setNumero($numero){
        $this->numero = $numero;
    }

    public function getComplemento(){
        return $this->complemento;
    }

    public function setComplemento($complemento){
        $this->complemento = $complemento;
    }

    public function getRua(){
        return $this->rua;
    }

    public function setRua($rua){
        $this->rua = $rua;
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
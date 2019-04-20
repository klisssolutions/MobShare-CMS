<?php
/*
    Projeto: MobShare
    Autor: Igor
    Data Criação: 04/04/2019
    Data Modificação: 20/04/2019
    Conteudo Modificação: Método de converter para arquivo JSON
    Autor da Modificação: Igor
    Objetivo da classe: Classe de Pendencias
*/
class Pendencia{
    private $idPendencia;
    private $nome;
    private $id;
    private $motivo;
    private $aberto;

    public function __construct(){    
    }
    
    //------------Começo dos GETTERS e SETTERS------------
    public function getIdPendencia(){
        return $this->idPendencia;
    }

    public function setIdPendencia($idPendencia){
        $this->idPendencia = $idPendencia;
    }

    public function getNome(){
        return $this->nome;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getMotivo(){
        return $this->motivo;
    }

    public function setMotivo($motivo){
        $this->motivo = $motivo;
    }

    public function getAberto()
    {
        return $this->aberto;
    }

    public function setAberto($aberto)
    {
        $this->aberto = $aberto;
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
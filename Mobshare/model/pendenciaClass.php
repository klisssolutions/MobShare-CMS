<?php
/*
    Projeto: MobShare
    Autor: Igor
    Data Criação: 04/04/2019
    Data Modificação:
    Conteudo Modificação:
    Autor da Modificação:
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
}
?>
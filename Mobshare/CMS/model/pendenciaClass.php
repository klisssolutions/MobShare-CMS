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
class Nivel{
    private $idPendencia;
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
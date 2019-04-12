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
class Marca{
    private $idMarca;
    private $nomeMarca;



    public function __construct(){    
    }
    
    //------------Começo dos GETTERS e SETTERS------------

    public function getIdMarca()
    {
        return $this->idMarca;
    }

    /**
     * Set the value of idVeiculo
     *
     * @return  self
     */ 
    public function setIdMarca($idMarca)
    {
        $this->idMarca = $idMarca;

        return $this;
    }

    public function getNomeMarca()
    {
        return $this->nomeMarca;
    }

    /**
     * Set the value of idVeiculo
     *
     * @return  self
     */ 
    public function setNomeMarca($nomeMarca)
    {
        $this->nomeMarca = $nomeMarca;

        return $this;
    }






}
?>
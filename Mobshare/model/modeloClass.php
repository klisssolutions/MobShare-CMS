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

    
    /**
     * Get the value of idVeiculo
     */ 
    public function getIdModelo()
    {
        return $this->idModelo;
    }

    /**
     * Set the value of idVeiculo
     *
     * @return  self
     */ 
    public function setIdModelo($idModelo)
    {
        $this->idModelo = $idModelo;

        return $this;
    }

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

    public function getNomeModelo()
    {
        return $this->nomeModelo;
    }

    /**
     * Set the value of idVeiculo
     *
     * @return  self
     */ 
    public function setNomeModelo($nomeModelo)
    {
        $this->nomeModelo = $nomeModelo;

        return $this;
    }






}
?>
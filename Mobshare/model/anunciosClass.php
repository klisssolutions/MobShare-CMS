<?php
/*
    Projeto: MobShare
    Autor: Emanuelly
    Data Criação: 29/04/2019
    Data Modificação:
    Conteudo Modificação:
    Autor da Modificação:
    Objetivo da classe: Classe API
*/
class anuncios{
    private $idVeiculo;
    private $nomeModelo;
    private $nomeMarca;
    private $fotoVeiculo;



    /**
     * Get the value of idVeiculo
     */ 
    public function getIdVeiculo()
    {
        return $this->idVeiculo;
    }

    /**
     * Set the value of idVeiculo
     *
     * @return  self
     */ 
    public function setIdVeiculo($idVeiculo)
    {
        $this->idVeiculo = $idVeiculo;

        return $this;
    }
    

    /**
     * Get the value of nomeModelo
     */ 
    public function getNomeModelo()
    {
        return $this->nomeModelo;
    }

    /**
     * Set the value of nomeModelo
     *
     * @return  self
     */ 
    public function setNomeModelo($nomeModelo)
    {
        $this->nomeModelo = $nomeModelo;

        return $this;
    }

    /**
     * Get the value of nomeMarca
     */ 
    public function getNomeMarca()
    {
        return $this->nomeMarca;
    }

    /**
     * Set the value of nomeMarca
     *
     * @return  self
     */ 
    public function setNomeMarca($nomeMarca)
    {
        $this->nomeMarca = $nomeMarca;

        return $this;
    }

    /**
     * Get the value of fotoVeiculo
     */ 
    public function getFotoVeiculo()
    {
        return $this->fotoVeiculo;
    }

    /**
     * Set the value of fotoVeiculo
     *
     * @return  self
     */ 
    public function setFotoVeiculo($fotoVeiculo)
    {
        $this->fotoVeiculo = $fotoVeiculo;

        return $this;
    }
}
?>
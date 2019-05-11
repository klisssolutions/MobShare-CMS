<?php
/*
    Projeto: MobShare
    Autor: Leonardo
    Data Criação: 08/05/2019
    Data Modificação:
    Conteudo Modificação:
    Autor da Modificação:
    Objetivo da classe: Modelar acessório
*/
class Acessorio{
    private $idAcessorio;
    private $idTipoVeiculo;
    private $nomeAcessorio;
    private $quantidade;
    



    /**
     * Get the value of idVeiculo
     */ 
    public function getIdAcessorio()
    {
        return $this->idAcessorio;
    }

    /**
     * Set the value of idVeiculo
     *
     * @return  self
     */ 
    public function setIdAcessorio($idAcessorio)
    {
        $this->idAcessorio = $idAcessorio;

        return $this;
    }

    /**
     * Get the value of idVeiculo
     */ 
    public function getIdTipoVeiculo()
    {
        return $this->idTipoVeiculo;
    }

    /**
     * Set the value of idVeiculo
     *
     * @return  self
     */ 
    public function setIdTipoVeiculo($idTipoVeiculo)
    {
        $this->idTipoVeiculo = $idTipoVeiculo;

        return $this;
    }    

    /**
     * Get the value of idVeiculo
     */ 
    public function getNomeAcessorio()
    {
        return $this->nomeAcessorio;
    }

    /**
     * Set the value of idVeiculo
     *
     * @return  self
     */ 
    public function setNomeAcessorio($nomeAcessorio)
    {
        $this->nomeAcessorio = $nomeAcessorio;

        return $this;
    }        
    

    public function getQuantidade()
    {
        return $this->quantidade;
    }

    /**
     * Set the value of idVeiculo
     *
     * @return  self
     */ 
    public function setQuantidade($quantidade)
    {
        $this->quantidade = $quantidade;

        return $this;
    }        
        
}
?>
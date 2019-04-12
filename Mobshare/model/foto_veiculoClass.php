<?php
/*
    Projeto: MobShare
    Autor: leonardo
    Data Criação: 02/04/2019
    Data Modificação:
    Conteudo Modificação:
    Autor da Modificação:
    Objetivo da classe: Classe de Veiculo
*/
class Foto_Veiculo{
    private $idFoto_Veiculo;
    private $idVeiculo;
    private $fotoVeiculo;
    private $perfil;



    public function __construct(){    
    }
    
    //------------Começo dos GETTERS e SETTERS------------

    /**
     * Get the value of idFoto_Veiculo
     */ 
    public function getIdFoto_Veiculo()
    {
        return $this->idFoto_Veiculo;
    }

    /**
     * Set the value of idFoto_Veiculo
     *
     * @return  self
     */ 
    public function setIdFoto_Veiculo($idFoto_Veiculo)
    {
        $this->idFoto_Veiculo = $idFoto_Veiculo;

        return $this;
    }

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

    /**
     * Get the value of perfil
     */ 
    public function getPerfil()
    {
        return $this->perfil;
    }

    /**
     * Set the value of perfil
     *
     * @return  self
     */ 
    public function setPerfil($perfil)
    {
        $this->perfil = $perfil;

        return $this;
    }
}
?>
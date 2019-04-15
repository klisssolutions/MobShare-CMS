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
class veiculo{
    private $idVeiculo;
    private $idCategoriaVeiculo;
    private $idCliente;
    private $idModelo;
    private $cor;
    private $altura;
    private $comprimento;
    private $largura;
    private $valorHora;
    private $ano;
    private $quilometragem;
    private $valorVenda;
    private $idEndereco;


    public function __construct(){    
    }
    
    //------------Começo dos GETTERS e SETTERS------------


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
     * Get the value of idCategoriaVeiculo
     */ 
    public function getIdCategoriaVeiculo()
    {
        return $this->idCategoriaVeiculo;
    }

    /**
     * Set the value of idCategoriaVeiculo
     *
     * @return  self
     */ 
    public function setIdCategoriaVeiculo($idCategoriaVeiculo)
    {
        $this->idCategoriaVeiculo = $idCategoriaVeiculo;

        return $this;
    }

    /**
     * Get the value of idCliente
     */ 
    public function getIdCliente()
    {
        return $this->idCliente;
    }

    /**
     * Set the value of idCliente
     *
     * @return  self
     */ 
    public function setIdCliente($idCliente)
    {
        $this->idCliente = $idCliente;

        return $this;
    }


    /**
     * Get the value of modelo
     */ 
    public function getIdModelo()
    {
        return $this->idModelo;
    }

    /**
     * Set the value of modelo
     *
     * @return  self
     */ 
    public function setIdModelo($idModelo)
    {
        $this->idModelo = $idModelo;

        return $this;
    }

    /**
     * Get the value of cor
     */ 
    public function getCor()
    {
        return $this->cor;
    }

    /**
     * Set the value of cor
     *
     * @return  self
     */ 
    public function setCor($cor)
    {
        $this->cor = $cor;

        return $this;
    }

    /**
     * Get the value of altura
     */ 
    public function getAltura()
    {
        return $this->altura;
    }

    /**
     * Set the value of altura
     *
     * @return  self
     */ 
    public function setAltura($altura)
    {
        $this->altura = $altura;

        return $this;
    }

    /**
     * Get the value of comprimento
     */ 
    public function getComprimento()
    {
        return $this->comprimento;
    }

    /**
     * Set the value of comprimento
     *
     * @return  self
     */ 
    public function setComprimento($comprimento)
    {
        $this->comprimento = $comprimento;

        return $this;
    }

    /**
     * Get the value of largura
     */ 
    public function getLargura()
    {
        return $this->largura;
    }

    /**
     * Set the value of largura
     *
     * @return  self
     */ 
    public function setLargura($largura)
    {
        $this->largura = $largura;

        return $this;
    }

    /**
     * Get the value of valorHora
     */ 
    public function getValorHora()
    {
        return $this->valorHora;
    }

    /**
     * Set the value of valorHora
     *
     * @return  self
     */ 
    public function setValorHora($valorHora)
    {
        $this->valorHora = $valorHora;

        return $this;
    }

    /**
     * Get the value of ano
     */ 
    public function getAno()
    {
        return $this->ano;
    }

    /**
     * Set the value of ano
     *
     * @return  self
     */ 
    public function setAno($ano)
    {
        $this->ano = $ano;

        return $this;
    }

    /**
     * Get the value of quilometragem
     */ 
    public function getQuilometragem()
    {
        return $this->quilometragem;
    }

    /**
     * Set the value of quilometragem
     *
     * @return  self
     */ 
    public function setQuilometragem($quilometragem)
    {
        $this->quilometragem = $quilometragem;

        return $this;
    }

    /**
     * Get the value of valorVenda
     */ 
    public function getValorVenda()
    {
        return $this->valorVenda;
    }

    /**
     * Set the value of valorVenda
     *
     * @return  self
     */ 
    public function setValorVenda($valorVenda)
    {
        $this->valorVenda = $valorVenda;

        return $this;
    }

    /**
     * Get the value of idEndereco
     */ 
    public function getIdEndereco()
    {
        return $this->idEndereco;
    }

    /**
     * Set the value of idEndereco
     *
     * @return  self
     */ 
    public function setIdEndereco($idEndereco)
    {
        $this->idEndereco = $idEndereco;

        return $this;
    }

}
?>
<?php
/*
    Projeto: MobShare
    Autor: leonardo
    Data Criação: 02/04/2019
    Data Modificação:
    Conteudo Modificação: 
    Autor da Modificação: 
    Objetivo da classe: Classe de solicitacao locacao
*/
class VSolicitacao_Locacao{
    private $idSolicitacao_Locacao;
    private $idCliente;
    private $nomeCliente;
    private $idDono;
    private $veiculo;
    private $horarioInicio;
    private $horarioFim;
    private $motivoRecusa;

    

    public function __construct(){    
    }
    
    //------------Começo dos GETTERS e SETTERS------------
  




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


    /**
     * Get the value of idSolicitacao_Locacao
     */ 
    public function getIdSolicitacao_Locacao()
    {
        return $this->idSolicitacao_Locacao;
    }

    /**
     * Set the value of idSolicitacao_Locacao
     *
     * @return  self
     */ 
    public function setIdSolicitacao_Locacao($idSolicitacao_Locacao)
    {
        $this->idSolicitacao_Locacao = $idSolicitacao_Locacao;

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
     * Get the value of nomeCliente
     */ 
    public function getNomeCliente()
    {
        return $this->nomeCliente;
    }

    /**
     * Set the value of nomeCliente
     *
     * @return  self
     */ 
    public function setNomeCliente($nomeCliente)
    {
        $this->nomeCliente = $nomeCliente;

        return $this;
    }

    /**
     * Get the value of idDono
     */ 
    public function getIdDono()
    {
        return $this->idDono;
    }

    /**
     * Set the value of idDono
     *
     * @return  self
     */ 
    public function setIdDono($idDono)
    {
        $this->idDono = $idDono;

        return $this;
    }

    /**
     * Get the value of veiculo
     */ 
    public function getVeiculo()
    {
        return $this->veiculo;
    }

    /**
     * Set the value of veiculo
     *
     * @return  self
     */ 
    public function setVeiculo($veiculo)
    {
        $this->veiculo = $veiculo;

        return $this;
    }

    /**
     * Get the value of horarioInicio
     */ 
    public function getHorarioInicio()
    {
        return $this->horarioInicio;
    }

    /**
     * Set the value of horarioInicio
     *
     * @return  self
     */ 
    public function setHorarioInicio($horarioInicio)
    {
        $this->horarioInicio = $horarioInicio;

        return $this;
    }

    /**
     * Get the value of horarioFim
     */ 
    public function getHorarioFim()
    {
        return $this->horarioFim;
    }

    /**
     * Set the value of horarioFim
     *
     * @return  self
     */ 
    public function setHorarioFim($horarioFim)
    {
        $this->horarioFim = $horarioFim;

        return $this;
    }

    /**
     * Get the value of motivoRecusa
     */ 
    public function getMotivoRecusa()
    {
        return $this->motivoRecusa;
    }

    /**
     * Set the value of motivoRecusa
     *
     * @return  self
     */ 
    public function setMotivoRecusa($motivoRecusa)
    {
        $this->motivoRecusa = $motivoRecusa;

        return $this;
    }
}
?>
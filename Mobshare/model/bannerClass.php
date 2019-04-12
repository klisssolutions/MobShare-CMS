    <?php
/*
    Projeto: MobShare
    Autor: leonardo
    Data Criação: 08/04/2019
    Data Modificação:
    Conteudo Modificação:
    Autor da Modificação:
    Objetivo da classe: Classe de modelo
*/
class Banner{
    private $idBanner;
    private $titulo;
    private $imagem;
    private $texto;
    private $href;
    private $nomeBotao;
    private $ativo;
    



    public function __construct(){    
    }
    
    //------------Começo dos GETTERS e SETTERS------------



    /**
     * Get the value of idBanner
     */ 
    public function getIdBanner()
    {
        return $this->idBanner;
    }

    /**
     * Set the value of idBanner
     *
     * @return  self
     */ 
    public function setIdBanner($idBanner)
    {
        $this->idBanner = $idBanner;

        return $this;
    }

    /**
     * Get the value of titulo
     */ 
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * Set the value of titulo
     *
     * @return  self
     */ 
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;

        return $this;
    }

    /**
     * Get the value of imagem
     */ 
    public function getImagem()
    {
        return $this->imagem;
    }

    /**
     * Set the value of imagem
     *
     * @return  self
     */ 
    public function setImagem($imagem)
    {
        $this->imagem = $imagem;

        return $this;
    }

    /**
     * Get the value of texto
     */ 
    public function getTexto()
    {
        return $this->texto;
    }

    /**
     * Set the value of texto
     *
     * @return  self
     */ 
    public function setTexto($texto)
    {
        $this->texto = $texto;

        return $this;
    }

    /**
     * Get the value of href
     */ 
    public function getHref()
    {
        return $this->href;
    }

    /**
     * Set the value of href
     *
     * @return  self
     */ 
    public function setHref($href)
    {
        $this->href = $href;

        return $this;
    }

    /**
     * Get the value of nomeBotao
     */ 
    public function getNomeBotao()
    {
        return $this->nomeBotao;
    }

    /**
     * Set the value of nomeBotao
     *
     * @return  self
     */ 
    public function setNomeBotao($nomeBotao)
    {
        $this->nomeBotao = $nomeBotao;

        return $this;
    }

    /**
     * Get the value of ativo
     */ 
    public function getAtivo()
    {
        return $this->ativo;
    }

    /**
     * Set the value of ativo
     *
     * @return  self
     */ 
    public function setAtivo($ativo)
    {
        $this->ativo = $ativo;

        return $this;
    }
}
?>
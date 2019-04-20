    <?php
/*
    Projeto: MobShare
    Autor: leonardo
    Data Criação: 08/04/2019
    Data Modificação: 20/04/2019
    Conteudo Modificação: Método de converter para arquivo JSON
    Autor da Modificação: Igor
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
    public function getIdBanner(){
        return $this->idBanner;
    }

    public function setIdBanner($idBanner){
        $this->idBanner = $idBanner;
    }

    public function getTitulo(){
        return $this->titulo;
    }

    public function setTitulo($titulo){
        $this->titulo = $titulo;
    }

    public function getImagem(){
        return $this->imagem;
    }

    public function setImagem($imagem){
        $this->imagem = $imagem;
    }

    public function getTexto(){
        return $this->texto;
    }

    public function setTexto($texto){
        $this->texto = $texto;
    }

    public function getHref(){
        return $this->href;
    }

    public function setHref($href){
        $this->href = $href;
    }

    public function getNomeBotao(){
        return $this->nomeBotao;
    }

    public function setNomeBotao($nomeBotao){
        $this->nomeBotao = $nomeBotao;
    }

    public function getAtivo(){
        return $this->ativo;
    }

    public function setAtivo($ativo){
        $this->ativo = $ativo;
    }
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
}
?>
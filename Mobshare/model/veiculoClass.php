<?php
/*
    Projeto: MobShare
    Autor: leonardo
    Data Criação: 02/04/2019
    Data Modificação: 20/04/2019
    Conteudo Modificação: Método de converter para arquivo JSON
    Autor da Modificação: Igor
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
    public function getIdVeiculo(){
        return $this->idVeiculo;
    }

    public function setIdVeiculo($idVeiculo){
        $this->idVeiculo = $idVeiculo;
    }
 
    public function getIdCategoriaVeiculo(){
        return $this->idCategoriaVeiculo;
    }

    public function setIdCategoriaVeiculo($idCategoriaVeiculo){
        $this->idCategoriaVeiculo = $idCategoriaVeiculo;
    }

    public function getIdCliente(){
        return $this->idCliente;
    }

    public function setIdCliente($idCliente){
        $this->idCliente = $idCliente;
    }

    public function getIdModelo(){
        return $this->idModelo;
    }

    public function setIdModelo($idModelo){
        $this->idModelo = $idModelo;
    }

    public function getCor(){
        return $this->cor;
    }

    public function setCor($cor){
        $this->cor = $cor;
    }

    public function getAltura(){
        return $this->altura;
    }

    public function setAltura($altura){
        $this->altura = $altura;
    }

    public function getComprimento(){
        return $this->comprimento;
    }

    public function setComprimento($comprimento){
        $this->comprimento = $comprimento;
    }

    public function getLargura(){
        return $this->largura;
    }

    public function setLargura($largura){
        $this->largura = $largura;
    }

    public function getValorHora(){
        return $this->valorHora;
    }

    public function setValorHora($valorHora){
        $this->valorHora = $valorHora;
    }

    public function getAno(){
        return $this->ano;
    }

    public function setAno($ano){
        $this->ano = $ano;
    }
    public function getQuilometragem(){
        return $this->quilometragem;
    }

    public function setQuilometragem($quilometragem){
        $this->quilometragem = $quilometragem;
    }

    public function getValorVenda(){
        return $this->valorVenda;
    }

    public function setValorVenda($valorVenda){
        $this->valorVenda = $valorVenda;
    }

    public function getIdEndereco(){
        return $this->idEndereco;
    }

    public function setIdEndereco($idEndereco){
        $this->idEndereco = $idEndereco;
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
<?php
/*
    Projeto: MobShare
    Autor: Kaio
    Data Criação: 07/05/2019
    Data Modificação: 
    Conteudo Modificação:
    Autor da Modificação:
    Objetivo da classe: Classe de Categoria
*/
class Categoria{
    private $idCategoria_Veiculo;
    private $idTipo_Veiculo;
    private $nomeCategoria;
    private $porcentagemGanho;

    public function __construct(){
    }

    //------------Começo dos GETTERS e SETTERS------------
    public function getIdCategoria_Veiculo(){
        return $this->idCategoria_Veiculo;
    }

    public function setIdCategoria_Veiculo($idCategoria_Veiculo){
        $this->idCategoria_Veiculo = $idCategoria_Veiculo;
    }

    public function getIdTipo_Veiculo(){
        return $this->idTipo_Veiculo;
    }

    public function setIdTipo_Veiculo($idTipo_Veiculo){
        $this->idTipo_Veiculo = $idTipo_Veiculo;
    }

    public function getNomeCategoria(){
        return $this->nomeCategoria;
    }

    public function setNomeCategoria($nomeCategoria){
        $this->nomeCategoria = $nomeCategoria;
    }

    public function getPorcentagemGanho(){
        return $this->porcentagemGanho;
    }

    public function setPorcentagemGanho($porcentagemGanho){
        $this->porcentagemGanho = $porcentagemGanho;
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
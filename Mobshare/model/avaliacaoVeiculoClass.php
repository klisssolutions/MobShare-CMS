<?php
/*
    Projeto: MobShare
    Autor: Emanuelly
    Data Criação: 10/04/2019
    Data Modificação: 20/04/19
    Conteudo Modificação: Metodo de conversao JSON
    Autor da Modificação: Igor
    Objetivo da classe: Classe de avaliação
*/

class AvaliacaoVeiculo{
    private $idVeiculo;
    private $nomeModelo;
    private $nomeMarca;
    private $nota;
    private $depoimento;

    //------------Começo dos GETTERS e SETTERS------------
    public function getNomeModelo(){
        return $this->nomeModelo;
    }

    public function setNomeModelo($nomeModelo){
        $this->nomeModelo = $nomeModelo;
    }

    public function getNomeMarca(){
        return $this->nomeMarca;
    }

    public function setNomeMarca($nomeMarca){
        $this->nomeMarca = $nomeMarca;
    }

    public function getNota(){
        return $this->nota;
    }

    public function setNota($nota){
        $this->nota = $nota;
    }

    public function getDepoimento(){
        return $this->depoimento;
    }

    public function setDepoimento($depoimento){
        $this->depoimento = $depoimento;
    }

    public function getIdVeiculo(){
        return $this->idVeiculo;
    }

    public function setIdVeiculo($idVeiculo){
        $this->idVeiculo = $idVeiculo;
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
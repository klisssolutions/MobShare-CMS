<?php
/*
    Projeto: MobShare
    Autor: Igor
    Data Criação: 23/03/2019
    Data Modificação: 20/04/2019
    Conteudo Modificação: Método de converter para arquivo JSON
    Autor da Modificação: Igor
    Objetivo da classe: Classe de Funcionários
*/
class Funcionario{
    private $idUsuarioWeb;
    private $email;
    private $nome;
    private $senha;
    private $idNivel;

    public function __construct(){
    }

    //------------Começo dos GETTERS e SETTERS------------
    public function getidUsuarioWeb(){
        return $this->idUsuarioWeb;
    }

    public function setidUsuarioWeb($idUsuarioWeb){
        $this->idUsuarioWeb = $idUsuarioWeb;
    }

    public function getEmail(){
        return $this->email;
    }

    public function setEmail($email){
        $this->email = $email;
    }

    public function getNome(){
        return $this->nome;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }

    public function getSenha(){
        return $this->senha;
    }

    public function setSenha($senha){
        $this->senha = $senha;
    }

    public function getIdNivel(){
        return $this->idNivel;
    }

    public function setIdNivel($idNivel){
        $this->idNivel = $idNivel;
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
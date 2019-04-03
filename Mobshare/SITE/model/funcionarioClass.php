<?php
/*
    Projeto: MobShare
    Autor: Igor
    Data Criação: 23/03/2019
    Data Modificação: 01/04/2019
    Conteudo Modificação: Mudança da tabela
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
}
?>
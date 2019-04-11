<?php
/*
    Projeto: MobShare
    Autor: Igor
    Data Criação: 03/04/2019
    Data Modificação:
    Conteudo Modificação:
    Autor da Modificação:
    Objetivo da classe: Classe de clientes
*/
class Cliente{
    private $idCliente;
    private $nome;
    private $cpf;
    private $dtNasc;
    private $cnh;
    private $categoriaCnh;
    private $email;
    private $senha;
    private $fotoPerfil;
    private $dataCadastro;

    public function __construct(){
    }
    
    //------------Começo dos GETTERS e SETTERS------------

    public function getIdCliente(){
        return $this->idCliente;
    }

    public function setIdCliente($idCliente){
        $this->idCliente = $idCliente;
    }

    public function getNome(){
        return $this->nome;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }

    public function getCpf(){
        return $this->cpf;
    }

    public function setCpf($cpf){
        $this->cpf = $cpf;
    }

    public function getDtNasc(){
        return $this->dtNasc;
    }

    public function setDtNasc($dtNasc){
        $this->dtNasc = $dtNasc;
    }

    public function getCnh(){
        return $this->cnh;
    }

    public function setCnh($cnh){
        $this->cnh = $cnh;
    }

    public function getCategoriaCnh(){
        return $this->categoriaCnh;
    }

    public function setCategoriaCnh($categoriaCnh){
        $this->categoriaCnh = $categoriaCnh;
    }

    public function getEmail(){
        return $this->email;
    }

    public function setEmail($email){
        $this->email = $email;
    }

    public function getSenha(){
        return $this->senha;
    }

    public function setSenha($senha){
        $this->senha = $senha;
    }

    public function getFotoPerfil(){
        return $this->fotoPerfil;
    }

    public function setFotoPerfil($fotoPerfil){
        $this->fotoPerfil = $fotoPerfil;
    }

    public function getDataCadastro(){
        return $this->dataCadastro;
    }

    public function setDataCadastro($dataCadastro){
        $this->dataCadastro = $dataCadastro;
    }
}
?>
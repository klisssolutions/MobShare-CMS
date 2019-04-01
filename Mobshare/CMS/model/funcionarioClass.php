<?php
/*
    Projeto: MobShare
    Autor: Igor
    Data Criação: 23/03/2019
    Data Modificação:
    Conteudo Modificação:
    Autor da Modificação:
    Objetivo da classe: Classe de Funcionários
*/
class Funcionario{
    private $idFuncionario;
    private $email;
    private $nome;
    private $cpf;
    private $rg;
    private $senha;
    private $dataAdmissao;
    private $dataDemissao;
    private $salario;
    private $cargo;
    private $setor;
    private $idNivel;
    private $permissoesDesktop;

    public function __construct(){
    }

    //------------Começo dos GETTERS e SETTERS------------
    public function getIdFuncionario(){
        return $this->idFuncionario;
    }

    public function setIdFuncionario($idFuncionario){
        $this->idFuncionario = $idFuncionario;
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

    public function getCpf(){
        return $this->cpf;
    }

    public function setCpf($cpf){
        $this->cpf = $cpf;
    }

    public function getRg(){
        return $this->rg;
    }

    public function setRg($rg){
        $this->rg = $rg;
    }

    public function getSenha(){
        return $this->senha;
    }

    public function setSenha($senha){
        $this->senha = $senha;
    }

    public function getDataAdmissao(){
        return $this->dataAdmissao;
    }

    public function setDataAdmissao($dataAdmissao){
        $this->dataAdmissao = $dataAdmissao;
    }

    public function getDataDemissao(){
        return $this->dataDemissao;
    }

    public function setDataDemissao($dataDemissao){
        $this->dataDemissao = $dataDemissao;
    }

    public function getSalario(){
        return $this->salario;
    }

    public function setSalario($salario){
        $this->salario = $salario;
    }

    public function getCargo(){
        return $this->cargo;
    }

    public function setCargo($cargo){
        $this->cargo = $cargo;
    }


    public function getSetor(){
        return $this->setor;
    }

    public function setSetor($setor){
        $this->setor = $setor;
    }

    public function getIdNivel(){
        return $this->idNivel;
    }

    public function setIdNivel($idNivel){
        $this->idNivel = $idNivel;
    }

    public function getPermissoesDesktop(){
        return $this->permissoesDesktop;
    }

    public function setPermissoesDesktop($permissoesDesktop){
        $this->permissoesDesktop = $permissoesDesktop;
    }
    //------------Fim dos GETTERS e SETTERS------------
}
?>
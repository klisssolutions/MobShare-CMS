<?php
/*
    Projeto: MobShare
    Autor: Igor
    Data Criação: 23/03/2019
    Data Modificação:
    Conteudo Modificação:
    Autor da Modificação:
    Objetivo da classe: Classe de Níveis
*/
class Nivel{
    private $idNivel;
    private $nome;
    private $descricao;
    private $permissoes;

    public function __construct(){    
    }
    
    //------------Começo dos GETTERS e SETTERS------------
    public function getIdNivel(){
        return $this->idNivel;
    }

    public function setIdNivel($idNivel){
        $this->idNivel = $idNivel;
    }

    public function getNome(){
        return $this->nome;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }

    public function getDescricao(){
        return $this->descricao;
    }

    public function setDescricao($descricao){
        $this->descricao = $descricao;
    }

    public function getPermissoes(){
        return $this->permissoes;
    }

    public function setPermissoes($permissoes){
        $this->permissoes = $permissoes;
    }
}
?>
<?php 

/*
    Projeto: MobShare
    Autor: Kaio
    Data Criação: 01/04/2019
    Data Modificação:
    Conteudo Modificação:
    Autor da Modificação:
    Objetivo da classe: Classe de Parceiro
*/

    class Funcionamento{
        private $idFuncionamento;
        private $titulo;
        private $descricao;
        private $foto;

    public function __construct(){
    }

	public function getIdFuncionamento(){
		return $this->idFuncionamento;
	}

	public function setIdFuncionamento($idFuncionamento) {
		$this->idFuncionamento = $idFuncionamento;
	}

	public function getTitulo() {
		return $this->titulo;
	}

	public function setTitulo($titulo) {
		$this->titulo = $titulo;
	}

	public function getDescricao() {
		return $this->descricao;
	}

	public function setDescricao($descricao) {
		$this->descricao = $descricao;
	}

	public function getFoto() {
		return $this->foto;
	}

	public function setFoto($foto) {
		$this->foto = $foto;
	}

        
    }

?>
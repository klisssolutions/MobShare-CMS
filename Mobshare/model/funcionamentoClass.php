<?php 

/*
    Projeto: MobShare
    Autor: Kaio
    Data Criação: 01/04/2019
    Data Modificação: 20/04/2019
    Conteudo Modificação: Método de converter para arquivo JSON
    Autor da Modificação: Igor
    Objetivo da classe: Classe de Parceiro
*/

class Funcionamento{
    private $idFuncionamento;
    private $titulo;
    private $descricao;
	private $foto;
	private $ativo;

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

	public function getAtivo() {
		return $this->ativo;
	}

	public function setAtivo($ativo) {
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
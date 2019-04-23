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

class Parceiro{
        private $idParceiro;
        private $nome;
        private $descricao;
        private $site;
        private $logo;
		private $email;
		private $ativo;

    public function __construct(){
	}
	
	//------------Começo dos GETTERS e SETTERS------------
	public function getIdParceiro(){
		return $this->idParceiro;
	}

	public function setIdParceiro($idParceiro) {
		$this->idParceiro = $idParceiro;
	}

	public function getNome() {
		return $this->nome;
	}

	public function setNome($nome) {
		$this->nome = $nome;
	}

	public function getDescricao() {
		return $this->descricao;
	}

	public function setDescricao($descricao) {
		$this->descricao = $descricao;
	}

	public function getSite() {
		return $this->site;
	}

	public function setSite($site) {
		$this->site = $site;
	}

	public function getLogo() {
		return $this->logo;
	}

	public function setLogo($logo) {
		$this->logo = $logo;
	}

	public function getEmail() {
		return $this->email;
	}

	public function setEmail($email) {
		$this->email = $email;
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
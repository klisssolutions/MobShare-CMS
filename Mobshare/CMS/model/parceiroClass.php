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

    class Parceiro{
        private $idParceiro;
        private $nome;
        private $descricao;
        private $site;
        private $logo;
        private $email;

    public function __construct(){
    }

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


        
    }

?>
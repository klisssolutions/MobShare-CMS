<?php
/*
    Projeto: MobShare
    Autor: Leonardo
    Data Criação: 03/02/2019
    Data Modificação:
    Conteudo Modificação: 
    Autor da Modificação: 
    Objetivo da classe: Controller de veiculos
*/

(@session_start());
require_once($_SESSION["importInclude"]);

class controllerBanner{

    public function __construct(){
        //Import da classe nivel
        require_once(IMPORT_BANNER);

        //Import da classe nivelDAO, para inserir no BD
        require_once(IMPORT_BANNER_DAO);
    }

    public function inserir(){
        
        //Instancia do DAO
        $bannerDAO = new bannerDAO();

        //Verifica qual metodo esta sendo requisitado do formulario(POST ou GET)
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            
            $titulo = $_POST["txttitulo"];
            $texto = $_POST["txttexto"];
            $href = $_POST["txturl"];
            $nomebotao = $_POST["txtnomebotao"];
            $imagem = enviarImagem($_FILES["imgBanner"]);

            $banner = new Banner();

            $banner->setTitulo($titulo);
            $banner->setTexto($texto);
            $banner->setHref($href);
            $banner->setNomebotao($nomebotao);
            $banner->setImagem($imagem);

            $bannerDAO = new bannerDAO();

            return $bannerDAO->insert($banner);
        }
    }

    public function excluir(){
        //Instancia do DAO
        $bannerDAO = new bannerDAO();
        //Esse id foi enviado pela view no href, o arquivo de rota é quem chamou este método
        $id = $_GET["id"];

        //Chamada para o método de excluir um nivel
        return $bannerDAO->delete($id);
    }

    public function atualizar(){
        //Instancia do DAO
        $bannerDAO = new bannerDAO();

        //Verifica qual metodo esta sendo requisitado do formulario(POST ou GET)
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            
            $titulo = $_POST["txttitulo"];
            $texto = $_POST["txttexto"];
            $href = $_POST["txturl"];
            $nomebotao = $_POST["txtnomebotao"];
            $imagem = ($_FILES['imgBanner']["size"] ? enviarImagem($_FILES['imgBanner']) : null);
            
            $banner = new Banner();
            
            $banner->setIdBanner($_GET["id"]);
            $banner->setTitulo($titulo);
            $banner->setTexto($texto);
            $banner->setHref($href);
            $banner->setNomebotao($nomebotao);
            $banner->setImagem($imagem);

            $bannerDAO = new bannerDAO();

            return $bannerDAO->update($banner);
        }
    }

    public function listarBanners(){
        //Instancia do DAO
        $bannerDAO = new bannerDAO();
        return($bannerDAO->selectAll());
    }

    public function buscarBanner(){
        //Instancia do DAO
        $bannerDAO = new bannerDAO();

        //Pega o ID para realizar a busca
        $id = $_GET["id"];
        
        return $bannerDAO->selectById($id);
    }
}
?>
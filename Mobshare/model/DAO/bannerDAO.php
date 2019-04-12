<?php
/*
    Projeto: Mobshare
    Autor: Leonardo
    Data Criação: 02/04/2019
    Data Modificação: 
    Conteudo Modificação: 
    Autor da Modificação: 
    Objetivo da classe: CRUD da classe de veiculo
*/

//Import do arquivo de constantes
@session_start();
require_once($_SESSION["importInclude"]); 

class bannerDAO{

    private $conex;

    public function __construct(){
        //Import da classe do banco para todos os métodos
        require_once(IMPORT_CONEXAO);

        //Instancia da classe conexão
        $this->conex = new conexaoMySQL();
    }

    //Inserir um registro no banco de dados.
    public function insert(Banner $banner){
        $sql = INSERT . " Banner " . " 
        (titulo, imagem, texto, href, nomeBotao)
        VALUES (
        '".$banner->getTitulo()."',
        '".$banner->getImagem()."',
        '".$banner->getTexto()."',
        '".$banner->getHref()."',
        '".$banner->getNomeBotao()."')";

        //Abrindo conexão com o BD
        $PDO_conex = $this->conex->connectDataBase();

        //Executa no BD o script Insert e retorna verdadeiro/falso
        if($PDO_conex->query($sql)){
            //echo(SUCESSO_SCRIPT);
            echo("<script>alert('Banner inserido com sucesso.');</script>");
        }else{
            //echo(ERRO_SCRIPT);
            //echo($sql);
        }

        //Fecha a conexão com o BD
        $this->conex->closeDataBase();
    }

    //Deletar um registro no banco de dados.
    public function delete($id){
        $sql = DELETE . " Banner" . " where idBanner =".$id;

        //Abrindo conexão com o BD
        $PDO_conex = $this->conex->connectDataBase();

        //Executa no BD o script Insert e retorna verdadeiro/falso
        if($PDO_conex->query($sql)){
            echo("<script>alert('Banner deletado com sucesso.');</script>");
            //echo(SUCESSO_SCRIPT);
        }else{
            //echo(ERRO_SCRIPT);
            //echo($sql);
            echo("<script>alert('Erro ao deletar.');</script>");
        }

        //Fecha a conexão com o BD
        $this->conex->closeDataBase();
    }

    //Atualiza um registro no banco de dados.
    public function update(Banner $banner){

        if($banner->getImagem()){
            $sql = UPDATE . " Banner" . " 
            SET titulo = '".$banner->getTitulo()."',
                texto = '".$banner->getTexto()."',
                href = '".$banner->getHref()."',
                nomeBotao = '".$banner->getNomeBotao()."',
                href = '".$banner->getHref()."',
                imagem = '".$banner->getImagem()."'
            WHERE idBanner = '".$banner->getIdBanner()."';";
        }else{
            $sql = UPDATE . " Banner" . " 
            SET titulo = '".$banner->getTitulo()."',
                texto = '".$banner->getTexto()."',
                href = '".$banner->getHref()."',
                nomeBotao = '".$banner->getNomeBotao()."',
                href = '".$banner->getHref()."'
            WHERE idBanner = '".$banner->getIdBanner()."';";
        }


        //Abrindo conexão com o BD
        $PDO_conex = $this->conex->connectDataBase();

        //Executa no BD o script Insert e retorna verdadeiro/falso
        if($PDO_conex->query($sql)){
            //echo(SUCESSO_SCRIPT);
            //echo($sql);
            echo("<script>alert('Banner atualizado com sucesso.');</script>");
        }else{
            echo(ERRO_SCRIPT);
            //echo($sql);
        }

        //Fecha a conexão com o BD
        $this->conex->closeDataBase();
    }

    //Lista todos os registros do banco de dados.
    public function selectAll(){
        $sql = SELECT.' Banner';

        //Abrindo conexão com o BD
        $PDO_conex = $this->conex->connectDataBase();

        //executa o script de select no bd
        $select = $PDO_conex->query($sql);
        $cont = 0;
        
        /* $select->fetch no formado pdo retorna os dados do BD
        também retorna com característica do PDO como o fetch
        é necessário especificar o modelo de conversão.
        EX: PDO::FETCH_ASSOC, PDO::FETCH_ARRAY etc. */
        $listBanners[] = new Banner();

        $listBanners = null;
        while($rsBanner=$select->fetch(PDO::FETCH_ASSOC)){
            $banner = new Banner();
            $banner->setIdBanner($rsBanner["idBanner"]);
            $banner->setTitulo($rsBanner["titulo"]);
            $banner->setImagem($rsBanner["imagem"]);
            $banner->setTexto($rsBanner["texto"]);
            $banner->setHref($rsBanner["href"]);
            $banner->setNomeBotao($rsBanner["nomeBotao"]);
            $banner->setAtivo($rsBanner["ativo"]);


            $listBanners[$cont] = $banner;

            $cont++;
        }

        $this->conex->closeDataBase();

        return($listBanners);

    }


    //Seleciona um registro pelo ID.
    public function selectById($id){
        $sql = SELECT.' Banner where idBanner = '.$id;

        //Abrindo conexão com o BD
        $PDO_conex = $this->conex->connectDataBase();

        

        $select = $PDO_conex->query($sql);


        if($rsBanner=$select->fetch(PDO::FETCH_ASSOC)){
            $banner = new Banner();
            $banner->setIdBanner($rsBanner["idBanner"]);
            $banner->setTitulo($rsBanner["titulo"]);
            $banner->setImagem($rsBanner["imagem"]);
            $banner->setTexto($rsBanner["texto"]);
            $banner->setHref($rsBanner["href"]);
            $banner->setNomeBotao($rsBanner["nomeBotao"]);
            $banner->setAtivo($rsBanner["ativo"]);
    
    
            $this->conex->closeDataBase();
            return($banner);
        }else{
            return(null);
        }
    
    }
}
?>
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

class controllerFoto_Veiculo{

    public function __construct(){
        //Import da classe nivel
        require_once(IMPORT_FOTO_VEICULO);

        //Import da classe nivelDAO, para inserir no BD
        require_once(IMPORT_FOTO_VEICULO_DAO);
    }

    public function inserirFoto_Veiculo(){
        //Instancia do DAO
        $foto_veiculoDAO = new Foto_VeiculoDAO();

        //Verifica qual metodo esta sendo requisitado do formulario(POST ou GET)
        if($_SERVER["REQUEST_METHOD"] == "POST"){

                $idVeiculo = $_SESSION['idVeiculo'];
                // $imagem = enviarImagem($_FILES ['foto'][0] = VALUE);
                $imagens = $_FILES['foto']['name'];

                
                // var_dump($imagens);

                $count = count($imagens);


                $fotos_veiculo [] = new Foto_Veiculo();

                for($i=0; $i<$count; $i++):

                    $imagem['name'] = $_FILES['foto']['name'][$i];
                    $imagem['tmp_name'] = $_FILES['foto']['tmp_name'][$i];
                    $imagem['size'] = $_FILES['foto']['size'][$i];
                    
                    //Instancia da classe
                    $foto_veiculo = new Foto_Veiculo();
                    $foto = enviarImagem($imagem);
                    
                    //Guardando os dados do post no objeto da classe
                    $foto_veiculo->setIdVeiculo($idVeiculo);
                    $foto_veiculo->setFotoVeiculo($foto);
                    
                    /* Chamada para o metodo de inserir no BD, passando como parâmetro o objeto
                    contatoClass que tem todos os dados que serão inseridos no banco de dados */
                    
                    $fotos_veiculo [$count] = $foto_veiculo;

                    $foto_veiculoDAO->insert($foto_veiculo);
                endfor;

                
                
        }
    }

    public function excluirNivel(){
        //Instancia do DAO
        $nivelDAO = new nivelDAO();
        //Esse id foi enviado pela view no href, o arquivo de rota é quem chamou este método
        $id = $_GET["id"];

        //Chamada para o método de excluir um nivel
        return $nivelDAO->delete($id);
    }

    public function atualizarNivel(){
        //Instancia do DAO
        $nivelDAO = new nivelDAO();

        //Verifica qual metodo esta sendo requisitado do formulario(POST ou GET)
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $id = $_GET["id"];
            $nome = $_POST["txtnome"];
            $descricao = $_POST["txtdescricao"];
            $permissoes = 0;

            //Instancia da classe
            $nivel = new Nivel();

            //Guardando os dados do post no objeto da classe
            $nivel->setIdNivel($id);
            $nivel->setNome($nome);
            $nivel->setDescricao($descricao);
            $nivel->setPermissoes($permissoes);

            /* Chamada para o metodo de inserir no BD, passando como parâmetro o objeto
            contatoClass que tem todos os dados que serão inseridos no banco de dados */
            return $nivelDAO->update($nivel);
        }
    }

    public function listarFotoFrontal($idVeiculo){
        //Instancia do DAO
        $foto_veiculoDAO = new foto_veiculoDAO();
        return($foto_veiculoDAO->selectFotoFrontalPorVeiculo($idVeiculo));
    }

    public function buscarNivel(){
        //Instancia do DAO
        $nivelDAO = new nivelDAO();

        //Pega o ID para realizar a busca
        $id = $_GET["id"];

        $nivel = new Nivel();
        $nivel = $nivelDAO->selectById($id);
        return $nivel;
    }
}
?>
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

class controllerVeiculo{

    public function __construct(){
        //Import da classe nivel
        require_once(IMPORT_VEICULO);

        //Import da classe nivelDAO, para inserir no BD
        require_once(IMPORT_VEICULO_DAO);
    }

    public function inserirVeiculo(){
        //Instancia do DAO
        $veiculoDAO = new veiculoDAO();

        //Verifica qual metodo esta sendo requisitado do formulario(POST ou GET)
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $cor = $_POST["txtCor"];
            $altura = $_POST["txtAltura"];
            $comprimento = $_POST["txtComprimento"];
            $largura = $_POST["txtLargura"];
            $altura = $_POST["txtAltura"];
            $valorHora = $_POST["txtValor"];
            $ano = $_POST["txtAno"];
            $quilometragem = $_POST["txtQuilometragem"];
            $endereco = $_POST["sltEndereco"];
            $categoria = $_POST["sltCategoria"];
            $modelo = $_POST["sltModelo"];
            $cliente = $_SESSION['idCliente']['idCliente'];

            //Instancia da classe
            $veiculo = new Veiculo();

            //Guardando os dados do post no objeto da classe
            $veiculo->setCor($cor);
            $veiculo->setAltura($altura);
            $veiculo->setComprimento($comprimento);
            $veiculo->setLargura($largura);
            $veiculo->setValorHora($valorHora);
            $veiculo->setAno($ano);
            $veiculo->setQuilometragem($quilometragem);
            $veiculo->setIdEndereco($endereco);
            $veiculo->setIdCategoriaVeiculo($categoria);
            $veiculo->setIdModelo($modelo);
            $veiculo->setIdCliente($cliente);

            /* Chamada para o metodo de inserir no BD, passando como parâmetro o objeto
            contatoClass que tem todos os dados que serão inseridos no banco de dados */
            return $veiculoDAO->insert($veiculo);
        }
    }

    public function excluirVeiculo(){
        //Instancia do DAO
        $veiculoDAO = new veiculoDAO();
        //Esse id foi enviado pela view no href, o arquivo de rota é quem chamou este método
        $id = $_GET["id"];

        //Chamada para o método de excluir um nivel
        return $veiculoDAO->delete($id);
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

    public function listarVeiculos(){
        //Instancia do DAO
        $veiculoDAO = new veiculoDAO();
        return($veiculoDAO->selectAll());
    }

    public function listarVeiculosCliente(){
        //Instancia do DAO

        $cliente = $_SESSION['idCliente']['idCliente'];

        $veiculo = new Veiculo();

        
        $veiculoDAO = new veiculoDAO();

        return($veiculoDAO->selectAllCliente($cliente));
    }

    public function buscarVeiculo(){
        //Instancia do DAO
        $veiculoDAO = new veiculoDAO();

        //Pega o ID para realizar a busca
        $id = $_GET["id"];

        $veiculo = new Veiculo();
        $veiculo = $veiculoDAO->selectById($id);
        return $veiculo;
    }

    public function filtrarVeiculos(){
        $marca = $_GET['cbMarca'];
        $modelo = $_GET['cbModelo'];
        $KM = $_GET['cbKM'];
        $avaliacao = $_GET['cbAvaliacao'];

        $veiculoDAO = new veiculoDAO();
        return($veiculoDAO->filtrarVeiculos($marca, $modelo, $KM, $avaliacao));
    }
}
?>
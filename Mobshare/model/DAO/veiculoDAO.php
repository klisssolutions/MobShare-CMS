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

class veiculoDAO{

    private $conex;

    public function __construct(){
        //Import da classe do banco para todos os métodos
        require_once(IMPORT_CONEXAO);

        //Instancia da classe conexão
        $this->conex = new conexaoMySQL();
    }

    //Inserir um registro no banco de dados.
    public function insert(Veiculo $veiculo){
        $sql = INSERT . TABELA_VEICULO . " 
        (nome, descricao, permissoes)
        VALUES (
        '".$nivel->getNome()."',
        '".$nivel->getDescricao()."',
        '".$nivel->getPermissoes()."')";

        //Abrindo conexão com o BD
        $PDO_conex = $this->conex->connectDataBase();

        //Executa no BD o script Insert e retorna verdadeiro/falso
        if($PDO_conex->query($sql)){
            //echo(SUCESSO_SCRIPT);
            echo("<script>alert('Nível inserido com sucesso.');</script>");
        }else{
            //echo(ERRO_SCRIPT);
            //echo($sql);
        }

        //Fecha a conexão com o BD
        $this->conex->closeDataBase();
    }

    //Deletar um registro no banco de dados.
    public function delete($id){
        $sql = DELETE . TABELA_NIVEL . " where idNivel =".$id;

        //Abrindo conexão com o BD
        $PDO_conex = $this->conex->connectDataBase();

        //Executa no BD o script Insert e retorna verdadeiro/falso
        if($PDO_conex->query($sql)){
            echo("<script>alert('Nível deletado com sucesso.');</script>");
            //echo(SUCESSO_SCRIPT);
        }else{
            //echo(ERRO_SCRIPT);
            //echo($sql);
            echo("<script>alert('Não é possiível deletar, tem funcionário associado ao nível.');</script>");
        }

        //Fecha a conexão com o BD
        $this->conex->closeDataBase();
    }

    //Atualiza um registro no banco de dados.
    public function update(Nivel $nivel){
        $sql = UPDATE . TABELA_NIVEL . " 
        SET nome = '".$nivel->getNome()."',
            descricao = '".$nivel->getDescricao()."',
            permissoes = '".$nivel->getPermissoes()."'
        WHERE idNivel = '".$nivel->getIdNivel()."';";

        //Abrindo conexão com o BD
        $PDO_conex = $this->conex->connectDataBase();

        //Executa no BD o script Insert e retorna verdadeiro/falso
        if($PDO_conex->query($sql)){
            //echo(SUCESSO_SCRIPT);
            //echo($sql);
            echo("<script>alert('Nível atualizado com sucesso.');</script>");
        }else{
            //echo(ERRO_SCRIPT);
            //echo($sql);
        }

        //Fecha a conexão com o BD
        $this->conex->closeDataBase();
    }

    //Lista todos os registros do banco de dados.
    public function selectAll(){
        $sql = SELECT.TABELA_VEICULO;

        //Abrindo conexão com o BD
        $PDO_conex = $this->conex->connectDataBase();

        //executa o script de select no bd
        $select = $PDO_conex->query($sql);
        $cont = 0;
        
        /* $select->fetch no formado pdo retorna os dados do BD
        também retorna com característica do PDO como o fetch
        é necessário especificar o modelo de conversão.
        EX: PDO::FETCH_ASSOC, PDO::FETCH_ARRAY etc. */
        while($rsVeiculos=$select->fetch(PDO::FETCH_ASSOC)){
            $listVeiculos[] = new Veiculo();
            $listVeiculos[$cont]->setIdVeiculo($rsVeiculos["idVeiculo"]);
            $listVeiculos[$cont]->setIdCategoriaVeiculo($rsVeiculos["idCategoria_Veiculo"]);
            $listVeiculos[$cont]->setIdCliente($rsVeiculos["idCliente"]);
            $listVeiculos[$cont]->setIdModelo($rsVeiculos["idModelo"]);
            $listVeiculos[$cont]->setCor($rsVeiculos["cor"]);
            $listVeiculos[$cont]->setAltura($rsVeiculos["altura"]);
            $listVeiculos[$cont]->setComprimento($rsVeiculos["comprimento"]);
            $listVeiculos[$cont]->setLargura($rsVeiculos["largura"]);
            $listVeiculos[$cont]->setValorHora($rsVeiculos["valorHora"]);
            $listVeiculos[$cont]->setAno($rsVeiculos["ano"]);
            $listVeiculos[$cont]->setQuilometragem($rsVeiculos["quilometragem"]);
            $listVeiculos[$cont]->setValorVenda($rsVeiculos["valorVenda"]);
            $listVeiculos[$cont]->setIdEndereco($rsVeiculos["idEndereco"]);
            

            
            $cont++;
        }

        $this->conex->closeDataBase();

        return($listVeiculos);

    }


    //Seleciona um registro pelo ID.
    public function selectById($id){
        $sql = SELECT . TABELA_VEICULO . " WHERE idVeiculo=".$id;

        //Abrindo conexão com o BD
        $PDO_conex = $this->conex->connectDataBase();

        //executa o script de select no bd
        $select = $PDO_conex->query($sql);

        /* $select->fetch no formado pdo retorna os dados do BD
        também retorna com característica do PDO como o fetch
        é necessário especificar o modelo de conversão.
        EX: PDO::FETCH_ASSOC, PDO::FETCH_ARRAY etc. */
        if($rsVeiculo = $select->fetch(PDO::FETCH_ASSOC)){
            $veiculo = new Veiculo();
            $veiculo->setIdVeiculo($rsVeiculo["idVeiculo"]);
            $veiculo->setIdEndereco($rsVeiculo["idEndereco"]);
        }

        $this->conex->closeDataBase();

        return($veiculo);
    }



    public function filtrarVeiculos($marca, $modelo, $KM, $avaliacao){
        

        $sql = SELECT.TABELA_VEICULO;

        if($modelo != "0"){
            $sql = $sql . " where idModelo =" . $modelo  ;    
        }else{
            $sql = $sql . " where idModelo <>" . $modelo ;
        }

        if($marca != "0"){
            $sql = $sql . " and idModelo in(select idModelo from modelo where idMarca = ".$marca.")"  ;    
        }

        if($KM != "padrao"){
            if($KM = "500000"){
                $sql = $sql . " and quilometragem > ".$KM  ;
            }else if($KM = "0"){
                $sql = $sql . " and quilometragem = ".$KM  ;

                
            }else{
                $sql = $sql . " and quilometragem < ".$KM  ;
            }

            echo($KM);
                
        }

        
        //Abrindo conexão com o BD
        $PDO_conex = $this->conex->connectDataBase();

        //executa o script de select no bd
        $select = $PDO_conex->query($sql);
        $cont = 0;
        
        /* $select->fetch no formado pdo retorna os dados do BD
        também retorna com característica do PDO como o fetch
        é necessário especificar o modelo de conversão.
        EX: PDO::FETCH_ASSOC, PDO::FETCH_ARRAY etc. */
    
        $listVeiculos[] = new Veiculo();
        $listVeiculos = null;
        while($rsVeiculos=$select->fetch(PDO::FETCH_ASSOC)){
            $veiculo = new Veiculo();
            $veiculo->setIdVeiculo($rsVeiculos["idVeiculo"]);
            $veiculo->setIdCategoriaVeiculo($rsVeiculos["idCategoria_Veiculo"]);
            $veiculo->setIdCliente($rsVeiculos["idCliente"]);
            $veiculo->setIdModelo($rsVeiculos["idModelo"]);
            $veiculo->setCor($rsVeiculos["cor"]);
            $veiculo->setAltura($rsVeiculos["altura"]);
            $veiculo->setComprimento($rsVeiculos["comprimento"]);
            $veiculo->setLargura($rsVeiculos["largura"]);
            $veiculo->setValorHora($rsVeiculos["valorHora"]);
            $veiculo->setAno($rsVeiculos["ano"]);
            $veiculo->setQuilometragem($rsVeiculos["quilometragem"]);
            $veiculo->setValorVenda($rsVeiculos["valorVenda"]);
            $veiculo->setIdEndereco($rsVeiculos["idEndereco"]);
            

            $listVeiculos[$cont] = $veiculo;
            
            $cont++;
        }

        $this->conex->closeDataBase();

        return($listVeiculos);

    }
}
?>
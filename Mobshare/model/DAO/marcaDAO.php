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

class marcaDAO{

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



//seleciona as marcas dos veiculos
    public function selectAll(){
        $sql = 'select * from marca';

        //Abrindo conexão com o BD
        $PDO_conex = $this->conex->connectDataBase();

        //executa o script de select no bd
        $select = $PDO_conex->query($sql);
        $cont = 0;
        
        /* $select->fetch no formado pdo retorna os dados do BD
        também retorna com característica do PDO como o fetch
        é necessário especificar o modelo de conversão.
        EX: PDO::FETCH_ASSOC, PDO::FETCH_ARRAY etc. */
        while($rsMarcas=$select->fetch(PDO::FETCH_ASSOC)){
            $listMarcas[] = new Marca();
            $listMarcas[$cont]->setIdMarca($rsMarcas["idMarca"]);
            $listMarcas[$cont]->setNomeMarca($rsMarcas["nomeMarca"]);
            
 
            

            
            $cont++;
        }

        $this->conex->closeDataBase();

        return($listMarcas);

    }

    //Seleciona um registro pelo ID.
    public function selectById($id){
        $sql = SELECT.' Marca where idMarca = '.$id;

        //Abrindo conexão com o BD
        $PDO_conex = $this->conex->connectDataBase();

        //executa o script de select no bd
        $select = $PDO_conex->query($sql);
        
        /* $select->fetch no formado pdo retorna os dados do BD
        também retorna com característica do PDO como o fetch
        é necessário especificar o modelo de conversão.
        EX: PDO::FETCH_ASSOC, PDO::FETCH_ARRAY etc. */
        $rsMarca=$select->fetch(PDO::FETCH_ASSOC);
        $marca = new Marca();
        $marca->setIdMarca($rsMarca["idMarca"]);
        $marca->setNomeMarca($rsMarca["nomeMarca"]);

       

        $this->conex->closeDataBase();

        return($marca);
    }
}
?>
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

class modeloDAO{

    private $conex;

    public function __construct(){
        //Import da classe do banco para todos os métodos
        require_once(IMPORT_CONEXAO);

        //Instancia da classe conexão
        $this->conex = new conexaoMySQL();
    }

//Inserir um registro no banco de dados.
public function insert(Modelo $modelo){
    $sql = INSERT . TABELA_MODELO . " 
    (idMarca, nomeModelo)
    VALUES (
        '".$modelo->getIdMarca()."',
        '".$modelo->getNomeModelo()."')";

    //Abrindo conexão com o BD
    $PDO_conex = $this->conex->connectDataBase();

    //Executa no BD o script Insert e retorna verdadeiro/falso
    if($PDO_conex->query($sql)){
        $erro = false;
    }else{
        $erro = true;
    }
    //Fecha a conexão com o BD
    $this->conex->closeDataBase();
    return $erro;
}

//Deletar um registro no banco de dados.
public function delete($id){
    $sql = DELETE . TABELA_MODELO . " WHERE idModelo = ".$id;

    
    //Abrindo conexão com o BD
    $PDO_conex = $this->conex->connectDataBase();

    //Executa no BD o script Insert e retorna verdadeiro/falso
    if($PDO_conex->query($sql)){
        $erro = false;
    }else{
        $erro = true;
    }
    //Fecha a conexão com o BD
    $this->conex->closeDataBase();
    return $erro;
}

//Atualiza um registro no banco de dados.
public function update(Modelo $modelo){
    $sql = UPDATE . TABELA_MODELO . "
    SET idMarca = '".$modelo->getIdMarca()."', 
    nomeModelo = '".$modelo->getNomeModelo()."'
    WHERE idModelo = '".$modelo->getIdModelo()."';";
    
    //Abrindo conexão com o BD
    $PDO_conex = $this->conex->connectDataBase();
    
    //Executa no BD o script Insert e retorna verdadeiro/falso
    if($PDO_conex->query($sql)){
        $erro = false;
    }else{
        $erro = true;
    }
    //Fecha a conexão com o BD
    $this->conex->closeDataBase();
    return $erro;
}

    //Lista todos os registros do banco de dados.
    public function selectAll(){
        $sql = SELECT. TABELA_MODELO;

        //Abrindo conexão com o BD
        $PDO_conex = $this->conex->connectDataBase();

        //executa o script de select no bd
        $select = $PDO_conex->query($sql);
        $cont = 0;
        
        /* $select->fetch no formado pdo retorna os dados do BD
        também retorna com característica do PDO como o fetch
        é necessário especificar o modelo de conversão.
        EX: PDO::FETCH_ASSOC, PDO::FETCH_ARRAY etc. */
        while($rsModelos=$select->fetch(PDO::FETCH_ASSOC)){
            $listModelos[] = new Modelo();
            $listModelos[$cont]->setIdModelo($rsModelos["idModelo"]);
            $listModelos[$cont]->setIdMarca($rsModelos["idMarca"]);
            $listModelos[$cont]->setNomeModelo($rsModelos["nomeModelo"]);

            $cont++;
        }

        $this->conex->closeDataBase();

        return($listModelos);

    }


    //Seleciona um registro pelo ID.
    public function selectById($id){
        $sql = SELECT. TABELA_MODELO. " where idModelo=".$id;

        

        //Abrindo conexão com o BD
        $PDO_conex = $this->conex->connectDataBase();

        //executa o script de select no bd
        $select = $PDO_conex->query($sql);
        
        /* $select->fetch no formado pdo retorna os dados do BD
        também retorna com característica do PDO como o fetch
        é necessário especificar o modelo de conversão.
        EX: PDO::FETCH_ASSOC, PDO::FETCH_ARRAY etc. */
        $rsModelo=$select->fetch(PDO::FETCH_ASSOC);
        $modelo = new Modelo();
        $modelo->setIdModelo($rsModelo["idModelo"]);
        $modelo->setIdMarca($rsModelo["idMarca"]);
        $modelo->setNomeModelo($rsModelo["nomeModelo"]);

       

        $this->conex->closeDataBase();

        return($modelo);
    }
}
?>
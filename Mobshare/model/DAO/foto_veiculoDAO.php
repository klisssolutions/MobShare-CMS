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

class foto_veiculoDAO{

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
        $sql = DELETE . TABELA_NIVEL . " where idNivel =".$id;

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
            $erro = false;
        }else{
            $erro = true;
        }
        //Fecha a conexão com o BD
        $this->conex->closeDataBase();
        return $erro;
    }

    //Lista todos os registros do banco de dados.
    public function selectFotoFrontal(){
        $sql = SELECT.TABELA_FOTO_VEICULO." where perfil = 'frontal' order by idVeiculo";

        //Abrindo conexão com o BD
        $PDO_conex = $this->conex->connectDataBase();

        //executa o script de select no bd
        $select = $PDO_conex->query($sql);
        $cont = 0;
        
        /* $select->fetch no formado pdo retorna os dados do BD
        também retorna com característica do PDO como o fetch
        é necessário especificar o modelo de conversão.
        EX: PDO::FETCH_ASSOC, PDO::FETCH_ARRAY etc. */
        while($rsFoto_Veiculo=$select->fetch(PDO::FETCH_ASSOC)){
            
            $listFoto_Veiculo[] = new Foto_Veiculo();
            $listFoto_Veiculo[$cont]->setIdFoto_Veiculo($rsFoto_Veiculo["idFoto_Veiculo"]);
            $listFoto_Veiculo[$cont]->setIdVeiculo($rsFoto_Veiculo["idVeiculo"]);
            $listFoto_Veiculo[$cont]->setFotoVeiculo($rsFoto_Veiculo["fotoVeiculo"]);
            $listFoto_Veiculo[$cont]->setPerfil($rsFoto_Veiculo["perfil"]);
            
            $cont++;
        }

        $this->conex->closeDataBase();

        return($listFoto_Veiculo);
    }

    public function selectFotoFrontalPorVeiculo($idVeiculo){
        $sql = SELECT.TABELA_FOTO_VEICULO." where perfil = 'frontal' and idVeiculo = ".$idVeiculo;

        //Abrindo conexão com o BD
        $PDO_conex = $this->conex->connectDataBase();

        //executa o script de select no bd
        $select = $PDO_conex->query($sql);
        $cont = 0;
        
        /* $select->fetch no formado pdo retorna os dados do BD
        também retorna com característica do PDO como o fetch
        é necessário especificar o modelo de conversão.
        EX: PDO::FETCH_ASSOC, PDO::FETCH_ARRAY etc. */

        $rsFoto_Veiculo=$select->fetch(PDO::FETCH_ASSOC);    

        $foto_Veiculo = new Foto_Veiculo();
        $foto_Veiculo->setIdFoto_Veiculo($rsFoto_Veiculo["idFoto_Veiculo"]);
        $foto_Veiculo->setIdVeiculo($rsFoto_Veiculo["idVeiculo"]);
        $foto_Veiculo->setFotoVeiculo($rsFoto_Veiculo["fotoVeiculo"]);
        $foto_Veiculo->setPerfil($rsFoto_Veiculo["perfil"]);

        $this->conex->closeDataBase();

        return($foto_Veiculo);
    }    

    //Seleciona um registro pelo ID.
    public function selectById($id){
        $sql = SELECT . TABELA_NIVEL . " WHERE idNivel=".$id;

        //Abrindo conexão com o BD
        $PDO_conex = $this->conex->connectDataBase();

        //executa o script de select no bd
        $select = $PDO_conex->query($sql);

        /* $select->fetch no formado pdo retorna os dados do BD
        também retorna com característica do PDO como o fetch
        é necessário especificar o modelo de conversão.
        EX: PDO::FETCH_ASSOC, PDO::FETCH_ARRAY etc. */
        if($rsNivel=$select->fetch(PDO::FETCH_ASSOC)){
            $nivel = new Nivel();
            $nivel->setIdNivel($rsNivel["idNivel"]);
            $nivel->setNome($rsNivel["nome"]);
            $nivel->setDescricao($rsNivel["descricao"]);
            $nivel->setPermissoes($rsNivel["permissoes"]);
        }

        $this->conex->closeDataBase();

        return($nivel);
    }
}
?>
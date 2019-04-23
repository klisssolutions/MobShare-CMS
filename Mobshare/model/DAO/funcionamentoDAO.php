<?php 
/*
    Projeto: Mobshare
    Autor: Kaio
    Data Criação: 01/04/2019
    Data Modificação:
    Conteudo Modificação:
    Autor da Modificação:
    Objetivo da classe: CRUD da classe de Funcionamento
*/

    @session_start();
    require_once($_SESSION["importInclude"]); 

    class funcionamentoDAO{
        private $conex;

        public function __construct(){
            require_once(IMPORT_CONEXAO);

            $this->conex = new conexaoMySQL();
        }
        //inserir um registro no banco de dados
        public function insert(Funcionamento $funcionamento){
            $sql = INSERT . TABELA_FUNCIONAMENTO . "
            (titulo, descricao, foto, ativo)
            VALUES (
                '".$funcionamento->getTitulo()."',
                '".$funcionamento->getDescricao()."',
                '".$funcionamento->getFoto()."',
                '".$funcionamento->getAtivo()."');
            ";

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
            
            //apagar um registro no banco
            public function delete($id){
                $sql = DELETE . TABELA_FUNCIONAMENTO . " where idFuncionamento =".$id;

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

        //atualizar um registro no banco de dados

        public function update(Funcionamento $funcionamento){

            if($funcionamento->getFoto()){
                $sql = UPDATE . TABELA_FUNCIONAMENTO . "
                SET titulo = '".$funcionamento->getTitulo()."',
                foto = '".$funcionamento->getFoto()."',
                descricao = '".$funcionamento->getDescricao()."',
                ativo = '".$funcionamento->getAtivo()."'
                WHERE idFuncionamento = '".$funcionamento->getIdFuncionamento()."';";
            }else{
                $sql = UPDATE . TABELA_FUNCIONAMENTO . "
                SET titulo = '".$funcionamento->getTitulo()."',
                descricao = '".$funcionamento->getDescricao()."',
                ativo = '".$funcionamento->getAtivo()."'
                
                WHERE idFuncionamento = '".$funcionamento->getIdFuncionamento()."';";
            }
            
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

        //listar os registros do banco de dados

        public function selectAll(){
            $sql = SELECT.TABELA_FUNCIONAMENTO;
        
            $PDO_conex = $this->conex->connectDataBase();

            $select = $PDO_conex->query($sql);
            $cont = 0;
        
        /* $select->fetch no formado pdo retorna os dados do BD
        também retorna com característica do PDO como o fetch
        é necessário especificar o modelo de conversão.
        EX: PDO::FETCH_ASSOC, PDO::FETCH_ARRAY etc. */
        while($rsFuncionamento=$select->fetch(PDO::FETCH_ASSOC)){
            $listFuncionamento[] = new Funcionamento();
            $listFuncionamento[$cont]->setIdFuncionamento($rsFuncionamento["idFuncionamento"]);
            $listFuncionamento[$cont]->setTitulo($rsFuncionamento["titulo"]);
            $listFuncionamento[$cont]->setDescricao($rsFuncionamento["descricao"]);
            $listFuncionamento[$cont]->setFoto($rsFuncionamento["foto"]);
            $listFuncionamento[$cont]->setAtivo($rsFuncionamento["ativo"]);
            
            $cont++;
        }

        $this->conex->closeDataBase();

        return($listFuncionamento);

        }

        //seleciona o registro pelo ID

        public function selectById($id){
            
            $sql = SELECT . TABELA_FUNCIONAMENTO . " WHERE idFuncionamento=".$id;

        //Abrindo conexão com o BD
        $PDO_conex = $this->conex->connectDataBase();

        //executa o script de select no bd
        $select = $PDO_conex->query($sql);

        /* $select->fetch no formado pdo retorna os dados do BD
        também retorna com característica do PDO como o fetch
        é necessário especificar o modelo de conversão.
        EX: PDO::FETCH_ASSOC, PDO::FETCH_ARRAY etc. */
        if($rsFuncionamento=$select->fetch(PDO::FETCH_ASSOC)){
            $funcionamento = new Funcionamento();
            $funcionamento->setIdFuncionamento($rsFuncionamento["idFuncionamento"]);
            $funcionamento->setTitulo($rsFuncionamento["titulo"]);
            $funcionamento->setDescricao($rsFuncionamento["descricao"]);
            $funcionamento->setFoto($rsFuncionamento["foto"]);
            $funcionamento->setAtivo($rsFuncionamento["ativo"]);
        }

        $this->conex->closeDataBase();

        return($funcionamento);
        }

    }
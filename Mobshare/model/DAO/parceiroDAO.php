<?php 
/*
    Projeto: Mobshare
    Autor: Kaio
    Data Criação: 01/04/2019
    Data Modificação:
    Conteudo Modificação:
    Autor da Modificação:
    Objetivo da classe: CRUD da classe de Parceiro
*/

    @session_start();
    require_once($_SESSION["importInclude"]); 

    class parceiroDAO{
        private $conex;

        public function __construct(){
            require_once(IMPORT_CONEXAO);

            $this->conex = new conexaoMySQL();
        }
        //inserir um registro no banco de dados
        public function insert(Parceiro $parceiro){

            $sql = INSERT . TABELA_PARCEIRO . "
            (nome, email, descricaoParceiro, site, foto, ativo)
            VALUES (
                '".$parceiro->getNome()."',
                '".$parceiro->getEmail()."',
                '".$parceiro->getDescricao()."',
                '".$parceiro->getSite()."',
                '".$parceiro->getLogo()."',
                '".$parceiro->getAtivo()."');
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
            $sql = DELETE . TABELA_PARCEIRO . " where idParceiro =".$id;

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

        public function update(Parceiro $parceiro){

            if($parceiro->getLogo()){
                $sql = UPDATE . TABELA_PARCEIRO . "
                SET nome = '".$parceiro->getNome()."',
                email = '".$parceiro->getEmail()."',
                foto = '".$parceiro->getLogo()."',
                descricaoParceiro = '".$parceiro->getDescricao()."',
                site = '".$parceiro->getSite()."',
                ativo = '".$parceiro->getAtivo()."'
                WHERE idParceiro = '".$parceiro->getIdParceiro()."';";
            }else{
                $sql = UPDATE . TABELA_PARCEIRO . "
                SET nome = '".$parceiro->getNome()."',
                email = '".$parceiro->getEmail()."',
                descricaoParceiro = '".$parceiro->getDescricao()."',
                site = '".$parceiro->getSite()."',
                ativo = '".$parceiro->getAtivo()."'
                WHERE idParceiro = '".$parceiro->getIdParceiro()."';";
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
            $sql = SELECT.TABELA_PARCEIRO;

            $PDO_conex = $this->conex->connectDataBase();

            $select = $PDO_conex->query($sql);
        $cont = 0;
        
        /* $select->fetch no formado pdo retorna os dados do BD
        também retorna com característica do PDO como o fetch
        é necessário especificar o modelo de conversão.
        EX: PDO::FETCH_ASSOC, PDO::FETCH_ARRAY etc. */
        while($rsParceiros=$select->fetch(PDO::FETCH_ASSOC)){
            $listParceiros[] = new Parceiro();
            $listParceiros[$cont]->setIdParceiro($rsParceiros["idParceiro"]);
            $listParceiros[$cont]->setNome($rsParceiros["nome"]);
            $listParceiros[$cont]->setEmail($rsParceiros["email"]);
            $listParceiros[$cont]->setDescricao($rsParceiros["descricaoParceiro"]);
            $listParceiros[$cont]->setSite($rsParceiros["site"]);
            $listParceiros[$cont]->setLogo($rsParceiros["foto"]);
            $listParceiros[$cont]->setAtivo($rsParceiros["ativo"]);
            
            $cont++;
        }

        $this->conex->closeDataBase();

        return($listParceiros);

        }

        //seleciona o registro pelo ID

        public function selectById($id){
            $sql = SELECT . TABELA_PARCEIRO . " WHERE idParceiro=".$id;

        //Abrindo conexão com o BD
        $PDO_conex = $this->conex->connectDataBase();

        //executa o script de select no bd
        $select = $PDO_conex->query($sql);

        /* $select->fetch no formado pdo retorna os dados do BD
        também retorna com característica do PDO como o fetch
        é necessário especificar o modelo de conversão.
        EX: PDO::FETCH_ASSOC, PDO::FETCH_ARRAY etc. */
        if($rsParceiro=$select->fetch(PDO::FETCH_ASSOC)){
            $parceiro = new Parceiro();
            $parceiro->setidParceiro($rsParceiro["idParceiro"]);
            $parceiro->setNome($rsParceiro["nome"]);
            $parceiro->setEmail($rsParceiro["email"]);
            $parceiro->setSite($rsParceiro["site"]);
            $parceiro->setDescricao($rsParceiro["descricaoParceiro"]);
            $parceiro->setLogo($rsParceiro["foto"]);
            $parceiro->setAtivo($rsParceiro["ativo"]);
        }

        $this->conex->closeDataBase();

        return($parceiro);
        }

    }

?>
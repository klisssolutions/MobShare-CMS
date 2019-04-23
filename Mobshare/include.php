<?php
/*
    Projeto: MobShare
    Autor: Igor
    Data Criação: 23/03/2019
    Data Modificação: 20/04/2019
    Conteudo Modificação: Constantes de alert
    Autor da Modificação: Igor
    Objetivo: Arquivo com constantes para usar em outras classes
*/

//Verificaa se o arquivo já foi importado
if(!isset($incluso)){
    
    //Set uma variável para verificar se o arquivo foi importado
    $incluso = true;

    /*---------------------------------------------------------------*/
    /*--------------------------- FUNÇÕES ---------------------------*/
    /*---------------------------------------------------------------*/

    //Essa função recebe o número de permissão e o número do módulo para
    //verificar se tem acesso ao módulo
    function acessoModulo($permissoes, $modulo){
        //Retira as permissões dos módulos anteriores para comparar
        $permissoesModulo = $permissoes % ($modulo*2);
        //Verificar se a permissão é maior ou igual ao módulo se for
        //ele tem acesso ao módulo(bit ligado)
        if($permissoesModulo >= $modulo){
            return true;
        }else{
            return false;
        }
    }

    //Função para tratar a imagem recebida do upload
    function enviarImagem($item){
        
        $foto = $item['name'];
        $tamanho_foto = $item['size'];
        $tamanho_foto = round($tamanho_foto/1024);
        $ext_foto = strrchr($foto, ".");
        $nome_foto = pathinfo($foto, PATHINFO_FILENAME);
        $nome_foto = md5(uniqid(time()).$nome_foto);
        $diretorio = "C:/xampp/htdocs/Mobshare/arquivos/";
        $extensao = array(".jpg",".png",".jpeg");
        if(in_array($ext_foto, $extensao)){
            if($tamanho_foto<=2000){
                $foto_tmp = $item['tmp_name'];
                $arquivo = $nome_foto.$ext_foto;
                
                if(move_uploaded_file($foto_tmp, $diretorio.$arquivo)){
                    return $arquivo;
                }else{
                    $arquivo = null;
                    return $arquivo;
                }
                return $arquivo;
            }
        }
        return $arquivo;
    }

    //Função para gerar um alert no JS
    function alert($texto){
        return "<script>alert('".$texto."');</script>";
    }

    /*----------------------------------------------------------------------*/
    /*--------------------------- BANCO DE DADOS ---------------------------*/
    /*----------------------------------------------------------------------*/

    //Constantes de Banco de dados
    define("SELECT","SELECT * FROM ");
    define("INSERT","INSERT INTO ");
    define("UPDATE","UPDATE ");
    define("DELETE","DELETE FROM ");

    define("ERRO_SCRIPT","Erro de script.<br>");
    define("SUCESSO_SCRIPT","Script executado com sucesso.<br>");

    //Constantes com o nome das tabelas
    define("TABELA_FUNCIONARIO", "usuario_web");
    define("TABELA_NIVEL", "nivel");
    define("TABELA_PARCEIRO", "parceiro");
    define("TABELA_FUNCIONAMENTO", "funcionamento");
    define("TABELA_CLIENTE", "Cliente");
    define("TABELA_VEICULO", "Veiculo");
    define("TABELA_FOTO_VEICULO", "Foto_Veiculo");
    define("TABELA_TERMOS", "termo");  
    define("TABELA_AVALIACAO_VEICULO", "avaliacao_veiculo");
    define("TABELA_AVALIACAO", "avaliacao");
    define("TABELA_MARCA", "marca");
    define("TABELA_MODELO","modelo");

    //Constantes com o nome das views
    define("VIEW_VEICULO", "VPendencia_Veiculo");
    define("VIEW_USUARIO", "VPendencia_Cliente");
    define("VIEW_AVALIACAO_VEICULO", "VAvaliacao_Veiculo");

    /*---------------------------------------------------------------*/
    /*--------------------------- NÚMEROS ---------------------------*/
    /*---------------------------------------------------------------*/

    //Permissao de modulos cada módulo. Cada módulo terá 1 bit, se estiver ligado
    //significa que ele terá acesso ao módulo
    define("MODULO_FUNCIONARIO",0b1000000);
    define("MODULO_MARKETING",  0b0100000);
    define("MODULO_LOCACAO",    0b0010000);
    define("MODULO_PAGINA",     0b0001000);
    define("MODULO_APROVACAO",  0b0000100);
    define("MODULO_CONTATO",    0b0000010);
    define("MODULO_RELATORIO",  0b0000001);

    //Constantes de pendencia
    define("PENDENCIA_ABERTA",  0b1);
    define("PENDENCIA_FECHADA", 0b0);

    /*---------------------------------------------------------------*/
    /*--------------------------- CLASSES ---------------------------*/
    /*---------------------------------------------------------------*/

    //Constantes com endereço da pasta para importar
    define("PASTA_RAIZ" , $_SERVER["DOCUMENT_ROOT"]);
    define("PASTA_PROJETO", "/Mobshare");

    //Import de conexão com o banco
    define("IMPORT_CONEXAO", PASTA_RAIZ . PASTA_PROJETO . "/model/DAO/conexaoMySQL.php");

    //Imports de nível
    define("IMPORT_NIVEL", PASTA_RAIZ . PASTA_PROJETO . "/model/nivelClass.php");
    define("IMPORT_NIVEL_DAO", PASTA_RAIZ . PASTA_PROJETO . "/model/DAO/nivelDAO.php");
    define("IMPORT_NIVEL_CONTROLLER", PASTA_RAIZ . PASTA_PROJETO . "/controller/controllerNivel.php");

    //Imports de funcionario
    define("IMPORT_FUNCIONARIO", PASTA_RAIZ . PASTA_PROJETO . "/model/funcionarioClass.php");
    define("IMPORT_FUNCIONARIO_DAO", PASTA_RAIZ . PASTA_PROJETO . "/model/DAO/funcionarioDAO.php");
    define("IMPORT_FUNCIONARIO_CONTROLLER", PASTA_RAIZ . PASTA_PROJETO . "/controller/controllerfuncionario.php");

    //Imports de pendencia
    define("IMPORT_PENDENCIA", PASTA_RAIZ . PASTA_PROJETO . "/model/pendenciaClass.php");
    define("IMPORT_PENDENCIA_DAO", PASTA_RAIZ . PASTA_PROJETO . "/model/DAO/pendenciaDAO.php");
    define("IMPORT_PENDENCIA_CONTROLLER", PASTA_RAIZ . PASTA_PROJETO . "/controller/controllerPendencia.php");

    //Imports de Parceiros
    define("IMPORT_PARCEIRO", PASTA_RAIZ . PASTA_PROJETO . "/model/parceiroClass.php");
    define("IMPORT_PARCEIRO_DAO", PASTA_RAIZ . PASTA_PROJETO . "/model/DAO/parceiroDAO.php");
    define("IMPORT_PARCEIRO_CONTROLLER", PASTA_RAIZ . PASTA_PROJETO . "/controller/controllerParceiro.php");

    //Imports de Funcionamento
    define("IMPORT_FUNCIONAMENTO", PASTA_RAIZ . PASTA_PROJETO . "/model/funcionamentoClass.php");
    define("IMPORT_FUNCIONAMENTO_DAO", PASTA_RAIZ . PASTA_PROJETO . "/model/DAO/funcionamentoDAO.php");
    define("IMPORT_FUNCIONAMENTO_CONTROLLER", PASTA_RAIZ . PASTA_PROJETO . "/controller/controllerFuncionamento.php");

    //Imports de clientes
    define("IMPORT_CLIENTE", PASTA_RAIZ . PASTA_PROJETO . "/model/clienteClass.php");
    define("IMPORT_CLIENTE_DAO", PASTA_RAIZ . PASTA_PROJETO . "/model/DAO/clienteDAO.php");
    define("IMPORT_CLIENTE_CONTROLLER", PASTA_RAIZ . PASTA_PROJETO . "/controller/controllercliente.php");

    //Imports de veiculo
    define("IMPORT_VEICULO", PASTA_RAIZ . PASTA_PROJETO . "/model/veiculoClass.php");
    define("IMPORT_VEICULO_DAO", PASTA_RAIZ . PASTA_PROJETO . "/model/DAO/veiculoDAO.php");
    define("IMPORT_VEICULO_CONTROLLER", PASTA_RAIZ . PASTA_PROJETO . "/controller/controllerVeiculo.php");    

    //Imports de foto veiculo
    define("IMPORT_FOTO_VEICULO", PASTA_RAIZ . PASTA_PROJETO . "/model/foto_veiculoClass.php");
    define("IMPORT_FOTO_VEICULO_DAO", PASTA_RAIZ . PASTA_PROJETO . "/model/DAO/foto_veiculoDAO.php");
    define("IMPORT_FOTO_VEICULO_CONTROLLER", PASTA_RAIZ . PASTA_PROJETO . "/controller/controllerFoto_Veiculo.php"); 
    
    //Imports de banner
    define("IMPORT_BANNER", PASTA_RAIZ . PASTA_PROJETO . "/model/bannerClass.php");
    define("IMPORT_BANNER_DAO", PASTA_RAIZ . PASTA_PROJETO . "/model/DAO/bannerDAO.php");
    define("IMPORT_BANNER_CONTROLLER", PASTA_RAIZ . PASTA_PROJETO . "/controller/controllerBanner.php");     

    //Imports de marca
    define("IMPORT_MARCA", PASTA_RAIZ . PASTA_PROJETO . "/model/marcaClass.php");
    define("IMPORT_MARCA_DAO", PASTA_RAIZ . PASTA_PROJETO . "/model/DAO/marcaDAO.php");
    define("IMPORT_MARCA_CONTROLLER", PASTA_RAIZ . PASTA_PROJETO . "/controller/controllerMarca.php"); 
    
    //Imports de modelo de veiculo
    define("IMPORT_MODELO", PASTA_RAIZ . PASTA_PROJETO . "/model/modeloClass.php");
    define("IMPORT_MODELO_DAO", PASTA_RAIZ . PASTA_PROJETO . "/model/DAO/modeloDAO.php");
    define("IMPORT_MODELO_CONTROLLER", PASTA_RAIZ . PASTA_PROJETO . "/controller/controllerModelo.php");     

    //Imports de termos
    define("IMPORT_TERMOS", PASTA_RAIZ . PASTA_PROJETO . "/model/termosClass.php");
    define("IMPORT_TERMOS_DAO", PASTA_RAIZ . PASTA_PROJETO . "/model/DAO/termosDAO.php");
    define("IMPORT_TERMOS_CONTROLLER", PASTA_RAIZ . PASTA_PROJETO . "/controller/controllerTermos.php");

    //Imports da avaliação do veiculo
    define("IMPORT_AVALIACAO_VEICULO", PASTA_RAIZ . PASTA_PROJETO . "/model/avaliacaoVeiculoClass.php");
    define("IMPORT_AVALIACAO_VEICULO_DAO", PASTA_RAIZ . PASTA_PROJETO . "/model/DAO/avaliacaoVeiculoDAO.php");
    define("IMPORT_AVALIACAO_VEICULO_CONTROLLER", PASTA_RAIZ . PASTA_PROJETO . "/controller/controllerAvaliacaoVeiculo.php"); 

    //imports da avaliacao
    define("IMPORT_AVALIACAO", PASTA_RAIZ . PASTA_PROJETO . "/model/avaliacaoClass.php");
    define("IMPORT_AVALIACAO_DAO", PASTA_RAIZ . PASTA_PROJETO . "/model/DAO/avaliacaoDAO.php");
    define("IMPORT_AVALIACAO_CONTROLLER", PASTA_RAIZ . PASTA_PROJETO . "/controller/controllerAvaliacao.php"); 
    
    /*---------------------------------------------------------------*/
    /*--------------------------- PÁGINAS ---------------------------*/
    /*---------------------------------------------------------------*/

    //Imports de páginas do cms
    define("IMPORT_CMS_HOME", PASTA_RAIZ . PASTA_PROJETO . "/CMS/view/home.php");
    define("IMPORT_CMS_LOGIN", PASTA_RAIZ . PASTA_PROJETO . "/CMS/view/login.php");
    define("IMPORT_CMS_INDEX", PASTA_RAIZ . PASTA_PROJETO . "/CMS/index.php");

    //Import páginas de nível
    define("IMPORT_CMS_CADASTRO_NIVEL", PASTA_RAIZ . PASTA_PROJETO . "/CMS/view/nivel/nivel.php");

    //Import páginas de funcionario
    define("IMPORT_CMS_CADASTRO_FUNCIONARIO", PASTA_RAIZ . PASTA_PROJETO . "/CMS/view/funcionario/funcionario.php");

    //Import páginas de parceiro
    define("IMPORT_CMS_CADASTRO_PARCEIRO", PASTA_RAIZ . PASTA_PROJETO . "/CMS/view/parceiro/parceiro.php");

    //Import páginas de funcionamento
    define("IMPORT_CMS_CADASTRO_FUNCIONAMENTO", PASTA_RAIZ . PASTA_PROJETO . "/CMS/view/comoFunciona/comoFunciona.php");

    //Import páginas de banner
    define("IMPORT_CADASTRO_BANNER", PASTA_RAIZ . PASTA_PROJETO . "/view/banner/banner.php");

    //Import da página de marcas
    define("IMPORT_CADASTRO_MARCAS", PASTA_RAIZ . PASTA_PROJETO . "/CMS/view/marcasemodelos/marcas.php");

    //Import da página de modelos
    define("IMPORT_CADASTRO_MODELOS", PASTA_RAIZ . PASTA_PROJETO . "/CMS/view/marcasemodelos/modelos.php");

    //Import das paginas de termo
    define("IMPORT_CADASTRO_TERMO", PASTA_RAIZ . PASTA_PROJETO . "/CMS/view/termos/termos.php");

    //Import páginas de pendencia
    define("IMPORT_CMS_CADASTRO_PENDENCIA_USUARIO", PASTA_RAIZ . PASTA_PROJETO . "/CMS/view/aprovacao/aprovacaoUsuario.php");
    define("IMPORT_CMS_CADASTRO_PENDENCIA_VEICULO", PASTA_RAIZ . PASTA_PROJETO . "/CMS/view/aprovacao/aprovacaoVeiculo.php");

    //Imports de páginas do site
    define("IMPORT_SITE_HOME", PASTA_RAIZ . PASTA_PROJETO . "/SITE/view/home.php");
    define("IMPORT_SITE_LOGIN", PASTA_RAIZ . PASTA_PROJETO . "/SITE/view/login.php");
    define("IMPORT_SITE_INDEX", PASTA_RAIZ . PASTA_PROJETO . "/SITE/index.php");

    /*---------------------------------------------------------------*/
    /*--------------------------- ERROS -----------------------------*/
    /*---------------------------------------------------------------*/
    
    //Erro de modo API
    define("MSG_MODO_ERRO", "Modo inválido.");

    //Mensagens de login
    define("MSG_LOGIN_ERRO", "Login ou senha inválidos.");

    //Mensagens de nível
    define("MSG_INSERIR_NIVEL_ERRO", "Não foi possível inserir o nível.");
    define("MSG_INSERIR_NIVEL_SUCESSO", "Nível inserido.");
    define("MSG_ATUALIZAR_NIVEL_ERRO", "Não foi possível atualizar o nível.");
    define("MSG_ATUALIZAR_NIVEL_SUCESSO", "Nível atualizado.");
    define("MSG_EXCLUIR_NIVEL_ERRO", "Não foi possível excluir o nível.");
    define("MSG_EXCLUIR_NIVEL_SUCESSO", "Nível excluído.");

    //Mensagens de funcionários
    define("MSG_INSERIR_FUNCIONARIO_ERRO", "Não foi possível inserir o funcionário.");
    define("MSG_INSERIR_FUNCIONARIO_SUCESSO", "Funcionário inserido.");
    define("MSG_ATUALIZAR_FUNCIONARIO_ERRO", "Não foi possível atualizar o funcionário.");
    define("MSG_ATUALIZAR_FUNCIONARIO_SUCESSO", "Funcionário atualizado.");
    define("MSG_EXCLUIR_FUNCIONARIO_ERRO", "Não foi possível excluir o funcionário.");
    define("MSG_EXCLUIR_FUNCIONARIO_SUCESSO", "Funcionário excluído.");

    //Mensagens de parceiros
    define("MSG_INSERIR_PARCEIRO_ERRO", "Não foi possível inserir o parceiro.");
    define("MSG_INSERIR_PARCEIRO_SUCESSO", "Parceiro inserido.");
    define("MSG_ATUALIZAR_PARCEIRO_ERRO", "Não foi possível atualizar o parceiro.");
    define("MSG_ATUALIZAR_PARCEIRO_SUCESSO", "Parceiro atualizado.");
    define("MSG_EXCLUIR_PARCEIRO_ERRO", "Não foi possível excluir o parceiro.");
    define("MSG_EXCLUIR_PARCEIRO_SUCESSO", "Parceiro excluído.");

    //Mensagens de funcionamento
    define("MSG_INSERIR_FUNCIONAMENTO_ERRO", "Não foi possível inserir o funcionamento.");
    define("MSG_INSERIR_FUNCIONAMENTO_SUCESSO", "Funcionamento inserido.");
    define("MSG_ATUALIZAR_FUNCIONAMENTO_ERRO", "Não foi possível atualizar o funcionamento.");
    define("MSG_ATUALIZAR_FUNCIONAMENTO_SUCESSO", "Funcionamento atualizado.");
    define("MSG_EXCLUIR_FUNCIONAMENTO_ERRO", "Não foi possível excluir o funcionamento.");
    define("MSG_EXCLUIR_FUNCIONAMENTO_SUCESSO", "Funcionamento excluído.");

    //Mensagens de termo
    define("MSG_INSERIR_TERMO_ERRO", "Não foi possível inserir o termo.");
    define("MSG_INSERIR_TERMO_SUCESSO", "Termo inserido.");
    define("MSG_ATUALIZAR_TERMO_ERRO", "Não foi possível atualizar o termo.");
    define("MSG_ATUALIZAR_TERMO_SUCESSO", "Termo atualizado.");
    define("MSG_EXCLUIR_TERMO_ERRO", "Não foi possível excluir o termo.");
    define("MSG_EXCLUIR_TERMO_SUCESSO", "Termo excluído.");

    //Mensagens de marca
    define("MSG_INSERIR_MARCA_ERRO", "Não foi possível inserir a marca.");
    define("MSG_INSERIR_MARCA_SUCESSO", "Marca inserida.");
    define("MSG_ATUALIZAR_MARCA_ERRO", "Não foi possível atualizar a marca.");
    define("MSG_ATUALIZAR_MARCA_SUCESSO", "Marca atualizada.");
    define("MSG_EXCLUIR_MARCA_ERRO", "Não foi possível excluir a marca.");
    define("MSG_EXCLUIR_MARCA_SUCESSO", "Marca excluída.");

    //Mensagens de modelo
    define("MSG_INSERIR_MODELO_ERRO", "Não foi possível inserir o modelo.");
    define("MSG_INSERIR_MODELO_SUCESSO", "Modelo inserido.");
    define("MSG_ATUALIZAR_MODELO_ERRO", "Não foi possível atualizar o modelo.");
    define("MSG_ATUALIZAR_MODELO_SUCESSO", "Modelo atualizado.");
    define("MSG_EXCLUIR_MODELO_ERRO", "Não foi possível excluir o modelo.");
    define("MSG_EXCLUIR_MODELO_SUCESSO", "Modelo excluído.");

    //Mensagens de duvidas
    define("MSG_INSERIR_DUVIDA_ERRO", "Não foi possível inserir a duvida.");
    define("MSG_INSERIR_DUVIDA_SUCESSO", "Duvida inserida.");
    define("MSG_ATUALIZAR_DUVIDA_ERRO", "Não foi possível atualizar a duvida.");
    define("MSG_ATUALIZAR_DUVIDA_SUCESSO", "Duvida atualizada.");
    define("MSG_EXCLUIR_DUVIDA_ERRO", "Não foi possível excluir a duvida.");
    define("MSG_EXCLUIR_DUVIDA_SUCESSO", "Duvida excluída.");

    //Mensagens de fale
    define("MSG_INSERIR_FALE_ERRO", "Não foi possível inserir o fale.");
    define("MSG_INSERIR_FALE_SUCESSO", "Fale inserido.");
    define("MSG_EXCLUIR_FALE_ERRO", "Não foi possível excluir o fale.");
    define("MSG_EXCLUIR_FALE_SUCESSO", "Fale excluído.");

    //Mensagens de pendência
    define("MSG_ATUALIZAR_PENDENCIA_ERRO", "Não foi possível atualizar a pendência.");
    define("MSG_ATUALIZAR_PENDENCIA_SUCESSO", "Pendência atualizado.");
    

    /*---------------------------------------------------------------*/
    /*--------------------------- ALERTAS ---------------------------*/
    /*---------------------------------------------------------------*/

    //Alerta de Login
    define("ALERT_LOGIN_ERRO", alert(MSG_LOGIN_ERRO));

    //Alertas de nível
    define("ALERT_INSERIR_NIVEL_ERRO", alert(MSG_INSERIR_NIVEL_ERRO));
    define("ALERT_INSERIR_NIVEL_SUCESSO", alert(MSG_INSERIR_NIVEL_SUCESSO));
    define("ALERT_ATUALIZAR_NIVEL_ERRO", alert(MSG_ATUALIZAR_NIVEL_ERRO));
    define("ALERT_ATUALIZAR_NIVEL_SUCESSO", alert(MSG_ATUALIZAR_NIVEL_SUCESSO));
    define("ALERT_EXCLUIR_NIVEL_ERRO", alert(MSG_EXCLUIR_NIVEL_ERRO));
    define("ALERT_EXCLUIR_NIVEL_SUCESSO", alert(MSG_EXCLUIR_NIVEL_SUCESSO));

    //Alertas de funcionários
    define("ALERT_INSERIR_FUNCIONARIO_ERRO", alert(MSG_INSERIR_FUNCIONARIO_ERRO));
    define("ALERT_INSERIR_FUNCIONARIO_SUCESSO", alert(MSG_INSERIR_FUNCIONARIO_SUCESSO));
    define("ALERT_ATUALIZAR_FUNCIONARIO_ERRO", alert(MSG_ATUALIZAR_FUNCIONARIO_ERRO));
    define("ALERT_ATUALIZAR_FUNCIONARIO_SUCESSO", alert(MSG_ATUALIZAR_FUNCIONARIO_SUCESSO));
    define("ALERT_EXCLUIR_FUNCIONARIO_ERRO", alert(MSG_EXCLUIR_FUNCIONARIO_ERRO));
    define("ALERT_EXCLUIR_FUNCIONARIO_SUCESSO", alert(MSG_EXCLUIR_FUNCIONARIO_SUCESSO));

    //Alertas de parceiros
    define("ALERT_INSERIR_PARCEIRO_ERRO", alert(MSG_INSERIR_PARCEIRO_ERRO));
    define("ALERT_INSERIR_PARCEIRO_SUCESSO", alert(MSG_INSERIR_PARCEIRO_SUCESSO));
    define("ALERT_ATUALIZAR_PARCEIRO_ERRO", alert(MSG_ATUALIZAR_PARCEIRO_ERRO));
    define("ALERT_ATUALIZAR_PARCEIRO_SUCESSO", alert(MSG_ATUALIZAR_PARCEIRO_SUCESSO));
    define("ALERT_EXCLUIR_PARCEIRO_ERRO", alert(MSG_EXCLUIR_PARCEIRO_ERRO));
    define("ALERT_EXCLUIR_PARCEIRO_SUCESSO", alert(MSG_EXCLUIR_PARCEIRO_SUCESSO));

    //Alertas de termo
    define("ALERT_INSERIR_TERMO_ERRO", alert(MSG_INSERIR_TERMO_ERRO));
    define("ALERT_INSERIR_TERMO_SUCESSO", alert(MSG_INSERIR_TERMO_SUCESSO));
    define("ALERT_ATUALIZAR_TERMO_ERRO", alert(MSG_ATUALIZAR_TERMO_ERRO));
    define("ALERT_ATUALIZAR_TERMO_SUCESSO", alert(MSG_ATUALIZAR_TERMO_SUCESSO));
    define("ALERT_EXCLUIR_TERMO_ERRO", alert(MSG_EXCLUIR_TERMO_ERRO));
    define("ALERT_EXCLUIR_TERMO_SUCESSO", alert(MSG_EXCLUIR_TERMO_SUCESSO));

    //Alertas de marca
    define("ALERT_INSERIR_MARCA_ERRO", alert(MSG_INSERIR_MARCA_ERRO));
    define("ALERT_INSERIR_MARCA_SUCESSO", alert(MSG_INSERIR_MARCA_SUCESSO));
    define("ALERT_ATUALIZAR_MARCA_ERRO", alert(MSG_ATUALIZAR_MARCA_ERRO));
    define("ALERT_ATUALIZAR_MARCA_SUCESSO", alert(MSG_ATUALIZAR_MARCA_SUCESSO));
    define("ALERT_EXCLUIR_MARCA_ERRO", alert(MSG_EXCLUIR_MARCA_ERRO));
    define("ALERT_EXCLUIR_MARCA_SUCESSO", alert(MSG_EXCLUIR_MARCA_SUCESSO));

    //Alertas de modelo
    define("ALERT_INSERIR_MODELO_ERRO", alert(MSG_INSERIR_MODELO_ERRO));
    define("ALERT_INSERIR_MODELO_SUCESSO", alert(MSG_INSERIR_MODELO_SUCESSO));
    define("ALERT_ATUALIZAR_MODELO_ERRO", alert(MSG_ATUALIZAR_MODELO_ERRO));
    define("ALERT_ATUALIZAR_MODELO_SUCESSO", alert(MSG_ATUALIZAR_MODELO_SUCESSO));
    define("ALERT_EXCLUIR_MODELO_ERRO", alert(MSG_EXCLUIR_MODELO_ERRO));
    define("ALERT_EXCLUIR_MODELO_SUCESSO", alert(MSG_EXCLUIR_MODELO_SUCESSO));

    //Alertas de fale
    define("ALERT_INSERIR_DUVIDA_ERRO", alert(MSG_INSERIR_DUVIDA_ERRO));
    define("ALERT_INSERIR_DUVIDA_SUCESSO", alert(MSG_INSERIR_DUVIDA_SUCESSO));
    define("ALERT_ATUALIZAR_DUVIDA_ERRO", alert(MSG_ATUALIZAR_DUVIDA_ERRO));
    define("ALERT_ATUALIZAR_DUVIDA_SUCESSO", alert(MSG_ATUALIZAR_DUVIDA_SUCESSO));
    define("ALERT_EXCLUIR_DUVIDA_ERRO", alert(MSG_EXCLUIR_DUVIDA_ERRO));
    define("ALERT_EXCLUIR_DUVIDA_SUCESSO", alert(MSG_EXCLUIR_DUVIDA_SUCESSO));

    //Alertas de duvida
    define("ALERT_INSERIR_FALE_ERRO", alert(MSG_INSERIR_FALE_ERRO));
    define("ALERT_INSERIR_FALE_SUCESSO", alert(MSG_INSERIR_FALE_SUCESSO));
    define("ALERT_EXCLUIR_FALE_ERRO", alert(MSG_EXCLUIR_FALE_ERRO));
    define("ALERT_EXCLUIR_FALE_SUCESSO", alert(MSG_EXCLUIR_FALE_SUCESSO));

    //Alertas de pendência
    define("ALERT_ATUALIZAR_PENDENCIA_ERRO", alert(MSG_ATUALIZAR_PENDENCIA_ERRO));
    define("ALERT_ATUALIZAR_PENDENCIA_SUCESSO", alert(MSG_ATUALIZAR_PENDENCIA_SUCESSO));
}
?>